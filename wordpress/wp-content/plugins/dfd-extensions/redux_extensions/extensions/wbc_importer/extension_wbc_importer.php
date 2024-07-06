<?php
/**
 * Extension-Boilerplate
 *
 * @link https://github.com/ReduxFramework/extension-boilerplate
 *
 * Radium Importer - Modified For ReduxFramework
 * @link https://github.com/FrankM1/radium-one-click-demo-install
 *
 * @package     WBC_Importer - Extension for Importing demo content
 * @author      Webcreations907
 * @version     1.0.2
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Don't duplicate me!
if ( !class_exists( 'ReduxFramework_extension_wbc_importer' ) ) {

    class ReduxFramework_extension_wbc_importer {

        public static $instance;

        static $version = "1.0.2";

        protected $parent;
		
		protected $importer;

        private $filesystem = array();

        public $extension_url;

        public $extension_dir;

        public $demo_data_dir;

        public $external_import = false;

        public $wbc_import_files = array();

        public $active_import_id;

        public $active_import;


        /**
         * Class Constructor
         *
         * @since       1.0
         * @access      public
         * @return      void
         */
        public function __construct( $parent ) {

            $this->parent = $parent;

            if ( !is_admin() ) return;

            //Hides importer section if anything but true returned. Way to abort :)
            if ( true !== apply_filters( 'wbc_importer_abort', true ) ) {
                return;
            }

            if ( empty( $this->extension_dir ) ) {
                $this->extension_dir = trailingslashit( str_replace( '\\', '/', dirname( __FILE__ ) ) );
                $this->extension_url = site_url( str_replace( trailingslashit( str_replace( '\\', '/', ABSPATH ) ), '', $this->extension_dir ) );
				$this->demo_data_dir = apply_filters( "wbc_importer_dir_path", get_template_directory() . '/inc/demo-data/' );
            }

            //Delete saved options of imported demos, for dev/testing purpose
            // delete_option('wbc_imported_demos');

			$this->getImports();

            $this->field_name = 'wbc_importer';

            self::$instance = $this;

            add_filter('redux/' . $this->parent->args['opt_name'] . '/field/class/' . $this->field_name, array( &$this, 'overload_field_path'));

			//new
            add_action('wp_ajax_redux_wbc_importer_widgets', array($this, 'import_widgets'));
            add_action('wp_ajax_redux_wbc_importer_options', array($this, 'import_options'));
            add_action('wp_ajax_redux_wbc_importer_content', array($this, 'import_content'));

            add_filter('redux/'.$this->parent->args['opt_name'].'/field/wbc_importer_files', array($this, 'addImportFiles'));

            //Adds Importer section to panel
            $this->add_importer_section();
        }
		
		public function import_widgets() {
			$this->checkPostData();
			
			$reimporting = $this->checkReImport();

			$this->active_import_id = $_POST['demo_import_id'];

			$import_parts         = $this->wbc_import_files[$this->active_import_id];

			$this->active_import  = array($this->active_import_id => $import_parts);

			if(!isset($import_parts['imported']) || true === $reimporting) {
				include $this->extension_dir.'inc/init-installer.php';
				$importer = new Radium_Theme_Demo_Data_Importer($this, $this->parent);
				$importer->installWidgets();
				echo '1';
				die();
			} else {
				die(esc_html__('Demo Already Imported', 'dfd-native'));
			}
		}
		
		public function import_options() {
			$this->checkPostData();
			
			$reimporting = $this->checkReImport();

			$this->active_import_id = $_POST['demo_import_id'];

			$import_parts         = $this->wbc_import_files[$this->active_import_id];

			$this->active_import  = array($this->active_import_id => $import_parts);

			if(!isset($import_parts['imported']) || true === $reimporting) {
				include $this->extension_dir.'inc/init-installer.php';
				$importer = new Radium_Theme_Demo_Data_Importer($this, $this->parent);
				$importer->installOptions();
				echo '1';
				die();
			} else {
				die(esc_html__('Demo Already Imported', 'dfd-native'));
			}
		}
		
		public function import_content() {
			$this->checkPostData();
			
			$reimporting = $this->checkReImport();

			$this->active_import_id = $_POST['demo_import_id'];

			$import_parts         = $this->wbc_import_files[$this->active_import_id];

			$this->active_import  = array($this->active_import_id => $import_parts);

			$content_file         = $import_parts['directory'];
			
			$demo_data_loc        = $this->demo_data_dir.$content_file;

			if(file_exists($demo_data_loc.'/'.$import_parts['content_file']) && is_file($demo_data_loc.'/'.$import_parts['content_file']) || $this->external_import === true) {
				if(!isset($import_parts['imported']) || true === $reimporting) {
					include $this->extension_dir.'inc/init-installer.php';
					$importer = new Radium_Theme_Demo_Data_Importer($this, $this->parent);
					$importer->installDemo();
					echo '1';
					die();
				} else {
					die(esc_html__('Demo Already Imported', 'dfd-native'));
				}
			}
			die(esc_html__('Demo data file does not exist', 'dfd-native'));
		}
		
		public function checkPostData() {
			if(!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], "redux_{$this->parent->args['opt_name']}_wbc_importer")) {
				die(__('Nice try ;)', 'dfd-native'));
			}
			
			if(!isset($_POST['type']) || $_POST['type'] != "import-demo-content" || !array_key_exists($_POST['demo_import_id'], $this->wbc_import_files)) {
				die(__('Wrong demo', 'dfd-native'));
			}
		}
		
		public function checkReImport() {
			$reimporting = false;

			if(isset($_POST['wbc_import']) && $_POST['wbc_import'] == 're-importing') {
				$reimporting = true;
			}
			
			return $reimporting;
		}
		
		public function ajax_importer() {
		}

        /**
         * Get the demo folders/files
         * Provided fallback where some host require FTP info
         *
         * @return array list of files for demos
         */
        public function demoFiles() {
//			die();
			$this->filesystem = $this->parent->filesystem->execute( 'object' );
			$dir_array = $this->filesystem->dirlist($this->demo_data_dir, false, true);

            if(empty($dir_array) || is_array($dir_array)) {
                $dir_array = array();

				if(is_dir($this->demo_data_dir)) {
					$demo_directory = @array_diff(scandir($this->demo_data_dir), array('..', '.'));
				}

                if(!empty($demo_directory) && is_array($demo_directory)) {
                    foreach($demo_directory as $key => $value) {
                        if(is_dir($this->demo_data_dir.$value)) {

                            $dir_array[$value] = array('name' => $value, 'type' => 'd', 'files'=> array());

                            $demo_content = array_diff(scandir($this->demo_data_dir.$value), array('..', '.'));

                            foreach($demo_content as $d_key => $d_value) {
                                if(is_file($this->demo_data_dir.$value.'/'.$d_value)) {
                                    $dir_array[$value]['files'][$d_value] = array('name'=> $d_value, 'type' => 'f');
                                }
                            }
                        }
                    }
                    uksort($dir_array, 'strcasecmp');
				} else {
					require_once get_template_directory() .'/inc/lib/dashboard/lib/class.remote.php';
			
					if(method_exists('Dfd_Remote_Actions_Class', 'instance')) {
						$code = get_site_option('dfd_native_purchase_code');
						$remote_instance = Dfd_Remote_Actions_Class::instance();
						$response = $remote_instance->getDemoData($code);
						if(!is_wp_error($response) && isset($response['data'])) {
							$dir_array = $response['data'];
							$this->external_import = true;
						}
					}
				}
			}
			
			uksort($dir_array, 'strcasecmp');
			
//			file_put_contents(get_template_directory().'/assets/log.json', json_encode($dir_array));
			
            return $dir_array;
        }


        public function getImports() {
			global $pagenow;
			if(isset($pagenow) && (($pagenow == 'admin.php' && isset($_GET['page']) && $_GET['page'] == DFD_THEME_SETTINGS_NAME) || $pagenow == 'admin-ajax.php')) {
				if ( !empty( $this->wbc_import_files ) ) {
					return $this->wbc_import_files;
				}

				$imports = $this->demoFiles();

				$imported = get_option('wbc_imported_demos');

				if ( !empty( $imports ) && is_array( $imports ) ) {
					$x = 1;
					foreach ( $imports as $import ) {

						if ( !isset( $import['files'] ) || empty( $import['files'] ) ) {
							continue;
						}

						if($import['type'] == "d" && !empty( $import['name'])) {
							$this->wbc_import_files['wbc-import-'.$x] = isset($this->wbc_import_files['wbc-import-'.$x]) ? $this->wbc_import_files['wbc-import-'.$x] : array();
							$this->wbc_import_files['wbc-import-'.$x]['directory'] = $import['name'];

							if(!empty( $imported ) && is_array( $imported)) {
								if(array_key_exists('wbc-import-'.$x, $imported)) {
									$this->wbc_import_files['wbc-import-'.$x]['imported'] = 'imported';
								}
							}

							foreach($import['files'] as $file) {
								switch($file['name']) {
									case 'content.xml':
									case 'content.zip':
										$this->wbc_import_files['wbc-import-'.$x]['content_file'] = $file['name'];
										break;

									case 'theme-options.txt':
									case 'theme-options.json':
										$this->wbc_import_files['wbc-import-'.$x]['theme_options'] = $file['name'];
										break;

									case 'widgets.json':
									case 'widgets.txt':
										$this->wbc_import_files['wbc-import-'.$x]['widgets'] = $file['name'];
										break;

									case 'screen-image.png':
									case 'screen-image.jpg':
									case 'screen-image.gif':
										$this->wbc_import_files['wbc-import-'.$x]['image'] = $file['name'];
										break;
									}

								}

								if(!isset( $this->wbc_import_files['wbc-import-'.$x]['content_file'])) {
									unset( $this->wbc_import_files['wbc-import-'.$x] );
									if($x > 1) {
										$x--;
									}
								}
							}
						$x++;
					}

				}
			}

        }

        public function addImportFiles( $wbc_import_files ) {

            if(!is_array($wbc_import_files) || empty($wbc_import_files)) {
                $wbc_import_files = array();
            }

            $wbc_import_files = wp_parse_args($wbc_import_files, $this->wbc_import_files);

            return $wbc_import_files;
        }

		public static function get_instance() {
			return self::$instance;
		}

		// Forces the use of the embeded field path vs what the core typically would use
		public function overload_field_path( $field ) {
			return dirname( __FILE__ ) . '/' . $this->field_name . '/field_' . $this->field_name . '.php';
		}

        function add_importer_section() {
            // Checks to see if section was set in config of redux.
			for($n = 0; $n <= count($this->parent->sections); $n++) {
				if(isset($this->parent->sections[$n]['id']) && $this->parent->sections[$n]['id'] == 'wbc_importer_section') {
					return;
				}
			}

			$wbc_importer_label = trim(esc_html(apply_filters('wbc_importer_label', esc_html__('Demo importer', 'dfd-native'))));

			$wbc_importer_label = (!empty($wbc_importer_label)) ? $wbc_importer_label : esc_html__('Demo importer', 'dfd-native');

			$this->parent->sections[] = array(
				'id'     => 'wbc_importer_section',
				'title'  => $wbc_importer_label,
//				'desc'   => '<p class="description">'. apply_filters( 'wbc_importer_description', esc_html__( 'Works best to import on a new install of WordPress', 'dfd-native' ) ).'</p>',
				'icon'   => 'el-icon-website',
				'class'   => 'dfd-demo-import',
				'fields' => array(
					array(
						'id'   => 'wbc_demo_importer',
						'type' => 'wbc_importer'
					)
				)
			);
        }

    } // class
} // if
