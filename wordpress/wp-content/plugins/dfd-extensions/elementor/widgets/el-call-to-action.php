<?php

if (!defined('ABSPATH')) {
	exit;
}

class El_Call_To_Action extends \Elementor\Widget_Base {

	public function get_name() {
		return 'el_call_to_action';
	}

	public function get_title() {
		return esc_html__('DFD Call To Action', 'dfd-native');
	}

	public function get_categories() {
		return ['native-category'];
	}

	public function get_icon() {
		return 'dfd_call_to_action';
	}

	protected function register_controls() {

		$this->start_controls_section(
			'el_call_to_action',
			[
				'label' => esc_html__('Call To Action', 'dfd-native'),
			]
		);
		
		$this->add_control(
			'main_style',
			[
				'label' => esc_html__('Style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'style-1' => esc_html__('Tilt right', 'dfd-native'),
					'style-2' => esc_html__('Tilt left', 'dfd-native')
				],
				'default' => 'style-1'
			]
		);
		
		$this->add_control(
			'show_icon',
			[
				'label' => esc_html__('Icon', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		
		$this->add_control(
			'icon_type',
			[
				'label' => esc_html__('Icon to display', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'selector' => esc_html__('Icon', 'dfd-native'),
					'custom' => esc_html__('Image', 'dfd-native'),
					'text' => esc_html__('Text', 'dfd-native')
				],
				'condition' => [
					'show_icon' => 'yes'
				],
				'default' => 'selector',
			]
		);
		
		$this->add_control(
			'ic_dfd_icons',
			[
				'label' => esc_html__('Select Icon', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'dfd-socicon-film-strip-with-two-photograms',
					'library' => 'dfd_icons'
				],
				'condition' => [
					'icon_type' => 'selector',
					'show_icon' => 'yes'
				]
			]
		);
		
		$this->add_control(
			'icon_image_id',
			[
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label' => esc_html__('Upload Image', 'dfd-native'),
				'condition' => [
					'icon_type' => 'custom',
					'show_icon' => 'yes'
				]
			]
		);
		
		$this->add_control(
			'icon_text',
			[
				'label' => esc_html__('Text', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'icon_type' => 'text',
					'show_icon' => 'yes'
				]
			]
		);
		
		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__('Size', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'icon_type' => ['selector', 'custom'],
					'show_icon' => 'yes'
				],
				'selectors' => [
					'{{WRAPPER}} .featured-icon' => 'font-size: {{SCHEME}}px;'
				]
			]
		);
		
		$this->add_control(
			'icon_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .featured-icon' => 'color: {{SCHEME}};'
				],
				'condition' => [
					'icon_type' => 'selector',
					'show_icon' => 'yes'
				]
			]
		);
		
		$this->add_control(
			'block_title',
			[
				'separator' => 'before',
				'label' => esc_html__('Title', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Call to action title',
				'separator' => 'before'
			]
		);
		
		$this->add_control(
			'block_subtitle',
			[
				'label' => esc_html__('Subtitle', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Call to action title'
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
			'title_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Title color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .dfd-content-title-big' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'style-title-typography',
				'label' => esc_html__('Title typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .dfd-content-title-big',
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
				'separator' => 'before'
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
				'default' => '#FFFFFFA1',
				'selectors' => [
					'{{WRAPPER}} .call-to-action-subtitle' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'style-subtitle-typography',
				'label' => esc_html__('Subtitle typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .call-to-action-subtitle',
			]
		);

		$this->add_control(
			'button_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Button color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .button' => 'color: {{SCHEME}};'
				],
				'separator' => 'before'
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'style-button-typography',
				'label' => esc_html__('Button typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .button',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'button_t_heading',
			[
				'label' => esc_html__('Button settings', 'dfd-native'),
			]
		);
		
		$this->add_control(
			'show_b_icon',
			[
				'label' => esc_html__('Icon', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		
		$this->add_control(
			'ic_b_dfd_icons',
			[
				'label' => esc_html__('Select Icon', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'dfd-socicon-film-strip-with-two-photograms',
					'library' => 'dfd_icons'
				],
				'condition' => [
					'show_b_icon' => 'yes'
				]
			]
		);
		
		$this->add_control(
			'icon_b_size',
			[
				'label' => esc_html__('Size', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'show_b_icon' => 'yes'
				],
				'selectors' => [
					'{{WRAPPER}} .button' => 'font-size: {{SCHEME}}px;'
				]
			]
		);
		
		$this->add_control(
			'icon_b_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .button' => 'color: {{SCHEME}};'
				],
				'condition' => [
					'show_b_icon' => 'yes'
				]
			]
		);
		
		$this->add_control(
			'button_text',
			[
				'label' => esc_html__('Button text', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Leave reply'
			]
		);
		
		$this->add_control(
			'button_link',
			[
				'label' => esc_html__('Button link', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::URL
			]
		);
		
		$this->add_control(
			'horizontal_padding',
			[
				'label' => esc_html__('Blocks left/right padding', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'selectors' => [
					'{{WRAPPER}} .button' => 'font-size: {{SCHEME}}px;'
				]
			]
		);
		
		$this->add_control(
			'vertical_padding',
			[
				'label' => esc_html__('Blocks top/bottom padding', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'selectors' => [
					'{{WRAPPER}} .button' => 'font-size: {{SCHEME}}px;'
				]
			]
		);
		
		$this->add_control(
			'main_border_radius',
			[
				'label' => esc_html__('Blocks border radius', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'selectors' => [
					'{{WRAPPER}} .module-icon' => 'font-size: {{SCHEME}}px;'
				]
			]
		);
		
		$this->add_control(
			'button_block_bg',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Button Block Background Color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .module-icon' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->add_control(
			'main_bg_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Main Block Background Color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .main-tilted-decoration:before' => 'background: {{SCHEME}};'
				]
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'button_s_heading',
			[
				'label' => esc_html__('Button style', 'dfd-native'),
			]
		);
		
		$this->add_control(
			'bt_text_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Text Color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .module-icon' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->add_control(
			'bt_hover_text_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Text Hover Color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .module-icon' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->add_control(
			'button_bg',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Background Color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .module-icon' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->add_control(
			'button_hover_bg',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Hover Background Color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .button-container' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->add_control(
			'button_padding_left',
			[
				'label' => esc_html__('Padding left', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'selectors' => [
					'{{WRAPPER}} .button-container' => 'padding-left: {{SCHEME}}px;'
				]
			]
		);
		
		$this->add_control(
			'button_padding_right',
			[
				'label' => esc_html__('Padding right', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'selectors' => [
					'{{WRAPPER}} .button-container' => 'padding-right: {{SCHEME}}px;'
				]
			]
		);
		
		$this->add_control(
			'button_border_radius',
			[
				'label' => esc_html__('Border Radius', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'selectors' => [
					'{{WRAPPER}} .button-container' => 'border-radius: {{SCHEME}}px;'
				]
			]
		);
		
		$this->add_control(
			'bt_icon_size',
			[
				'label' => esc_html__('Icon size', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'selectors' => [
					'{{WRAPPER}} .button-container i' => 'font-size: {{SCHEME}}px;'
				]
			]
		);
		
		$this->add_control(
			'bt_icon_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Icon color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .button-container i' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->add_control(
			'bt_icon_hover_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Icon hover color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .button-container:hover i' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->end_controls_section();
	}

	protected function render() {

		$output = $uniqid = $link_css = $el_class = $title_font_options = $module_animation = '';
		$main_content_html = $button_content_html = $show_icon = $icon_type = $select_icon = $ic_dfd_icons = $ic_fontawesome = $ic_openiconic = '';
		$ic_typicons = $ic_entypo = $ic_linecons = $icon_image_id = $icon_text = $icon_size = $icon_color = $block_title = $button_text = $button_link = $show_bt_icon = '';
		$select_bt_icon = $bt_dfd_icons = $bt_fontawesome = $bt_openiconic = $bt_typicons = $bt_entypo = $bt_linecons = $main_border_radius = $horizontal_padding = '';
		$vertical_padding = $main_bg_color = $button_block_bg = $button_bg = $button_border_radius = $button_font_options = $block_subtitle = $bt_text_color = '';
		$icon_html = $title_html = $subtitle_html = $bt_icon_html = $link = $bg_size_image = $bt_icon_color = $bt_icon_size = $bt_hover_text_color = '';
		$button_hover_bg = $bt_icon_hover_color = $link_title = $link_rel = $link_target = $button_padding_left = $button_padding_right = '';

		$settings = $this->get_settings_for_display();

		$uniqid = uniqid('dfd-call-to-action-') . '-' . rand(1, 9999);

		$el_class .= ' ' . $settings['main_style'];

		if (isset($settings['show_icon']) && strcmp($settings['show_icon'], 'yes') == 0) {
			$icon_html .= dfd_elementor_icon_render($settings, $settings['icon_size']);
		}
		if (isset($settings['show_b_icon']) && strcmp($settings['show_b_icon'], 'yes') == 0) {
			$el_class .= ' with_icon';
		}
		if (isset($settings['block_title']) && !empty($settings['block_title'])) {
			$title_html = '<' . $settings['title_html_tag'] . ' class="dfd-content-title-big">' . esc_html($settings['block_title']) . '</' . $settings['title_html_tag'] . '>';
		}
		if (isset($settings['block_subtitle']) && !empty($settings['block_subtitle'])) {
			$subtitle_html = '<' . $settings['subtitle_html_tag'] . ' class="call-to-action-subtitle" >' . esc_html($settings['block_subtitle']) . '</' . $settings['subtitle_html_tag'] . '>';
		}

		if (isset($settings['horizontal_padding']) && !empty($settings['horizontal_padding']) || strcmp($settings['horizontal_padding'], 0) === 0) {
			$link_css .= '#' . esc_js($uniqid) . '.style-1 .content-block {padding-left: ' . esc_js($settings['horizontal_padding']) . 'px; padding-right: ' . esc_js($settings['horizontal_padding'] + 5) . 'px;}';
			$link_css .= '@media only screen and (max-width: 799px) {#' . esc_js($uniqid) . '.style-1 .content-block {padding-right: ' . esc_js($settings['horizontal_padding']) . 'px;}}';
			$link_css .= '#' . esc_js($uniqid) . '.style-1 .button-block {padding-left: ' . esc_js($settings['horizontal_padding'] + 5) . 'px; padding-right: ' . esc_js($settings['horizontal_padding']) . 'px;}';
			$link_css .= '@media only screen and (max-width: 799px) {#' . esc_js($uniqid) . '.style-1 .button-block {padding-left: ' . esc_js($settings['horizontal_padding']) . 'px;}}';
			$link_css .= '#' . esc_js($uniqid) . '.style-2 .content-block {padding-left: ' . esc_js($settings['horizontal_padding'] + 5) . 'px; padding-right: ' . esc_js($settings['horizontal_padding']) . 'px;}';
			$link_css .= '@media only screen and (max-width: 799px) {#' . esc_js($uniqid) . '.style-2 .content-block {padding-left: ' . esc_js($horizontal_padding) . 'px;}}';
			$link_css .= '#' . esc_js($uniqid) . '.style-2 .button-block {padding-left: ' . esc_js($settings['horizontal_padding']) . 'px; padding-right: ' . esc_js($settings['horizontal_padding'] + 5) . 'px;}';
			$link_css .= '@media only screen and (max-width: 799px) {#' . esc_js($uniqid) . '.style-2 .button-block {padding-right: ' . esc_js($settings['horizontal_padding']) . 'px;}}';
		}
		if (isset($settings['vertical_padding']) && !empty($settings['vertical_padding']) || strcmp($settings['vertical_padding'], 0) === 0) {
			$link_css .= '#' . esc_js($uniqid) . ' .content-block, #' . esc_js($uniqid) . ' .button-block {padding-top: ' . esc_js($settings['vertical_padding']) . 'px; padding-bottom: ' . esc_js($settings['vertical_padding']) . 'px;}';
		}
		if (isset($settings['main_border_radius']) && !empty($settings['main_border_radius']) || strcmp($settings['main_border_radius'], 0) === 0) {
			$link_css .= '#' . esc_js($uniqid) . ' {border-radius: ' . esc_js($settings['main_border_radius']) . 'px;}';
		}
		if (isset($settings['button_block_bg']) && !empty($settings['button_block_bg'])) {
			$link_css .= '#' . esc_js($uniqid) . ' .button-tilted-decoration:before {background: ' . esc_js($settings['button_block_bg']) . ';}';
		}
		if (isset($settings['[bt_text_color']) && !empty($settings['bt_text_color'])) {
			$link_css .= '#' . esc_js($uniqid) . ' .button-container .button {color: ' . esc_js($settings['bt_text_color']) . ';}';
		}
		if (isset($settings['bt_hover_text_color']) && !empty($settings['bt_hover_text_color'])) {
			$link_css .= '#' . esc_js($uniqid) . ' .button-container .button:hover {color: ' . esc_js($settings['bt_hover_text_color']) . ';}';
		}
		if (isset($settings['button_bg']) && !empty($settings['button_bg'])) {
			$link_css .= '#' . esc_js($uniqid) . ' .button-container {background: ' . esc_js($settings['button_bg']) . ';}';
		}
		if (isset($settings['button_hover_bg']) && !empty($settings['button_hover_bg'])) {
			$link_css .= '#' . esc_js($uniqid) . ' .button-container .button:hover {background: ' . esc_js($settings['button_hover_bg']) . ';}';
		}
		if (isset($settings['icon_size']) && strcmp($settings['icon_size'], '') != 0) {
			$link_css .= '#' . esc_js($uniqid) . ' .icon-wrap.custom {min-width: ' . esc_js($settings['icon_size']) + 30 . 'px;}';
		}

		$main_content_html .= '<div class="content-block">';
			$main_content_html .= '<span class="main-tilted-decoration"></span>';
			$main_content_html .= '<div class="main-alligned-container">';
				if (isset($settings['show_icon']) && strcmp($settings['show_icon'], 'yes') == 0) {
					$main_content_html .= '<div class="icon-wrap ' . esc_attr($settings['icon_type']) . '">';
						$main_content_html .= $icon_html;
					$main_content_html .= '</div>';
				}
				$main_content_html .= '<div class="title-wrap">';
					$main_content_html .= $title_html;
					$main_content_html .= $subtitle_html;
				$main_content_html .= '</div>';
			$main_content_html .= '</div>';
		$main_content_html .= '</div>';

		$button_content_html .= '<div class="button-block">';
			$button_content_html .= '<span class="button-tilted-decoration"></span>';
			$button_content_html .= '<div class="button-container">';
				if (isset($settings['show_b_icon']) && strcmp($settings['show_b_icon'], 'yes') == 0 && $settings['show_b_icon'] != '') {
					if ($settings['ic_b_dfd_icons'] != '') {
						$icon_class = esc_attr($settings['ic_b_dfd_icons']['value']);
					}
					$bt_icon_html = '<span class="bt-icon-wrap"><i class="button  ' . esc_attr($icon_class) . '"></i></span>';
				}
				if (isset($settings['button_link']) && !empty($settings['button_link'])) {
					$link .= 'href="' . (!empty($settings['button_link']['url']) ? esc_url($settings['button_link']['url']) : '#') . '"';
					$link .= ' target="' . (!empty($settings['button_link']['is_external']) ? '_blank' : '_self' ) . '"';
					$link .= !empty($settings['button_link']['nofollow']) ? ' rel="nofollow"' : '';
					$link .= !empty($settings['button_link']['custom_attributes']) ? ' ' . esc_attr($settings['button_link']['custom_attributes']) : '';
					$button_content_html .= '<a ' . $link . ' class="button"> ' . esc_html($settings['button_text']) . '</a>';
				}

			$button_content_html .= '</div>';
		$button_content_html .= '</div>';

		$output .= '<div id="' . esc_attr($uniqid) . '" class="dfd-call-to-action-wrap '.esc_attr($el_class).'">';
			$output .= '<div class="call-to-action-container">';
				if (isset($settings['main_style']) && strcmp($settings['main_style'], 'style-1') == 0) {
					$output .= $main_content_html;
					$output .= $button_content_html;
				} else {
					$output .= $button_content_html;
					$output .= $main_content_html;
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
