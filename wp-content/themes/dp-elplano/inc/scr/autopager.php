<?php 
/*---------------------------------------
 * Javascript for autopager
 *--------------------------------------*/
function showScriptForAutopager($page_num) {
	global $options, $options_visual;
	// Check
	if (!$options['autopager'] || is_single() || is_page()) return;

	// Get column number
	$col_num = get_column_num();

	$autopagerCode = '';

	// ***********************************
	// Archive style
	// Common style
	if (is_home()) {
		$archive_style = $options['top_post_show_type'];
		$excerpt_type = $options['top_excerpt_type'];

	} else {
		$archive_style = $options['archive_post_show_type'];
		if (is_category()) {
			// Only category page
			if ($options['show_type_cat_normal'] && is_category(explode(',', $options['show_type_cat_normal']))) {
				$archive_style = 'normal';
			} else if ($options['show_type_cat_portfolio'] && is_category(explode(',', $options['show_type_cat_portfolio']))) {
				$archive_style = 'table';
			} else if ($options['show_type_cat_magazine'] && is_category(explode(',', $options['show_type_cat_magazine']))) {
				$archive_style = 'gallery';
			}
		}
		$excerpt_type = $options['archive_excerpt_type'];
	}

	// Exception
	if ($archive_style == 'normal' && $excerpt_type == 'all') return;
	// ***********************************
	

	// ----------------------------------
	// Scripr for Auto pager 
	// ----------------------------------
	$callback 		= '';
	$infiniteAddSelector = '';
	$itemSelector 	= '';
	$navSelector	= 'nav.navigation';
	$nextSelector	= 'nav.navigation a';
	$lastMsg		= __('Reached the last content.', 'DigiPress');

	switch ($archive_style) {
		case 'normal':
			$infiniteAddSelector = '#entry-pager-div';
			$itemSelector = '.post_excerpt';
			$callback = <<< EOD
getAnchor();
imagesLoadedRun(".post_thumb, .post_thumb_portfolio", 500);
EOD;
			break;

		case 'table':
			$infiniteAddSelector = '#top-posts-ul';
			$itemSelector = '#top-posts-ul li';
			if ( $col_num == 1 )  {
				$infiniteAddSelector = '#top-posts-ul-top-1col';
				$itemSelector = '#top-posts-ul-top-1col li';
			}
			$callback = <<< EOD
showPostTitleInTableView();
imagesLoadedRun(".post_thumb, .post_thumb_portfolio", 500);
EOD;
			break;

		case 'gallery':
			$infiniteAddSelector = '#gallery-style';
			if ( $col_num == 1 )  {
				$infiniteAddSelector = '#gallery-style-1col';
			}
			$itemSelector = 'article.g_item';
			$callback = <<< EOD
var newElems = j$(this);
newElems.imagesLoaded(function(){
masonryContainer.masonry( 'appended', newElems, true );
});
imagesLoadedRun(".post_thumb, .post_thumb_portfolio", 500);
EOD;
			break;
	}

	// Code
	$autopagerCode = <<< EOD
<script type="text/javascript">
j$(function() {
	j$.autopager({
		autoLoad: false,
		content:'$itemSelector',
		appendTo:'$infiniteAddSelector',
		link:'$nextSelector',
		start: function(current, next){
			j$('$navSelector').before('<div id="pager-loading"></div>');
		},
		load: function(current, next){
			$callback
			j$('#pager-loading').remove();
			if　(current.page >= $page_num)　{
				j$('$navSelector').before('<div class="ft16px al-c pd22px-top">$lastMsg</div>');
				j$('$navSelector').hide();
			}
		}
	});
    j$('$nextSelector').click(function() {
		j$.autopager('load');
		return false;
	});
});
</script>
EOD;
	$autopagerCode = str_replace(array("\r\n","\r","\n","\t"), '', $autopagerCode);
	echo $autopagerCode;
}


/*---------------------------------------
 * Javascript for autopager in mobile
 *--------------------------------------*/
function showScriptForAutopagerMb($page_num) {
	global $options, $options_visual;
	// Check
	if (!$options['autopager_mb'] || is_single() || is_page()) return;
	
	$autopagerCode = '';

	// ***********************************
	// Archive style
	// Common style
	if (is_home()) {
		$archive_style = $options['top_post_show_type'];
	} else {
		$archive_style = $options['archive_post_show_type'];
		if (is_category()) {
			// Only category page
			if ($options['show_type_cat_normal'] && is_category(explode(',', $options['show_type_cat_normal']))) {
				$archive_style = 'normal';
			} else if ($options['show_type_cat_portfolio'] && is_category(explode(',', $options['show_type_cat_portfolio']))) {
				$archive_style = 'table';
			} else if ($options['show_type_cat_magazine'] && is_category(explode(',', $options['show_type_cat_magazine']))) {
				$archive_style = 'gallery';
			}
		}
	}
	// ***********************************
	

	// ----------------------------------
	// Scripr for Auto pager 
	// ---------------------------------- 
	$callback 		= '';
	$infiniteAddSelector = '';
	$itemSelector 	= '';
	$navSelector	= 'nav.navigation-mb';
	$nextSelector	= 'nav.navigation-mb a';
	$lastMsg		= __('Reached the last content.', 'DigiPress');

	switch ($archive_style) {
		case 'normal':
		case 'gallery':
			$infiniteAddSelector = '#posts-normal';
			$itemSelector = '.post_excerpt';
			$callback = <<< EOD
getAnchor();
imagesLoadedRun(".post_thumb, .post_thumb_portfolio, .widget-post-thumb", 500);
EOD;
			break;

		case 'table':
			$infiniteAddSelector = '#gallery-style';
			$itemSelector = 'article.g_item';
			$callback = <<< EOD
var newElems = j$(this);
newElems.imagesLoaded(function(){
masonryContainer.masonry( 'appended', newElems, true );
});
imagesLoadedRun(".post_thumb, .post_thumb_portfolio", 500);
EOD;
			break;
	}

	// Code
	$autopagerCode = <<< EOD
<script type="text/javascript">
j$(function() {
	j$.autopager({
		autoLoad: false,
		content:'$itemSelector',
		appendTo:'$infiniteAddSelector',
		link:'$nextSelector',
		start: function(current, next){
			j$('$navSelector').before('<div id="pager-loading"></div>');
		},
		load: function(current, next){
			$callback
			j$('#pager-loading').remove();
			if　(current.page >= $page_num)　{
				j$('$navSelector').before('<div class="ft16px al-c pd22px-top">$lastMsg</div>');
				j$('$navSelector').hide();
			}
		}
	});
    j$('$nextSelector').click(function() {
		j$.autopager('load');
		return false;
	});
});
</script>
EOD;
	$autopagerCode = str_replace(array("\r\n","\r","\n","\t"), '', $autopagerCode);
	echo $autopagerCode;
}
?>