<?php 
/* ------------------------------------------
   This template is for mobile device!!!!!!!
 ------------------------------------------*/
include (TEMPLATEPATH . '/' . DP_MOBILE_THEME_DIR . '/header.php');
?>
<body <?php body_class(); ?>>
<div id="wrap" class="mobile">
<?php include (TEMPLATEPATH . '/' . DP_MOBILE_THEME_DIR . '/top-menu.php'); ?>
<header id="header_area">
<?php dp_banner_contents_mobile(); ?>
</header>
<?php 
if (is_home() && !is_paged()) : // Top Page
	// Show headline
	dp_headline();
else :	
// Except Top Page ?>
<section class="dp_topbar_title"><?php dp_breadcrumb(); ?></section>
<div class="breadcrumb_arrow aligncenter"><span>Articles</span></div>
<?php
endif; 
?>
<div id="container" class="clearfix">
<div id="content" class="content">
<?php
// Widget
if (is_active_sidebar('widget-top-container-mobile')) : 
?>
<div id="top-container-widget"><div id="top-content-widget" class="entry">
<?php dynamic_sidebar( 'widget-top-container-mobile' ); ?>
</div></div>
<?php 
endif;

// Display under content
if ($options['show_top_under_content']) {
	include (TEMPLATEPATH . '/' . DP_MOBILE_THEME_DIR . '/index-under.php');
}
?>
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