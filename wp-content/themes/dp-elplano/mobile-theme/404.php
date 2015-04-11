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
<section class="dp_topbar_title"><?php dp_breadcrumb(); ?></section>
<div class="breadcrumb_arrow aligncenter"><span>Not Found.</span></div>
<div id="container" class="clearfix">
<div id="content" class="content">
<article class="post">
<header><h1 class="posttitle"><?php _e('Not Found.', 'DigiPress'); ?></h1></header>
<div class="entry">
<p class="ooops icon-404"><span>Oppps!</span></p>
<p><?php _e('Apologies, but the page you requested could not be found. <br />Perhaps searching will help.', 'DigiPress'); ?></p>
</div>
</article>
</div><?php // End of content ?>
</div><?php // End of container ?>
</div><?php // End of wrap ?>
<?php 
include (TEMPLATEPATH . "/mobile-theme/footer.php");
wp_footer();
?>
</body>
</html>