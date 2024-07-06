<?php
if (!defined('ABSPATH')) {
	exit;
}

if (!class_exists('Dfd_Native_Elementor')) {

	class Dfd_Native_Elementor {

		public function __construct() {
			add_action('elementor/elements/categories_registered', [$this, 'set_categories']);
			add_filter('elementor/icons_manager/additional_tabs', [$this, 'set_icon_pack']);
			add_action('elementor/widgets/widgets_registered', [$this, 'set_widgets']);
			add_action('elementor/editor/before_enqueue_styles', [$this, 'dfd_elementor_register_script_admin']);
			add_action('admin_enqueue_scripts', [$this, 'dfd_elementor_register_script_admin']);
			add_action('elementor/frontend/after_enqueue_styles', [$this, 'dfd_elementor_styles']);
//			add_action('elementor/controls/controls_registered', [$this, 'add_custom_font'], 10, 1);
		}

		public function set_categories($elements_manager) {
			$elements_manager->add_category(
				'native-category',
				[
					'title' => __('Native', 'dfd-native'),
//					'icon' => '',
				]
			);
		}

		public function set_icon_pack() {
			global $dfd_native;
			
			$dfd_icons = array(
				'vkontakte', 'ok', 'px-icon', 'vb', 'forrst', 'dribbble', 'b_Xing-icon_bl', 'twitter', 'bandcamp-logo', 'flickr', 'c_spotify-512-black', 'twitter2', 'houzz-dark-icon', 'facebook', 'Meerkat-color', 'skype', 'periscope-logo', 'digg', 'skype2', 'google', 'slideshare', 'html5', 'Snapchat-logo', 'linkedin', 'soundcloud-logo', 'konus', 'lastfm', 'the-city', 'vimeo', 'yahoo', 'tumblr', 'apple', 'pinpoint', 'viadeo', 'windows', 'tripadvisor', 'youtube', 'delicious', 'rss', 'picasa', 'deviantart', 'whatsapp', 'snapchat', 'blogger', 'wordpress', 'amazon', 'appstore', 'paypal', 'myspace', 'dropbox', 'windows8', 'pinterest', 'soundcloud', 'google-drive', 'android', 'behance', 'instagram', 'ebay', 'google-plus', 'github', 'stackoverflow', 'spotify', 'stumbleupon', 'visa', 'mastercard', 'amex', 'ios', 'osx', 'evernote', 'yelp', 'yelp2', 'medium', 'slack', 'vine', 'edge', 'outlook', 'pencilcase', 'play', 'icloud', 'google-inbox', 'periscope', 'blackberry', 'viber', 'fb_messenger', 'wechat', 'gmail', 'airbnb', 'angellist', 'uber', 'safari', 'firefox', 'opera', 'bing', 'reddit', 'producthunt', 'icon-share', 'cloud', 'cloud-download', 'cloud-upload', 'signal', 'command', 'share', 'map', 'earth-globe', 'globe', 'map-marker', 'compass-circular-variant', 'cursor', 'location', 'icon-social-buffer', 'layers', 'icon-play', 'arrow-up', 'arrow-down', 'arrow-left', 'arrow-right', 'chevron-arrow-up', 'chevron-arrow-down', 'arrow-left-01', 'arrow-right-01', 'up-arrow', 'angle-arrow-down', 'angle-pointing-to-left', 'angle-arrow-pointing-to-right', 'caret-arrow-up', 'caret-down', 'left-arrow', 'arrowhead-pointing-to-the-right', 'sort-arrows-couple-pointing-up-and-down', 'thin-arrowheads-pointing-down', 'chevron-up', 'double-left-chevron', 'double-angle-pointing-to-right', 'long-arrow-pointing-up', 'down-arrow', 'long-arrow-pointing-to-left', 'long-arrow-pointing-to-the-right', 'horizontal-resize-option', 'exchange-arrows', 'arrow-up2', 'arrow-pointing-down', 'arrow-pointing-to-left', 'arrow-pointing-to-right', 'up-chevron-button', 'chevron-sign-down', 'chevron-sign-left', 'chevron-sign-to-right', 'arrow-up-on-a-black-circle-background', 'arrow-down-on-black-circular-background', 'circle-with-an-arrow-pointing-to-left', 'arrow-pointing-right-in-a-circle', 'upload-button', 'download-symbol', 'left-arrow-1', 'right-arrow-in-a-circle', 'play-circle', 'play-sign', 'refresh-page-option', 'repeat', 'refresh-arrow', 'undo-arrow', 'refresh', 'reload', 'reply-arrow', 'icon-reply-all', 'reply', 'reply2', 'share-option', 'shuffle', 'esc', 'share-post-symbol', 'share-symbol', 'login', 'logout', 'sign-in', 'sign-out-option', '04_In_alt', 'external-link-square-with-an-arrow-in-right-diagonal', 'open', 'external-link-symbol', 'upload', 'download', 'outbox', 'inbox', 'hand-pointing-upward', 'hand-finger-pointing-down', 'hand-pointing-to-left-direction', 'finger-of-a-hand-pointing-to-right-direction', 'thumbs-up-hand-symbol', 'thumbs-up', 'thumbs-down-silhouette', 'thumb-down', 'gamepad-console', 'keyboard', 'telephone-symbol-button', 'telephone-handle-silhouette', 'mobile-phone', 'computer-tablet', 'open-laptop-computer', 'desktop-monitor', 'monitor', 'inbox2', 'upload2', 'download-to-storage-drive', 'hard-drive', 'sitemap', 'code-fork-symbol', 'code', 'server', 'filter-tool-black-shape', 'power', 'pause', 'play2', 'pause-symbol', 'ic_pause_48px', 'play-button', 'rewind-button', 'step-backward', 'arrowheads-pointing-to-the-left', 'forward-button', 'step-forward', 'fast-forward-arrows', 'eject-symbol', 'mute', 'volume-off', 'reduced-volume', 'unmute', 'volume-up-interface-symbol', 'volume', 'Microphone', 'microphone-black-shape', 'microphone', 'microphone-off', 'bell-musical-tool', 'musical-bell-outline', 'bell', 'bull-horn-announcer', 'music-note-black-symbol', 'music-headphones', 'icon-search', 'plus-black-symbol', 'plus', 'plus-symbol-in-a-rounded-black-square', 'add-square-button', 'plus-sign-in-a-black-circle', 'circle-add', 'minus-symbol', 'minus-sign-inside-a-black-rounded-square-shape', 'minus-sign-on-a-square-outline', 'minus-button', 'minus-sign-inside-a-black-circle', 'circle-minus', 'remove-symbol', 'cross-24', 'icon-close-round', 'cross', 'cross-mark-on-a-black-circle-background', 'remove-button', 'circle-cross', 'correct-symbol', 'icon-checkmark', 'check', 'check-sign-in-a-rounded-black-square', 'check2', 'foursquare-button', 'checked-symbol', 'check-mark', 'circle-check', 'square-shape-shadow', 'rounded-black-square-shape', 'check-box-empty', 'circular-shape-silhouette', 'bullseye', 'adjust-contrast', 'ban-circle-symbol', 'dot-and-circle', 'circle-shape-outline', 'record', 'Search', 'magnifying-glass', 'search', '12_Zoom_in', 'zoom-in', 'zoom-out', 'zoom-in2', 'zoom-out2', 'quote-left', 'right-quotation-mark', '75', 'link-symbol', 'link5', 'link', 'link2', 'unlink-symbol', 'paper-clip-outline', 'paper-clip', 'paper-push-pin', 'tags', 'tag-black-shape', 'tag', 'fluffy-cloud-silhouette', 'qr-code', 'bookmark-black-shape', 'bookmark-white', 'ribbon', 'editor-images-pictures-photos-collection-glyph', 'icon-image', 'picture', 'image', 'photo-camera', 'camera-retro', 'camera', 'toggle', 'film-strip-with-two-photograms', 'video', 'battery', 'envelope', 'envelope-of-white-paper', 'mail', 'settings', 'cog-wheel-silhouette', 'cog', 'screenshot', 'location-2', 'comments', 'speech-bubbles-comment-option', 'Untitled-2-37', 'comment-black-oval-bubble-shape', 'comment-white-oval-bubble', 'stack-exchange-logo', 'speech-bubble', 'icon-ios7-heart', 'heart-shape-silhouette', 'heart-shape-outline', 'heart', 'star', 'star-half-empty', 'half-star-shape', 'star-1', 'star2', 'padlock', 'padlock-unlock', 'open-padlock-silhouette', 'lock', 'unlock', 'credit-card', 'paper-bill', 'great-britain-pound', 'euro-currency-symbol', 'dollar-symbol', 'double-strikethrough-option', 'yen-symbol', 'turkish-lire-symbol', 'rupee-indian', 'letter-p-symbol', 'edit-interface-sign', 'icon-compose', 'calendar-page-empty', 'calendar-with-spring-binder-and-date-blocks', 'time', 'clock', 'clock2', 'pie-graph', 'watch', 'filter', 'double-sided-eraser', 'minus', 'menu', 'blank-file', 'file', 'file-add', 'file-subtract', 'paper', 'stack-2', 'stack', 'columns', 'grid-2', 'layout', 'grid', 'stop', 'content-right', 'content-left', 'paper-stack', 'clipboard', 'book', 'folder', 'box', 'moon', 'sun', 'loader', 'spinner-of-dots', 'ellipsis', 'align-justify', 'align-to-left', 'align-to-right', 'road-perspective', 'bar-graph-on-a-rectangle', 'book2', 'briefcase', 'briefcase2', 'bag', 'archive-black-box', 'small-rocket-ship-silhouette', 'plane', 'fighter-jet-silhouette', 'dashboard', 'delivery-truck-silhouette', 'building-front', 'home', 'hostpital-building', 'hotel-letter-h-sign-inside-a-black-rounded-square', 'medical-kit', 'ambulance', 'stethoscope', 'eye-open', 'eye-with-a-diagonal-line-interface-symbol-for-invisibility', 'eye', 'smile', 'meh-face-emoticon', 'frown', 'group-profile-users', 'man', 'female-silhouette', 'user-shape', 'users', 'head', 'user-md-symbol', 'asterisk', 'beaker', 'beer-jar-black-silhouette', 'coffee-cup-on-a-plate-black-silhouettes', 'cocktail-glass', 'shopping-cart-black-shape', 'icon-ios7-cart', 'bag-new', 'trash', 'trash2', 'suitcase-with-white-details', 'gift-box', 'trophy', 'shield', 'umbrella-black-silhouette', 'umbrella', 'legal-hammer', 'open-wrench-tool-silhouette', 'vintage-key-outline', 'fire-extinguisher', 'fire-symbol', 'anchor-shape', 'anchor', 'fork-and-knife-silhouette', 'light-bulb', 'cut', 'drop', 'lemon', 'branch-with-leaves-black-shape', 'plant-leaf-with-white-details', 'printing-tool', 'printer', 'help', 'lightning-bolt-shadow', 'signal-bars', 'bar-graph', 'bar-graph-2', 'moon-phase-outline', 'tint-drop', 'ticket', 'flag-black-shape', 'checkered-raised-flag', 'white-flag-symbol', 'flag', 'puzzle-piece-silhouette', 'wheelchair', 'warning-sign-on-a-triangular-background', 'exclamation-sign', 'exclamation', 'information-button', 'information-symbol', 'question-mark-on-a-circular-black-background', 'question-sign', 'barcode'
			);

			$return_icons['dfd_icons'] = array(
				'name'          => 'dfd_icons',
				'label'         => esc_html__( 'Theme Default Icons', 'dfd-native' ),
				'prefix'        => 'dfd-socicon-',
				'displayPrefix' => 'dfd-socicon',
				'url'           => DFD_EXTENSIONS_PLUGIN_URL . '/assets/fonts/dfd_icon_set/dfd_icon_set.css',
				'icons'         => $dfd_icons,
				'ver'           => '1.0.0',
			);
			
			if(!empty($dfd_native['icon_param'])) {
				$custom_icons_pack = json_decode($dfd_native['icon_param'][0], true);
				foreach ($custom_icons_pack as $font => $info) {
					if(!isset($info["active"]) || $info["active"] == false) {
						continue;
					}
					$icon_set = array ();
					$icons = array ();
					$style = $style_file_name = '';
					if(isset($info["is_default"])) {
						$upload_dir['basedir'] = DFD_EXTENSIONS_PLUGIN_PATH;
					} else {
						$upload_dir = wp_upload_dir();
					}
					$path = trailingslashit($upload_dir['basedir']);
					$file = $path . $info['include'] . '/' . $info['config'];
					
					if(file_exists($file)) {
						include($file);
					}
					
					$style_file_name = str_replace(array($font, '/'), '', $info['style']);
					$style = $upload_dir['baseurl'] . '/' . $info['include'] . '/' . $font . $style_file_name;
					
					if(!empty($icons)) {
						$icon_set = array_merge($icon_set, $icons);
					}
					if(isset($info["is_default"])) {
						$set_name = esc_html__('Default Icons', 'dfd-native');
					} else {
						$set_name = ucfirst($font);
					}
					if(!empty($icon_set)) {
						$icons_names = array();
						foreach ($icon_set as $icons) {
							foreach ($icons as $icon) {
								array_push($icons_names, esc_attr($icon['class']));
							}
						}
						$return_icons[$font] = array(
							'name'          => $set_name,
							'label'         => $font,
							'prefix'        => $font.'-',
							'displayPrefix' => $font,
							'url'           => $style,
							'icons'         => $icons_names,
							'ver'           => '1.0.0',
						);
					}
				}
			}
			
			
			return $return_icons;
		}
		
//		public function add_custom_font($controls_registry) {
//			var_dump('la-la-la');die();
//			$fonts = $controls_registry->get_control( 'font' )->get_settings( 'options' );
//			$new_fonts = array_merge(
//				[ 'Font Name 01' => 'custom' ],
//				[ 'Font Name 02' => 'custom' ],
//				[ 'Font Name 03' => 'custom' ],
//				$fonts );
//			$controls_registry->get_control( 'font' )->set_settings( 'options', $new_fonts );
//		}
		
		public function set_widgets() {
			$widgets = array(
				'el_animate_heading' => 'el-animate-heading',
                'el_fancy_text' => 'el-fancy-text',
                'el_blog_posts' => 'el-blog-posts',
				'el_announcement' => 'el-announcement',
			    'el_call_to_action' => 'el-call-to-action',
			    'el_countdown' => 'el-countdown',
				'el_facts' => 'el-facts',
				'el_gradation' => 'el-gradation',
				'el_image_layers' => 'el-image-layers',
				'el_info_box' => 'el-info-box',
				'el_piechart' => 'el-piechart',
			    'el_portfolio_metro_module' => 'el-portfolio-metro-module',
			    'el_portfolio_module' => 'el-portfolio-module',
				'el_progress_bar' => 'el-progress-bar',
				'el_simple_advertisement' => 'el-simple-advertisement',
				'el_social_accounts' => 'el-social-accounts',
				'el_testimonial' => 'el-testimonial',
				'el_testimonials_slider' => 'el-testimonials-slider',
				'el_team_member' => 'el-team-member',
				'el_video_player' => 'el-video-player',
			);
			
			foreach ($widgets as $name => $file) {
				// Include Widget files
				require_once( DFD_EXTENSIONS_PLUGIN_PATH . '/elementor/widgets/'.$file.'.php' );

				// Register widget
				\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new $name);
			}
		}
		
		public function dfd_elementor_styles() {
			wp_register_style('dfd_elementor_style', DFD_EXTENSIONS_PLUGIN_URL . 'elementor/assets/css/elementor-styles.css');
			wp_enqueue_style('dfd_elementor_style');
//			wp_register_script('dfd_image_layers_script', DFD_EXTENSIONS_PLUGIN_URL . '/assets/js/elementor/dfd-image-layers.js', array('jquery', 'jquery-migrate'), null, true);
		}
		
		public function dfd_elementor_register_script_admin() {
			wp_register_style('dfd_elementor_admin_style', DFD_EXTENSIONS_PLUGIN_URL . 'elementor/assets/css/admin.css');
			wp_enqueue_style('dfd_elementor_admin_style');
		}
	}

	$Dfd_Native_Elementor = new Dfd_Native_Elementor();
}
