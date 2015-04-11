<?php 
if ( $options['show_top_content'] == false ) return;

$views				= '';
$hatebuImgCode		= '';
//$tweetCountCode		= '';
//$fbLikeCountCode	= '';

if (is_home() && !is_paged()) : ?>
<section class="new-entry">
<h1 class="newentrylist"><?php echo $options['new_post_label'];?></h1>
<div id="scrollentrybox">
<ul>
		<?php
		// For thumbnail size
		$width = 180;
		$height = 132;

		$feedUrl = get_bloginfo('rss2_url');
		
		// Query
		if ($options['show_specific_cat_index_top'] === 'cat') {
			if ($options['index_top_except_cat']) {
				// Add nimus each category id
				$cat_ids = preg_replace('/(\d+)/', '-${1}', $options['index_top_except_cat_id']);
				$latest =  get_posts($query_string . '&numberposts=' . $options['new_post_count'] . '&category=' . $cat_ids);
			} else {
				$latest =  get_posts($query_string . '&numberposts=' . $options['new_post_count'] . '&category=' . $options['specific_cat_index_top']);
			}

			$feedUrl = get_category_feed_link($options['specific_cat_index_top'], 'rss2');
		} else if ($options['show_specific_cat_index_top'] === 'custom') {
			$latest =  get_posts($query_string . '&numberposts=' . $options['new_post_count'] . '&post_type=' . $options['specific_post_type_index_top']);
			$feedUrl .= '?post_type=' . $options['specific_post_type_index_top'];
		} else {
			$latest = get_posts($query_string . '&numberposts=' . $options['new_post_count']);
		}
		
		foreach( $latest as $post ): setup_postdata($post);
			if (!get_post_meta(get_the_ID(), 'hide_in_index', true)) :
			// Count Hatena
			$hatebuImgCode = ($options['show_hatebu_number']) ? '<img src="http://b.hatena.ne.jp/entry/image/' . get_permalink() . '" alt="' . __('Bookmark number in hatena', 'DigiPress') . the_title(' - ', '', false) . '" class="hatebunumber" />' : '';
		?>
<li class="clearfix">
	<?php
	// Views
	if ($options['show_views_on_meta'] && function_exists('dp_count_post_views') && !$options['show_specific_cat_index_top'] === 'custom') {
		$views = '<span class="icon-eye ft11px">'.dp_count_post_views(get_the_ID()).'</span>';
	}
	// Thumbnail
	if ($options['show_thumbnail'] == true) {
		echo '<div class="widget-post-thumb"><a href="'.get_permalink().'" title="'.get_the_title().'">';
		// Get thumbnail
		echo show_post_thumbnail($width, $height);
		echo '</a></div>';
	}
	
	// Date
	if ( $options['show_pubdate'] == true ) echo '<span class="entrylist-date">'.get_the_date().'</span>';
	// Category
	if ($options['show_specific_cat_index_top'] !== 'custom' && $options['show_cat_entrylist']) : ?>
<div class="entrylist-cat"><?php the_category(' '); ?></div>
	<?php endif; ?>
<a href="<?php the_permalink(); ?>" class="entrylist-title" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> <?php echo $hatebuImgCode; ?> <?php if (comments_open() && $options['show_comment_num_index']) : ?><span class="icon-comment ft11px reverse-link"><?php comments_popup_link(
				__('No Comment', 'DigiPress'), 
				__('Comment(1)', 'DigiPress'), 
				__('Comments(%)', 'DigiPress')); ?></span><?php endif; ?> <?php echo $views; ?></li>
		<?php
		endif;
		endforeach;
		// Reset Query
		wp_reset_postdata();
		?>
</ul>
</div>
<a href="<?php echo $feedUrl; ?>" title="RSS of this list" class="show-this-rss icon-rss"><span>RSS</span></a>
</section>
<?php endif; ?>