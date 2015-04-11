<?php
/*******************************************************
* Site / page description
*******************************************************/
/** ===================================================
* Create page description.
* @param	none
* @return	description
*/
function dp_site_desc() {
	$desc = '';
	if (is_home()) {
		$desc = which_my_desc();
	} else if (is_category()) {	
		$desc = category_description();
		if ($desc == "") {
			$desc = single_cat_title('"');
			$desc = $desc . __('"Category page is displayed.', 'DigiPress');
		}
	} else if (is_year()) {
		$desc = __('Archive of the year ', 'DigiPress')
				.get_the_time(__('Y', 'DigiPress'))
				.__(' is displayed.', 'DigiPress');
	} else if (is_month()) {
		$desc = __('Archive of the ', 'DigiPress')
				. get_the_time(__('Y/m', 'DigiPress'))
				. __(' is displayed.', 'DigiPress');
	} else if (is_day()) {
		$desc = __('Archive of the ', 'DigiPress')
				. get_the_time(__('Y/m/d', 'DigiPress'))
				. __(' is displayed.', 'DigiPress');
	} else if (is_time()) {
		$desc = __('Archive of the ', 'DigiPress')
				. get_the_time(__('Y/m/d', 'DigiPress'))
				. __(' is displayed.', 'DigiPress');
	} else if (is_tag()) {
		$desc = __('Archive of ', 'DigiPress')
				. wp_title(__(' Tagged posts is displayed.', 'DigiPress'), false, 'right');
	} else if (is_search()) {
		$desc = __('Keyword : ', 'DigiPress') . wp_title(' - ', false, 'right');
	} else if (is_single()) {
		$desc = which_my_desc();
	} else {
		$desc = which_my_desc();
	}
	return htmlspecialchars_decode($desc);
}

function which_my_desc() {
	global $options;
	if ( ($options['enable_my_desc'] == true) && (!$options['my_desc'] == "") ) {
		$mydesc = $options['my_desc'];
		$mydesc = str_replace('&', '&amp;', $mydesc);
		return $mydesc;
	} else {
		return get_bloginfo('description');
	}
}
?>
