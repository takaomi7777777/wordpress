<aside id="sidebar">
<?php 
	//All of other
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?>
<div class="widget-box widget_categories">
<h1><?php _e('Categories', 'DigiPress'); ?></h1>
<ul class="widget-ul">
		<?php wp_list_categories('show_count=0&child_of&hierarchical=1&title_li='); ?>
</ul>
</div>

<div class="widget-box">
<h1><?php _e('Recent Posts', 'DigiPress'); ?></h1>
		<?php
		$cat_id = get_query_var('cat');
		query_posts('&showposts=5&cat='.$cat_id);
		if (have_posts()) {
			// For thumbnail size
			$width = 90;
			$height = 53;
				
			echo '<ul class="recent_entries_w_thumb">';
			while (have_posts()) {
				the_post();
				echo '<li class="clearfix"><div class="widget-post-thumb"><a href="'.get_permalink().'" title="Permalink to '.the_title('', '', false).'">';
				show_post_thumbnail();
				echo '</a></div><a href="'.get_permalink().'" title="Permalink to '.the_title('', '', false).'">'.the_title('', '', false).'</a></li>';
			}
			echo '</ul>';
		}
		?>
</div>

<div class="widget-box">
<h1><?php _e('Archive', 'DigiPress'); ?></h1>
<ul class="widget-ul">
		<?php wp_get_archives('show_post_count=yes'); ?>
</ul>
</div>

<div class="widget-box">
<h1><?php _e('Subscribe', 'DigiPress'); ?></h1>
<ul class="dp_feed_widget clearfix">
		<?php echo ('<li><a href="'
					.get_bloginfo('rss2_url')
					.'" title="'.__('Subscribe feed', 'DigiPress')
					.'" target="_blank" class="dp_widget_feed_link"><span>RSS</span></a></li>'); ?>
</ul>
</div>
<?php endif; ?>
</aside>
