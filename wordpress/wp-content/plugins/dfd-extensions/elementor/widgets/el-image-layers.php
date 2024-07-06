<?php

if (!defined('ABSPATH')) {
	exit;
}

class El_Image_layers extends \Elementor\Widget_Base {

	public function get_name() {
		return 'el_image_layers';
	}

	public function get_title() {
		return esc_html__('DFD Image layers', 'dfd-native');
	}

	public function get_categories() {
		return ['native-category'];
	}

	public function get_icon() {
		return 'dfd_image_layers';
	}
	
//	public function get_script_depends() {
//		return ['dfd_image_layers_script'];
//	}

	protected function register_controls() {

		$this->start_controls_section(
			'el_image_layers',
			[
				'label' => esc_html__('Image layers', 'dfd-native'),
			]
		);

		$this->add_control(
			'alignment',
			[
				'label' => esc_html__('Alignment', 'dfd-native'),
				'description' => esc_html__('This option allows you to align the module horizontally', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'layers-left' => [
						'title' => esc_html__('Left', 'dfd-native'),
						'icon' => 'eicon-text-align-left',
					],
					'layers-center' => [
						'title' => esc_html__('Center', 'dfd-native'),
						'icon' => 'eicon-text-align-center',
					],
					'layers-right' => [
						'title' => esc_html__('Right', 'dfd-native'),
						'icon' => 'eicon-text-align-right',
					]
				],
				'default' => 'layers-center',
			]
		);

		$this->add_control(
			'periodicity',
			[
				'label' => esc_html__('Interval', 'dfd-native'),
				'description' => esc_html__('Set the periodicity for image appearing in seconds', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'step' => '0.1',
				'default' => '0.3',
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'image_id',
			[
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label' => esc_html__('Upload Image', 'dfd-native')
			]
		);

		$repeater->add_control(
			'offcet_x',
			[
				'label' => esc_html__('Horizontal offset', 'dfd-native'),
				'description' => esc_html__('Add the layer offset in %, for example -100% or 100%', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => '0'
			]
		);

		$repeater->add_control(
			'offcet_y',
			[
				'label' => esc_html__('Vertical offset', 'dfd-native'),
				'description' => esc_html__('Add the layer offset in %, for example -100% or 100%', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => '0'
			]
		);

		$repeater->add_control(
			'layer_animation',
			[
				'label' => esc_html__('Animation', 'dfd-native'),
				'description' => esc_html__('Choose the appear effect for the element', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'fadeIn' => esc_html__('Fade In', 'dfd-native'),
					'flipXIn' => esc_html__('Flip Horizontally', 'dfd-native'),
					'flipYIn' => esc_html__('Flip Vertically', 'dfd-native'),
					'shrinkIn' => esc_html__('Shrink', 'dfd-native'),
					'expandIn' => esc_html__('Expand', 'dfd-native'),
					'grow' => esc_html__('Grow', 'dfd-native'),
					'slideUpBigIn' => esc_html__('Slide Up', 'dfd-native'),
					'slideDownBigIn' => esc_html__('Slide Down', 'dfd-native'),
					'slideLeftBigIn' => esc_html__('Slide Right', 'dfd-native'),
					'slideRightBigIn' => esc_html__('Slide Left', 'dfd-native'),
					'perspectiveUpIn' => esc_html__('Perspective Up', 'dfd-native'),
					'perspectiveDownIn' => esc_html__('Perspective Down', 'dfd-native'),
					'perspectiveLeftIn' => esc_html__('Perspective Right', 'dfd-native'),
					'perspectiveRightIn' => esc_html__('Perspective Left', 'dfd-native')
				],
				'default' => 'fadeIn'
			]
		);

		$this->add_control(
			'list_fields',
			[
				'label' => esc_html__('List of layers', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls()
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$output = $uniqid = $link_css = '';

		$settings = $this->get_settings_for_display();
		
		$uniqid = uniqid('dfd-image-layers-').'-'.rand(1,9999);

		$output .= '<div id="'.esc_attr($uniqid).'" class="dfd-image-layers-wrap dfd-elementor-widget'.(!empty($settings['alignment']) ? ' '.$settings['alignment'] : '').'">';

			$max_val_x = $max_val_y = $nth_child = 0;
			$translate = -100; $translate_step = 100;
			$nth_child_step = 1;
			$animate_delay = - $settings['periodicity'];
			
			foreach($settings['list_fields'] as $fields) {

				$image = $offset_x_css = $offset_y_css = '';

				if(isset($fields['image_id']) && !empty($fields['image_id'])) {
					$animate_delay = $animate_delay + $settings['periodicity'];
					$nth_child = $nth_child_step++;
					$translate = $translate + $translate_step;

					$link_css .= '#'.esc_js($uniqid).' .dfd-layer-container:nth-child('.$nth_child.') .dfd-layer-item {-webkit-transition-delay: '.$animate_delay.'s; -moz-transition-delay: '.$animate_delay.'s; -o-transition-delay: '.$animate_delay.'s; transition-delay: '.$animate_delay.'s;}';
					
					if(!isset($fields['offcet_x']) || empty($fields['offcet_x'])) {
						$fields['offcet_x'] = 0;
					}
					if(!isset($fields['offcet_y']) || empty($fields['offcet_y'])) {
						$fields['offcet_y'] = 0;
					}
					if($fields['offcet_x'] >= 100) {
						$fields['offcet_x'] = 100;
					}
					if($fields['offcet_x'] <= -100) {
						$fields['offcet_x'] = -100;
					}
					if($fields['offcet_y'] >= 100) {
						$fields['offcet_y'] = 100;
					}
					if($fields['offcet_y'] <= -100) {
						$fields['offcet_y'] = -100;
					}

					if( (isset($fields['offcet_x']) && strcmp($fields['offcet_x'], '') != 0) || (isset($fields['offcet_y']) && strcmp($fields['offcet_y'], '') != 0) ) {
						$offset_x_css = '-webkit-transform: translate('.esc_attr($fields['offcet_x']).'%, '.esc_attr($fields['offcet_y']).'%); -moz-transform: translate('.esc_attr($fields['offcet_x']).'%, '.esc_attr($fields['offcet_y']).'%); -o-transform: translate('.esc_attr($fields['offcet_x']).'%, '.esc_attr($fields['offcet_y']).'%); transform: translate('.esc_attr($fields['offcet_x']).'%, '.esc_attr($fields['offcet_y']).'%);';
					}
					$image = wp_get_attachment_image_src($fields['image_id']['id'], 'full');

					if(!$image) {
						$image = array(get_template_directory_uri() . '/assets/images/no_image_resized_120-120.jpg');
						$img_atts = 'alt="'.esc_attr__('No image', 'dfd-native').'" width="" height=""';
					} else {		
						$img_atts = Dfd_Theme_Helpers::get_image_attrs($image[0], $fields['image_id'], $image[1], $image[2], esc_attr__('Layer', 'dfd-native'));
						$img_atts = $img_atts .'width="'.esc_attr($image[1]) . '" height="'.esc_attr($image[2]).'"';
					}

					$output .= '<div class="dfd-layer-container '.esc_attr($fields['layer_animation']).'">';
						$output .= '<div class="dfd-layer-centered" style="'.$offset_x_css.' '.$offset_y_css.'">';
							$output .= '<div class="dfd-layer-item">';
								$output .= '<img src="'.esc_url($image[0]).'" '.$img_atts.' />';
							$output .= '</div>';
						$output .= '</div>';
					$output .= '</div>';
				}
			}

			if(!empty($link_css)) {
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
