<?php 
/* ------------------------------------------
   This template is for mobile device!!!!!!!
 ------------------------------------------*/
include (TEMPLATEPATH . '/' . DP_MOBILE_THEME_DIR . '/header.php');
?>
<body <?php body_class(); ?>>
<div id="wrap" class="mobile">
<?php include (TEMPLATEPATH . '/' . DP_MOBILE_THEME_DIR . '/top-menu.php'); ?>
<header id="header_area">
<?php dp_banner_contents_mobile(); ?>
</header>
<section class="dp_topbar_title"><?php dp_breadcrumb(); ?></section>
<div class="breadcrumb_arrow aligncenter"><span>Articles</span></div>
<div id="container" class="clearfix">
<div id="content" class="content">
<?php 
if (have_posts()) :
	// Widget
	if (is_active_sidebar('widget-top-container-mobile')) : ?>
<div id="top-container-widget"><div id="top-content-widget" class="entry">
<?php dynamic_sidebar( 'widget-top-container-mobile' ); ?>
</div></div>
<?php 
	endif;

	// GET THE POST TYPE
	$postType = get_post_type();

	// Post format
	$postFormat = get_post_format();

	// Get icon class each post format
	$titleIconClass = postFormatIcon($postFormat);

	// Post title
	$post_title =  the_title('', '', false) ? the_title('', '', false) : __('No Title', 'DigiPress');

	// GET THE FLAG TO SHOW SNS ICON 
	$hideSNSIconFlag = get_post_meta(get_the_ID(), 'hide_sns_icon', true);

	while (have_posts()) : the_post();
		// Count Post View
		if (function_exists('dp_count_post_views')) {
			dp_count_post_views(get_the_ID(), true);
		}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php if ( $postFormat !== 'quote' ) : ?> 
<header>
<h1 class="entry-title posttitle<?php echo $titleIconClass; ?>"><span><?php echo $post_title; ?></span></h1>
<?php
	// header meta
	if ( $options['show_pubdate_on_meta'] || $options['show_views_on_meta'] || $options['show_author_on_meta'] || $options['time_for_reading'] || ($options['sns_button_under_title'] && !get_post_meta(get_the_ID(), 'hide_sns_icon', true))) : 
		// Call meta contents
		showPostMetaForSingleTop($postFormat);

	 endif; ?>
</header>
<?php
	// Single header widget
	if (($postType === 'post') && is_active_sidebar('under-post-title-mobile') && !post_password_required()) : ?>
	<div id="single-header-widget" class="clearfix entry">
			<?php dynamic_sidebar( 'under-post-title-mobile' ); ?>
	</div>
<?php 
	endif;
?>
<?php endif; ?>
<div class="entry entry-content">
<?php
	// Show eyecatch image
	if (has_post_thumbnail() && $options['show_eyecatch_first'] && ($postType === 'post')) {
		$width 	= 620;
		$height	= 452;
		if (($options_visual['dp_column'] == '1') || get_post_meta(get_the_ID(), 'disable_sidebar', true)) {
			$width 	= 930;
			$height	= 686;
		}
		$image_id	= get_post_thumbnail_id();
		$image_url	= wp_get_attachment_image_src($image_id, array($width, $height), true); 
		$img_tag	= '<img src="'.$image_url[0].'" width="'.$width.'" class="wp-post-image aligncenter" alt="'.get_the_title().'"  />';
		echo '<div class="al-c">' . $img_tag . '</div>';
	}
	// Content
	the_content(__('Read more', 'DigiPress'));
	// Paged navigation
	$link_pages = wp_link_pages(array(
									'before' => '', 
									'after' => '', 
									'next_or_number' => 'number', 
									'echo' => '0'));

	if ( $link_pages != '' ) {
		echo '<nav class="navigation-mb"><div class="dp-pagenavi clearfix">';
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
?>
</div>
	<?php // Single footer widget
		if (($postType === 'post') && is_active_sidebar('bottom-of-post-mobile') && !post_password_required()) : ?>
<div id="single-footer-widget" class="clearfix entry">
	<?php dynamic_sidebar( 'bottom-of-post-mobile' ); ?>
</div>
	<?php
		endif;
		// Meta info
		showPostMetaForSingleBottom($postType);

		include (TEMPLATEPATH . '/' . DP_MOBILE_THEME_DIR . '/related_posts.php');
		if (function_exists('similar_posts')) {
			echo '<aside class="entry similar-posts">';
			similar_posts();
			echo '</aside>';
		}
		// Comment
		comments_template();
		?>
</article>
<?php
	endwhile; 
?>
<?php 
// Prev next post navigation link
$in_same_cat = $options['next_prev_in_same_cat'] ? true : false;
// Next post title
$next_post = get_next_post($in_same_cat);
// Previous post title
$prev_post = get_previous_post($in_same_cat);
if ($prev_post || $next_post) : 
?>


<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fjessee.me&amp;width=300&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=274560726015162" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:290px;" allowTransparency="true"></iframe>

<nav class="navigation-mb singlenav-mb clearfix">
<?php 
	$img_tag = '';
	if ($prev_post) {
		if ($postType === 'post') {
			$img_tag = show_post_thumbnail(100, 73, $prev_post->ID);
			if ($img_tag) {
				$img_tag = '<span class="nav-prev-thumb">'.$img_tag.'</span>';
			}
		}
		echo '<div class="navialignleft-mb" title="'.$prev_post->post_title.'"><a href="'.get_permalink($prev_post->ID).'">'.$img_tag.'<span>PREV</span></a></div>';
	} else {
		echo '<div class="navialignleft-mb"><span>'.__('Oldest Post', 'DigiPress').'</span></div>';
	}
	if ($next_post) {
		if ($postType === 'post') {
			$img_tag = show_post_thumbnail(100, 73, $next_post->ID);
			if ($img_tag) {
				$img_tag = '<span class="nav-next-thumb">'.$img_tag.'</span>';
			}
		}
		echo '<div class="navialignright-mb" title="'.$next_post->post_title.'"><a href="'.get_permalink($next_post->ID).'"><span>NEXT</span>'.$img_tag.'</a></div>';
	} else {
		echo '<div class="navialignright-mb"><span>'.__('Newest Post', 'DigiPress').'</span></div>';
	}
?>
</nav>
<?php endif; ?>
<?php
else : // else (have_posts())
?>
<article class="post">
<header><h1 class="entry-title posttitle"><?php _e('Not Found.', 'DigiPress'); ?></h1></header>
<div class="entry entry-content">
<p><?php _e('Apologies, but the page you requested could not be found. <br />Perhaps searching will help.', 'DigiPress'); ?></p>
</div>
</article>
<?php 
endif; 	// End of have_posts() 
?>
</div><?php // End of content ?>
</div><?php // End of container ?>
</div><?php // End of wrap ?>
<?php 
include (TEMPLATEPATH . "/mobile-theme/footer.php");
wp_footer();

$fb_flg = false;

//For SNS Buttons
if ($options['sns_button_under_title'] || $options['sns_button_on_meta']) {
	if (!$hideSNSIconFlag ) {
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
		if ($options['show_facebook_button']) {
			// Get Facebook App ID
			$fb_app_id =  ($options['fb_app_id'] != '') ? '&appId='.$options['fb_app_id'] : '';
			if ($fb_app_id) {
				$fb_app_id = ($FB_APP_ID) ? '&appId='.$FB_APP_ID : '';
			}

			echo '<div id="fb-root"></div><script type="text/javascript">(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id;js.async = true; js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1' . $fb_app_id . '"; fjs.parentNode.insertBefore(js, fjs);}(document, "script", "facebook-jssdk"));</script>';
			// Set to true
			$fb_flg = true;
		}
		if ($options['show_twitter_button']) {
			echo '<script type="text/javascript">!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
		}
	} else if ($EXIST_FB_LIKE_BOX) {
		$fb_app_id =  ($options['fb_app_id'] != '') ? '&appId='.$options['fb_app_id'] : '';
		if ($fb_app_id) {
			$fb_app_id = ($FB_APP_ID) ? '&appId='.$FB_APP_ID : '';
		}

		echo '<div id="fb-root"></div><script type="text/javascript">(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id;js.async = true; js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1' . $fb_app_id . '"; fjs.parentNode.insertBefore(js, fjs);}(document, "script", "facebook-jssdk"));</script>';
		// Set to true
		$fb_flg = true;
	}
}

if (!$fb_flg && $options['facebookcomment']) {
	// Get Facebook App ID
	$fb_app_id =  ($options['fb_app_id'] != '') ? '&appId='.$options['fb_app_id'] : '';
	if ($fb_app_id) {
		$fb_app_id = ($FB_APP_ID) ? '&appId='.$FB_APP_ID : '';
	}

	echo '<div id="fb-root"></div><script type="text/javascript">(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id;js.async = true; js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1' . $fb_app_id . '"; fjs.parentNode.insertBefore(js, fjs);}(document, "script", "facebook-jssdk"));</script>';

	$fb_flg = true;
}
?>
</body>
</html>