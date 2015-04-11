<?php
/*******************************************************
* Create Navigation link.
*******************************************************/
/** ===================================================
* Create site navigation strings.
* @param	none
* @return	none
*/
function dp_breadcrumb($divOption = array(
										"id" => "", 
										"class" => "dp_breadcrumb clearfix") ) {
	global $options;
	global $post;
	$str ='';

	$blank_flag = true;

	// Not home and admin page
	
	if( !is_admin() ){
		$tagAttribute = '';
		$scope = 'itemscope';
		$itemType = 'http://data-vocabulary.org/Breadcrumb';
		$itemprop = 'url';
		$tagTitleStart = '<span itemprop="title">';
		$tagTitleEnd = '</span>';

		foreach($divOption as $attrName => $attrValue){
			$tagAttribute .= sprintf(' %s="%s"', $attrName, $attrValue);
		}
		$str.= '<nav'. $tagAttribute .'>';
		$str.= '<ul>';
		
		if (!$options['hide_home_breadcrumb']) {
			$str.= '<li ' . $scope . ' itemtype="' . $itemType . '"><a href="'. home_url() .'/" itemprop="' . $itemprop . '" class="icon-home">' . $tagTitleStart . 'HOME' . $tagTitleEnd .'</a></li>';

			$blank_flag = false;
		}

		if (is_home() && is_paged()) {							// Home paged
			$tagTitleStart = '<span class="icon-doc">';
			$str.='<li ' . $scope . ' itemtype="' . $itemType . '">' . $tagTitleStart . 'Page ' . intval(get_query_var('paged')) . $tagTitleEnd . '</li>';

			$blank_flag = false;

		} else if (is_archive()){
			// Category
			if (is_category()) {
				$tagTitleStart = '<span itemprop="title" class="icon-folder">';

				$cat = get_queried_object();
				if($cat -> parent != 0){
					$ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
					foreach($ancestors as $ancestor){
						$str.='<li ' . $scope . ' itemtype="' . $itemType . '"><a href="'. get_category_link($ancestor) .'" itemprop="' . $itemprop . '">' . $tagTitleStart . get_cat_name($ancestor) . $tagTitleEnd . '</a></li>';
					}
					$blank_flag = false;
				}
				// Paged
				if (is_paged()) {
					$str.='<li ' . $scope . ' itemtype="' . $itemType . '">' . $tagTitleStart . $cat -> name . ' ( ' . intval(get_query_var('paged')) . ' ) ' . $tagTitleEnd . '</li>';
					$blank_flag = false;

				} else {
					$str.='<li ' . $scope . ' itemtype="' . $itemType . '">' . $tagTitleStart . $cat -> name . $tagTitleEnd . '</li>';

					$blank_flag = false;
				}

			} elseif (is_date()){
				// Date Archive
				$tagTitleStart = '<span itemprop="title" class="icon-calendar">';

				if (get_query_var('day') != 0){				// Archive of the day
					$str.='<li ' . $scope . ' itemtype="' . $itemType . '"><a href="'. get_year_link(get_query_var('year')). '" itemprop="' . $itemprop . '">' . $tagTitleStart . get_query_var('year').$tagTitleEnd . '</a></li>';
					$str.='<li ' . $scope . ' itemtype="' . $itemType . '"><a href="'. get_month_link(get_query_var('year'), get_query_var('monthnum')). '" itemprop="' . $itemprop . '">' . $tagTitleStart . get_query_var('monthnum') . $tagTitleEnd . '</a></li>';
					$str.='<li ' . $scope . ' itemtype="' . $itemType . '">' . $tagTitleStart . get_query_var('day'). $tagTitleEnd . '</li>';

					$blank_flag = false;

				} elseif (get_query_var('monthnum') != 0){	// Archive of the month
					$str.='<li ' . $scope . ' itemtype="' . $itemType . '"><a href="'. get_year_link(get_query_var('year')) .'" itemprop="' . $itemprop . '">' . $tagTitleStart . get_query_var('year') . $tagTitleEnd .'</a></li>';
					// Paged
					if (is_paged()) {
						$str.='<li ' . $scope . ' itemtype="' . $itemType . '">' . $tagTitleStart . get_query_var('monthnum').' ( ' . intval(get_query_var('paged')) . ' ) ' . $tagTitleEnd . '</li>';
					} else {
						$str.='<li ' . $scope . ' itemtype="' . $itemType . '">' . $tagTitleStart . get_query_var('monthnum'). $tagTitleEnd .'</li>';
					}

					$blank_flag = false;
					
				} else {									// Archive of the year
					// Paged
					if (is_paged()) {
						$str.='<li ' . $scope . ' itemtype="' . $itemType . '">' . $tagTitleStart . get_query_var('year') .' ( ' . intval(get_query_var('paged')) . ' ) ' . $tagTitleEnd . '</li>';
					} else {
						$str.='<li ' . $scope . ' itemtype="' . $itemType . '">' . $tagTitleStart . get_query_var('year') . $tagTitleEnd . '</li>';
					}

					$blank_flag = false;
				}

			} elseif (is_author()){
				// Archive of author
				$tagTitleStart = '<span itemprop="title" class="icon-user">';
				// Paged
				if (is_paged()) {
					$str .='<li ' . $scope . ' itemtype="' . $itemType . '">' . $tagTitleStart  . get_the_author_meta('display_name', get_query_var('author')) . ' ( ' . intval(get_query_var('paged')) . ' ) ' . $tagTitleEnd . '</li>';
				} else {
					$str .='<li ' . $scope . ' itemtype="' . $itemType . '">' . $tagTitleStart  . get_the_author_meta('display_name', get_query_var('author')) . $tagTitleEnd . '</li>';
				}

				$blank_flag = false;
			
			} elseif (is_tag()){
				// Archive of tag
				$tagTitleStart = '<span itemprop="title" class="icon-tag">';

				// Paged
				if (is_paged()) {
					$str.='<li ' . $scope . ' itemtype="' . $itemType . '">' . $tagTitleStart . single_tag_title( '' , false ) . ' ( ' . intval(get_query_var('paged')) . ' ) ' . $tagTitleEnd . '</li>';
				} else {
					$str.='<li ' . $scope . ' itemtype="' . $itemType . '">' . $tagTitleStart . single_tag_title( '' , false ) . $tagTitleEnd . '</li>';
				}

				$blank_flag = false;

			} elseif (is_post_type_archive()) {
				$customPostTypeObj = get_post_type_object(get_post_type());
				$customPostTypeTitle = esc_html($customPostTypeObj->labels->name);

				$str.='<li ' . $scope . ' itemtype="' . $itemType . '">' . $tagTitleStart . $customPostTypeTitle . $tagTitleEnd . '</li>';

				$blank_flag = false;

			} else {
				// Other
				$tagTitleStart = '<span itemprop="title">';

				// Paged
				if (is_paged()) {
					$str.='<li ' . $scope . ' itemtype="' . $itemType . '">' . $tagTitleStart . wp_title('', false) . ' ( ' . intval(get_query_var('paged')) . ' ) ' . $tagTitleEnd . '</li>';
				} else {
					$str.='<li ' . $scope . ' itemtype="' . $itemType . '">' . $tagTitleStart . wp_title('', false) . $tagTitleEnd . '</li>';
				}

				$blank_flag = false;
			}

		} elseif (is_search()) {							// Search result
			$word = isset( $_REQUEST['q']) ? $_GET['q'] : get_search_query();
			$tagTitleStart = '<span itemprop="title" class="icon-search">';

			// Paged
			if (is_paged()) {
				$str.='<li ' . $scope . ' itemtype="' . $itemType . '">' . $tagTitleStart . $word . ' ( ' . intval(get_query_var('paged')) . ' ) ' . $tagTitleEnd . '</li>';
			} else {
				$str.='<li ' . $scope . ' itemtype="' . $itemType . '">' . $tagTitleStart  . $word . $tagTitleEnd . '</li>';
			}

			$blank_flag = false;

		} elseif (is_singular()) {

			$customPostTypeObj = get_post_type_object(get_post_type());
			$customPostTypeTitle = esc_html($customPostTypeObj->labels->name);

			if (is_single()) {
				// Single post
				if ((get_post_type() === 'post')) {
					// Single post
					$tagTitleStart = '<span itemprop="title" class="icon-folder">';
					$categories = get_the_category($post->ID);
					$cat = $categories[0];
					if($cat -> parent != 0){
						$ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
						foreach($ancestors as $ancestor){
							$str.='<li ' . $scope . ' itemtype="' . $itemType . '"><a href="'. get_category_link($ancestor).'" itemprop="' . $itemprop . '">'. $tagTitleStart . get_cat_name($ancestor) . $tagTitleEnd . '</a></li>';
						}
					}
					$str.='<li ' . $scope . ' itemtype="' . $itemType . '"><a href="'. get_category_link($cat -> term_id). '" itemprop="' . $itemprop . '">' . $tagTitleStart . $cat-> cat_name . '</a></li>';

					$blank_flag = false;
				} else {
					// Maybe custom post type
					$str.='<li ' . $scope . ' itemtype="' . $itemType . '"><a href="' . get_post_type_archive_link($post->post_type) . '" itemprop="' . $itemprop . '">' . $tagTitleStart . $customPostTypeTitle . '</a></li>';
						
					$blank_flag = false;
				}

			} elseif (is_page()){
				// Page
				if($post -> post_parent != 0 ){
					$ancestors = array_reverse(get_post_ancestors( $post->ID ));
					foreach($ancestors as $ancestor){
						$str.='<li ' . $scope . ' itemtype="' . $itemType . '"><a href="'. get_permalink($ancestor).'" itemprop="' . $itemprop . '">' . $tagTitleStart . get_the_title($ancestor) . $tagTitleEnd . '</a></li>';
					}

					$blank_flag = false;
				}
			
			} elseif (is_attachment()){						// Atttachment page
				$tagTitleStart = '<span itemprop="title" class="icon-picture">';
				$str.= '<li ' . $scope . ' itemtype="' . $itemType . '">' . $tagTitleStart . $post -> post_title . $tagTitleEnd .'</li>';

				$blank_flag = false;
			}
	
		} elseif (is_404()){								// 404 Not Found
			$tagTitleStart = '<span itemprop="title" class="icon-404">';
			$str.='<li ' . $scope . ' itemtype="' . $itemType . '">' . $tagTitleStart  . 'Not found' . $tagTitleEnd . '</li>';

			$blank_flag = false;

		} else {											// Else
			$str.='<li ' . $scope . ' itemtype="' . $itemType . '">' . $tagTitleStart . wp_title('', false) . $tagTitleEnd . '</li>';

			$blank_flag = false;
		}
		$str.='</ul>';
		$str.='</nav>';
	}

	if (!$blank_flag) echo $str;
}
?>
