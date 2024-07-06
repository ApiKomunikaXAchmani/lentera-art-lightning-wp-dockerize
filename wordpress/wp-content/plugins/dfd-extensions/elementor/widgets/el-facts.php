<?php

if (!defined('ABSPATH')) {
	exit;
}

class El_Facts extends \Elementor\Widget_Base {

	public function get_name() {
		return 'el_facts';
	}

	public function get_title() {
		return esc_html__('DFD Facts', 'dfd-native');
	}
	public function get_categories() {
		return ['native-category'];
	}

	public function get_icon() {
		return 'dfd_facts';
	}

	protected function register_controls() {

		$this->start_controls_section(
			'el_facts',
			[
				'label' => esc_html__('Facts', 'dfd-native'),
			]
		);
		$this->add_control(
			'main_style',
			[
				'label' => esc_html__('Style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'style-1' => esc_html__('Standard', 'dfd-native'),
					'style-2' => esc_html__('Top icon', 'dfd-native'),
					'style-3' => esc_html__('Bottom icon', 'dfd-native'),
					'style-4' => esc_html__('Title with icon', 'dfd-native'),
					'style-5' => esc_html__('Number with icon', 'dfd-native'),
					'style-6' => esc_html__('Side number', 'dfd-native')
				],
				'default' => 'style-1'
			]
		);
		$this->add_control(
			'number',
			[
				'label' => esc_html__('Number', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'separator' => 'before'
			]
		);
		$this->add_control(
			'number_letter_spacing',
			[
				'label' => esc_html__('Number letter spacing', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'number!' => [] 
				]
			]
		);
		$this->add_control(
				'transition',
				[
					'label' => esc_html__('Numbers animation', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'counter' => esc_html__('Count', 'dfd-native'),
						'odometer' => esc_html__('Odometr', 'dfd-native'),
						'disable-animation' => esc_html__('Without', 'dfd-native')
					],
					'default' => 'counter',
				]
		);
		$this->add_control(
			'title',
			[
				'separator'   => 'before',
				'label' => esc_html__('Title', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT 
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label' => esc_html__('Subtitle', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT 
			]
		);
		$this->add_control(
			'content_alignment',
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
				'condition' => [
					'main_style' => ['style-1','style-2','style-3','style-4','style-5']
				],
				'default' => 'text-left',
			]
		);
		$this->add_control(
			'content_alignment2',
			[
				'label' => esc_html__('Alignment', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'text-left' => [
						'title' => esc_html__('Left', 'dfd-native'),
						'icon' => 'eicon-text-align-left'
					],
					'text-right' => [
						'title' => esc_html__('Right', 'dfd-native'),
						'icon' => 'eicon-text-align-right'
					]
				],
				'condition' => [
					'main_style' => ['style-6']
				],
				'default' => 'text-left',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
				'icon_i_heading',
				[
					'label' => esc_html__('Icon settings', 'dfd-native'),
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
				'label' => esc_html__( 'Icon to display', 'dfd-native' ),
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
		);$this->add_control(
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
					'{{WRAPPER}} .module-icon' => 'font-size: {{SCHEME}}px;'
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
					'{{WRAPPER}} .module-icon' => 'color: {{SCHEME}};'
				],
				'condition' => [
					'icon_type' => 'selector',
					'show_icon' => 'yes'
				]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'icon_text_typography',
				'label' => esc_html__('Text typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .dfd-text-icon-render',
				'condition' => [
					'icon_type' => 'text'
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
				'label' => esc_html__( 'Title HTML Tag', 'elementor' ),
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
				'label' => esc_html__( 'Subtitle HTML Tag', 'elementor' ),
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
				'separator'   => 'before'
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
		$this->add_control(
			'number_html_tag',
			[
				'label' => esc_html__( 'Number HTML Tag', 'elementor' ),
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
				'separator'   => 'before'
			]
		);
		$this->add_control(
			'number_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Number color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .facts-number' => 'color: {{SCHEME}};'
				]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'number-subtitle-typography',
				'label' => esc_html__('Number typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .facts-number',
			]
		);
		
		$this->end_controls_section();
	}

	protected function render() {
		$output = $uniqid = $el_class = $title_html = $subtitle_html = $link_css = $data_max = '';
		$facts_number_html = $animation = $title_wrap  = $icon_html = $content_html = $disable_animation_class = '';

		$settings = $this->get_settings_for_display();
		
		$uniqid = uniqid('dfd-facts-') . '-' . rand(1, 9999);

		if (isset($settings['main_style']) && $settings['main_style'] == 'style-6') {
			$el_class = ' ' . $settings['content_alignment2]'];
		} else {
			$el_class = ' ' . $settings['content_alignment'];
		}

		if (isset($settings['transition']) && strcmp($settings['transition'], 'counter') === 0) {
			$animation = 'count';
		} elseif (strcmp($settings['transition'], 'disable-animation') === 0) {
			$disable_animation_class = 'disable-animation';
		}

		if (isset($settings['number_letter_spacing']) && strcmp($settings['number_letter_spacing'], '') != 0) {
			$link_css .= '#' . esc_js($uniqid) . ' .odometer-digit {margin: 0 ' . esc_attr($settings['number_letter_spacing']) / 2 . 'px;}';
			$link_css .= '#' . esc_js($uniqid) . ' .odometer-digit:first-child {margin-left: 0;}';
			$link_css .= '#' . esc_js($uniqid) . ' .odometer-digit:last-child {margin-right: 0;}';
		}

		if (isset($settings['show_icon']) && strcmp($settings['show_icon'], 'yes') === 0) {
			$icon_html = '<div class="module-icon">' . dfd_elementor_icon_render($settings, $settings['icon_size']) . '</div>';			
		} else {
			$el_class .= ' disable-icon';
		}

		if (!empty($settings['title'])) {
			$title_html = '<' . $settings['title_html_tag'] . ' class="facts-title ' . '">' . esc_html($settings['title']) . '</' . $settings['title_html_tag'] .'>';
		}
		if (!empty($settings['subtitle'])) {
			$subtitle_html = '<' . $settings['subtitle_html_tag'] . ' class="facts-subtitle ' . '" ' . '>' . esc_html($settings['subtitle']) . '</' . $settings['subtitle_html_tag'] . '>';
		}

		$title_wrap .= '<div class="title-wrap">';
			$title_wrap .= $title_html;
			$title_wrap .= $subtitle_html;
		$title_wrap .= '</div>';

		
		$data_max = 'data-max="' . esc_attr($settings['number']) . '"';
		$facts_number_html .= '<div class="facts-number dfd-content-title-big call-on-waypoint ' . $disable_animation_class . '" data-animation="' . esc_attr($animation) . '" ' . $data_max . ' ' . '>';
		if (isset($settings['transition']) && strcmp($settings['transition'], 'disable-animation') === 0) {
			$facts_number_html .= esc_attr($settings['number']);
		} else {
			$facts_number_html .= '0';
		}
		$facts_number_html .= '</div>';

		$content_html .= '<div class="number-wrap">';
			$content_html .= '<div class="stat-count">' . $facts_number_html . '</div>';
		$content_html .= '</div>';

		$output .= '<div id="' . $uniqid . '" class="dfd-facts-counter ' . $settings['main_style'] . ' ' . $el_class . '">';
		if (isset($settings['main_style']) && strcmp($settings['main_style'], 'style-3') === 0) {
			$output .= $content_html;
			$output .= '<div class="title-wrap">';
			$output .= '<div class="title-container">';
			$output .= $title_html;
			$output .= $subtitle_html;
			$output .= '</div>';
			$output .= $icon_html;
			$output .= '</div>';
		} elseif (strcmp($settings['main_style'], 'style-4') === 0) {
			$output .= $content_html;
			$output .= '<div class="title-wrap">';
			$output .= $icon_html;
			$output .= '<div class="title-container">';
			$output .= $title_html;
			$output .= $subtitle_html;
			$output .= '</div>';
			$output .= '</div>';
		} elseif (strcmp($settings['main_style'], 'style-5') === 0) {
			$output .= '<div class="head-container">';
			$output .= $icon_html;
			$output .= $content_html;
			$output .= '</div>';
			$output .= '<div class="title-wrap">';
			$output .= $title_html;
			$output .= $subtitle_html;
			$output .= '</div>';
		} else {
			$output .= $icon_html;
			$output .= $content_html;
			$output .= '<div class="title-wrap">';
			$output .= $title_html;
			$output .= $subtitle_html;
			$output .= '</div>';
		}

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