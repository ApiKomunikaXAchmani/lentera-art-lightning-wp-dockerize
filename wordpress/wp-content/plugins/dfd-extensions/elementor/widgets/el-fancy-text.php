<?php

if (!defined('ABSPATH')) {
	exit;
}

class El_Fancy_Text extends \Elementor\Widget_Base {

	public function get_name() {
		return 'el_fancy_text';
	}

	public function get_title() {
		return esc_html__('DFD Animated text', 'dfd-native');
	}

	public function get_categories() {
		return ['native-category'];
	}

	public function get_icon() {
		return 'dfd_animated_text';
	}

	protected function register_controls() {

		$this->start_controls_section(
			'el_fancy_text',
			[
				'label' => esc_html__('Animated text', 'dfd-native'),
			]
		);
		$this->add_control(
			'style',
			[
				'label' => esc_html__('Style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'typed' => esc_html__('Typing', 'dfd-native'),
					'chaffle' => esc_html__('Shuffle', 'dfd-native'),
					'changethewords' => esc_html__('Words changing', 'dfd-native')
				],
				'default' => 'typed'
			]
		);
		$this->add_control(
			'alignment',
			[
				'label' => esc_html__('Alignment', 'dfd-native'),
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
				'default' => 'text-left',
			]
		);
		$this->add_control(
			'type_speed',
			[
				'label' => esc_html__('Typing speed', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER
			]
		);
		$this->add_control(
			'onchange_animation',
			[
				'label' => esc_html__('Words animation in', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'bounceIn' => esc_html__('BounceIn', 'dfd-native'),
					'bounceInDown' => esc_html__('BounceInDown', 'dfd-native'),
					'bounceInLeft' => esc_html__('BounceInLeft', 'dfd-native'),
					'bounceInRight' => esc_html__('BounceInRight', 'dfd-native'),
					'bounceInUp' => esc_html__('BounceInUp', 'dfd-native'),
					'fadeIn' => esc_html__('FadeIn', 'dfd-native'),
					'fadeInDown' => esc_html__('FadeInDown', 'dfd-native'),
					'fadeInDownBig' => esc_html__('FadeInDownBig', 'dfd-native'),
					'fadeInLeft' => esc_html__('FadeInLeft', 'dfd-native'),
					'fadeInLeftBig' => esc_html__('FadeInLeftBig', 'dfd-native'),
					'fadeInRight' => esc_html__('FadeInRight', 'dfd-native'),
					'fadeInRightBig' => esc_html__('FadeInRightBig', 'dfd-native'),
					'fadeInUp' => esc_html__('FadeInUp', 'dfd-native'),
					'fadeInUpBig' => esc_html__('FadeInUpBig', 'dfd-native'),
					'lightSpeedIn' => esc_html__('LightSpeedIn', 'dfd-native'),
					'rotateIn' => esc_html__('RotateIn', 'dfd-native'),
					'rotateInDownLeft' => esc_html__('RotateInDownLeft', 'dfd-native'),
					'rotateInDownRight' => esc_html__('RotateInDownRight', 'dfd-native'),
					'rotateInUpLeft' => esc_html__('RotateInUpLeft', 'dfd-native'),
					'rotateInUpRight' => esc_html__('RotateInUpRight', 'dfd-native'),
					'rollIn' => esc_html__('RollIn', 'dfd-native'),
					'zoomIn' => esc_html__('ZoomIn', 'dfd-native'),
					'zoomInDown' => esc_html__('ZoomInDown', 'dfd-native'),
					'zoomInLeft' => esc_html__('ZoomInLeft', 'dfd-native'),
					'zoomInRight' => esc_html__('ZoomInRight', 'dfd-native'),
					'zoomInUp' => esc_html__('ZoomInUp', 'dfd-native'),
					'slideInDown' => esc_html__('SlideInDown', 'dfd-native'),
					'slideInLeft' => esc_html__('SlideInLeft', 'dfd-native'),
					'slideInRight' => esc_html__('SlideInRight', 'dfd-native'),
					'slideInUp' => esc_html__('SlideInUp', 'dfd-native')
				],
				'condition' => [
					'style' => 'changethewords'
				],
				'default' => 'bounceOut'
			]
		);
		$this->add_control(
			'afterchange_animation',
			[
				'label' => esc_html__('Words animation out', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'bounceOut' => esc_html__('Bounce Out', 'dfd-native'),
					'bounceOutDown' => esc_html__('Bounce Out Down', 'dfd-native'),
					'bounceOutLeft' => esc_html__('Bounce Out Left', 'dfd-native'),
					'bounceOutRight' => esc_html__('Bounce Out Right', 'dfd-native'),
					'bounceOutUp' => esc_html__('Bounce Out Up', 'dfd-native'),
					'fadeOut' => esc_html__('Fade Out', 'dfd-native'),
					'fadeOutDown' => esc_html__('Fade Out Down', 'dfd-native'),
					'fadeOutDownBig' => esc_html__('Fade Out Down Big', 'dfd-native'),
					'fadeOutLeft' => esc_html__('Fade Out Left', 'dfd-native'),
					'fadeOutLeftBig' => esc_html__('Fade Out Left Big', 'dfd-native'),
					'fadeOutRight' => esc_html__('Fade Out Right', 'dfd-native'),
					'fadeOutRightBig' => esc_html__('Fade Out Right Big', 'dfd-native'),
					'fadeOutUp' => esc_html__('Fade Out Up', 'dfd-native'),
					'fadeOutUpBig' => esc_html__('Fade Out Up Big', 'dfd-native'),
					'lightSpeedOut' => esc_html__('Light Speed Out', 'dfd-native'),
					'rotateOut' => esc_html__('Rotate Out', 'dfd-native'),
					'rotateOutDownLeft' => esc_html__('Rotate Out Down Left', 'dfd-native'),
					'rotateOutDownRight' => esc_html__('Rotate Out Down Right', 'dfd-native'),
					'rotateOutUpRight' => esc_html__('Rotate Out Up Right', 'dfd-native'),
					'rollOut' => esc_html__('Roll Out', 'dfd-native'),
					'zoomOut' => esc_html__('Zoom Out', 'dfd-native'),
					'zoomOutDown' => esc_html__('Zoom Out Down', 'dfd-native'),
					'zoomOutLeft' => esc_html__('Zoom Out Left', 'dfd-native'),
					'zoomOutRight' => esc_html__('Zoom Out Right', 'dfd-native'),
					'zoomOutUp' => esc_html__('Zoom Out Up', 'dfd-native'),
					'slideOutDown' => esc_html__('Slide Out Down', 'dfd-native'),
					'slideOutLeft' => esc_html__('Slide Out Left', 'dfd-native'),
					'slideOutRight' => esc_html__('Slide Out Right', 'dfd-native'),
					'slideOutUp' => esc_html__('Slide Out Up', 'dfd-native')
				],
				'condition' => [
					'style' => 'changethewords'
				],
				'default' => 'bounceOut'
			]
		);
		$this->add_control(
			'loop',
			[
				'label' => esc_html__('Loop', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'style' => 'typed'
				]
			]
		);
		$this->add_control(
			'cursor',
			[
				'label' => esc_html__('Cursor', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'style' => 'typed'
				]
			]
		);
		$this->add_control(
			'prefix',
			[
				'label' => esc_html__('Prefix', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'text_field',
			[
				'label' => esc_html__('Single string', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);
		$repeater->add_control(
			'string_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('String color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				]
			]
		);
		$repeater->add_control(
			'text_field_background',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('String background', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'default' => 'transparent'
			]
		);
		$this->add_control(
			'text_fields',
			[
				'label' => esc_html__('Animated text string', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls()
			]
		);
		$this->add_control(
			'postfix',
			[
				'label' => esc_html__('Postfix', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'color_set',
			[
				'label' => esc_html__('Color settings', 'dfd-native'),
			]
		);
		$this->add_control(
			'prefix_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Prefix color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .dfd-anim-prefix' => 'color: {{SCHEME}};'
				]
			]
		);
		$this->add_control(
			'postfix_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Postfix color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .dfd-anim-postfix' => 'color: {{SCHEME}};'
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
			'prefix_html_tag',
			[
				'label' => esc_html__('Prefix HTML Tag', 'elementor'),
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
				'name' => 'style-prefix-typography',
				'label' => esc_html__('Prefix typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .dfd-anim-prefix',
			]
		);

		$this->add_control(
			'postfix_html_tag',
			[
				'label' => esc_html__('Postfix HTML Tag', 'elementor'),
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
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'style-postfix-typography',
				'label' => esc_html__('Postfix typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .dfd-anim-postfix',
			]
		);
		$this->add_control(
			'string_html_tag',
			[
				'label' => esc_html__('String HTML Tag', 'elementor'),
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
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'style-string-typography',
				'label' => esc_html__('String typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .dfd-animated-text-wrap .dfd-animated-text-block span.dfd-animate-text span, {{WRAPPER}}.dfd-animated-text-wrap .dfd-animated-text-block span.dfd-animate-me, {{WRAPPER}} .dfd-animate-me',
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$html = $el_class = $animated_text = $css_rules = $data_atts = '';
		
		$settings = $this->get_settings_for_display();

		if (!isset($settings['style']) || $settings['style'] == '') {
			$settings['style'] = 'typed';
		}

		$uniqid = uniqid('dfd-animated-text-') . '-' . rand(1, 9999);

		if ($settings['alignment'] != '') {
			$el_class .= ' '.$settings['alignment'];
		}

		if ($settings['prefix_color'] != '') {
			$css_rules .= '#' . esc_js($uniqid) . '.dfd-animated-text-wrap .dfd-animated-text-block span.dfd-anim-prefix {color: ' . esc_js($settings['prefix_color']) . '}';
		}

		if ($settings['postfix_color'] != '') {
			$css_rules .= '#' . esc_js($uniqid) . '.dfd-animated-text-wrap .dfd-animated-text-block span.dfd-anim-postfix {color: ' . esc_js($settings['postfix_color']) . '}';
		}

		if ($settings['type_speed'] == '') {
			$settings['type_speed'] = 10;
		}

		switch ($settings['style']) {
			case 'typed':
				global $dfd_native;

				if (isset($dfd_native['dev_mode']) && $dfd_native['dev_mode'] == 'on' && defined('DFD_DEBUG_MODE') && DFD_DEBUG_MODE) {
					wp_enqueue_script('dfd-typed');
				}

				$data_atts .= ' data-speed="' . esc_attr($settings['type_speed']) . '"';

				if ($settings['cursor'] == 'yes') {
					$data_atts .= ' data-cursor="1"';
				}

				if ($settings['loop'] == 'yes') {
					$data_atts .= ' data-loop="1"';
				}
				break;

			case 'chaffle':
				$data_atts .= ' data-speed="' . esc_attr($settings['type_speed'] * 1000) . '"';
				break;
			case 'changethewords':
				$data_atts .= ' data-speed="' . esc_attr($settings['type_speed'] * 1000) . '"';
				$data_atts .= ' data-onchange="' . esc_attr($settings['onchange_animation']) . '"';
				$data_atts .= ' data-afterchange="' . esc_attr($settings['afterchange_animation']) . '"';
				break;
		}

		/* Animated text */
		if (!empty($settings['text_fields'])) {
			$i = 1;
			foreach ($settings['text_fields'] as $field) {
				$single_field_css = '';
				if (isset($field['string_color'])) {
					$single_field_css .= 'color: ' . esc_attr($field['string_color']) . ';';
				}
				if (isset($field['text_field_background'])) {
					$single_field_css .= 'background: ' . esc_attr($field['text_field_background']) . '; padding: 0 10px .1em;';
				}
				if (isset($field['text_field'])) {
					$animated_text .= '<span class="dfd-animated-text-string ' . esc_attr($settings['style']) . '" data-remove-hover="true" data-lang="en" data-load="onload" data-speed="' . esc_attr($settings['type_speed'] * 10) . '" data-id="' . esc_attr($i) . '" style="' . $single_field_css . '">' . strip_tags($field['text_field'], '<br></br>') . '</span>';
				}
				$i++;
			}
			$animated_text = '<span class="dfd-animate-text">' . $animated_text . '</span>';

			if ($settings['style'] == 'typed') {
				$animated_text .= '<span class="dfd-animate-me"></span>';
			}
		}

		$el_class .= ' style-' . $settings['style'];

		$html .= '<div class="dfd-animated-text-wrap" id="' . esc_attr($uniqid) . '">';

		$html .= '<div class="dfd-animated-text-block ' . esc_attr($el_class) . '" ' . $data_atts . '>';
		if ($settings['prefix'] != '') {
			$html .= '<span class="dfd-anim-prefix">' . strip_tags($settings['prefix'], '<br></br>') . '</span>';
		}

		$html .= $animated_text;

		if ($settings['postfix'] != '') {
			$html .= '<span class="dfd-anim-postfix">' . strip_tags($settings['postfix'], '<br></br>') . '</span>';
		}

		$html .= '</div>';

		if ($css_rules != '') {
			$html .= '<script type="text/javascript">'
				. '(function($) {'
				. '$("head").append("<style>' . $css_rules . '</style>");'
				. '})(jQuery);'
				. '</script>';
		}

		$html .= '</div>';

		echo $html;
	}

}
