<?php

if (!defined('ABSPATH')) {
	exit;
}

class El_Testimonial extends \Elementor\Widget_Base {

	public function get_name() {
		return 'el_testimonial';
	}

	public function get_title() {
		return esc_html__('DFD Testimonial', 'dfd-native');
	}

	public function get_categories() {
		return ['native-category'];
	}

	public function get_icon() {
		return 'dfd_testimonials';
	}

	protected function register_controls() {

		$this->start_controls_section(
			'el_testimonial',
			[
				'label' => esc_html__('Content', 'dfd-native')
			]
		);

		$this->add_control(
			'main_layout',
			[
				'label' => esc_html__('Style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'layout-11' => esc_html__('Bottom info', 'dfd-native'),
					'layout-12' => esc_html__('Top info', 'dfd-native'),
					'layout-13' => esc_html__('Top image', 'dfd-native'),
					'layout-14' => esc_html__('Bottom image', 'dfd-native'),
					'layout-15' => esc_html__('Right image', 'dfd-native'),
					'layout-16' => esc_html__('Left image', 'dfd-native'),
					'layout-17' => esc_html__('Bottom right info', 'dfd-native'),
					'layout-18' => esc_html__('Bottom left info', 'dfd-native'),
					'layout-19' => esc_html__('Top right image', 'dfd-native'),
					'layout-20' => esc_html__('Top left image', 'dfd-native')
				],
				'default' => 'layout-11'
			]
		);

		$this->add_control(
			'image',
			[
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label' => esc_html__('Author Image', 'dfd-native')
			]
		);
		
		$this->add_control(
			'author',
			[
				'label' => esc_html__('Title', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Author name'
			]
		);
		
		$this->add_control(
			'subtitle',
			[
				'label' => esc_html__('Subtitle', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Subtitle'
			]
		);

		$this->add_control(
			'title_subtitle_nowrap',
			[
				'label' => esc_html__('One line title', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER
			]
		);
		
		$this->add_control(
			'description',
			[
				'label' => esc_html__('Testimonial', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Testimonial content'
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'author_thumbnail_style_heading',
			[
				'label' => esc_html__('Author thumbnail style', 'dfd-native')
			]
		);
		
		$this->add_control(
			'thumb_radius',
			[
				'label' => esc_html__('Border radius', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'selectors' => [
					'{{WRAPPER}} .image-wrap img' => 'border-radius: {{SCHEME}}px;'
				]
			]
		);
		
		$this->add_control(
			'thumb_border_width',
			[
				'label' => esc_html__('Border width', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'selectors' => [
					'{{WRAPPER}} .image-wrap img' => 'border-width: {{SCHEME}}px; border-style: solid;'
				]
			]
		);
		
		$this->add_control(
			'thumb_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Border color', 'dfd-native'),
				'selectors' => [
					'{{WRAPPER}} .image-wrap img' => 'border-color: {{SCHEME}};'
				]
			]
		);
		
		$this->add_control(
			'thumb_size',
			[
				'label' => esc_html__('Image size', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER
			]
		);
		
		$this->add_control(
			'hide_shadow',
			[
				'label' => esc_html__('Shadow', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'style_background_heading',
			[
				'label' => esc_html__('Testimonial background style', 'dfd-native')
			]
		);
		
		$this->add_control(
			'bg_block_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Color', 'dfd-native')
			]
		);
		
		$this->add_control(
			'bg_radius',
			[
				'label' => esc_html__('Border radius', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'selectors' => [
					'{{WRAPPER}} .content-wrap-bg' => 'border-radius: {{SCHEME}}px;'
				]
			]
		);
		
		$this->add_control(
			'show_triangle',
			[
				'label' => esc_html__('Triangle pointer', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'typography_heading',
			[
				'label' => esc_html__('Typography', 'dfd-native')
			]
		);
		
		$this->add_control(
			'testimonial_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Testimonial color', 'dfd-native'),
				'selectors' => [
					'{{WRAPPER}} .dfd-testimonial-content.testimonial-content' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_font_options',
				'label' => esc_html__('Testimonial typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .dfd-testimonial-content.testimonial-content'
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
				'default' => 'div',
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Title color', 'dfd-native'),
				'selectors' => [
					'{{WRAPPER}} .dfd-content-title-big.testimonial-title' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'style-title-typography',
				'label' => esc_html__('Title typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .dfd-content-title-big.testimonial-title'
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
				'default' => 'div',
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'subtitle_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Subtitle color', 'dfd-native'),
				'selectors' => [
					'{{WRAPPER}} .dfd-content-subtitle.testimonial-subtitle' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'style-subtitle-typography',
				'label' => esc_html__('Subtitle typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .dfd-content-subtitle.testimonial-subtitle'
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$output = $el_class = $thumb_size = $avatar_html = $author_html = $subtitle_html = $content_html = $css_rules = '';

		$settings = $this->get_settings_for_display();

		$uniqid = uniqid('dfd-ttestimonials-module-');

		$el_class .= ' style-1 '.$settings['main_layout'] .' align-center';

		if(isset($settings['title_subtitle_nowrap']) && $settings['title_subtitle_nowrap'] == 'yes') {
			$el_class .= ' title-subtitle-nowrap';
		}
	
		if(!isset($settings['thumb_size']) || $settings['thumb_size'] == '') {
			$thumb_size = '90';
		} else {
			$thumb_size = $settings['thumb_size'];
		}

		if($settings['main_layout'] == 'layout-17' || $settings['main_layout'] == 'layout-19') {
			$css_rules .= '#' . esc_js($uniqid) . '.dfd-testimonial-item.has_bg.show_triangle.layout-17 .content-wrap-bg span.triangle,'
						. '#' . esc_js($uniqid) . '.dfd-testimonial-item.has_bg.show_triangle.layout-19 .content-wrap-bg span.triangle {right: '.esc_js( $thumb_size / 2 ).'px;}';
		} elseif($settings['main_layout'] == 'layout-18' || $settings['main_layout'] == 'layout-20') {
			$css_rules .= '#' . esc_js($uniqid) . '.dfd-testimonial-item.has_bg.show_triangle.layout-18 .content-wrap-bg span.triangle,'
						. '#' . esc_js($uniqid) . '.dfd-testimonial-item.has_bg.show_triangle.layout-20 .content-wrap-bg span.triangle {left: '.esc_js( $thumb_size / 2 ).'px;}';
		}

		if(!empty($settings['image']['id'])) {
			$image_src = wp_get_attachment_image_src($settings['image']['id'], 'full');
			if(!$image_src) {
				$image_src = array(get_template_directory_uri() . '/assets/images/no_image_resized_120-120.jpg');
			}
			$avatar = dfd_aq_resize($image_src[0], $thumb_size * 1.5, $thumb_size * 1.5, true, true, true);
			if(!$avatar) {
				$avatar = $image_src[0];
			}
		} else {
			$avatar = Dfd_Theme_Helpers::default_noimage_url("rect_small_140");
		}

		$img_atts = Dfd_Theme_Helpers::get_image_attrs($avatar, $settings['image']['id'], $thumb_size, $thumb_size, esc_html__('Testimonial', 'dfd-native') . ' ' . esc_html__('by', 'dfd-native') . ' ' . esc_html($settings['author']));

		global $dfd_native;

		if(isset($dfd_native['enable_images_lazy_load']) && $dfd_native['enable_images_lazy_load'] == 'on') {
			$el_class .= ' dfd-img-lazy-load';
			$loading_img_src = "data:image/svg+xml;charset=utf-8,%3Csvg xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg' viewBox%3D'0 0 $thumb_size $thumb_size'%2F%3E";
			$img_html = '<img src="'.$loading_img_src.'" data-src="' . esc_url($avatar) . '" width="'.esc_attr(floor($thumb_size)).'" height="'.esc_attr(floor($thumb_size)).'" '.$img_atts.'/>';
		} else {
			$img_html = '<img src="' . esc_url($avatar) . '" width="'.esc_attr(floor($thumb_size)).'" height="'.esc_attr(floor($thumb_size)).'" '. $img_atts .' />';
		}

		$avatar_html .= '<div class="image-wrap">';
			$avatar_html .= $img_html;
		$avatar_html .= '</div>';

		if(!empty($settings['author'])) {
			$author_html = '<' . $settings['title_html_tag'] . ' class="dfd-content-title-big testimonial-title">' . esc_html($settings['author']) . '</' . $settings['title_html_tag'] . '>';
		}

		if(!empty($settings['subtitle'])) {
			$subtitle_html = '<' . $settings['subtitle_html_tag'] . ' class="dfd-content-subtitle testimonial-subtitle">' . esc_html($settings['subtitle']) . '</' . $settings['subtitle_html_tag'] . '>';
		}

		if($settings['bg_block_color'] != "") {
			$el_class .= ' has_bg';
			$css_rules .= '#' . esc_js($uniqid) . '.dfd-testimonial-item .content-wrap-bg,'
						. '#' . esc_js($uniqid) . '.dfd-testimonial-item .content-wrap-bg .triangle:before {background-color:' . $settings['bg_block_color'].';}';
		}

		$content_html .= '<div class="content-wrap-bg"><span class="triangle hide"></span></div>';
		$content_html .= '<div class="dfd-testimonial-content testimonial-content">';
			$content_html .= strip_tags($settings['description'],"<br><br/>");
		$content_html .= '</div>';

		if($settings['hide_shadow'] != 'yes') {
			$el_class .= ' hide_shadow';
		}
		
		if($settings['show_triangle'] == 'yes') {
			$el_class .= ' show_triangle';
		}

		$output .= '<div id="'.esc_attr($uniqid).'" class="dfd-testimonial-item' . $el_class . '">';

		switch ($settings['main_layout']) {
			case 'layout-11':

				$output .= '<div class="pos-rel">';
				$output .= $content_html;
				$output .= '</div>';
				$output .= $avatar_html;
				$output .= $author_html;
				$output .= $subtitle_html;
				break;
			case 'layout-12':
				$output .= $avatar_html;
				$output .= $author_html;
				$output .= $subtitle_html;
				$output .= '<div class="pos-rel">';
				$output .= $content_html;
				$output .= '</div>';
				break;
			case 'layout-13':
				$output .= $avatar_html;
				$output .= '<div class="pos-rel">';
				$output .= $content_html;
				$output .= '</div>';
				$output .= $author_html;
				$output .= $subtitle_html;
				break;
			case 'layout-14':
				$output .= '<div class="title-wrap">';
					$output .= $author_html;
					$output .= $subtitle_html;
				$output .= '</div>';
				$output .= '<div class="pos-rel">';
				$output .= $content_html;
				$output .= '</div>';
				$output .= $avatar_html;
				break;

			case 'layout-15':
			case 'layout-16':
				$output .= $avatar_html;
				$output .= '<div class="content-wrap">';
					$output .= '<div class="pos-rel">';
						$output .= $content_html;
					$output .= '</div>';
					$output .= '<div class="title-wrap">';
						$output .= $author_html;
						$output .= $subtitle_html;
					$output .= '</div>';
				$output .= '</div>';

				break;
			case 'layout-17':
			case 'layout-18':
				$output .= '<div class="pos-rel">';
				$output .= $content_html;
				$output .= '</div>';
				$output .= $avatar_html;
				$output .= $author_html;
				$output .= $subtitle_html;
				break;
			case 'layout-19':
			case 'layout-20':
				$output .= $avatar_html;
				$output .= '<div class="pos-rel">';
				$output .= $content_html;
				$output .= '</div>';
				$output .= $author_html;
				$output .= $subtitle_html;
				break;
}

		if (!empty($css_rules)) {
			$output .= '<script type="text/javascript">'
							. '(function($) {'
								. '$("head").append("<style>'.$css_rules.'</style>");'
							. '})(jQuery);'
						. '</script>';
		}

		$output .= '</div>';

		echo $output;
	}

}
