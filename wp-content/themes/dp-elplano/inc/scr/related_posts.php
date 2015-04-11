<?php
if (post_password_required()) return;

if ((get_post_type() === 'post') && is_single() && $options['show_related_posts']) : 
	if ($options['related_posts_style'] === 'horizon') : ?>
<aside class="dp_related_posts_horizon clearfix">
<?php
	else :
?>
<aside class="dp_related_posts_vertical clearfix">
<?php 
	endif;
?>
<h3 class="posttitle"><?php echo $options['related_posts_title']; ?></h3>
<ul>
	<?php
	// Get related posts
	$number_posts	= $options['number_related_posts'];
	// Thumbnail size
	$width			= 300;
	$height			= 261;

	$one_col_css	= '';

	// 1 Column
	if ($options['related_posts_style'] === 'horizon') {
		if ($options_visual['dp_column'] === "1" || get_post_meta(get_the_ID(), 'disable_sidebar', true)) {
			$one_col_css	= ' rel_post_1col';
		} else if ($options_visual['dp_column'] === "3") {
			$one_col_css	= ' rel_post_3col';
		}
	}

	// Target
	if ($options['related_posts_target'] === '2') {
		$cat = get_the_category();
		$cat = $cat[0];
		$args = array(
			'numberposts'	=> $number_posts,
			'category'		=> $cat->cat_ID,
			'exclude'		=> $post->ID
			);

	} else if ($options['related_posts_target'] === '3') {
		$cat = get_the_category();
		$cat = $cat[0];
		$args = array(
			'numberposts'	=> $number_posts,
			'category'		=> $cat->cat_ID,
			'exclude'		=> $post->ID,
			'orderby'		=> 'rand'
			);

	} else {
		$tagIDs		= array();
		$tags		= wp_get_post_tags($post->ID);
		$tagcount 	= count($tags);
		for ($i = 0; $i < $tagcount; $i++) {
			$tagIDs[$i] = $tags[$i]->term_id;
		}
		$args = array(
			'tag__in'			=> $tagIDs,
			'post__not_in'		=> array($post->ID),
			'numberposts'		=> $number_posts,
			'exclude'			=> $post->ID,
			'caller_get_posts'	=> 1
			);
	}

	// Query
	$my_query = get_posts($args);

	// Display
	if ($my_query) :
		foreach ( $my_query as $post ) : setup_postdata( $post );
			$title = the_title('', '', false); 
?>
<li class="clearfix <?php echo $one_col_css; ?>">
<?php 
			//If show thumbnail
			if ($options['related_posts_thumbnail']) : 
				if ($options['related_posts_style'] === 'horizon') {
					if (mb_strlen($title) > 52) $title = mb_substr($title, 0, 51).'...';
				}
?>
<div class="widget-post-thumb"><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php echo show_post_thumbnail($width, $height); ?></a></div>
<?php 
			endif;
			if ( $options['show_pubdate_on_meta'] && $options['related_posts_style'] === 'vertical') :
?>
<div class="excerpt_div">
<time datetime="<?php the_time('c'); ?>" pubdate="pubdate" class="icon-calendar"><?php echo get_the_date();?></time>
</div>
<?php
			endif;
?>
<h4><a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php echo $title; ?></a></h4>
<?php 
			if ($options['related_posts_category']) :
?>
<div class="entrylist-cat"><?php the_category(' ') ?></div>
<?php 
			endif;
?>
</li>
<?php
		endforeach; 
		wp_reset_postdata();
	else :
?>
<li><?php _e('No related posts yet.', 'DigiPress'); ?></li>
<?php 
	endif;
?>
</ul>
</aside>
<?php 
endif;
?>