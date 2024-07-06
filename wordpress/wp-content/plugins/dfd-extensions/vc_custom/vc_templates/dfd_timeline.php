<?php

if (!defined('ABSPATH')) {
	exit;
}

$module_animation = $el_class = $list_fields = $output = $css_rules = '';
$main_color = $back_color = $date_font_options = '';
$use_date_google_fonts = $custom_date_fonts = $subtitle_font_options = '';
$title_font_options = $use_google_fonts = $custom_fonts = '';
$use_sbttl_google_fonts = $custom_sbttl_fonts = $dscrp_font_options = '';
$use_dscrp_google_fonts = $custom_dscrp_fonts = $date_typography = '';
$columns = $desktop_columns = $tablet_columns = $mobile_columns = '';
$item_html = $data_attr = $content_alignment = '';

$atts = vc_map_get_attributes('dfd_timeline', $atts);
extract($atts);

wp_enqueue_script('dfd-timeline');

$uniqid = uniqid('dfd-timeline-') . '-' . rand(1, 9999);

$el_class = ' number-col-' . $columns;
$el_class = ' ' . $content_alignment;

if (!($module_animation == '')) {
	$el_class .= ' cr-animate-gen';
	$data_attr .= ' data-animate-item=".timeline__content" data-animate-type = "' . $module_animation . '"';
}

$data_attr .= ' data-columns="' . (int) $columns . '"';
$data_attr .= ' data-columns-desktop="' . (int) $desktop_columns . '"';
$data_attr .= ' data-columns-tablet="' . (int) $tablet_columns . '"';
$data_attr .= ' data-columns-mobile="' . (int) $mobile_columns . '"';

$date_typography = _dfd_parse_text_shortcode_params($date_font_options, '', $use_date_google_fonts, $custom_date_fonts, true);
$title_typography = _dfd_parse_text_shortcode_params($title_font_options, '', $use_google_fonts, $custom_fonts, true);
$subtitle_typography = _dfd_parse_text_shortcode_params($subtitle_font_options, '', $use_sbttl_google_fonts, $custom_sbttl_fonts, true);
$description_typography = _dfd_parse_text_shortcode_params($dscrp_font_options, '', $use_dscrp_google_fonts, $custom_dscrp_fonts, true);

if (isset($date_typography['style']) && !empty($date_typography['style'])) {
	$css_rules .= '#' . esc_js($uniqid) . ' .dfd-timeline-date {' . esc_js($date_typography['style']) . '}';
}
if (isset($title_typography['style']) && !empty($title_typography['style'])) {
	$css_rules .= '#' . esc_js($uniqid) . ' .dfd-timeline-title {' . esc_js($title_typography['style']) . '}';
}
if (isset($subtitle_typography['style']) && !empty($subtitle_typography['style'])) {
	$css_rules .= '#' . esc_js($uniqid) . ' .dfd-timeline-subtitle {' . esc_js($subtitle_typography['style']) . '}';
}
if (isset($description_typography['style']) && !empty($description_typography['style'])) {
	$css_rules .= '#' . esc_js($uniqid) . ' .dfd-timeline-description {' . esc_js($description_typography['style']) . '}';
}
if (isset($back_color) && !empty($back_color)) {
	$css_rules .= '#' . esc_js($uniqid) . '.timeline--horizontal .timeline__item .timeline__item__inner:before, #' . esc_js($uniqid) . '.timeline--horizontal .timeline__item .timeline__item__inner:after, #' . esc_js($uniqid) . ' .timeline__item:before, #' . esc_js($uniqid) . ' .timeline__item:after {background: ' . esc_js($back_color) . ';}';
}
if (isset($main_color) && !empty($main_color)) {
	$css_rules .= '#' . esc_js($uniqid) . '.timeline--horizontal .timeline__item.completed .timeline__item__inner:before, #' . esc_js($uniqid) . ' .timeline__item.completed:before, #' . esc_js($uniqid) . ' .timeline__item.completed:after {background: ' . esc_js($main_color) . ';}';
	$css_rules .= '#' . esc_js($uniqid) . ' .timeline-nav-button:hover:before {color: ' . esc_js($main_color) . ';}';
}

if (isset($list_fields) && !empty($list_fields) && function_exists('vc_param_group_parse_atts')) {
	$list_fields = (array) vc_param_group_parse_atts($list_fields);

	foreach ($list_fields as $field) {
		$item_class = '';
		if (isset($field['completed_action']) && $field['completed_action'] == 'on') {
			$item_class .= 'completed';
		}

		$item_html .= '<div class="timeline__item ' . esc_attr($item_class) . '">';
			$item_html .= '<div class="timeline__content">';
				if (isset($field['block_date']) && !empty($field['block_date'])) {
					$item_html .= '<' . $date_typography['tag'] . ' class="dfd-timeline-date box-name">' . esc_attr($field['block_date']) . '</' . $date_typography['tag'] . '>';
				}
				if (isset($field['block_title']) && !empty($field['block_title'])) {
					$item_html .= '<' . $title_typography['tag'] . ' class="dfd-timeline-title box-name">' . esc_attr($field['block_title']) . '</' . $title_typography['tag'] . '>';
				}
				if (isset($field['block_subtitle']) && !empty($field['block_subtitle'])) {
					$item_html .= '<' . $subtitle_typography['tag'] . ' class="dfd-timeline-subtitle subtitle">' . esc_attr($field['block_subtitle']) . '</' . $subtitle_typography['tag'] . '>';
				}
				if (isset($field['block_content']) && !empty($field['block_content'])) {
					$item_html .= '<' . $description_typography['tag'] . ' class="dfd-timeline-description">' . esc_attr($field['block_content']) . '</' . $description_typography['tag'] . '>';
				}
			$item_html .= '</div>';
		$item_html .= '</div>';
	}

	$output .= '<div id="' . esc_attr($uniqid) . '" class="dfd-timeline-wrap timeline ' . esc_attr($el_class) . ' timeline--horizontal" ' . $data_attr . '>';
		$output .= '<div class="timeline__wrap">';
			$output .= '<div class="timeline__items">';
				$output .= $item_html;
			$output .= '</div>';
		$output .= '</div>';

	if ($css_rules != '') {
		$output .= '<script type="text/javascript">'
					. '(function($) {'
						. '$("head").append("<style>' . $css_rules . '</style>");'
					. '})(jQuery);'
				. '</script>';
	}

	$output .= '</div>';
}

echo $output;
