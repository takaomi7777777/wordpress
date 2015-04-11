<?php 
// Get column number
$col_num = get_column_num();
// Header
get_header(); 
?>
<body <?php body_class(); ?>>
<?php if (is_front_page() && !is_paged()) : ?>
	<?php if ($options_visual['header_area_low_height']) : ?>
<header id="header_area_half">
	<?php else: ?>
<header id="header_area">
	<?php endif; ?>
<?php else : ?>
<header id="header_area_paged">
<?php endif; ?>
<?php 
include (TEMPLATEPATH . "/fixed_menu.php");
dp_banner_contents();
?>
</header>
<?php 
if (is_home() && !is_paged()) : // Top Page
	// Show headline
	dp_headline();
else :
// Except Top Page 
?>
<section class="dp_topbar_title"><?php dp_breadcrumb(); ?></section>
<?php
endif; 
?>
<div id="container" class="clearfix">
<?php 
if (is_home() && is_paged()) : 
?>
<div class="breadcrumb_arrow aligncenter"><span>Articles</span></div>
<?php 
endif; 

// Container widget
if (is_active_sidebar('widget-top-container')) : ?>
<div id="top-container-widget" class="clearfix entry">
<?php dynamic_sidebar( 'widget-top-container' ); ?>
</div>
<?php endif; 

// Check column
if ( $col_num == 1 ) : 
?>
<div id="content-top-1col" class="content one-col">
<?php 
else : 
?>
<div id="content" class="content">
<?php 
endif; 
 
// Content widget
if (is_active_sidebar('widget-top-content')) : ?>
<div id="top-content-widget" class="clearfix entry">
<?php dynamic_sidebar( 'widget-top-content' ); ?>
</div>
<?php endif; ?>

<?php 
include (TEMPLATEPATH . "/index-top.php");
// show posts
if (have_posts()) :
	include (TEMPLATEPATH . "/index-under.php");
else : ?>
<article class="post">
<header><h1 class="posttitle"><?php _e('Not found.','DigiPress'); ?></h1></header>
<div class="entry">
<p><?php _e('Apologies, but the page you requested could not be found. <br />Perhaps searching will help.', 'DigiPress'); ?></p>
</div>
</article>
<?php endif; ?>
</div>
<?php
// Sidebar
if ($col_num == 2) {
	get_sidebar();
} else if ($col_num == 3) {
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