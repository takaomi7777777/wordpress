<?php 
// Get column number
$col_num = get_column_num();
// Header
get_header(); 
// GET THE POST TYPE
$postType = get_post_type();
?>
<body <?php body_class(); ?>>
<header id="header_area_paged">
<?php 
include (TEMPLATEPATH . "/fixed_menu.php");
dp_banner_contents();
?>
</header>
<section class="dp_topbar_title"><?php dp_breadcrumb(); ?></section>
<div id="container" class="clearfix">
<a class="breadcrumb_arrow aligncenter" href="#post-<?php the_ID(); ?>"><span>Read Article</span></a>
<?php // Container widget
if (($postType === 'page') && is_active_sidebar('widget-top-container') && !post_password_required()) : ?>
<div id="top-container-widget" class="clearfix entry">
<?php dynamic_sidebar( 'widget-top-container' ); ?>
</div>
<?php endif; ?>
<div id="content" class="content">
<?php if (have_posts()) :

		// Post title
		$post_title =  the_title('', '', false) ? the_title('', '', false) : __('No Title', 'DigiPress');

		// GET THE FLAG TO SHOW SNS ICON 
		$hideSNSIconFlag = get_post_meta(get_the_ID(), 'hide_sns_icon', true);

		// Get the flag to hide title
		$hideTitleFlag 	 = get_post_meta(get_the_ID(), 'dp_hide_title', true);

		// GET THE POST TYPE
		$postType = get_post_type();

		// Content widget
		if (($postType === 'page') && is_active_sidebar('widget-top-content')) : ?>
<div id="top-content-widget" class="clearfix entry">
<?php dynamic_sidebar( 'widget-top-content' ); ?>
</div>
<?php
		endif;
	while (have_posts()) : the_post(); ?>
<?php
// Count Post View
if (function_exists('dp_count_post_views')) {
	dp_count_post_views(get_the_ID(), true);
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php 
if (!$hideTitleFlag): 
?>
<header>
<h1 class="entry-title posttitle"><span><?php echo $post_title; ?></span></h1>
<?php
	// header meta
	if ( $options['show_pubdate_on_meta_page'] || $options['show_author_on_meta_page'] || ($options['sns_button_under_title'] && !get_post_meta(get_the_ID(), 'hide_sns_icon', true)) ) :

		// Call meta contents
		showPostMetaForSingleTop($postFormat);

	endif;  // End of postmeta_title division ?>
</header>
<?php
endif;	// !$hideTitleFlag

	// Single header widget
	if (($postType === 'page') && is_active_sidebar('widget-post-header') && !post_password_required()) : ?>
<div id="single-header-widget" class="clearfix entry">
		<?php dynamic_sidebar( 'widget-post-header' ); ?>
</div>
	<?php endif; ?>
<div class="entry entry-content">
		<?php
		// Content
		the_content(__('Read more', 'DigiPress'));
		// Paged navigation
		$link_pages = wp_link_pages(array(
									'before' => '', 
									'after' => '', 
									'next_or_number' => 'number', 
									'echo' => '0'));
		if ( $link_pages != '' ) {
			echo '<nav class="navigation"><div class="dp-pagenavi clearfix"><span class="pages">Pages : </span>';
			if ( preg_match_all("/(<a [^>]*>[\d]+<\/a>|[\d]+)/i", $link_pages, $matched, PREG_SET_ORDER) ) {
				foreach ($matched as $link) {
					if (preg_match("/<a ([^>]*)>([\d]+)<\/a>/i", $link[0], $link_matched)) {
						echo "<a class=\"page-numbers\" {$link_matched[1]}>{$link_matched[2]}</a>";
					} else {
						echo "<span class=\"current\">{$link[0]}</span>";
					}
				}
			}
			echo '</div></nav>';
		}
		//wp_link_pages('before=<nav class="navigation clearfix"><div class="dp-pagenavi al-c">&after=</div></nav>');
		?>
</div>
		<?php // Single footer widget
		if (is_active_sidebar('widget-post-footer') && !post_password_required()) : ?>
<div id="single-footer-widget" class="clearfix entry">
			<?php dynamic_sidebar( 'widget-post-footer' ); ?>
</div>
		<?php
		endif;
		
		// Meta
		showPostMetaForSingleBottom($postFormat);
		?>
</article>
<?php endwhile; ?>
<?php // Content bottom widget
if (is_active_sidebar('widget-top-content-bottom')) : ?>
<div id="top-content-bottom-widget" class="clearfix entry">
<?php dynamic_sidebar( 'widget-top-content-bottom' ); ?>
</div>
<?php endif; ?>
<?php else : ?>
<article class="post">
<header><h1 class="entry-title posttitle"><?php _e('Not Found.', 'DigiPress'); ?></h1></header>
<div class="entry entry-content">
<p><?php _e('Apologies, but the page you requested could not be found. <br />Perhaps searching will help.', 'DigiPress'); ?></p>
</div>
</article>
	<?php endif; ?>
</div>
<?php	// Side bar
	if (!get_post_meta(get_the_ID(), 'disable_sidebar', true)) {
		if ($col_num == 2) {
			get_sidebar();
		} else if ($col_num == 3){
			get_sidebar();
			get_sidebar('2');
		}
	}
?>
</div>
<?php get_footer(); ?>
<?php 
//For SNS Buttons
if ($options['sns_button_under_title'] || $options['sns_button_on_meta']) {
	if (!$hideSNSIconFlag && ($postType === 'page')) {
		if ($options['show_google_button']) {
			echo '<script src="https://apis.google.com/js/plusone.js">{lang: "ja"}</script>';
		}
		if ($options['show_hatena_button']) {
			echo '<script src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>';
		}
		if ($options['show_mixi_button'] && $options['mixi_accept_key']) {
			echo '<script type="text/javascript">(function(d) {var s = d.createElement(\'script\'); s.type = \'text/javascript\'; s.async = true;s.src = \'//static.mixi.jp/js/plugins.js#lang=ja\';d.getElementsByTagName(\'head\')[0].appendChild(s);})(document);</script>';
		}
		if ($options['show_evernote_button']) {
			echo '<script src="http://static.evernote.com/noteit.js"></script>';
		}
		if ($options['show_tumblr_button']) {
			echo '<script src="http://platform.tumblr.com/v1/share.js"></script>';
		}
		if ($options['show_pocket_button']) {
			echo '<script type="text/javascript">!function(d,i){if(!d.getElementById(i)){var j=d.createElement("script");j.id=i;j.src="https://widgets.getpocket.com/v1/j/btn.js?v=1";var w=d.getElementById(i);d.body.appendChild(j);}}(document,"pocket-btn-js");</script>';
		}
		if ($options['show_facebook_button'] || $options['facebookcomment_page'] || $options['facebookrecommend']) {
			// Get Facebook App ID
			$fb_app_id =  ($options['fb_app_id'] != '') ? '&appId='.$options['fb_app_id'] : '';
			if ($fb_app_id == '') {
				$fb_app_id = ($FB_APP_ID != '') ? '&appId='.$FB_APP_ID : '';
			}

			echo '<div id="fb-root"></div><script type="text/javascript">(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id;js.async = true; js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1' . $fb_app_id . '"; fjs.parentNode.insertBefore(js, fjs);}(document, "script", "facebook-jssdk"));</script>';
		}
		if ($options['show_twitter_button']) {
			echo '<script type="text/javascript">!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
		}
	} else if ($EXIST_FB_LIKE_BOX && ($postType === 'page')) {
		$fb_app_id =  ($options['fb_app_id'] != '') ? '&appId='.$options['fb_app_id'] : '';
		if ($fb_app_id == '') {
			$fb_app_id = ($FB_APP_ID != '') ? '&appId='.$FB_APP_ID : '';
		}

		echo '<div id="fb-root"></div><script type="text/javascript">(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id;js.async = true; js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1' . $fb_app_id . '"; fjs.parentNode.insertBefore(js, fjs);}(document, "script", "facebook-jssdk"));</script>';
	}
}
?>
</body>
</html>