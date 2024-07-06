<?php

if (!defined('ABSPATH')) {
	exit;
}

class El_Blog_Posts extends \Elementor\Widget_Base {

	public function get_name() {
		return 'el_blog_posts';
	}

	public function get_title() {
		return esc_html__('DFD Blog posts', 'dfd-native');
	}

	public function get_categories() {
		return ['native-category'];
	}

	public function get_icon() {
		return 'dfd_blog_posts';
	}

	/**
	 * Get posts categories.
	 * */
	private function get_dfd_posts_category() {
		$options = array();

		$terms = get_terms(
			array(
				'taxonomy' => 'category',
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
			'el_blog_posts',
			[
				'label' => esc_html__('Blog posts', 'dfd-native')
			]
		);

		$this->add_control(
			'post_content_style',
			[
				'label' => esc_html__('Style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'full' => esc_html__('Standard', 'dfd-native'),
					'full_front' => esc_html__('Dark overlay', 'dfd-native'),
					'tiny' => esc_html__('Tiny posts', 'dfd-native'),
					'list' => esc_html__('News list', 'dfd-native')
				],
				'default' => 'full'
			]
		);

		$this->add_control(
			'post_style',
			[
				'label' => esc_html__('Content style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'fitRows' => esc_html__('Grid', 'dfd-native'),
					'masonry' => esc_html__('Masonry', 'dfd-native'),
//					'shortcode_metro' => esc_html__('Metro', 'dfd-native'),
					'carousel' => esc_html__('Carousel', 'dfd-native')
				],
				'condition' => [
					'post_content_style' => ['full', 'full_front']
				],
				'default' => 'fitRows'
			]
		);
		
		$this->end_controls_section();
			
		$this->start_controls_section(
			'loop_elements_heading',
			[
				'label' => esc_html__('Posts settings', 'dfd-native'),
			]
		);
		
		if(!empty($this->get_dfd_posts_category())) {
			foreach ($this->get_dfd_posts_category() as $slug => $name) {
				$this->add_control(
					'post_categories_' . $slug,
					[
						'label' => $name,
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'default' => 'no'
					]
				);
			}
		}
		
		$this->add_control(
			'posts_to_show',
			[
				'label' => esc_html__('Posts to show', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 3
			]
		);

		$this->add_control(
			'items_offset',
			[
				'label' => esc_html__('Items offset', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 20,
				'condition' => [
					'post_content_style' => ['full', 'full_front']
				]
			]
		);
		
		$this->add_control(
			'post_image_width',
			[
				'label' => esc_html__('Image width', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 600,
				'condition' => [
					'post_content_style' => ['full_front']
				]
			]
		);
		
		$this->add_control(
			'post_image_height',
			[
				'label' => esc_html__('Image height', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 600,
				'condition' => [
					'post_content_style' => ['full_front']
				]
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'layout_settings_heading',
			[
				'label' => esc_html__('Layout settings', 'dfd-native'),
			]
		);
		
		$this->add_control(
			'post_columns',
			[
				'label' => esc_html__('Number of columns', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 3,
				'condition' => [
					'post_content_style' => ['full', 'full_front']
				]
			]
		);
		
		$this->add_control(
			'enabled_autoslideshow',
			[
				'label' => esc_html__('Auto slideshow', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'post_style' => ['carousel']
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
					'post_style' => ['carousel']
				],
				'default' => 5000
			]
		);
		
		$this->add_control(
			'thumb_rounded',
			[
				'label' => esc_html__('Thumb border radius', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'post_content_style' => ['full', 'full_front', 'tiny']
				],
				'default' => 6
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'enabled_elements_heading',
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
					'post_style' => ['masonry', 'fitRows', 'shortcode_metro']
				],
				'default' => 'yes'
			]
		);
		
		$this->add_control(
			'post_show_image',
			[
				'label' => esc_html__('Media', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'post_content_style' => ['full', 'full_front']
				],
				'default' => 'yes'
			]
		);
		
		$this->add_control(
			'post_show_top_cat',
			[
				'label' => esc_html__('Category', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'post_content_style' => ['full', 'full_front']
				],
				'default' => 'yes'
			]
		);

		$this->add_control(
			'post_show_title',
			[
				'label' => esc_html__('Title', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);

		$this->add_control(
			'post_show_meta',
			[
				'label' => esc_html__('Meta', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);

		$this->add_control(
			'post_show_meta_date',
			[
				'label' => esc_html__('Date in post meta', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'post_show_meta' => ['yes']
				],
				'default' => 'yes'
			]
		);

		$this->add_control(
			'post_show_meta_category',
			[
				'label' => esc_html__('Category in post meta', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'post_show_meta' => ['yes']
				],
				'default' => 'yes'
			]
		);

		$this->add_control(
			'post_show_meta_comments',
			[
				'label' => esc_html__('Comments counter in post meta', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'post_show_meta' => ['yes']
				]
			]
		);

		$this->add_control(
			'post_show_meta_likes',
			[
				'label' => esc_html__('Likes in post meta', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'post_show_meta' => ['yes']
				]
			]
		);

		$this->add_control(
			'post_show_content',
			[
				'label' => esc_html__('Excerpt', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'post_content_style' => ['full', 'full_front']
				],
				'default' => 'yes'
			]
		);
		
		$this->add_control(
			'post_show_author_box',
			[
				'label' => esc_html__('Author info', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'post_content_style' => ['full', 'full_front']
				],
				'default' => 'yes'
			]
		);
		
		$this->add_control(
			'post_tiled',
			[
				'label' => esc_html__('Tiled posts style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'post_content_style' => ['full', 'full_front']
				]
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
					'post_style' => ['masonry', 'fitRows']
				],
				'default' => 'text-center'
			]
		);

		$this->add_control(
			'post_content_alignment',
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
				'condition' => [
					'post_content_style' => ['full', 'full_front', 'list'],
				],
				'default' => 'text-left'
			]
		);

		$this->add_control(
			'post_delimiter_style',
			[
				'label' => esc_html__('Delimiter style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'solid' => esc_html__('Solid', 'dfd-native'),
					'dashed' => esc_html__('Dashed', 'dfd-native'),
					'dotted' => esc_html__('Dotted', 'dfd-native'),
					'none' => esc_html__('None', 'dfd-native')
				],
				'condition' => [
					'post_content_style' => ['list']
				],
				'default' => 'solid'
			]
		);

		$this->add_control(
			'use_dots',
			[
				'label' => esc_html__('Pagination', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'post_style' => ['carousel']
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
					'use_dots' => ['yes']
				],
				'default' => 'dfdroundedempty'
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
				'selector' => '{{WRAPPER}} .dfd-posts-module article.post h3.entry-title',
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
					'{{WRAPPER}} .dfd-posts-module article.post h3.entry-title' => 'color: {{SCHEME}};'
				]
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$output = $el_class = $css_rules = $data_atts = $sort_panel_html = '';

		$uniqid = uniqid('dfd-blog-posts-');
		
		$settings = $this->get_settings_for_display();

		get_template_part('inc/loop/posts/post_shortcode');

		$options = array(
			'post_show_top_cat',
			'post_show_meta',
			'post_show_meta_date',
			'post_show_meta_category',
			'post_show_meta_comments',
			'post_show_meta_likes',
			'post_show_title',
			'post_show_content',
			'post_show_author_box',
			'post_tiled',
		);
		$settings['post_show_image'] = 'on';
		foreach ($options as $key) {
			if($settings[$key] == 'yes') {
				$settings[$key] = 'on';
			} else {
				$settings[$key] = 'off';
			}
		}

		if(!isset($settings['post_columns']) || $settings['post_columns'] == '') {
			$settings['post_columns'] = 3;
		}

		$sticky = get_option('sticky_posts');

		$args = array(
			'posts_per_page' => $settings['posts_to_show'],
			'ignore_sticky_posts' => 1,
			'post__not_in' => $sticky,
		);
		
		$post_categories = array();
		foreach ($this->get_dfd_posts_category() as $slug => $name) {
			if($settings['post_categories_' . $slug] == 'yes') {
				$post_categories[] = $slug;
			}
		}
		
		if (!empty($post_categories)) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => $post_categories,
				)
			);
		}
		
		$el_class .= ' content-'.$settings['post_content_style'];
		
		if(isset($settings['post_content_style'])) {
			if(substr_count($settings['post_content_style'], 'full') > 0) {
				if(isset($settings['post_tiled']) && $settings['post_tiled'] == 'on') {
					$el_class .= ' posts-tiled';
				}
				if($settings['post_content_style'] == 'full') {
					if(isset($settings['thumb_rounded']) && $settings['thumb_rounded'] != '') {
						$css_rules .= '#'.esc_js($uniqid).' > .dfd-posts-module.content-full:not(.posts-tiled) article.post > .cover > .entry-thumb {border-radius: '. esc_js($settings['thumb_rounded']) .'px;}'
									. '#'.esc_js($uniqid).' > .dfd-posts-module.content-full.posts-tiled article.post > .cover {border-radius: '. esc_js($settings['thumb_rounded']) .'px;}'
									. '#'.esc_js($uniqid).' > .dfd-posts-module.content-full.posts-tiled article.post > .cover > .entry-thumb {border-top-left-radius: '. esc_js($settings['thumb_rounded']) .'px;border-top-right-radius: '. esc_js($settings['thumb_rounded']) .'px;}'
									. '#'.esc_js($uniqid).' > .dfd-posts-module.layout-masonry.content-full article.post.format-quote > .cover,'
									. '#'.esc_js($uniqid).' > .dfd-posts-module.layout-masonry.content-full article.post.format-link > .cover,'
									. '#'.esc_js($uniqid).' > .dfd-posts-module.layout-masonry.content-full article.post.format-audio > .cover,'
									. '#'.esc_js($uniqid).' > .dfd-posts-module.layout-metro.content-full article.post.format-quote > .cover,'
									. '#'.esc_js($uniqid).' > .dfd-posts-module.layout-metro.content-full article.post.format-link > .cover,'
									. '#'.esc_js($uniqid).' > .dfd-posts-module.layout-metro.content-full article.post.format-audio > .cover {border-radius: '. esc_js($settings['thumb_rounded']) .'px;}';
					}
				}
				if($settings['post_content_style'] == 'full_front') {
					if(isset($settings['post_style']) && $settings['post_style'] == 'masonry') {
						$settings['post_style'] = 'fitRows';
					}
					if(isset($settings['thumb_rounded']) && $settings['thumb_rounded'] != '') {
						$css_rules .= '#'.esc_js($uniqid).' > .dfd-posts-module.content-full_front article.post > .cover .entry-thumb {border-radius: '. esc_js($settings['thumb_rounded']) .'px;}';
					}
					if(isset($settings['items_offset']) && $settings['items_offset'] != '') {
						$css_rules .= '#'.esc_js($uniqid).' > .dfd-posts-module.content-full_front article.post > .cover .content-wrap {'
											. 'left: '. esc_js((int)$settings['items_offset']/2) .'px;'
											. 'right: '. esc_js((int)$settings['items_offset']/2) .'px;'
											. 'bottom: '. esc_js((int)$settings['items_offset']/2) .'px;'
										. '}';
					}
				}
				if(!isset($settings['post_style']) || $settings['post_style'] == '') {
					$settings['post_style'] = 'fitRows';
				}
				$el_class .= ' layout-'.$settings['post_style'];
				if(isset($settings['items_offset']) && $settings['items_offset'] != '') {
					$css_rules .= '#'.esc_js($uniqid).' > .dfd-posts-module {margin: -'. esc_js((int)$settings['items_offset']/2) .'px;}';
				}
				if($settings['post_style'] == 'carousel') {
					$el_class .= ' dfd-carousel-wrap';
					$data_atts .= ' data-slides="'.esc_attr($settings['post_columns']).'"';
					$data_atts .= ' data-scroll="1"';
					if(isset($settings['enabled_autoslideshow']) && $settings['enabled_autoslideshow'] != '') {
						$data_atts .= ' data-autoplay="'.esc_attr($settings['enabled_autoslideshow']).'"';
					}
					if(isset($settings['carousel_slideshow_speed']) && $settings['carousel_slideshow_speed'] != '') {
						$data_atts .= ' data-speed="'.esc_attr($settings['carousel_slideshow_speed']).'"';
					}
					if(isset($settings['use_dots']) && $settings['use_dots'] == 'yes') {
						$data_atts .= ' data-dots="true"';
						$data_atts .= ' data-infinite="true"';
						$el_class .= ' text-center'; 
						if(isset($settings['dots_style']) && $settings['dots_style'] != '') {
							$el_class .= ' above ' . $settings['dots_style']; 
						}
					}
					if(isset($settings['items_offset']) && $settings['items_offset'] != '') {
						$css_rules .= '#'.esc_js($uniqid).' > .dfd-posts-module article.post > .cover {padding: '. esc_js((int)$settings['items_offset']/2) .'px;}';
					}
				} else {
					if(isset($settings['show_sort_panel']) && $settings['show_sort_panel'] == 'yes') {
						$categories = get_terms('category');
						$sort_panel_html .= '<div class="clearfix">';
							$sort_panel_html .= '<div class="sort-panel '.esc_attr($settings['sort_panel_alignment']).'">';
								$sort_panel_html .= '<ul class="filter">';
									$sort_panel_html .= '<li class="active"><a data-filter=".post" href="#">'. esc_html__('All', 'dfd-native') .'</a></li>';
									foreach ($categories as $category) {
										$sort_panel_html .= '<li><a data-filter=".post[data-category~=\'' . strtolower(preg_replace('/\s+/', '-', $category->slug)) . '\']" href="#">' . $category->name . '</a></li>';
									}
								$sort_panel_html .= '</ul>';
							$sort_panel_html .= '</div>';
						$sort_panel_html .= '</div>';
					}
					$el_class .= ' isotope-columns-'.esc_attr($settings['post_columns']);
					$data_atts .= ' data-enable-isotope="1"';
					$data_atts .= ' data-layout-type="'.esc_attr($settings['post_style']).'"';
					$data_atts .= ' data-columns="'.esc_attr($settings['post_columns']).'"';
					if(isset($settings['items_offset']) && $settings['items_offset'] != '') {
						$css_rules .= '#'.esc_js($uniqid).' > .dfd-posts-module article.post {padding: '. esc_js((int)$settings['items_offset']/2) .'px;}';
					}
				}
			} elseif($settings['post_content_style'] == 'tiny' && isset($settings['thumb_rounded']) && $settings['thumb_rounded'] != '') {
				$css_rules .= '#'.esc_js($uniqid).' > .dfd-posts-module.content-tiny article.post > .cover .entry-thumb img, #'.esc_js($uniqid).' > .dfd-posts-module.content-tiny article.post > .cover > .entry-thumb {border-radius: '. esc_js($settings['thumb_rounded']) .'px;}';
			} elseif($settings['post_content_style'] == 'list' && isset($settings['post_delimiter_style']) && $settings['post_delimiter_style'] != '') {
				$css_rules .= '#'.esc_js($uniqid).' > .dfd-posts-module.content-list article.post:not(:last-child) > .cover {border-bottom-style: '. esc_js($settings['post_delimiter_style']) .';}';
			}
		}
		
		$wp_query = new WP_Query($args);

		$post = new Dfd_post_shortcode($settings);

		echo '<div id="'.esc_attr($uniqid).'" class="dfd-posts-module-wrap">';
			echo $sort_panel_html;
			echo '<div class="dfd-posts-module '.esc_attr($el_class).'" '.$data_atts.'>';

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
