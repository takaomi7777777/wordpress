<?php // Container footer widget
if (is_active_sidebar('container-bottom-mobile')) : ?>
<div id="container_footer">
<div id="content_footer" class="entry">
<?php dynamic_sidebar( 'container-bottom-mobile' ); ?>
</div>
</div>
<?php endif; ?>
<footer id="footer">
<div id="ft-widget-container">
<div id="ft-widget-content">
<?php // show footer widgets
if (is_active_sidebar('footer-mobile')) : 
	dynamic_sidebar( 'footer-mobile' );
endif;
?>
</div>
</div>
<?php include (TEMPLATEPATH . '/' . DP_MOBILE_THEME_DIR . '/footer-menu.php'); ?>
<div id="footer-bottom-mb">
<a href="#header_area" id="gototop-mb" class="footer_arrow icon-angle-up"><span>Return Top</span></a>
<div id="ft-btm-content">&copy; <?php 
global $options;
if ($options['blog_start_year'] !== '') {
	echo $options['blog_start_year'] . '-' . date('Y');
} else {
	echo date('Y');
} ?> <a href="<?php echo home_url(); ?>/"><small><?php bloginfo('name'); ?></small></a>
</div></div>
</footer>
<a href="#header_area" id="gototop2" class="icon-up-open" title="Return Top"><span>Return Top</span></a>
