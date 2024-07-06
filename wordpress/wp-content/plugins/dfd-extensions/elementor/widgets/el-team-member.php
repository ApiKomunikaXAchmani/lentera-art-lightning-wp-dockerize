<?php

if (!defined('ABSPATH')) {
	exit;
}

class El_Team_Member extends \Elementor\Widget_Base {

	public function get_name() {
		return 'el_team_member';
	}

	public function get_title() {
		return esc_html__('DFD Team member', 'dfd-native');
	}

	public function get_categories() {
		return ['native-category'];
	}

	public function get_icon() {
		return 'dfd_team_member';
	}

	protected function register_controls() {

		$this->start_controls_section(
			'el_team_member',
			[
				'label' => esc_html__('Team member', 'dfd-native')
			]
		);
		
		$this->add_control(
			'main_layout',
			[
				'label' => esc_html__('Style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'layout-11' => esc_html__('Classic', 'dfd-native'),
					'layout-12' => esc_html__('Top title', 'dfd-native'),
					'layout-13' => esc_html__('Bottom content', 'dfd-native'),
					'layout-14' => esc_html__('Left content', 'dfd-native'),
					'layout-15' => esc_html__('Right content', 'dfd-native'),
					'layout-16' => esc_html__('Title bottom', 'dfd-native'),
					'layout-17' => esc_html__('Title on image', 'dfd-native'),
					'layout-18' => esc_html__('Hovered content', 'dfd-native'),
					'layout-19' => esc_html__('Hovered title & content', 'dfd-native')
				],
				'default' => 'layout-11'
			]
		);

		$this->add_control(
			'team_member_photo',
			[
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label' => esc_html__('Image', 'dfd-native')
			]
		);
		
		$this->add_control(
			'team_member_img_width',
			[
				'label' => esc_html__('Width', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 400
			]
		);
		
		$this->add_control(
			'team_member_img_height',
			[
				'label' => esc_html__('Height', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 400
			]
		);
		
		$this->add_control(
			'team_member_name',
			[
				'label' => esc_html__('Title', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Title', 'dfd-native')
			]
		);
		
		$this->add_control(
			'team_member_job_position',
			[
				'label' => esc_html__('Subtitle', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Subtitle', 'dfd-native')
			]
		);
		
		$this->add_control(
			'team_member_description',
			[
				'label' => esc_html__('Description', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __('Description', 'dfd-native')
			]
		);
		
		$this->add_control(
			'enable_custom_link',
			[
				'label' => esc_html__('Team member custom link', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER
			]
		);
		
		$this->add_control(
			'apply_link_to',
			[
				'label' => esc_html__('Apply link to', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'image-link' => esc_html__('Team member image', 'dfd-native'),
					'title-link' => esc_html__('Title', 'dfd-native')
				],
				'condition' => [
					'enable_custom_link' => 'yes'
				],
				'default' => 'image-link'
			]
		);
		
		$this->add_control(
			'custtom_link_url', [
				'label' => esc_html__('Custom link url', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::URL,
				'condition' => [
					'enable_custom_link' => 'yes'
				]
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'soc_networks_h_heading',
			[
				'label' => esc_html__('Soc accounts', 'dfd-native')
			]
		);
		
		$this->add_control(
			'open_soc_custom_link',
			[
				'label' => esc_html__('Open link', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'new_tab' => esc_html__('In a new tab', 'dfd-native'),
					'this_page' => esc_html__('Current window', 'dfd-native')
				],
				'default' => 'new_tab'
			]
		);
		
		foreach (Dfd_Theme_Helpers::social_networks() as $key => $value) {
			$this->add_control(
				$key,
				[
					'label' => $value['name'],
					'type' => \Elementor\Controls_Manager::TEXT
				]
			);
		}

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
//				'default' => '#FF0000',
				'selectors' => [
					'{{WRAPPER}} .dfd-content-title-big, {{WRAPPER}} .dfd-team-member.layout-18 .ovh .dfd-content-title-big' => 'color: {{SCHEME}};'
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
					'{{WRAPPER}} .team-member-description' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'style-content-typography',
				'label' => esc_html__('Content typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .team-member-description'
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'style_section',
			[
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'label' => esc_html__('Icon style', 'dfd-native')
			]
		);
		
		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__('Icon size', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 15,
				'selectors' => [
					'{{WRAPPER}} .widget.soc-icons a i' => 'font-size: {{SCHEME}}px;'
				]
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
					'{{WRAPPER}} .widget.soc-icons a i' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'content_t_heading',
			[
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'label' => esc_html__('Text alignment', 'dfd-native')
			]
		);
		
		$this->add_control(
			'align',
			[
				'label' => esc_html__('Alignment', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__('Inherit', 'dfd-native'),
					'left' => esc_html__('Left', 'dfd-native'),
					'center' => esc_html__('Center', 'dfd-native'),
					'right' => esc_html__('Right', 'dfd-native')
				],
				'default' => ''
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'thumb_t_heading',
			[
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'label' => esc_html__('Image options', 'dfd-native')
			]
		);
		
		$this->add_control(
			'thumb_radius',
			[
				'label' => esc_html__('Border radius', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 0,
				'selectors' => [
					'{{WRAPPER}} .team-member-photo, {{WRAPPER}} .overlay, {{WRAPPER}} .shadow-block' => 'border-radius: {{SCHEME}}px;'
				]
			]
		);
		
		$this->add_control(
			'shadow',
			[
				'label' => esc_html__('Shadow', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER
			]
		);
		
		$this->add_control(
			'shadow_style',
			[
				'label' => esc_html__('Shadow visibility', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'permanent' => esc_html__('Permanent', 'dfd-native'),
					'hover' => esc_html__('On hover', 'dfd-native')
				],
				'condition' => [
					'shadow' => 'yes'
				],
				'default' => 'permanent'
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'overlay_h_heading',
			[
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'label' => esc_html__('Overlay color', 'dfd-native'),
				'condition' => [
					'main_layout' => ['layout-13', 'layout-17', 'layout-18', 'layout-19']
				],
			]
		);
		
		$this->add_control(
			'show_overlay',
			[
				'label' => esc_html__('Overlay', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'condition' => [
					'main_layout' => ['layout-13', 'layout-17', 'layout-18', 'layout-19']
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'team_member_mask_background',
				'label' => esc_html__('Mask background', 'plugin-name'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .overlay',
				'condition' => [
					'show_overlay' => 'yes'
				]
			]
		);
		
		$this->end_controls_section();
		
	}

	protected function render() {
		
		$output = $el_class = $link_atts = $soc_networks_list = $soc_networks_output = '';
		$title_html = $shadow_class = $subtitle_html = $content_output = $shadow_block = '';
		$image_output = $width = $height = $overlay_output = '';
		
		$settings = $this->get_settings_for_display();
		
		/* ************************
		 * Social icons.
		 * *********************** */

		$has_one = false;
		
		foreach(Dfd_Theme_Helpers::social_networks() as $soc_network => $soc_name) {
			if(isset($settings[$soc_network]) && !empty($settings[$soc_network])) {
				$has_one = true;
				$soc_networks_list .= '<a href="' . $settings[$soc_network] . '" class="' . esc_attr($soc_name['icon']) . '" ' . esc_attr(' target="' . ($settings['open_soc_custom_link'] == 'new_tab' ? '_blank' : '_self' ) . '"') . '><span class="line-top-left ' . esc_attr($soc_name['icon']) . '"></span><span class="line-top-center ' . esc_attr($soc_name['icon']) . '"></span><span class="line-top-right ' . esc_attr($soc_name['icon']) . '"></span><span class="line-bottom-left ' . esc_attr($soc_name['icon']) . '"></span><span class="line-bottom-center ' . esc_attr($soc_name['icon']) . '"></span><span class="line-bottom-right ' . esc_attr($soc_name['icon']) . '"></span><i class="' . esc_attr($soc_name['icon']) . '"></i></a>';
			}
		}
		
		if($has_one) {
			$soc_networks_output .= '<div class="widget soc-icons dfd-soc-icons-hover-style-1">';
				$soc_networks_output .= $soc_networks_list;
			$soc_networks_output .= '</div>';
		}

		if($settings['enable_custom_link']) {
			$link_atts .= 'href="' . (!empty($settings['link']['url']) ? esc_url($settings['link']['url']) : '#') . '"';
			$link_atts .= ' target="' . (!empty($settings['link']['is_external']) ? '_blank' : '_self' ) . '"';
			$link_atts .= !empty($settings['link']['nofollow']) ? ' rel="nofollow"' : '';
			$link_atts .= !empty($settings['link']['custom_attributes']) ? ' ' . esc_attr($settings['link']['custom_attributes']) : '';
		}
		
		/* ************************
		 * Title / Subtitle HTML.
		 * *********************** */
			// Title name HTML.
		if(!empty($settings['team_member_name'])) {
			$title_html .= '<' . $settings['title_html_tag'] . ' class="team-member-title dfd-content-title-big">';
			if($settings['enable_custom_link'] && ('title-link' === $settings['apply_link_to'])) {
				$title_html .= '<a '.$link_atts.'>';
				$title_html .= esc_html($settings['team_member_name']);
				$title_html .= '</a>';
			} else {
				$title_html .= esc_html($settings['team_member_name']);
			}
			$title_html .= '</' . $settings['title_html_tag'] . '>';
		}
//
//			// Subtitle HTML.
		if(!empty($settings['team_member_job_position'])) {
			$subtitle_html .= '<' . $settings['subtitle_html_tag'] . ' class="team-member-subtitle dfd-content-subtitle">' . esc_html($settings['team_member_job_position']) . '</' . $settings['subtitle_html_tag'] . '>';
		}
		
		/** ************************
		 * Other Block options.
		 * *********************** */
		
		if('yes' === $settings['shadow']) {
			if ('hover' === $settings['shadow_style']) {
				$shadow_class = ' module-shadow-hover ';
			} else {
				$shadow_class = ' module-shadow-permanent ';
			}
		}
		
			//content HTML
		if (!empty($settings['team_member_description'])) {
			$content_output = '<div class="team-member-description">' . $settings['team_member_description'] . '</div>';
		} else {
			if ($has_one && ('layout-18' === $settings['main_layout'] || 'layout-19' === $settings['main_layout'])) {
				$content_output = '<div class="team-member-description" style="margin-top:12px;"></div>';
			} else {
				$content_output = "";
			}
		}

		$shadow_block .= '<div class="shadow-block"></div>';
		
		if(isset($settings['team_member_photo']['url']) && !empty($settings['team_member_photo']['url'])) {
			$image_src = wp_get_attachment_image_src($settings['team_member_photo']['id'], 'full');
//			var_dump($image_src);
			$image_url = dfd_aq_resize($image_src[0], $settings['team_member_img_width'], $settings['team_member_img_height'], true, true, true);
			if (!$image_url) {
				$image_url = $image_src[0];
			}
		} else {
			$image_url = Dfd_Theme_Helpers::default_noimage_url("rect_med_300");
		}

		$img_atts = Dfd_Theme_Helpers::get_image_attrs($image_url, $settings['team_member_photo']['id'], $settings['team_member_img_width'], $settings['team_member_img_height'], esc_attr__('Team member', 'dfd-native'));

		global $dfd_native;
		
		if(isset($dfd_native['enable_images_lazy_load']) && $dfd_native['enable_images_lazy_load'] == 'on') {
			$el_class .= ' dfd-img-lazy-load ';
			$width = $settings['team_member_img_width'];
			$height = $settings['team_member_img_height'];
			$loading_img_src = "data:image/svg+xml;charset=utf-8,%3Csvg xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg' viewBox%3D'0 0 $width $height'%2F%3E";
			$image_output = '<img src="' . $loading_img_src . '" data-src="' . esc_url($image_url) . '" class="team-member-photo ' . $shadow_class . '" ' . $img_atts . ' />';
		} else {
			$image_output = '<img src="' . esc_url($image_url) . '" class="team-member-photo ' . $shadow_class . '" ' . $img_atts . ' />';
		}
		
		if ('layout-13' === $settings['main_layout'] ||
			'layout-17' === $settings['main_layout'] ||
			'layout-18' === $settings['main_layout'] ||
			'layout-19' === $settings['main_layout']) {
				$overlay_output .= '<div class="overlay"></div>';
		}
		
		if ($settings['enable_custom_link'] && ('image-link' === $settings['apply_link_to'])) {
			$overlay_output .= '<a class="image-custom-link" '.$link_atts.'></a>';
		}

		$output .= '<div class="dfd-team-member ' . $settings['main_layout'] . ' ' . $settings['align'] . ' ' . $el_class . '">';
		switch ($settings['main_layout']) {
			case 'layout-11':
				$output .= '<div class="image-wrap ' . $shadow_class . '">';
					$output .= $shadow_block;
					$output .= '<span class="overlay_wrap">';
						$output .= $image_output;
						$output .= $overlay_output;
					$output .= '</span>';
				$output .= '</div>';
				$output .= '<div class="content-wrap">';
					$output .= '<div class="title-wrap">';
						$output .= $title_html;
						$output .= $subtitle_html;
					$output .= '</div>';
					$output .= $content_output;
					$output .= $soc_networks_output;
				$output .= '</div>';
				break;
			case 'layout-14':
				$output .= '<div class="content-wrap">';
					$output .= '<div class="title-wrap">';
					$output .= $title_html;
					$output .= $subtitle_html;
					$output .= '</div>';
				$output .= $content_output;
				$output .= $soc_networks_output;
				$output .= '</div>';
				$output .= '<div class="image-wrap ' . $shadow_class . '" style="width:' . $settings['team_member_img_width'] . 'px;">';
					$output .= '<span class="overlay_wrap">';
						$output .= $shadow_block;
						$output .= $image_output;
						$output .= $overlay_output;
					$output .= '</span>';
				$output .= '</div>';
//
				break;
			case 'layout-15':
				$output .= '<div class="image-wrap ' . $shadow_class . '" style="width:' . $settings['team_member_img_width'] . 'px;">';
					$output .= '<span class="overlay_wrap">';
						$output .= $shadow_block;
						$output .= $image_output;
						$output .= $overlay_output;
					$output .= '</span>';
				$output .= '</div>';
				$output .= '<div class="content-wrap">';
					$output .= '<div class="title-wrap">';
						$output .= $title_html;
						$output .= $subtitle_html;
					$output .= '</div>';
					$output .= $content_output;
					$output .= $soc_networks_output;
				$output .= '</div>';
//
				break;
			case 'layout-12':
				$output .= '<div class="title-wrap">';
					$output .= $title_html;
					$output .= $subtitle_html;
				$output .= '</div>';
				$output .= '<div class="image-wrap ' . $shadow_class . '">';
					$output .= $shadow_block;
					$output .= $image_output;
					$output .= $overlay_output;
				$output .= '</div>';
				$output .= '<div class="content-wrap">';
					$output .= $content_output;
					$output .= $soc_networks_output;
				$output .= '</div>';
				break;
			case 'layout-13':
				$output .= '<div class="image-wrap ' . $shadow_class . '">';
					$output .= $shadow_block;
					$output .= $image_output;
					$output .= $overlay_output;
					$output .= '<div class="title-wrap">';
						$output .= $title_html;
						$output .= $subtitle_html;
					$output .= '</div>';
				$output .= '</div>';
				$output .= '<div class="content-wrap">';
					$output .= $content_output;
					$output .= $soc_networks_output;
				$output .= '</div>';
				break;
			case 'layout-16':
				$output .= '<div class="image-wrap ' . $shadow_class . '">';
					$output .= $shadow_block;
					$output .= $image_output;
					$output .= $overlay_output;
				$output .= '</div>';
				$output .= '<div class="title-wrap">';
					$output .= $title_html;
					$output .= $subtitle_html;
				$output .= '</div>';
				$output .= '<div class="content-wrap">';
					$output .= $content_output;
					$output .= $soc_networks_output;
				$output .= '</div>';
				break;
			case 'layout-17':
				$output .= '<div class="image-wrap ' . $shadow_class . '">';
					$output .= $shadow_block;
					$output .= $image_output;
					$output .= $overlay_output;
					$output .= '<div class="title-wrap">';
						$output .= $title_html;
						$output .= $subtitle_html;
					$output .= '</div>';
				$output .= '</div>';
				$output .= '<div class="content-wrap">';
					$output .= $content_output;
					$output .= $soc_networks_output;
				$output .= '</div>';
				break;
			case 'layout-18':
			case 'layout-19':
				$output .= '<div class="image-wrap ' . $shadow_class . '">';
					$output .= $shadow_block;
					$output .= "<span class='wrap_img'>";
						$output .= $image_output;
						$output .= $overlay_output;
					$output .= "</span>";
					$output .= '<div class="title-wrap level_one">';
						$output .= $title_html;
						$output .= $subtitle_html;
						$output .= $content_output;
						$output .= $soc_networks_output;
					$output .= '</div>';
					$output .= '<div class="ovh">';
						$output .= $overlay_output;
						$output .= '<div class="title-wrap">';
							$output .= $title_html;
							$output .= $subtitle_html;
							$output .= $content_output;
						$output .= '</div>';
						$output .= '<div class="content-wrap">';
							$output .= '<div class="title-wrap">';
								$output .= $title_html;
								$output .= $subtitle_html;
							$output .= '</div>';
							$output .= $content_output;
							$output .= $soc_networks_output;
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div>';
//
				break;

			default:
			break;
		}

		$output .= '</div>';

		echo $output;
	}

}
