<?php

if (!defined('ABSPATH')) {
	exit;
}

class El_Portfolio_Module extends \Elementor\Widget_Base {

	public function get_name() {
		return 'el_portfolio_module';
	}

	public function get_title() {
		return esc_html__('DFD Portfolio module', 'dfd-native');
	}

	public function get_categories() {
		return ['native-category'];
	}

	public function get_icon() {
		return 'dfd_portfolio';
	}

	/**
	 * Get portfolio categories.
	 * */
	private function get_dfd_portfolio_category() {
		$options = array();

		$terms = get_terms(
			array(
				'taxonomy' => 'portfolio_category',
				'hide_empty' => true,
			)
		);
		foreach ($terms as $term) {
			if (isset($term)) {
				if (isset($term->slug) && isset($term->name)) {
					$options[$term->slug] = $term->name;
				}
			}
		}

		return $options;
	}

	protected function register_controls() {

		$this->start_controls_section(
			'el_portfolio_module',
			[
				'label' => esc_html__('Portfolio module', 'dfd-native')
			]
		);

		$this->add_control(
			'portfolio_style',
			[
				'label' => esc_html__('Style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'carousel' => esc_html__('Carousel', 'dfd-native'),
					'fitRows' => esc_html__('Grid', 'dfd-native'),
					'masonry' => esc_html__('Masonry', 'dfd-native'),
					'justified' => esc_html__('Justified grid', 'dfd-native')
				],
				'default' => 'carousel'
			]
		);

		$this->add_control(
			'posts_to_show',
			[
				'label' => esc_html__('Portfolios to show', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 6
			]
		);

		$this->add_control(
			'items_offset',
			[
				'label' => esc_html__('Items offset', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 20,
				'condition' => [
					'portfolio_style' => ['carousel', 'fitRows', 'masonry']
				]
			]
		);

		$this->add_control(
			'image_width',
			[
				'label' => esc_html__('Image width', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'portfolio_style' => ['carousel', 'fitRows']
				]
			]
		);

		$this->add_control(
			'image_height',
			[
				'label' => esc_html__('Image height', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'portfolio_style' => ['carousel', 'fitRows']
				]
			]
		);
		$this->end_controls_section();
		
		if (!empty($this->get_dfd_portfolio_category())) {

			$this->start_controls_section(
				'category_heading',
				[
					'label' => esc_html__('Select Category', 'dfd-native')
				]
			);

			foreach ($this->get_dfd_portfolio_category() as $slug => $name) {
				$this->add_control(
					'portfolio_categories_' . $slug,
					[
						'label' => $name,
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'default' => 'no'
					]
				);
			}
			
			$this->end_controls_section();
			
		}
		
		$this->start_controls_section(
			'layout_p_heading',
			[
				'label' => esc_html__('Layout settings', 'dfd-native'),
			]
		);
		
		$this->add_control(
			'columns',
			[
				'label' => esc_html__('Number of columns', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					1 => esc_html__('One', 'dfd-native'),
					2 => esc_html__('Two', 'dfd-native'),
					3 => esc_html__('Three', 'dfd-native'),
					4 => esc_html__('Four', 'dfd-native'),
					5 => esc_html__('Five', 'dfd-native')
				],
				'condition' => [
					'portfolio_style' => ['carousel', 'fitRows', 'masonry']
				],
				'default' => 3
			]
		);

		$this->add_control(
			'enabled_autoslideshow',
			[
				'label' => esc_html__('Auto slideshow', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'portfolio_style' => ['carousel']
				],
			]
		);

		$this->add_control(
			'carousel_slideshow_speed',
			[
				'label' => esc_html__('Slideshow speed', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'enabled_autoslideshow' => ['yes'],
					'portfolio_style' => ['carousel']
				],
				'default' => 5000
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'content_p_heading',
			[
				'label' => esc_html__('Content elements', 'dfd-native'),
			]
		);
		
		$this->add_control(
			'show_sort_panel',
			[
				'label' => esc_html__('Sort Panel', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'portfolio_style' => ['masonry', 'fitRows']
				],
				'default' => 'yes'
			]
		);

		$this->add_control(
			'portfolio_show_top_cat',
			[
				'label' => esc_html__('Category', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER
			]
		);

		$this->add_control(
			'portfolio_show_title',
			[
				'label' => esc_html__('Title', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER
			]
		);

		$this->add_control(
			'portfolio_show_subtitle',
			[
				'label' => esc_html__('Subtitle', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER
			]
		);

		$this->add_control(
			'portfolio_show_meta',
			[
				'label' => esc_html__('Meta', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER
			]
		);

		$this->add_control(
			'portfolio_show_meta_date',
			[
				'label' => esc_html__('Date in portfolio meta', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'portfolio_show_meta' => ['yes']
				],
				'default' => 'yes'
			]
		);

		$this->add_control(
			'portfolio_show_meta_category',
			[
				'label' => esc_html__('Category in portfolio meta', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'portfolio_show_meta' => ['yes']
				],
				'default' => 'yes'
			]
		);

		$this->add_control(
			'portfolio_show_meta_comments',
			[
				'label' => esc_html__('Comments counter in portfolio meta', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'portfolio_show_meta' => ['yes']
				],
				'default' => 'yes'
			]
		);

		$this->add_control(
			'portfolio_show_meta_likes',
			[
				'label' => esc_html__('Likes in portfolio meta', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'portfolio_show_meta' => ['yes']
				],
				'default' => 'yes'
			]
		);

		$this->add_control(
			'portfolio_show_content',
			[
				'label' => esc_html__('Excerpt', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER
			]
		);

		$this->add_control(
			'sort_panel_alignment',
			[
				'label' => esc_html__('Sort panel alignment', 'dfd-native'),
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
					'show_sort_panel' => ['yes'],
					'portfolio_style' => ['masonry', 'fitRows']
				],
				'default' => 'text-center'
			]
		);

		$this->add_control(
			'portfolio_content_position',
			[
				'label' => esc_html__('Content position', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'bottom' => esc_html__('Bottom', 'dfd-native'),
					'front' => esc_html__('Front', 'dfd-native')
				],
				'condition' => [
					'portfolio_style' => ['carousel', 'fitRows', 'masonry']
				],
				'default' => 'bottom'
			]
		);

		$this->add_control(
			'portfolio_content_valign',
			[
				'label' => esc_html__('Content vertical alignment', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'bottom' => esc_html__('Bottom', 'dfd-native'),
					'middle' => esc_html__('Middle', 'dfd-native'),
					'top' => esc_html__('Top', 'dfd-native')
				],
				'condition' => [
					'portfolio_content_position' => ['front']
				],
				'default' => 'bottom'
			]
		);

		$this->add_control(
			'portfolio_content_alignment',
			[
				'label' => esc_html__('Content alignment', 'dfd-native'),
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

		$this->end_controls_section();

		$this->start_controls_section(
			'hover_heading',
			[
				'label' => esc_html__('Hover', 'dfd-native')
			]
		);

		$this->add_control(
			'portfolio_hover_enable',
			[
				'label' => esc_html__('Hover', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);

		$this->add_control(
			'portfolio_content_style',
			[
				'label' => esc_html__('Content style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'standard' => esc_html__('Simple', 'dfd-native'),
					'tiled' => esc_html__('Tiled', 'dfd-native')
				],
				'condition' => [
					'portfolio_style' => ['fitRows', 'masonry', 'justified']
				],
				'default' => 'standard'
			]
		);

		$this->add_control(
			'portfolio_hover_appear_effect',
			[
				'label' => esc_html__('Mask appear effect', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'dfd-fade-out' => esc_html__('Fade out', 'dfd-native'),
					'dfd-fade-offset' => esc_html__('Fade out offset', 'dfd-native'),
					'dfd-left-to-right' => esc_html__('From left to right', 'dfd-native'),
					'dfd-right-to-left' => esc_html__('From right to left', 'dfd-native'),
					'dfd-top-to-bottom' => esc_html__('From top to bottom', 'dfd-native'),
					'dfd-bottom-to-top' => esc_html__('From bottom to top', 'dfd-native'),
					'portfolio-hover-style-1' => esc_html__('Following the mouse', 'dfd-native'),
					'dfd-3d-parallax' => esc_html__('3d parallax', 'dfd-native')
				],
				'condition' => [
					'portfolio_hover_enable' => ['yes']
				],
				'default' => 'dfd-fade-out'
			]
		);

		$this->add_control(
			'portfolio_hover_image_effect',
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
					'dfd-image-blur' => esc_html__('Blur', 'dfd-native')
				],
				'condition' => [
					'portfolio_hover_appear_effect' => ['dfd-fade-out', 'dfd-fade-offset', 'dfd-left-to-right', 'dfd-right-to-left', 'dfd-top-to-bottom', 'dfd-bottom-to-top']
				],
				'default' => 'panr'
			]
		);

		$this->add_control(
			'portfolio_hover_mask_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Mask content color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .icon-wrapper .info-box-icon-text' => 'color: {{SCHEME}};'
				],
				'condition' => [
					'portfolio_hover_enable' => 'yes'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'portfolio_hover_mask_background',
				'label' => esc_html__('Mask background', 'plugin-name'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover:before, {{WRAPPER}} .dfd-portfolio-module .dfd-portfolio.dfd-3d-parallax:hover .cover .thumb-wrap:before',
				'condition' => [
					'portfolio_hover_enable' => 'yes'
				]
			]
		);

		$this->add_control(
			'portfolio_hover_mask_border',
			[
				'label' => esc_html__('Hover mask frame decoration', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'portfolio_hover_enable' => 'yes'
				],
				'default' => ''
			]
		);

		$this->add_control(
			'portfolio_hover_mask_bordered_style',
			[
				'label' => esc_html__('Hover mask frame style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'simple-border' => esc_html__('Simple', 'dfd-native'),
					'offset' => esc_html__('Offset', 'dfd-native')
				],
				'condition' => [
					'portfolio_hover_mask_border' => 'yes'
				],
				'default' => 'simple-border',
			]
		);

		$this->add_control(
			'portfolio_hover_mask_bordered_size',
			[
				'label' => esc_html__('Hover mask frame size', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'portfolio_hover_mask_border' => 'yes'
				]
			]
		);

		$this->add_control(
			'portfolio_hover_main_decoration_link',
			[
				'label' => esc_html__('Decoration link', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'inside' => esc_html__('Inside', 'dfd-native'),
					'external' => esc_html__('External link', 'dfd-native'),
					'lightbox' => esc_html__('Lightbox', 'dfd-native')
				],
				'condition' => [
					'portfolio_hover_main_decoration' => ['heading', 'plus', 'dots', 'none']
				],
				'default' => 'inside',
			]
		);

		$this->add_control(
			'portfolio_hover_main_decoration',
			[
				'label' => esc_html__('Main decoration', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'heading' => esc_html__('Heading', 'dfd-native'),
					'plus' => esc_html__('Plus', 'dfd-native'),
					'dots' => esc_html__('Dots', 'dfd-native'),
					'buttons' => esc_html__('Buttons', 'dfd-native'),
					'none' => esc_html__('None', 'dfd-native')
				],
				'condition' => [
					'portfolio_hover_enable' => 'yes'
				],
				'default' => 'inside',
			]
		);

		$this->add_control(
			'portfolio_hover_show_title',
			[
				'label' => esc_html__('Title', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'portfolio_hover_main_decoration' => 'heading'
				],
				'default' => 'yes'
			]
		);

		$this->add_control(
			'portfolio_hover_show_subtitle',
			[
				'label' => esc_html__('Subtitle', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'portfolio_hover_main_decoration' => 'heading'
				],
				'default' => 'yes'
			]
		);

		$this->add_control(
			'portfolio_hover_plus_position',
			[
				'label' => esc_html__('Plus style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'dfd-middle' => esc_html__('Big plus in the middle of the thumb', 'dfd-native'),
					'dfd-middle dfd-plus-bordered' => esc_html__('Small plus in the middle of the thumb', 'dfd-native'),
					'dfd-cursor-plus' => esc_html__('Following the mouse', 'dfd-native')
				],
				'condition' => [
					'portfolio_hover_main_decoration' => 'plus'
				],
				'default' => 'inside',
			]
		);

		$this->add_control(
			'portfolio_hover_buttons_inside',
			[
				'label' => esc_html__('Link inside portfolio item', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'portfolio_hover_main_decoration' => 'buttons'
				],
				'default' => 'yes'
			]
		);

		$this->add_control(
			'portfolio_hover_buttons_external',
			[
				'label' => esc_html__('Portfolio item external link', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'portfolio_hover_main_decoration' => 'buttons'
				],
				'default' => 'yes'
			]
		);

		$this->add_control(
			'portfolio_hover_buttons_lightbox',
			[
				'label' => esc_html__('Lightbox', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'portfolio_hover_main_decoration' => 'buttons'
				],
				'default' => 'yes'
			]
		);

		$this->add_control(
			'portfolio_hover_buttons_bg',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Buttons background', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
//				'selectors' => [
//					'{{WRAPPER}} .icon-wrapper .info-box-icon-text' => 'color: {{SCHEME}};'
//				],
				'condition' => [
					'portfolio_hover_main_decoration' => 'buttons'
				]
			]
		);

		$this->add_control(
			'use_dots',
			[
				'label' => esc_html__('Pagination', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'portfolio_style' => 'carousel'
				],
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
					'dfdroundedfilled' => esc_html__('Rounded Filled', 'dfd-native')
				],
				'condition' => [
					'use_dots' => 'yes'
				],
				'default' => 'dfdrounded',
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

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_font_options',
				'label' => esc_html__('Title typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .dfd-portfolio-module article.dfd-portfolio h3.entry-title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_font_options',
				'label' => esc_html__('Subtitle typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .dfd-portfolio-module article.dfd-portfolio .entry-subtitle',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		
		$output = $sort_panel_html = $data_atts = $css_rules = '';
		
		$el_class = '';

		$uniqid = uniqid('dfd-portfolio-');

		$settings = $this->get_settings_for_display();

		if(!isset($settings['columns']) || $settings['columns'] == '') {
			$settings['columns'] = 3;
		}
		
		get_template_part('inc/loop/posts/portfolio_shortcode');

		$options = array(
			'portfolio_show_top_cat',
			'portfolio_show_meta',
			'portfolio_show_meta_date',
			'portfolio_show_meta_category',
			'portfolio_show_meta_comments',
			'portfolio_show_meta_likes',
			'portfolio_show_title',
			'portfolio_show_subtitle',
//			'portfolio_show_image',
			'portfolio_show_content',
//			'portfolio_show_author_box',
			'portfolio_hover_enable',
			'portfolio_hover_mask_border',
			'portfolio_hover_show_title',
			'portfolio_hover_show_subtitle',
			'portfolio_hover_buttons_inside',
			'portfolio_hover_buttons_external',
			'portfolio_hover_buttons_lightbox',
		);
		foreach ($options as $key) {
			if($settings[$key] == 'yes') {
				$settings[$key] = 'on';
			} else {
				$settings[$key] = 'off';
			}
		}

		$post = new Dfd_portfolio_shortcode($settings);

		$sticky = get_option('sticky_posts');

		$args = array(
			'post_type' => 'portfolio',
			'posts_per_page' => $settings['posts_to_show'],
			'ignore_sticky_posts' => 1,
			'post__not_in' => $sticky,
		);

		$portfolio_categories = array();
		foreach ($this->get_dfd_portfolio_category() as $slug => $name) {
			if($settings['portfolio_categories_' . $slug] == 'yes') {
				$portfolio_categories[] = $slug;
			}
		}
		
		if (!empty($portfolio_categories)) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'portfolio_category',
					'field' => 'slug',
					'terms' => $portfolio_categories,
				)
			);
		}

		$el_class .= ' layout-' . $settings['portfolio_style'];

		if ($settings['portfolio_style'] == 'metro' || $settings['portfolio_style'] == 'justified') {
			$settings['items_offset'] = 0;
			$el_class .= ' featured-images-bg content-front content-valign-bottom';
			$el_class .= ' content-valign-' . $settings['portfolio_content_valign'];
		} elseif (isset($settings['portfolio_content_position']) && $settings['portfolio_content_position'] != '') {
			$el_class .= ' content-' . $settings['portfolio_content_position'];
			$el_class .= ' content-valign-' . $settings['portfolio_content_valign'];
		}

		if (isset($settings['items_offset']) && $settings['items_offset'] != '') {
			$css_rules .= '#' . esc_js($uniqid) . ' > .dfd-portfolio-module {margin: -' . esc_js((int) $settings['items_offset'] / 2) . 'px;}';
		}
		if (substr_count($settings['portfolio_style'], 'carousel') > 0) {
			$el_class .= ' dfd-carousel-wrap';
			$data_atts .= ' data-slides="' . esc_attr($settings['columns']) . '"';
			$data_atts .= ' data-scroll="1"';
			$data_atts .= ' data-infinite="true"';
			if ($settings['enabled_autoslideshow'] == 'yes') {
				$data_atts .= ' data-autoplay="true"';
			}
			if (isset($settings['carousel_slideshow_speed']) && $settings['carousel_slideshow_speed'] != '') {
				$data_atts .= ' data-speed="' . esc_attr($settings['carousel_slideshow_speed']) . '"';
			}
			if (isset($settings['use_dots']) && $settings['use_dots'] == 'yes') {
				$data_atts .= ' data-dots="true"';
				$el_class .= ' text-center';
				if (isset($settings['dots_style']) && $settings['dots_style'] != '') {
					$el_class .= ' above ' . $settings['dots_style'];
				}
			}
			if (isset($settings['items_offset']) && $settings['items_offset'] != '') {
				$css_rules .= '#' . esc_js($uniqid) . ' > .dfd-portfolio-module article.dfd-portfolio > .cover {padding: ' . esc_js((int) $settings['items_offset'] / 2) . 'px;}';
			}
		}
		if ($settings['portfolio_style'] == 'masonry' || $settings['portfolio_style'] == 'fitRows' || $settings['portfolio_style'] == 'metro') {
			if (isset($settings['show_sort_panel']) && $settings['show_sort_panel'] == 'yes') {
				$categories = get_terms('portfolio_category');
				$sort_panel_html .= '<div class="clearfix">';
				$sort_panel_html .= '<div class="sort-panel ' . esc_attr($settings['sort_panel_alignment']) . '">';
				$sort_panel_html .= '<ul class="filter">';
				$sort_panel_html .= '<li class="active"><a data-filter=".dfd-portfolio" href="#">' . esc_html__('All', 'dfd-native') . '</a></li>';
				foreach ($categories as $category) {
					$sort_panel_html .= '<li><a data-filter=".dfd-portfolio[data-category~=\'' . strtolower(preg_replace('/\s+/', '-', $category->slug)) . '\']" href="#">' . $category->name . '</a></li>';
				}
				$sort_panel_html .= '</ul>';
				$sort_panel_html .= '</div>';
				$sort_panel_html .= '</div>';
			}
			$el_class .= ' isotope-columns-' . esc_attr($settings['columns']);
			$data_atts .= ' data-enable-isotope="1"';
			$data_atts .= ' data-layout-type="' . esc_attr($settings['portfolio_style']) . '"';
			$data_atts .= ' data-columns="' . esc_attr($settings['columns']) . '"';
			if (isset($settings['items_offset']) && $settings['items_offset'] != '') {
				$css_rules .= '#' . esc_js($uniqid) . ' > .dfd-portfolio-module article.dfd-portfolio {padding: ' . esc_js((int) $settings['items_offset'] / 2) . 'px;}';
			}
		}

		if (isset($settings['portfolio_content_style']) && !empty($settings['portfolio_content_style'])) {
			$el_class .= ' posts-' . $settings['portfolio_content_style'];
		}

		if (isset($settings['portfolio_hover_mask_border']) && $settings['portfolio_hover_mask_border'] == 'yes') {
			if ($settings['portfolio_hover_mask_bordered_style'] == 'simple-border') {
				$offset = (int) $settings['portfolio_hover_mask_bordered_size'] + 20;
				$css_rules .= '#' . esc_js($uniqid) . ' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .dfd-hover-frame-deco {'
					. 'display: block;'
					. '}'
					. '#' . esc_js($uniqid) . ' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .dfd-hover-frame-deco .line.line-top,'
					. '#' . esc_js($uniqid) . ' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .dfd-hover-frame-deco .line.line-bottom{'
					. 'height: ' . (int) $settings['portfolio_hover_mask_bordered_size'] . 'px;'
					. '}'
					. '#' . esc_js($uniqid) . ' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .dfd-hover-frame-deco .line.line-left,'
					. '#' . esc_js($uniqid) . ' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .dfd-hover-frame-deco .line.line-right {'
					. 'width: ' . (int) $settings['portfolio_hover_mask_bordered_size'] . 'px;'
					. '}'
					. '#' . esc_js($uniqid) . ' > .dfd-portfolio-module .dfd-portfolio.dfd-3d-parallax .entry-thumb .entry-hover:before {'
					. 'display: none;'
					. '}'
					. '#' . esc_js($uniqid) . ' > .dfd-portfolio-module .dfd-portfolio.dfd-3d-parallax .cover .entry-thumb .thumb-wrap:before {'
					. 'display: block;'
					. '}';
			} elseif ($settings['portfolio_hover_mask_bordered_style'] == 'offset') {
				$css_rules .= '#' . esc_js($uniqid) . ' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover:before {'
					. 'top: ' . (int) $settings['portfolio_hover_mask_bordered_size'] . 'px; bottom: ' . (int) $settings['portfolio_hover_mask_bordered_size'] . 'px;'
					. 'left: ' . (int) $settings['portfolio_hover_mask_bordered_size'] . 'px; right: ' . (int) $settings['portfolio_hover_mask_bordered_size'] . 'px;'
					. '}'
					. '#' . esc_js($uniqid) . ' > .dfd-portfolio-module .dfd-portfolio.dfd-3d-parallax .entry-thumb .entry-hover:before {'
					. '-webkit-transform: scale(1);'
					. '-moz-transform: scale(1);'
					. '-o-transform: scale(1);'
					. 'transform: scale(1);'
					. '}';
			}
		} else {
			$css_rules .= '#' . esc_js($uniqid) . ' > .dfd-portfolio-module .dfd-portfolio.dfd-3d-parallax .entry-thumb .entry-hover:before {'
				. 'display: none;'
				. '}'
				. '#' . esc_js($uniqid) . ' > .dfd-portfolio-module .dfd-portfolio.dfd-3d-parallax .cover .entry-thumb .thumb-wrap:before {'
				. 'display: block;'
				. '}';
		}

		if (isset($settings['portfolio_hover_mask_color']) && $settings['portfolio_hover_mask_color'] != '') {
			$css_rules .= '#' . esc_js($uniqid) . ' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .title-wrap h3.entry-title,'
				. '#' . esc_js($uniqid) . ' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .title-wrap .entry-subtitle.dfd-content-subtitle,'
				. '#' . esc_js($uniqid) . ' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .dfd-hover-buttons-wrap {color: ' . esc_js($settings['portfolio_hover_mask_color']) . ';}';

			$css_rules .= '#' . esc_js($uniqid) . ' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .title-wrap.diagonal-line:before,'
				. '#' . esc_js($uniqid) . ' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .title-wrap.title-underline h3.entry-title:before,'
				. '#' . esc_js($uniqid) . ' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .title-wrap.square-behind-heading:before { border-color: ' . Dfd_Theme_Helpers::dfd_hex2rgb($settings['portfolio_hover_mask_color'], .1) . ';}';

			$css_rules .= '#' . esc_js($uniqid) . ' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .plus-link .plus-link-container .plus-link-out,'
				. '#' . esc_js($uniqid) . ' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .plus-link .plus-link-container .plus-link-come,'
				. '#' . esc_js($uniqid) . ' > .dfd-portfolio-module .dfd-portfolio .entry-thumb:hover .entry-hover .dfd-dots-link span { background: ' . esc_js($settings['portfolio_hover_mask_color']) . ' !important;}';
		}

		if (isset($settings['portfolio_hover_buttons_bg']) && $settings['portfolio_hover_buttons_bg'] != '') {
			$css_rules .= '#' . esc_js($uniqid) . ' > .dfd-portfolio-module article.dfd-portfolio .entry-thumb .entry-hover .dfd-hover-buttons-wrap > *:hover:after {background: ' . $settings['portfolio_hover_buttons_bg'] . ';}';
		}
		
		$wp_query = new WP_Query($args);

		echo '<div id="' . esc_attr($uniqid) . '">';
		echo $sort_panel_html;
		echo '<div class="dfd-portfolio-module ' . esc_attr($el_class) . '" ' . $data_atts . '>';

		while ($wp_query->have_posts()) : $wp_query->the_post();
			$post->post();
		endwhile;

		echo '</div>';

		if ($css_rules != '') {
			echo '<script type="text/javascript">'
					. '(function($) {'
						. '$("head").append("<style>' . $css_rules . '</style>");'
					. '})(jQuery);'
				. '</script>';
		}

		echo '</div>';

		wp_reset_postdata();
	}

}
