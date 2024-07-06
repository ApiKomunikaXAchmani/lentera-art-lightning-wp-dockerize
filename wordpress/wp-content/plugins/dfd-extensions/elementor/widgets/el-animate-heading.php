<?php

if (!defined('ABSPATH')) {
	exit;
}

class El_Animate_Heading extends \Elementor\Widget_Base {

	public function get_name() {
		return 'el_animate_heading';
	}

	public function get_title() {
		return esc_html__('DFD Animated Heading', 'dfd-native');
	}

	public function get_categories() {
		return ['native-category'];
	}

	public function get_icon() {
		return 'dfd_animated_heading';
	}

	protected function register_controls() {

		$this->start_controls_section(
				'el_animate_heading',
				[
					'label' => esc_html__('Animated Heading', 'dfd-native'),
				]
		);
		$this->add_control(
				'heading_alignment',
				[
					'label' => esc_html__('Alignment', 'dfd-native'),
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
		$this->add_control(
				'line_appearance',
				[
					'label' => esc_html__('Line appear effect', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'left-to-right' => esc_html__('Left to right', 'dfd-native'),
						'right-to-left' => esc_html__('Right to left', 'dfd-native'),
						'top-to-bottom' => esc_html__('Top to bottom', 'dfd-native'),
						'bottom-to-top' => esc_html__('Bottom to top', 'dfd-native'),
					],
					'default' => 'left-to-right',
				]
		);
		$this->add_control(
				'title',
				[
					'label' => esc_html__('Title', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::TEXT
				]
		);
		$this->add_control(
				'subtitle',
				[
					'label' => esc_html__('Subitle', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::TEXT
				]
		);
		$this->add_control(
				'top_bottom_offset',
				[
					'label' => esc_html__('Top / Bottom offset', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'condition' => [
						'number!' => []
					]
				]
		);
		$this->add_control(
				'left_right_offset',
				[
					'label' => esc_html__('Left / Right offset', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'condition' => [
						'number!' => []
					]
				]
		);
		$this->add_control(
				'title_background',
				[
					'type' => \Elementor\Controls_Manager::COLOR,
					'label' => esc_html__('Title Background Color', 'dfd-native'),
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
				'title_border_radius',
				[
					'label' => esc_html__('Title border radius', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'condition' => [
						'number!' => []
					]
				]
		);
		$this->add_control(
				'subtitle_border_radius',
				[
					'label' => esc_html__('Subitle border radius', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'condition' => [
						'number!' => []
					]
				]
		);
		$this->add_control(
				'subtitle_background',
				[
					'type' => \Elementor\Controls_Manager::COLOR,
					'label' => esc_html__('Subtitle Background Color', 'dfd-native'),
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
				'full_width',
				[
					'label' => esc_html__('Background align', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'default' => 'no',
					'description' => 'Align the background according to the longest part'
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
					'selectors' => [
						'{{WRAPPER}} .facts-title' => 'color: {{SCHEME}};'
					]
				]
		);
		$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'style-title-typography',
					'label' => esc_html__('Title typography', 'dfd-native'),
					'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .facts-title',
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
					'selectors' => [
						'{{WRAPPER}} .facts-subtitle' => 'color: {{SCHEME}};'
					]
				]
		);
		$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'style-subtitle-typography',
					'label' => esc_html__('Subtitle typography', 'dfd-native'),
					'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .facts-subtitle',
				]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$output = $uniqid = $el_class = $title = $subtitle = $title_background = $title_font_options = $use_google_fonts = $custom_fonts = '';
		$title_html = $subtitle_html = $link_css = '';

		$settings = $this->get_settings_for_display();
		
		$uniqid = uniqid('dfd-animate-heading-') . '-' . rand(1, 9999);

		if (isset($settings['heading_alignment']) && !empty($settings['heading_alignment'])) {
			$el_class .= ' ' . $settings['heading_alignment'];
		}
		if (isset($settings['line_appearance']) && !empty($settings['line_appearance'])) {
			$el_class .= ' ' . $settings['line_appearance'];
		}
		if (isset($settings['full_width']) && strcmp($settings['full_width'], 'yes') == 0) {
			$el_class .= ' full-width-bg';
		}

		if (isset($settings['title_background']) && !empty($settings['title_background'])) {
			$link_css .= '#' . esc_js($uniqid) . ' .title-container.animate-container {background: ' . esc_js($settings['title_background']) . ';}';
		}
		if (isset($settings['subtitle_background']) && !empty($settings['subtitle_background'])) {
			$link_css .= '#' . esc_js($uniqid) . ' .subtitle-container.animate-container {background: ' . esc_js($settings['subtitle_background']) . ';}';
		}
		if (isset($settings['top_bottom_offset']) && strcmp($settings['top_bottom_offset'], '') != 0) {
			$link_css .= '#' . esc_js($uniqid) . ' .animate-element {padding-top: ' . esc_js($settings['top_bottom_offset']) . 'px; padding-bottom: ' . esc_js($settings['top_bottom_offset']) . 'px;}';
		}
		if (isset($settings['left_right_offset']) && strcmp($settings['left_right_offset'], '') != 0) {
			$link_css .= '#' . esc_js($uniqid) . ' .animate-element {padding-left: ' . esc_js($settings['left_right_offset']) . 'px; padding-right: ' . esc_js($settings['left_right_offset']) . 'px;}';
		}
		if (isset($settings['title_border_radius']) && strcmp($settings['title_border_radius'], '') != 0) {
			$link_css .= '#' . esc_js($uniqid) . ' .title-container.animate-container {border-radius: ' . esc_js($settings['title_border_radius']) . 'px;}';
		}
		if (isset($settings['subtitle_border_radius']) && strcmp($settings['subtitle_border_radius'], '') != 0) {
			$link_css .= '#' . esc_js($uniqid) . ' .subtitle-container.animate-container {border-radius: ' . esc_js($settings['subtitle_border_radius']) . 'px;}';
		}

		if (isset($settings['title']) && !empty($settings['title'])) {
			$title_html = '<' . $settings['title_html_tag'] . '><span class="title-container animate-container"><span class="title-text animate-element">' . strip_tags($settings['title'], '<br><br/>') . '</span></span></' . $settings['title_html_tag']. '>';
		}
		if (isset($settings['subtitle']) && !empty($settings['subtitle'])) {
			$subtitle_html = '<' . $settings['subtitle_html_tag'] .'><span class="subtitle-container animate-container"><span class="subtitle-text animate-element">' . strip_tags($settings['subtitle']) . '</span></span></' . $settings['subtitle_html_tag'] . '>';
		}
		$output .= '<div id="' . esc_attr($uniqid) . '" class="dfd-animate-heading-wrap call-on-waypoint ' . esc_attr($el_class) . '">';
		$output .= '<div class="content-wrap">';
		if ($link_css != '') {
			$output .= '<script type="text/javascript">'
						. '(function($) {'
							. '$("head").append("<style>' . $link_css . '</style>");'
						. '})(jQuery);'
					. '</script>';
		}
		
		$output .= '<div class="title-wrap wrap-container">';
		$output .= $title_html;
		$output .= '</div>';
		$output .= '<div class="subtitle-wrap wrap-container">';
		$output .= $subtitle_html;
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';

		echo $output;
	}

}
