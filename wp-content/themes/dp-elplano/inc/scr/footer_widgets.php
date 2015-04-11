<?php
/**
 * The Footer widget areas.
 *
 * @package WordPress
 * @subpackage DigiPress
 */
function dp_get_footer() {
	global $options_visual;
// If none of the sidebars have widgets, then let's bail early.
if ( ! is_active_sidebar( 'footer-widget1' )
	&& ! is_active_sidebar( 'footer-widget2' )
	&& ! is_active_sidebar( 'footer-widget3' )
	&& ! is_active_sidebar( 'footer-widget4' ) ) {
	return;
}
// If footer has widget(s), show footer widgets.
?>
<div id="ft-widget-container">
<div id="ft-widget-content">
<?php if ( is_active_sidebar( 'footer-widget1' ) ) : ?>
<div id="ft-widget-area1" class="clearfix">
	<?php dynamic_sidebar( 'footer-widget1' ); ?>
</div>
<?php endif; 
if ( is_active_sidebar( 'footer-widget2' ) ) : ?>
<div id="ft-widget-area2" class="clearfix">
	<?php dynamic_sidebar( 'footer-widget2' ); ?>
</div>
<?php endif;
if ( is_active_sidebar( 'footer-widget3' ) ) : ?>
<div id="ft-widget-area3" class="clearfix">
	<?php dynamic_sidebar( 'footer-widget3' ); ?>
</div>
<?php endif;
if ( is_active_sidebar( 'footer-widget4' ) ) : ?>
<div id="ft-widget-area4" class="clearfix">
	<?php dynamic_sidebar( 'footer-widget4' ); ?>
</div>
<?php endif;
if (is_home() && !is_paged()) :
?>
<a href="#site_title" id="gototop" class="footer_arrow"><span>Return Top</span></a>
<?php 
else:
?>
<a href="#header_area_paged" id="gototop" class="footer_arrow"><span>Return Top</span></a>
<?php
endif;
?>
</div>
</div>
<?php } ?>