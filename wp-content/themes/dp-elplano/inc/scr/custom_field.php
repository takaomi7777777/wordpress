<?php
/*******************************************************
* Custom Field Contents
*******************************************************/
// Array for custom field
$dp_cf_arr = array(
	'is_slideshow',
	'slideshow_image_url',
	'slideshow_description',
	'is_headline',
	'hide_sns_icon',
	'dp_hide_title',
	'dp_hide_date',
	'dp_hide_author',
	'dp_hide_cat',
	'dp_hide_tag',
	'dp_hide_views',
	'dp_hide_fb_comment',
	'dp_meta_keyword',
	'dp_meta_desc',
	'dp_noindex',
	'dp_nofollow',
	'dp_noarchive',
	'item_taxonomy',
	'item_image_url',
	'disable_sidebar',
	'dp_hide_header_menu',
	'dp_hide_footer'
	);

// Add custom fields
function add_custom_field() {

	if ( !function_exists('add_meta_box') ) return;

	global $options;

	// Add to single
	add_meta_box(
		'dp_custom_fields_single', 
		__('Post options','DigiPress'), 
		'html_source_for_custom_box_single', 
		'post', 
		'normal', 
		'high'
		);

	// Add to page
	add_meta_box(
		'dp_custom_fields_page', 
		__('Post options','DigiPress'), 
		'html_source_for_custom_box_page', 
		'page', 
		'normal', 
		'high'
		);

	// Add to custom type
	add_meta_box(
		'dp_custom_fields_page', 
		__('Post options','DigiPress'), 
		'html_source_for_custom_box_page', 
		$options['news_cpt_slug_id'], 
		'normal', 
		'high'
		);
}

// Save custom fields...
function save_custom_field($post_id) {
	// Throw auto save 
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;

	global $pagenow, $typenow, $post, $dp_cf_arr;

	// if current saving is under quick edit
	if ( $pagenow === 'admin-ajax.php' || $pagenow === 'wp-cron.php') return;

	if (!isset($post_id)) $post_id = $_REQUEST['post_ID'];

	// Save
	foreach($dp_cf_arr as $dp_cf) {
 		// Get Current item
		$dp_cf_current 	= get_post_meta($post_id, $dp_cf);
		// Get value
		$dp_cf_val 	= $_POST[$dp_cf];
 		
 		// Save, update or delete
		if( $dp_cf_current == "" ) {
			add_post_meta($post_id, $dp_cf, $dp_cf_val, true);
		} elseif ( $dp_cf_current != $dp_cf_val ) {
			update_post_meta($post_id, $dp_cf, $dp_cf_val);
		} elseif ( $dp_cf_val == "" ) {
			delete_post_meta( $post_id, $dp_cf );
		}
	}
}

/*---------------------------------------
 * For Single
 *--------------------------------------*/
/* HTML form */
function html_source_for_custom_box_single() {
	
	global $post, $dp_cf_arr;

	$is_slideshow			= get_post_meta( $post->ID, 'is_slideshow');
	$slideshow_image_url	= get_post_meta( $post->ID, 'slideshow_image_url');
	$slideshow_description	= get_post_meta( $post->ID, 'slideshow_description');
	$is_headline			= get_post_meta( $post->ID, 'is_headline');
	$disable_sidebar		= get_post_meta( $post->ID, 'disable_sidebar');
	$hide_sns_icon			= get_post_meta( $post->ID, 'hide_sns_icon');
	$dp_hide_date			= get_post_meta( $post->ID, 'dp_hide_date');
	$dp_hide_author			= get_post_meta( $post->ID, 'dp_hide_author');
	$dp_hide_cat			= get_post_meta( $post->ID, 'dp_hide_cat');
	$dp_hide_tag			= get_post_meta( $post->ID, 'dp_hide_tag');
	$dp_hide_views			= get_post_meta( $post->ID, 'dp_hide_views');
	$dp_hide_fb_comment		= get_post_meta( $post->ID, 'dp_hide_fb_comment');
	$dp_meta_keyword		= get_post_meta( $post->ID, 'dp_meta_keyword');
	$dp_noindex				= get_post_meta( $post->ID, 'dp_noindex');
	$dp_nofollow			= get_post_meta( $post->ID, 'dp_nofollow');
	$dp_noarchive			= get_post_meta( $post->ID, 'dp_noarchive');

	$preview_tag;
	if ($slideshow_image_url[0]) {
		$preview_tag = '<img src="' . $slideshow_image_url[0] . '" id="exist_slide_image" />';
	}

	// Hide date
	echo '<div style="border:1px solid #ccc;padding:10px; margin-bottom:10px;border-radius: 4px;-webkit-border-radius:4px;-moz-border-radius:4px;">
		 <input name="dp_hide_date" id="dp_hide_date" type="checkbox" value="true"';
	if( $dp_hide_date[0] ) echo ' checked';
	echo ' /><label for="dp_hide_date" class="b"> '.__("Check to hide published date","DigiPress").'</label>';
	echo '<p>'.__('You can hide the date of this post page when you check this option.','DigiPress').'</p></div>';

	// Hide author
	echo '<div style="border:1px solid #ccc;padding:10px; margin-bottom:10px;border-radius: 4px;-webkit-border-radius:4px;-moz-border-radius:4px;">
		 <input name="dp_hide_author" id="dp_hide_author" type="checkbox" value="true"';
	if( $dp_hide_author[0] ) echo ' checked';
	echo ' /><label for="dp_hide_author" class="b"> '.__("Check to hide author","DigiPress").'</label>';
	echo '<p>'.__('You can hide the author of this post page when you check this option.','DigiPress').'</p></div>';

	// Hide category
	echo '<div style="border:1px solid #ccc;padding:10px; margin-bottom:10px;border-radius: 4px;-webkit-border-radius:4px;-moz-border-radius:4px;">
		 <input name="dp_hide_cat" id="dp_hide_cat" type="checkbox" value="true"';
	if( $dp_hide_cat[0] ) echo ' checked';
	echo ' /><label for="dp_hide_cat" class="b"> '.__("Check to hide category links","DigiPress").'</label>';
	echo '<p>'.__('You can hide category links of this post page when you check this option.','DigiPress').'</p></div>';

	// Hide tags
	echo '<div style="border:1px solid #ccc;padding:10px; margin-bottom:10px;border-radius: 4px;-webkit-border-radius:4px;-moz-border-radius:4px;">
		 <input name="dp_hide_tag" id="dp_hide_tag" type="checkbox" value="true"';
	if( $dp_hide_tag[0] ) echo ' checked';
	echo ' /><label for="dp_hide_tag" class="b"> '.__("Check to hide tag links","DigiPress").'</label>';
	echo '<p>'.__('You can hide tag links of this post page when you check this option.','DigiPress').'</p></div>';

	// Hide views
	echo '<div style="border:1px solid #ccc;padding:10px; margin-bottom:10px;border-radius: 4px;-webkit-border-radius:4px;-moz-border-radius:4px;">
		 <input name="dp_hide_views" id="dp_hide_views" type="checkbox" value="true"';
	if( $dp_hide_views[0] ) echo ' checked';
	echo ' /><label for="dp_hide_views" class="b"> '.__("Check to hide views","DigiPress").'</label>';
	echo '<p>'.__('You can hide viewed count of this post page when you check this option.','DigiPress').'</p></div>';

	// Hide SNS Icons
	echo '<div style="border:1px solid #ccc;padding:10px; margin-bottom:10px;border-radius: 4px;-webkit-border-radius:4px;-moz-border-radius:4px;">
		 <input name="hide_sns_icon" id="hide_sns_icon" type="checkbox" value="true"';
	if( $hide_sns_icon[0] ) echo ' checked';
	echo ' /><label for="hide_sns_icon" class="b"> '.__("Check to hide SNS buttons","DigiPress").'</label>';
	echo '<p>'.__('You can hide SNS buttons of this post page when you check this option.','DigiPress').'<br /><a href="'.admin_url().'admin.php?page=digipress_control" target="_blank">'.__('Settings for SNS Buttons','DigiPress').'</a></p></div>';

	// Hide Facebook Comment
	echo '<div style="border:1px solid #ccc;padding:10px; margin-bottom:10px;border-radius: 4px;-webkit-border-radius:4px;-moz-border-radius:4px;">
		 <input name="dp_hide_fb_comment" id="dp_hide_fb_comment" type="checkbox" value="true"';
	if( $dp_hide_fb_comment[0] ) echo ' checked';
	echo ' /><label for="dp_hide_fb_comment" class="b"> '.__("Check to hide Facebook comment box","DigiPress").'</label>';
	echo '<p>'.__('You can hide Facebook comment box of this post page when you check this option.','DigiPress').'<br /><a href="'.admin_url().'admin.php?page=digipress_control" target="_blank">'.__('Default setting for Facebook comment box','DigiPress').'</a>.</p></div>';
	
	// hide sidebar
	echo '<div style="border:1px solid #ccc;padding:10px; margin-bottom:10px;border-radius: 4px;-webkit-border-radius:4px;-moz-border-radius:4px;">
		 <input name="disable_sidebar" id="disable_sidebar" type="checkbox" value="true"';
	if( $disable_sidebar[0] ) echo ' checked';
	echo ' /><label for="disable_sidebar" class="b"> '.__("Check to disable sidebar(1 column)","DigiPress").'</label>';
	echo '<p>'.__('You can hide the sidebar of this post page when you check this option.','DigiPress').'</p></div>';

	// Whether include headline 
	echo '<div style="border:1px solid #ccc;padding:10px; margin-bottom:10px;border-radius: 4px;-webkit-border-radius:4px;-moz-border-radius:4px;">
		 <input name="is_headline" id="is_headline_dp" type="checkbox" value="true"';
	if( $is_headline[0] ) echo ' checked';
	echo ' /><label for="is_headline_dp" class="b"> '.__("Check to Include Headline Slider","DigiPress").'</label>';
	echo '<p>'.__('You can show this post to the headline in top page when you check this option.','DigiPress').'</p></div>';
	
	// Whether include Slideshow 
	echo '<div style="border:1px solid #ccc;padding:10px; margin-bottom:10px;border-radius: 4px;-webkit-border-radius:4px;-moz-border-radius:4px;">
		 <input name="is_slideshow" id="is_slideshow_dp" type="checkbox" value="true"';
	if( $is_slideshow[0] ) echo ' checked';
	echo ' /><label for="is_slideshow_dp" class="b"> '.__("Check to Include Slideshow","DigiPress").'</label>';
	echo '<p>'.__('You can show this post to the slideshow of DigiPress header area when you check this option.','DigiPress').'</p></div>';

	// URL
	echo '<div style="border:1px solid #ccc;padding:0 10px 10px 10px; margin-bottom:10px;border-radius: 4px;-webkit-border-radius:4px;-moz-border-radius:4px;">
		<p style="font-weight:bold;">'.__('Image URL(Optional):','DigiPress').'</p>
		 <p>'.__('Enter the URL to your slideshow image below, if you want to customize default image of slideshow.', 'DigiPress').'</p>
		 <input type="text" name="slideshow_image_url" id="slideshow_image_url" size="60" style="width:80%;" value="'.$slideshow_image_url[0].'" />
		 <input id="upload_image_button" class="btn blue" type="button" value="'.__('Add / Change','DigiPress').'" /><br />* '
		 .__("When you save as a blank, DigiPress displays the random image to the slideshow.",'DigiPress');
	echo '<p class="pd8px-top b grey">'.__("Current Slideshow image", "DigiPress").':</p><div id="uploadedImageView" class="clearfix">'. $preview_tag.'</div>';
	echo '</div>';

	// Description
	echo '<div style="border:1px solid #ccc;padding:0 10px 10px 10px; margin-bottom:10px;border-radius: 4px;-webkit-border-radius:4px;-moz-border-radius:4px;">
		 <p style="font-weight:bold;">'.__('Description(Optional):','DigiPress').'</p>
		 <p>'.__("Enter your text of description for this slideshow, if you don't use the excerpt of this post.", "DigiPress").'</p>
		 <textarea name="slideshow_description" rows="3" style="width:100%;" />'.$slideshow_description[0].'</textarea>
		 <input type="hidden" name="dp_post_option_update" value="true" />
		 </div>';

	// Meta keyword
	echo '<div style="border:1px solid #ccc;padding:0 10px 10px 10px; margin-bottom:10px;border-radius: 4px;-webkit-border-radius:4px;-moz-border-radius:4px;">
		 <p style="font-weight:bold;">'.__('HTML meta keyword (Optional):','DigiPress').'</p>
		 <p>'.__("Enter meta keywords of this post. If you don't specifiy the keyword, post tags are used for meta keywords.", "DigiPress").'</p>
		 <input name="dp_meta_keyword" id="dp_meta_keyword" type="text" style="width:100%;" value="'.$dp_meta_keyword[0].'" />';
	echo '<p>'.__('* Please use comma for separate each keyword.','DigiPress').'</p></div>';


	// No index
	echo '<div style="border:1px solid #ccc;padding:0 10px 10px 10px; margin-bottom:10px;border-radius: 4px;-webkit-border-radius:4px;-moz-border-radius:4px;">
		<p class="b">'.__('HTML meta information settings', 'DigiPress').'</p>
		 <div class="mg8px-btm"><input name="dp_noindex" id="dp_noindex" type="checkbox" value="true"';
	if( $dp_noindex[0] ) echo ' checked';
	echo ' /><label for="dp_noindex"> '.__("Check to set meta no index attribute to this page.","DigiPress").'</label></div>';
	// No follow
	echo '<div class="mg8px-btm"><input name="dp_nofollow" id="dp_nofollow" type="checkbox" value="true"';
	if( $dp_nofollow[0] ) echo ' checked';
	echo ' /><label for="dp_nofollow"> '.__("Check to set meta no follow attribute to this page.","DigiPress").'</label></div>';
	// No archive
	echo '<div class="mg8px-btm"><input name="dp_noarchive" id="dp_noarchive" type="checkbox" value="true"';
	if( $dp_noarchive[0] ) echo ' checked';
	echo ' /><label for="dp_noarchive"> '.__("Check to set meta no archive attribute to this page.","DigiPress").'</label></div></div>';
}
 
/*---------------------------------------
 * For Page
 *--------------------------------------*/
/* HTML form */
function html_source_for_custom_box_page() {

	global $post, $dp_cf_arr;	

	$disable_sidebar	= get_post_meta( $post->ID, 'disable_sidebar');
	$hide_sns_icon		= get_post_meta( $post->ID, 'hide_sns_icon');
	$dp_hide_date		= get_post_meta( $post->ID, 'dp_hide_date');
	$dp_meta_keyword	= get_post_meta( $post->ID, 'dp_meta_keyword');
	$dp_noindex			= get_post_meta( $post->ID, 'dp_noindex');
	$dp_nofollow		= get_post_meta( $post->ID, 'dp_nofollow');
	$dp_noarchive		= get_post_meta( $post->ID, 'dp_noarchive');
	$dp_hide_header_menu = get_post_meta( $post->ID, 'dp_hide_header_menu');
	$dp_hide_footer		= get_post_meta( $post->ID, 'dp_hide_footer');
	$dp_hide_title		= get_post_meta( $post->ID, 'dp_hide_title');
	
	// Hide title
	echo '<div style="border:1px solid #ccc;padding:10px; margin-bottom:10px;border-radius: 4px;-webkit-border-radius:4px;-moz-border-radius:4px;">
		 <input name="dp_hide_title" id="dp_hide_title" type="checkbox" value="true"';
	if( $dp_hide_title[0] ) echo ' checked';
	echo ' /><label for="dp_hide_title" class="b"> '.__("Check to hide post title","DigiPress").'</label>';
	echo '<p>'.__('You can hide the title of this post page when you check this option.','DigiPress').'</p></div>';

	// Hide date
	echo '<div style="border:1px solid #ccc;padding:10px; margin-bottom:10px;border-radius: 4px;-webkit-border-radius:4px;-moz-border-radius:4px;">
		 <input name="dp_hide_date" id="dp_hide_date" type="checkbox" value="true"';
	if( $dp_hide_date[0] ) echo ' checked';
	echo ' /><label for="dp_hide_date" class="b"> '.__("Check to hide published date","DigiPress").'</label>';
	echo '<p>'.__('You can hide the date of this post page when you check this option.','DigiPress').'</p></div>';

	// Hide SNS Icons
	echo '<div style="border:1px solid #ccc;padding:10px; margin-bottom:10px;border-radius: 4px;-webkit-border-radius:4px;-moz-border-radius:4px;">
		 <input name="hide_sns_icon" id="hide_sns_icon" type="checkbox" value="true"';
	if( $hide_sns_icon[0] ) echo ' checked';
	echo ' /><input type="hidden" name="dp_post_option_update" value="true" /><label for="hide_sns_icon" class="b"> '.__("Check to hide SNS buttons","DigiPress").'</label>';
	echo '<p>'.__('You can hide SNS buttons of this post page when you check this option.','DigiPress').'<br /><a href="'.admin_url().'admin.php?page=digipress_control" target="_blank">'.__('Settings for SNS Buttons','DigiPress').'</a></p></div>';
	
	// enable sidebar
	echo '<div style="border:1px solid #ccc;padding:10px; margin-bottom:10px;border-radius: 4px;-webkit-border-radius:4px;-moz-border-radius:4px;">
		 <input name="disable_sidebar" id="disable_sidebar" type="checkbox" value="true"';
	if( $disable_sidebar[0] ) echo ' checked';
	echo ' /><label for="disable_sidebar" class="b"> '.__("Check to disable sidebar(1 column)","DigiPress").'</label>';
	echo '<p>'.__('You can hide the sidebar of this post page when you check this option.','DigiPress').'</p>';
	echo '</div>';

	// Hide header
	// echo '<div style="border:1px solid #ccc;padding:10px; margin-bottom:10px;border-radius: 4px;-webkit-border-radius:4px;-moz-border-radius:4px;">
	// 	 <input name="dp_hide_header_menu"id="dp_hide_header_menu"type="checkbox" value="true"';
	// if( $dp_hide_header_menu[0] ) echo ' checked';
	// echo ' /><label for="dp_hide_header_menu"class="b"> '.__("Check to hide header menu in this page.","DigiPress").'</label></div>';

	// Hide footer
	// echo '<div style="border:1px solid #ccc;padding:10px; margin-bottom:10px;border-radius: 4px;-webkit-border-radius:4px;-moz-border-radius:4px;">
	// 	 <input name="dp_hide_footer" id="dp_hide_footer" type="checkbox" value="true"';
	// if( $dp_hide_footer[0] ) echo ' checked';
	// echo ' /><label for="dp_hide_footer" class="b"> '.__("Check to hide footer contents in this page.","DigiPress").'</label></div>';


	// No index
	echo '<div style="border:1px solid #ccc;padding:0 10px 10px 10px; margin-bottom:10px;border-radius: 4px;-webkit-border-radius:4px;-moz-border-radius:4px;">
		<p class="b">'.__('HTML meta information settings', 'DigiPress').'</p>
		 <div class="mg8px-btm"><input name="dp_noindex" id="dp_noindex" type="checkbox" value="true"';
	if( $dp_noindex[0] ) echo ' checked';
	echo ' /><label for="dp_noindex"> '.__("Check to set meta no index attribute to this page.","DigiPress").'</label></div>';
	// No follow
	echo '<div class="mg8px-btm"><input name="dp_nofollow" id="dp_nofollow" type="checkbox" value="true"';
	if( $dp_nofollow[0] ) echo ' checked';
	echo ' /><label for="dp_nofollow"> '.__("Check to set meta no follow attribute to this page.","DigiPress").'</label></div>';
	// No archive
	echo '<div class="mg8px-btm"><input name="dp_noarchive" id="dp_noarchive" type="checkbox" value="true"';
	if( $dp_noarchive[0] ) echo ' checked';
	echo ' /><label for="dp_noarchive"> '.__("Check to set meta no archive attribute to this page.","DigiPress").'</label></div></div>';


	// Meta keyword
	echo '<div style="border:1px solid #ccc;padding:0 10px 10px 10px; margin-bottom:10px;border-radius: 4px;-webkit-border-radius:4px;-moz-border-radius:4px;">
		 <p style="font-weight:bold;">'.__('HTML meta keyword (Optional):','DigiPress').'</p>
		 <p>'.__("Enter meta keywords of this post. If you don't specifiy the keyword, post tags are used for meta keywords.", "DigiPress").'</p>
		 <input name="dp_meta_keyword" id="dp_meta_keyword" type="text" style="width:100%;" value="'.$dp_meta_keyword[0].'" />';
	echo '<p>'.__('* Please use comma for separate each keyword.','DigiPress').'</p></div>';
}
?>
