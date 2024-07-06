<?php

if (!defined('ABSPATH')) {
	exit;
}

class El_Progress_Bar extends \Elementor\Widget_Base {

	public function get_name() {
		return 'el_progress_bar';
	}

	public function get_title() {
		return esc_html__('DFD Progress bar', 'dfd-native');
	}

	public function get_categories() {
		return ['native-category'];
	}

	public function get_icon() {
		return 'dfd_progressbar';
	}

	protected function register_controls() {

		$this->start_controls_section(
			'el_progress_bar',
			[
				'label' => esc_html__('Progress bar', 'dfd-native'),
			]
		);
		
		$this->add_control(
			'main_layout',
			[
				'label' => esc_html__('Style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'layout-1' => esc_html__('Simple', 'dfd-native'),
					'layout-2' => esc_html__('Underlined', 'dfd-native'),
					'layout-3' => esc_html__('Info inside', 'dfd-native')
				],
				'default' => 'layout-1'
			]
		);
		
		$this->add_control(
			'percent',
			[
				'label' => esc_html__('Progress value', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER
			]
		);
		
		$this->add_control(
			'enable_icon',
			[
				'label' => esc_html__('Icon', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		
		$this->add_control(
			'ic_dfd_icons',
			[
				'label' => esc_html__('Select Icon', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'dfd-socicon-film-strip-with-two-photograms',
					'library' => 'dfd_icons'
				],
				'condition' => [
					'enable_icon' => 'yes'
				]
			]
		);
		
		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__('Size', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'enable_icon' => 'yes'
				],
				'min' => 1,
				'max' => 25,
				'step' => 1,
				'selectors' => [
					'{{WRAPPER}} .featured-icon' => 'font-size: {{SCHEME}}px;'
				],
			]
		);
		
		$this->add_control(
			'icon_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .featured-icon' => 'color: {{SCHEME}};'
				],
				'condition' => [
					'enable_icon' => 'yes'
				]
			]
		);
		
		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);
		
		$this->add_control(
			'text_position',
			[
				'label' => esc_html__('Title position', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'top' => esc_html__('Top', 'dfd-native'),
					'bottom' => esc_html__('Bottom', 'dfd-native')
				],
				'default' => 'top',
				'condition' => [
					'main_layout' => ['layout-1', 'layout-2']
				]
			]
		);
		
		$this->add_control(
			'height_progress_line_style_1',
			[
				'label' => esc_html__('Progress line height', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'main_layout' => 'layout-1'
				]
			]
		);
		
		$this->add_control(
			'height_progress_line_style_2',
			[
				'label' => esc_html__('Progress line height', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'main_layout' => 'layout-2'
				]
			]
		);
		
		$this->add_control(
			'height_progress_line_style_3',
			[
				'label' => esc_html__('Progress line height', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'main_layout' => 'layout-3'
				]
			]
		);
		
		$this->add_control(
			'title_percents_left',
			[
				'label' => esc_html__('Percents near the title', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'main_layout' => ['layout-2', 'layout-3']
				]
			]
		);
		
		$this->add_control(
			'animate_progress',
			[
				'label' => esc_html__('Progress animation', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		
		$this->add_control(
			'slanting_lines_decoration',
			[
				'label' => esc_html__('Slanting lines decoration', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		
		$this->add_control(
			'animate_lines',
			[
				'label' => esc_html__('Lines animation', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'slanting_lines_decoration' => 'yes'
				]
			]
		);
		
		$this->add_control(
			'title_percent_position',
			[
				'label' => esc_html__('Title & percents position', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'percents-center' => esc_html__('Title left, percents at the end of progress line', 'dfd-native'),
					'percents-left' => esc_html__('Title and percents on the left', 'dfd-native'),
					'percents-right' => esc_html__('Title left, percents right', 'dfd-native'),
				],
				'default' => 'percents-center',
				'condition' => [
					'main_layout' => ['layout-3']
				]
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'progress_l_heading',
			[
				'label' => esc_html__('Progress line color', 'dfd-native'),
			]
		);
		
		$this->add_control(
			'background_style',
			[
				'label' => esc_html__('Background style', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'solid_background' => esc_html__('Solid', 'dfd-native'),
					'gradient_background' => esc_html__('Gradient', 'dfd-native')
				],
				'default' => 'solid_background'
			]
		);
		
		$this->add_control(
			'progress_background_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Background', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .meter' => 'background: {{SCHEME}};'
				],
				'condition' => [
					'background_style' => 'solid_background'
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'progress_background_gradient',
				'label' => esc_html__('Background', 'plugin-name'),
				'types' => ['gradient'],
				'selector' => '{{WRAPPER}} .meter',
				'condition' => [
					'background_style' => 'gradient_background'
				]
			]
		);
		
		$this->add_control(
			'back_line_background',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Back line background', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'separator' => 'before'
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'show_label' => 'true',
				'label' => esc_html__('Back line border', 'dfd-native'),
				'selector' => '{{WRAPPER}} .meter-decoration',
			]
		);
		
		$this->add_control(
			'border_radius',
			[
				'label' => esc_html__('Border radius', 'dfd-native'),
				'type' => \Elementor\Controls_Manager::NUMBER
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
					'p' => 'p',
				],
				'default' => 'div',
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'style-title-typography',
				'label' => esc_html__('Title typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .progressbar-title',
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
				'selectors' => [
					'{{WRAPPER}} .progressbar-title' => 'color: {{SCHEME}};'
				]
			]
		);
		
		$this->add_control(
			'number_html_tag',
			[
				'label' => esc_html__('Number HTML Tag', 'elementor'),
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
				'name' => 'style-number-typography',
				'label' => esc_html__('Number typography', 'dfd-native'),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .progressbar-number',
			]
		);
		
		$this->add_control(
			'number_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => esc_html__('Number color', 'dfd-native'),
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .progressbar-number' => 'color: {{SCHEME}};'
				]
			]
		);
	}

	protected function render() {

		$uniqid = $progress_background_gradient = $content_html = $output = $progress_style = '';
		$el_class = $link_css = $title_html = $progress_anim_data = $percent_position = $icon_html = '';

		$settings = $this->get_settings_for_display();

		$uniqid = uniqid('dfd-progress-') . '-' . rand(1, 9999);

		if (isset($settings['animate_progress']) && strcmp($settings['animate_progress'], '') !== 0) {
			$el_class .= ' no-animation';
			$progress_style = 'style="width: ' . esc_attr(intval($settings['percent'])) . '%;"';
		}
		if ('0' !== $settings['percent']) {
			$progress_anim_data = ' data-percentage-value="' . esc_attr(intval($settings['percent'])) . '"';
			$percent_position = 100 - esc_attr(intval($settings['percent']));
		}
		if (isset($settings['title_percents_left']) && strcmp($settings['title_percents_left'], 'percents_left') === 0) {
			$el_class .= ' title-percents-left';
		}
		if (isset($settings['slanting_lines_decoration']) && strcmp($settings['slanting_lines_decoration'], 'yes') === 0) {
			$el_class .= ' lines-decoration';
		}
		if (isset($settings['animate_lines']) && strcmp($settings['animate_lines'], 'yes') === 0) {
			$el_class .= ' move-lines';
		}
		if (isset($settings['main_layout']) && strcmp($settings['main_layout'], 'layout-3') === 0) {
			$el_class .= ' ' . esc_attr($settings['title_percent_position']);
			if (isset($settings['title_percent_position']) && strcmp($settings['title_percent_position'], 'percents-center') === 0) {
				if (is_rtl()) {
					$link_css .= '#' . esc_js($uniqid) . ' .title-wrap .progressbar-number {left: ' . esc_attr($percent_position) . '%;}';
				} else {
					$link_css .= '#' . esc_js($uniqid) . ' .title-wrap .progressbar-number {right: ' . esc_attr($percent_position) . '%;}';
				}
			}
		}
		if (isset($settings['height_progress_line_style_1']) && !empty($settings['height_progress_line_style_1'])) {
			$link_css .= '#' . esc_js($uniqid) . '.layout-1 .progress-bar-line {height: ' . esc_attr($settings['height_progress_line_style_1']) . 'px;}';
		}
		if (isset($settings['height_progress_line_style_2']) && !empty($settings['height_progress_line_style_2'])) {
			$link_css .= '#' . esc_js($uniqid) . '.layout-2 .progress-bar-line {height: ' . esc_attr($settings['height_progress_line_style_2']) . 'px;}';
		}
		if (isset($settings['height_progress_line_style_3']) && !empty($settings['height_progress_line_style_3'])) {
			$link_css .= '#' . esc_js($uniqid) . '.layout-3 {height: ' . esc_attr($settings['height_progress_line_style_3']) . 'px; line-height: ' . esc_attr($settings['height_progress_line_style_3']) . 'px;}';
		}
		if (isset($settings['back_line_background']) && !empty($settings['back_line_background'])) {
			$link_css .= '#' . esc_js($uniqid) . '.layout-1 .progress-bar-line .meter-decoration, #' . esc_js($uniqid) . '.layout-3 .progress-bar-line .meter-decoration, #' . esc_js($uniqid) . '.layout-2 .progress-bar-line .meter-decoration:before {background: ' . esc_attr($settings['back_line_background']) . ';}';
		}

		if ($settings['border_radius'] != '') {
			$link_css .= '#' . esc_js($uniqid) . '.layout-1 .progress-bar-line, #' . esc_js($uniqid) . '{border-radius:' . $settings['border_radius'] . 'px}';
		}

		if (isset($settings['progress_background_color']) && !empty($settings['progress_background_color'])) {
			$link_css .= '#' . esc_js($uniqid) . ' .progress-bar-line .meter {background: ' . esc_attr($settings['progress_background_color']) . ';}';
		}
		if (isset($settings['progress_background_gradient']) && !empty($settings['progress_background_gradient'])) {
			$progress_background_gradient = Dfd_Gradient_Param::gradient_css($progress_background_gradient);
			$link_css .= '#' . esc_js($uniqid) . ' .progress-bar-line .meter {' . esc_attr($progress_background_gradient) . '}';
		}
		if (isset($settings['enable_icon']) && strcmp($settings['enable_icon'], 'yes') == 0) {
			$el_class .= ' enable-icon';
			$settings['icon_type'] = 'selector';
			$icon_html = dfd_elementor_icon_render($settings, $settings['icon_size']);
		}

		$title_html .= '<div class="title-wrap">';
			if (isset($settings['title']) && !empty($settings['title']) || !empty($icon_html)) {
				$title_html .= '<' . $settings['title_html_tag'] . ' class="progressbar-title">' . $icon_html . '' . esc_html($settings['title']) . '</' . $settings['title_html_tag'] . '>';
			}
			$title_html .= '<' . $settings['number_html_tag'] . ' class="progressbar-number">' . $settings['percent'] . '<span>%</span></' . $settings['number_html_tag'] . '>';
		$title_html .= '</div>';

		$content_html .= '<div class="progress-bar-line">';
			$content_html .= '<div class="meter-decoration"></div>';
			$content_html .= '<div class="meter" ' . $progress_anim_data . ' ' . $progress_style . '></div>';
		$content_html .= '</div>';

		$output .= '<div id="' . esc_js($uniqid) . '" class="dfd-progressbar ' . esc_attr($settings['main_layout']) . ' text-' . esc_attr($settings['text_position']) . ' ' . esc_attr($el_class) . '" >';
			if ('top' === $settings['text_position'] || $settings['main_layout'] == 'layout-3') {
				$output .= $title_html;
				$output .= $content_html;
			} else {
				$output .= $content_html;
				$output .= $title_html;
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
