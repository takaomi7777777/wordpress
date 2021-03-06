var j$ = jQuery;

// Call every trim image
function onSelectChange(img, selection) {
	if (img.id == 'target_banner_img') {
		j$('#header_x1').val(selection.x1);
		j$('#header_y1').val(selection.y1);
		j$('#header_x2').val(selection.x2);
		j$('#header_y2').val(selection.y2);
		j$('#header_crop_width').val(selection.width);
		j$('#header_crop_height').val(selection.height);
	} else if (img.id == 'target_title_img') {
		j$('#title_x1').val(selection.x1);
		j$('#title_y1').val(selection.y1);
		j$('#title_x2').val(selection.x2);
		j$('#title_y2').val(selection.y2);
		j$('#title_crop_width').val(selection.width);
		j$('#title_crop_height').val(selection.height);
	}
}
function onSelectEnd(img, selection) {
	if (img.id == 'target_banner_img') {
		j$('#header_crop_width').val(selection.width);
		j$('#header_crop_height').val(selection.height);
	} else if (img.id == 'target_title_img') {
		j$('#title_crop_width').val(selection.width);
		j$('#title_crop_height').val(selection.height);
	} 
}

function checkInt(num) {
	return (num.match(/[^0-9]/g) || parseInt(num, 10) + "" != num) ? false : true;
}

j$(document).ready(function () {
	// Trim image
	j$('img#target_title_img, img#target_banner_img').imgAreaSelect({
		handles: true,
		onSelectChange: onSelectChange,
		onSelectEnd: onSelectEnd
	});

	// Color picker (iris)
	var colorPickerOptions = {
    	defaultColor: false,
    	hide: true,
    	palettes:true
	};
	j$('.dp-color-field').wpColorPicker(colorPickerOptions);
	
	// Change image
	j$('ul#crop_title_img li, ul#crop_header_img li, ul.thumb li').click(function(){
		j$(this).find('input').attr('checked', 'checked');

		// Title image
		if (j$(this).attr('class') == 'list_title_img') {
			// reset
			j$('img#target_title_img').imgAreaSelect({remove:true});
			j$('img#target_title_img').imgAreaSelect({
				handles: true,
				onSelectChange: onSelectChange,
				onSelectEnd: onSelectEnd
			});
			
			img = j$(this).find('img.hiddenImg');
			imgUrl = j$(this).find('img.thumbTitleImg_crop').attr('src');
			fileName = j$(this).find('label').text();

			// If target is for triming image
			j$('img#target_title_img').attr({
				'src': imgUrl,
				'width': img.width(),
				'height': img.height()
			});
			// Change send value
			j$('#crop_title_img').attr({
				'value': imgUrl	// image url
			});
			j$('#crop_title_img_file_name').attr({
				'value': fileName	// image file name
			});
			
			j$("input#title_resize_val_px").val(img.width());
		}
		
		// Header image
		if (j$(this).attr('class') == 'list_header_img') {
			j$('img#target_banner_img').imgAreaSelect({remove:true});
			j$('img#target_banner_img').imgAreaSelect({
				handles: true,
				onSelectChange: onSelectChange,
				onSelectEnd: onSelectEnd
			});
	
			img = j$(this).find('img.hiddenImg');
			imgUrl = j$(this).find('img.thumbBannerImg_crop').attr('src');
			fileName = j$(this).find('label').text();

			// Change visible image
			j$('img#target_banner_img').attr({
				'src': imgUrl,
				'width': img.width(),
				'height': img.height()
			});
			// Change send value
			j$('#crop_banner_img').attr({
				'value': imgUrl	// image url
			});
			j$('#crop_banner_img_file_name').attr({
				'value': fileName	// image file name
			});
			
			j$("input#header_resize_val_px").val(img.width());
		}
	});
});

j$(function(){
	// Ajax Post call to trim image
	j$('#send_trim_banner, #send_trim_title').click(function() {
		var resize_mode;
		var resize_value;
		var target_ul_id;
		var data;
	
		// Header banner image
		if (j$(this).attr('id') == 'send_trim_banner') {
			// Target check
			if (j$('#header_img_edit_target_trim').is(':checked')) {
				// Trim

				// Parameter check.
				if ( !j$('#header_x1').val() || !j$('#header_y1').val() || !j$('#header_crop_width').val() || !j$('#header_crop_height').val() ) {
					alert('Some parameter is nothing!\nPlease reset the params with corrent value.');
					return;
				} else {
					// Get values
					data = {
							target: 'banner',
							edit_type: 'trim',
							img : j$('#crop_banner_img').val(),
							file_name : j$('#crop_banner_img_file_name').val(),
							x1 : j$('#header_x1').val(),
							y1 : j$('#header_y1').val(),
							width : j$('#header_crop_width').val(),
							height : j$('#header_crop_height').val(),
							template_dir : j$('.template_dir').val(),	// inner path
							template_url : j$('.template_url').val()	// outer path
					};
					target_ul_id = 'ul#crop_header_img';
				}
			} else if (j$('#header_img_edit_target_resize').is(':checked')) {
				// Resize
				if (j$('#header_img_resize_px').is(':checked')) {
					if ( !j$("#header_resize_val_px").val() ) {
						alert("Pixel value is blank!");
						return;
					} else if (!checkInt(j$("#header_resize_val_px").val())) {
						alert("Pixel value is not integer!");
						return;
					}
					resize_mode = 'pixel';
					resize_value = j$("#header_resize_val_px").val();
				} else {
					if ( !j$("#header_resize_val_percent").val() ) {
						alert("Percent value is blank!");
						return;
					} else if (!checkInt(j$("#header_resize_val_percent").val())) {
						alert("Percent value is not integer!");
						return;
					}
					resize_mode = 'percent';
					resize_value = j$("#header_resize_val_percent").val();
				}
				// Get values
				data = {
						target: 'banner',
						edit_type: 'resize',
						resize_mode: resize_mode,
						resize_value: resize_value,
						img : j$('#crop_banner_img').val(),
						file_name : j$('#crop_banner_img_file_name').val(),
						template_dir : j$('.template_dir').val(),	// inner path
						template_url : j$('.template_url').val()	// outer path
				};
				target_ul_id = 'ul#crop_header_img';
			} else {
				alert("Please choose editing type");
				return;
			}
		}
		
		// Title image
		if (j$(this).attr('id') == 'send_trim_title') {
			// Target check
			if (j$('#title_img_edit_target_trim').is(':checked')) {
				// Trim

				// Parameter check.
				if ( !j$('#title_x1').val() || !j$('#title_y1').val() || !j$('#title_crop_width').val() || !j$('#title_crop_height').val() ) {
					alert('Some parameter is nothing!\nPlease reset the params with corrent value.');
					return;
				} else {
					// Get values
					data = {
							target: 'title',
							edit_type: 'trim',
							img : j$('#crop_title_img').val(),
							file_name : j$('#crop_title_img_file_name').val(),
							x1 : j$('#title_x1').val(),
							y1 : j$('#title_y1').val(),
							width : j$('#title_crop_width').val(),
							height : j$('#title_crop_height').val(),
							template_dir : j$('.template_dir').val(),	// inner path
							template_url : j$('.template_url').val()	// outer path
					};
					target_ul_id = 'ul#crop_title_img';
				}
				
			} else if (j$('#title_img_edit_target_resize').is(':checked')) {
				// Resize
				if (j$('#title_img_resize_px').is(':checked')) {
					if ( !j$("#title_resize_val_px").val() ) {
						alert("Pixel value is blank!");
						return;
					} else if (!checkInt(j$("#title_resize_val_px").val())) {
						alert("Pixel value is not integer!");
						return;
					}
					resize_mode = 'pixel';
					resize_value = j$("#title_resize_val_px").val();
				} else {
					if ( !j$("#title_resize_val_percent").val() ) {
						alert("Percent value is blank!");
						return;
					} else if (!checkInt(j$("#title_resize_val_percent").val())) {
						alert("Percent value is not integer!");
						return;
					}
					resize_mode = 'percent';
					resize_value = j$("#title_resize_val_percent").val();
				}
				// Get values
				data = {
						target: 'title',
						edit_type: 'resize',
						resize_mode: resize_mode,
						resize_value: resize_value,
						img : j$('#crop_title_img').val(),
						file_name : j$('#crop_title_img_file_name').val(),
						template_dir : j$('.template_dir').val(),	// inner path
						template_url : j$('.template_url').val()	// outer path
				};
				target_ul_id = 'ul#crop_title_img';
			} else {
				alert("Please choose editing type");
				return;
			}
		}

		// POST
		j$.ajax({
			type: "POST",
			url: j$('.template_url').val() + "/inc/admin/edit_execute.php",
			data: data,
			success: function(data, dataType) {
				j$(target_ul_id).append(data);
				alert("Edited!");
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				this; // Callback option
				alert('Error : ' + errorThrown);
			}
		});
	});
	// Disable reload page for Ajax
	j$('#form_trim_header_img, #form_trim_title_img').submit(function() {
		return false;
	});
	//---------------- Ajax Post Image End
	
	// handle for radio button check
	j$("#title_img_edit_target_trim").click(function(){
		j$('img#target_title_img').imgAreaSelect({remove:true});
		j$('img#target_title_img').imgAreaSelect({
			handles: true,
			onSelectChange: onSelectChange,
			onSelectEnd: onSelectEnd
		});
		j$("#label_for_title_img").slideDown('fast');
		j$("#title_img_trim_params").fadeIn('fast');
		j$("#title_img_resize_params").fadeOut('fast');
	});
	j$("#title_img_edit_target_resize").click(function(){
		j$('img#target_title_img').imgAreaSelect({remove:true});
		j$("#label_for_title_img").slideUp('fast');
		j$("#title_img_trim_params").fadeOut('fast');
		j$("#title_img_resize_params").fadeIn('fast');
	});
	j$("#header_img_edit_target_trim").click(function(){
		j$('img#target_banner_img').imgAreaSelect({remove:true});
		j$('img#target_banner_img').imgAreaSelect({
			handles: true,
			onSelectChange: onSelectChange,
			onSelectEnd: onSelectEnd
		});
		j$("#label_for_header_img").slideDown('fast');
		j$("#header_img_trim_params").fadeIn('fast');
		j$("#header_img_resize_params").fadeOut('fast');
	});
	j$("#header_img_edit_target_resize").click(function(){
		j$('img#target_banner_img').imgAreaSelect({remove:true});
		j$("#label_for_header_img").slideUp('fast');
		j$("#header_img_trim_params").fadeOut('fast');
		j$("#header_img_resize_params").fadeIn('fast');
	});
	
	

	// Slide Panel	
	j$("h3.dp_h3").click(function(){
		if (j$(this).next('div.dp_box').is(':visible')) {
			j$(this).next('div.dp_box').slideUp(380);
		} else {
			j$(this).next('div.dp_box').slideDown(380);
		}
	});
	j$(".slide-title").click(function(){
		j$(this).next(".slide-content").slideToggle();
	});

	// Close All
	j$("input.close_all").click(function(){
		j$("div.dp_box").slideUp(380);
	});

	// Move to upload
	j$("#header_img_upload, #bg_img_upload, #title_img_upload").click(function(){
		//j$("#header_custom, #bg_custom").hide();
		if (j$("#upload").next("div.dp_box").is(':hidden')) {
			j$("#upload").next("div.dp_box").slideDown(380);
		}
	});
	
	//Open header contents
	j$(".open_header_contents").click(function() {
		j$("#header_contents").next("div.dp_box").show();
	});

	// Sidebar image (2column)
	j$('select[name="dp_theme_sidebar"], select[name="dp_theme_sidebar2"]').change(function(){
		var value = j$(this,"option:selected").val();
		switch (value) {
			case "right":
				j$("img#sidebar_r_img").fadeTo(200, 1.0);
				j$("img#sidebar_l_img").fadeTo(200, 0.0);
				break;
			case "left":
				j$("img#sidebar_r_img").fadeTo(200, 0.0);
				j$("img#sidebar_l_img").fadeTo(200, 1.0);
				break;
			case "right2":
				j$("img#3column_center_content_img").fadeTo(200, 0.0);
				j$("img#3column_left_sidebar_img").fadeTo(200, 0.0);
				j$("img#3column_right_sidebar_img").fadeTo(200, 1.0);
				break;
			case "left2":
				j$("img#3column_center_content_img").fadeTo(200, 0.0);
				j$("img#3column_right_sidebar_img").fadeTo(200, 0.0);
				j$("img#3column_left_sidebar_img").fadeTo(200, 1.0);
				break;
			case "both":
				j$("img#3column_right_sidebar_img").fadeTo(200, 0.0);
				j$("img#3column_left_sidebar_img").fadeTo(200, 0.0);
				j$("img#3column_center_content_img").fadeTo(200, 1.0);
				break;
			default:
				break;
		}
	});
	// Column -> change sidebar status
	j$('#dp_column1').focus(function(){
		j$("#dp_theme_sidebar").attr("disabled","disabled");
		j$("#dp_theme_sidebar2").attr("disabled","disabled");
		j$("#dp_1column_only_top").attr("disabled","disabled");
	});
	j$('#dp_column2, #dp_column3').focus(function(){
		j$("#dp_theme_sidebar").removeAttr("disabled");
		j$("#dp_theme_sidebar2").removeAttr("disabled");
		j$("#dp_1column_only_top").removeAttr("disabled");
	});

	
	// H1 title color
	j$("#blind_header_title").change(function(){
		var flg = j$(this).attr('checked');
		if (flg) {
			j$("#header_title_color").attr("disabled","disabled");
		} else {
			j$("#header_title_color").removeAttr("disabled");
		}
	});
	
	// Type of H1 title
	j$('input[name="h1title_as_what"]:radio').click(function(){
		var flg = j$(this).attr('checked');
		var id = j$(this).attr("id");
		
		switch (id) {
			case "h1title_as_what1":
				j$('#h1title_as_text').slideDown();
				j$('#h1title_as_image').slideUp();
				break;
			case "h1title_as_what2":
				j$('#h1title_as_image').slideDown();
				j$('#h1title_as_text').slideUp();
				break;
			default:
				j$('#h1title_as_image').slideUp();
				j$('#h1title_as_text').slideUp();
				break;
		}
	});

	// Thumnail -> show original size
	j$("img.thumbImg, img.thumbImgBg").hover(
		function(){
			j$("img.thumbImg, img.thumbImgBg").fadeTo(100, 0.2);
			j$(this).next(".hiddenImg").show();
		},function(){
			j$("img.thumbImg, img.thumbImgBg").fadeTo(100, 1.0);
			j$(this).next(".hiddenImg").hide();
	});
	
	j$("#pagenation").click(function(){
		if (j$(this).is(":checked")) {
			j$("#pagenation_div").slideDown();
		} else {
			j$("#pagenation_div").slideUp();
		}
	});

	j$("#index_top_except_cat").click(function(){
		if (j$(this).is(":checked")) {
			j$("#index_top_target_cat_div").slideUp();
			j$("#index_top_except_cat_id_div").slideDown();
		} else {
			j$("#index_top_target_cat_div").slideDown();
			j$("#index_top_except_cat_id_div").slideUp();
		}
	});

	j$("#index_bottom_except_cat").click(function(){
		if (j$(this).is(":checked")) {
			j$("#index_bottom_target_cat_div").slideUp();
			j$("#index_bottom_except_cat_id_div").slideDown();
		} else {
			j$("#index_bottom_target_cat_div").slideDown();
			j$("#index_bottom_except_cat_id_div").slideUp();
		}
	});

	// Change site title in TITLE tag
	j$("#enable_title_site_name").click(function(){
		if (j$(this).is(":checked")) {
			j$("#html_title_block").slideDown();
		} else {
			j$("#html_title_block").slideUp();
		}
	});
	
	// About meta keyword
	j$("#enable_meta_def_kw").click(function(){
		if (j$(this).is(":checked")) {
			j$("#html_meta_kw_block").slideDown();
		} else {
			j$("#html_meta_kw_block").slideUp();
		}
	});
	
	// About meta description
	j$("#enable_meta_def_desc").click(function(){
		if (j$(this).is(":checked")) {
			j$("#html_meta_desc_block").slideDown();
		} else {
			j$("#html_meta_desc_block").slideUp();
		}
	});
	
	// Change site title for H1 tag
	j$("#enable_h1_title").click(function(){
		if (j$(this).is(":checked")) {
			j$("#h1_title_block").slideDown();
		} else {
			j$("#h1_title_block").slideUp();
		}
	});
	
	// Change site title for H2 tag
	j$("#enable_h2_title").click(function(){
		if (j$(this).is(":checked")) {
			j$("#h2_title_block").slideDown();
		} else {
			j$("#h2_title_block").slideUp();
		}
	});
	
	// Change description for header area
	j$("#enable_my_desc").click(function(){
		if (j$(this).is(":checked")) {
			j$("#header_desc_block").slideDown();
		} else {
			j$("#header_desc_block").slideUp();
		}
	});
	
	// Content type of the right area of header
	j$('input[name="header_right_content"]:radio').click(function(){
		var flg = j$(this).attr('checked');
		var id = j$(this).attr("id");
		
		switch (id) {
			case "header_right_content1":
				j$('#img_searchbox').slideUp();
				j$('#header_right_free_content').slideUp();
				break;
			case "header_right_content2":
				j$('#img_searchbox').slideDown();
				j$('#header_right_free_content').slideUp();
				break;
			case "header_right_content3":
				j$('#header_right_free_content').slideDown();
				j$('#img_searchbox').slideUp();
				break;
			default:
				break;
		}
	});
	
	// Top floating menu sns icons
	j$("#show_fixed_menu_sns").click(function(){
		if (j$(this).is(":checked")) {
			j$("#fixed_menu_sns_block").slideDown();
		} else {
			j$("#fixed_menu_sns_block").slideUp();
		}
	});

	j$("#show_fixed_menu_search").click(function(){
		if (j$(this).is(":checked")) {
			j$("#show_floating_gcs_div").slideDown();
		} else {
			j$("#show_floating_gcs_div").slideUp();
		}
	});

	// Top page title background color
	j$('#show_bgcolor_in_header_title').click(function(){
		if (j$(this).is(":checked")) {
			j$("#header_title_bgcolor_div").slideDown();
		} else {
			j$("#header_title_bgcolor_div").slideUp();
		}
	})
	
	// radio button change state event
	j$('input[name="show_specific_cat_index_top"]:radio').change(function(){
		switch (j$(this).val()) {
			case 'none':
				j$("#div_specific_cat_index_top").slideUp();
				j$("#div_specific_post_type_index_top").slideUp();
				break;
			case 'cat':
				j$("#div_specific_cat_index_top").slideDown();
				j$("#div_specific_post_type_index_top").slideUp();
				break;
			case 'custom':
				j$("#div_specific_cat_index_top").slideUp();
				j$("#div_specific_post_type_index_top").slideDown();
				break;
			default:
				j$("#div_specific_cat_index_top").slideUp();
				j$("#div_specific_post_type_index_top").slideUp();
				break;
		}
	});
	j$('input[name="show_specific_cat_index"]:radio').change(function(){
		switch (j$(this).val()) {
			case 'none':
				j$("#div_specific_cat_index").slideUp();
				j$("#div_specific_post_type_index").slideUp();
				break;
			case 'cat':
				j$("#div_specific_cat_index").slideDown();
				j$("#div_specific_post_type_index").slideUp();
				break;
			case 'custom':
				j$("#div_specific_cat_index").slideUp();
				j$("#div_specific_post_type_index").slideDown();
				break;
			default:
				j$("#div_specific_cat_index").slideUp();
				j$("#div_specific_post_type_index").slideUp();
				break;
		}
	});

	// Headline
	j$('input[name="headline_type"]:radio').change(function(){
		switch (j$(this).val()) {
			case '1':
				j$("#headline_type2_div").slideUp();
				j$("#headline_type3_div").slideUp();
				break;
			case '2':
				j$("#headline_type2_div").slideDown();
				j$("#headline_type3_div").slideUp();
				break;
			case '3':
				j$("#headline_type2_div").slideUp();
				j$("#headline_type3_div").slideDown();
				break;
			default:
				j$("#headline_type2_div").slideUp();
				j$("#headline_type3_div").slideUp();
				break;
		}
	});
	j$('input[name="headline_slider_type"]:radio').change(function(){
		switch (j$(this).val()) {
			case '1':
				j$("#headline_slider_type1_div").slideDown();
				j$("#headline_slider_type2_div").slideUp();
				break;
			case '2':
				j$("#headline_slider_type1_div").slideUp();
				j$("#headline_slider_type2_div").slideDown();
				break;
			default:
				j$("#headline_slider_type1_div").slideDown();
				j$("#headline_slider_type2_div").slideUp();
				break;
		}
	});

	j$('input[name="headline_slider_fx"]:radio').change(function(){
		switch (j$(this).val()) {
			case '1':
				j$("#headline_slider_fx1_div").slideDown();
				j$("#headline_slider_fx2_div").slideUp();
				break;
			case '2':
				j$("#headline_slider_fx1_div").slideUp();
				j$("#headline_slider_fx2_div").slideDown();
				break;
			default:
				j$("#headline_slider_fx1_div").slideDown();
				j$("#headline_slider_fx2_div").slideUp();
				break;
		}
	});
	
	
	// Setting for the upper content of top page
	j$("#show_top_content").click(function(){
		if (j$(this).is(":checked")) {
			j$("#home_top_content_dd").slideDown();
		} else {
			j$("#home_top_content_dd").slideUp();
		}
	});
	
	
	// Setting for the bottom content of top page
	j$("#show_top_under_content").click(function(){
		if (j$(this).is(":checked")) {
			j$("#home_bottom_content_dd").slideDown();
		} else {
			j$("#home_bottom_content_dd").slideUp();
		}
	});

	// Settings of header banner and contents
	j$('input[name="dp_header_content_type"]:radio').click(function(){
		var id = j$(this).attr("id");
		
		switch (id) {
			case "dp_header_content_type1":
				j$('#slideshow_settings').slideUp();
				j$("#header_banner_settings").slideDown();
				break;
			case "dp_header_content_type2":
				j$("#header_banner_settings").slideUp();
				j$('#slideshow_settings').slideDown();
				break;
			case "dp_header_content_type3":
				j$("#header_banner_settings").slideUp();
				j$('#slideshow_settings').slideUp();
				break;
			default:
				break;
		}
	});
	
	// Freespace of the archives
	j$("#show_archive_freespace").click(function(){
		if (j$(this).is(":checked")) {
			j$("div#archive_free_content").slideDown();
		} else {
			j$("div#archive_free_content").slideUp();
		}
	});
	// Freespace of the under archives
	j$("#show_archive_under_freespace").click(function(){
		if (j$(this).is(":checked")) {
			j$("div#archive_under_free_content").slideDown();
		} else {
			j$("div#archive_under_free_content").slideUp();
		}
	});
	
	// Freespace of the single page
	j$("#show_single_freespace,#show_page_freespace").click(function(){
		if (j$(this).is(":checked")) {
			j$("div#single_free_content").slideDown();
		} else {
			if (!j$("#show_single_freespace").is(":checked") && !j$("#show_page_freespace").is(":checked"))
			j$("div#single_free_content").slideUp();
		}
	});
	
	// SNS services connect
	j$("#sns_button_under_title,#sns_button_on_meta").click(function(){
		if (j$(this).is(":checked")) {
			j$("div#target_sns_services").slideDown();
		} else {
			if (!j$("#sns_button_under_title").is(":checked") && !j$("#sns_button_on_meta").is(":checked"))
			j$("div#target_sns_services").slideUp();
		}
	});
	
	// SNS icons
	j$("#show_snsicon_post,#show_snsicon_page").click(function(){
		if (j$(this).is(":checked")) {
			j$("div#target_sns_icons").slideDown();
		} else {
			if (!j$("#show_snsicon_post").is(":checked") && !j$("#show_snsicon_page").is(":checked"))
			j$("div#target_sns_icons").slideUp();
		}
	});
	
	// Facebook recommended box
	j$("#facebookrecommend").click(function(){
		if (j$(this).is(":checked")) {
			j$("div#fb_recommend_params").slideDown();
		} else {
			if (!j$("#facebookrecommend").is(":checked"))
			j$("div#fb_recommend_params").slideUp();
		}
	});
	
	// Related posts
	j$("#show_related_posts").click(function(){
		if (j$(this).is(":checked")) {
			j$("div#related_posts_params").slideDown();
		} else {
			if (!j$("#show_related_posts").is(":checked"))
			j$("div#related_posts_params").slideUp();
		}
	});

	// Post date display
	j$("#show_pubdate_on_meta,#show_pubdate_on_meta_page").click(function(){
		if (j$(this).is(":checked")) {
			j$("div#show_date_position_div").slideDown();
		} else {
			if (!j$("#show_pubdate_on_meta").is(":checked") && !j$("#show_pubdate_on_meta_page").is(":checked"))
			j$("div#show_date_position_div").slideUp();
		}
	});

	// Author display
	j$("#show_author_on_meta").click(function(){
		if (j$(this).is(":checked")) {
			j$("div#show_author_position_div").slideDown();
		} else {
			j$("div#show_author_position_div").slideUp();
		}
	});

	// Views display
	j$("#show_views_on_meta").click(function(){
		if (j$(this).is(":checked")) {
			j$("div#show_views_position_div").slideDown();
		} else {
			j$("div#show_views_position_div").slideUp();
		}
	});

	// Category display
	j$("#show_cat_on_meta").click(function(){
		if (j$(this).is(":checked")) {
			j$("div#show_cat_position_div").slideDown();
		} else {
			j$("div#show_cat_position_div").slideUp();
		}
	});
});

// *** After window loaded ***
j$(window).load(function(){
	if (j$('#dp_column1').is(":selected")) {
		j$("#dp_theme_sidebar").attr("disabled","disabled");
		j$("#dp_theme_sidebar2").attr("disabled","disabled");
		j$("#dp_1column_only_top").attr("disabled","disabled");
	}
	
	// Image edit default rayout
	j$("#label_for_title_img").hide();
	j$("#title_img_trim_params").hide();
	j$("#title_img_resize_params").hide();
	j$("#label_for_header_img").hide();
	j$("#header_img_trim_params").hide();
	j$("#header_img_resize_params").hide();

	// sidebar image
	var value = j$('select[name="dp_theme_sidebar"] option:selected').val();
	switch (value) {
		case "right":
			j$("img#sidebar_r_img").show();
			j$("img#sidebar_l_img").hide();
			break;
		case "left":
			j$("img#sidebar_r_img").hide();
			j$("img#sidebar_l_img").show();
			break;
		default:
			break;
	}
	var value = j$('select[name="dp_theme_sidebar2"] option:selected').val();
	switch (value) {
		case "right2":
			j$("img#3column_center_content_img").hide();
			j$("img#3column_left_sidebar_img").hide();
			j$("img#3column_right_sidebar_img").show();
			break;
		case "left2":
			j$("img#3column_center_content_img").hide();
			j$("img#3column_right_sidebar_img").hide();
			j$("img#3column_left_sidebar_img").show();
			break;
		case "both":
			j$("img#3column_right_sidebar_img").hide();
			j$("img#3column_left_sidebar_img").hide();
			j$("img#3column_center_content_img").show();
			break;
		default:
			break;
	}
	
	// About header settings
	if (j$("#blind_header_title").is(":checked")) {
		j$("#header_title_color").attr("disabled","disabled");
	}
	
	// Settings of header banner and contents
	if (j$('#dp_header_content_type1').is(":checked")) {
		j$('#slideshow_settings').hide();
		j$("#header_banner_settings").show();
	}
	if (j$('#dp_header_content_type2').is(":checked")) {
		j$("#header_banner_settings").hide();
		j$('#slideshow_settings').show();
	}
	if (j$('#dp_header_content_type3').is(":checked")) {
		j$("#header_banner_settings").hide();
		j$('#slideshow_settings').hide();
	}

	// Type of H1 title
	if (j$('#h1title_as_what1').is(":checked")) {
		j$('#h1title_as_text').slideDown();
		j$('#h1title_as_image').slideUp();
	}
	if (j$('#h1title_as_what2').is(":checked")) {
		j$('#h1title_as_image').slideDown();
		j$('#h1title_as_text').slideUp();
	}
	
	if (j$('#pagenation').is(":checked")) {
		j$('#pagenation_div').show();
	} else {
		j$('#pagenation_div').hide();
	}

	if (j$('#index_top_except_cat').is(":checked")) {
		j$("#index_top_target_cat_div").hide();
		j$("#index_top_except_cat_id_div").show();
	} else {
		j$("#index_top_target_cat_div").show();
		j$("#index_top_except_cat_id_div").hide();
	}

	if (j$('#index_bottom_except_cat').is(":checked")) {
		j$("#index_bottom_target_cat_div").hide();
		j$("#index_bottom_except_cat_id_div").show();
	} else {
		j$("#index_bottom_target_cat_div").show();
		j$("#index_bottom_except_cat_id_div").hide();
	}
	
	if (j$('#enable_title_site_name').is(":checked")) {
		j$('#html_title_block').show();
	} else {
		j$('#html_title_block').hide();
	}
	
	if (j$('#enable_meta_def_kw').is(":checked")) {
		j$('#html_meta_kw_block').show();
	} else {
		j$('#html_meta_kw_block').hide();
	}
	
	if (j$('#enable_meta_def_desc').is(":checked")) {
		j$('#html_meta_desc_block').show();
	} else {
		j$('#html_meta_desc_block').hide();
	}
	
	// Content type of the right area of header
	if (j$('#header_right_content1').is(":checked")) {
		j$('#img_searchbox').hide();
		j$('#header_right_free_content').hide();
	}
	if (j$('#header_right_content2').is(":checked")) {
		j$('#img_searchbox').show();
		j$('#header_right_free_content').hide();
	}
	if (j$('#header_right_content3').is(":checked")) {
		j$('#header_right_free_content').show();
		j$('#img_searchbox').hide();
	}
	
	if (j$('#enable_h1_title').is(":checked")) {
		j$('#h1_title_block').show();
	} else {
		j$('#h1_title_block').hide();
	}
	
	if (j$('#enable_h2_title').is(":checked")) {
		j$('#h2_title_block').show();
	} else {
		j$('#h2_title_block').hide();
	}
	
	if (j$('#enable_my_desc').is(":checked")) {
		j$('#header_desc_block').show();
	} else {
		j$('#header_desc_block').hide();
	}
	
	// ----------------- radio button -----------------
	if (j$('#show_specific_cat_index_top1').attr('checked')) {
		j$("#div_specific_cat_index_top").hide();
		j$("#div_specific_post_type_index_top").hide();
	}
	if (j$('#show_specific_cat_index_top2').attr('checked')) {
		j$("#div_specific_cat_index_top").show();
		j$("#div_specific_post_type_index_top").hide();
	}
	if (j$('#show_specific_cat_index_top3').attr('checked')) {
		j$("#div_specific_cat_index_top").hide();
		j$("#div_specific_post_type_index_top").show();
	}

	if (j$('#show_specific_cat_index1').attr('checked')) {
		j$("#div_specific_cat_index").hide();
		j$("#div_specific_post_type_index").hide();
	}
	if (j$('#show_specific_cat_index2').attr('checked')) {
		j$("#div_specific_cat_index").show();
		j$("#div_specific_post_type_index").hide();
	}
	if (j$('#show_specific_cat_index3').attr('checked')) {
		j$("#div_specific_cat_index").hide();
		j$("#div_specific_post_type_index").show();
	}

	if (j$('#headline_type1').attr('checked')) {
		j$("#headline_type2_div, #headline_type3_div").hide();
	}
	if (j$('#headline_type2').attr('checked')) {
		j$("#headline_type3_div").hide();
		j$("#headline_type2_div").show();
	}
	if (j$('#headline_type3').attr('checked')) {
		j$("#headline_type2_div").hide();
		j$("#headline_type3_div").show();
	}

	if (j$('#headline_slider_type1').attr('checked')) {
		j$("#headline_slider_type2_div").hide();
		j$("#headline_slider_type1_div").show();
	}
	if (j$('#headline_slider_type2').attr('checked')) {
		j$("#headline_slider_type1_div").hide();
		j$("#headline_slider_type2_div").show();
	}
	if (j$('#headline_slider_fx1').attr('checked')) {
		j$("#headline_slider_fx2_div").hide();
		j$("#headline_slider_fx1_div").show();
	}
	if (j$('#headline_slider_fx2').attr('checked')) {
		j$("#headline_slider_fx1_div").hide();
		j$("#headline_slider_fx2_div").show();
	}

	//-------------------------------------------------
	
	if (j$('#show_top_content').is(":checked")) {
		j$('#home_top_content_dd').show();
	} else {
		j$('#home_top_content_dd').hide();
	}
	
	if (j$('#show_fixed_menu_sns').is(":checked")) {
		j$('#fixed_menu_sns_block').show();
	} else {
		j$('#fixed_menu_sns_block').hide();
	}

	if (j$('#show_fixed_menu_search').is(":checked")) {
		j$('#show_floating_gcs_div').show();
	} else {
		j$('#show_floating_gcs_div').hide();
	}
	
	if (j$('#show_bgcolor_in_header_title').is(":checked")) {
		j$('#header_title_bgcolor_div').show();
	} else {
		j$('#header_title_bgcolor_div').hide();
	}

	if (j$('#show_top_under_content').is(":checked")) {
		j$('#home_bottom_content_dd').show();
	} else {
		j$('#home_bottom_content_dd').hide();
	}
	
	j$('input[name="top_under_content_type"]:radio').click(function(){
		if (j$(this).is(":checked")) {
			j$("#top_posts_show_setting").slideDown();
		} else {
			j$("#top_posts_show_setting").slideUp();
		}
	});
	

	if (j$('#show_archive_freespace').is(":checked")) {
		j$('#archive_free_content').show();
	} else {
		j$('#archive_free_content').hide();
	}
	if (j$('#show_archive_under_freespace').is(":checked")) {
		j$('#archive_under_free_content').show();
	} else {
		j$('#archive_under_free_content').hide();
	}
	
	if (j$('#show_single_freespace').is(":checked") || j$('#show_page_freespace').is(":checked")) {
		j$('#single_free_content').show();
	} else {
		j$('#single_free_content').hide();
	}
	
	if (j$("#sns_button_under_title").is(":checked") || j$("#sns_button_on_meta").is(":checked")) {
		j$("div#target_sns_services").show();
	} else {
		j$("div#target_sns_services").hide();
	}
	
	if (j$("#show_pubdate_on_meta").is(":checked") || j$("#show_pubdate_on_meta_page").is(":checked")) {
		j$("div#show_date_position_div").show();
	} else {
		j$("div#show_date_position_div").hide();
	}

	if (j$("#show_author_on_meta").is(":checked") || j$("#show_author_on_meta_page").is(":checked")) {
		j$("div#show_author_position_div").show();
	} else {
		j$("div#show_author_position_div").hide();
	}

	if (j$("#show_views_on_meta").is(":checked")) {
		j$("div#show_views_position_div").show();
	} else {
		j$("div#show_views_position_div").hide();
	}

	if (j$("#show_cat_on_meta").is(":checked")) {
		j$("div#show_cat_position_div").show();
	} else {
		j$("div#show_cat_position_div").hide();
	}

	if (j$('#show_snsicon_post').is(":checked") || j$('#show_snsicon_page').is(":checked")) {
		j$('#target_sns_icons').show();
	} else {
		j$('#target_sns_icons').hide();
	}
	
	if (j$('#facebookrecommend').is(":checked")) {
		j$('#fb_recommend_params').show();
	} else {
		j$('#fb_recommend_params').hide();
	}
	
	if (j$('#show_related_posts').is(":checked")) {
		j$('#related_posts_params').show();
	} else {
		j$('#related_posts_params').hide();
	}
});