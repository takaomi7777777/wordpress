<nav id="fixed_menu">
<?php
function show_wp_fixed_menu_list() { ?>
<ul id="fixed_menu_ul">
<li <?php if (is_home()) { echo 'class="current_page_item"'; } ?>><a href="<?php echo home_url(); ?>" title="HOME" class="icon-home"><?php _e('HOME','DigiPress'); ?></a></li>
<li><a href="<?php echo get_feed_link(); ?>" target="_blank" title="feed" class="icon-rss">RSS</a></li>
</ul>
<?php
} //End Function

// Custom Menu
if (function_exists('wp_nav_menu')) {
	wp_nav_menu(array(
		'theme_location'	=> 'Fixed Menu',
		'container'			=> '',
		'menu_id'			=> 'fixed_menu_ul',
		'fallback_cb'		=> 'show_wp_fixed_menu_list',
		'walker'			=> new description_walker()
	));

} else {
	// Fixed Page List
	show_wp_fixed_menu_list();
}

echo '<div id="fixed_sform"><div class="hd_searchform">';
if ($options['show_fixed_menu_search']) {
	if ($options['show_floating_gcs']) {
		// Google Custom Search
		echo '<gcse:searchbox-only></gcse:searchbox-only>';
	} else {
		// Default search form
		include( TEMPLATEPATH."/searchform.php");
	}
}
if ($options['show_fixed_menu_sns']) {
	$facebook_list_code = $options['fixed_menu_fb_url'] ? '<li><a href="' . $options['fixed_menu_fb_url'] . '" title="Share on Facebook" target="_blank" class="icon-facebook"><span>Facebook</span></a></li>' : '';

	$twitter_list_code = $options['fixed_menu_twitter_url'] ? '<li><a href="' . $options['fixed_menu_twitter_url'] . '" title="Follow on Twitter" target="_blank" class="icon-twitter"><span>Twitter</span></a></li>' : '';

	$gplus_list_code = $options['fixed_menu_gplus_url'] ? '<li><a href="' . $options['fixed_menu_gplus_url'] . '" title="Google+" target="_blank" class="icon-gplus"><span>Google+</span></a></li>' : '';

	$rss_feed_code = $options['rss_to_feedly'] ? '<li><a href="http://cloud.feedly.com/#subscription%2Ffeed%2F'.urlencode(get_feed_link()).'" target="blank" title="Follow on feedly" class="icon-feedly"><span>Follow on feedly</span></a></li>' : '<li><a href="'. get_feed_link() .'" title="Subscribe Feed" target="_blank" class="icon-rss"><span>RSS</span></a></li>' ;

	echo '<div id="fixed_sns"><ul>'.$facebook_list_code.$twitter_list_code.$gplus_list_code.$rss_feed_code.'</ul></div>';
}
echo '</div></div>';
?>
<div id="expand_float_menu" class="icon-menu"><span>Menu</span></div>
</nav>