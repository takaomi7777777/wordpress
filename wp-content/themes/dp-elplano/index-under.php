<?php 
if ( $options['show_top_under_content'] == false ) return;

// Excerpt length
$excerpt_length = 120;

//For thumbnail size
$width = 600;
$height = 440;

// Feed icon
$feedUrl = get_bloginfo('rss2_url');
if ($options['show_specific_cat_index'] === 'cat') {
	$feedUrl = get_category_feed_link($options['specific_cat_index'], 'rss2');
} else if ($options['show_specific_cat_index'] === 'custom') {
	$feedUrl .= '?post_type=' . $options['specific_post_type_index'];
}

$hatebuNumberCode 	= '';
$tweetCountCode		= '';
$fbLikeCountCode	= '';

//If top posts show as normal view
if ($options['top_post_show_type'] == 'normal') : ?>
<div id="entry-pager-div">
<?php 
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
		// Additional class
		//$arrPostClass = array($evenOddClass, $lastPostClass);

	if (!get_post_meta(get_the_ID(), 'hide_in_index', true)) : ?>
<?php //All or Excerpt

		// ************* SNS sahre number *****************
		// hatebu
		if ($options['hatebu_number_after_title_top']) {
			$hatebuNumberCode = '<div class="loop-share-num bg-hatebu"><span class="share-num"></span>users</div>';
		}
			
		// Count tweets
		if ($options['tweet_number_after_title_top']) {
			$tweetCountCode = '<div class="loop-share-num bg-tweets"><span class="share-num"></span>RT</div>';
		}

		// Count Facebook Like 
		if ($options['likes_number_after_title_top']) {
			$fbLikeCountCode = '<div class="loop-share-num bg-likes"><span class="share-num"></span>likes</div>';
		}
		// ************* SNS sahre number *****************

		
	if ( $options['top_excerpt_type'] === 'all' ) : 
?>
<article id="post-<?php the_ID(); ?>" class="hentry post clearfix <?php echo $evenOddClass . ' ' . $firstPostClass . ' ' . $lastPostClass; ?>">
<?php 
		// Check the post format 
		if ($postFormat === 'quote'): 
?>
<header><h1 class="entry-title posttitle<?php echo $titleIconClass; ?>"><?php _e('Quote', 'DigiPress'); ?></h1></header>
<?php 
		elseif ($postFormat === 'status') :
?>
<div class="clearfix"><header class="inline-bl"><h1 class="mg8px-btm ft12px mg6px-top"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="ft12px" title="<?php _e('Articles of this user', 'DigiPress'); ?>"><?php the_author_meta( 'display_name' ); ?></a></h1><h2 class="ft14px"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo get_the_date(); ?></h2></a></header>
<div class="fl-l"><?php echo get_avatar($comment,$size='50'); ?></div></div>
<?php 
		else : // else $postFormat
?>
<header><h1 class="entry-title posttitle<?php echo $titleIconClass; ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo $post_title; ?></a></h1><?php echo $hatebuNumberCode . $tweetCountCode . $fbLikeCountCode; ?></header>
<?php 
		endif; // End of if $postFormat
?>
<div class="entry-summary entry">
<?php the_content(__('Read more', 'DigiPress')); ?>
<footer><?php showPostMetaForArchive($postFormat); ?></footer>
</div>
<script>j$(function() {get_sns_share_count('<?php the_permalink(); ?>', 'post-<?php the_ID(); ?>');});</script>
</article>
	<?php else :	// Show excerpt view 
			// Additional class
			// array_push($arrPostClass, 'post_excerpt');
			// echo post_class($arrPostClass);
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
<?php 
		endif;
	endif;
endwhile; 
?>
</div><?php // End of "entry-pager-div" class ?>
<?php 

//If top posts show as table view
elseif ($options['top_post_show_type'] === 'table') : 
?>
<section id="post-table-section" class="clearfix">
<?php 
	if ($options['top_posts_table_title'] && !is_paged()) : 
?>
<h1 class="posttitle"><?php echo $options['top_posts_table_title']; ?></h1>
<?php 
	endif; 
?>
<?php
	if ( $col_num == 1) {
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
		$titleIconClass = $titleIconClass == '' ? '' : 'class="'.$titleIconClass.'"' ;

		// Check the last
		$lastPostClass = dp_is_last() ? 'last-post': '';
		// even of odd
		$evenOddClass = (++$i % 2 === 0) ? 'evenpost' : 'oddpost';

		if (!get_post_meta(get_the_ID(), 'hide_in_index', true)) :
			//Fix post title
			$post_title =  the_title('', '', false) ? the_title('', '', false) : __('No Title', 'DigiPress');
		
		// Hatebu
		if ($options['hatebu_number_after_title_top']) {
			$hatebuNumberCode = '<div class="loop-share-num bg-hatebu"><span class="share-num"></span>users</div>';
		}	
		// Count tweets
		if ($options['tweet_number_after_title_top']) {
			$tweetCountCode = '<div class="loop-share-num bg-tweets"><span class="share-num"></span>RT</div>';
		}
		// Count Facebook Like 
		if ($options['likes_number_after_title_top']) {
			$fbLikeCountCode = '<div class="loop-share-num bg-likes"><span class="share-num"></span>likes</div>';
		}
					
			if (mb_strlen($post_title, 'UTF-8') > $titleStrCount) $post_title = mb_substr($post_title, 0, $titleStrCount, 'UTF-8') . '...'; ?>
<li class="<?php echo $evenOddClass . ' ' . $lastPostClass; ?>">
<article id="post-<?php the_ID(); ?>" class="hentry post">
<div class="post_thumb_portfolio"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo show_post_thumbnail($width, $height); ?></a></div>
<div class="post_tbl_div">
<div class="post_info_portfolio clearfix">
<a href="<?php the_permalink() ?>" rel="bookmark">
<header><h1 class="entry-title top-tbl-title<?php echo $titleIconClass; ?>">
<?php
		if ($postFormat === 'quote'): // Check the post format 
			_e('Quote', 'DigiPress');
		else :
			echo $post_title;
		endif;
?>
</h1></header>
</a>
</div>
</div>
<footer class="tbl_meta">
<?php 
		//Posted date
		if ( $options['show_pubdate_on_meta'] ) : 
?>
<span class="icon-calendar">
<time datetime="<?php the_time('c'); ?>" pubdate="pubdate" class="updated"><?php echo get_the_date(); ?></time>
</span>
<?php 
		endif; // End of if $options['show_pubdate_on_meta']

		// Comments
		if ( comments_open() ) : // If comment is open 
?>
<span class="icon-comment"><?php comments_popup_link(
							__('No Comment', 'DigiPress'), 
							__('Comment(1)', 'DigiPress'), 
							__('Comments(%)', 'DigiPress')); ?></span>
<?php 
		endif;
?>
<?php 
		// Views
		if ($options['show_views_on_meta'] && function_exists('dp_count_post_views')) : 
?>
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
</li>
<?php
	endif;
	endwhile;
?>
</ul>
<?php if ($options['top_posts_table_title'] && !is_paged() ) : ?>
<a href="<?php echo $feedUrl; ?>" title="RSS of this list" class="show-this-rss icon-rss"><span>RSS</span></a>
<?php endif; ?>
</section>
<?php // If posts show as gallery style
elseif ($options['top_post_show_type'] === 'gallery') : ?>
<section id="post-table-section" class="clearfix">
	<?php if ($options['top_posts_table_title'] && !is_paged()) : ?>
<h1 class="posttitle"><?php echo $options['top_posts_table_title']; ?></h1>
	<?php endif; ?>
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

		// Post title
		$post_title =  the_title('', '', false) ? the_title('', '', false) : __('No Title', 'DigiPress');

		//$itemHeight = rand(1, 5);

		// Check the last
		$lastPostClass = dp_is_last() ? 'last-post': '';
		// even of odd
		$evenOddClass = (++$i % 2 === 0) ? 'evenpost gh' : 'oddpost gh';

		if (!get_post_meta(get_the_ID(), 'hide_in_index', true)) :

			// Hatebu
			if ($options['hatebu_number_after_title_top']) {
				$hatebuNumberCode = '<div class="loop-share-num bg-hatebu"><span class="share-num"></span>users</div>';
			}	
			// Count tweets
			if ($options['tweet_number_after_title_top']) {
				$tweetCountCode = '<div class="loop-share-num bg-tweets"><span class="share-num"></span>RT</div>';
			}
			// Count Facebook Like 
			if ($options['likes_number_after_title_top']) {
				$fbLikeCountCode = '<div class="loop-share-num bg-likes"><span class="share-num"></span>likes</div>';
			}

			$desc = strip_tags(get_the_excerpt());
			if (mb_strlen($desc) > $excerpt_length) $desc = mb_substr($desc, 0, $excerpt_length).'…';
	?>
<article id="post-<?php the_ID(); ?>" class="hentry g_item post clearfix <?php echo $evenOddClass . $itemHeight . ' ' . $lastPostClass; ?>">
<div class="post_thumb_gallery"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php echo show_post_thumbnail($width, $height); ?></a></div>
<header><h1 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="title-link <?php echo $titleIconClass; ?>">
<?php
			if ($postFormat === 'quote'): // Check the post format 
				_e('Quote', 'DigiPress');
			else :
				echo $post_title;
			endif;
?>
</a></h1></header>
<div class="entry-summary g_item_desc"><?php echo $desc; ?></div>
<footer class="tbl_meta">
<?php 
			//Posted date
			if ( $options['show_pubdate_on_meta'] ) : 
?>
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
		endif;	// !get_post_meta(get_the_ID(), 'hide_in_index', true)
	endwhile;
?>
</div>
<?php if ($options['top_posts_table_title'] && !is_paged()) : ?>
<a href="<?php echo $feedUrl; ?>" title="RSS of this list" class="show-this-rss icon-rss"><span>RSS</span></a>
<?php endif; ?>
</section>
<?php endif; ?>
<?php // Page navigation
// Front page
if ( $options['autopager'] || (is_front_page() && !is_paged()) ) : ?>
<nav class="navigation clearfix"><div class="nav_to_paged"><?php next_posts_link($options['navigation_text_to_2page']) ?></div></nav>
<?php 
else: // Paged 
	if (function_exists('wp_pagenavi')) : 
?>
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
<div class="navialignleft"><?php previous_posts_link(__('<span>PREV</span>', '')) ?></div>
<div class="navialignright"><?php next_posts_link(__('<span>NEXT</span>', '')) ?></div>
<?php 
		endif; 
?>
</nav>
<?php 
	endif;
endif;

// Content bottom widget
if (is_active_sidebar('widget-top-content-bottom')) : ?>
<div id="top-content-bottom-widget" class="clearfix entry">
<?php dynamic_sidebar( 'widget-top-content-bottom' ); ?>
</div>
<?php endif; ?>