<?php

if (!defined('ABSPATH')) {
	exit;
}

class El_Countdown extends \Elementor\Widget_Base {

	public function get_name() {
		return 'el_countdown';
	}

	public function get_title() {
		return esc_html__('DFD Countdown', 'dfd-native');
	}

	public function get_categories() {
		return ['native-category'];
	}

	public function get_icon() {
		return 'dfd_countdown';
	}

	protected function register_controls() {

		$this->start_controls_section(
			'el_countdown',
			[
				'label' => esc_html__('Countdown', 'dfd-native'),
			]
		);

		$this->add_control(
			'main_style',
			[
				'label' => esc_html__('Style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'style-1' => esc_html__('Simple', 'dfd-native'),
					'style-2' => esc_html__('Bordered', 'dfd-native'),
					'style-3' => esc_html__('Bordered number', 'dfd-native')
				],
				'default' => 'style-1'
			]
		);
		
		$this->add_control(
			'datetime',
			[
				'label' => esc_html__('Target time for countdown', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::DATE_TIME,
			]
		);
		
		$this->add_control(
			'count_alignment',
			[
				'label' => esc_html__('Countdown alignment', 'dfd-native'),
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
			'syear',
			[
				'label' => esc_html__('Years', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_control(
			'smonth',
			[
				'label' => esc_html__('Months', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		
		$this->add_control(
			'sday',
			[
				'label' => esc_html__('Days', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		
		$this->add_control(
			'shr',
			[
				'label' => esc_html__('Hours', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		
		$this->add_control(
			'smin',
			[
				'label' => esc_html__('Minutes', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		
		$this->add_control(
			'ssec',
			[
				'label' => esc_html__('Seconds', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		
		$this->add_control(
			'delimeter_val',
			[
				'label' => esc_html__('Delimeter value', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .style-2 .dfd-countdown-wrap .number-wrap:before, {{WRAPPER}} .style-3 .dfd-countdown-wrap .number-container:before'
			]
		);
		
		$this->add_control(
			'border_radius',
			[
				'label' => esc_html__('Border radius', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER
			]
		);
		
		$this->add_control(
			'bg_count_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Background', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1
				]
			]
		);
		
		$this->add_control(
			'number_font_size',
			[
				'label' => esc_html__('Font size', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'selectors' => [
					'{{WRAPPER}} .number' => 'font-size: {{SCHEME}}px;'
				]
			]
		);
		
		$this->add_control(
			'number_font_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1
				]
			]
		);
		
		$this->add_control(
			'font_options',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Delimeter color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1
				]
			]
		);
		
		$this->add_control(
			'time_units_font_size',
			[
				'label' => esc_html__('Time unit font size', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'selectors' => [
					'{{WRAPPER}} .period' => 'font-size: {{SCHEME}}px;'
				]
			]
		);
		
		$this->add_control(
			'time_units_font_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Time unit color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1
				]
			]
		);
		
		$this->end_controls_section();
	}

	protected function render() {

		$datetime = $el_class = $output = $count_frmt = $uniq_id = $dot_html = $link_css = $thumb_size = '';

		$settings = $this->get_settings_for_display();

		$uniq_id = uniqid('countdown-') . '-' . rand(1, 9999);

		if (isset($settings['count_alignment']) && !empty($settings['count_alignment'])) {
			$el_class .= ' ' . $settings['count_alignment'];
		}
		
		$datetime = str_replace("/", ".", $settings['datetime']);
		$unix_number = strtotime($settings['datetime']);
		$echo_date = date("Y/m/d H:i:s", $unix_number);

		if (isset($settings['delimeter_val']) && !empty($settings['delimeter_val'])) {
			$dot_html = '<span class="dot">' . esc_html($settings['delimeter_val']) . '</span>';
		}

		if (isset($settings['font_options']) && !empty($settings['font_options'])) {
			$link_css .= '#' . esc_js($uniq_id) . ' .dot {color: ' . esc_attr($settings['font_options']) . ';}';
		}
		if (isset($settings['time_units_font_color']) && !empty($settings['time_units_font_color'])) {
			$link_css .= '#' . esc_js($uniq_id) . ' .period {color: ' . esc_attr($settings['time_units_font_color']) . ';}';
		}
		if (isset($settings['time_units_font_size']) && !empty($settings['time_units_font_size'])) {
			$link_css .= '#' . esc_js($uniq_id) . ' .period {font-size: ' . esc_attr($settings['time_units_font_size']) . 'px;}';
		}
		if(!empty($settings['border_radius'])) {
			$link_css .= '.style-2 #'.esc_js($uniq_id).'.dfd-countdown-wrap .number-wrap:before, .style-3 #'.esc_js($uniq_id).'.dfd-countdown-wrap .number-container:before {border-radius: '.esc_attr($settings['border_radius']).'px;}';
		}
		if (isset($settings['bg_count_color']) && !empty($settings['bg_count_color'])) {
			$link_css .= '.style-2 #' . esc_js($uniq_id) . ' .number-wrap:before, .style-3 #' . esc_js($uniq_id) . ' .number-container:before {background: ' . esc_attr($settings['bg_count_color']) . ';}';
		}
		if (isset($settings['number_font_size']) && !empty($settings['number_font_size'])) {
			$link_css .= '#' . esc_js($uniq_id) . ' .number-wrap .number, #' . esc_js($uniq_id) . ' .dot {font-size: ' . esc_attr($settings['number_font_size']) . 'px;}';
			$thumb_size = esc_attr($settings['number_font_size']) * 2;
			$link_css .= '.style-3 #' . esc_js($uniq_id) . ' .number, .style-2 #' . esc_js($uniq_id) . ' .number-wrap {min-width: ' . esc_attr($thumb_size) . 'px; height: ' . esc_attr($thumb_size) . 'px;}';
			$link_css .= '.style-3 #' . esc_js($uniq_id) . ' .number, .style-3 #' . esc_js($uniq_id) . ' .dot {line-height: ' . $thumb_size . 'px;}';
		}
		if (isset($settings['number_font_color']) && !empty($settings['number_font_color'])) {
			$link_css .= '#' . esc_js($uniq_id) . ' .number-wrap .number {color: ' . esc_attr($settings['number_font_color']) . ';}';
		}

		if ($settings['syear'] != '') {
			$count_frmt .= '<span class="number-wrap">';
			$count_frmt .= '<span class="number-container"><span class="number">%-Y</span></span>';
			$count_frmt .= '<span class="period">' . esc_html__('Years', 'dfd-native') . '</span>';
			$count_frmt .= '</span>';
			$count_frmt .= $dot_html;
		}
		if ($settings['smonth'] != '' && $settings['syear'] != '') {
			$count_frmt .= '<span class="number-wrap">';
			$count_frmt .= '<span class="number-container"><span class="number">%-z</span></span>';
			$count_frmt .= '<span class="period">' . esc_html__('Months', 'dfd-native') . '</span>';
			$count_frmt .= '</span>';
			$count_frmt .= $dot_html;
		} elseif ($settings['smonth'] != '' && $settings['syear'] === '') {
			$count_frmt .= '<span class="number-wrap">';
			$count_frmt .= '<span class="number-container"><span class="number">%-m</span></span>';
			$count_frmt .= '<span class="period">' . esc_html__('Months', 'dfd-native') . '</span>';
			$count_frmt .= '</span>';
			$count_frmt .= $dot_html;
		}
		if ($settings['sday'] != '' && $settings['smonth'] != '') {
			$count_frmt .= '<span class="number-wrap">';
			$count_frmt .= '<span class="number-container"><span class="number">%-n</span></span>';
			$count_frmt .= '<span class="period">' . esc_html__('Days', 'dfd-native') . '</span>';
			$count_frmt .= '</span>';
			$count_frmt .= $dot_html;
		} elseif ($settings['sday'] != '' && $settings['smonth'] === '') {
			$count_frmt .= '<span class="number-wrap">';
			$count_frmt .= '<span class="number-container"><span class="number">%-D</span></span>';
			$count_frmt .= '<span class="period">' . esc_html__('Days', 'dfd-native') . '</span>';
			$count_frmt .= '</span>';
			$count_frmt .= $dot_html;
		}
		if ($settings['shr'] != '') {
			$count_frmt .= '<span class="number-wrap">';
			$count_frmt .= '<span class="number-container"><span class="number">%-H</span></span>';
			$count_frmt .= '<span class="period">' . esc_html__('Hours', 'dfd-native') . '</span>';
			$count_frmt .= '</span>';
			$count_frmt .= $dot_html;
		}
		if ($settings['smin'] != '') {
			$count_frmt .= '<span class="number-wrap">';
			$count_frmt .= '<span class="number-container"><span class="number">%-M</span></span>';
			$count_frmt .= '<span class="period">' . esc_html__('Minutes', 'dfd-native') . '</span>';
			$count_frmt .= '</span>';
			$count_frmt .= $dot_html;
		}
		if ($settings['ssec'] != '') {
			$count_frmt .= '<span class="number-wrap">';
			$count_frmt .= '<span class="number-container"><span class="number">%-S</span></span>';
			$count_frmt .= '<span class="period">' . esc_html__('Seconds', 'dfd-native') . '</span>';
			$count_frmt .= '</span>';
			$count_frmt .= $dot_html;
		}

		$output .= '<div class="dfd-countdown ' . esc_attr($settings['main_style']) . ' ' . esc_attr($el_class) . '">';
			if ($datetime != '') {
				$output .= '<div id="' . esc_attr($uniq_id) . '" class="dfd-countdown-wrap" data-date="' . esc_attr($echo_date) . '" data-finish-text="' . esc_attr__('Event already pass', 'dfd-native') . '">';
					$output .= '<div class="hide dfd-countdown-html">' . wp_kses($count_frmt, array('span' => array('class' => array()))) . '</div>';
				$output .= '</div>';
			}

			if (!empty($link_css)) {
				$output .= '<script type="text/javascript">'
								. '(function($) {'
									. '$("head").append("<style>' . $link_css . '</style>");'
								. '})(jQuery);'
							. '</script>';
			}
		$output .= '</div>';

		echo $output;
	}

}
