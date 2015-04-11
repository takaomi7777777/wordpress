<?php
/*******************************************************
* description and keyword of meta tag.
*******************************************************/
/** ===================================================
* Create meta tag including description and keywords attributes.
* @param	none
* @return	none
*/
function dp_meta_kw_desc() {
	global $options;
	$mydesc = "";
	if (class_exists('amt_add_meta_tags') or class_exists('All_in_One_SEO_Pack') or class_exists('Platinum_SEO_Pack')) {
		return;
	} else {
		$meta_kw_tag = get_meta_keywords();
		echo $meta_kw_tag;
		
		if ($options['enable_meta_def_desc']) {
			$mydesc = preg_replace('/<("[^"]*"|\'[^\']*\'|[^\'">])*>/', '', $options['meta_def_desc']);
			$mydesc = str_replace(array("\r\n","\r","\n"), "", $mydesc);
			if ($mydesc == "" ) {
				$mydesc = get_bloginfo('description');
			}
			$meta_desc_tag = create_meta_desc_tag( $mydesc );
			echo $meta_desc_tag;
		} else {
			$meta_desc_tag = create_meta_desc_tag('');
			echo $meta_desc_tag;
		}
	}
}

/*-------------------------------------------
 meta description tag
--------------------------------------------*/
function create_meta_desc_tag( $mydesc, $is_for_meta = true ) {

	$meta_desc_tag = "";

	if (is_home()) {
		if (is_paged()) {
			$meta_desc_tag = get_bloginfo('description') . '(' . intval(get_query_var('paged')) . ')';
		} else {
			$meta_desc_tag =  get_bloginfo('description');
		}
	} else if (is_category()) {	
		$catDesc = preg_replace('/<("[^"]*"|\'[^\']*\'|[^\'">])*>/', '', category_description());
		$catDesc = str_replace(array("\r\n","\r","\n"), "", $catDesc);

		if ($catDesc == "") {
			if (is_paged()) {
				$meta_desc_tag = wp_title('[', false) 
						. __(' ]Category page is displayed.', 'DigiPress')
						. '(' . intval(get_query_var('paged')) . ')';
			} else {
				$meta_desc_tag = wp_title('[', false) 
						. __(' ]Category page is displayed.', 'DigiPress');
			}
		} else {
			if (is_paged()) {
				$meta_desc_tag = $catDesc . '(' . intval(get_query_var('paged')) . ')';
			} else {
				$meta_desc_tag = $ca;
			}
		}
	} else if (is_year()) {
		if (is_paged()) {
			$meta_desc_tag =  __('Archive of the ', 'DigiPress') 
					. get_the_time(__('Y', 'DigiPress')) 
					. __(' is displayed.', 'DigiPress') 
					. '(' . intval(get_query_var('paged')) . ')';
		} else {
			$meta_desc_tag = __('Archive of the ', 'DigiPress')
					. get_the_time(__('Y', 'DigiPress')) 
					. __(' is displayed.', 'DigiPress');
		}
	} else if (is_month()) {
		if (is_paged()) {
			$meta_desc_tag = __('Archive of the ', 'DigiPress')
					. get_the_time(__('Y/m', 'DigiPress')) 
					. __(' is displayed.', 'DigiPress')
					. '(' . intval(get_query_var('paged')) . ')';
		} else {
			$meta_desc_tag = __('Archive of the ', 'DigiPress')
					. get_the_time(__('Y/m', 'DigiPress')) 
					. __(' is displayed.', 'DigiPress');
		}
	} else if (is_day()) {
		if (is_paged()) {
			$meta_desc_tag = __('Archive of the ', 'DigiPress')
					. get_the_time(__('Y/m/d', 'DigiPress')) 
					. __(' is displayed.', 'DigiPress')
					. '(' . intval(get_query_var('paged')) . ')';
		} else {
			$meta_desc_tag = __('Archive of the ', 'DigiPress')
					. get_the_time(__('Y/m/d', 'DigiPress')) 
					. __(' is displayed.', 'DigiPress');
		}
	} else if (is_time()) {
		if (is_paged()) {
			$meta_desc_tag = __('Archive of the ', 'DigiPress')
					. get_the_time(__('Y/m/d', 'DigiPress')) 
					. __(' is displayed.', 'DigiPress')
					. '(' . intval(get_query_var('paged')) . ')';
		} else {
			$meta_desc_tag = __('Archive of the ', 'DigiPress')
					. get_the_time(__('Y/m/d', 'DigiPress')) 
					. __(' is displayed.', 'DigiPress');
		}
	} else if (is_tag()) {
		if (is_paged()) {
			$meta_desc_tag =  wp_title('',false)
					. __(' Tagged posts is displayed.', 'DigiPress')
					. ' Page(' . intval(get_query_var('paged')) . ')';
		} else {
			$meta_desc_tag =  wp_title('',false) 
					. __(' Tagged posts is displayed.', 'DigiPress');
		}
	} else if (is_search()) {
		if (is_paged()) {
			$meta_desc_tag = $mydesc . '(' .intval(get_query_var('paged')) . ')';
		} else {
			$meta_desc_tag =  $mydesc . ' - ' . wp_title('',false);
		}
	} else if (is_singular()) {
		if (is_single()) {
			while (have_posts()) {
				the_post();
				$desc = get_the_excerpt();
				if (mb_strlen($desc) > 120) $desc = mb_substr($desc, 0, 120).'...';
				$meta_desc_tag = $desc;
			}
		} else if (is_page()){
			$meta_desc_tag =  get_the_excerpt();
		}
	} else {
		$meta_desc_tag =  $mydesc;
	}

	// if description is for meta tag.
	if ($is_for_meta) {
		$meta_desc_tag = '<meta name="description" content="' . strip_tags($meta_desc_tag) . '" />';
	}
	
	return $meta_desc_tag;
}

/*-------------------------------------------
 meta keyword tag
--------------------------------------------*/
function get_meta_keywords() {
	global $options;
	$meta_kw = "";

	if (is_singular()) {
		// get_post_meta(get_the_ID(), 'dp_meta_keyword', true)

		if (get_post_meta(get_the_ID(), 'dp_meta_keyword', true)) {
				$meta_kw = get_post_meta(get_the_ID(), 'dp_meta_keyword', true);
		} else {
			if (is_single()) {
				while (have_posts()) : the_post();
					$posttags = get_the_tags();
					$strTags = "";
					if ($posttags) {
						foreach($posttags as $tag) {
							$strTags =  $strTags . $tag->name . ',';
						}
					}
					if ( ! $strTags == "") {
						$meta_kw = rtrim($strTags, ",");
					}
				endwhile;
			} else if (is_page()) {
				$meta_kw = '';
			} else {
				$meta_kw = wp_title(',', false, 'right');
			}
		}

	} else if (is_archive()) {
		$arcName = wp_title(',', false, 'right');
		$meta_kw = $arcName . ',' . trim($options['meta_def_kw']);

	} else if (is_search()) {
		$arcName = wp_title(',', false, 'right');
		$meta_kw = $arcName . ',' . trim($options['meta_def_kw']) . ',search result';

	} else if (is_home()) {
		if ($options['enable_meta_def_kw']) {
			$meta_kw = trim($options['meta_def_kw']);
		}
	} else {
		$meta_kw = wp_title(',', false, 'right');
	}

	if (is_paged()) {
		$meta_kw .= ',Paged'. intval(get_query_var('paged'));
	}

	if ($meta_kw !== "") {
		$meta_kw = '<meta name="keywords" content="' . strip_tags($meta_kw) . '" />';
	}

	return $meta_kw;
}
?>