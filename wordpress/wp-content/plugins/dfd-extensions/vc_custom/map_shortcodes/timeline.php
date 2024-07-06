<?php

if (!defined('ABSPATH')) {
	exit;
}
/*
 * Add-on Name: DFD Gradation for Visual Composer
 */

class WPBakeryShortCode_Dfd_Timeline extends WPBakeryShortCode {
	
}

vc_map(
	array(
		'name' => esc_html__('Timeline', 'dfd-native'),
		'base' => 'dfd_timeline',
		'class' => 'dfd_timeline dfd_shortcode',
		'icon' => 'dfd_gradation dfd_shortcode',
		'category' => esc_html__('Native', 'dfd-native'),
		'params' => array(
//			array(
//				'heading'			=> esc_html__('Style', 'dfd-native'),
//				'type'				=> 'radio_image_select',
//				'param_name'		=> 'main_style',
//				'simple_mode'		=> false,
//				'options'			=> array(
//					'style-1'			=> array(
//						'tooltip'			=> esc_attr__('Simple','dfd-native'),
//						'src'				=> $module_images.'style-1.png'
//					),
//					'style-2'			=> array(
//						'tooltip'			=> esc_attr__('Slide up','dfd-native'),
//						'src'				=> $module_images.'style-2.png'
//					),
//				),
//			),
			array(
				'type' => 'dfd_radio_advanced',
				'heading' => '<span class="dfd-vc-toolip tooltip-bottom"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">' . esc_html__('This option allows to specify the number of timeline items', 'dfd-native') . '</span></span>' . esc_html__('Columns', 'dfd-native'),
				'param_name' => 'columns',
				'value' => 5,
				'options' => array(
					esc_html__('1', 'dfd-native') => 1,
					esc_html__('2', 'dfd-native') => 2,
					esc_html__('3', 'dfd-native') => 3,
					esc_html__('4', 'dfd-native') => 4,
					esc_html__('5', 'dfd-native') => 5
				),
				'edit_field_class' => 'vc_column vc_col-sm-6',
			),
			array(
				'type' => 'dfd_radio_advanced',
				'heading' => '<span class="dfd-vc-toolip tooltip-bottom"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">' . esc_html__('This option allows you to specify the text alignmnt for the timeline conent', 'dfd-native') . '</span></span>' . esc_html__('Content alignment', 'dfd-native'),
				'param_name' => 'content_alignment',
				'value' => 'text-center',
				'options' => array(
					esc_html__('Left', 'dfd-native') => 'text-left',
					esc_html__('Center', 'dfd-native') => 'text-center',
					esc_html__('Right', 'dfd-native') => 'text-right'
				),
				'edit_field_class' => 'vc_column vc_col-sm-6',
			),
			array(
				'type' => 'dropdown',
				'heading' => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">' . esc_html__('Choose the appear effect for the element', 'dfd-native') . '</span></span>' . esc_html__('Animation', 'dfd-native'),
				'param_name' => 'module_animation',
				'value' => Dfd_Theme_Helpers::dfd_module_animation_styles(),
			),
			array(
				'type' => 'textfield',
				'heading' => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">' . esc_html__('Add the unique class name for the element which can be used for custom CSS codes', 'dfd-native') . '</span></span>' . esc_html__('Custom CSS Class', 'dfd-native'),
				'param_name' => 'el_class',
			),
//			array(
//				'type'				=> 'dfd_video_link_param',
//				'heading'			=> '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">'.esc_html__('Video tutorial and theme documentation article','dfd-native').'</span></span>'.esc_html__('Tutorials','dfd-native'),
//				'param_name'		=> 'tutorials',
//				'doc_link'			=> '//nativewptheme.net/support/visual-composer/clients-logos',
//				'video_link'		=> 'https://www.youtube.com/watch?v=NU7LgIuQOc8&feature=youtu.be',
//			),
			array(
				'type' => 'param_group',
				'heading' => esc_html__('Timeline content', 'dfd-native'),
				'param_name' => 'list_fields',
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Date', 'dfd-native'),
						'param_name' => 'block_date',
						'admin_label' => true,
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Title', 'dfd-native'),
						'param_name' => 'block_title',
						'admin_label' => true,
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Subtitle', 'dfd-native'),
						'param_name' => 'block_subtitle',
					),
					array(
						'type' => 'textarea',
						'heading' => esc_html__('Description', 'dfd-native'),
						'param_name' => 'block_content',
					),
					array(
						'type' => 'dfd_single_checkbox',
						'heading' => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">' . esc_html__('This opition allows you to mark item as completed action in timeline', 'dfd-native') . '</span></span>' . esc_html__('Completed action', 'dfd-native'),
						'param_name' => 'completed_action',
						'options' => array(
							'on' => array(
								'on' => esc_attr__('Yes', 'dfd-native'),
								'off' => esc_attr__('No', 'dfd-native'),
							),
						),
						'edit_field_class' => 'vc_column vc_col-sm-6',
						'group' => esc_html__('Settings', 'dfd-native'),
					),
				),
				'group' => esc_html__('Content', 'dfd-native'),
			),
			array(
				'type' => 'colorpicker',
				'heading' => '<span class="dfd-vc-toolip tooltip-bottom"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">' . esc_html__('This option allows you to define the color for the completed timeline actions', 'dfd-native') . '</span></span>' . esc_html__('Main line color', 'dfd-native'),
				'param_name' => 'main_color',
				'edit_field_class' => 'vc_column vc_col-sm-6',
				'group' => esc_html__('Settings', 'dfd-native'),
			),
			array(
				'type' => 'colorpicker',
				'heading' => '<span class="dfd-vc-toolip tooltip-bottom"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">' . esc_html__('This option allows you to define the color for the incompleted timeline actions', 'dfd-native') . '</span></span>' . esc_html__('Back line color', 'dfd-native'),
				'param_name' => 'back_color',
				'edit_field_class' => 'vc_column vc_col-sm-6 no-top-padding',
				'group' => esc_html__('Settings', 'dfd-native'),
			),
			array(
				'type' => 'dfd_heading_param',
				'text' => esc_html__('Date typography', 'dfd-native'),
				'param_name' => 'date_t_heading',
				'class' => 'ult-param-heading',
				'edit_field_class' => 'dfd-heading-param-wrapper no-top-margin vc_column vc_col-sm-12',
				'group' => esc_attr__('Typography', 'dfd-native'),
			),
			array(
				'type' => 'dfd_font_container',
				'param_name' => 'date_font_options',
				'settings' => array(
					'fields' => array(
						'tag' => 'div',
						'font_size',
						'letter_spacing',
						'line_height',
						'color',
						'font_style'
					),
				),
				'group' => esc_attr__('Typography', 'dfd-native'),
			),
			array(
				'type' => 'dfd_single_checkbox',
				'heading' => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">' . esc_html__('Allows you to use custom Google font', 'dfd-native') . '</span></span>' . esc_html__('Custom font family', 'dfd-native'),
				'param_name' => 'use_date_google_fonts',
				'options' => array(
					'yes' => array(
						'yes' => esc_attr__('Yes', 'dfd-native'),
						'no' => esc_attr__('No', 'dfd-native'),
					),
				),
				'group' => esc_html__('Typography', 'dfd-native'),
			),
			array(
				'type' => 'google_fonts',
				'param_name' => 'custom_date_fonts',
				'settings' => array(
					'fields' => array(
						'font_family_description' => esc_html__('Select font family.', 'dfd-native'),
						'font_style_description' => esc_html__('Select font style.', 'dfd-native'),
					),
				),
				'edit_field_class' => 'vc_column vc_col-sm-12 no-border-bottom',
				'dependency' => array('element' => 'use_date_google_fonts', 'value' => 'yes'),
				'group' => esc_attr__('Typography', 'dfd-native'),
			),
			array(
				'type' => 'dfd_heading_param',
				'text' => esc_html__('Title typography', 'dfd-native'),
				'param_name' => 'title_t_heading',
				'class' => 'ult-param-heading',
				'edit_field_class' => 'dfd-heading-param-wrapper no-top-margin vc_column vc_col-sm-12',
				'group' => esc_attr__('Typography', 'dfd-native'),
			),
			array(
				'type' => 'dfd_font_container',
				'param_name' => 'title_font_options',
				'settings' => array(
					'fields' => array(
						'tag' => 'div',
						'font_size',
						'letter_spacing',
						'line_height',
						'color',
						'font_style'
					),
				),
				'group' => esc_attr__('Typography', 'dfd-native'),
			),
			array(
				'type' => 'dfd_single_checkbox',
				'heading' => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">' . esc_html__('Allows you to use custom Google font', 'dfd-native') . '</span></span>' . esc_html__('Custom font family', 'dfd-native'),
				'param_name' => 'use_google_fonts',
				'options' => array(
					'yes' => array(
						'yes' => esc_attr__('Yes', 'dfd-native'),
						'no' => esc_attr__('No', 'dfd-native'),
					),
				),
				'group' => esc_html__('Typography', 'dfd-native'),
			),
			array(
				'type' => 'google_fonts',
				'param_name' => 'custom_fonts',
				'settings' => array(
					'fields' => array(
						'font_family_description' => esc_html__('Select font family.', 'dfd-native'),
						'font_style_description' => esc_html__('Select font style.', 'dfd-native'),
					),
				),
				'edit_field_class' => 'vc_column vc_col-sm-12 no-border-bottom',
				'dependency' => array('element' => 'use_google_fonts', 'value' => 'yes'),
				'group' => esc_attr__('Typography', 'dfd-native'),
			),
			array(
				'type' => 'dfd_heading_param',
				'text' => esc_html__('Subtitle typography', 'dfd-native'),
				'param_name' => 'subtitle_t_heading',
				'class' => 'ult-param-heading',
				'edit_field_class' => 'dfd-heading-param-wrapper vc_column vc_col-sm-12',
				'group' => esc_html__('Typography', 'dfd-native'),
			),
			array(
				'type' => 'dfd_font_container',
				'param_name' => 'subtitle_font_options',
				'settings' => array(
					'fields' => array(
						'tag' => 'div',
						'font_size',
						'letter_spacing',
						'line_height',
						'color',
						'font_style'
					),
				),
				'edit_field_class' => 'vc_column vc_col-sm-12 no-border-bottom',
				'group' => esc_html__('Typography', 'dfd-native'),
			),
			array(
				'type' => 'dfd_single_checkbox',
				'heading' => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">' . esc_html__('Allows you to use custom Google font', 'dfd-native') . '</span></span>' . esc_html__('Custom font family', 'dfd-native'),
				'param_name' => 'use_sbttl_google_fonts',
				'options' => array(
					'yes' => array(
						'yes' => esc_attr__('Yes', 'dfd-native'),
						'no' => esc_attr__('No', 'dfd-native'),
					),
				),
				'group' => esc_html__('Typography', 'dfd-native'),
			),
			array(
				'type' => 'google_fonts',
				'param_name' => 'custom_sbttl_fonts',
				'settings' => array(
					'fields' => array(
						'font_family_description' => esc_html__('Select font family.', 'dfd-native'),
						'font_style_description' => esc_html__('Select font style.', 'dfd-native'),
					),
				),
				'edit_field_class' => 'vc_column vc_col-sm-12 no-border-bottom',
				'dependency' => array('element' => 'use_sbttl_google_fonts', 'value' => 'yes'),
				'group' => esc_attr__('Typography', 'dfd-native'),
			),
			array(
				'type' => 'dfd_heading_param',
				'text' => esc_html__('Description typography', 'dfd-native'),
				'param_name' => 'content_t_heading',
				'class' => 'ult-param-heading',
				'edit_field_class' => 'dfd-heading-param-wrapper vc_column vc_col-sm-12',
				'group' => esc_attr__('Typography', 'dfd-native'),
			),
			array(
				'type' => 'dfd_font_container',
				'param_name' => 'dscrp_font_options',
				'settings' => array(
					'fields' => array(
						'font_size',
						'letter_spacing',
						'line_height',
						'color',
						'font_style'
					),
				),
				'group' => esc_attr__('Typography', 'dfd-native'),
			),
			array(
				'type' => 'dfd_single_checkbox',
				'heading' => '<span class="dfd-vc-toolip"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">' . esc_html__('Allows you to use custom Google font', 'dfd-native') . '</span></span>' . esc_html__('Custom font family', 'dfd-native'),
				'param_name' => 'use_dscrp_google_fonts',
				'options' => array(
					'yes' => array(
						'yes' => esc_attr__('Yes', 'dfd-native'),
						'no' => esc_attr__('No', 'dfd-native'),
					),
				),
				'group' => esc_html__('Typography', 'dfd-native'),
			),
			array(
				'type' => 'google_fonts',
				'param_name' => 'custom_dscrp_fonts',
				'settings' => array(
					'fields' => array(
						'font_family_description' => esc_html__('Select font family.', 'dfd-native'),
						'font_style_description' => esc_html__('Select font style.', 'dfd-native'),
					),
				),
				'edit_field_class' => 'vc_column vc_col-sm-12 no-border-bottom',
				'dependency' => array('element' => 'use_dscrp_google_fonts', 'value' => 'yes'),
				'group' => esc_attr__('Typography', 'dfd-native'),
			),
			array(
				'type' => 'dfd_radio_advanced',
				'heading' => '<span class="dfd-vc-toolip tooltip-bottom"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">' . esc_html__('This option allows you to define number of columns for the screen width 1024-1279', 'dfd-native') . '</span></span>' . esc_html__('Columns for width 1024-1279', 'dfd-native'),
				'param_name' => 'desktop_columns',
				'value' => 5,
				'options' => array(
					esc_html__('1', 'dfd-native') => 1,
					esc_html__('2', 'dfd-native') => 2,
					esc_html__('3', 'dfd-native') => 3,
					esc_html__('4', 'dfd-native') => 4,
					esc_html__('5', 'dfd-native') => 5
				),
				'group' => esc_html__('Responcive', 'dfd-native'),
			),
			array(
				'type' => 'dfd_radio_advanced',
				'heading' => '<span class="dfd-vc-toolip tooltip-bottom"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">' . esc_html__('This option allows you to define number of columns for the screen width 800-1023', 'dfd-native') . '</span></span>' . esc_html__('Columns for width 800-1023', 'dfd-native'),
				'param_name' => 'tablet_columns',
				'value' => 5,
				'options' => array(
					esc_html__('1', 'dfd-native') => 1,
					esc_html__('2', 'dfd-native') => 2,
					esc_html__('3', 'dfd-native') => 3,
					esc_html__('4', 'dfd-native') => 4,
					esc_html__('5', 'dfd-native') => 5
				),
				'group' => esc_html__('Responcive', 'dfd-native'),
			),
			array(
				'type' => 'dfd_radio_advanced',
				'heading' => '<span class="dfd-vc-toolip tooltip-bottom"><i class="dfd-socicon-question-sign"></i><span class="dfd-vc-tooltip-text">' . esc_html__('This option allows you to define number of columns for the screen width less than 800px', 'dfd-native') . '</span></span>' . esc_html__('Columns for less than 800', 'dfd-native'),
				'param_name' => 'mobile_columns',
				'value' => 5,
				'options' => array(
					esc_html__('1', 'dfd-native') => 1,
					esc_html__('2', 'dfd-native') => 2,
					esc_html__('3', 'dfd-native') => 3,
					esc_html__('4', 'dfd-native') => 4,
					esc_html__('5', 'dfd-native') => 5
				),
				'group' => esc_html__('Responcive', 'dfd-native'),
			),
		),
	)
);
