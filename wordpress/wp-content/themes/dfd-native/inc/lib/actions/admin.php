<?php
if(!defined('ABSPATH')) {
	exit;
}

if(!class_exists('Dfd_Admin_Actions')) {
	class Dfd_Admin_Actions {
		public $pagenow;
		
		public function __construct() {
			global $pagenow;
			$this->pagenow = $pagenow;

			$this->init();
		}
		public function init() {
			$this->actions();
		}
		public function actions() {
			add_action('after_setup_theme', array($this, 'enqueueExtras'), 0);
			add_action('admin_init', array($this, 'adminInitAction'));
			if(current_user_can('manage_options')) {
//				add_action('switch_theme', array($this, 'switchThemeAction'));
				add_action('switch_theme', array($this, 'updateDismissElementor'));
				add_action('after_switch_theme', array($this, 'afterSwitchTheme'));
			}
			if(isset($this->pagenow) && (($this->pagenow == 'admin.php' && isset($_GET['page']) && $_GET['page'] == ucfirst(DFD_THEME_SETTINGS_NAME)) || $this->pagenow == 'admin-ajax.php')) {
				add_action('wbc_importer_after_content_import', array($this, 'wbcExtended'), 10, 2);
			}
			if(!defined('ENVATO_HOSTED_SITE') || !ENVATO_HOSTED_SITE) {
				add_action( 'admin_notices', array($this, 'dfdElementorNotice' ));
			}
			add_action('admin_head', array($this, 'dismissElementor'));
		}
		
		public function enqueueExtras() {
			# Envato updater init
			if(!defined('ENVATO_HOSTED_SITE') || !ENVATO_HOSTED_SITE) {
				require_once get_template_directory().'/inc/lib/dashboard/theme-page.php';
			}
			if(defined('DFD_ELEMENTOR')) {
				add_filter( 'use_block_editor_for_post', '__return_false' );
			}
		}

		/* 
		 *  WBC demo installer extender
		 */
		public function wbcExtended($demo_active_import , $demo_directory_path) {

			reset($demo_active_import);
			$current_key = key($demo_active_import);

			/************************************************************************
			* Import slider(s) for the current demo being imported
			*************************************************************************/

			if(class_exists('RevSlider')) {

				$wbc_sliders_array = array(
					'01_one' => 'creative-freedom.zip',
					'02_two' => 'duotone1.zip',
					'13_thirteen' => 'nice-and-clean-header.zip',
					'16_sixteen' => 'main-sixteenth.zip',
					'17_seventeen' => 'seventeenth-double.zip',
					'19_nineteen' => 'ninteenth.zip',
					'20_twenty' => 'bakery.zip',
					'22_twenty_two' => 'twenty-second.zip',
					'23_twenty_three' => 'gym.zip',
					'25_twenty_five' => 'lawyer.zip',
					'34_thirty_four' => 'thirty-fourth.zip',
					'36_thirty_six' => 'thirty_sixth.zip',
					'37_thirty_seven' => 'thirty_seventh.zip',
					'38_thirty_eight' => 'thirty-eighth.zip',
					'39_thirty_nine' => 'thirty-ninth.zip',
					'40_forty' => 'building.zip',
					'41_forty_one' => 'forty-first.zip',
					'42_forty_two' => 'forty_two.zip',
					'43_rtl_demo' => 'lawyer.zip',
					'45_shop_one' => 'creative-freedom.zip',
					'46_shop_two' => 'shop-second.zip',
					'51_forty_three' => 'slider-1.zip',
					'53_forty_five' => 'slider.zip',
					'54_forty_six' => 'Forty-six.zip',
					'55_elementor_one' => 'creative-freedom.zip',
					'56_elementor_two' => 'duotone1.zip',
					'107_elementor_forty_five' => 'slider.zip',
				);

				if(isset($demo_active_import[$current_key]['directory']) && !empty($demo_active_import[$current_key]['directory']) && array_key_exists($demo_active_import[$current_key]['directory'], $wbc_sliders_array)) {
					$wbc_slider_import = $wbc_sliders_array[$demo_active_import[$current_key]['directory']];
					if(is_array($wbc_slider_import)) {
						foreach($wbc_slider_import as $name) {
							$data_file = $demo_directory_path.$name;

							if(!file_exists($data_file)) {
								$data_file = download_url('http://dfd.name/check-native/files/ntv/'. $demo_active_import[$current_key]['directory'] .'/'.$name);
							}

							if(is_file($data_file)) {
								$slider = new RevSlider();
								$slider->importSliderFromPost(true, true, $data_file);
							}
						}
					} else {
						$data_file = $demo_directory_path.$wbc_slider_import;

						if(!file_exists($data_file)) {
							$data_file = download_url('http://dfd.name/check-native/files/ntv/'. $demo_active_import[$current_key]['directory'] .'/'.$wbc_slider_import);
						}
						
						if(is_file($data_file)) {
							$slider = new RevSlider();
							$slider->importSliderFromPost(true, true, $data_file);
						}
					}
				}
			}

			/************************************************************************
			* Setting Menus
			*************************************************************************/

			// If it's demo1 - demo6
			$wbc_menu_array = array(
				'01_one',
				'02_two',
				'03_three',
				'04_four',
				'05_five',
				'06_six',
				'07_seven',
				'08_eight',
				'09_nine',
				'10_ten',
				'11_eleven',
				'12_twelve',
				'13_thirteen',
				'14_fourteen',
				'15_fifteen',
				'16_sixteen',
				'17_seventeen',
				'18_eighteen',
				'19_nineteen',
				'20_twenty',
				'21_twenty_one',
				'22_twenty_two',
				'23_twenty_three',
				'24_twenty_four',
				'25_twenty_five',
				'26_twenty_six',
				'27_twenty_seven',
				'28_twenty_eight',
				'29_twenty_nine',
				'30_thirty',
				'31_thirty_one',
				'32_thirty_two',
				'33_thirty_three',
				'34_thirty_four',
				'35_thirty_five',
				'36_thirty_six',
				'37_thirty_seven',
				'38_thirty_eight',
				'39_thirty_nine',
				'40_forty',
				'41_forty_one',
				'42_forty_two',
				'43_rtl_demo',
				'44_shop_main',
				'45_shop_one',
				'46_shop_two',
				'47_shop_three',
				'48_home_demo',
				'49_pages_example',
				'50_elements',
				'51_forty_three',
				'52_forty_four',
				'53_forty_five',
				'54_forty_six',
				'55_elementor_one',
				'56_elementor_two',
				'57_elementor_three',
				'58_elementor_four',
				'107_elementor_forty_five',
			);

			if(isset($demo_active_import[$current_key]['directory']) && !empty($demo_active_import[$current_key]['directory']) && in_array($demo_active_import[$current_key]['directory'], $wbc_menu_array)) {
				$top_menu = get_term_by('name', 'Primary navigation', 'nav_menu');

				if(isset($top_menu->term_id)) {
					set_theme_mod( 'nav_menu_locations', array(
							'theme-primary' => $top_menu->term_id,
							'theme-footer'  => $top_menu->term_id
						)
					);
				}

			}

			/************************************************************************
			* Set HomePage
			*************************************************************************/

			// array of demos/homepages to check/select from
			$wbc_home_pages = array(
				'01_one' => 'First',
				'02_two' => 'Second',
				'03_three' => 'Third',
				'04_four' => 'Fourth',
				'05_five' => 'Fifth',
				'06_six' => 'Sixth',
				'07_seven' => 'Seventh',
				'08_eight' => 'eighth',
				'09_nine' => 'ninth',
				'10_ten' => 'Tenth',
				'11_eleven' => 'Eleventh',
				'12_twelve' => 'Church',
				'13_thirteen' => 'Thirteenth',
				'14_fourteen' => 'Fourteenth',
				'15_fifteen' => 'Restaurant',
				'16_sixteen' => 'sixteenth',
				'17_seventeen' => 'seventeenth',
				'18_eighteen' => 'eighteenth',
				'19_nineteen' => 'Ninteenth',
				'20_twenty' => 'twentieth',
				'21_twenty_one' => 'Twenty first',
				'22_twenty_two' => 'Twenty second',
				'23_twenty_three' => 'twenty_third',
				'24_twenty_four' => 'Twenty fourth',
				'25_twenty_five' => 'twenty-fifth',
				'26_twenty_six' => 'Twenty sixth',
				'27_twenty_seven' => 'Twenty seventh',
				'28_twenty_eight' => 'Twenty eighth',
				'29_twenty_nine' => 'Twenty ninth',
				'30_thirty' => 'Thirtieth',
				'31_thirty_one' => 'Thirty first',
				'32_thirty_two' => 'Thirty second',
				'33_thirty_three' => 'Thirty third',
				'34_thirty_four' => 'Thirty fourth',
				'35_thirty_five' => 'Thirty fifth',
				'36_thirty_six' => 'Thirty sixth',
				'37_thirty_seven' => 'Thirty seventh',
				'38_thirty_eight' => 'Thirty eighth',
				'39_thirty_nine' => 'Thirty ninth',
				'40_forty' => 'Building',
				'41_forty_one' => 'forty first',
				'42_forty_two' => 'Forty second layout',
				'43_rtl_demo' => 'twenty-fifth',
				'44_shop_main' => 'Shop',
				'45_shop_one' => 'Shop-first',
				'46_shop_two' => 'Shop second',
				'47_shop_three' => 'Shop third',
				'48_home_demo' => 'Recently added posts',
				'49_pages_example' => 'About me 1',
				'50_elements' => 'Portfolio',
				'51_forty_three' => 'Forty Three Layout',
				'52_forty_four' => 'Forty four layout',
				'53_forty_five' => 'Forty five layout',
				'54_forty_six' => 'Forty Six Layout',
				'55_elementor_one' => 'One Layout Elementor',
				'56_elementor_two' => 'Layout Two Elementor',
				'57_elementor_three' => 'Layout Three Elementor',
				'58_elementor_four' => 'Layout Four Elementor',
				'107_elementor_forty_five' => 'Forty Five Elementor',
			);

			if(isset($demo_active_import[$current_key]['directory']) && !empty($demo_active_import[$current_key]['directory']) && array_key_exists($demo_active_import[$current_key]['directory'], $wbc_home_pages)) {
				$page = get_page_by_title( $wbc_home_pages[$demo_active_import[$current_key]['directory']] );
				if(isset($page->ID)) {
					update_option('page_on_front', $page->ID);
					update_option('show_on_front', 'page');
				}
			}
		}

		public function adminInitAction() {
			$this->afterSwitchThemeRedirect();
			if(function_exists('set_revslider_as_theme')) {
				set_revslider_as_theme();
			}
			/*Deactivate plugin Dfd Extensions*/
			$themeActive = get_site_option('dfd_native_theme_activated', false);
			if (is_plugin_active('dfd-extensions/dfd_extensions.php') && $themeActive !== 'active') {
				$extensions_data = get_plugin_data(WP_PLUGIN_DIR.'/dfd-extensions/dfd_extensions.php');
				if(version_compare($extensions_data['Version'], '1.5.6', '<')) {
					deactivate_plugins('dfd-extensions/dfd_extensions.php');
					wp_redirect(get_admin_url() .'admin.php?page=dfd-native');
				}
			}
		}
		
		public function afterSwitchTheme() {
			set_transient('_' . DFD_THEME_SETTINGS_NAME . '_elementor_redirect', 1);
		}
		
		public function afterSwitchThemeRedirect() {
			ob_start();
			if(!get_transient('_' . DFD_THEME_SETTINGS_NAME . '_elementor_redirect')) {
				return;
			}
			delete_transient('_' . DFD_THEME_SETTINGS_NAME . '_elementor_redirect');
			wp_safe_redirect(admin_url('admin.php?page=dfd-'.DFD_THEME_SETTINGS_NAME));
			exit;
		}
		
		/*Elementor notice*/
		public function dfdElementorNotice() {
			if (get_user_meta(get_current_user_id(), 'elementor_dismissed_notice', true)) {
				return;
			}

			?>
			<div class="notice notice-success is-dismissible">
				<p>
					<strong style="color: #00a32a; font-weight: 700;">
						<?php _e('We are working on the compatibility with the Elementor plugin. Theme is already compatible with it and new custom modules are added.<br />Check it out! Any feedback would be highly appreciated!', 'dfd-native'); ?>
					</strong>
				</p>
				<p>
					<strong>
						<a href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'elementor-dismiss', 'dismiss_admin_notices' ), 'elementor-dismiss-' . get_current_user_id() ) ); ?>" title="<?php esc_attr_e('Dismiss this notice','dfd-native') ?>" target="_parent"><?php esc_html_e('Dismiss this notice', 'dfd-native') ?></a>
					</strong>
				</p>
			</div>
			<?php
		}
		
		public function dismissElementor() {
			if (isset($_GET['elementor-dismiss']) && check_admin_referer('elementor-dismiss-' . get_current_user_id())) {
				update_user_meta(get_current_user_id(), 'elementor_dismissed_notice', 1);
			}
		}
		
		public function updateDismissElementor() {
			delete_metadata('user', null, 'elementor_dismissed_notice', null, true);
		}
	}
	
	$Dfd_Admin_Actions = new Dfd_Admin_Actions();
}
