<?php
// ----------------------------------------------------------------
// Custom init in admin panel 
// ----------------------------------------------------------------
function custom_admin_init() {
	if (!current_user_can('level_10')) {
		// Hide new WordPress version info
		add_filter('pre_site_transient_update_core', '__return_zero');

		// Disable version check connection with API.
		remove_action('wp_version_check', 'wp_version_check');
		remove_action('admin_init', '_maybe_update_core');

		// Remove welcome panel
		remove_action( 'welcome_panel', 'wp_welcome_panel' );
	}

	// Change editor user's role
	$role =& get_role('editor');
	$role->add_cap('edit_themes');
}
// add_action( 'admin_init', 'custom_admin_init');



// ----------------------------------------------------------------
// Add styles in admin panel
// ----------------------------------------------------------------
function dp_admin_print_styles(){
	if (current_user_can('level_10')) return;
	echo '<style type="text/css">
	.versions p,
	#wp-version-message, 
	td.b-posts, td.posts,
	td.b_pages, td.pages, 
	td.b-cats, td.cats,
	td.b-tags, td.tags,
	#contextual-help-link-wrap{display:none;}</style>';
}
// add_action('admin_print_styles', 'dp_admin_print_styles', 21);



// ----------------------------------------------------------------
// Import original CSS in admin panel
// ----------------------------------------------------------------
function dp_admin_css() {
	echo '<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/inc/css/dp-admin-min.css">';
}
// add_action('admin_head', 'dp_admin_css');


// ----------------------------------------------------------------
// Change footer text
// ----------------------------------------------------------------
function custom_admin_footer_text() {
	return;
}
// add_filter('admin_footer_text', 'custom_admin_footer_text');


// ----------------------------------------------------------------
// Admin bar items
// ----------------------------------------------------------------
function remove_admin_bar_menu() {
	if (current_user_can('level_10')) return;
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo'); 		// W ロゴ
	// $wp_admin_bar->remove_menu('site-name');	// サイト名
	$wp_admin_bar->remove_menu('view-site'); 	// サイト名 -> サイトを表示
	$wp_admin_bar->remove_menu('comments'); 	// コメント
	$wp_admin_bar->remove_menu('new-content'); 	// 新規
	$wp_admin_bar->remove_menu('new-post'); 	// 新規 -> 投稿
	$wp_admin_bar->remove_menu('new-media'); 	// 新規 -> メディア
	$wp_admin_bar->remove_menu('new-link'); 	// 新規 -> リンク
	$wp_admin_bar->remove_menu('new-page'); 	// 新規 -> 固定ページ
	$wp_admin_bar->remove_menu('new-user'); 	// 新規 -> ユーザー
	$wp_admin_bar->remove_menu('updates'); 		// 更新
	$wp_admin_bar->remove_menu('my-account'); 	// マイアカウント
	$wp_admin_bar->remove_menu('user-info'); 	// マイアカウント -> プロフィール
	$wp_admin_bar->remove_menu('edit-profile'); // マイアカウント -> プロフィール編集
	$wp_admin_bar->remove_menu('logout'); 		// マイアカウント -> ログアウト
 }
// add_action( 'admin_bar_menu', 'remove_admin_bar_menu', 99 );


// ----------------------------------------------------------------
// Add logout menu
// ----------------------------------------------------------------
function add_new_item_in_admin_bar() {
	if (current_user_can('level_10')) return;
	global $wp_admin_bar;
	$wp_admin_bar->add_menu(array(
		'id' 	=> 'admin_bar_logout',
		'title' => __('Log out'),
		'href' 	=> wp_logout_url()
		)
	);
}
// add_action('wp_before_admin_bar_render', 'add_new_item_in_admin_bar');
 

// ----------------------------------------------------------------
// Remove dashboard widgets
// ----------------------------------------------------------------
function example_remove_dashboard_widgets() {
	if (current_user_can('level_10')) return;
 	global $wp_meta_boxes;
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // 現在の状況
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // 最近のコメント
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // 被リンク
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // プラグイン
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // クイック投稿
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // 最近の下書き
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPressブログ
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // WordPressフォーラム
}
// add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets');



// ----------------------------------------------------------------
// Change menu title
// ----------------------------------------------------------------
function change_admin_left_menu_title() {
	global $menu;
	global $submenu;

	// $menu[5][0] = 'Blogs'; 
	$menu[10][0] = __('Upload', 'DigiPress'); // Media
}
// add_action( 'admin_menu', 'change_admin_left_menu_title' );


// ----------------------------------------------------------------
// Change menu order
// ----------------------------------------------------------------
function custom_menu_order($menu_ord) {
	if (!$menu_ord) return true;
	
	return array(
		'index.php', 				// Dashboard
		'separator1', 				// First separator
		'edit.php', 				// Posts
		'upload.php', 				// Media
		'link-manager.php', 		// Links
		'edit.php?post_type=page', 	// Pages
		'edit-comments.php', 		// Comments
		'separator2', 				// Second separator
		'themes.php', 				// Appearance
		'plugins.php', 				// Plugins
		'users.php', 				// Users
		'tools.php', 				// Tools
		'options-general.php', 		// Settings
		'separator-last', 			// Last separator
	);
}
// add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
// add_filter('menu_order', 'custom_menu_order');



// ----------------------------------------------------------------
// Remove sidebar menu
// ----------------------------------------------------------------
function remove_admin_menus () {
	if (current_user_can('level_10')) return;
	// remove_menu_page('wpcf7'); //Contact Form 7
	global $menu;
	//unset($menu[2]); // ダッシュボード
	// unset($menu[4]); // メニューの線1
	// unset($menu[5]); // 投稿
	// unset($menu[10]); // メディア
	unset($menu[15]); // リンク
	// unset($menu[20]); // 固定ページ
	// unset($menu[25]); // コメント
	unset($menu[59]); // メニューの線2
	unset($menu[60]); // テーマ
	unset($menu[65]); // プラグイン
	//unset($menu[70]); // プロフィール
	unset($menu[75]); // ツール
	unset($menu[80]); // 設定
	unset($menu[90]); // メニューの線3
}
// add_action('admin_menu', 'remove_admin_menus');


// ----------------------------------------------------------------
// Visible menus
// ----------------------------------------------------------------
function dp_add_admin_menus () {
	add_menu_page(__('Menus'), __('Menus'), 'editor', 'nav-menus.php');
	add_menu_page(__('Widgets'), __('Widgets'), 'editor', 'widgets.php');
}
// add_action('admin_menu', 'dp_add_admin_menus');


// ----------------------------------------------------------------
// Remove update number in admin bar
// ----------------------------------------------------------------
function remove_before_admin_bar_render() {
	if (current_user_can('level_10')) return;
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'updates' );
}
// add_action( 'wp_before_admin_bar_render', 'remove_before_admin_bar_render' );



// ----------------------------------------------------------------
// Remove post option items
// ----------------------------------------------------------------
// 投稿
function remove_default_post_screen_metaboxes() {
	if (current_user_can('level_10')) return;
	remove_meta_box( 'postexcerpt','post','normal' );       // 抜粋
	//remove_meta_box( 'trackbacksdiv','post','normal' );     // トラックバック送信
	remove_meta_box( 'postcustom','post','normal' );        // カスタムフィールド
	//remove_meta_box( 'commentstatusdiv','post','normal' );  // ディスカッション
	//remove_meta_box( 'commentsdiv','post','normal' );       // コメント
	//remove_meta_box( 'slugdiv','post','normal' );           // スラッグ
	remove_meta_box( 'authordiv','post','normal' );         // 作成者
	remove_meta_box( 'revisionsdiv','post','normal' );      // リビジョン
	//remove_meta_box( 'formatdiv','post','normal' );         // フォーマット
	//remove_meta_box( 'categorydiv','post','normal' );       // カテゴリー
	//remove_meta_box( 'tagsdiv-post_tag','post','normal' );  // タグ
}
// add_action('admin_menu','remove_default_post_screen_metaboxes');

// 固定ページ
function remove_default_page_screen_metaboxes() {
	if (current_user_can('level_10')) return;
	remove_meta_box( 'postcustom','page','normal' );        // カスタムフィールド
	remove_meta_box( 'commentstatusdiv','page','normal' );  // ディスカッション
	remove_meta_box( 'commentsdiv','page','normal' );       // コメント
	//remove_meta_box( 'slugdiv','page','normal' );           // スラッグ
	remove_meta_box( 'authordiv','page','normal' );         // 作成者
	remove_meta_box( 'revisionsdiv','page','normal' );      // リビジョン
}
// add_action('admin_menu','remove_default_page_screen_metaboxes');


// ----------------------------------------------------------------
// Hide profile items
// ----------------------------------------------------------------
// function custom_profile_fields( $contactmethods ) {
// 	if (current_user_can('level_10')) return;
// 	unset($contactmethods['aim']);     // AIM
// 	unset($contactmethods['yim']);     // Yahoo IM
// 	unset($contactmethods['jabber']);  // Jabber / Google Talk
// 	return $contactmethods;
// }
// add_filter('user_contactmethods','custom_profile_fields',10, 1);


// ----------------------------------------------------------------
// Remove screen options
// ----------------------------------------------------------------
function remove_screen_options(){
	if (!current_user_can('level_10')) return false;
}
// add_filter( 'screen_options_show_screen', 'remove_screen_options' );


// ----------------------------------------------------------------
// Add custom post type link in left menu
// ----------------------------------------------------------------
function show_custom_post_dashboard() {
	$dashboard_custom_post_types= Array(
		'news',
		'blog',
		'customers',
		'recommenders'
	);
	
	foreach($dashboard_custom_post_types as $custom_post_type) {
		global $wp_post_types;
		$num_post_type = wp_count_posts($custom_post_type);
		$num = number_format_i18n($num_post_type->publish);
		$text = _n( $wp_post_types[$custom_post_type]->labels->singular_name, $wp_post_types[$custom_post_type]->labels->name, $num_post_type->publish );
		$capability = $wp_post_types[$custom_post_type]->cap->edit_posts;
		
		if (current_user_can($capability)) {
			$num = "<a href='edit.php?post_type=" . $custom_post_type . "'>$num</a>";
			$text = "<a href='edit.php?post_type=" . $custom_post_type . "'>$text</a>";
		}
		
		echo '<tr>';
		echo '<td class="first b b_' . $custom_post_type . '">' . $num . '</td>';
		echo '<td class="t ' . $custom_post_type . '">' . $text . '</td>';
		echo '</tr>';
	}
}
// add_action( 'right_now_content_table_end', 'show_custom_post_dashboard' );


// ----------------------------------------------------------------
// Customize editor panel
// ----------------------------------------------------------------
function custom_editor_settings( $initArray ){
	$initArray['body_class'] = 'editor-area';
	$initArray['theme_advanced_blockformats'] = '段落=p,見出し1=h1,見出し2=h2,見出し3=h3,見出し4=h4,見出し5=h5,見出し6=h6,住所=address,pre=pre';
	return $initArray;
}
add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );

// Add Tiny MCE buttons
function ilc_mce_buttons($buttons){
	array_push($buttons, "backcolor", "copy", "cut", "paste", "fontsizeselect", "cleanup");
	return $buttons;
}
add_filter("mce_buttons", "ilc_mce_buttons");

// Enable original CSS in editor panel
add_editor_style('inc/css/editor-style.css');

// Enable AddQuicktag in custom post type
function addquicktag_set_custom_post_type($post_types) {
	global $options;
	array_push($post_types, $options['news_cpt_slug_id']);
	return $post_types;
}
add_filter('addquicktag_post_types', 'addquicktag_set_custom_post_type');


// ----------------------------------------------------------------
// Show thumbnail in posted list
// ----------------------------------------------------------------
function manage_thumbnail_posts_columns($columns) {
	// Set the title
	$columns['thumbnail'] = __('Thumbnail');
	return $columns;
}
function add_thumbnail_column($column_name, $post_id) {
	if ( 'thumbnail' == $column_name) {
		// Get thumbnail
		$thum = get_the_post_thumbnail($post_id, array(90,90), 'thumbnail');
		// Display
		if ( isset($thum) && $thum ) {
			echo $thum;
		} else {
			echo __('None');
		}
	}
}
add_filter( 'manage_posts_columns', 'manage_thumbnail_posts_columns' );
add_action( 'manage_posts_custom_column', 'add_thumbnail_column', 10, 2 );


?>