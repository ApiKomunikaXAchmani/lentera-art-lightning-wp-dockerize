<?php

if (!defined('ABSPATH')) {
	exit;
}

class El_Announcement extends \Elementor\Widget_Base {

	public function get_name() {
		return 'el_announcement';
	}

	public function get_title() {
		return esc_html__('DFD Announcement', 'dfd-native');
	}

	public function get_categories() {
		return ['native-category'];
	}

	public function get_icon() {
		return 'dfd_announcement';
	}

	protected function register_controls() {

		$this->start_controls_section(
			'el_announcement',
			[
				'label' => esc_html__('Announcement', 'dfd-native'),
			]
		);

		$this->add_control(
			'main_style',
			[
				'label' => esc_html__('Style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'style-1' => esc_html__('Simple', 'dfd-native'),
					'style-2' => esc_html__('Separated', 'dfd-native'),
				],
				'default' => 'style-1'
			]
		);
		$this->add_control(
			'align',
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
				'default' => 'text-left'
			]
		);
		$this->add_control(
			'content_announcement',
			[
				'label' => esc_html__('Content', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXTAREA
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
				]
			]
		);
		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__('Size', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER
			]
		);
		$this->add_control(
			'icon_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1
				],
				'selectors' => [
					'{{WRAPPER}} .dfd-announce-module i' => 'color: {{SCHEME}};'
				]
			]
		);
		$this->add_control(
			'icon_bg',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Icon background', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1
				],
				'condition' => [
					'main_style' => 'style-2'
				]
			]
		);
		$this->add_control(
			'background_fild',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Background color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1
				],
				'separator' => 'before'
			]
		);
		$this->add_control(
			'full_width_background',
			[
				'label' => esc_html__('Full width element', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'an_border',
				'selector' => '{{WRAPPER}} .dfd-announce-module:before'
			]
		);
		$this->add_control(
			'border_radius',
			[
				'label' => esc_html__('Border radius', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'selectors' => [
					'{{WRAPPER}} .dfd-announce-module:before, {{WRAPPER}} .dfd-announce-module' => 'border-radius: {{SCHEME}}px;'
				]
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'typography_section',
			[
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'label' => esc_html__('Typography', 'dfd-native')
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
				'default' => 'div'
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
					'{{WRAPPER}} .module-text' => 'color: {{SCHEME}};'
				]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'style-title-typography',
				'label' => esc_html__('Title typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .module-text',
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$el_class = $output = $uniqid = $link_css = $content_html = $icon_html = '';

		$settings = $this->get_settings_for_display();

		$uniqid = uniqid('dfd-announce-') . '-' . rand(1, 9999);

		$el_class .= ' ' . $settings['main_style'] . ' ' . $settings['align'];

		if (isset($settings['full_width_background']) && strcmp($settings['full_width_background'], 'yes') === 0) {
			$el_class .= ' full-width-bg';
		}

		$settings['icon_type'] = 'selector';

		$icon_html = dfd_elementor_icon_render($settings, $settings['icon_size']);

		$content_html .= '<' . $settings['title_html_tag'] . ' class="module-text"  >' . $icon_html . ' ' . esc_html($settings['content_announcement']) . '</' . $settings['title_html_tag'] . '>';

		if (isset($settings['background_fild']) && !empty($settings['background_fild'])) {
			$link_css .= '#' . esc_js($uniqid) . ' .dfd-announce-module:before {background: ' . esc_js($settings['background_fild']) . ';}';
		}
      
		if (isset($settings['icon_size']) && !empty($settings['icon_size'])) {
			$ic_thumb_size = $settings['icon_size'] * 2;
			$link_css .= '#' . esc_js($uniqid) . ' .dfd-announce-module i {width: ' . esc_js($ic_thumb_size) . 'px; height: ' . esc_js($ic_thumb_size) . 'px; line-height: ' . esc_js($ic_thumb_size) . 'px;}';
		}

		if (isset($settings['icon_bg']) && !empty($settings['icon_bg'])) {
			$link_css .= '#' . esc_js($uniqid) . ' .dfd-announce-module i {background: ' . esc_js($settings['icon_bg']) . ';}';
		}

		$output .= '<div id="' . esc_js($uniqid) . '" class="dfd-announce-module-wrap ' . $el_class . '">';
		$output .= '<div class="dfd-announce-module">';
		$output .= $content_html;
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
