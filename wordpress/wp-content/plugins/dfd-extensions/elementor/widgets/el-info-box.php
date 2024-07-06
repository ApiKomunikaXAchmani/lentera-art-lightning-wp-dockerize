<?php

if (!defined('ABSPATH')) {
	exit;
}

class El_Info_Box extends \Elementor\Widget_Base {

	public function get_name() {
		return 'el_info_box';
	}

	public function get_title() {
		return esc_html__('DFD Info box', 'dfd-native');
	}

	public function get_categories() {
		return ['native-category'];
	}

	public function get_icon() {
		return 'dfd_info_box';
	}

	protected function register_controls() {

		$this->start_controls_section(
			'el_info_box',
			[
				'label' => esc_html__('Info box', 'dfd-native')
			]
		);

		$this->add_control(
			'main_style',
			[
				'label' => esc_html__('Style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'style-1' => esc_html__('Simple', 'dfd-native'),
					'style-2' => esc_html__('Colored icon', 'dfd-native'),
					'style-3' => esc_html__('Bordered', 'dfd-native'),
					'style-4' => esc_html__('Framed', 'dfd-native'),
					'style-5' => esc_html__('Background', 'dfd-native')
				],
				'default' => 'style-1'
			]
		);

		$this->add_control(
			'main_layout',
			[
				'label' => esc_html__('Icon position', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'layout-1' => esc_html__('Top', 'dfd-native'),
					'layout-2' => esc_html__('Left', 'dfd-native'),
					'layout-3' => esc_html__('Near the title', 'dfd-native')
				],
				'condition' => [
					'main_style' => ['style-1', 'style-2', 'style-3', 'style-4']
				],
				'default' => 'style-1'
			]
		);

		$this->add_control(
			'content_only_hover',
			[
				'label' => esc_html__('Content only on hover', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
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
					'main_layout' => ['layout-1'],
					'main_style' => ['style-1', 'style-2', 'style-3', 'style-4']
				],
				'default' => 'text-left'
			]
		);
		
		$this->add_control(
			'content_two_alignment',
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
					'main_layout' => ['layout-2', 'layout-3'],
					'main_style' => ['style-1', 'style-2', 'style-3', 'style-4']
				],
				'default' => 'text-left'
			]
		);
		
		$this->add_control(
			'title',
			[
				'separator' => 'before',
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
			'main_content',
			[
				'label' => esc_html__('Content', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXTAREA
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'read_m_heading',
			[
				'label' => esc_html__('Link and read more', 'dfd-native')
			]
		);
		
		$this->add_control(
			'read_more',
			[
				'label' => esc_html__('Apply link to', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__('No Link', 'dfd-native'),
					'box' => esc_html__('Complete Box', 'dfd-native'),
					'title' => esc_html__('Box Title', 'dfd-native'),
					'more' => esc_html__('Read More', 'dfd-native')
				],
				'default' => 'none',
				'separator' => 'before'
			]
		);
		
		$this->add_control(
			'link',
			[
				'label' => esc_html__('Link URL', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::URL,
				'condition' => [
					'read_more' => ['box', 'title', 'more']
				]
			]
		);
		
		$this->add_control(
			'readmore_show',
			[
				'label' => esc_html__('Read more button', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'read_more' => ['box', 'title', 'more']
				]
			]
		);
		
		$this->add_control(
			'more_show',
			[
				'label' => esc_html__('Button visibility', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'permanent' => esc_html__('Permanent', 'dfd-native'),
					'hover' => esc_html__('Show on hover', 'dfd-native')
				],
				'default' => 'permanent',
				'condition' => [
					'readmore_show' => 'yes',
					'read_more' => ['box', 'title', 'more']
				]
			]
		);
		
		$this->add_control(
			'readmore_style',
			[
				'label' => esc_html__('Read more style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'read-more-1' => esc_html__('Bordered', 'dfd-native'),
					'read-more-2' => esc_html__('Shadow', 'dfd-native'),
					'read-more-3' => esc_html__('Plus', 'dfd-native'),
					'read-more-4' => esc_html__('Arrow & text', 'dfd-native'),
					'read-more-5' => esc_html__('Arrow', 'dfd-native'),
					'read-more-6' => esc_html__('Dots', 'dfd-native'),
					'read-more-7' => esc_html__('Button', 'dfd-native'),
					'read-more-8' => esc_html__('Simple', 'dfd-native')
				],
				'default' => 'read-more-1',
				'condition' => [
					'readmore_show' => 'yes',
					'read_more' => ['box', 'title', 'more']
				]
			]
		);
		
		$this->add_control(
			'readmore_text',
			[
				'label' => esc_html__('Read more text', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'readmore_style' => ['read-more-1', 'read-more-2', 'read-more-4', 'read-more-7', 'read-more-8'],
					'readmore_show' => 'yes'
				]
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'icon_i_heading',
			[
				'label' => esc_html__('Icon settings', 'dfd-native')
			]
		);
		
		$this->add_control(
			'icon_number',
			[
				'label' => esc_html__('Number at icon', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'no',
				'condition' => [
					'main_style' => ['style-2', 'style-3', 'style-4']
				]
			]
		);
		
		$this->add_control(
			'icon_number_text',
			[
				'label' => esc_html__('Number', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'icon_number' => 'yes',
					'main_style' => ['style-2', 'style-3', 'style-4']
				]
			]
		);
		
		$this->add_control(
			'number_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .icon-wrapper .info-box-icon-text' => 'color: {{SCHEME}};'
				],
				'condition' => [
					'icon_number' => 'yes',
					'main_style' => ['style-2', 'style-3', 'style-4']
				]
			]
		);
		
		$this->add_control(
			'number_bg_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Background Color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .icon-wrapper .info-box-icon-text' => 'color: {{SCHEME}};'
				],
				'condition' => [
					'icon_number' => 'yes',
					'main_style' => ['style-2', 'style-3', 'style-4']
				]
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
				'default' => 'selector'
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
					'icon_type' => 'selector'
				]
			]
		);
		
		$this->add_control(
			'icon_image_id',
			[
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label' => esc_html__('Upload Image', 'dfd-native'),
				'condition' => [
					'icon_type' => 'custom'
				]
			]
		);
		
		$this->add_control(
			'icon_text',
			[
				'label' => esc_html__('Text', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'icon_type' => 'text'
				]
			]
		);
		
		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__('Size', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'icon_type' => ['selector', 'custom']
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
					'{{WRAPPER}} .icon-wrapper .featured-icon' => 'color: {{SCHEME}};'
				],
				'condition' => [
					'icon_type' => 'selector'
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
		
		$this->add_control(
			'icon_bg_size',
			[
				'label' => esc_html__('Icon background size', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'main_style' => ['style-2', 'style-3', 'style-4']
				],
				'separator' => 'before'
			]
		);
		
		$this->add_control(
			'border_radius',
			[
				'label' => esc_html__('Border radius', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'main_style' => ['style-2', 'style-3', 'style-4']
				]
			]
		);
		
		$this->add_control(
			'background_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Background color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'condition' => [
					'main_style' => ['style-2', 'style-4']
				]
			]
		);
		
		$this->add_control(
			'hover_border_radius',
			[
				'label' => esc_html__('Hover border radius', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'main_style' => ['style-2', 'style-3', 'style-4']
				]
			]
		);
		
		$this->add_control(
			'hover_background_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Hover background color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'condition' => [
					'main_style' => ['style-2', 'style-4']
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
					'main_style' => ['style-3', 'style-4']
				]
			]
		);
		
		$this->add_control(
			'hover_border_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Hover border color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'condition' => [
					'main_style' => ['style-3', 'style-4']
				]
			]
		);
		
		$this->add_control(
			'border_width',
			[
				'label' => esc_html__('Border width', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'main_style' => ['style-3', 'style-4']
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
					'p' => 'p'
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
				'selector' => '{{WRAPPER}} .dfd-content-title-big'
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
					'p' => 'p'
				],
				'default' => 'div'
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
					'{{WRAPPER}} .dfd-content-subtitle' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'style-subtitle-typography',
				'label' => esc_html__('Subtitle typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .dfd-content-subtitle'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'style-description-typography',
				'label' => esc_html__('Content typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .description'
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
					'{{WRAPPER}} .description' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->end_controls_section();
	}

	protected function render() {
		$output = $unique_id = $link_atts = $link_atts_t = $title = '';
		$number_bg_color = $link_css = $title_html = $subtitle_html = '';
		$content_html = $read_more_html = $title_wrap_html = '';
		$content_wrap_html = $head_html = $icon_html = '';

		$settings = $this->get_settings_for_display();

		$unique_id = uniqid('dfd-info-box-') . '-' . rand(1, 9999);

		$el_class = ' ' . esc_attr($settings['main_style']) . ' ' . esc_attr($settings['main_layout']);

		if (isset($settings['content_only_hover']) && strcmp($settings['content_only_hover'], 'yes') == 0) {
			$el_class .= ' content-only-hover';
		}

		if (isset($settings['readmore_show']) && strcmp($settings['readmore_show'], 'yes') == 0) {
			$el_class .= ' show-readmore ' . esc_attr($settings['readmore_style']);
		}

		if (isset($settings['main_layout']) && strcmp($settings['main_layout'], 'layout-1') == 0) {
			$el_class .= ' ' . esc_attr($settings['content_alignment']);
		} else {
			$el_class .= ' ' . esc_attr($settings['content_two_alignment']);
		}

		if (isset($settings['more_show']) && strcmp($settings['more_show'], 'hover') == 0) {
			$el_class .= ' more-hover';
		}

		if (isset($settings['number_color']) && !empty($settings['number_color'])) {
			$link_css .= '#' . esc_js($unique_id) . ' .icon-wrapper .info-box-icon-text {color: ' . esc_js($settings['number_color']) . ';}';
		}
		if (isset($settings['number_bg_color']) && !empty($settings['number_bg_color'])) {
			$link_css .= '#' . esc_js($unique_id) . ' .icon-wrapper .info-box-icon-text {background: ' . esc_js($settings['number_bg_color']) . ';}';
		}
		if (isset($settings['icon_bg_size']) && !empty($settings['icon_bg_size'])) {
			$link_css .= '#' . esc_js($unique_id) . ' .icon-wrapper .module-icon {width: ' . esc_js($settings['icon_bg_size']) . 'px; height: ' . esc_js($settings['icon_bg_size']) . 'px; line-height: ' . esc_js($settings['icon_bg_size']) . 'px;}';
			$link_css .= '#' . esc_js($unique_id) . '.style-2.layout-2.text-left .content-cell, #' . esc_js($unique_id) . '.style-3.layout-2.text-left .content-cell, #' . esc_js($unique_id) . '.style-4.layout-2.text-left .content-cell {padding-left: ' . esc_js($settings['icon_bg_size'] + 20) . 'px;}';
			$link_css .= '#' . esc_js($unique_id) . '.style-2.layout-2.text-right .content-cell, #' . esc_js($unique_id) . '.style-3.layout-2.text-right .content-cell, #' . esc_js($unique_id) . '.style-4.layout-2.text-right .content-cell {padding-right: ' . esc_js($settings['icon_bg_size'] + 20) . 'px;}';
		}
		if (isset($settings['icon_size']) && $settings['icon_size'] != '') {
			$link_css .= '#' . esc_js($unique_id) . ' .icon-container .featured-icon {font-size: ' . esc_js($settings['icon_size']) . 'px;}';
			$link_css .= '#' . esc_js($unique_id) . '.style-1.layout-2.text-left .content-cell {padding-left: ' . esc_js($settings['icon_size'] + 20) . 'px;}';
			$link_css .= '#' . esc_js($unique_id) . '.style-1.layout-2.text-right .content-cell {padding-right: ' . esc_js($settings['icon_size'] + 20) . 'px;}';
			$link_css .= '#' . esc_js($unique_id) . '.style-5 {min-height: ' . esc_js($settings['icon_size']) . 'px;}';
			$link_css .= '#' . esc_js($unique_id) . '.style-1.layout-2 .module-icon, #' . esc_js($unique_id) . '.style-1.layout-3 .module-icon {width: ' . esc_js($settings['icon_size']) . 'px; height: ' . esc_js($settings['icon_size']) . 'px;}';
		}
		if (isset($settings['border_radius']) && !empty($settings['border_radius']) || strcmp($settings['border_radius'], 0) === 0) {
			$link_css .= '#' . esc_js($unique_id) . ' .icon-wrapper .module-icon {border-radius: ' . esc_js($settings['border_radius'] . 'px;}');
		}
		if (isset($settings['hover_border_radius']) && $settings['hover_border_radius'] != '') {
			$link_css .= '#' . esc_js($unique_id) . ':hover .icon-wrapper .module-icon {border-radius: ' . esc_js($settings['hover_border_radius'] . 'px;}');
		}
		if (isset($settings['background_color']) && !empty($settings['background_color'])) {
			$link_css .= '#' . esc_js($unique_id) . '.style-2 .icon-wrapper .module-icon, #' . esc_js($unique_id) . '.style-4 .icon-wrapper .module-icon:after {background: ' . esc_js($settings['background_color']) . ';}';
		}
		if (isset($settings['hover_background_color']) && !empty($settings['hover_background_color'])) {
			$link_css .= '#' . esc_js($unique_id) . '.style-2:hover .icon-wrapper .module-icon, #' . esc_js($unique_id) . '.style-4:hover .icon-wrapper .module-icon:after {background: ' . esc_js($settings['hover_background_color']) . ';}';
		}
		if (isset($settings['border_color']) && !empty($settings['border_color'])) {
			$link_css .= '#' . esc_js($unique_id) . ' .icon-wrapper .module-icon:before {border-color: ' . esc_js($settings['border_color']) . ';}';
		}
		if (isset($settings['hover_border_color']) && !empty($settings['hover_border_color'])) {
			$link_css .= '#' . esc_js($unique_id) . ':hover .icon-wrapper .module-icon:before {border-color: ' . esc_js($settings['hover_border_color']) . ';}';
		}
		if (isset($settings['border_width']) && $settings['border_width'] != '') {
			$link_css .= '#' . esc_js($unique_id) . ' .icon-wrapper .module-icon:before {border-width: ' . esc_js($settings['border_width']) . 'px;}';
			$link_css .= '#' . esc_js($unique_id) . '.style-4 .icon-wrapper .module-icon:after {margin: ' . esc_js($settings['border_width'] + 5) . 'px;}';
		}
		if (!empty($settings['title'])) {
			if (isset($settings['link']) && strcmp($settings['read_more'], 'title') == 0) {
				$link_atts_t .= 'href="' . (!empty($settings['link']['url']) ? esc_url($settings['link']['url']) : '#') . '"';
				$link_atts_t .= ' target="' . (!empty($settings['link']['is_external']) ? '_blank' : '_self' ) . '"';
				$link_atts_t .= !empty($settings['link']['nofollow']) ? ' rel="nofollow"' : '';
				$link_atts_t .= !empty($settings['link']['custom_attributes']) ? ' ' . esc_attr($settings['link']['custom_attributes']) : '';
				$title_html .= '<' . $settings['title_html_tag'] . ' class="info-box-title ' . 'dfd-content-title-big' . '"><a ' . $link_atts_t . '">' . wp_kses($settings['title'], array('span' => array(), 'br' => array())) . '</a></' . $settings['title_html_tag'] . '>';
			} else {
				$title_html .= '<' . $settings['title_html_tag'] . ' class="info-box-title ' . 'dfd-content-title-big' . '">' . wp_kses($settings['title'], array('span' => array(), 'br' => array())) . '</' . $settings['title_html_tag'] . '>';
			}
		}
		if (!empty($settings['subtitle'])) {
			$subtitle_html .= '<' . $settings['subtitle_html_tag'] . ' class="info-box-subtitle ' . 'dfd-content-subtitle' . '">' . esc_html($settings['subtitle']) . '</' . $settings['subtitle_html_tag'] . '>';
		}

		if (isset($settings['title']) && !empty($settings['title']) || isset($settings['subtitle']) && !empty($settings['subtitle'])) {
			$title_wrap_html .= '<div class="title-wrap">';
			$title_wrap_html .= $title_html;
			$title_wrap_html .= $subtitle_html;
			$title_wrap_html .= '</div>';
		}

		if (!empty($settings['main_content'])) {
			$content_html .= '<div class="description">' . $settings['main_content'] . '</div>';
		}

		if (isset($settings['icon_type']) && $settings['icon_type'] == 'selector' || $settings['icon_type'] == 'custom' && !empty($settings['icon_image_id']) || $settings['icon_type'] == 'text' && !empty($settings['icon_text'])) {
			$icon_html = '<div class="icon-wrapper">';
			$icon_html .= '<div class="module-icon">';
			$icon_html .= '<div class="icon-container">';
			$icon_html .= dfd_elementor_icon_render($settings, $settings['icon_size']);
			$icon_html .= '</div>';
			if (isset($settings['icon_number']) && strcmp($settings['icon_number'], 'yes') == 0 && isset($settings['icon_number_text']) && !empty($settings['icon_number_text'])) {
				$icon_html .= '<span class="info-box-icon-text">' . esc_html($settings['icon_number_text']) . '</span>';
				$el_class .= ' with-number';
			}
			$icon_html .= '</div>';
			$icon_html .= '</div>';
		} else {
			$link_css .= '#' . esc_js($unique_id) . '.style-5 {padding-top: 0; min-height: initial;}';
		}

		$read_more_html .= dfd_elementor_module_read_more($settings);

		$head_html .= '<div class="head-wrap">';
		$content_wrap_html .= '<div class="container-info">';
		if (($settings['main_layout'] == 'layout-2' || $settings['main_layout'] == 'layout-3') && $settings['content_two_alignment'] == 'text-right') {
			$head_html .= $title_wrap_html;
			$head_html .= $icon_html;
			$content_wrap_html .= '<div class="content-cell">';
			$content_wrap_html .= $content_html;
			$content_wrap_html .= $read_more_html;
			$content_wrap_html .= '</div>';
			$content_wrap_html .= '<div class="empty-cell"></div>';
		} else {
			$head_html .= $icon_html;
			$head_html .= $title_wrap_html;
			$content_wrap_html .= '<div class="empty-cell"></div>';
			$content_wrap_html .= '<div class="content-cell">';
			$content_wrap_html .= $content_html;
			$content_wrap_html .= $read_more_html;
			$content_wrap_html .= '</div>';
		}
		$head_html .= '</div>';
		$content_wrap_html .= '</div>';

		$output .= '<div id="' . esc_attr($unique_id) . '" class="dfd-info-box ' . esc_attr($el_class) . '">';

		if (isset($settings['main_style']) && strcmp($settings['main_style'], 'style-5') !== 0) {
			if (!empty($icon_html) || !empty($title_wrap_html)) {
				$output .= $head_html;
			}
			if (isset($settings['main_content']) && !empty($settings['main_content']) || isset($settings['readmore_show']) && $settings['readmore_show'] == 'yes') {
				$output .= $content_wrap_html;
			}
		} else {
			$output .= $icon_html;
			$output .= $title_wrap_html;
			if (isset($settings['main_content']) && !empty($settings['main_content']) || isset($settings['readmore_show']) && $settings['readmore_show'] == 'yes') {
				$output .= '<div class="container-info">';
				$output .= '<div class="content-cell">';
				$output .= $content_html;
				$output .= $read_more_html;
				$output .= '</div>';
				$output .= '</div>';
			}
		}

		if (isset($settings['link']) && strcmp($settings['read_more'], 'box') == 0) {
			$link_atts .= 'href="' . (!empty($settings['link']['url']) ? esc_url($settings['link']['url']) : '#') . '"';
			$link_atts .= ' target="' . (!empty($settings['link']['is_external']) ? '_blank' : '_self' ) . '"';
			$link_atts .= !empty($settings['link']['nofollow']) ? ' rel="nofollow"' : '';
			$link_atts .= !empty($settings['link']['custom_attributes']) ? ' ' . esc_attr($settings['link']['custom_attributes']) : '';
			$output .= '<a ' . $link_atts . ' class="full-box-link"></a>';
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
