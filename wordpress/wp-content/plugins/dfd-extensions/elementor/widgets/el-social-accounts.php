<?php

if (!defined('ABSPATH')) {
	exit;
}

class El_Social_Accounts extends \Elementor\Widget_Base {

	public function get_name() {
		return 'el_social_accounts';
	}

	public function get_title() {
		return esc_html__('DFD Social accounts', 'dfd-native');
	}

	public function get_icon() {
		return 'dfd_soc_icons';
	}

	public function get_categories() {
		return ['native-category'];
	}

//	public function get_icon() {
//		//icon
//	}
//	public function get_script_depends() {
//		return ['dfd_image_layers_script'];
//	}

	protected function register_controls() {

		$this->start_controls_section(
				'el_social_accounts',
				[
					'label' => esc_html__('Social accounts', 'dfd-native'),
				]
		);
		$this->add_control(
				'main_style',
				[
					'label' => esc_html__('Style', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'style-1' => esc_html__('Sliding icon', 'dfd-native'),
						'style-2' => esc_html__('Sliding background', 'dfd-native'),
						'style-3' => esc_html__('Fade', 'dfd-native'),
						'style-4' => esc_html__('Appear out', 'dfd-native'),
						'style-5' => esc_html__('General shadow', 'dfd-native'),
						'style-6' => esc_html__('Round to square', 'dfd-native'),
						'style-7' => esc_html__('Animated cube', 'dfd-native'),
						'style-8' => esc_html__('Long shadow', 'dfd-native'),
					],
					'default' => 'style-1'
				]
		);
		$this->add_control(
				'info_alignment',
				[
					'label' => esc_html__('Icon alignment', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'text-left' => [
							'title' => esc_html__('Left', 'dfd-native'),
							'icon' => 'eicon-text-align-left'
						],
						'text-center' => [
							'title' => esc_html__('Center', 'dfd-native'),
							'icon' => 'eicon-text-align-center'
						],
						'text-right' => [
							'title' => esc_html__('Right', 'dfd-native'),
							'icon' => 'eicon-text-align-right'
						]
					],
					'default' => 'text-left',
				]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
				'dfd_social_networks_sel',
				[
					'label' => esc_html__('Social network', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'dfd-socicon-deviantart' => esc_html__('Deviantart', 'dfd-native'),
						'dfd-socicon-digg' => esc_html__('Digg', 'dfd-native'),
						'dfd-socicon-dribbble' => esc_html__('Dribbble', 'dfd-native'),
						'dfd-socicon-dropbox' => esc_html__('Dropbox', 'dfd-native'),
						'dfd-socicon-evernote' => esc_html__('Evernote', 'dfd-native'),
						'dfd-socicon-facebook' => esc_html__('Facebook', 'dfd-native'),
						'dfd-socicon-flickr' => esc_html__('Flickr', 'dfd-native'),
						'dfd-socicon-instagram' => esc_html__('Instagram', 'dfd-native'),
						'dfd-socicon-lastfm' => esc_html__('LastFM', 'dfd-native'),
						'dfd-socicon-linkedin' => esc_html__('LinkedIN', 'dfd-native'),
						'dfd-socicon-picasa' => esc_html__('Picasa', 'dfd-native'),
						'dfd-socicon-pinterest' => esc_html__('Pinterest', 'dfd-native'),
						'dfd-socicon-rss' => esc_html__('RSS', 'dfd-native'),
						'dfd-socicon-tumblr' => esc_html__('Tumblr', 'dfd-native'),
						'dfd-socicon-twitter' => esc_html__('Twitter', 'dfd-native'),
						'dfd-socicon-vimeo' => esc_html__('Vimeo', 'dfd-native'),
						'dfd-socicon-wordpress' => esc_html__('WordPress', 'dfd-native'),
						'dfd-socicon-youtube' => esc_html__('YouTube', 'dfd-native'),
						'dfd-socicon-px-icon' => esc_html__('500px', 'dfd-native'),
						'dfd-socicon-vb' => esc_html__('ViewBug', 'dfd-native'),
						'dfd-socicon-spotify' => esc_html__('Spotify', 'dfd-native'),
						'dfd-socicon-houzz-dark-icon' => esc_html__('Houzz', 'dfd-native'),
						'dfd-socicon-skype' => esc_html__('Skype', 'dfd-native'),
						'dfd-socicon-slideshare' => esc_html__('Slideshare', 'dfd-native'),
						'dfd-socicon-bandcamp-logo' => esc_html__('Bandcamp', 'dfd-native'),
						'dfd-socicon-soundcloud' => esc_html__('Soundcloud', 'dfd-native'),
						'dfd-socicon-Meerkat-color' => esc_html__('Meerkat', 'dfd-native'),
						'dfd-socicon-periscope' => esc_html__('Periscope', 'dfd-native'),
						'dfd-socicon-snapchat' => esc_html__('Snapchat', 'dfd-native'),
						'dfd-socicon-the-city' => esc_html__('The City', 'dfd-native'),
						'dfd-socicon-behance' => esc_html__('Behance', 'dfd-native'),
						'dfd-socicon-pinpoint' => esc_html__('Microsoft Pinpoint', 'dfd-native'),
						'dfd-socicon-viadeo' => esc_html__('Viadeo', 'dfd-native'),
						'dfd-socicon-tripadvisor' => esc_html__('TripAdvisor', 'dfd-native'),
						'dfd-socicon-vkontakt' => esc_html__('VKontakte', 'dfd-native'),
						'dfd-socicon-ok' => esc_html__('Odnoklassniki', 'dfd-native'),
					],
					'default' => 'dfd-socicon-deviantart'
				]
		);
		$this->add_control(
				'sliding_direction',
				[
					'label' => esc_html__('Sliding direction', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'left_to_right' => esc_html__('Sliding icon', 'dfd-native'),
						'right_to_left' => esc_html__('Sliding background', 'dfd-native'),
						'top_to_bottom' => esc_html__('Fade', 'dfd-native'),
						'bottom_to_top' => esc_html__('Appear out', 'dfd-native')
					],
					'default' => 'left_to_right',
					'condition' => [
						'main_style' => ['style-1', 'style-2', 'style-7']
					]
				]
		);
		$repeater->add_control(
				'soc_url',
				[
					'label' => esc_html__('URL', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::URL,
				]
		);
		$this->add_control(
				'dfd_social_networks',
				[
					'label' => esc_html__('Social accounts', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls()
				]
		);
		$this->end_controls_section();
		$this->start_controls_section(
				'pagination_section',
				[
					'label' => esc_html__('Icon style', 'dfd-native'),
				]
		);
		$this->add_control(
				'icon_font_size',
				[
					'label' => esc_html__('Icon size', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'min' => 10,
					'max' => 40,
				]
		);
		$this->add_control(
				'standard_icon_color',
				[
					'label' => esc_html__('Colored icon', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'default' => 'yes',
					'condition' => [
						'main_style' => ['style-1', 'style-2', 'style-3', 'style-4']
					]
				]
		);
		$this->add_control(
				'icon_margin',
				[
					'label' => esc_html__('Space between icons', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::NUMBER,
				]
		);
		$this->add_control(
				'border_radius',
				[
					'label' => esc_html__('Border radius', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'condition' => [
						'main_style' => ['style-1', 'style-2', 'style-3', 'style-4', 'style-5', 'style-8']
					]
				]
		);
		$this->add_control(
				'icon_border',
				[
					'label' => esc_html__('Border', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'default' => 'no',
					'condition' => [
						'main_style' => ['style-1', 'style-2', 'style-3', 'style-4']
					]
				]
		);
		$this->add_control(
				'border_width',
				[
					'label' => esc_html__('Border width', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'condition' => [
						'main_style' => ['style-1', 'style-2', 'style-3', 'style-4'],
						'icon_border' => 'yes'
					]
				]
		);
		$this->add_control(
				'border_color',
				[
					'type' => \Elementor\Controls_Manager::COLOR,
					'label' => esc_html__('Border color', 'dfd-native'),
					'scheme' => [
						'type' => \Elementor\Core\Schemes\Color::get_type(),
						'value' => \Elementor\Core\Schemes\Color::COLOR_1,
					],
					'condition' => [
						'main_style' => ['style-1', 'style-2', 'style-3', 'style-4', 'style-7'],
						'icon_border' => 'yes'
					]
				]
		);
		$this->add_control(
				'customizable_colors',
				[
					'label' => esc_html__('Customizable colors', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'default' => 'no',
					'condition' => [
						'main_style' => ['style-1', 'style-2', 'style-3', 'style-4', 'style-7']
					],
					'separator' => 'before'
				]
		);
		$this->add_control(
				'icon_color',
				[
					'type' => \Elementor\Controls_Manager::COLOR,
					'label' => esc_html__('Icon color', 'dfd-native'),
					'scheme' => [
						'type' => \Elementor\Core\Schemes\Color::get_type(),
						'value' => \Elementor\Core\Schemes\Color::COLOR_1,
					],
					'condition' => [
						'main_style' => ['style-1', 'style-2', 'style-3', 'style-4', 'style-7'],
						'customizable_colors' => 'yes'
					]
				]
		);
		$this->add_control(
				'icon_background_color',
				[
					'type' => \Elementor\Controls_Manager::COLOR,
					'label' => esc_html__('Icon background color', 'dfd-native'),
					'scheme' => [
						'type' => \Elementor\Core\Schemes\Color::get_type(),
						'value' => \Elementor\Core\Schemes\Color::COLOR_1,
					],
					'condition' => [
						'main_style' => ['style-1', 'style-2', 'style-3', 'style-4', 'style-7'],
						'customizable_colors' => 'yes'
					]
				]
		);
		$this->add_control(
				'customizable_hover_colors',
				[
					'label' => esc_html__('Customizable hover colors', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'default' => 'no',
					'condition' => [
						'main_style' => ['style-1', 'style-2', 'style-3', 'style-4', 'style-7']
					]
				]
		);
		$this->add_control(
				'icon_hover_color',
				[
					'type' => \Elementor\Controls_Manager::COLOR,
					'label' => esc_html__('Icon hover color', 'dfd-native'),
					'scheme' => [
						'type' => \Elementor\Core\Schemes\Color::get_type(),
						'value' => \Elementor\Core\Schemes\Color::COLOR_1,
					],
					'condition' => [
						'customizable_hover_colors' => 'yes',
					]
				]
		);
		
		$this->add_control(
				'icon_hover_background_color',
				[
					'type' => \Elementor\Controls_Manager::COLOR,
					'label' => esc_html__('Icon background hover color', 'dfd-native'),
					'scheme' => [
						'type' => \Elementor\Core\Schemes\Color::get_type(),
						'value' => \Elementor\Core\Schemes\Color::COLOR_1,
					],
					'condition' => [
						'customizable_hover_colors' => 'yes'
					]
				]
		);
		$this->end_controls_section();
	}

	protected function render() {

		$output = $link = $link_atts = $el_class = '';
		$border_radius = $border_width = $link_css = '';
		$line_height_height = $line_height_ofset = $line_height = '';
		$a_style = $a_before_style = $i_style = $icon_style_html = '';
		$prefix_html = $sufix_html = '';

		$settings = $this->get_settings_for_display();

		$uniqid = uniqid('dfd-soc-icon-') . '-' . rand(1, 9999);

		$el_class .= ' ' . esc_attr($settings['info_alignment']) . ' ' . esc_attr($settings['main_style']);
		if (isset($settings['main_style']) && strcmp($settings['main_style'], 'style-1') == 0 || strcmp($settings['main_style'], 'style-2') == 0 || strcmp($settings['main_style'], 'style-7') == 0) {
			$el_class .= ' ' . esc_attr($settings['sliding_direction']);
		}
		if (isset($settings['standard_icon_color']) && strcmp($settings['standard_icon_color'], 'yes') == 0) {
			$el_class .= ' standard-color';
		}
		if (isset($settings['icon_font_size']) && !empty($settings['icon_font_size'])) {
			$a_style .= 'font-size: ' . esc_attr($settings['icon_font_size']) . 'px; ';
			$line_height_height = esc_attr($settings['icon_font_size']) * 2.5;
		} else {
			$line_height_height = 50;
		}
		if (isset($settings['border_radius']) && !empty($settings['border_radius'])) {
			$a_style .= 'border-radius: ' . esc_attr($settings['border_radius']) . 'px; ';
		}
		if (is_rtl()) {
			if (isset($settings['icon_margin']) && !empty($settings['icon_margin'])) {
				$a_style .= 'margin-left: ' . esc_attr($settings['icon_margin']) . 'px; ';
				if (isset($settings['main_style']) && strcmp($settings['main_style'], 'style-7') == 0) {
					$link_css .= '#' . esc_js($uniqid) . '.dfd-soc-icon .container-3d {margin-left: ' . esc_attr($settings['icon_margin']) . 'px;}';
				}
			}
		} else {
			if (isset($settings['icon_margin']) && !empty($settings['icon_margin'])) {
				$a_style .= 'margin-right: ' . esc_attr($settings['icon_margin']) . 'px; ';
				if (isset($settings['main_style']) && strcmp($settings['main_style'], 'style-7') == 0) {
					$link_css .= '#' . esc_js($uniqid) . '.dfd-soc-icon .container-3d {margin-right: ' . esc_attr($settings['icon_margin']) . 'px;}';
				}
			}
		}
		if ($settings['icon_border'] == 'yes') {
			$el_class .= ' with-border';
			if (isset($border_width) && !empty($settings['border_width'])) {
				$a_before_style .= 'border-width: ' . esc_attr($settings['border_width']) . 'px; ';
				$line_height_ofset = esc_attr((int) $settings['border_width']) * 2;
			}
			$line_height = $line_height_height - (int) $line_height_ofset;
			$a_before_style .= 'line-height: ' . $line_height . 'px; ';
		}
		if (isset($settings['icon_color']) && !empty($settings['icon_color'])) {
			$a_style .= 'color: ' . esc_attr($settings['icon_color']) . '; ';
		}
		if (isset($settings['icon_background_color']) && !empty($settings['icon_background_color'])) {
			if (isset($settings['main_style']) && strcmp($settings['main_style'], 'style-7') == 0) {
				$a_before_style .= 'background: ' . esc_attr($settings['icon_background_color']) . '; ';
			} else {
				$a_style .= 'background: ' . esc_attr($settings['icon_background_color']) . '; ';
			}
		}
		if (isset($settings['customizable_hover_colors']) && strcmp($settings['customizable_hover_colors'], 'yes') == 0) {
			if (isset($settings['icon_hover_color']) && !empty($settings['icon_hover_color'])) {
				$i_style .= 'color: ' . esc_attr($settings['icon_hover_color']) . '; ';
				$link_css .= '#' . esc_js($uniqid) . '.dfd-soc-icon.style-2 a:hover {color: ' . esc_js($settings['icon_hover_color']) . ';}';
				$link_css .= '#' . esc_js($uniqid) . '.dfd-soc-icon.style-3 a:hover:before {color: ' . esc_js($settings['icon_hover_color']) . ';}';
				$link_css .= '#' . esc_js($uniqid) . '.dfd-soc-icon.style-4 a:hover:before {color: ' . esc_js($settings['icon_hover_color']) . ';}';
			}
			if (isset($settings['icon_hover_background_color']) && !empty($settings['icon_hover_background_color'])) {
				$i_style .= 'background: ' . esc_js($settings['icon_hover_background_color']) . '; ';
				$link_css .= '#' . esc_js($uniqid) . '.dfd-soc-icon.style-3 a:hover:before {background: ' . esc_js($settings['icon_hover_background_color']) . '; border-color: ' . esc_js($settings['icon_hover_background_color']) . ';}';
			}
		}
		if (isset($settings['main_style']) && strcmp($settings['main_style'], 'style-2') == 0 && empty($settings['icon_hover_color'])) {
			$link_css .= '#' . esc_js($uniqid) . '.dfd-soc-icon.style-2 a:hover {color: #ffffff;}';
		}
		if (!empty($a_style)) {
			$link_css .= '#' . esc_js($uniqid) . '.dfd-soc-icon a {' . $a_style . '}';
		}
		if (!empty($a_before_style)) {
			$link_css .= '#' . esc_js($uniqid) . '.dfd-soc-icon a:before {' . $a_before_style . '}';
		}
		if (!empty($i_style)) {
			$link_css .= '#' . esc_js($uniqid) . '.dfd-soc-icon a i {' . $i_style . '}';
		}

		if (isset($settings['main_style']) && strcmp($settings['main_style'], 'style-7') == 0) {
			$prefix_html = '<span class="container-3d">';
			$sufix_html = '</span>';
		}

		$output .= '<div id="' . esc_attr($uniqid) . '" class="dfd-soc-icon ' . esc_attr($el_class) . '">';
		$output .= '<div class="soc-icon-container clearfix">';
		foreach ($settings['dfd_social_networks'] as $network) {
			$icon_style_html = $single_icon = $link_atts_url = $link_atts_title = $link_atts_target = $link_atts_rel = $link_atts_t = '';
			if (isset($network['dfd_social_networks_sel']) && isset($network['soc_url']['url'])) {
				if (!empty($network['soc_url']['url'])) {
					$link_atts_t .= 'href="' . (!empty($network['soc_url']['url']) ? esc_url($network['soc_url']['url']) : '#') . '"';
					$link_atts_t .= ' target="' . (!empty($network['soc_url']['is_external']) ? '_blank' : '_self' ) . '"';
					$link_atts_t .= !empty($network['soc_url']['nofollow']) ? ' rel="nofollow"' : '';
					$link_atts_t .= !empty($network['soc_url']['custom_attributes']) ? ' ' . esc_attr($network['soc_url']['custom_attributes']) : '';
				}
				$icon_style_html = '<i class="' . esc_attr($network['dfd_social_networks_sel']) . '"></i>';
				$output .= $prefix_html . '<a ' . $link_atts_t . ' class="' . esc_attr($network['dfd_social_networks_sel']) . '">' . $icon_style_html . '</a>' . $sufix_html;
			}
		}

		$output .= '</div>';

		if (!empty($link_css)) {
			$output .= '<script type="text/javascript">'
					. '(function($) {'
					. '$("head").append("<style>' . $link_css . '</style>");'
					. '})(jQuery);'
					. '</script>';
		}

		$output .= '</div>';

		echo $output;
	}

}
