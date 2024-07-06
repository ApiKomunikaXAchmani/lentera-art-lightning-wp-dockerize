<?php

if (!defined('ABSPATH')) {
	exit;
}

if (!class_exists('Dfd_Default_Widgets_Customize')) {

	class Dfd_Default_Widgets_Customize {

		public function __construct() {
			add_action('elementor/element/before_section_end', [$this, 'dfd_elementor_add_controls_default_widgets'], 10, 3);
			add_action('elementor/frontend/section/before_render', [$this, 'dfd_section_before_add_canvas']);
			add_action('elementor/frontend/section/after_render', [$this, 'dfd_section_after_add_canvas']);
		}

		public function dfd_elementor_add_controls_default_widgets($section, $section_id, $args) {
			
			/*Tab widget*/
			if($section->get_name() == 'tabs' && $section_id == 'section_tabs_style') {

				$section->add_control(
					'dfd_tab_styles_heading',
					[
						'type' => \Elementor\Controls_Manager::HEADING,
						'label' => esc_html__('DFD styles', 'dfd-native'),
						'separator' => 'before',
					]
				);

				$section->add_control(
					'dfd_tab_styles',
					[
						'label' => esc_html__('Style', 'dfd-native'),
						'type' => \Elementor\Controls_Manager::SELECT,
						'options' => [
							'' => esc_html__('None', 'dfd-native'),
//							'classic' => esc_html__('Classic', 'dfd-native'),
//							'collapse' => esc_html__('General Background', 'dfd-native'),
//							'empty' => esc_html__('Underline', 'dfd-native'),
//							'empty_rounded' => esc_html__('Active tab border', 'dfd-native'),
							'empty_shadow' => esc_html__('Active tab background', 'dfd-native')
						],
						'default' => '',
					]
				);
				
				$section->add_control(
					'dfd_active_tab_bg_color', [
						'type' => \Elementor\Controls_Manager::COLOR,
						'label' => esc_html__('Active tab BG color', 'dfd-native'),
						'condition' => [
							'dfd_tab_styles' => ['empty', 'empty_rounded', 'empty_shadow']
						],
						'selectors' => [
							'{{WRAPPER}} .elementor-tabs-wrapper .elementor-tab-title' => 'display: block; float: left;',
							'{{WRAPPER}} .elementor-tab-title:before, {{WRAPPER}} .elementor-tab-title:after, {{WRAPPER}} .elementor-tab-title' => 'border-width: 0;',
							'{{WRAPPER}} .elementor-tab-title.elementor-active' => 'background-color: {{SCHEME}}; border-bottom-style: solid; border-color: transparent;',
							'{{WRAPPER}} .elementor-tab-desktop-title.elementor-active:before' => 'height: 100%; width: 100%;',
							'{{WRAPPER}} .elementor-tab-title' => 'border-color: transparent; margin-right: 9px;',
							'{{WRAPPER}} .elementor-tab-title:before' => 'display: block; content: ""; position: absolute; width: 100%; left: 0; right: 0; top: 0; height: 100%; border-bottom-style: solid;'
						]
					]
				);
				
				$section->add_control(
					'border_radius_active_tab',
					[
						'label' => esc_html__('Active tab border radius', 'dfd-native'),
						'type' => \Elementor\Controls_Manager::NUMBER,
						'condition' => [
							'dfd_tab_styles' => ['empty', 'empty_rounded', 'empty_shadow']
						],
						'selectors' => [
							'{{WRAPPER}} .elementor-tab-title.elementor-active' => 'border-radius: {{SCHEME}}px;'
						]
					]
				);
				
				$section->add_control(
					'show_underline',
					[
						'label' => esc_html__('Underline on inactive tab', 'dfd-native'),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'condition' => [
							'dfd_tab_styles' => ['empty', 'empty_rounded', 'empty_shadow']
						],
						'default' => 'yes'
					]
				);

				$section->add_control(
					'underline_height',
					[
						'label' => esc_html__('Underline height', 'dfd-native'),
						'type' => \Elementor\Controls_Manager::NUMBER,
						'condition' => [
							'show_underline' => 'yes',
							'dfd_tab_styles' => ['empty', 'empty_rounded', 'empty_shadow']
						],
						'selectors' => [
							'{{WRAPPER}} .elementor-tab-title:before' => 'border-width: {{SCHEME}}px;'
						]
					]
				);
				
				$section->add_control(
					'underline_color', [
						'type' => \Elementor\Controls_Manager::COLOR,
						'label' => esc_html__('Underline color', 'dfd-native'),
						'condition' => [
							'show_underline' => 'yes',
							'dfd_tab_styles' => ['empty', 'empty_rounded', 'empty_shadow']
						],
						'selectors' => [
							'{{WRAPPER}} .elementor-tab-title:before' => 'border-bottom-color: {{SCHEME}};',
							'{{WRAPPER}} .elementor-tab-title.elementor-active:before' => 'border-bottom-color: transparent;'
						]
					]
				);
				
				$section->add_control(
					'underline_hover_color', [
						'type' => \Elementor\Controls_Manager::COLOR,
						'label' => esc_html__('Underline hover color', 'dfd-native'),
						'condition' => [
							'show_underline' => 'yes',
							'dfd_tab_styles' => ['empty', 'empty_rounded', 'empty_shadow']
						],
						'selectors' => [
							'{{WRAPPER}} .elementor-tab-title.elementor-active:hover:before' => 'border-bottom-color: transparent;',
							'{{WRAPPER}} .elementor-tab-title:hover:before' => 'border-bottom-color: {{SCHEME}};'
						]
					]
				);
				
			}
			/*END Tab widget*/
			
			/*Section*/
			if($section->get_name() == 'section' && $section_id == 'section_background') {
				
				$section->add_control(
					'dfd_section_bg_canvas_heading',
					[
						'type' => \Elementor\Controls_Manager::HEADING,
						'label' => esc_html__('DFD Styles & Effects', 'dfd-native'),
						'separator' => 'before',
						'condition' => [
							'background_background' => 'classic'
						]
					]
				);
				
				$section->add_control(
					'show_canvas',
					[
						'label' => esc_html__('Enable canvas', 'dfd-native'),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'condition' => [
							'background_background' => 'classic'
						]
					]
				);
				
				$section->add_control(
					'dfd_canvas_style',
					[
						'label' => esc_html__('Canvas style', 'dfd-native'),
						'type' => \Elementor\Controls_Manager::SELECT,
						'options' => [
							'style_1' => esc_html__('Style 1', 'dfd-native'),
							'style_2' => esc_html__('Style 2', 'dfd-native'),
							'style_3' => esc_html__('Style 3', 'dfd-native')
						],
						'condition' => [
							'show_canvas' => 'yes',
							'background_background' => 'classic'
						],
						'default' => 'style_1'
					]
				);
				
				$section->add_control(
					'dfd_canvas_size',
					[
						'label' => esc_html__('Animation size', 'dfd-native'),
						'type' => \Elementor\Controls_Manager::SELECT,
						'options' => [
							'parent' => esc_html__('Section size', 'dfd-native'),
							'window' => esc_html__('Window size', 'dfd-native')
						],
						'condition' => [
							'show_canvas' => 'yes',
							'background_background' => 'classic'
						],
						'default' => 'parent'
					]
				);
				
				$section->add_control(
					'dfd_canvas_color', [
						'type' => \Elementor\Controls_Manager::COLOR,
						'label' => esc_html__('Animated lines color', 'dfd-native'),
						'condition' => [
							'dfd_canvas_style' => ['style_2', 'style_4'],
							'show_canvas' => ['yes'],
							'background_background' => 'classic'
						]
					]
				);
				
				$section->add_control(
					'show_image_effects',
					[
						'label' => esc_html__('Enable DFD image effects', 'dfd-native'),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'condition' => [
							'background_background' => 'classic',
							'background_image[url]!' => ''
						]
					]
				);
				
				$section->add_control(
					'dfd_parallax_style',
					[
						'label' => esc_html__('Parallax Style', 'dfd-native'),
						'type' => \Elementor\Controls_Manager::SELECT,
						'options' => [
							'dfd_animated_bg' => esc_html__('Auto Moving Background', 'dfd-native'),
							'dfd_vertical_parallax' => esc_html__('Vertical Parallax On Scroll', 'dfd-native'),
							'dfd_horizontal_parallax' => esc_html__('Horizontal Parallax On Scroll', 'dfd-native'),
//							'dfd_mousemove_parallax' => esc_html__('Interactive Parallax On Mouse Move', 'dfd-native'),
//							'dfd_multi_parallax' => esc_html__('Multilayer Vertical Parallax', 'dfd-native')
						],
						'condition' => [
							'show_image_effects' => 'yes',
//							'background_background' => 'classic',
//							'background_image[url]!' => ''
						],
						'default' => 'dfd_animated_bg'
					]
				);
				
//				$row_params[] = array(
//					'type' => 'attach_images',
//					'class' => '',
//					'heading' => esc_html__('Layer Images', 'dfd-native'),
//					'param_name' => 'dfd_layer_image',
//					'value' => '',
//					'description' => esc_html__('Upload or select background images from media gallery.', 'dfd-native'),
//					'dependency' => array('element' => 'dfd_parallax_style','value' => array('dfd_mousemove_parallax','dfd_multi_parallax')),
//					'group' => esc_attr__('Background options', 'dfd-native')
//				);
				
//				$section->add_control(
//					'dfd_multi_parallax_direction',
//					[
//						'label' => esc_html__('Parallax Direction', 'dfd-native'),
//						'type' => \Elementor\Controls_Manager::SELECT,
//						'options' => [
//							'vertical' => esc_html__('Vertical', 'dfd-native'),
//							'horizontal' => esc_html__('Horizontal', 'dfd-native')
//						],
//						'condition' => [
//							'show_image_effects' => 'yes',
//							'dfd_parallax_style' => 'dfd_multi_parallax'
//						],
//						'default' => 'vertical'
//					]
//				);
				
				$section->add_control(
					'dfd_parallax_sense',
					[
						'label' => esc_html__('Parallax Speed', 'dfd-native'),
						'type' => \Elementor\Controls_Manager::NUMBER,
						'condition' => [
							'show_image_effects' => 'yes',
//							'background_image[url]!' => '',
							'dfd_parallax_style' => ['dfd_animated_bg', 'dfd_vertical_parallax', 'dfd_horizontal_parallax', 'dfd_mousemove_parallax', 'dfd_multi_parallax']
						]
					]
				);
				
				$section->add_control(
					'dfd_parallax_offset',
					[
						'label' => esc_html__('Parallax Offset', 'dfd-native'),
						'type' => \Elementor\Controls_Manager::NUMBER,
						'condition' => [
							'show_image_effects' => 'yes',
//							'background_image[url]!' => '',
							'dfd_parallax_style' => ['dfd_vertical_parallax']
						]
					]
				);
				
				$section->add_control(
					'dfd_animation_direction',
					[
						'label' => esc_html__('Animation Direction', 'dfd-native'),
						'type' => \Elementor\Controls_Manager::SELECT,
						'options' => [
							'right' => esc_html__('To Right', 'dfd-native'),
							'left' => esc_html__('To Left', 'dfd-native'),
							'bottom' => esc_html__('To Bottom', 'dfd-native'),
							'top' => esc_html__('To Top', 'dfd-native'),
						],
						'condition' => [
							'show_image_effects' => 'yes',
//							'background_image[url]!' => '',
							'dfd_parallax_style' => 'dfd_animated_bg'
						],
						'default' => 'left'
					]
				);
				
				$section->add_control(
					'dfd_mobile_enable',
					[
						'label' => esc_html__('Parallax on Mobile devices', 'dfd-native'),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'condition' => [
							'show_image_effects' => 'yes',
							'dfd_parallax_style' => ['dfd_animated_bg','dfd_horizontal_parallax','dfd_vertical_parallax']
						]
					]
				);
				
				//dfd_bg_image_new
				//dfd_bg_image_repeat
				//dfd_bg_image_size
				//dfd_image_bg_color
				//dfd_bg_img_attach
				//dfd_bg_image_position
				//dfd_bg_resolution
				//dfd_bg_image_position_mobile
				//dfd_bg_image_position_mobile
				//dfd_bg_image_new_responsive
				//dfd_bg_image_size_retina
			}
			//END Section
			
			//Accordion
			if($section->get_name() == 'accordion' && $section_id == 'section_toggle_style_title') {
				
				$section->add_control(
					'dfd_accordion_heading',
					[
						'type' => \Elementor\Controls_Manager::HEADING,
						'label' => esc_html__('DFD Styles', 'dfd-native'),
						'separator' => 'before'
					]
				);
				
				$section->add_control(
					'dfd_accordion_border_radius',
					[
						'label' => esc_html__('Title border radius', 'dfd-native'),
						'type' => \Elementor\Controls_Manager::NUMBER,
						'selectors' => [
							'{{WRAPPER}} .elementor-tab-title' => 'border-radius: {{SCHEME}}px;'
						]
					]
				);
				
				$section->add_control(
					'dfd_accordion_spasing',
					[
						'label' => esc_html__('Space between titles', 'dfd-native'),
						'type' => \Elementor\Controls_Manager::NUMBER,
						'selectors' => [
							'{{WRAPPER}} .elementor-accordion-item' => 'padding-bottom: {{SCHEME}}px;',
							'{{WRAPPER}} .elementor-accordion-item:last-child' => 'padding-bottom: 0;'
						]
					]
				);
				
				$section->add_control(
					'dfd_accordion_active_bg', [
						'type' => \Elementor\Controls_Manager::COLOR,
						'label' => esc_html__('Active background', 'dfd-native'),
						'selectors' => [
							'{{WRAPPER}} .elementor-accordion-item .elementor-tab-title.elementor-active' => 'background-color: {{SCHEME}};'
						]
					]
				);
			}
			//END Accordion
		}
		
		public function dfd_section_before_add_canvas($section) {
			ob_start();
		}
		
		public function dfd_section_after_add_canvas($section) {
			$output = $default_content = ob_get_clean();
			$settings = $section->get_settings_for_display();
			
			$css_rules = $data_atts = '';
			
			if($settings['show_canvas'] == 'yes') {
				$uniqid = uniqid('dfd-canvas-');
				$data_atts .= ' data-canvas-id="'.esc_attr($uniqid).'"';

				if($settings['dfd_canvas_style'] == 'style_1') {
					wp_enqueue_script('dfd-canvas-bg-first');
				} elseif ($settings['dfd_canvas_style'] == 'style_2') {
					wp_enqueue_script('dfd-particleground');
				} elseif ($settings['dfd_canvas_style'] == 'style_3') {
					wp_enqueue_script('dfd-canvas-bg-third');
				} elseif ($settings['dfd_canvas_style'] == 'style_4') {
					wp_enqueue_script('dfd-particleground-old');
				}
				
				if(!isset($settings['dfd_canvas_style']) || empty($settings['dfd_canvas_style'])) $settings['dfd_canvas_style'] = 'style_1';
				$data_atts .= ' data-canvas-style="'.esc_attr($settings['dfd_canvas_style']).'"';

				if(!isset($settings['dfd_canvas_size']) || empty($settings['dfd_canvas_size'])) $settings['dfd_canvas_size'] = 'parent';
				$data_atts .= ' data-canvas-size="'.esc_attr($settings['dfd_canvas_size']).'"';

				if($settings['dfd_canvas_style'] == 'style_2' || $settings['dfd_canvas_style'] == 'style_4') {
					if(!isset($settings['dfd_canvas_color']) || empty($settings['dfd_canvas_color'])) $settings['dfd_canvas_color'] = '#ffffff';
					$data_atts .= ' data-canvas-color="'.esc_attr($settings['dfd_canvas_color']).'"';
				}
				
				if(!empty($settings['background_color'])) {
					$css_rules .= '#'.esc_js($uniqid).' {background-color: '.$settings['background_color'].';}';
					$css_rules .= '#'.esc_js($uniqid).' + .elementor-section {background-color: transparent;}';
				}

				$output = '<div class="dfd-elementor-section-wrap"><div class="dfd-row-bg-wrap dfd-row-bg-canvas" id="'.esc_attr($uniqid).'" '.$data_atts.'></div>'.$default_content.'</div>';
				
			} else if($settings['show_image_effects'] == 'yes') {
				$class = $data_atts = /*$css_rules =*/ $mobile_css = '';
				$mobile_image = false;

				$uniqid = uniqid('dfd-image-bg-');

				$simple_styles = array(
					'dfd_animated_bg',
					'dfd_horizontal_parallax',
					'dfd_vertical_parallax'
				);

				$parallax_styles = array(
					'dfd_animated_bg',
					'dfd_vertical_parallax',
					'dfd_horizontal_parallax',
					'dfd_mousemove_parallax',
					'dfd_multi_parallax'
				);

				if(!isset($settings['dfd_parallax_style']) || empty($settings['dfd_parallax_style'])) return;

				$class .= $settings['dfd_parallax_style'];

				if($settings['dfd_parallax_style'] == 'dfd_vertical_parallax') {
					$data_atts .= ' data-parallax_offset="'.esc_attr($settings['dfd_parallax_offset']).'"';
				}
				if($settings['background_color'] != '') {
					$css_rules .= 'background-color: '.esc_attr($settings['background_color']).';';
				}

				if(($settings['dfd_parallax_style'] == 'dfd_vertical_parallax') && $settings['background_position'] != '') {
					$css_rules .= 'background-position: '.esc_attr($settings['background_position']).';';
				}

				if($settings['dfd_parallax_style'] == 'dfd_animated_bg') {
					$settings['dfd_animation_direction'] = (isset($settings['dfd_animation_direction']) && !empty($settings['dfd_animation_direction'])) ? $settings['dfd_animation_direction'] : 'left';
					$class .= ' dfd-'.esc_attr($settings['dfd_animation_direction']).'-animation';
					$data_atts .= ' data-direction="'.esc_attr($settings['dfd_animation_direction']).'"';
				}
				
				if(in_array($settings['dfd_parallax_style'], $simple_styles)) {
					if(isset($settings['background_image']['url']) && !empty($settings['background_image']['url'])) {
						$bg_image = $settings['background_image']['url'];
					} else {
						$bg_image = get_template_directory_uri() . '/assets/images/no_image_resized_120-120.jpg';
					}
					$css_rules .= 'background-image: url('.esc_url($bg_image).');';
					$data_atts .= ' data-default-image="'.esc_url($bg_image).'"';

					if(isset($settings['background_repeat']) && !empty($settings['background_repeat']) && $settings['dfd_parallax_style'] != 'dfd_animated_bg') {
						$css_rules .= 'background-repeat: '.esc_attr($settings['background_repeat']).';';
					}

					if(isset($settings['background_size']) && !empty($settings['background_size'])) {
						$css_rules .= 'background-size: '.esc_attr($settings['background_size']).';';
					}

					if(isset($settings['background_attachment']) && !empty($settings['background_attachment'])) {
						$css_rules .= 'background-attachment: '.esc_attr($settings['background_attachment']).';';
					}
				}

				if(!empty($css_rules)) {
					$css_rules = '#'.esc_attr($uniqid).' {'.$css_rules.'}';
				}
				
				$resetting_styles = '';
				$resetting_styles .= '#'.esc_attr($uniqid).' + .elementor-section {';
					$resetting_styles .= 'background-image: initial;';
					$resetting_styles .= 'background-repeat: initial;';
					$resetting_styles .= 'background-size: initial;';
					$resetting_styles .= 'background-attachment: initial;';
				$resetting_styles .= '}';
				$css_rules .= $resetting_styles;
				
				$breakpoints = \Elementor\Plugin::$instance->breakpoints->get_breakpoints();
				foreach ($breakpoints as $name_break => $value) {
					if($value->is_enabled()) {
						$number_break = $breakpoints[$name_break]->get_value();
						$css_rules .= '@media only screen and (max-width: '. $number_break .'px) {';
							if(!empty($settings['background_image_'.$name_break]['url'])) {
								$css_rules .= '#'.esc_attr($uniqid).' {background-image: url('.esc_url($settings['background_image_'.$name_break]['url']).');}';
							}
							if(!empty($settings['background_repeat_'.$name_break])) {
								$css_rules .= '#'.esc_attr($uniqid).' {background-repeat: '.esc_attr($settings['background_repeat_'.$name_break]).';}';
							}
							if(!empty($settings['background_size_'.$name_break])) {
								$css_rules .= '#'.esc_attr($uniqid).' {background-size: '.esc_attr($settings['background_size_'.$name_break]).';}';
							}
							if(!empty($settings['background_attachment_'.$name_break])) {
								$css_rules .= '#'.esc_attr($uniqid).' {background-attachment: '.esc_attr($settings['background_attachment_'.$name_break]).';}';
							}
						$css_rules .= '}';
					}
				}
				
				if(in_array($settings['dfd_parallax_style'], $parallax_styles)) {
					if(isset($settings['dfd_parallax_sense']) && !empty($settings['dfd_parallax_sense'])) {
						$data_atts .= ' data-parallax_sense="'.esc_attr($settings['dfd_parallax_sense']).'"';
					} else {
						$data_atts .= ' data-parallax_sense="30"';
					}
				}

				if(isset($settings['dfd_mobile_enable']) && $settings['dfd_mobile_enable'] == 'yes') {
					$data_atts .= ' data-mobile_enable="1"';
				} else {
					$data_atts .= ' data-mobile_enable="0"';
				}

				$output = '<div class="dfd-row-bg-wrapper-cover dfd-elementor-section-wrap">';
					$output .= '<div class="dfd-row-bg-wrap dfd-row-bg-image '.esc_attr($class).'" id="'.esc_attr($uniqid).'" '.$data_atts.'>';

//					if(($settings['dfd_parallax_style'] == 'dfd_mousemove_parallax' || $settings['dfd_parallax_style'] == 'dfd_multi_parallax') && isset($dfd_layer_image) && !empty($dfd_layer_image)) {
//						$image_ids = explode(',', $dfd_layer_image);
//						$i = 0;
//
//						foreach($image_ids as $id) {
//							$i++;
//							$image_src = wp_get_attachment_image_src($id, 'full');
//
//							if(isset($image_src[0]) && !empty($image_src[0])) {
//								if($settings['dfd_parallax_style'] == 'dfd_mousemove_parallax') {
//									wp_enqueue_script('dfd-jparallax');
//									$output .= '<img src="'.esc_url($image_src[0]).'" alt="'.esc_attr__('Interactive parallax image','dfd-native').'" class="dfd-interactive-parallax-item" />';
//								} else {
//									$data_atts .= (isset($dfd_multi_parallax_direction) && !empty($dfd_multi_parallax_direction)) ? ' data-direction-multi="'.$dfd_multi_parallax_direction.'"' : ' data-direction-multi="vertical"';
//									$css_rules .= '#'.esc_attr($uniqid).' .dfd-multi-parallax-layer-'.esc_attr($i).' {background-image: url('.esc_url($image_src[0]).');background-size: initial;background-repeat:no-repeat;}';
//									$output .= '<div class="dfd-multi-parallax-layer dfd-multi-parallax-layer-'.esc_attr($i).'" '.$data_atts.'></div>';
//								}
//							}
//						}
//					}

					$output .= '</div>';
					$output .= $default_content;
				$output .= '</div>';
			}
			
			if($css_rules != '') {
				$output .= '<script type="text/javascript">'
							. '(function($) {'
								. '$("head").append("<style>'.$css_rules.'</style>");'
							. '})(jQuery);'
						. '</script>';
			}

			echo $output;
		}
	}

	$Dfd_Default_Widgets_Customize = new Dfd_Default_Widgets_Customize();
}
