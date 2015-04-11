<?php
function dp_show_ogp() {
	global $options;

	$ogp_code 	= '';
	$title 		= '';
	$url 		= '';
	$img_url	= '';
	$type		= 'article';

	if (is_single() || is_page()) {

		$title 	 = the_title_attribute(array('before'	=> '', 
											 'after' 	=> '', 
											 'echo' 	=> false));
		$url 	 = get_permalink();
		$img_url = show_post_thumbnail(600, 600, null, false);

	} else {

		$title 	= dp_site_title('', '', false);
		$url 	= 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$img_url = $options['meta_ogp_img_url'];

		if (is_home() && is_front_page()) {
			$type		= 'website';
		}
	}
	$ogp_code = 
'<meta property="og:title" content="' . $title . '" /><meta property="og:type" content="' . $type . '" /><meta property="og:url" content="' . $url .'" /><meta property="og:image" content="' . $img_url . '" /><meta property="og:description" content="' . strip_tags(create_meta_desc_tag("", false)) . '" />';

	echo $ogp_code;
}
?>