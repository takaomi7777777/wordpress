<?php
// Default list
function show_mobile_footer_menu_list() { ?>
<ul id="footer_menu_mobile" class="clearfix">
<li><a href="<?php echo home_url(); ?>" title="HOME" class="icon-home"><span>Home</span></a>
<li><a href="<?php bloginfo('rss2_url'); ?>" title="Subscribe Feed" target="_blank" class="icon-rss"><span>RSS</span></a></li>
</li></ul>
<?php 
}
?>
<nav id="mb_footer_menu">
<div id="mb_footer_menu_list">
<?php
// Custom Menu
if (function_exists('wp_nav_menu')) {
	wp_nav_menu(array(
		'menu_id'			=> 'footer_menu_mobile',
		'menu_class'		=> 'clearfix',
		'theme_location'	=> 'footer_menu_mobile',
		'container'			=> '',
		'depth'				=> 1,	
		'fallback_cb'		=> 'show_mobile_footer_menu_list',
		'walker'			=> new description_walker()
	));
} else {
	// Default menu list
	show_mobile_footer_menu_list();
}
// Display SNS RSS list
show_sns_rss_list_in_menu();
?>
</div>
</nav>