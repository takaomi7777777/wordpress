<?php get_header(); ?>
<body <?php body_class(); ?>>
<header id="header_area_paged">
<?php 
include (TEMPLATEPATH . "/fixed_menu.php");
dp_banner_contents();
?>
</header>
<section class="dp_topbar_title"><?php dp_breadcrumb(); ?></section>
<div id="container" class="clearfix">
<div class="breadcrumb_arrow aligncenter"><span>Not Found.</span></div>
<div id="content-top-1col" class="onecol">
<article class="post">
<header><h1 class="posttitle"><?php _e('Not Found.', 'DigiPress'); ?></h1></header>
<div class="entry">
<p class="ooops icon-404"><span>Oppps!</span></p>
<p><?php _e('Apologies, but the page you requested could not be found. <br />Perhaps searching will help.', 'DigiPress'); ?></p>
</div>
</article>
</div>
</div>
<?php get_footer(); ?>
</body>
</html>