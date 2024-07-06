<?php

if (!defined('ABSPATH')) {
    exit;
}

class El_Piechart extends \Elementor\Widget_Base {

    public function get_name() {
        return 'el_piechart';
    }

    public function get_title() {
        return esc_html__('DFD Piechart', 'dfd-native');
    }

    public function get_categories() {
        return ['native-category'];
    }

    public function get_icon() {
        return 'dfd_piecharts';
    }

    protected function register_controls() {

        $this->start_controls_section(
            'el_piechart',
            [
                'label' => esc_html__('Piechart', 'dfd-native'),
            ]
        );
        $this->add_control(
            'main_style',
            [
                'label' => esc_html__('Style', 'dfd-native'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'style-1' => esc_html__('Simple', 'dfd-native'),
                    'style-2' => esc_html__('Icon inside', 'dfd-native'),
                    'style-3' => esc_html__('Icon near title', 'dfd-native'),
                    'style-4' => esc_html__('Number near title', 'dfd-native'),
                ],
                'default' => 'style-1',
            ]
        );
        $this->add_control(
            'percent',
            [
                'label' => esc_html__('Number', 'dfd-native'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'range' => [
                    'min' => 1,
                    'max' => 100,
                ],
                'default' => '75'
            ]
        );
        $this->add_control(
            'unit',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => esc_html__('Measuring unit', 'dfd-native'),
            ]
        );
        $this->add_control(
            'size',
            [
                'label' => esc_html__('Circle size', 'dfd-native'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => '160'
            ]
        );
        $this->add_control(
            'animation_off',
            [
                'label' => esc_html__('Circle animation', 'dfd-native'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no'
            ]
        );
        $this->add_control(
            'clock_wise',
            [
                'label' => esc_html__('Anticlockwise', 'dfd-native'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no'
            ]
        );
        $this->add_control(
            'title',
            [
                'separator' => 'before',
                'label' => esc_html__('Title', 'dfd-native'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'dfd-native'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );
        $this->add_control(
            'icon_type',
            [
                'label' => esc_html__('Icon to display', 'dfd-native'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'selector' => esc_html__('Icon', 'dfd-native'),
                    'custom' => esc_html__('Image', 'dfd-native'),
                    'text' => esc_html__('Text', 'dfd-native')
                ],
                'condition' => [
                    'main_style' => ['style-2','style-3','style-4']
                ],
                'default' => 'selector'
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
                    'icon_type' => 'selector',
                    'main_style' => ['style-2','style-3','style-4']
                ]
            ]
        );
        $this->add_control(
            'icon_image_id',
            [
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label' => esc_html__('Upload Image', 'dfd-native'),
                'condition' => [
                    'icon_type' => 'custom',
                    'main_style' => ['style-2','style-3','style-4']
                ]
            ]
        );
        $this->add_control(
            'icon_text',
            [
                'label' => esc_html__('Text', 'dfd-native'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'icon_type' => 'text',
                    'main_style' => ['style-2','style-3','style-4']
                ]
            ]
        );
        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__('Size', 'dfd-native'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'condition' => [
                    'icon_type' => ['selector', 'custom'],
                    'main_style' => ['style-2','style-3','style-4']
                ],
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
                'description' => esc_html__('The default color is #e7e7e7', 'dfd-native'),
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .featured-icon' => 'color: {{SCHEME}};'
                ],
                'condition' => [
                    'icon_type' => 'selector',
                    'main_style' => ['style-2','style-3','style-4']
                ]
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'circle_heading',
            [
                'label' => esc_html__('Circle gradient', 'dfd-native'),
            ]
        );
        $this->add_control(
            'fill_color_start',
            [
                'type' => \Elementor\Controls_Manager::COLOR,
                'label' => esc_html__('Start color', 'dfd-native'),
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .dfd-content-title-big' => 'color: {{SCHEME}};'
                ]
            ]
        );
        $this->add_control(
            'fill_color_end',
            [
                'type' => \Elementor\Controls_Manager::COLOR,
                'label' => esc_html__('End color', 'dfd-native'),
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .dfd-content-title-big' => 'color: {{SCHEME}};'
                ]
            ]
        );
        $this->add_control(
            'fill_width',
            [
                'label' => esc_html__('Width', 'dfd-native'),
                'type' => \Elementor\Controls_Manager::NUMBER,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'border_heading',
            [
                'label' => esc_html__('Border style', 'dfd-native'),
            ]
        );
        $this->add_control(
            'bg_border_color',
            [
                'type' => \Elementor\Controls_Manager::COLOR,
                'label' => esc_html__('Color', 'dfd-native'),
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .dfd-content-title-big' => 'color: {{SCHEME}};'
                ]
            ]
        );
        $this->add_control(
            'bg_width',
            [
                'label' => esc_html__('Width', 'dfd-native'),
                'type' => \Elementor\Controls_Manager::NUMBER,
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
                    '{{WRAPPER}} .pichart-title' => 'color: {{SCHEME}};'
                ]
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style-title-typography',
                'label' => esc_html__('Title typography', 'dfd-native'),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .pichart-title',
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
                    'p' => 'p',
                ],
                'default' => 'div',
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
                    '{{WRAPPER}} .pichart-subtitle' => 'color: {{SCHEME}};'
                ]
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style-subtitle-typography',
                'label' => esc_html__('Subtitle typography', 'dfd-native'),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .pichart-subtitle',
            ]
        );
        $this->add_control(
            'content_html_tag',
            [
                'label' => esc_html__('Content HTML Tag', 'elementor'),
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
                'name' => 'content_t_heading',
                'label' => esc_html__('Content typography', 'dfd-native'),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .piecharts-number',
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
                    '{{WRAPPER}} .piecharts-number' => 'color: {{SCHEME}};'
                ]
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {

        $el_class = $percent = $size = $echo_number = '';
        $title_html = $subtitle_html = '';
        $uniqid = $output = $icon_html = $link_css = $select_icon = $ic_dfd_icons = '';
        $value = $fill_color_start = $fill_color_end = $atts = $data_attr = '';

        $settings = $this->get_settings_for_display();

        $uniqid = uniqid('dfd-piecharts-') . '-' . rand(1, 9999);

        $el_class .= ' ' . esc_attr($settings['main_style']);

        if (isset($settings['percent']) && !empty($settings['percent'])) {
            $echo_number = '0';
            if (isset($settings['animation_off']) && strcmp($settings['animation_off'], 'yes') !== 0) {
                $el_class .= ' circle-off-animation';
                $echo_number = esc_attr($settings['percent']) . '<span>' . esc_attr($settings['unit']) . '</span>';
            }
        } else {
            $percent = 0;
        }
        if (isset($settings['clock_wise']) && strcmp($settings['clock_wise'], 'yes') == 0) {
            $el_class .= ' counterclock-wise-animation';
        }
        $value = $settings['percent'] / 100;

        $content_html = '<' . $settings['content_html_tag']  . ' class="piecharts-number " data-max="' . esc_attr($settings['percent']) . '" data-units="' . esc_attr($settings['unit']) . '">' . $echo_number . '</' . $settings['content_html_tag'] . '>';

        if (isset($settings['title']) && !empty($settings['title'])) {
            $title_html = '<' . $settings['title_html_tag']  . ' class="pichart-title ">' . esc_html($settings['title']) . '</' .  $settings['title_html_tag']  . '>';
        }

        if (isset($settings['subtitle']) && !empty($settings['subtitle'])) {
            $subtitle_html = '<' . $settings['subtitle_html_tag'] . ' class="pichart-subtitle " >' . esc_html($settings['subtitle']) . '</' . $settings['title_html_tag'] . '>';
        }
      
		$icon_html = dfd_elementor_icon_render($settings, $settings['icon_size']);

      
        if (isset($settings['size']) && !empty($settings['size'])) {
            $link_css .= '#' . esc_js($uniqid) . ' .inner-circle {width: ' . esc_attr($settings['size']) . 'px; height: ' . esc_attr($settings['size']) . 'px; line-height: ' . esc_attr($settings['size']) . 'px;}';
        } else {
            $size = 160;
        }
        if (isset($settings['bg_border_color']) && !empty($settings['bg_border_color'])) {
            $link_css .= '#' . esc_js($uniqid) . ' .inner-circle:before {border-color: ' . esc_attr($settings['bg_border_color']) . ';}';
        }
        if (isset($settings['bg_width']) && !empty($settings['bg_width'])) {
            $link_css .= '#' . esc_js($uniqid) . ' .inner-circle:before {border-width: ' . esc_attr($settings['bg_width']) . 'px;}';
        }

        if (isset($settings['fill_width']) && !empty($settings['fill_width'])) {
            $data_attr .= ' data-thickness="' . esc_attr($settings['fill_width']) . '"';
        } else {
            $data_attr .= ' data-thickness="7"';
        }
        if ($settings['fill_color_start'] == '') {
            global $dfd_native;
            if (isset($dfd_native['main_site_color']) && !empty($dfd_native['main_site_color'])) {
                $fill_color_start = $dfd_native['main_site_color'];
            } else {
                $fill_color_start = '#3498db';
            }
        }

        if (!empty($settings['fill_color_end']) && !empty($settings['fill_color_start'])) {
            $data_attr .= ' data-fill="{&quot;gradient&quot;: [&quot;' . esc_attr($settings['fill_color_start']) . '&quot;,&quot;' . esc_attr($settings['fill_color_end']) . '&quot;]}" ';
        } elseif (!empty($settings['fill_color_end'])) {
            $data_attr .= ' data-fill="{&quot;color&quot;: &quot;' . esc_attr($settings['fill_color_end']) . '&quot;}" ';
        } else {
            $data_attr .= ' data-fill="{&quot;color&quot;: &quot;' . esc_attr($settings['fill_color_start']) . '&quot;}" ';
        }
        $data_attr .= ' data-emptyfill = "transparent"';
        $data_attr .= ' data-value="' . esc_attr($value) . '"';
        $data_attr .= ' data-size="' . esc_attr($settings['size']) . '"';
        $data_attr .= ' data-animation-start-value="0"';
        $data_attr .= ' data-reverse="true"';

        $output .= '<div id="' . esc_js($uniqid) . '" class="dfd-piecharts call-on-waypoint ' . esc_attr($el_class) . '" ' . $data_attr . '>';
        if (isset($settings['main_style']) && strcmp($settings['main_style'], 'style-1') == 0) {
            $output .= '<div class="inner-circle">';
            $output .= $content_html;
            $output .= '</div>';
            $output .= $title_html;
            $output .= $subtitle_html;
        } elseif (strcmp($settings['main_style'], 'style-2') == 0) {
            $output .= '<div class="inner-circle">';
            $output .= $icon_html;
            $output .= $content_html;
            $output .= '</div>';
            $output .= $title_html;
            $output .= $subtitle_html;
        } elseif (strcmp($settings['main_style'], 'style-3') == 0) {
            $output .= '<div class="inner-circle">';
            $output .= $content_html;
            $output .= '</div>';
            $output .= '<div class="wrap">';
            $output .= '<div class="decor-wrap">';
            $output .= $icon_html;
            $output .= '</div>';
            $output .= '<div class="title-wrap">';
            $output .= $title_html;
            $output .= $subtitle_html;
            $output .= '</div>';
            $output .= '</div>';
        } elseif (strcmp($settings['main_style'], 'style-4') == 0) {
            $output .= '<div class="inner-circle">';
            $output .= $icon_html;
            $output .= '</div>';
            $output .= '<div class="wrap">';
            $output .= '<div class="decor-wrap">';
            $output .= $content_html;
            $output .= '</div>';
            $output .= '<div class="title-wrap">';
            $output .= $title_html;
            $output .= $subtitle_html;
            $output .= '</div>';
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
