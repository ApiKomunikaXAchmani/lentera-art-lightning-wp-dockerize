<?php

if (!defined('ABSPATH')) {
	exit;
}

if (!function_exists('dfd_elementor_icon_render')) {

	/**
	 * Icon generator for Elementor
	 */
	function dfd_elementor_icon_render($atts, $icon_size) {
		$output = '';
		if ('custom' === $atts['icon_type'] && !empty($atts['icon_type'])) {
			$image_url = $atts['icon_image_id']['url'];
			if (!$image_url) {
				$image_url = get_template_directory_uri() . '/assets/images/no_image_resized_120-120.jpg';
				$img_atts = 'alt="' . esc_attr__('No image', 'dfd-native') . '" width="" height=""';
			} else {
				$img_atts = Dfd_Theme_Helpers::get_image_attrs($image_url, $atts['icon_image_id']['id'], $icon_size, $icon_size, esc_attr__('Image', 'dfd-native'));
				$img_atts .= 'width="'.$icon_size.'"';
				$img_atts .= 'height="'.$icon_size.'"';
			}
			if (!empty($icon_size)) {
				$image_src = dfd_aq_resize($image_url, $icon_size, $icon_size, true, true, true);
				if (!$image_src)
					$image_src = $image_url;
			} else {
				$image_src = $image_url;
			}
			$output .= '<img src="' . esc_url($image_src) . '" ' . $img_atts . ' />';
		} elseif ('selector' === $atts['icon_type'] && $atts['ic_dfd_icons'] != '') {
			$output .= '<i class="featured-icon ' . esc_attr($atts['ic_dfd_icons']['value']) . '"></i>';
		} elseif ('text' === $atts['icon_type'] && !empty($atts['icon_type'])) {
			$output .= '<span class="dfd-text-icon-render">' . esc_html($atts['icon_text']) . '</span>';
		}

		return $output;
	}
	

}
// function get_image_alt( $instance ) {
//		if ( empty( $instance['id'] ) ) {
//			// For `Insert From URL` images.
//			return isset( $instance['alt'] ) ? trim( strip_tags( $instance['alt'] ) ) : '';
//		}
//
//		$attachment_id = $instance['id'];
//		if ( ! $attachment_id ) {
//			return '';
//		}
//
//		$attachment = get_post( $attachment_id );
//		if ( ! $attachment ) {
//			return '';
//		}
//
//		$alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
//		if ( ! $alt ) {
//			$alt = $attachment->post_excerpt;
//			if ( ! $alt ) {
//				$alt = $attachment->post_title;
//			}
//		}
//		return trim( strip_tags( $alt ) );
//	}

if(!function_exists('dfd_elementor_module_read_more')) {
	
	/**
	 * Read more generator for Frontend
	 */
	function dfd_elementor_module_read_more($settings = array()) {
		$output = $link = $readmore_text = $link_atts = $link_more_open = $link_more_closed = $text_class = '';

		if(isset($settings['readmore_show']) && strcmp($settings['readmore_show'], 'yes') == 0) {
			$output .= '<div class="dfd-module-read-more-wrap '.esc_attr($settings['readmore_style']).'">';
				if(isset($settings['read_more']) && strcmp($settings['read_more'], 'more') == 0 && isset($settings['link'])) {
					$link_atts .= 'href="' . (!empty($settings['link']['url']) ? esc_url($settings['link']['url']) : '#') . '"';
					$link_atts .= ' target="' . (!empty($settings['link']['is_external']) ? '_blank' : '_self' ) . '"';
					$link_atts .= !empty($settings['link']['nofollow']) ? ' rel="nofollow"' : '';
					$link_atts .= !empty($settings['link']['custom_attributes']) ? ' ' . esc_attr($settings['link']['custom_attributes']) : '';
					$link_more_open = '<a '.$link_atts.'>';
					$link_more_closed = '</a>';
				}
				$output .= $link_more_open;

					if(isset($settings['readmore_text']) && !empty($settings['readmore_text'])) {
						$readmore_text = esc_html($settings['readmore_text']);
						$text_class = 'with-text';
					}

					if(isset($settings['readmore_style']) && strcmp($settings['readmore_style'], 'read-more-1') == 0 || strcmp($settings['readmore_style'], 'read-more-2') == 0 || strcmp($settings['readmore_style'], 'read-more-7') == 0) {
						$output .= '<span class="button">'.$readmore_text.'</span>';
					} elseif(strcmp($settings['readmore_style'], 'read-more-3') == 0) {
						$output .= '<span class="icon-wrap">';
							$output .= '<span class="plus-vertical line"></span>';
							$output .= '<span class="plus-horizontal line"></span>';
						$output .= '</span>';
					} elseif(strcmp($settings['readmore_style'], 'read-more-4') == 0) {
						$output .= '<span class="buton-wrap icon-wrap '.esc_attr($text_class).'">';
							$output .= '<span class="hover-animate-wrap button">';
								$output .= '<span class="text-container"><span class="animate-container">'.$readmore_text.'</span></span>';
								$output .= '<i class="dfd-socicon-arrow-right-01"></i>';
							$output .= '</span>';
						$output .= '</span>';
					} elseif(strcmp($settings['readmore_style'], 'read-more-5') == 0) {
						$output .= '<span class="icon-wrap">';
							$output .= '<i class="dfd-socicon-arrow-right"></i>';
						$output .= '</span>';
					} elseif(strcmp($settings['readmore_style'], 'read-more-6') == 0) {
						$output .= '<span class="icon-wrap">';
							$output .= '<span class="left-dot dots"></span>';
							$output .= '<span class="midle-dot dots"></span>';
							$output .= '<span class="right-dot dots"></span>';
						$output .= '</span>';
					} elseif(strcmp($settings['readmore_style'], 'read-more-8') == 0) {
						$output .= '<span class="button">';
							$output .= '<i class="dfd-socicon-arrow-right more-icon-left"></i>';
							$output .= '<span class="text-container">'.$readmore_text.'</span>';
							$output .= '<i class="dfd-socicon-arrow-right more-icon-right"></i>';
						$output .= '</span>';
					}

				$output .= $link_more_closed;
			$output .= '</div>';

			return $output;
		}
	}
}
