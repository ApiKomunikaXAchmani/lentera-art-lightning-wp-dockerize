<?php

if (!defined('ABSPATH')) {
	exit;
}

class El_Simple_Advertisement extends \Elementor\Widget_Base {

	public function get_name() {
		return 'el_simple_advertisement';
	}

	public function get_title() {
		return esc_html__('DFD Simple Advertisement', 'dfd-native');
	}

	public function get_categories() {
		return ['native-category'];
	}

	public function get_icon() {
		return 'dfd_simple_advertisement';
	}

	protected function register_controls() {

		$this->start_controls_section(
			'el_simple_advertisement',
			[
				'label' => esc_html__('Simple Advertisement', 'dfd-native'),
			]
		);
		
		$this->add_control(
			'main_style',
			[
				'label' => esc_html__('Style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'style-1' => esc_html__('Left top', 'dfd-native'),
					'style-2' => esc_html__('Left center', 'dfd-native'),
					'style-3' => esc_html__('Left bottom', 'dfd-native'),
					'style-4' => esc_html__('Right top', 'dfd-native'),
					'style-5' => esc_html__('Right center', 'dfd-native'),
					'style-6' => esc_html__('Right bottom', 'dfd-native'),
					'style-7' => esc_html__('Centered', 'dfd-native')
				],
				'default' => 'style-1'
			]
		);
		
		$this->add_control(
			'image',
			[
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label' => esc_html__('Image', 'dfd-native')
			]
		);
		
		$this->add_control(
			'img_width',
			[
				'label' => esc_html__('Image width', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
			]
		);
		
		$this->add_control(
			'img_height',
			[
				'label' => esc_html__('Image height', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
			]
		);
		
		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'separator' => 'before'
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
			'info',
			[
				'label' => esc_html__('Info', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);
		
		$this->add_control(
			'info_block_background_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Info background color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .box-info' => 'background-color: {{SCHEME}};'
				],
				'separator' => 'before'
			]
		);
		
		$this->add_control(
			'info_block_border_radius',
			[
				'label' => esc_html__('Info border radius', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
			]
		);
		
		$this->add_control(
			'info_block_left_right_padding',
			[
				'label' => esc_html__('Left/right offset', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
			]
		);
		$this->add_control(
			'link',
			[
				'label' => esc_html__('Add link', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::URL,
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
					'{{WRAPPER}} .box-title' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'style-title-typography',
				'label' => esc_html__('Title typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .box-title',
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
					'{{WRAPPER}} .box-subtitle' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'style-subtitle-typography',
				'label' => esc_html__('Subtitle typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .box-subtitle',
			]
		);
		
		$this->add_control(
			'info_html_tag',
			[
				'label' => esc_html__('Info HTML Tag', 'elementor'),
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
			'info_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Info color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .box-info' => 'color: {{SCHEME}};'
				]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'info-typography',
				'label' => esc_html__('Info typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .box-info',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__('Shadow settings', 'dfd-native'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'sa_box_shadow',
				'label' => esc_html__('Shadow color', 'dfd-native'),
				'selector' => '{{WRAPPER}} .dfd-simple-advertisement .cover.permanent:before, {{WRAPPER}} .dfd-simple-advertisement:hover .cover.on-hover:before',
			]
		);
		$this->add_control(
			'shadow',
			[
				'label' => esc_html__('Shadow visibility', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'disable' => esc_html__('Disable', 'dfd-native'),
					'permanent' => esc_html__('Permanent', 'dfd-native'),
					'on-hover' => esc_html__('On hover', 'dfd-native')
				],
				'default' => 'disable',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'hover_section',
			[
				'label' => esc_html__('Hover settings', 'dfd-native'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'portfolio_hover_enable',
			[
				'label' => esc_html__('Hover', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'separator' => 'before'
			]
		);
		
		$this->add_control(
			'portfolio_hover_appear_effect',
			[
				'label' => esc_html__('Mask appear effect', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'dfd-fade-out' => esc_html__('Fade out', 'dfd-native'),
					'dfd-left-to-right' => esc_html__('Left to right', 'dfd-native'),
					'dfd-right-to-left' => esc_html__('Right to left', 'dfd-native'),
					'dfd-top-to-bottom' => esc_html__('Top to bottom', 'dfd-native'),
					'dfd-bottom-to-top' => esc_html__('Bottom to top', 'dfd-native'),
					'portfolio-hover-style-1' => esc_html__('Following the mouse', 'dfd-native')
				],
				'condition' => [
					'portfolio_hover_enable' => 'yes'
				],
				'default' => 'dfd-fade-out',
			]
		);
		
		$this->add_control(
			'image_effect',
			[
				'label' => esc_html__('Image hover effect', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'panr' => esc_html__('Image parallax', 'dfd-native'),
					'dfd-image-scale' => esc_html__('Grow', 'dfd-native'),
					'dfd-image-scale-rotate' => esc_html__('Grow with rotation', 'dfd-native'),
					'dfd-image-shift-left' => esc_html__('Shift left', 'dfd-native'),
					'dfd-image-shift-right' => esc_html__('Shift right', 'dfd-native'),
					'dfd-image-shift-top' => esc_html__('Shift top', 'dfd-native'),
					'dfd-image-shift-bottom' => esc_html__('Shift bottom', 'dfd-native'),
					'dfd-image-blur' => esc_html__('Blur', 'dfd-native'),
				],
				'condition' => [
					'portfolio_hover_appear_effect' => ['dfd-fade-out', 'dfd-fade-offset', 'dfd-left-to-right', 'dfd-right-to-left', 'dfd-top-to-bottom', 'dfd-bottom-to-top'],
					'portfolio_hover_enable' => 'yes'
				],
				'default' => 'panr',
			]
		);
		
		$this->add_control(
			'portfolio_hover_mask_background_style',
			[
				'label' => esc_html__('Hover mask background style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'simple-color' => esc_html__('Simple color', 'dfd-native'),
					'gradient' => esc_html__('Gradient', 'dfd-native')
				],
				'condition' => [
					'portfolio_hover_enable' => 'yes'
				],
				'default' => 'simple-color',
			]
		);
		
		$this->add_control(
			'portfolio_hover_mask_background_opacity',
			[
				'label' => esc_html__('Hover mask background opacity', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'portfolio_hover_enable' => 'yes'
				]
			]
		);
		
		$this->add_control(
			'portfolio_hover_mask_background',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Mask background', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
//				'selectors' => [
//					'{{WRAPPER}} .module-icon' => 'color: {{SCHEME}};'
//				],
				'condition' => [
					'portfolio_hover_mask_background_style' => 'simple-color',
					'portfolio_hover_enable' => 'yes'
				]
			]
		);
		
		$this->add_control(
			'portfolio_hover_mask_bg_start_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Start color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
//				'selectors' => [
//					'{{WRAPPER}} .module-icon' => 'color: {{SCHEME}};'
//				],
				'condition' => [
					'portfolio_hover_mask_background_style' => 'gradient',
					'portfolio_hover_enable' => 'yes'
				]
			]
		);
		
		$this->add_control(
			'portfolio_hover_mask_bg_end_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('End color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
//				'selectors' => [
//					'{{WRAPPER}} .module-icon' => 'color: {{SCHEME}};'
//				],
				'condition' => [
					'portfolio_hover_mask_background_style' => 'gradient',
					'portfolio_hover_enable' => 'yes'
				]
			]
		);
		
		$this->end_controls_section();
	}

	protected function render() {

		global $dfd_native;

		$output = $uniqid = $link_atts = $css_rules = $el_class = $image_html = '';
		$title_html = $subtitle_html = $link = $hover_style_html = $hover_effect_classes = '';
		$shadow_class = $info_html = $img_width = $img_height = '';
		
		$settings = $this->get_settings_for_display();

		$uniqid = uniqid('dfd-simple_adv') . '-' . rand(1, 9999);

		$img_width = $settings['img_width'] ? $settings['img_width'] : 400;
		$img_height = $settings['img_height'] ? $settings['img_height'] : 350;

		if (!empty($settings['image'])) {
			$image_url = dfd_aq_resize($settings['image']['url'], $img_width, $img_height, true, true, true);
			if (!$image_url) {
				$image_url = $settings['image']['url'];
			}
		} else {
			$image_url = Dfd_Theme_Helpers::default_noimage_url("rect_med_300");
		}

		$alt = esc_attr(Dfd_Theme_Helpers::dfd_get_image_alt($settings['image']));

		$img_atts = Dfd_Theme_Helpers::get_image_attrs($settings['image']['url'], $settings['image']['id'], $settings['img_width'], $settings['img_height'], $alt);

		if (isset($dfd_native['enable_images_lazy_load']) && $dfd_native['enable_images_lazy_load'] == 'on') {
			$el_class .= ' dfd-img-lazy-load ';
			$loading_img_src = "data:image/svg+xml;charset=utf-8,%3Csvg xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg' viewBox%3D'0 0 $img_width $img_height'%2F%3E";
			$img_html = '<img src="' . $loading_img_src . '" data-src="' . esc_url($image_url) . '" width="' . esc_attr(floor($img_width)) . '" height="' . esc_attr(floor($img_height)) . '" class="simple-banner-image" ' . $img_atts . ' />';
		} else {
			$img_html = '<img src="' . esc_url($image_url) . '" width="' . esc_attr(floor($img_width)) . '" height="' . esc_attr(floor($img_height)) . '" class="simple-banner-image" ' . $img_atts . ' />';
		}

		$image_html .= '<div class="image-cover">'
							. '<span class="img_wrapper">'
								. $img_html
							. '</span>'
						. '</div>';

		if (!empty($settings['title'])) {
			$title_html .= '<' . $settings['title_html_tag'] . ' class="box-title">' . (strip_tags($settings['title'], "<br>")) . '</' . $settings['title_html_tag'] . '>';
		}

		if (!empty($settings['subtitle'])) {
			$subtitle_html .= '<' . $settings['subtitle_html_tag'] . ' class="box-subtitle">' . (strip_tags($settings['subtitle'])) . '</' . $settings['subtitle_html_tag'] . '>';
		}

		if (!empty($settings['info'])) {
			$info_html .= '<' . $settings['info_html_tag'] . ' class="box-info">' . esc_html($settings['info']) . '</' . $settings['info_html_tag'] . '>';
		}
		
		if (isset($settings['link']) && !empty($settings['link'])) {
			$link_atts .= 'href="' . (!empty($settings['link']['url']) ? esc_url($settings['link']['url']) : '#') . '"';
			$link_atts .= ' target="' . (!empty($settings['link']['is_external']) ? '_blank' : '_self' ) . '"';
			$link_atts .= !empty($settings['link']['nofollow']) ? ' rel="nofollow"' : '';
			$link_atts .= !empty($settings['link']['custom_attributes']) ? ' ' . esc_attr($settings['link']['custom_attributes']) : '';
			$link = '<a ' . $link_atts . ' class="full-box-link"></a>';
		} else {
			$link = '';
		}

//		if (substr_count($settings['shadow'], 'disable') == 0) {
//			$sa_box_shadow = Dfd_Box_Shadow_Param::box_shadow_css($settings['sa_box_shadow']);
//		}
		if (isset($settings['shadow']) && $settings['shadow'] == 'permanent') {
			$shadow_class = $settings['shadow'];
		} elseif (isset($settings['shadow']) && $settings['shadow'] == 'on-hover') {
			$shadow_class = $settings['shadow'];
		}

		$hover_style_html .= '<div class="entry-thumb"><div class="entry-hover"></div></div>';

		if ('panr' === $settings['image_effect']) {
			wp_enqueue_script('dfd-tween-max');
		}

		$el_class .= ' ' . $settings['image_effect'];

		$hover_effect_classes .= $settings['portfolio_hover_enable'] == "yes" ? " hover_enable " : " ";

		$hover_effect_classes .= $settings['portfolio_hover_appear_effect'] ? $settings['portfolio_hover_appear_effect'] : " ";


		if (isset($settings['portfolio_hover_mask_background']) && $settings['portfolio_hover_mask_background'] != '') {
			$css_rules .= '#' . esc_js($uniqid) . ' .entry-thumb .entry-hover .title-wrap h3.entry-title,'
				. '#' . esc_js($uniqid) . ' .entry-thumb .entry-hover .title-wrap .entry-subtitle.dfd-content-subtitle,'
				. '#' . esc_js($uniqid) . ' .entry-thumb .entry-hover .dfd-hover-buttons-wrap {color: ' . esc_js($settings['portfolio_hover_mask_background']) . ';}';

			$css_rules .= '#' . esc_js($uniqid) . ' .entry-thumb .entry-hover .title-wrap.diagonal-line:before,'
				. '#' . esc_js($uniqid) . ' .entry-thumb .entry-hover .title-wrap.title-underline h3.entry-title:before,'
				. '#' . esc_js($uniqid) . ' .entry-thumb .entry-hover .title-wrap.square-behind-heading:before { border-color: ' . Dfd_Theme_Helpers::dfd_hex2rgb($settings['portfolio_hover_mask_background'], .1) . ';}';

			$css_rules .= '#' . esc_js($uniqid) . ' .entry-thumb .entry-hover .dfd-hover-buttons-wrap > *:hover:after {background: ' . Dfd_Theme_Helpers::dfd_hex2rgb($settings['portfolio_hover_mask_background'], .15) . ';}';

			$css_rules .= '#' . esc_js($uniqid) . ' .entry-thumb .entry-hover .plus-link .plus-link-container .plus-link-out,'
				. '#' . esc_js($uniqid) . ' .entry-thumb .entry-hover .plus-link .plus-link-container .plus-link-come,'
				. '#' . esc_js($uniqid) . ' .entry-thumb:hover .entry-hover .dfd-dots-link span { background: ' . esc_js($settings['portfolio_hover_mask_background']) . ' !important;}';
		}

		if (isset($settings['portfolio_hover_mask_background_opacity']) && $settings['portfolio_hover_mask_background_opacity'] != '') {
			$css_rules .= '#' . esc_js($uniqid) . ' .entry-thumb .entry-hover:before,'
				. '#' . esc_js($uniqid) . ' .dfd-3d-parallax:hover .cover .thumb-wrap:before {'
				. 'opacity: ' . $settings['portfolio_hover_mask_background_opacity'] / 100 . ' !important;'
				. '}';
		}

		if (isset($settings['info_block_border_radius']) && $settings['info_block_border_radius'] != '') {
			$css_rules .= '#' . esc_js($uniqid) . ' .box-info {border-radius: ' . esc_js($settings['info_block_border_radius']) . 'px;}';
		}
		if (isset($settings['info_text_transform']) && !empty($settings['info_text_transform'])) {
			$css_rules .= '#' . esc_js($uniqid) . ' .box-info {text-transform: ' . esc_js($settings['info_text_transform']) . ';}';
		}
		if (isset($settings['info_block_left_right_padding']) && $settings['info_block_left_right_padding'] != '') {
			$css_rules .= '#' . esc_js($uniqid) . ' .box-info {padding: 0 ' . esc_js($settings['info_block_left_right_padding']) . 'px;}';
		}

		if (isset($settings['portfolio_hover_mask_background_style']) && $settings['portfolio_hover_mask_background_style'] != '') {
			switch ($settings['portfolio_hover_mask_background_style']) {
				case 'gradient':
					if (isset($settings['portfolio_hover_mask_bg_start_color']) && $settings['portfolio_hover_mask_bg_start_color'] != '' && isset($settings['portfolio_hover_mask_bg_end_color']) && $settings['portfolio_hover_mask_bg_end_color'] != '') {
						$css_rules .= '#' . esc_js($uniqid) . ' .entry-thumb .entry-hover:before,'
							. '#' . esc_js($uniqid) . ' .dfd-3d-parallax:hover .cover .thumb-wrap:before {'
							. 'background: -webkit-linear-gradient(left, ' . esc_js($settings['portfolio_hover_mask_bg_start_color']) . ',' . esc_js($settings['portfolio_hover_mask_bg_end_color']) . ') !important;'
							. 'background: -moz-linear-gradient(left, ' . esc_js($settings['portfolio_hover_mask_bg_start_color']) . ',' . esc_js($settings['portfolio_hover_mask_bg_end_color']) . ') !important;'
							. 'background: -o-linear-gradient(left, ' . esc_js($settings['portfolio_hover_mask_bg_start_color']) . ',' . esc_js($settings['portfolio_hover_mask_bg_end_color']) . ') !important;'
							. 'background: -ms-linear-gradient(left, ' . esc_js($settings['portfolio_hover_mask_bg_start_color']) . ',' . esc_js($settings['portfolio_hover_mask_bg_end_color']) . ') !important;'
							. 'background: linear-gradient(left, ' . esc_js($settings['portfolio_hover_mask_bg_start_color']) . ',' . esc_js($settings['portfolio_hover_mask_bg_end_color']) . ') !important;'
							. '}';
					}
					break;
				case 'simple-color':
				default:
					if (isset($settings['portfolio_hover_mask_background']) && $settings['portfolio_hover_mask_background'] != '') {
						$css_rules .= '#' . esc_js($uniqid) . ' .entry-thumb .entry-hover:before,'
							. '#' . esc_js($uniqid) . ' .dfd-3d-parallax:hover .cover .thumb-wrap:before {'
							. 'background: ' . esc_js($settings['portfolio_hover_mask_background']) . ' !important;'
							. '}';
					}
					break;
			}
		}
		
		$output = '<div id="' . $uniqid . '" class="dfd-simple-advertisement ' . $hover_effect_classes . ' ' . esc_attr($settings['main_style']) . ' '.esc_attr($el_class).'">';
			$output .= '<div class="cover ' . $shadow_class . '">';
			$output .= '<div class="image-wrap">';
				$output .= $link;
				$output .= '<div class="content-wrap">';
					$output .= '<div class="content-level2">';
						$output .= '<div class="content-level3">';
							$output .= $subtitle_html;
							$output .= $title_html;
							$output .= $info_html;
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div>';
				$output .= $image_html;
				$output .= $settings['portfolio_hover_enable'] == "yes" ? $hover_style_html : "";
			$output .= '</div>';
		$output .= '</div>';

		if ($css_rules != '') {
			$output .= '<script type="text/javascript">'
							. '(function($) {'
								. '$("head").append("<style>' . $css_rules . '</style>");'
							. '})(jQuery);'
						. '</script>';
		}
		$output .= '</div>';

		echo $output;
	}

}
