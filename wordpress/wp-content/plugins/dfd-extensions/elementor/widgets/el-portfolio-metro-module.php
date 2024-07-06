<?php

if (!defined('ABSPATH')) {
	exit;
}

class El_Portfolio_Metro_Module extends \Elementor\Widget_Base {

	public function get_name() {
		return 'el_portfolio_metro_module';
	}

	public function get_title() {
		return esc_html__('DFD Portfolio metro module', 'dfd-native');
	}

	public function get_categories() {
		return ['native-category'];
	}

	public function get_icon() {
		return 'dfd_portfolio_metro';
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
	
	/**
	 * Get portfolio items.
	 * */
	private function get_dfd_portfolio_items() {
		
		$args = array(
			'post_status' => 'publish',
			'post_type' => 'portfolio',
			'posts_per_page' => -1,
		);
		
		$query = new WP_Query($args);
		
		$items = array();
		
		if (!empty($query)) {
			foreach ($query->posts as $post) {
				$title = get_the_title($post->ID);
				$items[$post->ID] = $title;
			}
		}
		wp_reset_postdata();

		return $items;
	}

	protected function register_controls() {

		$this->start_controls_section(
			'el_portfolio_metro_module',
			[
				'label' => esc_html__('Portfolio metro module', 'dfd-native')
			]
		);

		$this->add_control(
			'items',
			[
				'label' => esc_html__('Content', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'loop' => esc_html__('Loop', 'dfd-native'),
					'single' => esc_html__('Single item', 'dfd-native')
				],
				'default' => 'loop'
			]
		);
		
		if(!empty($this->get_dfd_portfolio_items())) {

			$repeater = new \Elementor\Repeater();
			
			$repeater->add_control(
				'post_id',
				[
					'label' => esc_html('Item to display', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => $this->get_dfd_portfolio_items()
				]
			);
			
			$repeater->add_control(
				'post_size',
				[
					'label' => esc_html('Item size', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'default' => esc_html('Standard', 'dfd-native'),
						'wide' => esc_html('Wide', 'dfd-native'),
						'tall' => esc_html('Tall', 'dfd-native'),
						'large' => esc_html('Large', 'dfd-native')
					],
					'default' => 'default'
				]
			);
			
			$this->add_control(
				'selected_items',
				[
					'label' => esc_html__('List content', 'dfd-native'),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'condition' => [
						'items' => ['single']
					]
				]
			);
			
		}
		
		if (!empty($this->get_dfd_portfolio_category())) {

			foreach ($this->get_dfd_portfolio_category() as $slug => $name) {
				$this->add_control(
					'portfolio_categories_' . $slug,
					[
						'label' => $name,
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'default' => 'no',
						'condition' => [
							'items' => ['loop']
						]
					]
				);
			}
			
		}

		$this->add_control(
			'posts_to_show',
			[
				'label' => esc_html__('Portfolios to show', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 4,
				'condition' => [
					'items' => ['loop']
				]
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
				'default' => 3
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'enabled_elements_heading',
			[
				'label' => esc_html__('Content elements', 'dfd-native')
			]
		);
		
		$this->add_control(
			'show_sort_panel',
			[
				'label' => esc_html__('Sort Panel', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		
		$this->add_control(
			'sort_panel_alignment',
			[
				'label' => esc_html__('Sort panel alignment', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'text-left' => esc_html__('Left', 'dfd-native'),
					'text-center' => esc_html__('Center', 'dfd-native'),
					'text-right' => esc_html__('Right', 'dfd-native')
				],
				'condition' => [
					'show_sort_panel' => ['yes']
				],
				'default' => 'text-center'
			]
		);
		
		$this->add_control(
			'portfolio_show_top_cat',
			[
				'label' => esc_html__('Category', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'no'
			]
		);
		
		$this->add_control(
			'portfolio_show_title',
			[
				'label' => esc_html__('Title', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'no'
			]
		);
		
		$this->add_control(
			'portfolio_show_subtitle',
			[
				'label' => esc_html__('Subtitle', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'no'
			]
		);
		
		$this->add_control(
			'portfolio_show_content',
			[
				'label' => esc_html__('Enable excerpt', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'no'
			]
		);
		
		$this->add_control(
			'portfolio_content_alignment',
			[
				'label' => esc_html__('Content alignment', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'text-left' => esc_html__('Left', 'dfd-native'),
					'text-center' => esc_html__('Center', 'dfd-native'),
					'text-right' => esc_html__('Right', 'dfd-native')
				],
				'default' => 'text-left'
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'hover_heading',
			[
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
					'portfolio_hover_appear_effect' => ['dfd-fade-out','dfd-fade-offset','dfd-left-to-right','dfd-right-to-left','dfd-top-to-bottom','dfd-bottom-to-top']
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
				'default' => '',
				'condition' => [
					'portfolio_hover_enable' => ['yes']
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'portfolio_mask_background',
				'label' => esc_html__('Hover mask background', 'dfd-native'),
				'types' => ['classic', 'gradient'],
				'selector' => 
					'{{WRAPPER}} .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover:before, {{WRAPPER}} .dfd-portfolio-module .dfd-portfolio.dfd-3d-parallax:hover .cover .thumb-wrap:before'
				,
				'condition' => [
					'portfolio_hover_enable' => ['yes']
				]
			]
		);
		
		$this->add_control(
			'portfolio_hover_mask_border',
			[
				'label' => esc_html__('Hover mask frame decoration', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'no',
				'condition' => [
					'portfolio_hover_enable' => ['yes']
				]
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
					'portfolio_hover_mask_border' => ['yes']
				],
				'default' => 'simple-border'
			]
		);
		
		$this->add_control(
			'portfolio_hover_mask_bordered_size',
			[
				'label' => esc_html__('Hover mask frame size', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'portfolio_hover_mask_border' => ['yes']
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
				'default' => 'inside'
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
					'portfolio_hover_enable' => ['yes']
				],
				'default' => 'heading'
			]
		);
		
		$this->add_control(
			'portfolio_hover_show_title',
			[
				'label' => esc_html__('Title', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'portfolio_hover_main_decoration' => ['heading']
				]
			]
		);
		
		$this->add_control(
			'portfolio_hover_show_subtitle',
			[
				'label' => esc_html__('Subtitle', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'portfolio_hover_main_decoration' => ['heading']
				]
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
					'portfolio_hover_main_decoration' => ['plus']
				],
				'default' => 'dfd-middle'
			]
		);
		
		$this->add_control(
			'portfolio_hover_buttons_inside',
			[
				'label' => esc_html__('Link inside portfolio item', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'portfolio_hover_main_decoration' => ['buttons']
				]
			]
		);
		
		$this->add_control(
			'portfolio_hover_buttons_external',
			[
				'label' => esc_html__('Portfolio item external link', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'portfolio_hover_main_decoration' => ['buttons']
				]
			]
		);
		
		$this->add_control(
			'portfolio_hover_buttons_lightbox',
			[
				'label' => esc_html__('Lightbox', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'portfolio_hover_main_decoration' => ['buttons']
				]
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
				'default' => '',
				'condition' => [
					'portfolio_hover_main_decoration' => ['buttons']
				],
				'selectors' => [
					'{{WRAPPER}} .dfd-portfolio-module article.dfd-portfolio .entry-thumb .entry-hover .dfd-hover-buttons-wrap > *:hover:after' => 'background: {{SCHEME}};'
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
			'title_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Title color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
//				'default' => '#FF0000',
				'selectors' => [
					'{{WRAPPER}} .dfd-portfolio-module article.dfd-portfolio h3.entry-title' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_font_options',
				'label' => esc_html__('Title typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .dfd-portfolio-module article.dfd-portfolio h3.entry-title'
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
//				'default' => '#FF0000',
				'selectors' => [
					'{{WRAPPER}} .dfd-portfolio-module article.dfd-portfolio .entry-subtitle' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_font_options',
				'label' => esc_html__('Subtitle typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .dfd-portfolio-module article.dfd-portfolio .entry-subtitle'
			]
		);
		
		$this->end_controls_section();
	}

	protected function render() {
		
		$output = $el_class = '';
		
		$sort_panel_html = $data_atts = $css_rules = '';

		$custom_items = $post_ids = array();

		$settings = $this->get_settings_for_display();
		
		$uniqid = uniqid('dfd-portfolio-');

		get_template_part('inc/loop/posts/portfolio_shortcode_metro');

		$options = array(
			'portfolio_show_top_cat',
			'portfolio_show_meta',
			'portfolio_show_meta_date',
			'portfolio_show_meta_category',
			'portfolio_show_meta_comments',
			'portfolio_show_meta_likes',
			'portfolio_show_title',
			'portfolio_show_subtitle',
			'portfolio_show_image',
			'portfolio_show_content',
			'portfolio_show_author_box',
			'portfolio_show_subtitle',
			'portfolio_hover_enable',
			'portfolio_hover_mask_border',
			'portfolio_hover_show_title',
			'portfolio_hover_show_subtitle',
			'portfolio_hover_buttons_inside',
			'portfolio_hover_buttons_external',
			'portfolio_hover_buttons_lightbox',
		);
		$settings['portfolio_show_meta'] = 'off';
		$settings['portfolio_show_meta_date'] = 'on';
		$settings['portfolio_show_meta_category'] = 'on';
		$settings['portfolio_show_meta_comments'] = 'on';
		$settings['portfolio_show_meta_likes'] = 'on';
		$settings['portfolio_show_image'] = 'on';
		$settings['portfolio_show_author_box'] = 'on';
		foreach ($options as $key) {
			if($settings[$key] == 'yes') {
				$settings[$key] = 'on';
			} else {
				$settings[$key] = 'off';
			}
		}

		if(isset($settings['items']) && $settings['items'] == 'single' && isset($settings['selected_items']) && !empty($settings['selected_items'])) {
			foreach($settings['selected_items'] as $k => $item) {
				if(isset($item['post_id'])) {
					$post_ids[] = $item['post_id'];
					$custom_items[$item['post_id']] = (isset($item['post_size']) && !empty($item['post_size'])) ? $item['post_size'] : 'default';
				}
			}
		}

		$settings['selected_items'] = $custom_items;

		$post = new Dfd_portfolio_shortcode_metro($settings);

		if(!isset($settings['columns']) || $settings['columns'] == '') {
			$settings['columns'] = 3;
		}

		if($settings['items'] == 'single' && isset($post_ids) && !empty($post_ids)) {
			$args = array(
				'post_type' => 'portfolio',
				'posts_per_page' => -1,
				'post__in' => $post_ids
			);
		} else {
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
			
			if(!empty($portfolio_categories)) {
				$args['tax_query'] = array(
					array(
						'taxonomy' => 'portfolio_category',
						'field' => 'slug',
						'terms' => $portfolio_categories,
					)
				);
			}
		}

		$el_class .= ' layout-metro';

		$el_class .= ' featured-images-bg content-front content-valign-bottom';

		if(isset($settings['show_sort_panel']) && $settings['show_sort_panel'] == 'yes') {
			if(!isset($settings['sort_panel_alignment']) || $settings['sort_panel_alignment'] == '') {
				$sort_panel_alignment = 'text-left';
			}
			$categories = get_terms('portfolio_category');
			$sort_panel_html .= '<div class="clearfix">';
				$sort_panel_html .= '<div class="sort-panel '.esc_attr($settings['sort_panel_alignment']).'">';
					$sort_panel_html .= '<ul class="filter">';
						$sort_panel_html .= '<li class="active"><a data-filter=".dfd-portfolio" href="#">'. esc_html__('All', 'dfd-native') .'</a></li>';
						foreach ($categories as $category) {
							$sort_panel_html .= '<li><a data-filter=".dfd-portfolio[data-category~=\'' . strtolower(preg_replace('/\s+/', '-', $category->slug)) . '\']" href="#">' . $category->name . '</a></li>';
						}
					$sort_panel_html .= '</ul>';
				$sort_panel_html .= '</div>';
			$sort_panel_html .= '</div>';
		}
		$el_class .= ' isotope-columns-'.esc_attr($settings['columns']);
		$data_atts .= ' data-enable-isotope="1"';
		$data_atts .= ' data-layout-type="metro"';
		$data_atts .= ' data-columns="'.esc_attr($settings['columns']).'"';

		if(isset($settings['portfolio_hover_mask_border']) && $settings['portfolio_hover_mask_border'] == 'on') {
			if($settings['portfolio_hover_mask_bordered_style'] == 'simple-border') {
				$offset = (int)$settings['portfolio_hover_mask_bordered_size'] + 20;
				$css_rules .= '#'. esc_js($uniqid)  .' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .dfd-hover-frame-deco {'
								. 'display: block;'
							. '}'
							. '#'. esc_js($uniqid)  .' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .dfd-hover-frame-deco .line.line-top,'
							. '#'. esc_js($uniqid)  .' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .dfd-hover-frame-deco .line.line-bottom{'
								. 'height: '.(int)$settings['portfolio_hover_mask_bordered_size'].'px;'
							. '}'
							. '#'. $uniqid  .' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .dfd-hover-frame-deco .line.line-left,'
							. '#'. esc_js($uniqid)  .' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .dfd-hover-frame-deco .line.line-right {'
								. 'width: '.(int)$settings['portfolio_hover_mask_bordered_size'].'px;'
							. '}'
							. '#'. esc_js($uniqid)  .' > .dfd-portfolio-module .dfd-portfolio.dfd-3d-parallax .entry-thumb .entry-hover:before {'
								. 'display: none;'
							. '}'
							. '#'. esc_js($uniqid)  .' > .dfd-portfolio-module .dfd-portfolio.dfd-3d-parallax .cover .entry-thumb .thumb-wrap:before {'
								. 'display: block;'
							. '}';
			} elseif($settings['portfolio_hover_mask_bordered_style'] == 'offset') {
				$css_rules .= '#'. esc_js($uniqid)  .' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover:before {'
								. 'top: '.(int)$settings['portfolio_hover_mask_bordered_size'] .'px; bottom: '.(int)$settings['portfolio_hover_mask_bordered_size'] .'px;'
								. 'left: '.(int)$settings['portfolio_hover_mask_bordered_size'] .'px; right: '.(int)$settings['portfolio_hover_mask_bordered_size'] .'px;'
							. '}'
							. '#'. $uniqid  .' > .dfd-portfolio-module .dfd-portfolio.dfd-3d-parallax .entry-thumb .entry-hover:before {'
								. '-webkit-transform: scale(1);'
								. '-moz-transform: scale(1);'
								. '-o-transform: scale(1);'
								. 'transform: scale(1);'
							. '}';
			}
		} else {
			$css_rules .= '#'. esc_js($uniqid)  .' > .dfd-portfolio-module .dfd-portfolio.dfd-3d-parallax .entry-thumb .entry-hover:before {'
							. 'display: none;'
						. '}'
						. '#'. esc_js($uniqid)  .' > .dfd-portfolio-module .dfd-portfolio.dfd-3d-parallax .cover .entry-thumb .thumb-wrap:before {'
							. 'display: block;'
						. '}';
		}

		if(isset($settings['portfolio_hover_mask_color']) && $settings['portfolio_hover_mask_color'] != '') {
			$css_rules .= '#'. esc_js($uniqid)  .' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .title-wrap h3.entry-title,'
						. '#'. esc_js($uniqid)  .' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .title-wrap .entry-subtitle.dfd-content-subtitle,'
						. '#'. esc_js($uniqid)  .' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .dfd-hover-buttons-wrap {color: '.$settings['portfolio_hover_mask_color'].';}';
			
			$css_rules .= '#'. esc_js($uniqid)  .' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .title-wrap.diagonal-line:before,'
						. '#'. esc_js($uniqid)  .' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .title-wrap.title-underline h3.entry-title:before,'
						. '#'. esc_js($uniqid)  .' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .title-wrap.square-behind-heading:before { border-color: '.Dfd_Theme_Helpers::dfd_hex2rgb($settings['portfolio_hover_mask_color'], .1).';}';
			
			$css_rules .= '#'. esc_js($uniqid)  .' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .plus-link .plus-link-container .plus-link-out,'
						. '#'. esc_js($uniqid)  .' > .dfd-portfolio-module .dfd-portfolio .entry-thumb .entry-hover .plus-link .plus-link-container .plus-link-come,'
						. '#'. esc_js($uniqid)  .' > .dfd-portfolio-module .dfd-portfolio .entry-thumb:hover .entry-hover .dfd-dots-link span { background: '.esc_js($settings['portfolio_hover_mask_color']).' !important;}';
		}

		$wp_query = new WP_Query($args);

		echo '<div id="'.esc_attr($uniqid).'">';
			echo $sort_panel_html;
			echo '<div class="dfd-portfolio-module '.esc_attr($el_class).'" '.$data_atts.'>';

			while ($wp_query->have_posts()) : $wp_query->the_post();
				$post->post();
			endwhile;

			echo '</div>';

			if($css_rules != '') {
				echo '<script type="text/javascript">'
						. '(function($) {'
							. '$("head").append("<style>'.$css_rules.'</style>");'
						. '})(jQuery);'
					. '</script>';
			}

		echo '</div>';

		wp_reset_postdata();
	}

}
