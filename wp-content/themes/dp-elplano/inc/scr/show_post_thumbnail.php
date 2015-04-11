<?php
function show_post_thumbnail($width = 600, 
							 $height = 440, 
							 $post_id = null,
							 $if_img_tag = true) {

	$post_id = $post_id ? $post_id : get_the_ID();
	$img_tag = "";
	
	if(has_post_thumbnail($post_id)) {
		if ($if_img_tag) {
			$img_tag = get_the_post_thumbnail($post_id, array($width, $height));
		} else {
			$image_id 	= get_post_thumbnail_id();
			$image_url 	= wp_get_attachment_image_src($image_id, array($width, $height), true); 
			$img_tag 	= $image_url[0];
		}
		
	} else {
		preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"]/i', get_post($post_id)->post_content, $imgurl);
		if (isset($imgurl[1][0])) {

			if ($if_img_tag) {
				$img_tag = '<img src="'.$imgurl[1][0].'" width="'.$width.'" class="wp-post-image" alt="'.get_the_title().'" />';
			} else {
				$img_tag = $imgurl[1][0];
			}
			
		} else {
			$strPattern	=	'/(\.gif|\.jpg|\.jpeg|\.png)$/';
			if ($handle = opendir(DP_THEME_DIR . '/img/post_thumbnail')) {
				$image = '';
				$cnt = 0;
				while (false !== ($file = readdir($handle))) {
					if ($file != "." && $file != "..") {
						//Image file only
						if (preg_match($strPattern, $file)) {
							$image[$cnt] = DP_THEME_URI . '/img/post_thumbnail/'.$file;
							//count
							$cnt ++;
						}
					}
				}
				closedir($handle);
			}
			if ($cnt > 0) {
				$randInt = rand(0, $cnt - 1);

				if ($if_img_tag) {
					$img_tag = '<img src="'.$image[$randInt].'" width="'.$width.'" class="wp-post-image" alt="'.get_the_title().'" />';
				} else {
					$img_tag = $image[$randInt];
				}
				
			}
		}
	}
	
	return $img_tag;
}
?>