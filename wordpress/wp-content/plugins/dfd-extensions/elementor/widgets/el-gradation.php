<?php

if (!defined('ABSPATH')) {
	exit;
}

class El_Gradation extends \Elementor\Widget_Base {

	public function get_name() {
		return 'el_gradation';
	}

	public function get_title() {
		return esc_html__('DFD Gradation', 'dfd-native');
	}

	public function get_categories() {
		return ['native-category'];
	}

	public function get_icon() {
		return 'dfd_gradation';
	}

	protected function register_controls() {

		$this->start_controls_section(
			'el_gradation',
			[
				'label' => esc_html__('Gradation', 'dfd-native')
			]
		);

		$this->add_control(
			'main_style',
			[
				'label' => esc_html__('Style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'style-2' => [
						'title' => esc_html__('Left', 'dfd-native'),
						'icon' => 'eicon-text-align-left'
					],
					'style-1' => [
						'title' => esc_html__('Center', 'dfd-native'),
						'icon' => 'eicon-text-align-center'
					],
					'style-3' => [
						'title' => esc_html__('Right', 'dfd-native'),
						'icon' => 'eicon-text-align-right'
					]
				],
				'default' => 'style-1'
			]
		);

		$this->add_control(
			'columns_width',
			[
				'label' => esc_html__('Element width', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'full-width-elements' => esc_html__('Full width', 'dfd-native'),
					'half-size-elements' => esc_html__('Half size', 'dfd-native'),
					'one-third-width-elements' => esc_html__('Third size', 'dfd-native'),
					'quarter-width-elements' => esc_html__('Quarter size', 'dfd-native')
				],
				'default' => 'one-third-width-elements'
			]
		);

		$this->add_control(
			'content_only_hover',
			[
				'label' => esc_html__('Description only on hover', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);

		$this->add_control(
			'side_delimeter',
			[
				'label' => esc_html__('Side delimeter', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
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

		$repeater->add_control(
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

		$repeater->add_control(
			'icon_image_id',
			[
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label' => esc_html__('Upload Image', 'dfd-native'),
				'condition' => [
					'icon_type' => 'custom'
				]
			]
		);

		$repeater->add_control(
			'icon_text',
			[
				'label' => esc_html__('Text', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'icon_type' => 'text'
				]
			]
		);

		$repeater->add_control(
			'block_title',
			[
				'label' => esc_html__('Title', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
			'block_subtitle',
			[
				'label' => esc_html__('Subtitle', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
			'block_content',
			[
				'label' => esc_html__('Description', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXTAREA
			]
		);
		
		$this->add_control(
			'list_fields',
			[
				'label' => esc_html__('List content', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls()
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			[
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'label' => esc_html__('Style', 'dfd-native'),
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__('Icon size', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 200,
					]
				],
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
				'selectors' => [
					'{{WRAPPER}} .dfd-gradation-item .icon-wrap' => 'color: {{SCHEME}};'
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
				'selectors' => [
					'{{WRAPPER}} .dfd-gradation-item:hover .icon-wrap' => 'color: {{SCHEME}};'
				]
			]
		);

		$this->add_control(
			'icon_bg_size',
			[
				'label' => esc_html__('Icon background size', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 500,
					]
				],
			]
		);
		
		$this->add_control(
			'border_radius',
			[
				'label' => esc_html__('Border radius', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					]
				],
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
			]
		);
		
		$this->add_control(
			'hover_border_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Border hover color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
			]
		);
		
		$this->add_control(
			'background_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Icon background color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
			]
		);
		
		$this->add_control(
			'hover_background_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Icon hover background color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
			]
		);
		
		$this->add_control(
			'item_offset',
			[
				'label' => esc_html__('Space between blocks', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					]
				],
				'condition' => [
					'main_style' => ['style-2', 'style-3']
				]
			]
		);
		
		$this->add_control(
			'connector_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Delimeter color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'condition' => [
					'main_style' => ['style-2', 'style-3']
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
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'style-subtitle-typography',
				'label' => esc_html__('Subtitle typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .grad-millestone-subtitle',
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'style-description-typography',
				'label' => esc_html__('Description typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .description',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$output = $uniqid = $link_css = $icon_html = '';
		$list_class = $el_class = '';
		
		$settings = $this->get_settings_for_display();
		
		$uniqid = uniqid('dfd-gradation-') . '-' . rand(1, 9999);

		$el_class .= ' '.$settings['main_style'];
		
		if (isset($settings['content_only_hover']) && strcmp($settings['content_only_hover'], 'yes') == 0) {
			$el_class .= ' content-only-hover';
		}
		if (isset($settings['side_delimeter']) && $settings['side_delimeter']) {
			$el_class .= ' side-delimeter';
		}
		
		if (isset($settings['main_style']) && strcmp($settings['main_style'], 'style-1') == 0 && isset($settings['columns_width']) && strcmp($settings['columns_width'], '') !== 0) {
			$list_class .= $settings['columns_width'];
		}

		if(!empty($settings['icon_size']['size'])) {
			$link_css .= '#' . $uniqid . ' .dfd-gradation-item .icon-wrap {font-size: '.$settings['icon_size']['size'].'px;}';
			$link_css .= '#' . $uniqid . ' .icon-decoration img {width: '.$settings['icon_size']['size'].';}';
		}
		if (isset($settings['icon_bg_size']['size']) && !empty($settings['icon_bg_size']['size'])) {
			$link_css .= '#'.$uniqid.'.style-1 .dfd-gradation-item .icon-centered-container, #'.$uniqid.'.style-2 .dfd-gradation-item .icon-wrap, #'.$uniqid.'.style-3 .dfd-gradation-item .icon-wrap {width: '.$settings['icon_bg_size']['size'].'px; height: '.$settings['icon_bg_size']['size'].'px; line-height: '.$settings['icon_bg_size']['size'].'px;}';
			if (is_rtl()) {
				$link_css .= '#' . $uniqid . '.style-1 .icon-wrap:before {left: ' . (int)$settings['icon_bg_size']['size'] + 30 . 'px;}';
				$link_css .= '#' . $uniqid . '.style-1 .icon-wrap:after {right: ' . (int)$settings['icon_bg_size']['size'] + 30 . 'px;}';
			} else {
				$link_css .= '#' . $uniqid . '.style-1 .icon-wrap:before {right: ' . (int)$settings['icon_bg_size']['size'] + 30 . 'px;}';
				$link_css .= '#' . $uniqid . '.style-1 .icon-wrap:after {left: ' . (int)$settings['icon_bg_size']['size'] + 30 . 'px;}';
			}
			$link_css .= '#' . $uniqid . '.style-2 .icon-wrap:before, #' . $uniqid . '.style-3 .icon-wrap:before {bottom: ' . (int)$settings['icon_bg_size']['size'] + 15 . 'px;}';
			$link_css .= '#' . $uniqid . '.style-2 .icon-wrap:after, #' . $uniqid . '.style-3 .icon-wrap:after {top: ' . (int)$settings['icon_bg_size']['size'] + 15 . 'px;}';
			$link_css .= '#' . $uniqid . '.style-2 .content-wrap {margin-left: ' . (int)$settings['icon_bg_size']['size'] + 25 . 'px;}';
			$link_css .= '#' . $uniqid . '.style-3 .content-wrap {margin-right: ' . (int)$settings['icon_bg_size']['size'] + 25 . 'px;}';
			$link_css .= '#' . $uniqid . '.style-2 .icon-wrap, #' . $uniqid . '.style-3 .icon-wrap {margin-top: -' . (int)$settings['icon_bg_size']['size'] / 2 . 'px;}';
			$link_css .= '#' . $uniqid . '.style-2 .icon-centered-container, #' . $uniqid . '.style-3 .icon-centered-container {min-height: ' . $settings['icon_bg_size']['size'] . 'px;}';
		}
		if (isset($settings['border_radius']['size']) && !empty($settings['border_radius']['size']) || strcmp($settings['border_radius']['size'], 0) === 0) {
			$link_css .= '#' . $uniqid . ' .icon-decoration {border-radius: ' . $settings['border_radius']['size'] . 'px;}';
		}
		if (isset($settings['border_color']) && !empty($settings['border_color'])) {
			$link_css .= '#' . $uniqid . ' .dfd-gradation-item .icon-decoration:before {border-color: ' . $settings['border_color'] . ';}';
		}
		if (isset($settings['hover_border_color']) && !empty($settings['hover_border_color'])) {
			$link_css .= '#' . $uniqid . ' .dfd-gradation-item:hover .icon-decoration:before {border-color: ' . $settings['hover_border_color'] . ';}';
		}
		if (isset($settings['background_color']) && !empty($settings['background_color'])) {
			$link_css .= '#' . $uniqid . ' .dfd-gradation-item .icon-decoration:before {background: ' . $settings['background_color'] . ';}';
		}
		if (isset($settings['hover_background_color']) && !empty($settings['hover_background_color'])) {
			$link_css .= '#' . $uniqid . ' .dfd-gradation-item:hover .icon-decoration:before {background: ' . $settings['hover_background_color'] . ';}';
		}
		if (isset($settings['connector_color']) && !empty($settings['connector_color'])) {
			$link_css .= '#' . $uniqid . ' .icon-wrap:before, #' . $uniqid . ' .icon-wrap:after {background: ' . $settings['connector_color'] . ';}';
		}
		if (isset($settings['main_style']) && $settings['main_style'] != 'style-1') {
			if (isset($settings['item_offset']['size']) && $settings['item_offset']['size'] != '') {
				$link_css .= '#' . $uniqid . ' .dfd-gradation-item {padding: ' . (int)$settings['item_offset']['size'] / 2 . 'px 0;}';
			}
		}

		$output .= '<div id="' . esc_attr($uniqid) . '" class="dfd-gradation-wrap ' . esc_attr($el_class) . '">';
		if (isset($settings['list_fields']) && !empty($settings['list_fields'])) {

			if (!empty($link_css)) {
				$output .= '<script type="text/javascript">'
								. '(function($) {'
									. '$("head").append("<style>' . esc_js($link_css) . '</style>");'
								. '})(jQuery);'
							. '</script>';
			}

			$output .= '<ul class="dfd-gradation-list clearfix ' . esc_attr($list_class) . '">';
			
			foreach ($settings['list_fields'] as $fields) {

				$title_html = $subtitle_html = $content_html = $icon_html = '';

				if (isset($fields['block_title']) && !empty($fields['block_title'])) {
					$title_html = '<' . $settings['title_html_tag'] . ' class="dfd-content-title-big">' . esc_html($fields['block_title']) . '</' . $settings['title_html_tag'] . '>';
				}
				if (isset($fields['block_subtitle']) && !empty($fields['block_subtitle'])) {
					$subtitle_html = '<' . $settings['subtitle_html_tag'] . ' class="grad-millestone-subtitle dfd-content-subtitle">' . esc_html($fields['block_subtitle']) . '</' . $settings['subtitle_html_tag'] . '>';
				}
				if (isset($fields['block_content']) && !empty($fields['block_content'])) {
					$content_html = '<div class="description">' . esc_html($fields['block_content']) . '</div>';
				}
				
				$icon_html .= dfd_elementor_icon_render($fields, $settings['icon_size']['size']);
				
				$output .= '<li class="dfd-gradation-item dfd-equalize-height">';
					$output .= '<div class="icon-centered-container">';
						$output .= '<div class="icon-wrap">';
							$output .= '<span class="icon-decoration">';
								$output .= $icon_html;
							$output .= '</span>';
						$output .= '</div>';
					$output .= '</div>';
					$output .= '<div class="content-wrap">';
						$output .= '<div class="content-centered-container">';
							$output .= '<div class="title-wrap">';
								$output .= $title_html;
								$output .= $subtitle_html;
							$output .= '</div>';
							$output .= '<div class="description-container">';
								$output .= $content_html;
							$output .= '</div>';
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</li>';
			}
			$output .= '</ul>';
		}

		$output .= '</div>';

		echo $output;

	}

}
