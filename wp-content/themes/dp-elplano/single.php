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
if (($postType === 'post') && is_active_sidebar('widget-top-container')) : ?>
<div id="top-container-widget" class="clearfix entry">
<?php dynamic_sidebar( 'widget-top-container' ); ?>
</div>
<?php endif; ?>
<div id="content" class="content">
<?php if (have_posts()) :
		// Post format
		$postFormat = get_post_format();

		// Get icon class each post format
		$titleIconClass = postFormatIcon($postFormat);

		// Post title
		$post_title =  the_title('', '', false) ? the_title('', '', false) : __('No Title', 'DigiPress');

		// GET THE FLAG TO SHOW SNS ICON 
		$hideSNSIconFlag = get_post_meta(get_the_ID(), 'hide_sns_icon', true);

		// Get the flag to hide title
		$hideTitleFlag 	 = get_post_meta(get_the_ID(), 'dp_hide_title', true);

		// Content widget
		if (($postType === 'post') && is_active_sidebar('widget-top-content')) : ?>
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
<?php if ( $postFormat !== 'quote' && !$hideTitleFlag ) : ?> 
<header>
<h1 class="entry-title posttitle<?php echo $titleIconClass; ?>"><span><?php echo $post_title; ?></span></h1>
<?php
	// header meta
	if ( $options['show_pubdate_on_meta'] || $options['show_views_on_meta'] || $options['show_author_on_meta'] || $options['time_for_reading'] || ($options['sns_button_under_title'] && !get_post_meta(get_the_ID(), 'hide_sns_icon', true))) : 
		// Call meta contents
		showPostMetaForSingleTop($postFormat);
	 endif;
?>
</header>
<?php 
endif;
?>
<?php
	// Single header widget
	if (($postType === 'post') && is_active_sidebar('widget-post-header') && !post_password_required()) : ?>
<div id="single-header-widget" class="clearfix entry">
		<?php dynamic_sidebar( 'widget-post-header' ); ?>
</div>
	<?php endif; ?>
<div class="entry entry-content">
<?php
	// Show eyecatch image
	if(has_post_thumbnail() && $options['show_eyecatch_first'] && ($postType === 'post')) {
		$width 	= 620;
		$height	= 452;
		if ( $col_num == 1 || get_post_meta(get_the_ID(), 'disable_sidebar', true)) {
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
?>
</div>
	<?php // Single footer widget
		if (($postType === 'post') && is_active_sidebar('widget-post-footer') && !post_password_required()) : ?>
<div id="single-footer-widget" class="clearfix entry">
		<?php dynamic_sidebar( 'widget-post-footer' ); ?>
</div>
	<?php
		endif;
		
		// Meta
		showPostMetaForSingleBottom($postType);

		include_once(DP_THEME_DIR . '/inc/scr/related_posts.php');
		if (function_exists('similar_posts')) {
			echo '<aside class="similar-posts">';
			similar_posts();
			echo '</aside>';
		}
		// Comment
		comments_template();
		?>
</article>
<?php endwhile; ?>
<?php // Content bottom widget
if (($postType === 'post') && is_active_sidebar('widget-top-content-bottom')) :
?>
<div id="top-content-bottom-widget" class="clearfix entry">
<?php dynamic_sidebar( 'widget-top-content-bottom' ); ?>
</div>
<?php
endif;
?>
<?php 
// Custom post type
if ($postType !== 'post' && $postType !== 'page' && $postType !== 'attachment' && $postType !== 'revision') : 

	// Get title
	$customPostTypeObj = get_post_type_object(get_post_type());
	$customPostTypeTitle = esc_html($customPostTypeObj->labels->name);

	// Get posts
	$latest =  get_posts('numberposts=' . $options['new_post_count'] . '&post_type=' . $postType . '&exclude=' . $post->ID);
?>
<section class="new-entry">
<h1 class="newentrylist"><?php echo __('Other posts of ', 'DigiPress') . $customPostTypeTitle; ?></h1>
<div id="scrollentrybox-single">
<ul>
<?php 
	// Show posts of custom post type
	foreach( $latest as $post ) : setup_postdata($post); 
?>
<li class="clearfix">
<?php echo '<span class="entrylist-date">'.get_the_date().'</span>'; ?>
<a href="<?php the_permalink(); ?>" class="entrylist-title" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
</li>
<?php
	endforeach;
	wp_reset_postdata();
?>
</ul>
</div>
</section>
<?php
endif;	// End of custom post type
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
<nav class="navigation clearfix">
<?php 
	if ($prev_post) {
		echo '<div class="navialignleft tooltip" title="'.$prev_post->post_title.'"><a href="'.get_permalink($prev_post->ID).'"><span>PREV</span></a></div>';
	}
	if ($next_post) {
		echo '<div class="navialignright tooltip" title="'.$next_post->post_title.'"><a href="'.get_permalink($next_post->ID).'"><span>NEXT</span></a></div>';
	}
?>
</nav>
<?php 
endif;
else :
?>
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
		if ( $col_num == 2 ) {
			get_sidebar();
		} else if ( $col_num == 3){
			get_sidebar();
			get_sidebar('2');
		}
	}
?>
</div>
<?php get_footer(); ?>
<?php 
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

			$fb_flg = true;
		}
		if ($options['show_twitter_button']) {
			echo '<script type="text/javascript">!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
		}
	} else if ($EXIST_FB_LIKE_BOX && ($postType === 'post')) {
		$fb_app_id =  ($options['fb_app_id'] != '') ? '&appId='.$options['fb_app_id'] : '';
		if ($fb_app_id) {
			$fb_app_id = ($FB_APP_ID) ? '&appId='.$FB_APP_ID : '';
		}

		echo '<div id="fb-root"></div><script type="text/javascript">(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id;js.async = true; js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1' . $fb_app_id . '"; fjs.parentNode.insertBefore(js, fjs);}(document, "script", "facebook-jssdk"));</script>';

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


// Under this below is Facebook recommended box  
if ($options['facebookrecommend'] && $fb_app_id !== '') : ?>
<div class="fb-recommendations-bar mq-hide" data-href="<?php the_permalink(); ?>" data-trigger="<?php echo $options['fb_recommend_scroll']; ?>" data-read-time="<?php echo $options['fb_recommend_time']; ?>" data-action="<?php echo $options['fb_recommend_action']; ?>" data-side="<?php echo $options['fb_recommend_position']; ?>" num_recommendations="<?php echo $options['number_fb_recommend']; ?>"></div>
<?php endif; ?>
</body>
</html>