<?php
/*******************************************************
* DigiPress Theme Option Class
*******************************************************/
class digipress_options {
	const OPTION_NAME	= 'digipress';
	const OPTION_VISUAL	= 'digipress_visual';
	const OPTION_CONTROL	= 'digipress_control';
	const OPTION_DELETE	= 'digipress_delete_file';
	const OPTION_IMG_EDIT	= 'digipress_edit_images';
	/* ==================================================
	* Save the theme settings for visual
	* ==================================================
	* @param	none
	* @return	array	$options_visual
	*/
	//Get Options
	function getOptions_visual() {
		//Global scope
		global $def_visual;
		
		$options_visual = get_option('dp_options_visual');
		if (!is_array($options_visual)) {
			//Set default
			$options_visual = $def_visual;
			//Update
			update_option('dp_options_visual', $options_visual);
		}
		return $options_visual;
	}
	//Update visual settings
	function update_visual() {
		if(isset($_POST['dp_save_visual'])) {
			//Get control settings
			global $options;
			//Set default
			$options_visual = digipress_options::getOptions_visual();

			//Column type
			$options_visual['dp_column']		= $_POST['dp_column'];
			//Sidebar type
			$options_visual['dp_theme_sidebar']		= $_POST['dp_theme_sidebar'];
			$options_visual['dp_theme_sidebar2']		= $_POST['dp_theme_sidebar2'];
			// 1Column only top page
			if (isset($_POST['dp_1column_only_top'])) {
				$options_visual['dp_1column_only_top'] 	= (bool)true;
			} else {
				$options_visual['dp_1column_only_top'] 	= (bool)false;
			}
			
			//Gradient of header top
			$options_visual['header_top_gradient1']	= $_POST['header_top_gradient1'];
			$options_visual['header_top_gradient2']	= $_POST['header_top_gradient2'];
			
			//Gradient of header bottom
			$options_visual['header_bottom_gradient1']	= $_POST['header_bottom_gradient1'];
			$options_visual['header_bottom_gradient2']	= $_POST['header_bottom_gradient2'];

			//Breadcrumb font color
			$options_visual['header_breadcrumb_font_color']	= $_POST['header_breadcrumb_font_color'];
			//Breadcrumb text shadow color
			$options_visual['header_breadcrumb_text_shadow']	= $_POST['header_breadcrumb_text_shadow'];
			
			//Header text color
			$options_visual['header_paged_font_color']	= $_POST['header_paged_font_color'];
			//Header anchor color
			$options_visual['header_paged_link_color']	= $_POST['header_paged_link_color'];
			//Header anchor hover color
			$options_visual['header_paged_link_hover_color'] = $_POST['header_paged_link_hover_color'];
			//Header text shadow
			$options_visual['header_paged_text_shadow']	= $_POST['header_paged_text_shadow'];
			// Header area to half size
			if (isset($_POST['header_area_low_height'])) {
				$options_visual['header_area_low_height'] 	= (bool)true;
			} else {
				$options_visual['header_area_low_height'] 	= (bool)false;
			}

			// Header area box shadow opacity
			$options_visual['header_area_shadow_opacity'] = mb_convert_kana($_POST['header_area_shadow_opacity'],"n");
			if (!is_numeric($options_visual['header_area_shadow_opacity'])) $options_visual['header_area_shadow_opacity'] = '0';

			// Top page header title background color
			if (isset($_POST['show_bgcolor_in_header_title'])) {
				$options_visual['show_bgcolor_in_header_title'] 	= (bool)true;
			} else {
				$options_visual['show_bgcolor_in_header_title'] 	= (bool)false;
			}
			$options_visual['header_title_bgcolor'] = $_POST['header_title_bgcolor'];
			$options_visual['header_title_bg_opacity'] = mb_convert_kana($_POST['header_title_bg_opacity'],"n");
			if (!is_numeric($options_visual['header_title_bg_opacity'])) $options_visual['header_title_bg_opacity'] = '70';


			// Floating menu
			$options_visual['fixed_menu_color']	= $_POST['fixed_menu_color'];
			$options_visual['fixed_menu_link_color']	= $_POST['fixed_menu_link_color'];
			$options_visual['fixed_menu_shadow_opacity'] = mb_convert_kana($_POST['fixed_menu_shadow_opacity'],"n");
			if (!is_numeric($options_visual['fixed_menu_shadow_opacity'])) $options_visual['fixed_menu_shadow_opacity'] = 0;
			$options_visual['fixed_menu_border_color1']	= $_POST['fixed_menu_border_color1'];
			$options_visual['fixed_menu_border_color2']	= $_POST['fixed_menu_border_color2'];
			$options_visual['fixed_menu_border_color3']	= $_POST['fixed_menu_border_color3'];
			$options_visual['fixed_menu_border_color4']	= $_POST['fixed_menu_border_color4'];
			$options_visual['fixed_menu_border_color5']	= $_POST['fixed_menu_border_color5'];

			//anchor color of menu
			$options_visual['menu_link_color']		= $_POST['menu_link_color'];
			//anchor color of menu on hovering
			$options_visual['menu_link_hover_color']		= $_POST['menu_link_hover_color'];
			//caption color
			$options_visual['menu_caption_color']	= $_POST['menu_caption_color'];
			
			// Fixed header image position
			if (isset($_POST['dp_header_img_fixed'])) {
				$options_visual['dp_header_img_fixed']	= (bool)true;
			}  else {
				$options_visual['dp_header_img_fixed']	= (bool)false;
			}

			//content type of header banner area
			$options_visual['dp_header_content_type'] = $_POST['dp_header_content_type'];
			
			//Slideshow Type
			$options_visual['dp_slideshow_type']	= $_POST['dp_slideshow_type'];
			
			//Number of slideshow
			$options_visual['dp_number_of_slideshow']	= $_POST['dp_number_of_slideshow'];
			
			//Order of slideshow
			$options_visual['dp_slideshow_order']	= $_POST['dp_slideshow_order'];

			//Effect of slideshow
			$options_visual['dp_slideshow_effect']	= $_POST['dp_slideshow_effect'];

			// Transition time
			$options_visual['dp_slideshow_transition_time'] = mb_convert_kana($_POST['dp_slideshow_transition_time'],"n");
			if (!is_numeric($options_visual['dp_slideshow_transition_time'])) $options_visual['dp_slideshow_transition_time'] = '3000';

			// Time for each slide
			$options_visual['dp_slideshow_speed'] = mb_convert_kana($_POST['dp_slideshow_speed'],"n");
			if (!is_numeric($options_visual['dp_slideshow_speed'])) $options_visual['dp_slideshow_speed'] = '5500';

			//Slideshow direction
			$options_visual['dp_slideshow_direction']	= $_POST['dp_slideshow_direction'];
			
			//Change item number per a scroll
			$options_visual['dp_slideshow_change_items']	= $_POST['dp_slideshow_change_items'];

			//Header image
			$options_visual['dp_header_img']		= $_POST['dp_header_img'];

			//method of header image display
			$options_visual['dp_header_repeat']		= $_POST['dp_header_repeat'];
			
			//Background image
			$options_visual['dp_background_img']		= $_POST['dp_background_img'];
			
			//method of background image display
			$options_visual['dp_background_repeat']		= $_POST['dp_background_repeat'];

			//background color
			$options_visual['site_bg_color']		= $_POST['site_bg_color'];
			
			//backgroud color of container
			$options_visual['container_bg_color']		= $_POST['container_bg_color'];

			//H1 title type
			$options_visual['h1title_as_what']		= $_POST['h1title_as_what'];
			
			//H1 title image
			$options_visual['dp_title_img']		= isset($_POST['dp_title_img']) ? $_POST['dp_title_img'] : '';
			$options_visual['dp_title_img_paged']	= isset($_POST['dp_title_img_paged']) ? $_POST['dp_title_img_paged'] : '';
			$options_visual['dp_title_img_mobile']	= isset($_POST['dp_title_img_mobile']) ? $_POST['dp_title_img_mobile'] : '';
			
			//font color
			$options_visual['base_font_color']		= $_POST['base_font_color'];
			
			//base text shadow color
			$options_visual['base_text_shadow_color']		= $_POST['base_text_shadow_color'];
			
			//font size
			$options_visual['base_font_size'] = mb_convert_kana($_POST['base_font_size'],"n");
			if (!is_numeric($options_visual['base_font_size'])) $options_visual['base_font_size'] = '14.5';
			
			//font size unit
			$options_visual['base_font_size_unit']		= $_POST['base_font_size_unit'];
			
			//anchor style
			$options_visual['base_link_underline']		= $_POST['base_link_underline'];
			$options_visual['base_link_bold']		= isset($_POST['base_link_bold']) ? $_POST['base_link_bold'] : '';
			
			//anchor text color
			$options_visual['base_link_color']		= $_POST['base_link_color'];

			//Common title color
			$options_visual['common_title_color']		= $_POST['common_title_color'];
			
			//anchor hover text color
			$options_visual['base_link_hover_color']	= $_POST['base_link_hover_color'];
			
			//H1 title color
			$options_visual['header_toppage_h1_color']		= $_POST['header_toppage_h1_color'];

			//Toppage header font color
			$options_visual['header_toppage_font_color']		= $_POST['header_toppage_font_color'];
			

			//Text shadow color in top page header area
			$options_visual['header_toppage_text_shadow_color']	= $_POST['header_toppage_text_shadow_color'];
			
			//Container bottom font color
			$options_visual['container_bottom_font_color']		= $_POST['container_bottom_font_color'];
			//Container bottom text shadow
			$options_visual['container_bottom_text_shadow']		= $_POST['container_bottom_text_shadow'];
			// Gradient of container bottom
			$options_visual['container_bottom_gradient1']	= $_POST['container_bottom_gradient1'];
			$options_visual['container_bottom_gradient2']	= $_POST['container_bottom_gradient2'];

			//footer column number
			$options_visual['footer_col_number']		= $_POST['footer_col_number'];
			//footer text color
			$options_visual['footer_text_color']		= $_POST['footer_text_color'];
			//footer text shadow color
			$options_visual['footer_text_shadow_color']		= $_POST['footer_text_shadow_color'];
			//footer link color
			$options_visual['footer_link_color']		= $_POST['footer_link_color'];
			//footer link hover color
			$options_visual['footer_link_hover_color']		= $_POST['footer_link_hover_color'];
			// Gradient of footer
			$options_visual['footer_gradient1']	= $_POST['footer_gradient1'];
			$options_visual['footer_gradient2']	= $_POST['footer_gradient2'];

			//Original CSS
			$options_visual['original_css']		= stripslashes($_POST['original_css']);

			//Update
			update_option('dp_options_visual', $options_visual);
			// Update CSS
			if (!dp_css_create()) return;
			add_action('admin_notices',  array('digipress_options', 'dp_update_msg'));
		} else {
			//Default
			digipress_options::getOptions_visual();
		}
	}

	/* ==================================================
	* Save the theme settings for control
	* ==================================================
	* @param	nonoe
	* @return	array	$options
	*/
	//Get Options
	function getOptions() {
		//Global scope
		global $def_control;
		$options = get_option('dp_options');
		if (!is_array($options)) {
			//Set default
			$options = $def_control;
			//Update
			update_option('dp_options', $options);
		}
		return $options;
	}
	//Update control settings
	function update() {
		if(isset($_POST['dp_save'])) {
			$options_visual = get_option('dp_options_visual');
			$options = digipress_options::getOptions();
			
			//IE faster
			if (isset($_POST['fast_on_ie'])) {
				$options['fast_on_ie'] 	= (bool)true;
			} else {
				$options['fast_on_ie'] 	= (bool)false;
			}

			if (isset($_POST['backward_compatibility'])) {
				$options['backward_compatibility'] 	= (bool)true;
			} else {
				$options['backward_compatibility'] 	= (bool)false;
			}
			
			// Use compressed jQuery
			if (isset($_POST['use_google_jquery'])) {
				$options['use_google_jquery'] 	= (bool)true;
			} else {
				$options['use_google_jquery'] 	= (bool)false;
			}

			if (isset($_POST['disable_mobile_fast'])) {
				$options['disable_mobile_fast'] 	= (bool)true;
			} else {
				$options['disable_mobile_fast'] 	= (bool)false;
			}

			if (isset($_POST['disable_cat_slider'])) {
				$options['disable_cat_slider'] 	= (bool)true;
			} else {
				$options['disable_cat_slider'] 	= (bool)false;
			}

			$options['gcs_id'] = $_POST['gcs_id'];
			
			$options['ls_token'] = $_POST['ls_token'];
			$options['ls_mid'] = $_POST['ls_mid'];

			$options['phg_token'] = $_POST['phg_token'];
			
			$options['adsense_id'] = $_POST['adsense_id'];

			$options['blog_start_year'] = $_POST['blog_start_year'];

			$options['news_cpt_slug_id']	= $_POST['news_cpt_slug_id'];

			if (isset($_POST['enable_title_site_name'])) {
				$options['enable_title_site_name'] = (bool)true;
			} else {
				$options['enable_title_site_name'] = (bool)false;
			}

			$options['headline_type'] = $_POST['headline_type'];
			$options['headline_static_text'] = htmlspecialchars(stripslashes($_POST['headline_static_text']));
			$options['headline_slider_type'] = $_POST['headline_slider_type'];
			$options['headline_slider_text1'] = htmlspecialchars(stripslashes($_POST['headline_slider_text1']));
			$options['headline_slider_text2'] = htmlspecialchars(stripslashes($_POST['headline_slider_text2']));
			$options['headline_slider_text3'] = htmlspecialchars(stripslashes($_POST['headline_slider_text3']));
			$options['headline_slider_text4'] = htmlspecialchars(stripslashes($_POST['headline_slider_text4']));
			$options['headline_slider_text5'] = htmlspecialchars(stripslashes($_POST['headline_slider_text5']));

			$options['title_site_name_top'] = htmlspecialchars(stripslashes($_POST['title_site_name_top']));
			$options['title_site_name'] = htmlspecialchars(stripslashes($_POST['title_site_name']));
			$options['title_site_name_separate'] = htmlspecialchars($_POST['title_site_name_separate']);

			$options['headline_slider_num'] = mb_convert_kana($_POST['headline_slider_num'],"n");

			$options['headline_ticker_velocity'] = mb_convert_kana($_POST['headline_ticker_velocity'],"n");

			$options['headline_slider_main_title'] = htmlspecialchars(stripslashes($_POST['headline_slider_main_title']));
		
			$options['headline_slider_order'] = $_POST['headline_slider_order'];

			$options['headline_slider_fx'] = $_POST['headline_slider_fx'];

			if (isset($_POST['headline_slider_date'])) {
				$options['headline_slider_date'] = (bool)true;
			} else {
				$options['headline_slider_date'] = (bool)false;
			}

			if (isset($_POST['headline_slider_shuffle'])) {
				$options['headline_slider_shuffle'] = (bool)true;
			} else {
				$options['headline_slider_shuffle'] = (bool)false;
			}

			if (isset($_POST['headline_ticker_hover_stop'])) {
				$options['headline_ticker_hover_stop'] = (bool)true;
			} else {
				$options['headline_ticker_hover_stop'] = (bool)false;
			}

			$options['headline_slider_time'] = mb_convert_kana($_POST['headline_slider_time'],"n");
			if (isset($_POST['headline_hover_stop'])) {
				$options['headline_hover_stop'] = (bool)true;
			} else {
				$options['headline_hover_stop'] = (bool)false;
			}
			if (isset($_POST['headline_arrow'])) {
				$options['headline_arrow'] = (bool)true;
			} else {
				$options['headline_arrow'] = (bool)false;
			}
		

			if (isset($_POST['enable_meta_def_kw'])) {
				$options['enable_meta_def_kw'] = (bool)true;
			} else {
				$options['enable_meta_def_kw'] = (bool)false;
			}
			$options['meta_def_kw'] = stripslashes($_POST['meta_def_kw']);

			$options['meta_ogp_img_url'] = $_POST['meta_ogp_img_url'];

			if (isset($_POST['enable_meta_def_desc'])) {
				$options['enable_meta_def_desc'] = (bool)true;
			} else {
				$options['enable_meta_def_desc'] = (bool)false;
			}
			$options['meta_def_desc'] = stripslashes($_POST['meta_def_desc']);
			
			$options['custom_head_content'] = stripslashes($_POST['custom_head_content']);
			
			if (isset($_POST['enable_h1_title'])) {
				$options['enable_h1_title'] = (bool)true;
			} else {
				$options['enable_h1_title'] = (bool)false;
			}
			$options['h1_title'] = htmlspecialchars(stripslashes($_POST['h1_title']));
			

			if (isset($_POST['enable_h2_title'])) {
				$options['enable_h2_title'] = (bool)true;
			} else {
				$options['enable_h2_title'] = (bool)false;
			}
			$options['h2_title_top'] = htmlspecialchars(stripslashes($_POST['h2_title_top']));
			$options['h2_title'] = isset($_POST['h2_title']) ? htmlspecialchars(stripslashes($_POST['h2_title'])) : '';

			if (isset($_POST['h2_title_paged_show'])) {
				$options['h2_title_paged_show'] = (bool)true;
			} else {
				$options['h2_title_paged_show'] = (bool)false;
			}
			
			if (isset($_POST['enable_my_desc'])) {
				$options['enable_my_desc'] = (bool)true;
			} else {
				$options['enable_my_desc'] = (bool)false;
			}
			$options['my_desc'] = stripslashes($_POST['my_desc']);
			

			if (isset($_POST['show_fixed_menu_search'])) {
				$options['show_fixed_menu_search'] = (bool)true;
			} else {
				$options['show_fixed_menu_search'] = (bool)false;
			}

			if (isset($_POST['show_floating_gcs'])) {
				$options['show_floating_gcs'] = (bool)true;
			} else {
				$options['show_floating_gcs'] = (bool)false;
			}
			
			if (isset($_POST['show_fixed_menu_sns'])) {
				$options['show_fixed_menu_sns'] = (bool)true;
			} else {
				$options['show_fixed_menu_sns'] = (bool)false;
			}
			if (isset($_POST['rss_to_feedly'])) {
				$options['rss_to_feedly'] = (bool)true;
			} else {
				$options['rss_to_feedly'] = (bool)false;
			}
			$options['fixed_menu_twitter_url'] = $_POST['fixed_menu_twitter_url'];
			$options['fixed_menu_fb_url'] = $_POST['fixed_menu_fb_url'];
			$options['fixed_menu_gplus_url']	= $_POST['fixed_menu_gplus_url'];

			if (isset($_POST['auto_resize_menu'])) {
				$options['auto_resize_menu'] = (bool)true;
			} else {
				$options['auto_resize_menu'] = (bool)false;
			}
			
			if (isset($_POST['hide_home_breadcrumb'])) {
				$options['hide_home_breadcrumb'] = (bool)true;
			} else {
				$options['hide_home_breadcrumb'] = (bool)false;
			}
			
			// Top upper
			$options['show_specific_cat_index_top'] = $_POST['show_specific_cat_index_top'];
			if (ctype_digit($_POST['specific_cat_index_top'])) {
				$options['specific_cat_index_top'] = $_POST['specific_cat_index_top'];
			} else {
				$options['specific_cat_index_top'] = '';
			}
			$options['specific_post_type_index_top'] = isset($_POST['specific_post_type_index_top']) ? $_POST['specific_post_type_index_top'] : '';

			// Top under
			$options['show_specific_cat_index'] = $_POST['show_specific_cat_index'];
			if (ctype_digit($_POST['specific_cat_index'])) {
				$options['specific_cat_index'] = $_POST['specific_cat_index'];
			} else {
				$options['specific_cat_index'] = '';
			}
			$options['specific_post_type_index'] = isset($_POST['specific_post_type_index']) ? $_POST['specific_post_type_index'] : '';
			
			// Digit Check -----------------------------------
			if (ctype_digit($_POST['number_posts_index'])) {
				$options['number_posts_index'] = $_POST['number_posts_index'];
			} else {
				$options['number_posts_index'] = '';
			}
			if (ctype_digit($_POST['number_posts_index_mobile'])) {
				$options['number_posts_index_mobile'] = $_POST['number_posts_index_mobile'];
			} else {
				$options['number_posts_index_mobile'] = '';
			}
			if (isset($_POST['number_posts_index_paged'])) {
				if (ctype_digit($_POST['number_posts_index_paged'])) {
					$options['number_posts_index_paged'] = $_POST['number_posts_index_paged'];
				} else {
					$options['number_posts_index_paged'] = '';
				}
			}
			if (ctype_digit($_POST['number_posts_category'])) {
				$options['number_posts_category'] = $_POST['number_posts_category'];
			} else {
				$options['number_posts_category'] = '';
			}
			if (ctype_digit($_POST['number_posts_tag'])) {
				$options['number_posts_tag'] = $_POST['number_posts_tag'];
			} else {
				$options['number_posts_tag'] = '';
			}
			if (ctype_digit($_POST['number_posts_search'])) {
				$options['number_posts_search'] = $_POST['number_posts_search'];
			} else {
				$options['number_posts_search'] = '';
			}
			if (ctype_digit($_POST['number_posts_date'])) {
				$options['number_posts_date'] = $_POST['number_posts_date'];
			} else {
				$options['number_posts_date'] = '';
			}

			if (ctype_digit($_POST['number_posts_category_mobile'])) {
				$options['number_posts_category_mobile'] = $_POST['number_posts_category_mobile'];
			} else {
				$options['number_posts_category_mobile'] = '';
			}
			if (ctype_digit($_POST['number_posts_tag_mobile'])) {
				$options['number_posts_tag_mobile'] = $_POST['number_posts_tag_mobile'];
			} else {
				$options['number_posts_tag_mobile'] = '';
			}
			if (ctype_digit($_POST['number_posts_search_mobile'])) {
				$options['number_posts_search_mobile'] = $_POST['number_posts_search_mobile'];
			} else {
				$options['number_posts_search_mobile'] = '';
			}
			if (ctype_digit($_POST['number_posts_date_mobile'])) {
				$options['number_posts_date_mobile'] = $_POST['number_posts_date_mobile'];
			} else {
				$options['number_posts_date_mobile'] = '';
			}
			//-----------------------------------------------

			if (isset($_POST['show_top_content'])) {
				$options['show_top_content'] = (bool)true;
			} else {
				$options['show_top_content'] = (bool)false;
			}

			$options['new_post_label'] = htmlspecialchars(stripslashes($_POST['new_post_label']));

			$options['new_post_count'] = $_POST['new_post_count'];
			

			if (isset($_POST['time_for_reading'])) {
				$options['time_for_reading'] = (bool)true;
			} else {
				$options['time_for_reading'] = (bool)false;
			}
			
			if (isset($_POST['show_top_under_content'])) {
				$options['show_top_under_content'] = (bool)true;
			} else {
				$options['show_top_under_content'] = (bool)false;
			}

			$options['top_post_show_type'] = $_POST['top_post_show_type'];

			$options['top_excerpt_type'] = $_POST['top_excerpt_type'];

			$options['top_posts_table_title'] = htmlspecialchars(stripslashes($_POST['top_posts_table_title']));

			$options['top_category_area_title'] = htmlspecialchars(stripslashes($_POST['top_category_area_title']));

			$options['top_category_orderby'] = $_POST['top_category_orderby'];

			$options['top_exclude_categories'] = stripslashes($_POST['top_exclude_categories']);

			if (isset($_POST['top_category_show_post_count'])) {
				$options['top_category_show_post_count'] = (bool)true;
			} else {
				$options['top_category_show_post_count'] = (bool)false;
			}

			$options['navigation_text_to_2page'] = $_POST['navigation_text_to_2page'];
			$options['navigation_text_to_2page_archive'] = $_POST['navigation_text_to_2page_archive'];
			
			if (isset($_POST['hatebu_number_after_title_top'])) {
				$options['hatebu_number_after_title_top'] = (bool)true;
			} else {
				$options['hatebu_number_after_title_top'] = (bool)false;
			}
			if (isset($_POST['tweet_number_after_title_top'])) {
				$options['tweet_number_after_title_top'] = (bool)true;
			} else {
				$options['tweet_number_after_title_top'] = (bool)false;
			}
			if (isset($_POST['likes_number_after_title_top'])) {
				$options['likes_number_after_title_top'] = (bool)true;
			} else {
				$options['likes_number_after_title_top'] = (bool)false;
			}
			
			if (isset($_POST['hatebu_number_after_title_archive'])) {
				$options['hatebu_number_after_title_archive'] = (bool)true;
			} else {
				$options['hatebu_number_after_title_archive'] = (bool)false;
			}
			if (isset($_POST['tweet_number_after_title_archive'])) {
				$options['tweet_number_after_title_archive'] = (bool)true;
			} else {
				$options['tweet_number_after_title_archive'] = (bool)false;
			}
			if (isset($_POST['likes_number_after_title_archive'])) {
				$options['likes_number_after_title_archive'] = (bool)true;
			} else {
				$options['likes_number_after_title_archive'] = (bool)false;
			}


			if (isset($_POST['show_pubdate'])) {
				$options['show_pubdate'] = (bool)true;
			} else {
				$options['show_pubdate'] = (bool)false;
			}

			if (isset($_POST['show_cat_entrylist'])) {
				$options['show_cat_entrylist']	= (bool)true;
			} else {
				$options['show_cat_entrylist']	= (bool)false;
			}
			
			if (isset($_POST['show_comment_num_index'])) {
				$options['show_comment_num_index'] = (bool)true;
			} else {
				$options['show_comment_num_index'] = (bool)false;
			}
			
			if (isset($_POST['show_thumbnail'])) {
				$options['show_thumbnail'] = (bool)true;
			} else {
				$options['show_thumbnail'] = (bool)false;
			}

			if (isset($_POST['show_hatebu_number'])) {
				$options['show_hatebu_number'] = (bool)true;
			} else {
				$options['show_hatebu_number'] = (bool)false;
			}
			
			if (isset($_POST['show_tweet_number'])) {
				$options['show_tweet_number'] = (bool)true;
			} else {
				$options['show_tweet_number'] = (bool)false;
			}
			
			if (isset($_POST['show_likes_number'])) {
				$options['show_likes_number'] = (bool)true;
			} else {
				$options['show_likes_number'] = (bool)false;
			}

			if (isset($_POST['show_archive_title'])) {
				$options['show_archive_title'] = (bool)true;
			} else {
				$options['show_archive_title'] = (bool)false;
			}

			$options['archive_post_show_type'] = $_POST['archive_post_show_type'];

			$options['archive_excerpt_type'] = $_POST['archive_excerpt_type'];

			if (isset($_POST['show_pubdate_on_meta'])) {
				$options['show_pubdate_on_meta'] = (bool)true;
			} else {
				$options['show_pubdate_on_meta'] = (bool)false;
			}
			
			if (isset($_POST['show_pubdate_on_meta_page'])) {
				$options['show_pubdate_on_meta_page'] = (bool)true;
			} else {
				$options['show_pubdate_on_meta_page'] = (bool)false;
			}

			if (isset($_POST['show_date_under_post_title'])) {
				$options['show_date_under_post_title'] = (bool)true;
			} else {
				$options['show_date_under_post_title'] = (bool)false;
			}

			if (isset($_POST['show_date_on_post_meta'])) {
				$options['show_date_on_post_meta'] = (bool)true;
			} else {
				$options['show_date_on_post_meta'] = (bool)false;
			}
			
			if (isset($_POST['show_author_on_meta'])) {
				$options['show_author_on_meta'] = (bool)true;
			} else {
				$options['show_author_on_meta'] = (bool)false;
			}
			
			if (isset($_POST['show_author_on_meta_page'])) {
				$options['show_author_on_meta_page'] = (bool)true;
			} else {
				$options['show_author_on_meta_page'] = (bool)false;
			}

			if (isset($_POST['show_author_under_post_title'])) {
				$options['show_author_under_post_title'] = (bool)true;
			} else {
				$options['show_author_under_post_title'] = (bool)false;
			}

			if (isset($_POST['show_author_on_post_meta'])) {
				$options['show_author_on_post_meta'] = (bool)true;
			} else {
				$options['show_author_on_post_meta'] = (bool)false;
			}
			
			if (isset($_POST['show_views_on_meta'])) {
				$options['show_views_on_meta'] = (bool)true;
			} else {
				$options['show_views_on_meta'] = (bool)false;
			}

			if (isset($_POST['show_views_under_post_title'])) {
				$options['show_views_under_post_title'] = (bool)true;
			} else {
				$options['show_views_under_post_title'] = (bool)false;
			}

			if (isset($_POST['show_views_on_post_meta'])) {
				$options['show_views_on_post_meta'] = (bool)true;
			} else {
				$options['show_views_on_post_meta'] = (bool)false;
			}

			if (isset($_POST['show_cat_on_meta'])) {
				$options['show_cat_on_meta'] = (bool)true;
			} else {
				$options['show_cat_on_meta'] = (bool)false;
			}

			if (isset($_POST['show_cat_under_post_title'])) {
				$options['show_cat_under_post_title'] = (bool)true;
			} else {
				$options['show_cat_under_post_title'] = (bool)false;
			}

			if (isset($_POST['show_cat_on_post_meta'])) {
				$options['show_cat_on_post_meta'] = (bool)true;
			} else {
				$options['show_cat_on_post_meta'] = (bool)false;
			}

			if (isset($_POST['show_tags'])) {
				$options['show_tags'] = (bool)true;
			} else {
				$options['show_tags'] = (bool)false;
			}
			
			if (isset($_POST['sns_button_under_title'])) {
				$options['sns_button_under_title'] = (bool)true;
			} else {
				$options['sns_button_under_title'] = (bool)false;
			}
			
			if (isset($_POST['sns_button_on_meta'])) {
				$options['sns_button_on_meta'] = (bool)true;
			} else {
				$options['sns_button_on_meta'] = (bool)false;
			}
			
			if (isset($_POST['show_twitter_button'])) {
				$options['show_twitter_button'] = (bool)true;
			} else {
				$options['show_twitter_button'] = (bool)false;
			}
			
			if (isset($_POST['show_facebook_button'])) {
				$options['show_facebook_button'] = (bool)true;
			} else {
				$options['show_facebook_button'] = (bool)false;
			}
			
			if (isset($_POST['show_pocket_button'])) {
				$options['show_pocket_button'] = (bool)true;
			} else {
				$options['show_pocket_button'] = (bool)false;
			}
			
			if (isset($_POST['show_mixi_button'])) {
				$options['show_mixi_button'] = (bool)true;
			} else {
				$options['show_mixi_button'] = (bool)false;
			}
			
			$options['mixi_accept_key'] = $_POST['mixi_accept_key'];
			
			if (isset($_POST['show_hatena_button'])) {
				$options['show_hatena_button'] = (bool)true;
			} else {
				$options['show_hatena_button'] = (bool)false;
			}
			
			if (isset($_POST['show_tumblr_button'])) {
				$options['show_tumblr_button'] = (bool)true;
			} else {
				$options['show_tumblr_button'] = (bool)false;
			}
			
			if (isset($_POST['show_line_button'])) {
				$options['show_line_button'] = (bool)true;
			} else {
				$options['show_line_button'] = (bool)false;
			}
			
			if (isset($_POST['show_evernote_button'])) {
				$options['show_evernote_button'] = (bool)true;
			} else {
				$options['show_evernote_button'] = (bool)false;
			}

			if (isset($_POST['show_google_button'])) {
				$options['show_google_button'] = (bool)true;
			} else {
				$options['show_google_button'] = (bool)false;
			}

			if (isset($_POST['show_feedly_button'])) {
				$options['show_feedly_button'] = (bool)true;
			} else {
				$options['show_feedly_button'] = (bool)false;
			}

			$options['exclude_pages'] = isset($_POST['exclude_pages']) ? stripslashes($_POST['exclude_pages']) : '';
			

			if (isset($_POST['show_cat_with_postcount'])) {
				$options['show_cat_with_postcount'] = (bool)true;
			} else {
				$options['show_cat_with_postcount'] = (bool)false;
			}

			$options['tracking_code'] = stripslashes($_POST['tracking_code']);

			if (isset($_POST['no_track_admin'])) {
				$options['no_track_admin'] = (bool)true;
			} else {
				$options['no_track_admin'] = (bool)false;
			}
			
			if (isset($_POST['facebookcomment'])) {
				$options['facebookcomment'] = (bool)true;
			} else {
				$options['facebookcomment'] = (bool)false;
			}

			if (isset($_POST['facebookcomment_page'])) {
				$options['facebookcomment_page'] = (bool)true;
			} else {
				$options['facebookcomment_page'] = (bool)false;
			}

			if (isset($_POST['show_eyecatch_first'])) {
				$options['show_eyecatch_first'] = (bool)true;
			} else {
				$options['show_eyecatch_first'] = (bool)false;
			}

			$options['related_posts_target'] = $_POST['related_posts_target'];

			$options['number_fb_comment'] = mb_convert_kana($_POST['number_fb_comment'],"n");
			if (!is_numeric($options['number_fb_comment'])) $options['number_fb_comment'] = '10';

			
			if (isset($_POST['facebookrecommend'])) {
				$options['facebookrecommend'] = (bool)true;
			} else {
				$options['facebookrecommend'] = (bool)false;
			}
			
			$options['fb_app_id'] = $_POST['fb_app_id'];
			
			$options['fb_recommend_position'] = $_POST['fb_recommend_position'];
			
			$options['number_fb_recommend'] = $_POST['number_fb_recommend'];
			
			$options['fb_recommend_scroll'] = $_POST['fb_recommend_scroll'];
			
			$options['fb_recommend_time'] = $_POST['fb_recommend_time'];
			
			$options['fb_recommend_action'] = $_POST['fb_recommend_action'];
			

			$options['thumbnail_method'] = $_POST['thumbnail_method'];
			
			
			if (isset($_POST['show_related_posts'])) {
				$options['show_related_posts'] = (bool)true;
			} else {
				$options['show_related_posts'] = (bool)false;
			}
			
			$options['related_posts_title'] = $_POST['related_posts_title'];
			
			$options['related_posts_style'] = $_POST['related_posts_style'];
			
			$options['number_related_posts'] = $_POST['number_related_posts'];
			
			if (isset($_POST['related_posts_thumbnail'])) {
				$options['related_posts_thumbnail'] = (bool)true;
			} else {
				$options['related_posts_thumbnail'] = (bool)false;
			}
			
			if (isset($_POST['related_posts_category'])) {
				$options['related_posts_category'] = (bool)true;
			} else {
				$options['related_posts_category'] = (bool)false;
			}

			if (isset($_POST['date_reckon_mode'])) {
				$options['date_reckon_mode'] = (bool)true;
			} else {
				$options['date_reckon_mode'] = (bool)false;
			}

			if (isset($_POST['show_last_update'])) {
				$options['show_last_update'] = (bool)true;
			} else {
				$options['show_last_update'] = (bool)false;
			}
			
			if (isset($_POST['pagenation'])) {
				$options['pagenation'] = (bool)true;
			} else {
				$options['pagenation'] = (bool)false;
			}
			
			$options['pagenation_pages_text'] = $_POST['pagenation_pages_text'];
			$options['pagenation_current_text'] = $_POST['pagenation_current_text'];
			$options['pagenation_page_text'] = $_POST['pagenation_page_text'];
			$options['pagenation_first_text'] = $_POST['pagenation_first_text'];
			$options['pagenation_last_text'] = $_POST['pagenation_last_text'];
			$options['pagenation_prev_text'] = $_POST['pagenation_prev_text'];
			$options['pagenation_next_text'] = $_POST['pagenation_next_text'];
			$options['pagenation_dotleft_text'] = $_POST['pagenation_dotleft_text'];
			$options['pagenation_dotright_text'] = $_POST['pagenation_dotright_text'];


			if (isset($_POST['next_prev_in_same_cat'])) {
				$options['next_prev_in_same_cat'] = (bool)true;
			} else {
				$options['next_prev_in_same_cat'] = (bool)false;
			}

			if (isset($_POST['autopager'])) {
				$options['autopager'] = (bool)true;
			} else {
				$options['autopager'] = (bool)false;
			}

			if (isset($_POST['autopager_mb'])) {
				$options['autopager_mb'] = (bool)true;
			} else {
				$options['autopager_mb'] = (bool)false;
			}

			if (isset($_POST['pagenation_always_show'])) {
				$options['pagenation_always_show'] = (bool)true;
			} else {
				$options['pagenation_always_show'] = (bool)false;
			}
			
			$options['pagenation_num_pages'] = mb_convert_kana($_POST['pagenation_num_pages'],"n");
			$options['pagenation_num_larger_page_numbers'] = mb_convert_kana($_POST['pagenation_num_larger_page_numbers'],"n");
			
			$options['pagenation_larger_page_numbers_multiple'] = mb_convert_kana($_POST['pagenation_larger_page_numbers_multiple'],"n");

			$options['sns_button_type'] = $_POST['sns_button_type'];

			if (isset($_POST['index_top_except_cat'])) {
				$options['index_top_except_cat'] = (bool)true;
			} else {
				$options['index_top_except_cat'] = (bool)false;
			}
			$options['index_top_except_cat_id'] = mb_convert_kana($_POST['index_top_except_cat_id'],"n");

			if (isset($_POST['index_bottom_except_cat'])) {
				$options['index_bottom_except_cat'] = (bool)true;
			} else {
				$options['index_bottom_except_cat'] = (bool)false;
			}
			$options['index_bottom_except_cat_id'] = mb_convert_kana($_POST['index_bottom_except_cat_id'],"n");

			$options['show_type_cat_normal'] = mb_convert_kana($_POST['show_type_cat_normal'],"n");
			$options['show_type_cat_portfolio'] = mb_convert_kana($_POST['show_type_cat_portfolio'],"n");
			$options['show_type_cat_magazine'] = mb_convert_kana($_POST['show_type_cat_magazine'],"n");


			update_option('dp_options', $options);
			if (!dp_css_create()) return;
			add_action('admin_notices',  array('digipress_options', 'dp_update_msg'));

		} else {
			//デフォルト
			digipress_options::getOptions();
		}
	}
	
	/* ==================================================
	* Delete upload files
	* =================================================*/
	function del_upload_file() {
		//delete title image
		if( isset($_POST['dp_delete_file_title_img']) ) {
			//Check directory permission
			if( ! is_writable( DP_THEME_DIR . "/img/_uploads/title" ) ){
				add_action('admin_notice', array('digipress_options', 'not_write_dir_msg'));
				return;
			}
			//Delete
			if ( ($_POST['dp_title_img'] === "") || (is_null($_POST['dp_title_img'])) ) {
				add_action('admin_notices',  array('digipress_options', 'dp_no_file_msg'));
			} else {
				$filename = DP_THEME_DIR . "/img/_uploads/title/" . $_POST['dp_title_img'];
				if ( file_exists($filename) ) {
					if ( ! unlink($filename) ) {
						add_action('admin_notices',  array('digipress_options', 'dp_del_fail_msg'));
					} else {
						add_action('admin_notices',  array('digipress_options', 'dp_delete_msg'));
					}
				} else {
					add_action('admin_notices',  array('digipress_options', 'dp_no_file_msg'));
				}
			}
		}
		
		//delete header image
		if( isset($_POST['dp_delete_file_hd']) ) {
			//Check directory permission
			if( ! is_writable( DP_THEME_DIR . "/img/_uploads/header" ) ){
				add_action('admin_notice', array('digipress_options', 'not_write_dir_msg'));
				return;
			}
			//Delete
			if ( ($_POST['dp_header_img'] === "") || (is_null($_POST['dp_header_img'])) ) {
				add_action('admin_notices',  array('digipress_options', 'dp_no_file_msg'));
			} else {
				$filename = DP_THEME_DIR . "/img/_uploads/header/" . $_POST['dp_header_img'];
				if ( file_exists($filename) ) {
					if ( ! unlink($filename) ) {
						add_action('admin_notices',  array('digipress_options', 'dp_del_fail_msg'));
					} else {
						add_action('admin_notices',  array('digipress_options', 'dp_delete_msg'));
					}
				} else {
					add_action('admin_notices',  array('digipress_options', 'dp_no_file_msg'));
				}
			}
		}
		
		// delete background image
		if( isset($_POST['dp_delete_file_bg']) ) {
			//Check directory permission
			if( ! is_writable( DP_THEME_DIR . "/img/_uploads/background" ) ){
				add_action('admin_notice', array('digipress_options', 'not_write_dir_msg'));
				return;
			}
			//Delete
			if ( ($_POST['dp_background_img'] === "") || (is_null($_POST['dp_background_img'])) ) {
				add_action('admin_notices',  array('digipress_options', 'dp_no_file_msg'));
			} else {
				$filename = DP_THEME_DIR . "/img/_uploads/background/" . $_POST['dp_background_img'];
				if ( file_exists($filename) ) {
					if ( ! unlink($filename) ) {
						add_action('admin_notices',  array('digipress_options', 'dp_del_fail_msg'));
					} else {
						add_action('admin_notices',  array('digipress_options', 'dp_delete_msg'));
					}
				} else {
					add_action('admin_notices',  array('digipress_options', 'dp_no_file_msg'));
				}
			}
		}
	}

	/* ==================================================
	* Edit Images
	* =================================================*/
	function edit_images() {
		if(isset($_POST['dp_edit_images'])) {
			add_action('admin_notices',  array('digipress_options', 'dp_reset_options'));
		}
	}
	
	/* ==================================================
	* Reset all settings
	* =================================================*/
	function reset_theme_options() {
		//Reset visual settings
		if(isset($_POST['dp_reset_visual'])) {
			global $def_visual;

			//Reset
			update_option('dp_options_visual', $def_visual);

			//Rewrite Style.css
			if (!dp_css_create()) return;
			add_action('admin_notices',  array('digipress_options', 'dp_reset_options'));
		}
		//Reset control settings
		if(isset($_POST['dp_reset_control'])) {
			global $def_control;

			//Reset
			update_option('dp_options', $def_control);
			//Rewrite Style.css
			if (!dp_css_create()) return;
			add_action('admin_notices',  array('digipress_options', 'dp_reset_options'));
		}
	}

	/****************************************************************
	* Show visual option interface
	****************************************************************/
	/** ===================================================
	* Include And Display Theme Option Panel.
	*/
	function display_visual_options() {
		$options = digipress_options::getOptions_visual();
		include_once(DP_THEME_DIR . "/inc/admin/visual.php");
	}
	/** ===================================================
	* Include And Display Theme Option Panel.
	*/
	function display_theme_custom() {
		$options = digipress_options::getOptions();
		include_once(DP_THEME_DIR . "/inc/admin/control.php");
	}
	/** ===================================================
	* Include And Display Theme Option Panel.
	*/
	function display_delete_images() {
		$options = digipress_options::getOptions_visual();
		include_once(DP_THEME_DIR . "/inc/admin/delete_file.php");
	}
	/** ===================================================
	* Include And Display Theme Option Panel.
	*/
	function display_edit_images() {
		$options = digipress_options::getOptions_visual();
		include_once(DP_THEME_DIR . "/inc/admin/edit_img.php");
	}
	
	/****************************************************************
	*  Insert CSS and javascript to header of DigiPress option panel.
	****************************************************************/
	function insert_dp_admin_header() {
		if (!is_admin()) return;
		//CSS
		wp_enqueue_style('dp-admin-css', DP_THEME_URI . '/inc/css/style.css');
	}
	// Insert script for DigiPress option panel
	function dp_js_load_admin(){
		if (!is_admin()) return;
		// // Script
		// $farbtastic_js = DP_THEME_URI . '/inc/js/farbtastic.min.js';
		$imgareaselect_js = DP_THEME_URI . '/inc/js/imgareaselect/scripts/jquery.imgareaselect.pack.js';
		$dp_admin_js = DP_THEME_URI.'/inc/js/dp_import.min.js';
		// Queue
		// wp_enqueue_script('prototype');
		// wp_enqueue_script('farbtastic', $farbtastic_js, array('jquery'));
		wp_enqueue_script('imgareaselect', $imgareaselect_js, array('jquery'));
		wp_enqueue_script('dp_import', $dp_admin_js, array('jquery'), '1.0.0', true);
		// Color picker
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');
	}


	/****************************************************************
	*  Add menu page into Admin interface.
	****************************************************************/
	/* ==================================================
	 * @param	none
	 * @return	none
	 */
	public function add_menu() {
		//Main
		$hook_sf = add_menu_page(__('Customize DigiPress Theme', 'DigiPress'), __('DigiPress', 'DigiPress'), 'manage_options', digipress_options::OPTION_NAME, array('digipress_options', 'display_visual_options'), DP_THEME_URI . "/inc/css/img/dp-admin-icon16.png");

		//Sub(Visual)
		$hook_sf_visual = add_submenu_page(digipress_options::OPTION_NAME, __('Visual Settings For DigiPress', 'DigiPress'), __('Visual setting', 'DigiPress'), 'manage_options', digipress_options::OPTION_NAME, array('digipress_options', 'display_visual_options'));

		//Sub(Options)
		$hook_sf_option = add_submenu_page(digipress_options::OPTION_NAME, __('DigiPress Theme Operation Setting', 'DigiPress'), __('Operation Setting', 'DigiPress'), 'manage_options', digipress_options::OPTION_CONTROL, array('digipress_options', 'display_theme_custom'));

		//Sub(Delete file)
		$hook_sf_delete = add_submenu_page(digipress_options::OPTION_NAME, __('Delete Uploaded Files That Theme Use', 'DigiPress'), __('Delete Uploaded Files', 'DigiPress'), 'manage_options', digipress_options::OPTION_DELETE, array('digipress_options', 'display_delete_images'));

		//Sub(Image Edit)
		$hook_sf_edit_img = add_submenu_page(digipress_options::OPTION_NAME, __('Image Editing', 'DigiPress'), __('Image Editing', 'DigiPress'), 'manage_options', digipress_options::OPTION_IMG_EDIT, array('digipress_options', 'display_edit_images'));

		// Add CSS and Javascript into header only DigiPress option panel.
		add_action('admin_head-'.$hook_sf, array('digipress_options', 'insert_dp_admin_header'));
		add_action('admin_head-'.$hook_sf_option, array('digipress_options','insert_dp_admin_header'));
		add_action('admin_head-'.$hook_sf_visual, array('digipress_options','insert_dp_admin_header'));
		add_action('admin_head-'.$hook_sf_delete, array('digipress_options','insert_dp_admin_header'));
		add_action('admin_head-'.$hook_sf_edit_img, array('digipress_options','insert_dp_admin_header'));
		
		// Add CSS and Javascript into header only
		add_action('admin_print_scripts-'.$hook_sf, array('digipress_options', 'dp_js_load_admin'));
		add_action('admin_print_scripts-'.$hook_sf_option, array('digipress_options','dp_js_load_admin'));
		add_action('admin_print_scripts-'.$hook_sf_visual, array('digipress_options','dp_js_load_admin'));
		add_action('admin_print_scripts-'.$hook_sf_delete, array('digipress_options','dp_js_load_admin'));
		add_action('admin_print_scripts-'.$hook_sf_edit_img, array('digipress_options','dp_js_load_admin'));
	}
	
	
	/****************************************************************
	* Notice messages
	****************************************************************/
	public function dp_update_msg() {
		echo "<div class=\"box-blue\">".__('Successfully updated.','DigiPress')."</div>";
	}
	public function dp_delete_msg() {
		echo "<div class=\"box-blue\">".__('Successfully deleted.','DigiPress')."</div>";
	}
	public function dp_del_fail_msg() {
		echo "<div class=\"box-red\">".__('Failed to delete a file.','DigiPress')."</div>";
	}
	public function dp_no_file_msg() {
		echo "<div class=\"box-yellow\">".__('Target file does not found.','DigiPress')."</div>";
	}
	public function dp_reset_options() {
		echo "<div class=\"box-blue\">".__('Successfully reseted parameters.','DigiPress')."</div>";
	}
	public function not_rewrite_msg($filePath) {
		echo "<div class=\"box-red\">" . $filePath .' : '.__('The file is not rewrtitable. Please change the permission to 666 or 606.','DigiPress')."</div>";
	}
	public function file_in_use_msg($filePath) {
		echo "<div class=\"box-red\">" . $filePath .' : '.__('The file may be in use by other program. Please identify the conflict process.','DigiPress')."</div>";
	}
	public function not_open_file_msg($filePath) {
		echo "<div class=\"box-red\">" . $filePath . ' : '.__('The file can not be opened. Please identify the conflict process.','DigiPress')."</div>";
	}
	public function not_write_dir_msg($filePath) {
		echo "<div class=\"box-red\">" . $filePath . ' : '.__('The files in this folder is not rewritable. Please change the permission to 777.','DigiPress')."</div>";
	}
}
//=========== End of "digipress_options" CLASS ===========
?>