<?php

if (!defined('ABSPATH')) {
	exit;
}

class El_Video_Player extends \Elementor\Widget_Base {

	public function get_name() {
		return 'el_video_player';
	}

	public function get_title() {
		return esc_html__('DFD Video player', 'dfd-native');
	}

	public function get_categories() {
		return ['native-category'];
	}

	public function get_icon() {
		return 'dfd_videoplayer';
	}

	protected function register_controls() {

		$this->start_controls_section(
			'el_video_player',
			[
				'label' => esc_html__('Video player', 'dfd-native')
			]
		);
		
		$this->add_control(
			'main_style',
			[
				'label' => esc_html__('Style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'style-1' => esc_html__('Background', 'dfd-native'),
					'style-2' => esc_html__('Simple', 'dfd-native')
				],
				'default' => 'style-1'
			]
		);

		$this->add_control(
			'gen_border_radius',
			[
				'label' => esc_html__('Border radius', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'main_style' => 'style-1'
				],
				'selectors' => [
					'{{WRAPPER}} .dfd-video-content' => 'border-radius: {{SCHEME}}px;'
				]
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
				'condition' => [
					'main_style' => 'style-1'
				],
				'default' => 'disable'
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'video_box_shadow',
				'label' => esc_html__('Shadow', 'dfd-native'),
				'condition' => [
					'shadow' => ['permanent', 'on-hover']
				],
				'selector' => '{{WRAPPER}} .style-1 .dfd-video-content.permanent:before, {{WRAPPER}} .style-1 .dfd-video-content.on-hover:hover:before',
			]
		);
		
		$this->add_control(
			'video_animation',
			[
				'label' => esc_html__('Full screen video animation', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__('No Animation', 'dfd-native'),
					'transition.fadeIn' => esc_html__('Fade In', 'dfd-native'),
					'transition.flipXIn' => esc_html__('Flip Horizontally', 'dfd-native'),
					'transition.flipYIn' => esc_html__('Flip Vertically', 'dfd-native'),
					'transition.shrinkIn' => esc_html__('Shrink', 'dfd-native'),
					'transition.expandIn' => esc_html__('Expand', 'dfd-native'),
					'transition.grow' => esc_html__('Grow', 'dfd-native'),
					'transition.slideUpBigIn' => esc_html__('Slide Up', 'dfd-native'),
					'transition.slideDownBigIn' => esc_html__('Slide Down', 'dfd-native'),
					'transition.slideLeftBigIn' => esc_html__('Slide Right', 'dfd-native'),
					'transition.slideRightBigIn' => esc_html__('Slide Left', 'dfd-native'),
					'transition.perspectiveUpIn' => esc_html__('Perspective Up', 'dfd-native'),
					'transition.perspectiveDownIn' => esc_html__('Perspective Down', 'dfd-native'),
					'transition.perspectiveLeftIn' => esc_html__('Perspective Right', 'dfd-native'),
					'transition.perspectiveRightIn' => esc_html__('Perspective Left', 'dfd-native')
				],
				'condition' => [
					'main_style' => 'style-2'
				],
				'default' => ''
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'el_video_player_content',
			[
				'label' => esc_html__('Content', 'dfd-native')
			]
		);
		
		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'main_style' => 'style-2'
				],
				'default' => esc_html__('Title', 'dfd-native')
			]
		);
		
		$this->add_control(
			'subtitle',
			[
				'label' => esc_html__('Subtitle', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'main_style' => 'style-2'
				],
				'default' => esc_html__('Subtitle', 'dfd-native')
			]
		);
		
		$this->add_control(
			'video_options',
			[
				'label' => esc_html__('Video options', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'default' => esc_html__('YouTube/Vimeo', 'dfd-native'),
					'selfhosted' => esc_html__('Self Hosted', 'dfd-native')
				],
				'condition' => [
					'main_style' => 'style-1'
				],
				'default' => 'default'
			]
		);
		
		$this->add_control(
			'video_thumb',
			[
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label' => esc_html__('Thumbnail Image', 'dfd-native'),
				'condition' => [
					'main_style' => 'style-1'
				]
			]
		);
		
		$this->add_control(
			'content_width',
			[
				'label' => esc_html__('Thumbnail width', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'main_style' => 'style-1'
				]
			]
		);
		
		$this->add_control(
			'video_link',
			[
				'label' => esc_html__('Video link', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'https://www.youtube.com/watch?v=OZpGlQWAbrs&feature=youtu.be'
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'el_video_player_style',
			[
				'label' => esc_html__('Styles', 'dfd-native')
			]
		);
		
		$this->add_control(
			'button_align',
			[
				'label' => esc_html__('Button alignment', 'dfd-native'),
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
					'main_style' => 'style-2'
				],
				'default' => 'text-center'
			]
		);
		
		$this->add_control(
			'full_width_background',
			[
				'label' => esc_html__('Full width button', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'main_style' => 'style-2'
				]
			]
		);
		
		$this->start_controls_tabs(
			'el_video_player_styles',
			[
				//'separator' => 'before'
			]
		);
		
		$this->start_controls_tab(
			'el_video_player_styles_normal',
			[
				'label' => esc_html__('Normal', 'dfd')
			]
		);
		
		$this->add_control(
			'main_background',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Background color', 'dfd-native'),
				'condition' => [
					'main_style' => 'style-2'
				],
				'selectors' => [
					'{{WRAPPER}} .decoration-mask' => 'background: {{SCHEME}};'
				]
			]
		);
		
		$this->add_control(
			'el_video_player_general_border_heading',
			[
				'type' => \Elementor\Controls_Manager::HEADING,
				'label' => esc_html__('General border', 'dfd-native'),
				'separator' => 'before',
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'main_border',
				'condition' => [
					'main_style' => 'style-2'
				],
				'selector' => '{{WRAPPER}} .decoration-mask, {{WRAPPER}} .dfd-video-button'
			]
		);
		
		$this->add_control(
			'icon_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Icon color', 'dfd-native'),
				'selectors' => [
					'{{WRAPPER}} .dfd-video-button, {{WRAPPER}} .style-1 .dfd-video-image-thumb i' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->add_control(
			'icon_background',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Icon background', 'dfd-native'),
				'selectors' => [
					'{{WRAPPER}} .decoration-icon' => 'background: {{SCHEME}};'
				]
			]
		);
		
		$this->add_control(
			'el_video_player_icon_border_heading',
			[
				'type' => \Elementor\Controls_Manager::HEADING,
				'label' => esc_html__('Icon border', 'dfd-native'),
				'separator' => 'before',
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'selector' => '{{WRAPPER}} .decoration-icon'
			]
		);
		
		$this->end_controls_tab();
		
		$this->start_controls_tab(
			'el_video_player_styles_hover',
			[
				'label' => esc_html__('Hover', 'dfd')
			]
		);
		
		$this->add_control(
			'main_background_hover',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Background color', 'dfd-native'),
				'condition' => [
					'main_style' => 'style-2'
				],
				'selectors' => [
					'{{WRAPPER}} .button-wrap:hover .decoration-mask' => 'background: {{SCHEME}};'
				]
			]
		);
		
		$this->add_control(
			'el_video_player_general_border_hover_heading',
			[
				'type' => \Elementor\Controls_Manager::HEADING,
				'label' => esc_html__('General border', 'dfd-native'),
				'separator' => 'before',
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'main_border_hover',
				'condition' => [
					'main_style' => 'style-2'
				],
				'selector' => '{{WRAPPER}} .button-wrap:hover .decoration-mask, {{WRAPPER}} .button-wrap:hover .dfd-video-button .decoration-icon'
			]
		);
		
		$this->add_control(
			'icon_hover_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Icon color', 'dfd-native'),
				'selectors' => [
					'{{WRAPPER}} .button-wrap:hover .dfd-video-button, {{WRAPPER}} .style-1 .dfd-video-image-thumb .container-play:hover i' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->add_control(
			'icon_hover_background',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Icon background', 'dfd-native'),
				'selectors' => [
					'{{WRAPPER}} .style-2 .button-wrap:hover .decoration-icon, {{WRAPPER}} .style-1 .container-play:hover .decoration-icon' => 'background: {{SCHEME}};'
				]
			]
		);
		
		$this->add_control(
			'el_video_player_icon_border_hover_heading',
			[
				'type' => \Elementor\Controls_Manager::HEADING,
				'label' => esc_html__('Icon border', 'dfd-native'),
				'separator' => 'before',
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_hover_border',
				'selector' => '{{WRAPPER}} .style-1 .container-play:hover .decoration-icon, {{WRAPPER}} .style-2 .button-wrap:hover .decoration-icon'
			]
		);
		
		$this->end_controls_tab();
		
		$this->end_controls_tabs();
		
		$this->add_control(
			'icon_bg_size',
			[
				'label' => esc_html__('Icon background size', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
//				'condition' => [
//					'main_style' => 'style-1'
//				]
			]
		);
		
		$this->add_control(
			'icon_font_size',
			[
				'label' => esc_html__('Icon size', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'icon_bg_size!' => ''
				],
				'selectors' => [
					'{{WRAPPER}} .style-1 .dfd-video-image-thumb i, {{WRAPPER}} .dfd-video-button' => 'font-size: {{SCHEME}}px;'
				]
			]
		);
		
		$this->add_control(
			'icon_x_offset',
			[
				'label' => esc_html__('Horizontal offset', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'icon_bg_size!' => ''
				],
				'selectors' => [
					'{{WRAPPER}} .style-1 .dfd-video-image-thumb i:before, {{WRAPPER}} .dfd-video-button i:before' => 'left: {{SCHEME}}px;'
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
				'selectors' => [
					'{{WRAPPER}} .dfd-widget-post-title' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'style-title-typography',
				'label' => esc_html__('Title typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .dfd-widget-post-title'
			]
		);
		
		$this->add_control(
			'subtitle_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Subtitle color', 'dfd-native'),
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
		
		$this->end_controls_section();
		
	}

	protected function render() {
		
		global $dfd_native, $content_width, $wp_embed;
		
		$output = $el_class = $full_screen_video_data = $title_html = $subtitle_html = $link_css = '';
		$shadow_class = $button_html = $content_html = $thumb_html = $video_html = $extra_class = '';
		
		$settings = $this->get_settings_for_display();
		
		$size = (isset($settings['content_width'])) ? (int)$settings['content_width'] : 600;
		if(isset($dfd_native['dev_mode']) && $dfd_native['dev_mode'] == 'on' && defined('DFD_DEBUG_MODE') && DFD_DEBUG_MODE) {
			wp_enqueue_script( 'video-module-js', get_template_directory_uri() .'/assets/js/uncompressed/dfd-video-module.js', array( 'jquery' ), false, true );
		}

		$unique_id_shortcode = uniqid('video-player-') .'-'.rand(1,9999);
		$unique_id = uniqid('module_video_');
		
		if(isset($settings['video_animation']) && $settings['video_animation'] != '') {
			$full_screen_video_data = 'data-animation="'.esc_attr($settings['video_animation']).'"';
		}

		if(!empty($settings['title'])) {
			$title_html = '<'.$settings['title_html_tag'].' class="dfd-widget-post-title">' . esc_html( $settings['title'] ) . '</'.$settings['title_html_tag'].'>';
		}
		if (!empty($settings['subtitle'])) {
			$subtitle_html = '<div class="dfd-content-subtitle">' . esc_html( $settings['subtitle'] ) . '</div>';
		}

		$el_class .= ' '.$settings['button_align'].' '.$settings['main_style'].' ';

		if(isset($settings['video_thumb']['url']) && !empty($settings['video_thumb']['url'])) {
			$el_class .= ' with-thumb';
		}

		if(isset($settings['icon_bg_size']) && $settings['icon_bg_size'] != '') {
			$link_css .= '#'.esc_js($unique_id_shortcode).'.style-1 .container-play {width: '.esc_attr($settings['icon_bg_size']).'px; height: '.esc_attr($settings['icon_bg_size']).'px; line-height: '.esc_attr($settings['icon_bg_size']).'px; margin-top: -'.(esc_attr($settings['icon_bg_size']) / 2).'px; margin-left: -'.(esc_attr($settings['icon_bg_size']) / 2).'px;}';
			$link_css .= '#'.esc_js($unique_id_shortcode).' .dfd-video-button {width: '.esc_attr($settings['icon_bg_size']).'px; height: '.esc_attr($settings['icon_bg_size']).'px; line-height: '.esc_attr($settings['icon_bg_size']).'px;}';
			$link_css .= '#'.esc_js($unique_id_shortcode).'.style-1 .dfd-video-image-thumb i {font-size: '.(esc_attr($settings['icon_bg_size']) / 2.5).'px;}';
			if($settings['icon_bg_size'] <= 60) {
				$link_css .= '#'.esc_js($unique_id_shortcode).'.style-1 .dfd-video-image-thumb i:before {left: 2px;}';
			}
		}
		
		if(isset($settings['shadow']) && !empty($settings['shadow'])) {
			$shadow_class = esc_attr($settings['shadow']);
		}
		
		if(isset($settings['full_width_background']) && strcmp($settings['full_width_background'], 'yes') === 0) {
			$link_css .= '#'.esc_js($unique_id_shortcode).' .button-wrap {display: block;}';
		}
		
		$video_w = $size;
		$video_h = $size / 1.61; //1.61 golden ratio
		/** @var WP_Embed $wp_embed  */
		$embed = $wp_embed->run_shortcode( '[embed width="' . $video_w . '"' . $video_h . ']' . $settings['video_link'] . '[/embed]' );
		
		$search_link = stripos($embed , '<a href');
		if($search_link === 0) {
			$embed = wp_oembed_get( $settings['video_link'], array('width' => $video_w, 'height' => $video_h) );
		}
		
		$button_html .= '<div class="button-wrap">';
			$button_html .= '<span class="decoration-mask"></span>';
			
			$button_html .= '<div class="dfd-video-alignment-block" >';
				$button_html .= '<div class="dfd-video-button" >';
//					$button_html .= '<span class="decoration-icon"></span>';
					$button_html .= '<i class="dfd-socicon-icon-play"><span class="decoration-icon"></span></i>';
				$button_html .= '</div>';
				if($settings['title'] || $settings['subtitle']) {
					$button_html .= '<div class="title-wrap">';
						$button_html .= $title_html;
						$button_html .= $subtitle_html;
					$button_html .= '</div>';
				}
			$button_html .= '</div>';
			
			$button_html .= '<a href="'.esc_url($settings['video_link']).'?width=1200&height=675" data-rel="prettyPhoto" class="dfd-video-link" '.$full_screen_video_data.'></a>';
		$button_html .= '</div>';
		
		if(isset($settings['main_style']) && strcmp($settings['main_style'], 'style-1') === 0 ) {
			$content_html .= '<div class="dfd-video-content video-content '.$shadow_class.'" id="'.esc_js($unique_id).'">';
				if(isset($settings['video_thumb']['url']) && !empty($settings['video_thumb']['url'])) {
					$image_src = dfd_aq_resize($settings['video_thumb']['url'], $video_w, $video_h, true, true, true);
					if(!$image_src) {
						$image_src = $settings['video_thumb']['url'];
					}
					$img_atts = Dfd_Theme_Helpers::get_image_attrs($image_src, $settings['video_thumb']['url'], $video_w, $video_h, '');
					if(isset($dfd_native['enable_images_lazy_load']) && $dfd_native['enable_images_lazy_load'] == 'on') {
						$extra_class = 'dfd-img-lazy-load';
						$loading_img_src = "data:image/svg+xml;charset=utf-8,%3Csvg xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg' viewBox%3D'0 0 $video_w $video_h'%2F%3E";
						$img_html = '<img src="'.$loading_img_src.'" data-src="'.esc_url($image_src).'" '.$img_atts.' />';
					} else {
						$img_html = '<img src="'.esc_url($image_src).'" '.$img_atts.' />';
					}
					$thumb_html .= '<a href="#'.esc_js($unique_id).'" class="dfd-video-image-thumb '.esc_attr($extra_class).'" title="'.esc_html__('Play video','dfd-native').'">';
						$thumb_html .= '<span class="container-play">';
							$thumb_html .= '<span class="decoration-icon"></span>';
							$thumb_html .= '<i class="dfd-socicon-icon-play"></i>';
						$thumb_html .= '</span>';
						$thumb_html .= $img_html;
					$thumb_html .= '</a>';
				}
				if(isset($settings['video_options']) && $settings['video_options'] === 'selfhosted') {
					if(isset($settings['video_link']) && !empty($settings['video_link'])) {
						$atts = array(
							'src'      => $settings['video_link'],
		//					'poster'   => $image_src,
							'height'   => '',
							'width'    => '',
						);
						$video_html = wp_video_shortcode( $atts );
					}
				}
		
				$content_html .= '<div class="dfd-video-box">';
					$content_html .= $thumb_html;
					if (isset($settings['video_options']) && $settings['video_options'] === 'default') {
						$content_html .= '<div class="wpb_video_wrapper">' . $embed . '</div>';
					} 
					if (isset($settings['video_options']) && $settings['video_options'] === 'selfhosted') {
						$content_html .= '<div class="wpb_video_wrapper">' . $video_html . '</div>';
					} 
				$content_html .= '</div>';
			$content_html .= '</div>';
		}
		
		$output .= '<div class="animation-container">';
			$output .= '<div id="'.esc_js($unique_id_shortcode).'" class="dfd-videoplayer '.esc_attr($el_class).'" data-id="'.esc_attr($unique_id).'" data-block-id="'.esc_attr($unique_id_shortcode).'">';
				if(isset($settings['main_style']) && strcmp($settings['main_style'], 'style-2') === 0) {
					$output .= $button_html;
					$output .= $content_html;
				}else{
					$output .= $content_html;
				}
			$output .= '</div>';
			
			if($link_css != '') {
				$output .= '<script type="text/javascript">'
							. '(function($) {'
								. '$("head").append("<style>'.$link_css.'</style>");'
							. '})(jQuery);'
						. '</script>';
			}
			
		$output .= '</div>';

		echo $output;
	}

}
