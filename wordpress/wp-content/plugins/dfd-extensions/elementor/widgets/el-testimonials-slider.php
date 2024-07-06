<?php
if (!defined('ABSPATH')) {
	exit;
}

class El_Testimonials_Slider extends \Elementor\Widget_Base {

	public function get_name() {
		return 'el_testimonials_slider';
	}

	public function get_title() {
		return esc_html__('DFD Testimonials slider', 'dfd-native');
	}

	public function get_categories() {
		return ['native-category'];
	}

	public function get_icon() {
		return 'dfd_testimonials_slider';
	}

	protected function register_controls() {

		$this->start_controls_section(
			'el_testimonials_slider',
			[
				'label' => esc_html__('Testimonials slider', 'dfd-native'),
			]
		);
		$this->add_control(
			'main_layout',
			[
				'label' => esc_html__('Style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'layout-1' => esc_html__('Simple', 'dfd-native'),
					'layout-2' => esc_html__('Centered', 'dfd-native'),
					'layout-3' => esc_html__('Full width', 'dfd-native')
				],
				'default' => 'layout-1'
			]
		);
		$this->add_control(
			'style',
			[
				'label' => esc_html__('Style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'above' => esc_html__('Above content', 'dfd-native'),
					'below' => esc_html__('Below content', 'dfd-native')
				],
				'default' => 'above'
			]
		);
		$this->add_control(
			'align',
			[
				'label' => esc_html__('Alignment', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'dfd-native'),
						'icon' => 'eicon-text-align-left'
					],
					'center' => [
						'title' => esc_html__('Center', 'dfd-native'),
						'icon' => 'eicon-text-align-center'
					],
					'right' => [
						'title' => esc_html__('Right', 'dfd-native'),
						'icon' => 'eicon-text-align-right'
					]
				],
				'default' => 'left',
			]
		);
		$this->add_control(
			'title_subtitle_nowrap',
			[
				'label' => esc_html__('One line title', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'no'
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'client_photo',
			[
				'label' => esc_html__('Author image', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);
		$repeater->add_control(
			'subtitle',
			[
				'label' => esc_html__('Subtitle', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
			'testimonial_text',
			[
				'label' => esc_html__('Testimonial', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXTAREA
			]
		);
		$this->add_control(
			'testimonial_content',
			[
				'label' => esc_html__('Testimonial content', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls()
			]
		);
		$this->add_control(
			'draggable',
			[
				'label' => esc_html__('Draggable effect', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'separator' => 'before'
			]
		);
		$this->add_control(
			'autoplay',
			[
				'label' => esc_html__('Autoplay‏', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_control(
			'autoplay_speed',
			[
				'label' => esc_html__('Autoplay‏ speed', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'autoplay' => 'yes'
				]
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'thumb_t_heading',
			[
				'label' => esc_html__('Author image style', 'dfd-native'),
			]
		);
		$this->add_control(
			'shadow',
			[
				'label' => esc_html__('Shadow', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_control(
			'thumb_size',
			[
				'label' => esc_html__('Image size', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
			]
		);
		$this->add_control(
			'thumb_radius',
			[
				'label' => esc_html__('Border radius', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'testimonial_bg_head',
			[
				'label' => esc_html__('Testimonial background', 'dfd-native'),
			]
		);
		$this->add_control(
			'bg_testim_block_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Background color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
//				'selectors' => [
//					'{{WRAPPER}} .dfd-testimonial-slider .testimonials-slider .content-wrap-bg' => 'background-color: {{SCHEME}};',
//				],
				'default' => 'transparent'
			]
		);
		$this->add_control(
			'bg_radius',
			[
				'label' => esc_html__('Border radius', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
			]
		);
		$this->add_control(
			'show_triangle',
			[
				'label' => esc_html__('Triangle pointer', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'pagination_section',
			[
				'label' => esc_html__('Pagination & navigation settings', 'dfd-native'),
			]
		);
		$this->add_control(
			'use_dots',
			[
				'label' => esc_html__('Pagination', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_control(
			'dots_style',
			[
				'label' => esc_html__('Pagination style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'dfdrounded' => esc_html__('Rounded', 'dfd-native'),
					'dfdfillrounded' => esc_html__('Filled rounded', 'dfd-native'),
					'dfdemptyrounded' => esc_html__('Transparent rounded', 'dfd-native'),
					'dfdfillsquare' => esc_html__('Filled square', 'dfd-native'),
					'dfdsquare' => esc_html__('Square', 'dfd-native'),
					'dfdemptysquare' => esc_html__('Transparent square', 'dfd-native'),
					'dfdline' => esc_html__('Line', 'dfd-native'),
					'dfdadvancesquare' => esc_html__('Advanced square', 'dfd-native'),
					'dfdroundedempty' => esc_html__('Rounded Empty', 'dfd-native'),
					'dfdroundedfilled' => esc_html__('Rounded Filled', 'dfd-native'),
				],
				'default' => 'dfdrounded',
				'condition' => [
					'use_dots' => 'yes'
				],
			]
		);
		$this->add_control(
			'use_nav',
			[
				'label' => esc_html__('Navigation', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'main_layout' => ['layout-1', 'layout-2']
				]
			]
		);
		$this->add_control(
			'arrow_icon',
			[
				'label' => esc_html__('Arrow Icon', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'arrow_style_1' => esc_html__('Style 1', 'dfd-native'),
					'arrow_style_2' => esc_html__('Style 2', 'dfd-native'),
					'arrow_style_3' => esc_html__('Style 3', 'dfd-native'),
					'arrow_style_4' => esc_html__('Style 4', 'dfd-native'),
					'arrow_style_5' => esc_html__('Style 5', 'dfd-native'),
				],
				'default' => 'arrow_style_1',
				'condition' => [
					'use_nav' => 'yes'
				],
			]
		);
		$this->add_control(
			'arrow_icon_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Icon color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .icon-arrow' => 'color: {{SCHEME}};'
				],
				'default' => '#fff'
			]
		);
		$this->add_control(
			'arrow_icon_hover_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Icon hover color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .slick-prev:hover .icon-arrow, {{WRAPPER}} .slick-next:hover .icon-arrow' => 'color: {{SCHEME}};'
				]
			]
		);
		$this->add_control(
			'arrow_icon_size',
			[
				'label' => esc_html__('Icon size', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
//				'selectors' => [
//					'{{WRAPPER}} .icon-arrow:before' => 'font-size: {{SCHEME}}px;'
//				]
			]
		);
		$this->add_control(
			'arrow_bg_border_radius',
			[
				'label' => esc_html__('Background border radius', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'selectors' => [
					'{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'border-radius: {{SCHEME}}px;'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'arrow_bg_border',
				'selector' => '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next'
			]
		);

		$this->add_control(
			'arrow_bg_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Background color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'background-color: {{SCHEME}};'
				]
			]
		);
		$this->add_control(
			'arrow_bg_hover_border_heading',
			[
				'label' => esc_html__('Test', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'arrow_bg_hover_border',
				'selector' => '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover'
			]
		);
		$this->add_control(
			'arrow_hover_bg_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Hover background color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .navigation_arrows .slick-prev:hover,{{WRAPPER}} .navigation_arrows .slick-next:hover' => 'background-color: {{SCHEME}};'
				]
			]
		);

		$this->add_control(
			'arrow_use_shadow_on_hover',
			[
				'label' => esc_html__('Shadow on hover', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'selectors' => [
					'{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'box-shadow: 7.5px 12.99px 30px 0px rgba(34, 35, 40, 0.137);'
				],
				'separator' => 'before'
			]
		);
		$this->add_control(
			'arrow_use_navigation',
			[
				'label' => esc_html__('Navigation Numbers', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$this->add_control(
			'arrow_navigation_text_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Numbers color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'condition' => [
					'arrow_use_navigation' => 'yes'
				],
				'selectors' => [
					'{{WRAPPER}} .t_stats' => 'color: {{SCHEME}};'
				]
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'typography_section',
			[
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'label' => esc_html__('Typography', 'dfd-native'),
			]
		);
		$this->add_control(
			'title_html_tag',
			[
				'label' => esc_html__('Title HTML Tag', 'elementor'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'div',
			]
		);
		$this->add_control(
			'title_t_heading',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Title color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .testim-slider-title' => 'color: {{SCHEME}};'
				]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'style-title-typography',
				'label' => esc_html__('Title typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .testim-slider-title',
			]
		);

		$this->add_control(
			'subtitle_html_tag',
			[
				'label' => esc_html__('Subtitle HTML Tag', 'elementor'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'div',
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Subtitle color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .testim-slider-subtitle' => 'color: {{SCHEME}};'
				]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'style-subtitle-typography',
				'label' => esc_html__('Subtitle typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .testim-slider-subtitle',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'style-description-typography',
				'label' => esc_html__('Content typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .testimonial-text',
			]
		);
		$this->add_control(
			'content_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Content color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial-text' => 'color: {{SCHEME}};'
				]
			]
		);
		$this->end_controls_section();
	}

	protected function render() {

		global $dfd_native;
		$alt = $style = $align = '';
		$controls_html = $thumbs_html = $content_html = $delimiter_html = $content_style = $quote_size = $quote_style = '';
		$quote_hide = $image_style = $line_width = $line_border = $line_color = $delimiter_style = $thumb_size = $shadow = '';
		$draggable = $rtl = $nav_style = $show_triangle = '';
		$el_class = $output = $link_css = $column = '';

		$settings = $this->get_settings_for_display();

		$_autoplay = 'false';
		if(isset($settings['autoplay']) && $settings['autoplay'] == 'yes') {
			$_autoplay = 'true';
		}
		
		$shadow = "show";
		$use_dots = "show";

		$uniqid = uniqid('testimonial-slider') . '-' . rand(1, 9999);

		if (!isset($settings['autoplay_speed']) || $settings['autoplay_speed'] == '') {
			$settings['autoplay_speed'] = '5000';
		}

		if (!isset($settings['thumb_size']) || $settings['thumb_size'] == '') {
			$settings['thumb_size'] = '90';
		}
		if ($settings['show_triangle'] == "yes") {
			$show_triangle = true;
			$el_class .= ' show_triangle';
		} else {
			$show_triangle = false;
		}

		$no_image = DFD_EXTENSIONS_PLUGIN_URL . 'assets/img/no-user.png';

		$el_class .= ' ' . $settings['style'] . ' ';
		$el_class .= ' align-' . $settings['align'];
		if (isset($settings['title_subtitle_nowrap']) && $settings['title_subtitle_nowrap'] == 'yes') {
			$el_class .= ' title-subtitle-nowrap';
		}

		if ($settings['dots_style'] != '')
			$el_class .= ' ' . $settings['dots_style'] . ' ';
		/*		 * ************************
		 * Delimiter HTML.
		 * *********************** */

		if ($line_width || $line_border || $line_color) {
			$delimiter_style .= 'style="';
			if ($line_width != "") {
				$delimiter_style .= 'width:' . $line_width . 'px;';
			}
			if ($line_border != "") {
				$delimiter_style .= 'border-width:' . $line_border . 'px;';
			}
			if ($line_color) {
				$delimiter_style .= 'border-color:' . $line_color;
			}
			$delimiter_style .= '"';
		}

//

		/*		 * ***********************
		 * Testimonials thumbs.
		 * *********************** */

		if (!empty($settings['thumb_radius']) || $settings['thumb_radius'] != "") {
			$image_style .= 'style="border-radius:' . $settings['thumb_radius'] . 'px;"';
		}
		if (!empty($settings['shadow'] && $settings['shadow'] == 'yes')) {
			$shadow = 'enable-shadow';
		}

		$right_style = '';
		$rtl = 'false';
		$style_width_thumb_below = '';
		$nav_style = ' width: ' . ( ( intval($settings['thumb_size']) + 29) * 3 ) . 'px;';

		if (strcmp($settings['style'], 'below') === 0) {
			$nav_style = ' width: ' . ( ( intval($settings['thumb_size']) + 55 + 20 ) * 3 ) . 'px;';
			$style_width_thumb_below = 'style="width: ' . (intval($settings['thumb_size']) + 55) . 'px;"';
		}
		/*
		 * styles
		 */
		$slider_options_config = array();
		$slider_options_config["draggable"] = ($settings['draggable'] == 'yes' ? 'true' : 'false');
		$slider_options_config["variableWidth"] = "false";
		$slider_options_config["centered_content"] = "false";
		$slider_options_config["centered_thumb"] = "false";
		$slider_options_config["centerPadding"] = "";
		switch ($settings['main_layout']) {
			case "layout-1":
				if ($settings['use_nav'] == "yes") {
					$column = "ten";
				} else {
					$column = "twelve";
				}

				break;
			case "layout-2":
				$slider_options_config["draggable"] = "false";
				$slider_options_config["variableWidth"] = "true";
				$slider_options_config["centered_content"] = "false";
				$slider_options_config["centered_thumb"] = "true";
				if ($settings['use_nav'] == "yes") {
					$column = "ten";
				} else {
					$column = "twelve";
				}
				break;
			case "layout-3":
				$column = "twelve";
				if ($testimonials > 1) {
					$column = "four";
					$slider_options_config["centered_content"] = "true";
					$slider_options_config["centered_thumb"] = "true";
					$slider_options_config["centerPadding"] = "0px";
				}
				break;

			default:
				if ($settings['use_nav'] == "yes") {
					$column = "ten";
				} else {
					$column = "twelve";
				}
				break;
		}

		$images_lazy_load = false;

		global $dfd_native;

		$thumb_size = $settings['thumb_size'];
		if (isset($dfd_native['enable_images_lazy_load']) && $dfd_native['enable_images_lazy_load'] == 'on') {
			$images_lazy_load = true;
			$el_class .= ' dfd-img-lazy-load ';
			$loading_img_src = "data:image/svg+xml;charset=utf-8,%3Csvg xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg' viewBox%3D'0 0 $thumb_size $thumb_size'%2F%3E";
		}

		/*
		 * Images
		 */
//		if (function_exists('vc_param_group_parse_atts')) {
//			$testimonials = (array) vc_param_group_parse_atts($testimonials);
//		}
		$testimonials = 0;
		foreach ($settings['testimonial_content'] as $fields) {
			$testimonials++;

			$testimonial_title = isset($fields['title']) ? $fields['title'] : "";

			if (isset($fields['client_photo'])) {
				$image_url = dfd_aq_resize($fields['client_photo']['url'], $settings['thumb_size'] * 1.5, $settings['thumb_size'] * 1.5, true, true, true);
				if (!$fields['client_photo']['url']) {
					$fields['client_photo']['url'] = $fields['client_photo']['url'];
				}
			} else {
				$fields['client_photo']['url'] = $no_image;
			}
			if(empty($image_url)) {
				$image_url = $fields['client_photo']['url'];
			}
			$alt = esc_attr(Dfd_Theme_Helpers::dfd_get_image_alt($fields['client_photo']['url']));

			$img_atts = Dfd_Theme_Helpers::get_image_attrs($fields['client_photo']['url'], $fields['client_photo']['id'], $settings['thumb_size'], $settings['thumb_size'], $alt);

			$thumbs_html .= '<a class="thumb" ' . $style_width_thumb_below . '>';
			if ($images_lazy_load) {
				$thumbs_html .= '<img src="' . $loading_img_src . '" data-src="' . $image_url . '" width="' . esc_attr(floor($settings['thumb_size'])) . '" height="' . esc_attr(floor($settings['thumb_size'])) . '" ' . $img_atts . ' ' . $image_style . '/>';
			} else {
				$thumbs_html .= '<img src="' . $image_url . '" width="' . esc_attr(floor($settings['thumb_size'])) . '" height="' . esc_attr(floor($settings['thumb_size'])) . '" ' . $img_atts . ' ' . $image_style . '/>';
			}
			if ('below' === $settings['style']) {

				$thumbs_html .= '<div class="below-title">';
				if (isset($fields['title'])) {
					$thumbs_html .= '<' . $settings['title_html_tag'] . ' class="testim-slider-title" >' . esc_html($fields['title']) . '</' . $settings['title_html_tag'] . '>';
				}
				if (isset($fields['subtitle'])) {
					$thumbs_html .= '<' . $settings['title_html_tag'] . ' class="testim-slider-subtitle" >' . esc_html($fields['subtitle']) . '</' . $settings['title_html_tag'] . '>';
				}
				$thumbs_html .= '</div>';
			}
			$thumbs_html .= '</a>';
		}

		$controls_html .= '<div class="testimonials-thumbs-wrap ' . $shadow . '" style="' . $nav_style . '"  ' . $right_style . '>';
		$controls_html .= '<div class="testimonials-thumbs-slider">';
		$controls_html .= $thumbs_html;
		$controls_html .= '</div>';
		$controls_html .= '</div>';

		/*		 * ************************
		 * background content.
		 * *********************** */
		$content_bg = "";
		$has_bg = "";
		if (!empty($settings['bg_radius']) || $settings['bg_radius'] != "" || !empty($settings['bg_testim_block_color']) || $settings['bg_testim_block_color'] != "") {
			$content_bg .= 'style="';
			if ($settings['bg_radius'] != "") {
				$content_bg .= ' border-radius:' . esc_attr($settings['bg_radius']) . 'px; ';
			}
			if ($settings['bg_testim_block_color'] != "") {
				$has_bg = "has_bg";
				$link_css .= '#' . esc_js($uniqid) . '.dfd-testimonial-slider .testimonials-slider .content-wrap-bg,'
					. '#' . esc_js($uniqid) . '.dfd-testimonial-slider .testimonials-slider .content-wrap-bg .triangle:before {background-color:' . esc_js($settings['bg_testim_block_color']) . ';}';
			}
			$content_bg .= '"';
		}
		if($settings['arrow_use_navigation'] == '') {
			$link_css .= '#'.esc_js($uniqid).' .t_stats {display: none;}';
		}
		if(!empty($settings['arrow_icon_size'])){
			$link_css .= '#'.esc_js($uniqid).' .slick-arrow-b {width: '.(int)$settings['arrow_icon_size'] * 3 .'px; height: '.(int)$settings['arrow_icon_size'] * 3 .'px;}';
			$link_css .= '#'.esc_js($uniqid).' .slick-arrow-b .icon-arrow {font-size: '.$settings['arrow_icon_size'].'px;}';
		}
		if($settings['bg_testim_block_color'] == '#00000000'){
			$link_css .= '#'.esc_js($uniqid).'.dfd-testimonial-slider.has_bg .dfd-testimonial-content {padding: 0px}';
		}
		if(!empty($settings['bg_testim_block_color'])){
			$link_css .= '#'.esc_js($uniqid).'.dfd-testimonial-slider .testimonials-slider .content-wrap-bg {background-color: '.$settings['bg_testim_block_color'].'}';
		}

		/*		 * ************************
		 * Content.
		 * *********************** */
		$content_html .= '<div class="testimonials-content-wrap" ' . $right_style . '>';
		if ($testimonials > 1) {
			if ($settings['use_nav'] == 'yes') {
				if ($settings['arrow_icon'] == 'arrow_style_1') {
					$icon_left = 'dfd-socicon-arrow-left-01';
					$icon_right = 'dfd-socicon-arrow-right-01';
				} elseif ($settings['arrow_icon'] == 'arrow_style_2') {
					$icon_left = 'dfd-socicon-arrow-left';
					$icon_right = 'dfd-socicon-arrow-right';
				} elseif ($settings['arrow_icon'] == 'arrow_style_3') {
					$icon_left = 'dfd-socicon-arrow-pointing-to-left';
					$icon_right = 'dfd-socicon-arrow-pointing-to-right';
				} elseif ($settings['arrow_icon'] == 'arrow_style_4') {
					$icon_left = 'dfd-socicon-left-arrow';
					$icon_right = 'dfd-socicon-arrowhead-pointing-to-the-right';
				} elseif ($settings['arrow_icon'] == 'arrow_style_5') {
					$icon_left = 'dfd-socicon-angle-pointing-to-left';
					$icon_right = 'dfd-socicon-angle-arrow-pointing-to-right';
				}

				$content_html .= '<div class="navigation_arrows">'
					. '<span class="slick-arrow-b slick-prev "><span class="icon-arrow ' . $icon_left . '"></span></span>'
					. '<span class="slick-arrow-b slick-next "><span class="icon-arrow ' . $icon_right . '"></span></span>'
					. '</div>';
			}
		}
		if (!empty($quote_size)) {
			$content_style .= 'style="min-height:' . $quote_size . 'px"';
		}
		$content_html .= '<div class="testimonials-slider">';
		$counter = 0;
		foreach ($settings['testimonial_content'] as $single_testimonial) {
			/*
			 * add default text if all content is empty
			 */
			$is_empty_all = true;
			if (isset($single_testimonial['testimonial_text']) && trim($single_testimonial['testimonial_text']) != "") {
				$is_empty_all = false;
			}
			if (isset($single_testimonial['title']) && trim($single_testimonial['title']) != "") {
				$is_empty_all = false;
			}
			if (isset($single_testimonial['subtitle']) && trim($single_testimonial['subtitle']) != "") {
				$is_empty_all = false;
			}
//			

			$content_html .= '<div class="testimonials-content">';
			$content_html .= '<div class="text-wrap" ' . $content_style . '>';
			$content_html .= '<div class="content-wrap-bg" ' . $content_bg . '><span class="triangle hide"></span></div>';

			if (isset($single_testimonial['testimonial_text']) && !empty($single_testimonial['testimonial_text'])) {
				$content_html .= '<div class="testimonial-text dfd-testimonial-content">' . strip_tags($single_testimonial['testimonial_text'], "<br><br/>") . '</div>';
			}
			$content_html .= '</div>';
			if ('above' === $settings['style']) {


				if (isset($single_testimonial['title'])) {
					$content_html .= '<' . $settings['title_html_tag'] . ' class="testim-slider-title">' . esc_html($single_testimonial['title']) . '</' . $settings['title_html_tag'] . '>';
				}
				if (isset($single_testimonial['subtitle'])) {
					$content_html .= '<' . $settings['subtitle_html_tag'] . ' class="testim-slider-subtitle">' . esc_html($single_testimonial['subtitle']) . '</' . $settings['subtitle_html_tag'] . '>';
				}
			}


			$content_html .= '</div>';
			$counter++;
		}
		$content_html .= '</div>';
		$content_html .= '</div>';

		/*		 * ************************
		 * Module
		 * *********************** */


		if ('center' === $settings['align']) {
			$centered_slider = 'true';
		} else {
			$centered_slider = 'false';
		}
		if ($settings['draggable'] == 'yes') {
			$draggable = 'true';
			$cls_draggable = " draggable ";
		} else {
			$cls_draggable = "";
			$draggable = "false";
		}
		if (( 'center' === $settings['align'] ) && ( $counter > 2 )) {
			$start_from = absint($counter / 2);
		} else {
			$start_from = '0';
		}

		$output .= '<div id="' . esc_attr($uniqid) . '" class="dfd-testimonial-slider  ' . $show_triangle . ' ' . $el_class . ' ' . $settings['main_layout'] . ' ' . $has_bg . ' ' . $cls_draggable . '"
				data-autoplay="' . $_autoplay . '"
				data-centered="' . $centered_slider . '"
				data-autoplay_speed="' . $settings['autoplay_speed'] . '"
				data-draggable="' . $draggable . '"
				data-start_slide="' . $start_from . '"
				data-rtl="' . $rtl . '"
				>';
		if ($link_css != '') {
			$output .= '<script type="text/javascript">'
							. '(function($) {'
								. '$("head").append("<style>' . $link_css . '</style>");'
							. '})(jQuery);'
					. '</script>';
		}
		$output .= '<div class="wrap_testimonials ' . $column . '">';
		if ('above' === $settings['style']) {
			$output .= $controls_html;
			$output .= $content_html;
		} else {
			$output .= $content_html;
			$output .= $controls_html;
		}
		$output .= '</div>';

		ob_start();
		?>
		<script type="text/javascript">
			(function ($) {
				"use strict";
				var $carousel = $('#<?php echo esc_js($uniqid); ?>');
				$(document).ready(function () {
					var use_dots_conttent = <?php
		if ($settings['style'] == "above") {
			if ($use_dots) {
				echo 'true';
			} else {
				echo 'false';
			}
		} else {
			echo 'false';
		}
		?>;
					var use_dots_thumb = <?php
		if ($settings['style'] == "above") {
			echo 'false';
		} else {
			if (!$use_dots) {
				echo 'false';
			} else {
				echo 'true';
			}
		}
		?>;
					var options = {
					};
					options.obj = $carousel;
					try {
						var dfd_T_S = new dfd_testimnials_slider(options);

						$carousel.find('.testimonials-slider').slick({
							slidesToShow: 1,
							slidesToScroll: 1,
							arrows: true,
							dotsClass: 'dfd-slick-dots',
							customPaging: function (slider, i) {
								return '<span data-role="none" role="button" aria-required="false" tabindex="0"></span>';
							},
							appendArrows: $carousel.find(".testimonials-content-wrap"),
							dots: use_dots_conttent,
							fade: false,
							asNavFor: $carousel.find('.testimonials-thumbs-slider'),
							centerPadding: '<?php echo $slider_options_config["centerPadding"]; ?>',

							centerMode: <?php echo $slider_options_config["centered_content"]; ?>,
							autoplay: $carousel.data('autoplay'),
							autoplaySpeed: $carousel.data('autoplay_speed'),
							draggable: $carousel.data('draggable'),
							infinite: true,
							rtl: $carousel.data('rtl'),
							initialSlide: 0

						});
						$carousel.find('.testimonials-thumbs-slider').slick({
							slidesToShow: 1,
							slidesToScroll: 1,
							asNavFor: $carousel.find('.testimonials-slider'),
							dots: use_dots_thumb,
							arrows: false,
							dotsClass: 'dfd-slick-dots',
							customPaging: function (slider, i) {
								return '<span data-role="none" role="button" aria-required="false" tabindex="0"></span>';
							},
							centerPadding: '<?php echo $slider_options_config["centerPadding"]; ?>',
							variableWidth: <?php echo $slider_options_config["variableWidth"]; ?>,
							draggable: <?php echo $slider_options_config["draggable"]; ?>,
							centerMode: <?php echo $slider_options_config["centered_thumb"]; ?>,
							initialSlide: 0,
							focusOnSelect: true,
							rtl: $carousel.data('rtl')
						});
						var s = $carousel.find('.testimonials-thumbs-slider').slick("getSlick");
						dfd_T_S.init(s);

						$carousel.on('afterChange', function (event, slick, currentSlide, nextSlide) {
							dfd_T_S.init(slick);
						});
					} catch (err) {
						console.log(err);
					}
				});
			})(jQuery);
		</script>
		<?php
		$output .= ob_get_clean();
		$output .= '</div>';
		echo $output;
	}

}
