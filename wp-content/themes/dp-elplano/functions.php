<?php
/**
Name		: DigiPress Theme Option Function
Description	: Customize various visual settings and select theme type for DigiPress theme. Do not use this for any commercial purpose.
Version		: 1.1.0.8
Author		: digistate co., ltd.
Author URI	: http://www.digistate.co.jp/
Last Update	: 2014/6/19
*/

//Version
define ('DP_OPTION_SPT_VERSION', '1.1.0.8');
//Base theme name
define('DP_THEME_NAME', "el plano");
//Base theme key
define('DP_THEME_KEY', "el-plano");
//Theme ID
define('DP_THEME_ID', "DigiPress");
//Theme URI
define('DIGIPRESS_URI', "http://digipress.digi-state.com/");
//Author URI
define('DP_AUTHOR_URI', "http://www.digistate.co.jp/");
//Theme Directory
define('DP_THEME_DIR', dirname(__FILE__));
//Theme Directory
define('DP_THEME_URI', get_bloginfo('template_url'));
//Theme Directory for mobile
define('DP_MOBILE_THEME_DIR', 'mobile-theme');
//Column Type(1, 2, 3)
define('DP_COLUMN', '2');
// Theme Type
define('DP_BUTTON_STYLE', 'flat');

//Load Theme Domain
load_theme_textdomain('DigiPress', TEMPLATEPATH.'/languages/');

/****************************************************************
* Load theme options/global
****************************************************************/
$options = get_option('dp_options');
$options_visual = get_option('dp_options_visual');


/****************************************************************
* Include Main Class
****************************************************************/
include_once(DP_THEME_DIR . "/inc/scr/theme_main_class.php");

/****************************************************************
* Include Function
****************************************************************/
include_once(DP_THEME_DIR . "/inc/admin/visual_params.php");
include_once(DP_THEME_DIR . "/inc/admin/control_params.php");
include_once(DP_THEME_DIR . "/inc/scr/version.php");
include_once(DP_THEME_DIR . "/inc/scr/admin_menu_control.php");
include_once(DP_THEME_DIR . "/inc/scr/create_css.php");
include_once(DP_THEME_DIR . "/inc/scr/create_title_h1.php");
include_once(DP_THEME_DIR . "/inc/scr/create_title_h2.php");
include_once(DP_THEME_DIR . "/inc/scr/create_meta.php");
include_once(DP_THEME_DIR . "/inc/scr/show_banner_contents.php");
include_once(DP_THEME_DIR . '/inc/scr/show_post_thumbnail.php');
include_once(DP_THEME_DIR . "/inc/scr/show_sns_icon.php");
include_once(DP_THEME_DIR . "/inc/scr/create_desc.php");
include_once(DP_THEME_DIR . "/inc/scr/breadcrumb.php");
include_once(DP_THEME_DIR . "/inc/scr/headline.php");
include_once(DP_THEME_DIR . "/inc/scr/autopager.php");
include_once(DP_THEME_DIR . "/inc/scr/widgets.php");
include_once(DP_THEME_DIR . "/inc/scr/count_sns.php");
include_once(DP_THEME_DIR . "/inc/scr/custom_field.php");
include_once(DP_THEME_DIR . "/inc/scr/custom_menu.php");
include_once(DP_THEME_DIR . "/inc/scr/placeholder.php");
include_once(DP_THEME_DIR . "/inc/scr/get_column_num.php");
include_once(DP_THEME_DIR . "/inc/scr/gallery_shortcode.php");
include_once(DP_THEME_DIR . "/inc/scr/shortcodes.php");
include_once(DP_THEME_DIR . "/inc/scr/pagination.php");
include_once(DP_THEME_DIR . "/inc/scr/custom_post_type.php");
include_once(DP_THEME_DIR . "/inc/scr/meta_info.php");
include_once(DP_THEME_DIR . "/inc/scr/show_ogp.php");
include_once(DP_THEME_DIR . "/inc/scr/footer_widgets.php");


/****************************************************************
* GLOBALS
****************************************************************/
$EXIST_FB_LIKE_BOX 	= false;
$FB_APP_ID 			= '';
// $COLUMN_NUM 		= get_column_num();


/****************************************************************
* Add Theme Option into wp admin interfaces.
****************************************************************/
//Insert script to the header of post/edit page.
function dp_js_load_admin(){
	wp_enqueue_script('post_new_edit', DP_THEME_URI.'/inc/js/post_new_edit.min.js', array('jquery'));
}
add_action('admin_print_scripts-post.php', 'dp_js_load_admin');
add_action('admin_print_scripts-post-new.php', 'dp_js_load_admin');

//Add option menu into admin panel header and insert CSS and scripts to DigiPress panel.
add_action('admin_menu', array('digipress_options', 'add_menu'));
add_action('admin_menu', array('digipress_options', 'update'));
add_action('admin_menu', array('digipress_options', 'update_visual'));
add_action('admin_menu', array('digipress_options', 'del_upload_file'));
add_action('admin_menu', array('digipress_options', 'edit_images'));
add_action('admin_menu', array('digipress_options', 'reset_theme_options'));


/****************************************************************
* Insert custom field to editing post window.
* from custom_field.php
****************************************************************/
// Add custom fields
add_action('admin_menu', 'add_custom_field');
add_action('save_post', 'save_custom_field');
/* Add CSS into admin panel */
function add_css_for_admin() {
   echo '<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/inc/css/dp-admin.css">';
}
add_action('admin_head-post.php' , 'add_css_for_admin');
add_action('admin_head-post-new.php' , 'add_css_for_admin');



/****************************************************************
* Enable only WP2.9/3.0 over.
****************************************************************/
//Add post thumbnail interface.
if ( function_exists('add_theme_support') ) {
	add_theme_support('post-thumbnails');

	//Enable navigation menus(WP3.0 over)
	if ( function_exists('register_nav_menus') ) {
		add_theme_support('menus');
	}
}


/****************************************************************
* Admin function
****************************************************************/
/* Disable admin bar */
add_filter('show_admin_bar', '__return_false');
/* Disable admin notice for editors */
if (!current_user_can('edit_users')) {
	function dp_wphidenag() {
		remove_action( 'admin_notices', 'update_nag');
	}
	add_action('admin_menu','dp_wphidenag');
}

/****************************************************************
* Disable self pinback
****************************************************************/
function dp_no_self_ping( &$links ) {
	$home = get_option( 'home' );
	foreach ( $links as $l => $link )
	if ( 0 === strpos( $link, $home ) )
		unset($links[$l]);
}
add_action( 'pre_ping', 'dp_no_self_ping' );

/* Enable excerpt for single page */
add_post_type_support( 'page', 'excerpt' );


/****************************************************************
* For check the order of curret post
****************************************************************/
function dp_is_first(){
	global $wp_query;
	return (intval($wp_query->current_post) === 0) ? true : false;
}
function dp_is_last(){
	global $wp_query;
	return (intval($wp_query->current_post + 1) === $wp_query->post_count) ? true : false;;
}
function dp_is_odd(){
	global $wp_query;
	return (intval((($wp_query->current_post+1) % 2)) === 1) ? true : false;;
}
function dp_is_even(){
	global $wp_query;
	return (intval((($wp_query->current_post+1) % 2)) === 0) ? true : false;;
}


/****************************************************************
* Support post formats
****************************************************************/
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio', 'chat' ) );


/****************************************************************
* Switch template for smart phone
****************************************************************/
/* Check the User-Agent */
function is_mobile_dp(){
	$arr_useragent = array(
		'iPhone', 			// iPhone
		'iPod', 			// iPod touch
		'Windows Phone',	// Windows Phone
		'dream', 			// Pre 1.5 Android
		'CUPCAKE', 			// 1.5+ Android
		'blackberry9500', 	// Storm
		'blackberry9530', 	// Storm
		'blackberry9520', 	// Storm v2
		'blackberry9550', 	// Storm v2
		'blackberry9800', 	// Torch
		'webOS', 			// Palm Pre Experimental
		'incognito', 		// Other iPhone browser
		'webmate' 			// Other iPhone browser
	);
	$pattern = '/'.implode('|', $arr_useragent).'/i';
	$result = preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);

	// Check Android device
	if (!$result) {
		// For Android mobile
		$arr_useragent = array('Android', 'Mobile');
		$pattern = '/^.*(?=.*'.implode(')(?=.*', $arr_useragent).').*$/i';
		$result = preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
	}
	return $result;
}
function dp_mobile_template_include( $template ) {
	// Mobile theme directory name
	if ( is_mobile_dp() ) {
		$template_file = basename($template);
		$template_mb = str_replace( $template_file, DP_MOBILE_THEME_DIR.'/'.$template_file, $template );
		// If exist the mobile template, replace them.
		if ( file_exists( $template_mb ) )
			$template = $template_mb;
	}
	return $template;
}
if (!$options['disable_mobile_fast']) {
	add_filter( 'template_include', 'dp_mobile_template_include' );
}


/****************************************************************
* Fix original "the_excerpt" function.
****************************************************************/
remove_filter('the_excerpt', 'wpautop'); 
function dp_del_from_excerpt($str){
	$str = preg_replace("/(\r|\n|\r\n)/m", " ", $str);
	$str = preg_replace("/　/", "", $str); //del multibyte space
	$str = preg_replace("/\t/", "", $str); //del tab
	$str = preg_replace("/(<br>)+/", " ", $str);
	$str = preg_replace("/^(<br \/>)/", "", $str);
	return '<p>' . $str . '</p>';
}
add_filter('the_excerpt', 'dp_del_from_excerpt'); 


/****************************************************************
* Replace "more [...]" strings.
****************************************************************/
//WordPress version as integer.
function dp_new_excerpt_more($more) {
	$str_more = '...';
		return $str_more;
}
//Replace "more" strings.
add_filter('excerpt_more', 'dp_new_excerpt_more');


/****************************************************************
* Change excerpt length.
****************************************************************/
function dp_new_excerpt_mblength($length) {
	return 220;
}
add_filter('excerpt_mblength', 'dp_new_excerpt_mblength');


/****************************************************************
* Remove more "#" link string.
****************************************************************/
function dp_custom_content_more_link( $output ) {
	$output = preg_replace('/#more-[\d]+/i', '', $output );
	return $output;
}
add_filter( 'the_content_more_link', 'dp_custom_content_more_link' );



/****************************************************************
* Add title attribute in next post link
****************************************************************/
/*function add_title_to_next_post_link($link) {
	global $post;
	$post = get_post($post_id);
	$next_post = get_next_post();
	$title = $next_post->post_title;
	$link = str_replace("rel=", " title='".$title."' rel", $link);
	return $link;
}
add_filter('next_post_link','add_title_to_next_post_link');*/


/****************************************************************
* Add title attribute in previous post link
****************************************************************/
/*function add_title_to_previous_post_link($link) {
	global $post;
	$post = get_post($post_id);
	$previous_post = get_previous_post();
	$title = $previous_post->post_title;
	$link = str_replace("rel=", " title='".$title."' rel", $link);
	return $link;
}
add_filter('previous_post_link','add_title_to_previous_post_link');*/


/****************************************************************
* Remopve protection text and custome protected form
****************************************************************/
function remove_private($s) {
	return '%s';
}
add_filter('protected_title_format', 'remove_private');

function dp_password_form() {
	$custom_phrase = 
'<p class="need-pass-title label label-orange icon-lock">'.__('Protected','DigiPress').'</p>'.__('Please type the password to read this page.', 'DigiPress').'
<div id="protectedForm"><form action="' . get_bloginfo('wpurl') . '/wp-login.php?action=postpass" method="post"><input name="post_password" type="password" size="24" /><input type="submit" name="Submit" value="' . esc_attr__("Submit") . '" />
</form></div>';

return $custom_phrase;
}
function dp_password_form_setup() {
	remove_filter( 'the_password_form', 'custom_password_form' );
	add_filter('the_password_form', 'dp_password_form');
}
 
add_action( 'after_setup_theme', 'dp_password_form_setup' );


/****************************************************************
* Insert post thumbnail in Feeds.
****************************************************************/
function post_thumbnail_in_feeds($content) {
	global $post;
	if(has_post_thumbnail($post->ID)) {
		$content = '<div>' . get_the_post_thumbnail($post->ID) . '</div>' . $content;
	}
	return $content;
}
add_filter('the_excerpt_rss', 'post_thumbnail_in_feeds');
add_filter('the_content_feed', 'post_thumbnail_in_feeds');


/****************************************************************
* Replace post slug when unexpected character.
****************************************************************/
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
	if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
	$slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
	}
	return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4 );


/****************************************************************
* Use search.php if the search word is not set.
****************************************************************/
function enable_empty_query( $search, $wp_query ) {
	if (is_admin()) return;
	global $wpdb;
	if ($wp_query->is_main_query()) {
		// "q" is for Google Custom Search
		if ( (isset( $_REQUEST['s'] ) && empty( $_REQUEST['s'])) || isset( $_REQUEST['q']) ) {
			$term = $_REQUEST['s'];
			$wp_query->is_search = true;
			if ( $term === '' ) {
				$search = ' AND 0';
			} else {
				$search = " AND ( ( $wpdb->posts.post_title LIKE '%{$term}%' ) OR ( $wpdb->posts.post_content LIKE '%{$term}%' ) )";
			}
		}
	}
	return $search;
}
if (!is_admin()) {
	add_action( 'posts_search', 'enable_empty_query', 10, 2);
}


/****************************************************************
* Return the post views
****************************************************************/
function dp_count_post_views($post_ID, $update = false) {
 
	//Set the name of the Posts Custom Field.
	$count_key = 'post_views_count'; 
	
	//Returns values of the custom field with the specified key from the specified post.
	$count = get_post_meta($post_ID, $count_key, true);
	
	//If the the Post Custom Field value is empty. 
	if($count == ''){
		$count = 0; // set the counter to zero.
		 
		//Delete all custom fields with the specified key from the specified post. 
		delete_post_meta($post_ID, $count_key);
		 
		//Add a custom (meta) field (Name/value)to the specified post.
		add_post_meta($post_ID, $count_key, '0');
		return $count . ' View';
	 
	//If the the Post Custom Field value is NOT empty.
	}else{
		if ($update) {
			//increment the counter by 1.
			//Update the value of an existing meta key (custom field) for the specified post.
			$count++;
			update_post_meta($post_ID, $count_key, $count);
		}

		//If statement, is just to have the singular form 'View' for the value '1'
		if($count == '1'){
		return $count . ' View';
		}
		//In all other cases return (count) Views
		else {
		return $count . ' Views';
		}
	}
}
//Gets the  number of Post Views to be used later.
function dp_get_post_views($post_ID){
	$count_key = 'post_views_count';
	//Returns values of the custom field with the specified key from the specified post.
	$count = get_post_meta($post_ID, $count_key, true);

	return $count;
}

//Function that Adds a 'Views' Column to your Posts tab in WordPress Dashboard.
function dp_post_column_views($newcolumn){
	//Retrieves the translated string, if translation exists, and assign it to the 'default' array.
	$newcolumn['post_views'] = __('Views', 'DigiPress');
	return $newcolumn;
}
//Hooks a function to a specific filter action.
//applied to the list of columns to print on the manage posts screen.
add_filter('manage_posts_columns', 'dp_post_column_views');


//Function that Populates the 'Views' Column with the number of views count.
function post_custom_column_views($column_name, $id){
	
	if($column_name === 'post_views'){
		// Display the Post View Count of the current post.
		// get_the_ID() - Returns the numeric ID of the current post.
		echo dp_get_post_views(get_the_ID());
	}
}
//Hooks a function to a specific action. 
//allows you to add custom columns to the list post/custom post type pages.
//'10' default: specify the function's priority.
//and '2' is the number of the functions' arguments.
add_action('manage_posts_custom_column', 'post_custom_column_views',10,2);



/****************************************************************
 * Modifies WordPress's built-in comments_popup_link() function to return a string instead of echo comment results
 ***************************************************************/
function get_comments_popup_link( $zero = false, $one = false, $more = false, $css_class = '', $none = false ) {
    global $wpcommentspopupfile, $wpcommentsjavascript;
 
    $id = get_the_ID();
 
    if ( false === $zero ) $zero = __( 'No Comments','DigiPress' );
    if ( false === $one ) $one = __( 'Comment(1)','DigiPress' );
    if ( false === $more ) $more = __( 'Comments(%)','DigiPress' );
    if ( false === $none ) $none = __( 'Comments Off','DigiPress' );
 
    $number = get_comments_number( $id );
 
    $str = '';
 
    if ( 0 == $number && !comments_open() && !pings_open() ) {
        $str = '<span' . ((!empty($css_class)) ? ' class="' . esc_attr( $css_class ) . '"' : '') . '>' . $none . '</span>';
        return $str;
    }
 
    if ( post_password_required() ) {
        $str = __('Enter your password to view comments.','DigiPress');
        return $str;
    }
 
    $str = '<a href="';
    if ( $wpcommentsjavascript ) {
        if ( empty( $wpcommentspopupfile ) )
            $home = home_url();
        else
            $home = get_option('siteurl');
        $str .= $home . '/' . $wpcommentspopupfile . '?comments_popup=' . $id;
        $str .= '" onclick="wpopen(this.href); return false"';
    } else { // if comments_popup_script() is not in the template, display simple comment link
        if ( 0 == $number )
            $str .= get_permalink() . '#respond';
        else
            $str .= get_comments_link();
        $str .= '"';
    }
 
    if ( !empty( $css_class ) ) {
        $str .= ' class="'.$css_class.'" ';
    }
    $title = the_title_attribute( array('echo' => 0 ) );
 
    $str .= apply_filters( 'comments_popup_link_attributes', '' );
 
    $str .= ' title="' . esc_attr( sprintf( __('Comment on %s','DigiPress'), $title ) ) . '">';
    $str .= get_comments_number_str( $zero, $one, $more );
    $str .= '</a>';
     
    return $str;
}
/**
 * Modifies WordPress's built-in comments_number() function to return string instead of echo
 */
function get_comments_number_str( $zero = false, $one = false, $more = false, $deprecated = '' ) {
    if ( !empty( $deprecated ) )
        _deprecated_argument( __FUNCTION__, '1.3' );
 
    $number = get_comments_number();
 
    if ( $number > 1 )
        $output = str_replace('%', number_format_i18n($number), ( false === $more ) ? __('Comments(%)', 'DigiPress') : $more);
    elseif ( $number == 0 )
        $output = ( false === $zero ) ? __('No Comments', 'DigiPress') : $zero;
    else // must be one
        $output = ( false === $one ) ? __('Comment(1)', 'DigiPress') : $one;
 
    return apply_filters('comments_number', $output, $number);
}



/****************************************************************
* Number of post at each archive.
****************************************************************/
function dp_number_posts_per_archive( $wp_query ) {
	if (is_admin()) return;
	global $options;
	
	$suffix = '';

	if ( $wp_query->is_main_query() ) {
		// Suffix
		$suffix = is_mobile_dp() ? '_mobile' : '';

		// Get posts
		if ($wp_query->is_home() && $options['number_posts_index'.$suffix]) {
			if ($options['show_specific_cat_index'] === 'cat') {
				$wp_query->set( 'posts_per_page', $options['number_posts_index'.$suffix] );

				// Show specific category's posts
				if ($options['index_bottom_except_cat']) {
					// Add nimus each category id
					$cat_ids = preg_replace('/(\d+)/', '-${1}', $options['index_bottom_except_cat_id']);
					
					$wp_query->set( 'cat', $cat_ids );
					
				} else {
					$wp_query->set( 'cat', $options['specific_cat_index'] );
				}
				
			} else if ($options['show_specific_cat_index'] === 'custom') {
				// Show specific custom post type
				$wp_query->set( 'posts_per_page', $options['number_posts_index'.$suffix] );
				$wp_query->set( 'post_type', $options['specific_post_type_index'] );
				
			} else {
				$wp_query->set( 'posts_per_page', $options['number_posts_index'.$suffix] );
			}
		}
		else if ($wp_query->is_category() && $options['number_posts_category'.$suffix] ) {
			$wp_query->set( 'posts_per_page', $options['number_posts_category'.$suffix] );
		}
		else if ($wp_query->is_search() && $options['number_posts_search'.$suffix] ) {
			$wp_query->set( 'posts_per_page', $options['number_posts_search'.$suffix] );
		}
		else if ($wp_query->is_tag() && $options['number_posts_tag'.$suffix] ) {
			$wp_query->set( 'posts_per_page', $options['number_posts_tag'.$suffix] );
		}
		else if ($wp_query->is_date() && $options['number_posts_date'.$suffix] ) {
			$wp_query->set( 'posts_per_page', $options['number_posts_date'.$suffix] );
		}
	}
}
add_action( 'pre_get_posts', 'dp_number_posts_per_archive' );


/****************************************************************
* Add functions into outer html for theme.
****************************************************************/
//Remove meta of CMS Version
remove_action('wp_head', 'wp_generator');



/****************************************************************
* The time stamp to prevent css and js cache 
****************************************************************/
function ts_ext($filename) {
	$ts = '';
	if (file_exists($filename)) {
		$ts = date('YmdHis', filemtime($filename));
	} else {
		$ts = date('YmdHis'); 
	}
	return $ts;
}

/****************************************************************
* Load jquery
*  -- disable WP default jquery, load Google API minimized script
****************************************************************/
function dp_load_jquery() {
	if (is_admin()) return;

	global $options, $options_visual;

	if ($options['use_google_jquery']) {
		// Disable default jQuery
		wp_deregister_script('jquery');
		// Replace to Google API jQuery
		wp_enqueue_script('jquery','http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
	} else {
		wp_enqueue_script('jquery');
	}

	// jQuery easing
	wp_enqueue_script('easing', DP_THEME_URI . '/inc/js/jquery/jquery.easing.min.js', array('jquery'));
	// ImagesLoaded
	wp_enqueue_script('imagesloaded', DP_THEME_URI . '/inc/js/imagesloaded.pkgd.min.js', array('jquery'));

	// JS for Portfolio
	if ( is_mobile_dp() ) {
		if ($options['autopager_mb'] && !is_singular()) {
			wp_enqueue_script('autopager', DP_THEME_URI . '/inc/js/jquery/jquery.autopager.min.js', array('jquery'));
		}

		if (!is_singular()) {
			wp_enqueue_script('portfolio', DP_THEME_URI . '/inc/js/masonry.pkgd.min.js', array('jquery', 'imagesloaded', 'easing'));
		}
		
	} else {
		if ($options['autopager'] && !is_singular()) {
			wp_enqueue_script('autopager', DP_THEME_URI . '/inc/js/jquery/jquery.autopager.min.js', array('jquery'));
		}

		if (!is_singular()) {
			wp_enqueue_script('portfolio', DP_THEME_URI . '/inc/js/masonry.pkgd.min.js', array('jquery', 'imagesloaded', 'easing'));
		}
	}

	// JS for stretch background header image
	if ( $options_visual['dp_header_content_type'] == 2 && is_front_page() && !is_paged() ) {
		if ( is_mobile_dp() ) {
			if ($options['disable_mobile_fast']) {
				wp_enqueue_script('bgstretcher', DP_THEME_URI . '/inc/js/bgstretcher.min.js', array('jquery'));
			}
		} else {
			wp_enqueue_script('bgstretcher', DP_THEME_URI . '/inc/js/bgstretcher.min.js', array('jquery'));
		}
	}

	// Headline
	if ( $options['headline_type'] === '3' && (is_home() && !is_paged()) ) {
		if ($options['headline_slider_fx'] === '1') {
			wp_enqueue_script('glide', DP_THEME_URI . '/inc/js/jquery/jquery.glide.min.js', array('jquery'));
		} else {
			wp_enqueue_script('liscroll', DP_THEME_URI . '/inc/js/jquery/jquery.liscroll.min.js', array('jquery'));
		}
	}

	wp_enqueue_script('dp-js', DP_THEME_URI . '/inc/js/theme-import.min.js', array('jquery', 'easing'));
}
add_action('wp_enqueue_scripts', 'dp_load_jquery', 1);


/****************************************************************
* Insert css and Javascript to head
****************************************************************/
function dp_add_meta_tags() {
	global $options;
	
	$csspie = '';
	$metaForIE = '';

	//Add elements here that need PIE applied
	if ( !$options['fast_on_ie'] ) {
	$csspie = '<!--[if lt IE 9]>
<style media="screen">
body {behavior: url('.trailingslashit(DP_THEME_URI).'/inc/js/csshover.min.htc);}
header#header_area,
header#header_half,
header#header_area_paged,
div#site_title,
div#site_banner_image,
div#site_banner_content,
#container,
.post_thumb,
.post_thumb_portfolio,
.more-link,
.box-c,
.btn {
behavior: url('.trailingslashit(DP_THEME_URI).'/inc/scr/PIE/PIE.php);
}
</style>
<![endif]-->';

$metaForIE = '<script src="' . DP_THEME_URI . '/inc/js/css3-mediaqueries.min.js"></script>';

}
	
	//Remove break line code.
	$meta_for_theme = str_replace(array("\r\n","\r","\n"), '', $csspie);

	//Show into meta
	echo $meta_for_theme;
}
add_action( 'wp_print_scripts', 'dp_add_meta_tags' );


/****************************************************************
* Insert Javascript to the end of html
****************************************************************/
function dp_theme_footer() {
	global $options;
	global $current_user;
	get_currentuserinfo();
	
	$textShadowJS = '';
	
	if ( !$options['fast_on_ie'] ) $textShadowJS = '<script src="'.DP_THEME_URI . '/inc/js/jquery/jquery.textshadow.min.js"></script>';
	
	// Javascript
	$js_footer = 
'<!--[if lt IE 9]>'.
$textShadowJS.
'<script src="'.DP_THEME_URI . '/inc/js/theme-import-ie.min.js"></script>
<![endif]-->';
	//Remove break line code.
	$js_footer = str_replace(array("\r\n","\r","\n"), '', $js_footer);
	
	//Display
	echo $js_footer;
	
	// Access Code
	if ( ($options['tracking_code'] === "") || (is_null($options['tracking_code'])) ) {
		return;
	} else {
		$traceCode = "\n<!-- Tracking Code -->\n" . $options['tracking_code'] . "\n<!-- /Tracking Code -->\n";
	}
	
	//Run only user logged in...
	if ( is_user_logged_in() ) {
		if ( $current_user->user_level == 10 ) {
			if ($options['no_track_admin']) $traceCode = "\n<!-- You are logged in as Administrator -->\n";
		}
	}
	echo $traceCode;
}
add_action('wp_footer', 'dp_theme_footer', 100);
?>