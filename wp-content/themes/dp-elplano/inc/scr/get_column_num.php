<?php
// ************************************************
// Count current column 
// 
// @return column number
// ************************************************
function get_column_num(){
	if (is_admin()) return;
	global $wp_query, $options, $options_visual;
	
	$num = 0;

	if ($wp_query->is_home()) {
		if ($wp_query->is_paged()) {
			// Paged at top page
			if ( $options_visual['dp_column'] == 1 || ($options_visual['dp_1column_only_top'] && $options['autopager']) ) {
				$num = 1;
			} else if ($options_visual['dp_column'] == 2) {
				$num = 2;
			} else {
				$num = 3;
			}
		} else {
			// Top page
			if ( $options_visual['dp_column'] == 1 || $options_visual['dp_1column_only_top'] ) {
				$num = 1;
			} else if ($options_visual['dp_column'] == 2) {
				$num = 2;
			} else {
				$num = 3;
			}
		}
	} else if ($wp_query->is_singular()) {
		if ( $options_visual['dp_column'] == 1 || get_post_meta(get_the_ID(), 'disable_sidebar', true) ) {
			$num = 1;
		} else if ($options_visual['dp_column'] == 2) {
			$num = 2;
		} else {
			$num = 3;
		}
	} else {
		if ( $options_visual['dp_column'] == 1 ) {
			$num = 1;
		} else if ($options_visual['dp_column'] == 2) {
			$num = 2;
		} else {
			$num = 3;
		}
	}
	return $num;
}
?>