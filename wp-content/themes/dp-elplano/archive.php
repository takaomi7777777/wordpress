<?php 
// Get column number
$col_num = get_column_num();
// Header
get_header(); 
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
<div class="breadcrumb_arrow aligncenter"><span>Articles</span></div>
<?php

// Container widget
if (is_active_sidebar('widget-top-container')) : ?>
<div id="top-container-widget" class="clearfix entry">
<?php dynamic_sidebar( 'widget-top-container' ); ?>
</div>
<?php endif; ?>
<div id="content" class="content">
<?php if (have_posts()) :
		// Content widget
		if ((get_post_type() === 'post') && is_active_sidebar('widget-top-content')) : 
?>
<div id="top-content-widget" class="clearfix entry">
<?php dynamic_sidebar( 'widget-top-content' ); ?>
</div>
<?php 
		endif;

// Excerpt length
$excerpt_length = 120;

//For thumbnail size
$width = 600;
$height = 440;

$hatebuNumberCode 	= '';
$tweetCountCode		= '';
$fbLikeCountCode	= '';

// ***********************************
// Archive style
$archive_style = 'normal';
$archive_normal_style = '';

// Common style
switch ($options['archive_post_show_type']) {
	case 'normal':
		if ($options['archive_excerpt_type'] == 'all') {
			$archive_normal_style = $options['archive_excerpt_type'];
		} else {
			$archive_normal_style = 'excerpt';
		}
		break;

	case 'table':
		$archive_style = 'table';
		break;

	case 'gallery':
		$archive_style = 'gallery';
		break;
}
// Only category page
if ($options['show_type_cat_normal'] && is_category(explode(',', $options['show_type_cat_normal']))) {
	$archive_style = 'normal';
	$archive_normal_style = 'excerpt';
} else if ($options['show_type_cat_portfolio'] && is_category(explode(',', $options['show_type_cat_portfolio']))) {
	$archive_style = 'table';
} else if ($options['show_type_cat_magazine'] && is_category(explode(',', $options['show_type_cat_magazine']))) {
	$archive_style = 'gallery';
}
// ***********************************


//If top posts show as normal view
if ( $archive_style == 'normal' ) : 
?>
<div id="entry-pager-div">
<?php
	//Loop each post
	while (have_posts()) : the_post(); ?>
<?php //All or Excerpt
		// Post format
		$postFormat = get_post_format($post->ID);

		// Get icon class each post format
		$titleIconClass = postFormatIcon($postFormat);

		// Post title
		$post_title =  the_title('', '', false) ? the_title('', '', false) : __('No Title', 'DigiPress');

		// Check the first or last
		$firstPostClass = dp_is_first() ? 'first-post': '';
		$lastPostClass = dp_is_last() ? 'last-post': '';
		// even of odd
		$evenOddClass = (++$i % 2 === 0) ? 'evenpost' : 'oddpost';

		// ************* SNS sahre number *****************
		// hatebu
		if ($options['hatebu_number_after_title_archive']) {
			$hatebuNumberCode = '<div class="loop-share-num bg-hatebu"><span class="share-num"></span>users</div>';
		}
		// Count tweets
		if ($options['tweet_number_after_title_archive']) {
			$tweetCountCode = '<div class="loop-share-num bg-tweets"><span class="share-num"></span>RT</div>';
		}
		// Count Facebook Like 
		if ($options['likes_number_after_title_archive']) {
			$fbLikeCountCode = '<div class="loop-share-num bg-likes"><span class="share-num"></span>likes</div>';
		}
		// ************* SNS sahre number *****************
		

		if ( $archive_normal_style == 'all' ) : 	
		// All shows 
?>
<article id="post-<?php the_ID(); ?>" class="hentry post <?php echo $evenOddClass . ' ' . $firstPostClass . ' ' . $lastPostClass; ?>">
<?php 
			if ($postFormat === 'quote'): // Check the post format 
?>
<header><h1 class="entry-title posttitle<?php echo $titleIconClass; ?>"><?php _e('Quote', 'DigiPress'); ?></h1></header>
<?php 
			elseif ($postFormat === 'status'): 
?>
<div class="clearfix"><header class="inline-bl"><h1 class="mg8px-btm ft12px mg6px-top"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="ft12px" title="<?php _e('Articles of this user', 'DigiPress'); ?>"><?php the_author_meta( 'display_name' ); ?></a></h1><h2 class="ft14px"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo get_the_date(); ?></h2></a></header>
<div class="fl-l"><?php echo get_avatar($comment,$size='50'); ?></div></div>
<?php 
			else: 	// $archive_normal_style == 'all'
?>
<header><h1 class="entry-title posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="title-link <?php echo $titleIconClass; ?>"><?php echo $post_title; ?></a></h1><?php echo $hatebuNumberCode . $tweetCountCode . $fbLikeCountCode; ?></header>
<?php 
			endif; 	// $archive_normal_style == 'all'
?>
<div class="entry">
<?php the_content(__('Read more', 'DigiPress')); ?>
<footer><?php showPostMetaForArchive($postFormat); ?></footer>
</div>
<script>j$(function() {get_sns_share_count('<?php the_permalink(); ?>', 'post-<?php the_ID(); ?>');});</script>
</article>
		<?php else : 	// $archive_normal_style == 'all'
				// Show excerpt view 
?>
<article id="post-<?php the_ID(); ?>" class="hentry post_excerpt <?php echo $evenOddClass . ' ' . $firstPostClass . ' ' . $lastPostClass; ?>"><div class="clearfix pd20px-btm">
<div class="post_thumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
<?php // Get thumbnail
echo show_post_thumbnail($width, $height);
?>
</a></div>
<div class="excerpt_div">
<header><h1 class="entry-title excerpt_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="title-link <?php echo $titleIconClass; ?>">
<?php
			if ($postFormat === 'quote'): // Check the post format 
				_e('Quote', 'DigiPress');
			else :
				echo $post_title;
			endif;
?>
</a></h1><?php echo $hatebuNumberCode . $tweetCountCode . $fbLikeCountCode; ?></header>
<div class="entry_excerpt">
<?php	//Post excerpt
		$desc = strip_tags(get_the_excerpt());
		if (mb_strlen($desc) > $excerpt_length) $desc = mb_substr($desc, 0, $excerpt_length).'...';
		echo '<p class="entry-summary">'.$desc.'</p>'; ?>
</div></div></div>
<footer><?php showPostMetaForArchive(false); ?></footer>
<script>j$(function() {get_sns_share_count('<?php the_permalink(); ?>', 'post-<?php the_ID(); ?>');});</script>
</article>
	<?php endif; // End if 
	endwhile; 
?>
</div><?php // End of "entry-pager-div" class ?>
<?php 
	//If top posts show as table view
	elseif ($archive_style == 'table') : 
?>
<section id="post-table-section" class="clearfix">
	<?php

	if ($col_num == 1) {
			echo '<ul id="top-posts-ul-top-1col">';
		} else {
			echo '<ul id="top-posts-ul">';
		}

	//For thumbnail size
	$width = 600;
	$height = 440;

	$titleStrCount = 184;

	//Loop each post
	while (have_posts()) : the_post();
		// Post format
		$postFormat = get_post_format($post->ID);

		// Get icon class each post format
		$titleIconClass = postFormatIcon($postFormat);

		// Check the last
		$lastPostClass = dp_is_last() ? 'last-post': '';
		// even of odd
		$evenOddClass = (++$i % 2 === 0) ? 'evenpost' : 'oddpost';

		// Post title
		$post_title =  the_title('', '', false) ? the_title('', '', false) : __('No Title', 'DigiPress');
		
		// ************* SNS sahre number *****************
		// hatebu
		if ($options['hatebu_number_after_title_archive']) {
			$hatebuNumberCode = '<div class="loop-share-num bg-hatebu"><span class="share-num"></span>users</div>';
		}
		// Count tweets
		if ($options['tweet_number_after_title_archive']) {
			$tweetCountCode = '<div class="loop-share-num bg-tweets"><span class="share-num"></span>RT</div>';
		}
		// Count Facebook Like 
		if ($options['likes_number_after_title_archive']) {
			$fbLikeCountCode = '<div class="loop-share-num bg-likes"><span class="share-num"></span>likes</div>';
		}
		// ************* SNS sahre number *****************
	
		if (mb_strlen($post_title, 'UTF-8') > $titleStrCount) $post_title = mb_substr($post_title, 0, $titleStrCount, 'UTF-8') . '...';
		?>
<li class="<?php echo $evenOddClass . ' ' . $lastPostClass; ?>">
<article id="post-<?php the_ID(); ?>" class="hentry post">
<div class="post_thumb_portfolio"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo show_post_thumbnail($width, $height); ?></a></div>
<div class="post_tbl_div">
<div class="post_info_portfolio clearfix">
<a href="<?php the_permalink() ?>" rel="bookmark">
<header><h1 class="entry-title top-tbl-title<?php echo $titleIconClass; ?>"><?php
			if ($postFormat === 'quote'): // Check the post format 
				_e('Quote', 'DigiPress');
			else :
				echo $post_title;
			endif;
?></h1></header>
</a>
</div>
</div>
<footer class="tbl_meta">
		<?php //Posted date
		if ( $options['show_pubdate_on_meta'] ) : ?>
<span class="icon-calendar">
<time datetime="<?php the_time('c'); ?>" pubdate="pubdate" class="date updated"><?php echo get_the_date(); ?></time>
</span>
<?php 
		endif; 
		
		// Comments
		if ( comments_open() ) : // If comment is open ?>
<span class="icon-comment"><?php comments_popup_link(
							__('No Comment', 'DigiPress'), 
							__('Comment(1)', 'DigiPress'), 
							__('Comments(%)', 'DigiPress')); ?></span>
<?php 
		endif;

		// Views
		if ($options['show_views_on_meta'] && function_exists('dp_count_post_views')) : ?>
<span class="icon-eye"><?php echo dp_count_post_views(get_the_ID()); ?></span>
		<?php endif;

		// Shares
		echo $hatebuNumberCode . $tweetCountCode . $fbLikeCountCode;

		// Author
		if ($options['show_author_on_meta']) : 

			echo '<span class="icon-user vcard author"><a href="'.get_author_posts_url(get_the_author_meta('ID')).'" rel="author" title="'.__('Show articles of this user.', 'DigiPress').'" class="fn">'.get_the_author_meta('display_name').'</a></span>';
		endif;

		// Edit Post Link(If logged in.)
		edit_post_link(__('Edit', 'DigiPress'), ' | ');
?>
</footer>
<script>j$(function() {get_sns_share_count('<?php the_permalink(); ?>', 'post-<?php the_ID(); ?>');});</script>
</article>
</li>
<?php endwhile; ?>
</ul>
</section>
<?php // If posts show as gallery style
	elseif ($archive_style == 'gallery') : ?>
<section id="post-table-section" class="clearfix">
	<?php
	if ( $col_num == 1 ) {
		echo '<div id="gallery-style-1col">';
	} else {
		echo '<div id="gallery-style">';
	}
	
	//For thumbnail size
	$width = 600;
	$height = 440;

	$desc = '';

	//Loop each post
	while (have_posts()) : the_post();

		// Post format
		$postFormat = get_post_format($post->ID);

		// Get icon class each post format
		$titleIconClass = postFormatIcon($postFormat);

		// Check the last
		$lastPostClass = dp_is_last() ? 'last-post': '';
		// even of odd
		$evenOddClass = (++$i % 2 === 0) ? 'evenpost gh' : 'oddpost gh';
		
		// Post title
		$post_title =  the_title('', '', false) ? the_title('', '', false) : __('No Title', 'DigiPress');

		//$itemHeight = rand(1, 5);
		
		// ************* SNS sahre number *****************
		// hatebu
		if ($options['hatebu_number_after_title_archive']) {
			$hatebuNumberCode = '<div class="loop-share-num bg-hatebu"><span class="share-num"></span>users</div>';
		}
		// Count tweets
		if ($options['tweet_number_after_title_archive']) {
			$tweetCountCode = '<div class="loop-share-num bg-tweets"><span class="share-num"></span>RT</div>';
		}
		// Count Facebook Like 
		if ($options['likes_number_after_title_archive']) {
			$fbLikeCountCode = '<div class="loop-share-num bg-likes"><span class="share-num"></span>likes</div>';
		}
		// ************* SNS sahre number *****************

		$desc = strip_tags(get_the_excerpt());
		if (mb_strlen($desc) > $excerpt_length) $desc = mb_substr($desc, 0, $excerpt_length).'…';
	?>
<article id="post-<?php the_ID(); ?>" class="hentry g_item post clearfix <?php echo $evenOddClass . $itemHeight . ' ' . $lastPostClass; ?>">
<div class="post_thumb_gallery"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo show_post_thumbnail($width, $height); ?></a></div>
<header><h1 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="title-link <?php echo $titleIconClass; ?>"><?php
			if ($postFormat === 'quote'): // Check the post format 
				_e('Quote', 'DigiPress');
			else :
				echo $post_title;
			endif;
?></a></h1></header>
<div class="g_item_desc entry-summary"><?php echo $desc; ?></div>
<footer class="tbl_meta">
		<?php 
		//Posted date
		if ( $options['show_pubdate_on_meta'] ) : ?>
<span class="icon-calendar">
<time datetime="<?php the_time('c'); ?>" pubdate="pubdate" class="updated"><?php echo get_the_date(); ?></time>
</span>
<?php 
		endif; 

		// Comments		
		if ( comments_open() ) : // If comment is open ?>
<span class="icon-comment"><?php comments_popup_link(
							__('No Comment', 'DigiPress'), 
							__('Comment(1)', 'DigiPress'), 
							__('Comments(%)', 'DigiPress')); ?></span>
<?php 
		endif;
		
		// Views
		if ($options['show_views_on_meta'] && function_exists('dp_count_post_views')) : ?>
<span class="icon-eye"><?php echo dp_count_post_views(get_the_ID()); ?></span>
<?php 
		endif;

		// Shares
		echo $hatebuNumberCode . $tweetCountCode . $fbLikeCountCode;

		// Author
		if ($options['show_author_on_meta']) :
			echo '<span class="icon-user vcard author"><a href="'.get_author_posts_url(get_the_author_meta('ID')).'" rel="author" title="'.__('Show articles of this user.', 'DigiPress').'" class="fn">'.get_the_author_meta('display_name').'</a></span>';
		endif;

		// Edit Post Link(If logged in.)
		edit_post_link(__('Edit', 'DigiPress'), ' | ');
?>
</footer>
<script>j$(function() {get_sns_share_count('<?php the_permalink(); ?>', 'post-<?php the_ID(); ?>');});</script>
</article>
<?php 
	endwhile; 
?>
</div>
</section>
<?php 
endif;

	// Page navigation
	if ($options['autopager'] || !is_paged()) : ?>
<nav class="navigation clearfix"><div class="nav_to_paged"><?php next_posts_link($options['navigation_text_to_2page_archive']) ?></div></nav>
<?php 
	else: 
		// Paged 
		if (function_exists('wp_pagenavi')) : ?>
<nav class="navigation clearfix"><?php wp_pagenavi(); ?></nav>
<?php
		else :
?>
<nav class="navigation clearfix">
<?php
			if ($options['pagenation']) :
				dp_pagenavi();
			else : 
?>
<div class="navialignleft"><?php previous_posts_link(__('<span> PREV</span>', '')) ?></div>
<div class="navialignright"><?php next_posts_link(__('<span>NEXT</span>', '')) ?></div>
<?php
			endif; // $options['pagenation'] ?>
</nav>
<?php
		endif; // function_exists('wp_pagenavi')
	endif; // $options['autopager'] || !is_paged()

	// Content bottom widget
	if (is_active_sidebar('widget-top-content-bottom')) :
?>
<div id="top-content-bottom-widget" class="clearfix entry">
<?php dynamic_sidebar( 'widget-top-content-bottom' ); ?>
</div>
<?php
	endif;
?>
<?php else : ?>
<article class="post">
<header><h1 class="posttitle"><?php _e('Not found.','DigiPress'); ?></h1></header>
<div class="entry">
<p class="ooops icon-attention"><span>Oppps!</span></p>
<p><?php _e('Apologies, but the page you requested could not be found. <br />Perhaps searching will help.', 'DigiPress'); ?></p>
</div>
</article>
<?php endif; ?>
</div>
<?php
// Side bar
if ($col_num == 2) {
	get_sidebar();
} else if ( $col_num == 3){
	get_sidebar();
	get_sidebar('2');
}
?>
</div>
<?php get_footer(); ?>
<?php if ($EXIST_FB_LIKE_BOX) : ?>
<div id="fb-root"></div><script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.async = true;js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=<?php echo $FB_APP_ID; ?>";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
<?php endif; ?>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</body>
</html>