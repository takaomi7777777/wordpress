<?php
global $options;
?>
<!DOCTYPE html>
<!--[if IE 6]> <html class="no-js lt-ie9 lt-ie8 lt-ie7 eq-ie6" lang="ja"> <![endif]--><!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8 eq-ie7" lang="ja"> <![endif]--><!--[if IE 8]> <html class="no-js lt-ie9 eq-ie8" lang="ja"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="ja" class="no-js"><!--<![endif]-->
<?php 
/* ------------------------------------------
   This template is for mobile device!!!!!!!
 ------------------------------------------*/
if (is_single() || is_page()) : ?>
<head prefix="og:http://ogp.me/ns# fb:http://ogp.me/ns/fb# article:http://ogp.me/ns/article#">
<?php else: ?>
<head prefix="og:http://ogp.me/ns# fb:http://ogp.me/ns/fb# blog:http://ogp.me/ns/blog#">
<?php endif; ?>
<meta charset="UTF-8" /><meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" /><meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<?php if (is_archive() && is_paged()) : ?>
<meta name="robots" content="noindex,follow" />
<?php
elseif ( is_single() || is_page() ) :
	if (get_post_meta(get_the_ID(), 'dp_noindex', true) && 
		get_post_meta(get_the_ID(), 'dp_nofollow', true) && 
		get_post_meta(get_the_ID(), 'dp_noarchive', true)) :
?>
<meta name="robots" content="noindex,nofollow,noarchive" />
<?php
	elseif (get_post_meta(get_the_ID(), 'dp_noindex', true) && 
		get_post_meta(get_the_ID(), 'dp_nofollow', true) && 
		!get_post_meta(get_the_ID(), 'dp_noarchive', true)) : 
?>
<meta name="robots" content="noindex,nofollow" />
<?php
	elseif (get_post_meta(get_the_ID(), 'dp_noindex', true) && 
		!get_post_meta(get_the_ID(), 'dp_nofollow', true) && 
		!get_post_meta(get_the_ID(), 'dp_noarchive', true)) :
?>
<meta name="robots" content="noindex" />
<?php
	elseif (!get_post_meta(get_the_ID(), 'dp_noindex', true) && 
		get_post_meta(get_the_ID(), 'dp_nofollow', true) && 
		get_post_meta(get_the_ID(), 'dp_noarchive', true)) :
?>
<meta name="robots" content="nofollow,noarchive" />
<?php
	elseif (!get_post_meta(get_the_ID(), 'dp_noindex', true) && 
		!get_post_meta(get_the_ID(), 'dp_nofollow', true) && 
		get_post_meta(get_the_ID(), 'dp_noarchive', true)) :
?>
<meta name="robots" content="noarchive" />
<?php
	elseif (!get_post_meta(get_the_ID(), 'dp_noindex', true) && 
		get_post_meta(get_the_ID(), 'dp_nofollow', true) && 
		!get_post_meta(get_the_ID(), 'dp_noarchive', true)) :
?>
<meta name="robots" content="nofollow" />
<?php
	elseif (get_post_meta(get_the_ID(), 'dp_noindex', true) && 
		!get_post_meta(get_the_ID(), 'dp_nofollow', true) && 
		get_post_meta(get_the_ID(), 'dp_noarchive', true)) :
?>
<meta name="robots" content="noindex,noarchive" />
<?php
	endif;
endif; 

// show title
dp_site_title("<title>", "</title>") ;
// show keyword and description
dp_meta_kw_desc();
// show OGP
dp_show_ogp();
?>
<link rel="stylesheet" href="<?php echo DP_THEME_URI . '/' . DP_MOBILE_THEME_DIR . '/css/style.css?' . date('His'); ?>" media="screen" />
<link rel="stylesheet" href="<?php echo DP_THEME_URI . '/css/visual-custom.css?' . date('His'); ?>" media="screen" />
<?php if ($options['backward_compatibility']) : // Include CSS for Backward Compatibility ?>
<link rel="stylesheet" href="<?php echo DP_THEME_URI . '/css/option-decoration-min.css?' . date('His'); ?>" media="screen" />
<?php endif;?>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php
// WordPress header
wp_head();

// Autopager JS
showScriptForAutopagerMb($wp_query->max_num_pages);

// Headline JS
if ($options['headline_type'] === '3' && (is_home() && !is_paged()) ) {
	if ($options['headline_slider_fx'] === '1') {
		$headlineTime = $options['headline_slider_time'];
		$headlineHoverStop = $options['headline_hover_stop'] ? 'true' : 'false';
		$headlineArrow = $options['headline_arrow'] ? 'true' : 'false';

		$headline_js = <<<_EOD_
<script>j$(function(){j$('.headline_slider').glide({autoplay:$headlineTime,hoverpause:$headlineHoverStop,arrows:false,nav:false,afterInit:(function(){j$('.slides').fadeIn();})});});</script>
_EOD_;

	} else {
		$tickerVelocity = $options['headline_slider_velocity'];
		$headline_js = <<<_EOD_
<script>j$(function(){j$(function(){j$("#headline_ticker").liScroll({travelocity:$tickerVelocity});});j$('.slides').fadeIn();});</script>
_EOD_;
	}
	echo $headline_js;
}

// Custom header
echo $options['custom_head_content'];

if ($options['gcs_id'] !== '') : 
// Google Custom Search ?>
<script>(function(){var cx='<?php echo $options['gcs_id']; ?>';var gcse=document.createElement('script'); gcse.type = 'text/javascript';gcse.async=true;gcse.src=(document.location.protocol=='https:'?'https:':'http:')+'//www.google.com/cse/cse.js?cx='+cx;var s =document.getElementsByTagName('script')[0];s.parentNode.insertBefore(gcse,s);})();</script>
<?php endif; ?>
</head>
