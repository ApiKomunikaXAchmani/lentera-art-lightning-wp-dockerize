<?php

if ( ! defined( 'ABSPATH' ) ) { exit; }

add_filter('wpml_pb_shortcode_encode', 'dfd_native_wpml_pb_shortcode_encode_urlencoded_json', 10, 3);

function dfd_native_wpml_pb_shortcode_encode_urlencoded_json($string, $encoding, $original_string) {
	if ('dfd_native_urlencoded_json' === $encoding) {
		$output = array();
		foreach ($original_string as $combined_key => $value) {
			$parts = explode('_', $combined_key);
			$i = array_pop($parts);
			$key = implode('_', $parts);
			$output[$i][$key] = $value;
		}
		$string = rawurlencode(json_encode($output));
	}
	return $string;
}

add_filter('wpml_pb_shortcode_decode', 'dfd_native_wpml_pb_shortcode_decode_urlencoded_json', 10, 3);

function dfd_native_wpml_pb_shortcode_decode_urlencoded_json($string, $encoding, $original_string) {
	if ('dfd_native_urlencoded_json' === $encoding) {
		$rows = json_decode(urldecode($original_string), true);
		$string = array();
		$translate_fields = array(
			'block_title',
			'block_subtitle',
			'block_content',
			'link'
		);
		foreach ($rows as $i => $row) {
			foreach ($row as $key => $value) {
				if (in_array($key, $translate_fields)) {
					$string[$key . '_' . $i] = array('value' => $value, 'translate' => true);
				} else {
					$string[$key . '_' . $i] = array('value' => $value, 'translate' => false);
				}
			}
		}
	}
	return $string;
}
