<?php
function postFormatIcon($format) {
	$titleIconClass = '';
	switch  ($format) {
		case 'aside':
			$titleIconClass = ' icon-pencil';
			break;
		case 'gallery':
			$titleIconClass = ' icon-pictures';
			break;
		case 'image':
			$titleIconClass = ' icon-picture';
			break;
		case 'quote':
			$titleIconClass = ' icon-quote-left';
			break;
		case 'status':
			$titleIconClass = ' icon-comment';
			break;
		case 'video':
			$titleIconClass = ' icon-video-play';
			break;
		case 'audio':
			$titleIconClass = ' icon-music';
			break;
		case 'chat':
			$titleIconClass = ' icon-comment';
			break;
		default:
			$titleIconClass = '';
			break;
	}

	return $titleIconClass;
}

/*******************************************************
* Published time diff
*******************************************************/
function publishedDiff(){
	$from 	= get_the_date('U'); 	// Published datetime
	$to 	= time(); 				// Current time
	$diff 	= $to - $from; 			// Diff
	$code 	= '';
	if ( $diff < 0 ) {
		$code = '<span class="icon-clock"><time datetime="'.get_the_date('c').'" pubdate="pubdate">'.human_time_diff( $from, $to ) . __(' ago','DigiPress').'</time></span>';
	} elseif ( abs($diff) <= 86400 ) {
		// Posted in less than 24 hours
		// $code = '<span><time datetime="'.get_the_date('c').'" pubdate="pubdate">'.__('This article was posted in less than 24 hours.','DigiPress').'</time></span>';
		$code = '<span class="icon-clock"><time datetime="'.get_the_date('c').'" pubdate="pubdate">'.human_time_diff( $from, $to ) . __(' ago','DigiPress').'</time></span>';
	} else {
		$code = '<span class="icon-clock"><time datetime="'.get_the_date('c').'" pubdate="pubdate">'.human_time_diff( $from, $to ) . __(' ago','DigiPress').'</time></span>';
	}
	return $code;
}

/*******************************************************
* Meta content in excerpt
*******************************************************/
function showPostMetaForArchive($showDate = true) {
	if (post_password_required()) return;

	global $options, $post;

	$postType = get_post_type();
?>
<div class="postmetadata_archive">
<?php if ( $options['show_pubdate_on_meta'] ) : ?>
<span class="icon-calendar"><time datetime="<?php the_time('c'); ?>" pubdate="pubdate" class="updated"><?php echo get_the_date(); ?></time></span>
<?php endif; ?>
<?php if ($postType === 'post' && $options['show_cat_on_meta'] && !is_mobile_dp()) : ?>
<span class="icon-folder entrylist-cat"><?php the_category(' ') ?></span>
<?php endif; ?>
<?php
if ( $postType === 'post' && $options['show_tags'] && !is_mobile_dp()) the_tags('<span class="icon-tags entrylist-cat">', ' ', '</span>'); 
if ( comments_open() ) : // If comment is open ?>
<span class="icon-comment">
<?php comments_popup_link(
	__('No Comments', 'DigiPress'), 
	__('Comment(1)', 'DigiPress'), 
	__('Comments(%)', 'DigiPress'));
endif; ?>
</span>
<?php if ($options['show_views_on_meta']  && !is_mobile_dp() && function_exists('dp_count_post_views')) : ?>
<span class="icon-eye"><?php echo dp_count_post_views(get_the_ID()); ?></span>
<?php endif; ?>
<?php 
	// Author
	if ($options['show_author_on_meta'] && !is_mobile_dp()) :
		echo '<span class="icon-user vcard author"><a href="'.get_author_posts_url(get_the_author_meta('ID')).'" rel="author" title="'.__('Show articles of this user.', 'DigiPress').'" class="fn">'.get_the_author_meta('display_name').'</a></span>';
	endif;

// If polling plugin exists
if(function_exists('the_ratings')) the_ratings();
// Edit Post Link(If logged in.)
edit_post_link(__('Edit', 'DigiPress'), ' | ');
?>
</div>
<?php }	//End function 



/*******************************************************
* Meta content in single and archive that shows all
*******************************************************/
function showPostMetaForSingleTop(
						$postType = 'post', 
						$arrParams	= array(
							'show_date' 		=> true,
							'show_comments'		=> true,
							'show_views'		=> true,
							'show_cats'			=> true,
							'show_tags'			=> true,
							'show_author'		=> true,
							'show_sns_buttons'	=> true,
							'show_time_for_reding' => true
							)) { 

	if (post_password_required()) return;

	global $options, $post;

	$blank_flg = true;
	$html_code	= '';

	extract($arrParams);

	$postType = get_post_type();


	// Get values
	if (((is_single() && $options['show_pubdate_on_meta']) || (is_page() && $options['show_pubdate_on_meta_page'])) && !get_post_meta(get_the_ID(), 'dp_hide_date', true) && $options['show_date_under_post_title'] && $show_date) : 

		$blank_flg = false;

		if ($options['date_reckon_mode']) {
			$html_code .= publishedDiff();
		} else {
			$html_code .= '<span class="icon-calendar"><time datetime="'. get_the_date('c').'" pubdate="pubdate" class="updated">'.get_the_date().'</time></span>';
		}
		
	endif;

	// Comment
	if (('open' == $post-> comment_status) && $show_comments && !is_page()) : 

		$blank_flg = false;

		$html_code .= '<span class="icon-comment">'. get_comments_popup_link(
							__('No Comments', 'DigiPress'), 
							__('Comment(1)', 'DigiPress'), 
							__('Comments(%)', 'DigiPress')).'</span>';
	endif; 

	// Views
	if (($postType === 'post') && $options['show_views_on_meta'] && !get_post_meta(get_the_ID(), 'dp_hide_views', true) && $options['show_views_under_post_title'] && $show_views) : 

		$blank_flg = false;

		$html_code .= '<span class="icon-eye">'.dp_count_post_views(get_the_ID(), false).'</span>';
	endif;

	// Author
	if ((($postType === 'post' && $options['show_author_on_meta']) || ($postType === 'page' && $options['show_author_on_meta_page'])) && $options['show_author_under_post_title'] && !get_post_meta(get_the_ID(), 'dp_hide_author', true) && $show_author) : 

		$blank_flg = false;

		$html_code .= '<span class="icon-user vcard author"><a href="'.get_author_posts_url(get_the_author_meta('ID')).'" rel="author" title="'.__('Show articles of this user.', 'DigiPress').'" class="fn">'.get_the_author_meta('display_name').'</a></span>';
	endif;

	// Edit link
	if (is_user_logged_in() && current_user_can('level_10')) {
		$html_code .= '| <a href="'.get_edit_post_link().'">Edit</a>';
	}

	// Time for reading
	if (($postType === 'post') && $options['time_for_reading'] && $show_time_for_reding) {

		$blank_flg = false;

		$minutes = round(mb_strlen(strip_tags(get_the_content())) / 600) + 1;
		$time_for_reading = '<div class="dp_time_for_reading fl-r icon-alarm">' . __('You can read this content about ', 'DigiPress') . '<span class="ft15px b">' . $minutes . '</span>' . __(' minute(s)','DigiPress') . '</div>'; 

		$html_code .= $time_for_reading;
	}

	// End of first row
	$html_code = '<div class="first_row">' . $html_code . '</div>';

	// --------------
	// Category
	if ($postType === 'post' && $options['show_cat_on_meta'] && $options['show_cat_under_post_title'] && !get_post_meta(get_the_ID(), 'dp_hide_cat', true) && $show_cats && !is_mobile_dp()) : 

		$cats_code = '';

		$cats = get_the_category();
		if ($cats) {
			foreach ($cats as $cat) {
				$cats_code .= '<a href="'.get_category_link($cat->cat_ID).'" rel="tag">' .$cat->cat_name.'</a> ';
			}

			$cats_code = '<div class="icon-folder entrylist-cat">' .$cats_code. '</div>';
			$blank_flg = false;
		}

		$html_code .= $cats_code;
	endif;

	// SNS BUttons
	if ( !get_post_meta(get_the_ID(), 'hide_sns_icon', true) && $options['sns_button_under_title'] && $show_sns_buttons && !is_mobile_dp()) :

		$blank_flg = false;

		$html_code .= dp_show_sns_buttons('top', false);
	endif; 

	// Show source
	if (!$blank_flg) {
		$html_code = '<div class="postmeta_title">' . $html_code . '</div>';
		echo $html_code;
	}
}	// End function 


/*******************************************************
* Meta content for post meta
*******************************************************/
function showPostMetaForSingleBottom(
						$postType 	= 'post', 
						$arrParams	= array(
							'show_date' 		=> true,
							'show_comments'		=> true,
							'show_views'		=> true,
							'show_cats'			=> true,
							'show_tags'			=> true,
							'show_author'		=> true,
							'show_sns_buttons'	=> true,
							'show_time_for_reding' => true
							)) {
	if (post_password_required()) return;

	global $options, $post;

	$blank_flg 		= true;
	$html_code		= '';
	$lastUpdate 	= '';

	extract($arrParams);

	// Get post format
	$postFormat = get_post_format($post->ID);
	$postType 	= $postType ? $postType : get_post_type();

	if (!is_page()) {
		// if(function_exists('the_ratings')) the_ratings();
		if ($postType === 'post' && $options['show_cat_on_meta'] && $options['show_cat_on_post_meta'] && !get_post_meta(get_the_ID(), 'dp_hide_cat', true) && $show_cats) {

			$cats_code = '';

			$cats = get_the_category();
			if ($cats) {
				foreach ($cats as $cat) {
					$cats_code .= '<a href="'.get_category_link($cat->cat_ID).'" rel="tag">' .$cat->cat_name.'</a> ';
				}
				$cats_code = '<div class="icon-folder entrylist-cat">' .$cats_code. '</div>';
				$blank_flg = false;
			}
			$html_code .= $cats_code;
		}
	}

	//Show tags
	if ( $options['show_tags'] && !get_post_meta(get_the_ID(), 'dp_hide_tag', true) && $show_tags && !is_mobile_dp()) { 
		$tags_code = '';

		$tags = get_the_tags();
		if ($tags) {
			foreach ($tags as $tag) {
				$tags_code .= '<a href="'.get_tag_link($tag->term_id).'" rel="tag" title="'.$tag->count.__(' topics of this tag.', 'DigiPress').'">'.$tag->name.'</a> ';
			}
			$tags_code = '<div class="icon-tags entrylist-cat">'.$tags_code.'</div>';
			$blank_flg = false;
		}
		$html_code .= $tags_code;
	}

	// Post Date
	if ( ((is_single() && $options['show_pubdate_on_meta']) || (is_page() && $options['show_pubdate_on_meta_page'])) && !get_post_meta(get_the_ID(), 'dp_hide_date', true) && $options['show_date_on_post_meta'] && $show_date) {
		$blank_flg = false;
		// Last update
		if ( $options['show_last_update'] && ( get_the_modified_date() != get_the_date()) ) {
			$lastUpdate =  ' ('.__('Last Update:', 'DigiPress').get_the_modified_date().')';
		} else {
			$lastUpdate = '';
		}
		$html_code .= '<span class="icon-calendar"><time datetime="'. get_the_date('c').'" pubdate="pubdate" class="updated">'.get_the_date().'</time>'.$lastUpdate.'</span>';
	}

	// If comment and trackback is open
	if (('open' == $post-> comment_status) && $show_comments && !is_page()) {
		$blank_flg = false;
		$html_code .= '<span class="icon-edit"><a href="#respond">'.__('Comment', 'DigiPress').'</a></span><span class="icon-comment">'. get_comments_popup_link(
							__('No Comments', 'DigiPress'), 
							__('Comment(1)', 'DigiPress'), 
							__('Comments(%)', 'DigiPress')).'</span>';
	}

	// Views
	if (($postType === 'post' ) && $options['show_views_on_meta'] && !get_post_meta(get_the_ID(), 'dp_hide_views', true) && $options['show_views_on_post_meta'] && $show_views && function_exists('dp_count_post_views')) {
		$blank_flg = false;
		$html_code .= '<span class="icon-eye">'.dp_count_post_views(get_the_ID(), false).'</span>';
	}

	// Author
	if ((($postType === 'post' && $options['show_author_on_meta']) || ($postType === 'page' && $options['show_author_on_meta_page'])) && !get_post_meta(get_the_ID(), 'dp_hide_author', true) && $options['show_author_on_post_meta'] && $show_author) {
		$blank_flg = false;
		$html_code .= '<span class="icon-user vcard author"><a href="'.get_author_posts_url(get_the_author_meta('ID')).'" rel="author" title="'.__('Show articles of this user.', 'DigiPress').'" class="fn">'.get_the_author_meta('display_name').'</a></span>';
	}

	// Edit link
	if (is_user_logged_in() && current_user_can('level_10')) {
		$html_code .= '| <a href="'.get_edit_post_link().'">Edit</a>';
	}

	// SNS BUttons
	if ( !get_post_meta(get_the_ID(), 'hide_sns_icon', true) &&  $options['sns_button_on_meta'] && $show_sns_buttons ) {

		$blank_flg = false;

		$html_code .= dp_show_sns_buttons('bottom', false);
	} 

	if (!$blank_flg) {
		$html_code = '<footer class="postmeta_bottom">'.$html_code.'</footer>';
		echo $html_code;
	}
}	// End function


/*******************************************************
* Meta content in page at under the title
*******************************************************/
function showPostMetaForPageUnderTitle() { 
	if (post_password_required()) return;
	
	global $options, $post;

	$blank_flg = true;

	if (get_post_meta(get_the_ID(), 'dp_hide_date', true) && get_post_meta(get_the_ID(), 'dp_hide_author', true) && (!$options['sns_button_under_title'] || get_post_meta(get_the_ID(), 'hide_sns_icon', true)) ) {
		return;
	}
	?>
<div class="postmeta_title">
<div>
<?php if ($options['show_pubdate_on_meta_page'] && !get_post_meta(get_the_ID(), 'dp_hide_date', true) && $options['show_date_under_post_title']) : ?>
<span class="icon-calendar"><time datetime="<?php the_time('c'); ?>" pubdate="pubdate" class="updated"><?php echo get_the_date(); ?></time></span>
<?php endif; ?>
<?php if ('open' == $post-> comment_status) : ?>
<span class="icon-comment"><?php comments_popup_link(
							__('No Comments', 'DigiPress'), 
							__('Comment(1)', 'DigiPress'), 
							__('Comments(%)', 'DigiPress')); ?></span>
<?php endif; ?>
<?php if ($options['show_author_on_meta_page'] && !get_post_meta(get_the_ID(), 'dp_hide_author', true) && $options['show_author_under_post_title']) : ?>
<span class="icon-user vcard author"><span class="fn"><?php the_author_posts_link(); ?></span></span>
<?php edit_post_link(__('Edit', 'DigiPress'), ' | '); ?>
<?php endif; ?>
</div>
<?php // SNS BUttons
	if ((get_post_type() === 'post' || get_post_type() === 'page') && $options['sns_button_under_title']) :
		dp_show_sns_buttons('title');
	endif; ?>
</div>
<?php }	//End function


/*******************************************************
* Meta content in single and archive for MOBILE
*******************************************************/
function showPostMetaForArchiveMobile($showDate = true) {
	if (post_password_required()) return;

	global $options, $post;

	$postType = get_post_type();
?>
<div class="postmetadata_archive">
<?php 
	// Date
	if ( ($postType === 'post') && $options['show_pubdate_on_meta'] ) : 
?>
<time datetime="<?php the_time('c'); ?>" pubdate="pubdate" class="updated"><?php echo get_the_date(); ?></time>
<?php 
	endif;

	// Category
	if ($postType === 'post' && $options['show_cat_on_meta']) {

		$cats_code		= '';
		$cats 			= get_the_category();

		if ($cats) {
			$cats_code = '<span class="plane-label">' .$cats[0]->cat_name. '</span>';
			echo $cats_code;
		}
	}

	// // Comments
	// if ( comments_open() ) : // If comment is open 
	// 	echo '<span class="icon-comment">';
	// 		comments_popup_link(
	// 	__('No Comments', 'DigiPress'), 
	// 	__('Comment(1)', 'DigiPress'), 
	// 	__('Comments(%)', 'DigiPress'));
	// 	echo '</span>';
	// endif; 

	// // Views
	// if (($postType === 'post' ) && $options['show_views_on_meta']) {
	// 	echo '<span class="icon-eye">'.dp_count_post_views(get_the_ID()).'</span>';
	// }

	// // Author
	// if (($postType === 'post' ) && $options['show_author_on_meta']) {

	// 	echo '<span class="icon-user vcard">'.get_the_author_meta('display_name').'</span>';
	// }
?>
</div>
<?php 
}	//End function 
?>