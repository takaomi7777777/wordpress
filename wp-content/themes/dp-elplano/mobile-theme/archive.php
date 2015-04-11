<?php 
/* ------------------------------------------
   This template is for mobile device!!!!!!!
 ------------------------------------------*/

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
// show posts
if (have_posts()) :
	// Container widget
	if (is_active_sidebar('widget-top-container-mobile')) : ?>
<div id="top-container-widget"><div id="top-content-widget" class="entry">
<?php dynamic_sidebar( 'widget-top-container-mobile' ); ?>
</div></div>
<?php 
	endif;

	// Excerpt length
	$excerpt_length = 120;

	//For thumbnail size
	$width = 200;
	$height = 147;

	$mobile_class = is_mobile_dp() ? ' mobile': '';


	if ($archive_style == 'normal' || $archive_style == 'gallery') : 
		echo '<div id="posts-normal">';
	//Loop each post
	while (have_posts()) : the_post();
		// Post format
		$postFormat = get_post_format($post->ID);
		// Get icon class each post format
		$titleIconClass = postFormatIcon($postFormat);
		// Post title
		$post_title =  the_title('', '', false) ? the_title('', '', false) : __('No Title', 'DigiPress');

		// Check the first or last
		$firstPostClass = dp_is_first() ? 'first-post' : '';
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
		
		// Post views
		$postViewsCode = ($options['show_views_on_meta'] && function_exists('dp_count_post_views')) ? '<span class="icon-eye ft10px mg2px-l">'.dp_count_post_views(get_the_ID()).'</span>' : '';

		// Category
		$categoryCode = '';
		if ($options['show_cat_on_meta']) {
			$cat = get_the_category();
			if ($cat[0]->cat_name) {
				$categoryCode = '<span class="plane-label">' . $cat[0]->cat_name . '</span>';
			}
		}
		
// Post shows ?>
<article id="post-<?php the_ID(); ?>" class="hentry post_excerpt <?php echo $evenOddClass . ' ' . $firstPostClass . ' ' . $lastPostClass . $mobile_class; ?>"><div class="post_in_box clearfix">
<div class="widget-post-thumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php 
	// Get thumbnail
	echo show_post_thumbnail($width, $height);
?></a></div>
<div class="excerpt_div">
<header>
<?php 
// meta info
if ($options['show_pubdate_on_meta'] || $options['show_cat_on_meta']) : ?>
<div>
<?php
	if ( $options['show_pubdate_on_meta'] ) : ?>
<time datetime="<?php the_time('c'); ?>" pubdate="pubdate" class="icon-calendar updated"><?php echo get_the_date(); ?></time>
<?php endif; ?>
<?php echo $categoryCode; ?>
</div>
<?php
endif;
?>
<div class="excerpt_title_div">
<h1 class="entry-title excerpt_title<?php echo $titleIconClass; ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
<?php
	if ($postFormat === 'quote'): // Check the post format 
		_e('Quote', 'DigiPress');
	else :
		// Display Hatebu number
		echo $post_title;
	endif;
?>
</a></h1>
<?php echo $hatebuNumberCode . $tweetCountCode . $fbLikeCountCode . $postViewsCode; ?>
</div>
</header>
</div>
</div>
<script>j$(function() {get_sns_share_count('<?php the_permalink(); ?>', 'post-<?php the_ID(); ?>');});</script>
</article>
<?php endwhile; 
	echo '</div>';	// End of <div class="posts-normal">
?>

<?php 
//If top posts show as gallery view
else : 
?>
<section id="post-table-section" class="clearfix">
<div id="gallery-style">
	<?php
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
		$titleIconClass = $titleIconClass == '' ? ' class="entry-title"' : ' class="entry-title '.$titleIconClass.'"' ;

		// Check the last
		$lastPostClass = dp_is_last() ? 'last-post': '';
		// even of odd
		$evenOddClass = (++$i % 2 === 0) ? 'evenpost gh' : 'oddpost gh';

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

		// Category
		$categoryCode = '';
		if ($options['show_cat_on_meta']) {
			$cat = get_the_category();
			if ($cat[0]->cat_name) {
				$categoryCode = '<span class="plane-label">' . $cat[0]->cat_name . '</span>';
			}
		}

		//$itemHeight = rand(1, 5);
		
		$desc = get_the_excerpt();
		if (mb_strlen($desc) > $excerpt_length) $desc = mb_substr($desc, 0, $excerpt_length).'…';
?>
<article id="post-<?php the_ID(); ?>" class="hentry g_item post clearfix <?php echo $evenOddClass . $itemHeight . ' ' . $lastPostClass; ?>">
<div class="post_thumb_gallery"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo show_post_thumbnail($width, $height); ?></a></div>
<header><h1<?php echo $titleIconClass; ?>><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
<?php
		if ($postFormat === 'quote'): // Check the post format 
			_e('Quote', 'DigiPress');
		else :
			echo $post_title;
		endif;
?>
</a></h1></header>
<footer class="tbl_meta">
	<?php //Posted date
	if ( $options['show_pubdate_on_meta'] ) : ?>
<time datetime="<?php the_time('c'); ?>" pubdate="pubdate" class="icon-calendar updated"><?php echo get_the_date(); ?></time>
<?php 
// Display category
echo $categoryCode;
?>
	<?php endif; 
	if ( comments_open() ) : // If comment is open ?>
<span class="icon-comment"><?php comments_popup_link(
							__('No Comment', 'DigiPress'), 
							__('Comment(1)', 'DigiPress'), 
							__('Comments(%)', 'DigiPress')); ?></span>
	<?php endif; ?>
	<?php if ($options['show_views_on_meta'] && function_exists('dp_count_post_views')) : ?>
<span class="icon-eye"><?php echo dp_count_post_views(get_the_ID()); ?></span>
	<?php endif; ?>>
	<?php if ($options['show_author_on_meta']) : ?>
<span class="icon-user"><?php the_author_posts_link(); ?></span>
	<?php endif; ?>
<?php 
echo $hatebuNumberCode . $tweetCountCode . $fbLikeCountCode;

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
endif; // End of $options['top_post_show_type']
?>
<nav class="navigation-mb clearfix">
<?php 
	// Autopager
	if ($options['autopager_mb']) : ?>
<div class="nav_to_paged"><?php next_posts_link($options['navigation_text_to_2page_archive']) ?></div>
<?php 
	else: // Normal pagenation ?>
<?php
		// Maximum page number
		$max_page = intval($wp_query->max_num_pages);
		// Current page number	
		if ( get_query_var('paged') ) {
			$paged = intval(get_query_var('paged'));
		} elseif ( get_query_var('page') ) {
			$paged = intval(get_query_var('page'));
		} else {
			$paged = 1;
		}

		if ($max_page === 1) {
			if ($paged === 1) { // Only one page ?>
<div><span><?php echo $paged . '/' . $max_page; ?></span></div>
	<?php
			}
		} else if ($max_page > 1){
			if ($paged === 1) { ?>
<div class="navialignleft-mb"><span><?php _e('First page now', 'DigiPress') ?></span></div>
<div class="navialigncenter-mb"><span><?php echo $paged . '/' . $max_page; ?></span></div>
<div class="navialignright-mb"><?php next_posts_link(__('<span>NEXT</span>', '')) ?></div>
	<?php 
			} else if ($paged < $max_page) { ?>
<div class="navialignleft-mb"><?php previous_posts_link(__('<span>PREV</span>', '')) ?></div>
<div class="navialigncenter-mb"><span><?php echo $paged . '/' . $max_page; ?></span></div>
<div class="navialignright-mb"><?php next_posts_link(__('<span>NEXT</span>', '')) ?></div>
		<?php
			} else if ($paged === $max_page) { ?>
<div class="navialignleft-mb"><?php previous_posts_link(__('<span>PREV</span>', '')) ?></div>
<div class="navialigncenter-mb"><span><?php echo $paged . '/' . $max_page; ?></span></div>
<div class="navialignright-mb"><span><?php _e('No more page', 'DigiPress') ?></span></div>
		<?php
			} 
		}
		?>
<?php
	endif; // End of $options['autopager_mb']
?>
</nav>
<?php 
else : // else (have_posts()) 
?>
<article class="post">
<header><h1 class="posttitle"><?php _e('Not found.','DigiPress'); ?></h1></header>
<div class="entry">
<p><?php _e('Apologies, but the page you requested could not be found. <br />Perhaps searching will help.', 'DigiPress'); ?></p>
</div>
</article>
<?php endif; // if (have_posts()) END ?>
</div><?php // End of content ?>
</div><?php // End of container ?>
</div><?php // End of wrap ?>
<?php
include (TEMPLATEPATH . "/mobile-theme/footer.php");
wp_footer();
?>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</body>
</html>