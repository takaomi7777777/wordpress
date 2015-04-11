<?php
/*******************************************************
* Create Style Sheet
*******************************************************/
/** ===================================================
* Create main CSS file.
*
* @param	string	$color
* @param	string	$sidebar
* @return	none
*/
function dp_css_create() {
	$options = get_option('dp_options');
	$options_visual = get_option('dp_options_visual');
	
	//Custom CSS file
	$filePath	= DP_THEME_DIR . "/css/visual-custom.css";
	// Fuck! IE!
	$fileNameForIE9Gradient	= "gradient-for-ie9.svg";
	$filePathForIE9Gradient	= DP_THEME_DIR . '/css/' . $fileNameForIE9Gradient;
	
	//Get theme settings
	$column			= $options_visual['dp_column'];
	$sidebar		= $options_visual['dp_theme_sidebar'];
	$sidebar2		= $options_visual['dp_theme_sidebar2'];
	$footerColNum	= $options_visual['footer_col_number'];
	$originalCSS	= $options_visual['original_css'];
	$catPostCount	= $options['show_cat_with_postcount'];
	
	//For CSS value
	$contentWidth = '';
	$contentTop1Col = '';
	$contentFloat = '';
	$portfolioFloat = '';
	$content = '';
	$tblListCSS = '';
	$portfolioFloatTop1Col = '';
	$thumbnailMethodCSS = '';
	$sidebarCSS = '';
	$sidebar2CSS = '';
	$sidebarWidth = '';
	$sidebar2Width = '';
	$sidebarMargin = '';
	$sidebar2Margin = '';
	$sidebarFloat = '';
	$sidebar2Float = '';
	$footerColWidthCSS = '';
	
	
	// ---------------------------------------------------------------
	// Each Column Style Start
	// ---------------------------------------------------------------
	// Basement
	$catListFix = 
".widget_pages ul li a,
.widget_categories ul li a,
.widget_mycategoryorder ul li a{display:block;}";
	
	$postThumbCSS = 
".post_thumb{
	width:200px;
	height:146px;
}
.post_thumb_portfolio{
	width:100%;
	height:220px;
}";
	
	$tblListCSS =
"ul#top-posts-ul li,
ul#top-posts-ul-top-1col li{
	position:relative;
	width:300px;
	min-height:279px;
	max-height:279px;
}
ul#top-posts-ul-top-1col li{
	margin-bottom:30px;
}
.post_info_portfolio {
	height:220px;
}"; 
	// Gellery item width is minus 2px for shadow and border 
	$galleryItemWidth =
".g_item {
	width:228px;
}";

	//  For portfolio
	if (($column == '1') || $options_visual['dp_1column_only_top']) {
		if (($options['top_post_show_type'] == 'table') || ($options['archive_post_show_type'] == 'table')) {
			$contentTop1Col = 
"#content.onecol,
.content.one-col{
	width:100%;
}";
			$portfolioFloatTop1Col = 
"ul#top-posts-ul-top-1col li{
	float:left;
}
ul#top-posts-ul-top-1col li:nth-child(3n-1){
	float:left;
	margin-left:30px;
}
ul#top-posts-ul-top-1col li:nth-child(3n){
	float:right;
}
ul#top-posts-ul-top-1col li:nth-child(3n+1){
	clear:both;
}";
		}
	}
	
	// Each column's layout
	switch ($column) {
		case '1':		// 1 column
			$contentWidth = "width:100%;";
			break;

		case '2':		// 2 column
			$sidebarWidth = "300";
			$contentWidth = "width:630px;";
			$portfolioFloat = 
"ul#top-posts-ul li:nth-child(2n+1){
	clear:both;
}
ul#top-posts-ul li.odd{
	float:left;
}
ul#top-posts-ul li:nth-child(odd){
	float:left;
}
ul#top-posts-ul li.even{
	float:right;
}
ul#top-posts-ul li:nth-child(even){
	float:right;
}";
			$galleryItemWidth =
".g_item {
	width:198px;
}
#gallery-style-1col .g_item{
	width:228px;
}";
			if ($sidebar == "right") {
				$contentFloat = "float:left;";
				$sidebarFloat = "right";
			} else {
				$contentFloat = "float:right;";
				$sidebarFloat = "left";
			}
			$sidebarCSS = "#sidebar{float:". $sidebarFloat ."; width:". $sidebarWidth ."px;}";
			break;

		case '3':		// 3 Column
			$sidebarWidth = "250";
			$sidebar2Width = "160";
			$contentWidth = "width:490px;";
			$tblListCSS =
"ul#top-posts-ul li{
	position:relative;
	width:240px;
	min-height:224px;
	max-height:224px;
	margin-bottom:10px;
}
ul#top-posts-ul-top-1col li{
	position:relative;
	width:300px;
	min-height:279px;
	max-height:279px;
	margin-bottom:30px;
}
.post_info_portfolio {
	height:176px;
}
ul#top-posts-ul-top-1col li .post_info_portfolio {
	height:220px;
}";

			$portfolioFloat = 
"ul#top-posts-ul li:nth-child(2n+1){
	clear:both;
}
ul#top-posts-ul li.odd{
	float:left;
}
ul#top-posts-ul li:nth-child(odd){
	float:left;
}
ul#top-posts-ul li.even{
	float:right;
}
ul#top-posts-ul li:nth-child(even){
	float:right;
}";
							  
			$postThumbCSS = 
".post_thumb {
	width:140px;
	height:102px;
}
#top-posts-ul-top-1col .post_thumb {
	width:200px;
	height:146px;
}
.post_thumb_portfolio{
	width:100%;
	height:176px;
}
#top-posts-ul-top-1col .post_thumb_portfolio {
	height:220px;
}";
			
			// Sidebar
			switch ($sidebar2) {
				case "left2":
					$contentFloat = "float:right;";
					$sidebarFloat = "left";
					$sidebar2Float = "left";
					$sidebarMargin = "margin-right:30px;";
					break;
				case "both":
					$contentFloat = 
"position:relative;
float:left;
left:280px;";
					$sidebarFloat = "left";
					$sidebar2Float = "right";
					$sidebarMargin = "left:-490px;";
					break;
				case "right2":
					$contentFloat = "float:left;";
					$sidebarFloat = "right";
					$sidebar2Float = "right";
					$sidebarMargin = "margin-left:30px;";
					break;
				default:
					break;
			}
			$sidebarCSS = "#sidebar{float:". $sidebarFloat ."; width:". $sidebarWidth ."px;". $sidebarMargin ."}".
						  "#sidebar2{float:". $sidebar2Float ."; width:". $sidebar2Width ."px;". $sidebar2Margin ."}";
			break;
	}
	
	$content = ".content{".$contentWidth.$contentFloat."}";
	// ---------------------------------------------------------------
	// Each Column Style End
	// ---------------------------------------------------------------


	// Thumbnail method 
	if ($options['thumbnail_method'] === 'height') {
		$thumbnailMethodCSS =
".post_thumb img,
.post_thumb_portfolio img{
	width:auto;
	height:100%;
}";

	} else {
		$thumbnailMethodCSS =
".post_thumb img,
.post_thumb_portfolio img {
	width:100%;
	height:auto;
}";
	}


	// If category list has post count number.
	if ($catPostCount) {
		$catListFix = <<<_EOD_
.widget_pages ul li a,
.widget_categories ul li a,
.widget_mycategoryorder ul li a{display:inline-block;}
_EOD_;
	}

	// Footer Column number
	switch ($footerColNum) {
		case '1':
			$footerColWidthCSS = "div#ft-widget-area1{width:100%;}";
			break;
		case '2':
			$footerColWidthCSS = 
"div#ft-widget-area1{
	width:300px;
	float:left;
}
div#ft-widget-area2{
	width:630px;
	float:left;
	margin-left:30px;
}";
			break;
		case '3':
			$footerColWidthCSS = 
"div#ft-widget-area1,
div#ft-widget-area2, 
div#ft-widget-area3{
	width:300px;
	float:left;
}
div#ft-widget-area2{
	margin:0 30px 0 30px;
}";
			break;
		case '4':
			$footerColWidthCSS = 
"div#ft-widget-area1{
	width:300px;
}
div#ft-widget-area1,
div#ft-widget-area2,
div#ft-widget-area3,
div#ft-widget-area4{
	float:left;
}
div#ft-widget-area2,
div#ft-widget-area3,
div#ft-widget-area4{
	margin-left:30px;
	width:190px;
}";
			break;
		default:
			$footerColWidthCSS = "";
			break;
	}
	
	
	// CSS strings...
	$strCss = dp_custom_design_css(
					$options,
					$options_visual,
					$fileNameForIE9Gradient);
	$strCss .= $content.
			   $contentTop1Col.
			   $tblListCSS.
			   $postThumbCSS.
			   $thumbnailMethodCSS.
			   $portfolioFloat.
			   $portfolioFloatTop1Col.
			   $galleryItemWidth.
			   $sidebarCSS."".
			   $catListFix.
			   $footerColWidthCSS.
			   $originalCSS;
	$strCss = str_replace(array("\r\n","\r","\n","\t"), '', $strCss);
	//Rewrite CSS for custom design
	dp_export_file($filePath, $strCss);
	dp_export_gzip($filePath, $strCss);
	
	// Get the gradient color
	$color1	= $options_visual['header_top_gradient1'];
	$color2	= $options_visual['header_top_gradient2'];
	if (($color1 === "#") || ($color1 === "")) $color1	= "#f4f8f9";
	if (($color2 === "#") || ($color2 === "")) $color2	= "#d9dee0";
	// Gradient SVG XML strings...
	$svgXml = gradientSVGForIE9($color1, $color2);
	// Write SVG XML
	dp_export_file($filePathForIE9Gradient, $svgXml);
	
	return true;
}


/**  ===================================================
* Create css for custom design hack.
*
* @param	string	$headerImage	Custom header image.
* @param	string	$imgRepeat	Method image repeat.
* @param	string	$blindTitle	Whether site title is blind.
* @param	string	$blindDesc	Whether site description is blind.
* @return	none
*/
function dp_custom_design_css($options, $options_visual, $fileNameForIE9Gradient) {

	$fontColor		= $options_visual['base_font_color'];
	$baseTextShadow	= $options_visual['base_text_shadow_color'];
	$fontSize		= $options_visual['base_font_size'];
	$linkColor		= $options_visual['base_link_color'];
	$linkHoverColor	= $options_visual['base_link_hover_color'];
	$linkUnderline	= $options_visual['base_link_underline'];
	$linkBold		= $options_visual['base_link_bold'];

	$floatingMenuBgColor 		= $options_visual['fixed_menu_color'];
	$floatingMenuLinkColor 		= $options_visual['fixed_menu_link_color'];
	$floatingMenuBorderColor1 	= $options_visual['fixed_menu_border_color1'];
	$floatingMenuBorderColor2	= $options_visual['fixed_menu_border_color2'];
	$floatingMenuBorderColor3 	= $options_visual['fixed_menu_border_color3'];
	$floatingMenuBorderColor4 	= $options_visual['fixed_menu_border_color4'];
	$floatingMenuBorderColor5 	= $options_visual['fixed_menu_border_color5'];
	$floatingMenuShadowOpacity		= $options_visual['fixed_menu_shadow_opacity'];

	$h1TitleType	= $options_visual['h1title_as_what'];
	$headerTopGradient1	= $options_visual['header_top_gradient1'];
	$headerTopGradient2	= $options_visual['header_top_gradient2'];
	$headerToppageH1TitleColor	= $options_visual['header_toppage_h1_color'];
	$headerToppageFontColor	= $options_visual['header_toppage_font_color'];
	$headerToppageTextShadow = $options_visual['header_toppage_text_shadow_color'];

	$headerTitleBgcolor 		= $options_visual['header_title_bgcolor'];
	$headerTitleBgOpacity 		= $options_visual['header_title_bg_opacity'];

	$headerBreadcrumbGradient1	= $options_visual['header_bottom_gradient1'];
	$headerBreadcrumbGradient2	= $options_visual['header_bottom_gradient2'];
	$headerBreadcrumbFontColor = $options_visual['header_breadcrumb_font_color'];
	$headerBreadcrumbTextShadow = $options_visual['header_breadcrumb_text_shadow'];

	$headerAreaShadowOpacity		= $options_visual['header_area_shadow_opacity'];
	
	$headerPagedFontColor		= $options_visual['header_paged_font_color'];
	$headerPagedLinkColor		= $options_visual['header_paged_link_color'];
	$headerPagedLinkHoverColor = $options_visual['header_paged_link_hover_color'];
	$headerPagedTextShadow		= $options_visual['header_paged_text_shadow'];

	$commonTitleColor	= $options_visual['common_title_color'];

	// DO NOT USE in el plano
	//$containerBgColor	= $options_visual['container_bg_color'];
	
	$siteBgColor		= $options_visual['site_bg_color'];
	$entrylistCatColor = "#fff";
	$siteBgImage		= $options_visual['dp_background_img'];
	$siteBgImageRepeat	= $options_visual['dp_background_repeat'];

	$headerImgFixed 	= $options_visual['dp_header_img_fixed'] ? 'background-attachment:fixed;background-position-y:44px;' : '';
	$headerImage		= $options_visual['dp_header_img'];
	$headerImageRepeat	= $options_visual['dp_header_repeat'];

	$containerBottomFontColor	= $options_visual['container_bottom_font_color'];
	$containerBottomTextShadow 	= $options_visual['container_bottom_text_shadow'];
	$containerBottomGradient1	= $options_visual['container_bottom_gradient1'];
	$containerBottomGradient2	= $options_visual['container_bottom_gradient2'];

	$footerTextColor		= $options_visual['footer_text_color'];
	$footerTextShadow 		= $options_visual['footer_text_shadow_color'];
	$footerLinkColor		= $options_visual['footer_link_color'];
	$footerLinkHoverColor	= $options_visual['footer_link_hover_color'];
	$footerGradient1	= $options_visual['footer_gradient1'];
	$footerGradient2	= $options_visual['footer_gradient2'];
	
	// Base value
	$originalFontColor 				= '#202020';
	$originalFontSizePx				= 14.5;
	$originalFontSizeEm				= 1.1;
	$originalCommonTitleColor	 	= '#0f0f0f';
	$originalLinkColor 				= '#1ec3ce';
	$originalLinkHoverColor			= '#1fc772';
	
	$originalFloatingMenuBgColor	= '#202020';
	$originalFloatingMenuLinkColor	= '#fff';
	$originalFloatingMenuBorderColor1 = '#1ec3ce';
	$originalFloatingMenuBorderColor2 = '#1fc772';
	$originalFloatingMenuBorderColor3 = '#FD868E';
	$originalFloatingMenuBorderColor4 = '#E6C973';
	$originalFloatingMenuBorderColor5 = '#BFEBEF';
	$originalFloatingMenuShadowOpacity = 0;

	$originalheaderToppageH1TitleColor 		= '#fff';
	$originalheaderToppageFontColor			= '#fff';
	$originalHeaderToppageTextShadow 		= '#666';

	$originalHeaderTopGradient1			= '#f9f9f9';
	$originalHeaderTopGradient2			= '#f9f9f9';

	$originalHeaderBreadcrumbGradient1	= '#1ec3ce';
	$originalHeaderBreadcrumbGradient2	= '#1ec3ce';
	$originalHeaderBreadcrumbFontColor	= '#fff';
	$originalHeaderBreadcrumbTextShadow = 'transparent';

	$originalHeaderPagedFontColor		= '#a0a0a0';
	$originalHeaderPagedLinkColor		= '#202020';
	$originalHeaderPagedLinkHoverColor	= '#202020';
	$originalHeaderPagedTextShadow		= 'transparent';

	$originalHeaderTitleBgcolor			= '#1ec3ce';
	$originalHeaderTitleBgOpacity		= 70;

	$originalBaseTextShadowColor 		= 'transparent';
	$originalSiteBgColor 			= '#fff';

	$originalHeaderAreaShadowOpacity 	= 0;

	$originalContainerBottomFontColor	= '#fff';
	$originalContainerBottomTextShadow	= 'transparent';
	$originalContainerBottomGradient1	= '#1fc772';
	$originalContainerBottomGradient2	= '#1fc772';

	$originalFooterTextColor		= '#fff';
	$originalFooterTextShadow		= 'transparent';
	$originalFooterLinkColor		= '#fff';
	$originalFooterLinkHoverColor	= '#e0e0e0';
	$originalFooterGradient1		= '#202020';
	$originalFooterGradient2		= '#202020';

	$entrylistCatColor = "#fff";

	// For CSS
	$OnlyIECSS = '';
	$floatingMenuCSS = '';
	$baseFontlColorCSS = '';
	$baseTextShadowCSS = '';
	//$containerBgColorCSS = '';
	$postExcerptHoverCSS = '';
	$listHoverCSS = '';
	$headerTopBackgroundCSS = '';
	$headerBreadcrumbCSS = '';
	$headerToppageH1TitleColorCSS = '';
	$headerToppageFontColorCSS = '';
	$headerToppageTextShadowCSS = '';
	$headerToppageTitleBgColorCSS = '';
	$h1TitleImgFix = '';
	$headerAreaShadowOpacityCSS = '';
	$headerPagedCSS = '';
	$linkColorCSS = '';
	$linkHoverColorCSS = '';
	$linkFilledColorCSS = '';
	$linkFilledHoverColorCSS = '';
	$linkStyle = '';
	$arrowCSS = '';
	$galleryEntrylistCSS = '';
	$portFolioTitleCSS = '';
	$borderColor = '';
	$hrStyleCSS = '';
	$siteTitleBorderBottom = '';
	$commonTitleColorCSS = '';
	$commonBgColorCSS = '';
	$quoteCSS = '';
	$commentBoxCSS = '';
	$containerBottomCSS = '';
	$footerTextColorCSS = '';
	$footerTitleBorderCSS = '';
	$footerLinkColorCSS = '';
	$footerLinkHoverColorCSS = '';
	$footerGradientCSS = '';
		
	//Base font color
	if (($fontColor === "#") || ($fontColor === "")) $fontColor = $originalFontColor;
	$baseFontlColorCSS = 
".entry ul li:before,
.dp_related_posts_horizon a,
.dp_related_posts_horizon a:visited,
.dp_related_posts_vertical a,
.dp_related_posts_vertical a:visited,
.widget_nav_menu li a:before,
.widget_pages li a:before,
.widget_categories li a:before,
.widget_mycategoryorder li a:before,
#sidebar a,
#sidebar a:visited,
#sidebar2 a,
#sidebar2 a:visited {
	color:" . $fontColor . ";
}";
	
	// base area text shadowsite_title
	if (($baseTextShadow === '#') || !$baseTextShadow) $baseTextShadow = $originalBaseTextShadowColor;
	if ($baseTextShadow === 'transparent') {
		$baseTextShadowCSS = '';
	} else {
		$baseTextShadowCSS = 
"#container,
.pagetitle{
	text-shadow:1px 1px 0 ". $baseTextShadow .";
}
.posttitle,
.newentrylist,
.widget-box h1{
	text-shadow:0 1px 0 ". $baseTextShadow .";
}";
	}


	// HR style
	$rgb = hexToRgb($fontColor);
	$hrStyleCSS = 
"hr{border:0;
	border-width:1px 0 0 0\9;
	border-style:solid\9;
	border-color:#".$fontColor."\9;
	box-shadow:0 0 1px 0 ".$baseTextShadow."\9;
	height: 1px;
	background-image:-webkit-linear-gradient(left,rgba(".$rgb[0].",".$rgb[1].",".$rgb[2].",0), rgba(".$rgb[0].",".$rgb[1].",".$rgb[2].",0.75), rgba(0".$rgb[0].",".$rgb[1].",".$rgb[2].",0));
	background-image:-moz-linear-gradient(left, rgba(".$rgb[0].",".$rgb[1].",".$rgb[2].",0), rgba(".$rgb[0].",".$rgb[1].",".$rgb[2].",0.75), rgba(".$rgb[0].",".$rgb[1].",".$rgb[2].",0));
	background-image:-ms-linear-gradient(left, rgba(".$rgb[0].",".$rgb[1].",".$rgb[2].",0), rgba(0".$rgb[0].",".$rgb[1].",".$rgb[2].",0.75), rgba(".$rgb[0].",".$rgb[1].",".$rgb[2].",0));
	background-image:-o-linear-gradient(left, rgba(".$rgb[0].",".$rgb[1].",".$rgb[2].",0), rgba(".$rgb[0].",".$rgb[1].",".$rgb[2].",0.75), rgba(".$rgb[0].",".$rgb[1].",".$rgb[2].",0));
}";

	// Font size
	if (!$fontSize || ($fontSize == '')) {
		if (!$options_visual['base_font_size_unit'] || ($options_visual['base_font_size_unit'] == '')) {
			$fontSize = ".entry{font-size:".$originalFontSizePx."px;}";
		} else {
			$fontSize = ".entry{font-size:".$originalFontSizeEm."em".$options_visual['base_font_size_unit'].";}";
		}
	} else {
		if (!$options_visual['base_font_size_unit'] || ($options_visual['base_font_size_unit'] == '')) {
			$fontSize = ".entry{font-size:".$fontSize."px;}";
		} else {
			$fontSize = ".entry{font-size:".$fontSize.$options_visual['base_font_size_unit'].";}";
		}
	}

	//Link Style
	if (($linkUnderline === "1") || ($linkUnderline == null)) {
		if ($linkBold === "true") {
			$linkStyle	= ".entry a{font-weight:bold;text-decoration:none;}".
						  ".entry a:hover{text-decoration:underline;}";
		} else {
			$linkStyle	= ".entry a{font-weight:normal;text-decoration:none;}".
						  ".entry a:hover{text-decoration:underline;}";
		}
	} else {
		if ($linkBold === "true") {
			$linkStyle	= ".entry a{font-weight:bold;text-decoration:underline;}".
						  ".entry a:hover{text-decoration:none;}";
		} else {
			$linkStyle	= ".entry a{font-weight:normal;text-decoration:underline;}".
						  ".entry a:hover{text-decoration:none;}";
		}
	}

	//Header image
	if ( ($headerImage === "none") || ($headerImage === "")) {
		$headerImage = 
"div#site_title{
	background:transparent url(../img/header/header1.jpg) no-repeat center;
	background-size:100% auto;
	$headerImgFixed
}";
	} else if ($headerImage === "random") {
		$headerImage = "";
	} else {
		//Create 
		$headerImage = 
"div#site_title{
	background:transparent url(../img/_uploads/header/".$headerImage .") ". $headerImageRepeat . ";
	background-size:100% auto;
	$headerImgFixed
}";
	}

	// background color
	if ( ($siteBgColor === "#") || (!$siteBgColor)) $siteBgColor	= $originalSiteBgColor;
	
	
	//Background image
	if (($siteBgImage === "none") || ($siteBgImage === "")) {
		$siteBgImage = '';
	} else {
		$siteBgImage = " url(../img/_uploads/background/" . $siteBgImage . ") " . $siteBgImageRepeat . " left top";
	}

	// Body CSS
	$body = 
"body{
	color:".$fontColor."; 
	background:".$siteBgColor.$siteBgImage.";
}";

	//container bg color
// 	if (($containerBgColor === "#") || ($containerBgColor === "")) $containerBgColor = "transparent";
// 	$containerBgColorCSS = 
// "#container{
// 	background-color:".$containerBgColor.";
// }";


	//Base anchor text color
	if (($linkColor === "#") || ($linkColor === "")) $linkColor = $originalLinkColor;
	$rgb = hexToRgb($linkColor);
	$linkColorCSS = 
"a,
a:visited,
a.entrylist-title:hover,
.reverse-link a:hover,
.content blockquote:before,
.content blockquote:after,
.entry ul li:before,
div#gototop a,
div#gototop a:visited,
.widget_title_hover:hover,
.dp_related_posts_horizon a:hover,
.dp_related_posts_vertical a:hover,
#sidebar a:hover,
#sidebar2 a:hover{
	color:" . $linkColor . ";
}
.tooltip-arrow{
	border-color:transparent transparent " . $linkColor . " transparent;
}
a.entrylist-title,
.reverse-link a{
	color:" . $fontColor . ";
}";

	$linkFilledColorCSS = 
".fl_submenu_li,
.dp-pagenavi span.current,
.entrylist-cat a,
.entrylist-cat a:visited,
.nav_to_paged a,
.nav_to_paged a:visited,
nav.navigation-mb a,
#mb_footer_menu,
#mb_footer_menu a,
#mb_footer_menu a:hover,
.active_tab,
.content pre,
a.comment-reply-link,
a.comment-reply-link:visited,
.entry > p > a.more-link,
#sidebar div.tagcloud a,
#sidebar div.tagcloud a:visited,
#sidebar2 div.tagcloud a,
#sidebar2 div.tagcloud a:visited,
nav.single-nav a,
nav.single-nav a:visited,
.entry input[type=\"submit\"],
#found-title span,
.plane-label,
#wp-calendar tbody td a,
#wp-calendar tbody td a:visited,
input#submit,
.tooltip-msg,
a#gototop span,
a#gototop2{
	color:". $entrylistCatColor .";
	background:" . $linkColor . ";
}
ul#switch_comment_type,
ul.dp_tab_widget_ul{
	border-bottom:2px solid ".$linkColor.";
}";

	$portFolioTitleCSS =
".post_info_portfolio,
span.bgstr-tooltip{
	color:".$entrylistCatColor.";
	background:" . $linkColor . "\9;
	background:rgba(".$rgb[0].",".$rgb[1].",".$rgb[2].",0.88);
}
.post_info_portfolio a,
.post_info_portfolio a:visited,
.post_info_portfolio a:hover{color:". $entrylistCatColor ."}";

	//Base hovering anchor text color
	if ( ($linkHoverColor === "#") || ($linkHoverColor === "")) $linkHoverColor = $originalLinkHoverColor;
	$linkHoverColorCSS	= 
"a:hover,
.fake-hover:hover,
div#gototop a:hover{
	color:".$linkHoverColor.";
}";

	$linkFilledHoverColorCSS =
".fl_submenu_li:hover,
.entrylist-cat a:hover,
.nav_to_paged a:hover,
nav.navigation-mb a:hover,
.dp-pagenavi a:hover,
.inactive_tab:hover,
.entry > p > a.more-link:hover,
a.comment-reply-link:hover,
#sidebar div.tagcloud a:hover,
#sidebar2 div.tagcloud a:hover,
nav.single-nav a:hover,
.entry input[type=\"submit\"]:hover,
#wp-calendar tbody td a:hover,
input#submit:hover,
a#gototop2:hover{
	color:". $entrylistCatColor .";
	background:" . $linkHoverColor . ";
}";

	$rgb = hexToRgb($fontColor);
	$borderColor = 
".entry h1{
	border-bottom:6px double ".$linkColor.";
}
.entry h3{
	border-bottom:4px double ".$linkColor.";
}
.entry h2,
.entry h4,
#container address{
	border-left:6px solid ".$linkColor.";
}
.entry h5{border-bottom:1px solid ".$linkColor.";}
.entry h6{border-bottom:1px dotted ".$linkColor.";}
.posttitle,
.new-entry,
.new-entry ul li,
.newentrylist,
.postmeta_title,
.post_excerpt,
.content dt,
.content dd,
.dp-pagenavi,
div.trackback_url_area,
.widget-box h1,
.widget_pages li a,
.widget_nav_menu li a,
.widget_categories li a,
.widget_mycategoryorder li a,
.recent_entries li, 
.recent_entries_w_thumb li,
.comment_hd_title,
h3#reply-title{
	border-bottom:1px solid #d0d0d0\9;
	border-bottom:1px solid rgba(". $rgb[0] . ", " . $rgb[1] . "," . $rgb[2] . ", 0.18);
}
.dp_tab_widget_ul li,
.dp_feed_widget li,
.widget_pages li,
.widget_nav_menu li,
.widget_categories li,
.widget_mycategoryorder li {
	border:none;
}
.content dt,
.content dd,
.entrylist-date{
	border-right:1px solid #d0d0d0\9;
	border-right:1px solid rgba(". $rgb[0] . ", " . $rgb[1] . "," . $rgb[2] . ", 0.18);
}
.content dt,
.content dd{
	border-left:1px solid #d0d0d0\9;
	border-left:1px solid rgba(". $rgb[0] . ", " . $rgb[1] . "," . $rgb[2] . ", 0.18);
}
.content dl,
.postmetadata,
.dp-pagenavi{
	border-top:1px solid #d0d0d0\9;
	border-top:1px solid rgba(". $rgb[0] . ", " . $rgb[1] . "," . $rgb[2] . ", 0.18);
}
div#comment-author,
div#comment-email,
div#comment-url,
div#comment-comment,
li.comment,
li.trackback,
li.pingback{
	border:1px solid #d0d0d0\9;
	border:1px solid rgba(". $rgb[0] . ", " . $rgb[1] . "," . $rgb[2] . ", 0.18);
}
.content th,
.content td {
	border:1px solid #d0d0d0;
}
";

	// Common Background Color
	$commonBgColorCSS = 
".content dt,
.content th,
.entry .wp-caption{
	background-color:#efefef\9;
	background-color:rgba(". $rgb[0] . ", " . $rgb[1] . "," . $rgb[2] . ", 0.04);
}";

	// Table view and gallery type view
	$galleryEntrylistCSS =
"ul#top-posts-ul li,
ul#top-posts-ul-top-1col li,
.g_item{
	background-color:#efefef\9;
	border-bottom:1px solid #d0d0d0\9;
	background-color:rgba(". $rgb[0] . ", " . $rgb[1] . "," . $rgb[2] . ", 0.04);
	border-bottom:1px solid rgba(". $rgb[0] . "," . $rgb[1] . "," . $rgb[2] . ", 0.2);
	box-shadow:0 0 1px 0 rgba(". $rgb[0] . "," . $rgb[1] . "," . $rgb[2] . ", 0.2);
	-moz-box-shadow:0 0 1px 0 rgba(". $rgb[0] . "," . $rgb[1] . "," . $rgb[2] . ", 0.2);
	-webkit-box-shadow:0 0 1px 0 rgba(". $rgb[0] . "," . $rgb[1] . "," . $rgb[2] . ", 0.2);
}";


	// Header Paged Font
	if ( ($headerPagedFontColor === '#') || (!$headerPagedFontColor)) $headerPagedFontColor = $originalHeaderPagedFontColor;
	if ( ($headerPagedLinkColor === '#') || (!$headerPagedLinkColor)) {
		$headerPagedLinkColor = $originalHeaderPagedLinkColor;
	}
	if ( ($headerPagedLinkHoverColor === "#") || (!$headerPagedLinkHoverColor)) {
		$headerPagedLinkHoverColor = $originalHeaderPagedLinkHoverColor;
	}
	if ( ($headerPagedTextShadow === "#") || (!$headerPagedTextShadow)) $headerPagedTextShadow = $originalHeaderPagedTextShadow;

	$headerPagedCSS	= 
"#header_container_paged {
	color:".$headerPagedFontColor.";
	text-shadow:0 1px 0 ". $headerPagedTextShadow . ";
}
#header_container_paged a,
#header_container_paged a h1,
#header_container_paged a h1:hover {
	color:".$headerPagedLinkColor.";
}
#header_container_paged a:hover {
	color:".$headerPagedLinkHoverColor.";
}";

	
	// Scroll entry box height
	if ($options['show_thumbnail']) {
		$scrollentryHeightCSS = 
"#scrollentrybox {
	height:331px;
	max-height:331px;
}";
	} else {
		if ($options['show_cat_entrylist'] && !($options['show_specific_cat_index_top'] === 'custom')) {
			$scrollentryHeightCSS = 
"#scrollentrybox {
	height:219px;
	max-height:219px;
}";
		} else {
			$scrollentryHeightCSS = 
"#scrollentrybox {
	height:202px;
	max-height:202px;
}";
		}
		
	}


	// Post Excerpt border
	$postExcerptHoverCSS = 
".post_excerpt:hover{
	background:rgba(". $rgb[0] . ", " . $rgb[1] . "," . $rgb[2] . ", 0.05);
}";

	// List item hover color
	if ($options['show_cat_with_postcount']) {
		$listHoverCSS = 
".widget_nav_menu li a:hover,
.widget_pages li a:hover,
ul.recent_entries_w_thumb li:hover,
ul.recent_entries li:hover,
.dp_recent_posts_widget li:hover,
.dp_related_posts_horizon ul li:hover,
.dp_related_posts_vertical ul li:hover,
#ft-widget-content ul.recent_entries_w_thumb li:hover,
span.v_sub_menu_btn{
	background:rgba(". $rgb[0] . ", " . $rgb[1] . "," . $rgb[2] . ", 0.05);
	filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0, startColorstr=#05000000, endColorstr=#05000000);
	-ms-filter:\"progid:DXImageTransform.Microsoft.gradient(startColorstr='#05000000', endColorstr='#05000000', GradientType=0)\";
}";
	} else {
		$listHoverCSS = 
".widget_nav_menu li a:hover,
.widget_pages li a:hover,
.widget_categories li a:hover,
.widget_mycategoryorder li a:hover,
ul.recent_entries_w_thumb li:hover,
ul.recent_entries li:hover,
.dp_recent_posts_widget li:hover,
.dp_related_posts_horizon ul li:hover,
.dp_related_posts_vertical ul li:hover,
#ft-widget-content ul.recent_entries_w_thumb li:hover,
span.v_sub_menu_btn{
	background:rgba(". $rgb[0] . ", " . $rgb[1] . "," . $rgb[2] . ", 0.05);
	filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0, startColorstr=#05000000, endColorstr=#05000000);
	-ms-filter:\"progid:DXImageTransform.Microsoft.gradient(startColorstr='#05000000', endColorstr='#05000000', GradientType=0)\";
}";
	}
	$listHoverCSS .= 
".widget_nav_menu li a:not(:target),
.widget_pages li a:not(:target),
.widget_categories li a:not(:target),
.widget_mycategoryorder li a:not(:target),
ul.recent_entries_w_thumb li:not(:target),
ul.recent_entries li:not(:target),
.dp_recent_posts_widget li:not(:target),
.dp_related_posts_horizon ul li:not(:target),
.dp_related_posts_vertical ul li:not(:target),
#ft-widget-content ul.recent_entries_w_thumb li:not(:target),
span.v_sub_menu_btn:not(:target) {
	filter:none;
	-ms-filter:none;
}";
	

	//Common Title
	if (($commonTitleColor === "#") || ($commonTitleColor === "")) $commonTitleColor = $originalCommonTitleColor;

	$rgb = hexToRgb($commonTitleColor);
	$commonTitleColorCSS = 
".free-title,
.posttitle,
.posttitle a,
.newentrylist,
.excerpt_title a,
.excerpt_title a:visited,
#gallery-style h1 a,
#gallery-style-1col h1 a,
.entry h1,
.entry h2,
.entry h3,
.entry h4,
.entry h5,
.entry h6,
.comment_hd_title,
#reply-title,
.widget-box h1,
#top-content-widget a{
	color:".$commonTitleColor.";
}
.excerpt_title a:hover,
#gallery-style h1 a:hover,
#gallery-style-1col h1 a:hover,
#top-content-widget a:hover{
	color:".$linkColor.";
}";

	// ---------------------------------------------------------------
	// Header Area Start
	// ---------------------------------------------------------------
	// header top background color
	if (($headerTopGradient1 === "#") || ($headerTopGradient1 === "")) {
		$headerTopGradient1	= $originalHeaderTopGradient1;
	}
	$siteTitleBorderBottom = $headerTopGradient1;
	
	if (($headerTopGradient2 === "#") || ($headerTopGradient2 === "")) {
		$headerTopGradient2	= $originalHeaderTopGradient2;
	}
	
	if ($headerTopGradient1 === $headerTopGradient2) {
		$headerTopBackgroundCSS = <<<_EOD_
header#header_area,
header#header_area_half,
header#header_area_paged{
	background-color:$headerTopGradient1;
}
_EOD_;
	}  else {
		$headerTopBackgroundCSS = <<<_EOD_
header#header_area,
header#header_area_half,
header#header_area_paged{
	background-color:$headerTopGradient1\9;
	background-image:url($fileNameForIE9Gradient);
	background:-ms-linear-gradient(top, $headerTopGradient1 0%, $headerTopGradient2 100%);
	background:-moz-linear-gradient(top, $headerTopGradient1 0%, $headerTopGradient2 100%);
	background:-o-linear-gradient(top, $headerTopGradient1 0%, $headerTopGradient2 100%);
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0, $headerTopGradient1), color-stop(1, $headerTopGradient2));
	background:-webkit-linear-gradient(top, $headerTopGradient1 0%, $headerTopGradient2 100%);
	background:linear-gradient(top, $headerTopGradient1 0%, $headerTopGradient2 100%);
	-pie-background:linear-gradient($headerTopGradient1, $headerTopGradient2);
}
.lt-ie9 header#header_area, 
.lt-ie9 header#header_area_paged, 
.lt-ie9 #footer{
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='$headerTopGradient1', endColorstr='$headerTopGradient2', GradientType=0);}
_EOD_;
	}

	// Top page header title background color
	if ($options_visual['show_bgcolor_in_header_title']) {
		if ( ($headerTitleBgcolor === "#") || (!$headerTitleBgcolor)) $headerTitleBgcolor = $originalHeaderTitleBgcolor;

		$rgb = $rgb = hexToRgb($headerTitleBgcolor);

		$headerToppageTitleBgColorCSS =
"#h_area {
	background:" . $headerTitleBgcolor . "\9;
	background:rgba(" . $rgb[0] . "," . $rgb[1] . "," .  $rgb[2] . "," . $headerTitleBgOpacity / 100 . ");
}";

	}

	//H1 site title Type
	if ($h1TitleType != 'image') {
		$h1TitleImgFix		= 
"#site_title hgroup h1{
	min-height:90px;
}";

		if ( ($headerToppageH1TitleColor === "#") || ($headerToppageH1TitleColor === "")) {
			$headerToppageH1TitleColor = $originalheaderToppageH1TitleColor;
		}

		$headerToppageH1TitleColorCSS	= 
"#site_title hgroup h1 a{
	color:". $headerToppageH1TitleColor .";
}";
	} else {
		// If h1 title is Header image
		$h1TitleImgFix	= 
"#site_title hgroup h1 {
	height:90px;
	max-height:90px;
	overflow:hidden;
}
#site_title hgroup h1 a{
	height:90px;
}";
		$headerToppageH1TitleColorCSS	= "";
	}

	// Top page header area text shadow
	if (($headerToppageTextShadow === '#') || ($headerToppageTextShadow === '')) {
		$headerToppageTextShadow = $originalHeaderToppageTextShadow;
	}
	// Top page header area font color
	if (($headerToppageFontColor === "#") || ($headerToppageFontColor === "")) {
		$headerToppageFontColor	= $originalheaderToppageFontColor;
	}
	$headerToppageFontColorCSS = 
"div#header_container,
div#header_container_half,
div#header_container a,
div#header_container_half a{
	color:".$headerToppageFontColor.";
	text-shadow:0 0 6px " . $headerToppageTextShadow . ";
}";
	

	// Header area box bottomborder
	if ($headerAreaShadowOpacity === null) {
		$headerAreaShadowOpacity = $originalHeaderAreaShadowOpacity;
	}
	$headerAreaShadowOpacity = $headerAreaShadowOpacity / 100;
	if ($headerAreaShadowOpacity !== 0) {
		$headerAreaShadowOpacityCSS = 
"header#header_area,
header#header_area_half,
header#header_area_paged{
	box-shadow:0 0 5px 0 rgba(0,0,0," . $headerAreaShadowOpacity . ");
	-moz-box-shadow:0 0 5px 0 rgba(0,0,0," . $headerAreaShadowOpacity . ");
	-webkit-box-shadow:0 0 5px 0 rgba(0,0,0," . $headerAreaShadowOpacity . ");
}";
	}
	
	// Header Bread crumb area CSS
	if (($headerBreadcrumbGradient1 === '#') || ($headerBreadcrumbGradient1 === '')) {
		$headerBreadcrumbGradient1 = $originalHeaderBreadcrumbGradient1;
	}
	if (($headerBreadcrumbGradient2 === '#') || ($headerBreadcrumbGradient2 === '')) {
		$headerBreadcrumbGradient2 = $originalHeaderBreadcrumbGradient2;
	}
	if (($headerBreadcrumbFontColor === '#') || ($headerBreadcrumbFontColor === '')) {
		$headerBreadcrumbFontColor = $originalHeaderBreadcrumbFontColor;
	}
	if (($headerBreadcrumbTextShadow === '#') || ($headerBreadcrumbTextShadow === '')) {
		$headerBreadcrumbTextShadow = $originalHeaderBreadcrumbTextShadow;
	}

	if ($headerBreadcrumbGradient1 === $headerBreadcrumbGradient2) {
		$headerBreadcrumbCSS = 
".dp_topbar_title{
	color:" . $headerBreadcrumbFontColor . ";
	text-shadow:0 1px 0 " . $headerBreadcrumbTextShadow . ";
	background-color:" . $headerBreadcrumbGradient1 . ";
}
.dp_topbar_title a,
.dp_topbar_title a:hover,
.dp_topbar_title a:visited{
	color:" . $headerBreadcrumbFontColor . ";
}
.headline_main_title h1{
	color:" . $headerBreadcrumbGradient1 . ";
	background-color:" . $headerBreadcrumbFontColor . ";
}";
		$arrowCSS =
".breadcrumb_arrow {
	border-color: " . $headerBreadcrumbGradient1 . " transparent transparent transparent;
}";
	} else {
		$headerBreadcrumbCSS = 
".dp_topbar_title {
	color:" . $headerBreadcrumbFontColor . ";
	text-shadow:0 1px 0 " . $headerBreadcrumbTextShadow . ";
	background-color:" . $headerBreadcrumbGradient1 ."\9;
	background:-ms-linear-gradient(top, " . $headerBreadcrumbGradient1 ." 0%, " . $headerBreadcrumbGradient2 . " 100%);
	background:-moz-linear-gradient(top, " . $headerBreadcrumbGradient1 ." 0%, " . $headerBreadcrumbGradient2 . " 100%);
	background:-o-linear-gradient(top, " . $headerBreadcrumbGradient1 ." 0%, " . $headerBreadcrumbGradient2 . " 100%);
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0, " . $headerBreadcrumbGradient1 ."), color-stop(1, " . $headerBreadcrumbGradient2 . "));
	background:-webkit-linear-gradient(top, " . $headerBreadcrumbGradient1 ." 0%, " . $headerBreadcrumbGradient2 . " 100%);
	background:linear-gradient(top, " . $headerBreadcrumbGradient1 ." 0%, " . $headerBreadcrumbGradient2 . " 100%);
	-pie-background:linear-gradient(" . $headerBreadcrumbGradient1 .", " . $headerBreadcrumbGradient2 . ");
}
.lt-ie9 .dp_topbar_title{
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='" . $headerBreadcrumbGradient1 ."', endColorstr='" . $headerBreadcrumbGradient2 . "', GradientType=0);
}
.dp_topbar_title a,
.dp_topbar_title a:hover,
.dp_topbar_title a:visited{
	color:" . $headerBreadcrumbFontColor . ";
}
.headline_main_title h1{
	color:" . $headerBreadcrumbGradient1 . ";
	background-color:" . $headerBreadcrumbFontColor . ";
}";
		$arrowCSS =
".breadcrumb_arrow {
	position:relative;
	top:-66px;
	width: 0px;
	height: 0px;
	border-style: solid;
	border-width: 22px 22px 0 22px;
	border-color: " . $headerBreadcrumbGradient2 . " transparent transparent transparent;
}";
	}
	// ---------------------------------------------------------------
	// Header Area End
	// ---------------------------------------------------------------


	// ---------------------------------------------------------------
	// Floating Menu Start
	// ---------------------------------------------------------------
	if (($floatingMenuBgColor === "#") || ($floatingMenuBgColor === "")) {
		$floatingMenuBgColor = $originalFloatingMenuBgColor;
	}
	if (($floatingMenuLinkColor === "#") || ($floatingMenuLinkColor === "")) {
		$floatingMenuLinkColor = $originalFloatingMenuLinkColor;
	}
	if (($floatingMenuBorderColor1 === "#") || ($floatingMenuBorderColor1 === "")) {
		$floatingMenuBorderColor1 = $originalFloatingMenuBorderColor1;
	}
	if (($floatingMenuBorderColor2 === "#") || ($floatingMenuBorderColor2 === "")) {
		$floatingMenuBorderColor2 = $originalFloatingMenuBorderColor2;
	}
	if (($floatingMenuBorderColor3 === "#") || ($floatingMenuBorderColor3 === "")) {
		$floatingMenuBorderColor3 = $originalFloatingMenuBorderColor3;
	}
	if (($floatingMenuBorderColor4 === "#") || ($floatingMenuBorderColor4 === "")) {
		$floatingMenuBorderColor4 = $originalFloatingMenuBorderColor4;
	}
	if (($floatingMenuBorderColor5 === "#") || ($floatingMenuBorderColor5 === "")) {
		$floatingMenuBorderColor5 = $originalFloatingMenuBorderColor5;
	}
	if ($floatingMenuShadowOpacity === null) {
		$floatingMenuShadowOpacity = $originalFloatingMenuShadowOpacity;
	}
	$floatingMenuShadowOpacity = $floatingMenuShadowOpacity / 100;
	$floatingMenuCSS = 
"#fixed_menu,
#fixed_menu_ul ul,
.expand_float_menu_li,
nav#mb_header_menu {
	background-color:" . $floatingMenuBgColor . ";
	box-shadow:0 1px 1px 0 rgba(0,0,0," . $floatingMenuShadowOpacity . ");
	-moz-box-shadow:0 1px 1px 0 rgba(0,0,0," . $floatingMenuShadowOpacity . ");
	-webkit-box-shadow:0 1px 1px 0 rgba(0,0,0," . $floatingMenuShadowOpacity . ");
}
#mb_header_menu_arrow {
	border-color: ".$floatingMenuBgColor." transparent transparent transparent;
}
#fixed_menu a,
#expand_float_menu,
nav#mb_header_menu,
nav#mb_header_menu a{
	color:" . $floatingMenuLinkColor . ";
}
#fixed_menu_ul li:nth-child(5n+1) a:hover,
#mb_header_menu_list ul li:nth-child(5n+1) a:hover {
	color:" . $floatingMenuBorderColor1 . ";
	border-top:4px solid " . $floatingMenuBorderColor1 . ";
}
#fixed_menu_ul li:nth-child(5n+2) a:hover,
#mb_header_menu_list ul li:nth-child(5n+2) a:hover {
	color:" . $floatingMenuBorderColor2 . ";
	border-top:4px solid " . $floatingMenuBorderColor2 . ";
}
#fixed_menu_ul li:nth-child(5n+3) a:hover,
#mb_header_menu_list ul li:nth-child(5n+3) a:hover {
	color:" . $floatingMenuBorderColor3 . ";
	border-top:4px solid " . $floatingMenuBorderColor3 . ";
}
#fixed_menu_ul li:nth-child(5n+4) a:hover,
#mb_header_menu_list ul li:nth-child(5n+4) a:hover {
	color:" . $floatingMenuBorderColor4 . ";
	border-top:4px solid " . $floatingMenuBorderColor4 . ";
}
#fixed_menu_ul li:nth-child(5n+5) a:hover,
#mb_header_menu_list ul li:nth-child(5n+5) a:hover {
	color:" . $floatingMenuBorderColor5 . ";
	border-top:4px solid " . $floatingMenuBorderColor5 . ";
}
#mb_header_menu_list ul li a:hover,
#mb_footer_menu_list ul li a:hover{
	border-top:none!important;
}";
	// ---------------------------------------------------------------
	// Floating Menu End
	// ---------------------------------------------------------------




$rgb = hexToRgb($fontColor);

//Quotes tag
$quoteCSS = 
".content blockquote,
.content q,
.content code{
	background-color:#efefef\9;
	border:1px solid #d0d0d0\9;
	background-color:rgba(". $rgb[0] . ", " . $rgb[1] . "," . $rgb[2] . ", 0.04);
	border:1px solid rgba(". $rgb[0] . ", " . $rgb[1] . "," . $rgb[2] . ", 0.18);}";

	
	//Comment Box
	$commentBgColorIE = "#fff";
	// if ($containerBgColor != "transparent") $commentBgColorIE = $containerBgColor;
	$commentBoxCSS = 
".commentlist li .odd,
.commentlist li:nth-child(odd){
	background-color:transparent;
	background-color:".$commentBgColorIE."\9;}
.commentlist li .even,
.commentlist li:nth-child(even){
	background-color:rgba(".$rgb[0].",".$rgb[1].",".$rgb[2].",0.04);
	background-color:".$commentBgColorIE."\9;}
.commentlist li ul.children li {background-color:transparent;}";
	

// ---------------------------------------------------------------
// Container bottom Area Start
// ---------------------------------------------------------------
// Container bottom CSS
if ($containerBottomGradient1 == '#' || $containerBottomGradient1 == '') {
	$containerBottomGradient1 = $originalContainerBottomGradient1;
}
if ($containerBottomGradient2 == '#' || $containerBottomGradient2 == '') {
	$containerBottomGradient2 = $originalContainerBottomGradient2;
}
if ($containerBottomFontColor == '#' || $containerBottomFontColor == '') {
	$containerBottomFontColor = $originalContainerBottomFontColor;
}
if ($containerBottomTextShadow == '#' || $containerBottomTextShadow == '') {
	$containerBottomTextShadow = $originalContainerBottomTextShadow;
}
if ($containerBottomGradient1 == $containerBottomGradient2) {
	$containerBottomCSS = 
"#container_footer,
#container_footer .widget-box h1 {
	color:" . $containerBottomFontColor . ";
	text-shadow:0 1px 0 " . $containerBottomTextShadow . ";
	background-color:" . $containerBottomGradient1 .";
}";
} else {
	$containerBottomCSS = 
"#container_footer {
	color:" . $containerBottomFontColor . ";
	text-shadow:0 1px 0 " . $containerBottomTextShadow . ";
	background-color:" . $containerBottomGradient1 ."\9;
	background:-ms-linear-gradient(top, " . $containerBottomGradient1 ." 0%, " . $containerBottomGradient2 . " 100%);
	background:-moz-linear-gradient(top, " . $containerBottomGradient1 ." 0%, " . $containerBottomGradient2 . " 100%);
	background:-o-linear-gradient(top, " . $containerBottomGradient1 ." 0%, " . $containerBottomGradient2 . " 100%);
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0, " . $containerBottomGradient1 ."), color-stop(1, " . $containerBottomGradient2 . "));
	background:-webkit-linear-gradient(top, " . $containerBottomGradient1 ." 0%, " . $containerBottomGradient2 . " 100%);
	background:linear-gradient(top, " . $containerBottomGradient1 ." 0%, " . $containerBottomGradient2 . " 100%);
	-pie-background:linear-gradient(" . $containerBottomGradient1 .", " . $containerBottomGradient2 . ");
}";
}

$containerBottomCSS .= 
"#container_footer a,
#container_footer a:hover{
	color:" . $containerBottomFontColor . ";
}";
// ---------------------------------------------------------------
// Container bottom Area End
// ---------------------------------------------------------------


// ---------------------------------------------------------------
// Footer Area Start
// ---------------------------------------------------------------
$rgb = hexToRgb($footerTextColor);

if ($footerGradient1 == "#" || $footerGradient1 == "") {
	$footerGradient1 = $originalFooterGradient1;
}
if ($footerGradient2 == "#" || $footerGradient2 == "") {
	$footerGradient2 = $originalFooterGradient2;
}
if ($footerGradient1 == $footerGradient2) {
	$footerGradientCSS =
"#footer{
	background-color:" . $footerGradient1 .";
}";
} else {
	$footerGradientCSS =
"#footer{
	background-color:" . $footerGradient1 ."\9;
	background:-ms-linear-gradient(top, " . $footerGradient1 ." 0%, " . $footerGradient2 . " 100%);
	background:-moz-linear-gradient(top, " . $footerGradient1 ." 0%, " . $footerGradient2 . " 100%);
	background:-o-linear-gradient(top, " . $footerGradient1 ." 0%, " . $footerGradient2 . " 100%);
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0, " . $footerGradient1 ."), color-stop(1, " . $footerGradient2 . "));
	background:-webkit-linear-gradient(top, " . $footerGradient1 ." 0%, " . $footerGradient2 . " 100%);
	background:linear-gradient(top, " . $footerGradient1 ." 0%, " . $footerGradient2 . " 100%);
	-pie-background:linear-gradient(" . $footerGradient1 .", " . $footerGradient2 . ");
}
#footer-bottom-mb{
	background-color:" . $footerGradient2 .";
}";
}
$footerGradientCSS .=
"a#gototop {
	border-color: transparent transparent ". $footerGradient1 ." transparent;
}
a#gototop-mb{
	border-color: transparent transparent ". $footerGradient2 ." transparent;
}";

// footer text color
if ( ($footerTextColor === "#") || ($footerTextColor === '')) $footerTextColor = $originalFooterTextColor;
// footer area text shadow
if (($footerTextShadow === '#') || (!$footerTextShadow)) $footerTextShadow = $originalFooterTextShadow;
// footer link color
if ( ($footerLinkColor === "#") || ($footerLinkColor === '')) $footerLinkColor = $originalFooterLinkColor;
// footer link hover color
if ( ($footerLinkHoverColor === "#") || ($footerLinkHoverColor === "")) $footerLinkHoverColor = $originalFooterLinkHoverColor;

$footerTextColorCSS = 
"#footer,
#ft-widget-content h1,
#footer-bottom a,
#footer-bottom a:hover,
#footer-bottom-mb a{
	color:". $footerTextColor .";
	text-shadow:0 1px 0 " . $footerTextShadow . ";
}
#ft-widget-content .widget_archive select,
#ft-widget-content .widget_categories select,
#ft-widget-content .widget_mycategoryorder select {
	color:". $footerTextColor .";
	border-color:rgba(".$rgb[0].",".$rgb[1].",".$rgb[2].",0.14);
}";

$footerLinkColorCSS = 
".ft-widget-box a{
	color:". $footerLinkColor .";
}
#ft-widget-content div.tagcloud a,
#ft-widget-content div.tagcloud a:visited{
	color:".$footerGradient1.";
	background:".$footerLinkColor.";
}";

$footerLinkHoverColorCSS = 
".ft-widget-box a:hover{
	color:". $footerLinkHoverColor  .";
}
#ft-widget-content div.tagcloud a:hover{
	background:".$footerLinkHoverColor.";
}";

$rgb1 = hexToRgb($footerTextColor);

$footerTitleBorderCSS = 
"#ft-widget-content h1,
.ft-widget-box ul.recent_entries li,
.ft-widget-box ul.recent_entries_w_thumb li,
.ft-widget-box .widget_pages li a, 
.ft-widget-box .widget_nav_menu li a, 
.ft-widget-box .widget_categories li a, 
.ft-widget-box .widget_mycategoryorder li a {
	border-bottom:1px solid rgba(". $rgb1[0] . ", " . $rgb1[1] . "," . $rgb1[2] . ", 0.4);
}";
// ---------------------------------------------------------------
// Footer Area End
// ---------------------------------------------------------------


	$result = <<<_EOD_
@charset "utf-8";
$body
$postExcerptHoverCSS
$listHoverCSS
$fontSize
$baseFontlColorCSS
$baseTextShadowCSS
$floatingMenuCSS
$linkColorCSS
$linkHoverColorCSS
$linkStyle
$linkFilledColorCSS
$linkFilledHoverColorCSS
$headerBreadcrumbCSS
$arrowCSS
$galleryEntrylistCSS
$portFolioTitleCSS
$commonTitleColorCSS
$h1TitleImgFix
$headerToppageH1TitleColorCSS
$headerToppageFontColorCSS
$headerToppageTextShadowCSS
$headerAreaShadowOpacityCSS
$headerTopBackgroundCSS
$headerToppageTitleBgColorCSS
$headerPagedCSS
$headerImage
$borderColor
$scrollentryHeightCSS
$commonBgColorCSS
$hrStyleCSS
$quoteCSS
$commentBoxCSS
$containerBottomCSS
$footerTextColorCSS
$footerTitleBorderCSS
$footerLinkColorCSS
$footerLinkHoverColorCSS
$footerGradientCSS
$OnlyIECSS
_EOD_;

	return $result;
}

/****************************
 * Gradient SVG for IE9
 ***************************/
function gradientSVGForIE9($color1, $color2) {
	if ($color1 == "") return;
	if ($color2 == "") return;

	$xml = <<<_EOD_
<?xml version="1.0" ?>
<svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.0" width="100%" height="100%" xmlns:xlink="http://www.w3.org/1999/xlink">
  <defs>
    <linearGradient id="myLinearGradient1" x1="0%" y1="0%" x2="0%" y2="100%" spreadMethod="pad">
      <stop offset="0%"   stop-color="$color1" stop-opacity="1"/>
      <stop offset="100%" stop-color="$color2" stop-opacity="1"/>
    </linearGradient>
  </defs>
  <rect width="100%" height="100%" style="fill:url(#myLinearGradient1);" />
</svg>
_EOD_;

	return $xml;
}

/*******************************************************
* Write File
*******************************************************/
/** ===================================================
* Write css and svg to the file.
*
* @param	string	$filePath
* @param	string	$string
* @return	true or false
*/
function dp_export_file($filePath, $str) {
	//Rewrite CSS for custom design
	if (is_writable( $filePath )){
		//Open
		if(!$fp = fopen($filePath,  'w') ){
			add_action('admin_notices',  array('digipress_options', 'not_open_file_msg'));
    			return false;
  		}
  		//Write 
  		if(!fwrite( $fp, $str )){
			add_action('admin_notices',  array('digipress_options', 'file_in_use_msg'));
			return false;
		}
		//Close file
		fclose($fp);
	} else {
		//if only readinig
		add_action('admin_notices',  array('digipress_options', 'not_rewrite_msg'));
		return false;
	}
	return true;
}
function dp_export_gzip($filePath, $str) {
	//Rewrite CSS for custom design
	if (is_writable( $filePath )){
		//Open
		if(!$fp = gzopen($filePath.'.gz',  'w9') ){
			add_action('admin_notices',  array('digipress_options', 'not_open_file_msg'));
    			return false;
  		}
  		//Write 
  		if(!gzwrite( $fp, $str )){
			add_action('admin_notices',  array('digipress_options', 'file_in_use_msg'));
			return false;
		}
		//Close file
		gzclose($fp);
	} else {
		//if only readinig
		add_action('admin_notices',  array('digipress_options', 'not_rewrite_msg'));
		return false;
	}
	return true;
}


/****************************
 * HEX to RGB
 ***************************/
function hexToRgb($color) {
	$color = preg_replace("/^#/", '', $color);
	if (mb_strlen($color) == 3) $color .= $color;
	$rgb = array();
	for($i = 0; $i < 6; $i+=2) {
		$hex = substr($color, $i, 2);
		$rgb[] = hexdec($hex);
	}
	return $rgb;
}
?>
