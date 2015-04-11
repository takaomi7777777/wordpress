<?php
/** ===================================================
* Echo slider Javascript
*
* @return	
*/
function make_slider_js($arrImages, $arrTitles, $arrUrls) {
	$options_visual = get_option('dp_options_visual');
	
	$transitionEffect = "transitionEffect:'".$options_visual['dp_slideshow_effect']."',";
	$slideDirection    = "slideDirection:'".$options_visual['dp_slideshow_direction']."',";
	$slideShowSpeed	   = "slideShowSpeed:".$options_visual['dp_slideshow_transition_time'].",";
	$nextSlideDelay  = "nextSlideDelay:".$options_visual['dp_slideshow_speed'].",";

	$images = '';
	$titles = '';
	$urls 	= '';

	$order = '';

	if ($options_visual['dp_slideshow_effect'] == 'fade') {
		$slideDirection = '';
	}

	
	switch ($options_visual['dp_slideshow_order']) {
		case 'date':
			$order = "sequenceMode:'normal',";
			break;
		case 'random':
			$order = "sequenceMode:'random',";
			break;
		default:
		 	$order = "sequenceMode:'normal',";
		 	break;
	}

	foreach ($arrImages as $image) {
		$images .= '"' . $image . '",';
	}

	foreach ($arrTitles as $title) {
		$titles .= '"' . $title . '",';
	}

	foreach ($arrUrls as $url) {
		$urls .= '"' . $url . '",';
	}
	
	if ($arrTitles && $arrUrls) {
		$js_code =
"<script>
j$(document).ready(function(){
	j$('#site_title').bgStretcher({
		images:[" . $images . "],
		titles:[" . $titles . "],
		urls:[" . $urls . "],
		imageWidth:980, 
		imageHeight:650, 
		" . $slideDirection . $nextSlideDelay . $slideShowSpeed . $transitionEffect . $order . "
		buttonPrev:'#str_nav_prev',
		buttonNext:'#str_nav_next',
		pagination:'#stretcher_nav',
		callbackfunction: 'showHeaderContents'
	});
})
</script>";
	} else {
	$js_code =
"<script>
j$(document).ready(function(){
	j$('#site_title').bgStretcher({
		images:[" . $images . "],
		imageWidth:980, 
		imageHeight:650, 
		" . $slideDirection . $nextSlideDelay . $slideShowSpeed . $transitionEffect . $order . "
		buttonPrev:'#str_nav_prev',
		buttonNext:'#str_nav_next',
		pagination:'#stretcher_nav',
		callbackfunction: 'showHeaderContents'
	});
})
</script>";
	}

	$js_code = str_replace(array("\r\n","\r","\n","\t"), '', $js_code);

	return $js_code;
}

/** ===================================================
* Create slideshow source
*
*/
function getSlideshowSource($width = 980, $height = 650) {
	//Get options
	$options 		= get_option('dp_options');
	$options_visual = get_option('dp_options_visual');

	$num 		= $options_visual['dp_number_of_slideshow'];
	$orderby 	= $options_visual['dp_slideshow_orderby'];

	$img_url		= get_post_meta(get_the_ID(), 'slideshow_image_url');
	$post_desc		= get_post_meta(get_the_ID(), 'slideshow_description');

	$arrImages	= array();
	$arrTitles	= array();
	$arrUrls 	= array();

	if ($options_visual['dp_slideshow_type'] === 'post') {
		global $post;

		// Slideshow type is POST
		// Query
		$posts = get_posts(  array(
								'numberposts'	=> $num,
								'meta_key'		=> 'is_slideshow',
								'meta_value'	=> 'true',
								'orderby'		=> $orderby // or rand
								)
		);
		// Loop query posts
		foreach( $posts as $post ) : setup_postdata($post);
			$slide_img_url 	= get_post_meta(get_the_ID(), 'slideshow_image_url');

			if ($slide_img_url[0]) {
				// Add image
				array_push($arrImages, $slide_img_url[0]);
			} else {
				if(has_post_thumbnail()) {
					$image_id = get_post_thumbnail_id();
					$image_url = wp_get_attachment_image_src($image_id, array($width, $height), true); 
					// Add image
					array_push($arrImages, $image_url[0]);
				} else {
					preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"]/i', get_post(get_the_ID())->post_content, $imgurl);
					if ($imgurl[1][0]) {
						// Add image
						array_push($arrImages, $imgurl[1][0]);
					} else {
						$strPattern	=	'/(\.gif|\.jpg|\.jpeg|\.png)$/';
						
						if ($handle = opendir(DP_THEME_DIR . '/img/slideshow')) {
							$image;
							$cnt = 0;
							while (false !== ($file = readdir($handle))) {
								if ($file != "." && $file != "..") {
									//Image file only
									if (preg_match($strPattern, $file)) {
										$image[$cnt] = DP_THEME_URI . '/img/slideshow/'.$file;
										//count
										$cnt ++;
									}
								}
							}
							closedir($handle);
						}
						if ($cnt > 0) {
							$randInt = rand(0, $cnt - 1);
							// Add image
							array_push($arrImages, $image[$randInt]);
						}
					}
				}
			}
			//Titile
			array_push($arrTitles, get_the_title());
			//URL
			array_push($arrUrls, get_permalink());
		endforeach;

	} else {
		// Slideshow type is header image
		$strPattern	=	'/(\.gif|\.jpg|\.jpeg|\.png)$/';
						
		if ($handle = opendir(DP_THEME_DIR . '/img/_uploads/header')) {
			$image;
			$cnt = 0;
			while (false !== ($file = readdir($handle))) {
				if ($file != "." && $file != "..") {
					//Image file only
					if (preg_match($strPattern, $file)) {
						$image[$cnt] = DP_THEME_URI . '/img/_uploads/header/'.$file;
						//count
						$cnt ++;
					}
				}
			}
			closedir($handle);
		}
		if (0 < $cnt && $cnt <= $num) {
			$arrImages = $image;
		} else if ($cnt > $num) {
			for ($i=0; $i < 7; $i++) { 
				array_push($arrImages, $image[$i]);	
			}
		}
	}

	// Display
	echo make_slider_js($arrImages, $arrTitles, $arrUrls);
}


/** ===================================================
* Show the Banner Contents
*
* @return	none
*/
function dp_banner_contents() {
	//Get options
	$options 		= get_option('dp_options');
	$options_visual = get_option('dp_options_visual');
	$type			= $options_visual['dp_header_content_type'];
	$headerImgFixed = $options_visual['dp_header_img_fixed'] ? 'background-attachment:fixed;background-position-y:44px;' : '';
	$my_contents	= '';
	$free_contents	= '';

	if (is_front_page() && is_home() && !is_paged() && !isset($_REQUEST['q']) ) :
		// Top page
		switch ($type) {
			case "1":	// Header image
				if ($options_visual['dp_header_img'] === 'random') {
					$strPattern	=	'/(\.gif|\.jpg|\.jpeg|\.png)$/';
					$upDir		= DP_THEME_DIR . '/img/_uploads';
					$cnt		= 0;
					$images;	// Array for images
					
					if ($handle = opendir($upDir . '/header')) {
						//Reading file
						while (false !== ($file = readdir($handle))) {
							if ($file != "." && $file != "..") {
								//Image file only
								if (preg_match($strPattern, $file)) {
									// Get image and set to array
									$images[$cnt] = DP_THEME_URI . '/img/_uploads/header/'.$file;
									$cnt ++;
								}
							}
						}
					}

					if ($cnt > 0) {
						//repeat
						$repeat = $options_visual['dp_header_repeat'];
						if ($repeat == 'no-repeat') {
							$repeat = ' '.$repeat;
						} else {
							$repeat = ' left top '.$repeat;
						}
						//show image
						$rnd = rand(0, $cnt - 1);
						$my_contents = '<div id="site_title" style="background:url('.$images[$rnd].')'.$repeat.';background-size:100% auto;' . $headerImgFixed . '">';
					}
				} else {
					// Normal header image
					$my_contents = '<div id="site_title">';
				}
				echo $my_contents;
				break;

			case "2":	// Slideshow
				$my_contents = '<div id="site_title">';
				echo $my_contents;
				break;
		}
		?>
<?php if ($options_visual['header_area_low_height']) : ?>
<div id="header_container_half">
<?php else: ?>
<div id="header_container">
<?php endif; ?>
<div id="header_left"><div id="h_area"><hgroup>
<h1><a href="<?php echo home_url(); ?>/" title="<?php bloginfo('name'); ?>">
		<?php
		if ($options_visual['h1title_as_what'] !== 'image') {
			echo dp_h1_title();
		} else {
			echo '<img src="'.get_template_directory_uri().
			 	 '/img/_uploads/title/'.$options_visual['dp_title_img'].'" alt="'.dp_h1_title().'" />';
		}
		?>
</a></h1>
<?php echo dp_h2_title('<h2>', '</h2>'); ?>
</hgroup>
<?php if ($options['enable_my_desc']) : ?>
<div id="site_banner_desc"><span><?php echo dp_site_desc(); ?></span></div>
<?php endif; ?>
</div>
		<?php // Header left widget
		if (is_active_sidebar('widget-top-left-bottom')) : ?>
<div id="top-left-bottom-widget" class="clearfix">
		<?php dynamic_sidebar( 'widget-top-left-bottom' ); ?>
</div>
		<?php endif; ?>
</div>
		<?php // Header right widget
		if (is_active_sidebar('widget-top-right')) : ?>
<div id="top-right-widget" class="clearfix">
		<?php dynamic_sidebar( 'widget-top-right' ); ?>
</div>
		<?php endif; ?>
</div>
</div>
<?php else : // Except Top page ?>
<div id="header_container_paged">
<hgroup>
<h1><a href="<?php echo home_url(); ?>/" title="<?php bloginfo('name'); ?>">
		<?php
		if ($options_visual['h1title_as_what'] !== 'image') {
			echo dp_h1_title();
		} else {
			echo '<img src="'.get_template_directory_uri().
			 	 '/img/_uploads/title/'.$options_visual['dp_title_img_paged'].'" alt="'.dp_h1_title().'" />';
		}
		?>
</a></h1>
<?php 	// Echo H2 title
		if ($options_visual['h1title_as_what'] != 'image') :
			echo dp_h2_title('<h2>', '</h2>');
		endif;
?>
</hgroup>
</div>
<?php endif; // End of "if (is_front_page() && !is_paged())"
}	// End of function ?>
<?php
/** ===================================================
* Show the Banner Contents
*
* @return	none
*/
function dp_banner_contents_mobile() {
	//Get options
	$options_visual = get_option('dp_options_visual');
?>
<div id="header_container_paged">
<hgroup>
<h1><a href="<?php echo home_url(); ?>/" title="<?php bloginfo('name'); ?>">
		<?php
		if ($options_visual['h1title_as_what'] !== 'image') {
			echo dp_h1_title();
		} else {
			echo '<img src="'.get_template_directory_uri().
			 	 '/img/_uploads/title/'.$options_visual['dp_title_img_mobile'].'" alt="'.dp_h1_title().'" />';
		}
		?>
</a></h1>
<?php 	// Echo H2 title
		if ($options_visual['h1title_as_what'] != 'image') :
			echo dp_h2_title('<h2>', '</h2>');
		endif;
?>
</hgroup>
</div>
<?php 
} // End of function
?>