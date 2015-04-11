<?php
// Default list
function show_mobile_top_menu_list() {
	global $options;
	$rss_feed_code = $options['rss_to_feedly'] ? '<li><a href="http://cloud.feedly.com/#subscription%2Ffeed%2F'.urlencode(get_feed_link()).'" target="blank" title="Follow on feedly" class="icon-feedly"><span>Follow on feedly</span></a></li>' : '<li><a href="'. get_feed_link() .'" title="Subscribe Feed" target="_blank" class="icon-rss"><span>RSS</span></a></li>';
	?>
<ul id="top_menu_mobile" class="clearfix">
<li><a href="<?php echo home_url(); ?>" title="HOME" class="icon-home"><span>Home</span></a></li>
<?php echo $rss_feed_code; ?>
</ul>
<?php 
}
?>
<nav id="mb_header_menu">
<div id="mb_header_menu_list">
<?php
// Custom Menu
if (function_exists('wp_nav_menu')) {
	wp_nav_menu(array(
		'menu_id'			=> 'top_menu_mobile',
		'menu_class'		=> 'clearfix',
		'theme_location'	=> 'top_menu_mobile',
		'container'			=> '',
		'depth'				=> 1,	
		'fallback_cb'		=> 'show_mobile_top_menu_list',
		'walker'			=> new description_walker()
	));
} else {
	// Default menu list
	show_mobile_top_menu_list();
}
// Display SNS RSS list
show_sns_rss_list_in_menu();
?>
<?php
// Search Form
if ($options['show_fixed_menu_search']) {
	if ($options['show_floating_gcs']) {
		echo "<gcse:searchbox-only></gcse:searchbox-only>";
	} else {
		get_search_form();
	}
}
?>
</div>
<div id="mb_header_menu_arrow" class="icon-menu"><span>MENU</span></div>
</nav>