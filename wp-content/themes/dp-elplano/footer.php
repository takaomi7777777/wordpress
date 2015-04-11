<?php // Container footer widget
if (is_active_sidebar('widget-container-footer')) : ?>
<div id="container_footer">
<div id="content_footer" class="entry">
<?php dynamic_sidebar( 'widget-container-footer' ); ?>
</div>
</div>
<?php endif; ?>
<footer id="footer">
<?php // show footer widgets
	dp_get_footer();
?>
<div id="footer-bottom"><div id="ft-btm-content">&copy; <?php 
global $options;
if ($options['blog_start_year'] !== '') {
	echo $options['blog_start_year'] . '-' . date('Y');
} else {
	echo date('Y');
} ?> <a href="<?php echo home_url(); ?>/"><small><?php bloginfo('name'); ?></small></a>
</div></div>
</footer>
<?php 
if (is_home() && !is_paged()) :
?>
<a href="#site_title" id="gototop2" class="icon-up-open" title="Return Top"><span>Return Top</span></a>
<?php 
else :
?>
<a href="#header_area_paged" id="gototop2" class="icon-up-open" title="Return Top"><span>Return Top</span></a>
<?php
endif;
?>

<!--[if lt IE 7]>
<script type="text/javascript" src="<?php echo DP_THEME_URI; ?>/inc/js/nomoreie6.js"></script>
<![endif]-->
<?php wp_footer(); ?>