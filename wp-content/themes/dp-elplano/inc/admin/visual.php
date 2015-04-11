<?php
// Get default values
global $def_visual;
// Get values
extract($options);

// Version
dp_ver_chk();
//Preg Match Pattern
$strPattern	=	'/(\.gif|\.jpg|\.jpeg|\.png)$/';

//Upload Folder
$upDir		= DP_THEME_DIR . '/img/_uploads';
?>

<div class="wrap">
<div id="dp_custom">
<h2 class="dp_h2 icon-palette"><?php _e('DigiPress Visual Settings', 'DigiPress'); ?></h2>
<p class="ft11px"><?php echo DP_THEME_NAME . ' Ver.' . DP_OPTION_SPT_VERSION; ?></p>
	<?php echo DP_NEW_VERSION; ?>


<!--
========================================
アップロード
========================================
-->
<h3 class="dp_h3 icon-menu" id="upload">ヘッダー画像／背景画像アップロード</h3>
<div class="dp_box" class="clearfix">
	<dl>
		<dt class="dp_set_title1 icon-bookmark">サイトタイトル画像 :</dt>
		<dd>
		<!-- Title Image Upload form Start -->
		<div id="imgUploadTitleBlock">
			<form action="<?php echo DP_THEME_URI; ?>/inc/scr/upload.php" method="post" enctype="multipart/form-data">
			
			<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
			<input type="file" name="file" id="hdImg" size="45" />
			<input type="hidden" name="my_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
			<input type="hidden" name="my_dir" value="title" />
			<input type="submit" class="button" value="アップロード" id="upTitleImg" />
			</form>
		</div>
		<!-- Title Image Upload form End -->
		
		<div class="slide-title icon-attention "><?php _e('Note...', 'DigiPress'); ?></div>
		<div class="slide-content">
		※アップロード対応フォーマット : <span class="red">*.jpg, *.png, *.gif, *.jpeg</span><br />
		※アップロードファイルサイズの上限 : <span class="red">500キロバイト</span><br />
		※<span class="red">PHPがセーフモード</span>の場合、「<span class="red"><?php echo $upDir; ?>/title</span>」フォルダのパーミッションを「<span class="red">777</span>」にしてください。<br />
		※最適な画像サイズは「<span class="red">300px(横) × 90px(縦)</span>」です。<br />
		※iPhoneのRetinaディスプレイなど高精細ディスプレイに対応させる場合の最適な画像サイズは、「<span class="red b ft15px">600px(縦) x 180px(横)</span>」です。
		</div>
		</dd>

		<dt class="dp_set_title1 icon-bookmark">テーマヘッダー画像 :</dt>
		<dd>
		<!-- Header Image Upload form Start -->
		<div id="imgUploadHdBlock">
			<form action="<?php echo DP_THEME_URI; ?>/inc/scr/upload.php" method="post" enctype="multipart/form-data">
			
			<input type="hidden" name="MAX_FILE_SIZE" value="1240000" />
			<input type="file" name="file" id="hdImg" size="45" />
			<input type="hidden" name="my_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
			<input type="hidden" name="my_dir" value="header" />
			<input type="submit" class="button" value="アップロード" id="upHdImg" />
			</form>
		</div>
		<!-- Header Image Upload form End -->
		
		<div class="slide-title icon-attention "><?php _e('Note...', 'DigiPress'); ?></div>
		<div class="slide-content">
		※アップロード対応フォーマット : <span class="red">*.jpg, *.png, *.gif, *.jpeg</span><br />
		※アップロードファイルサイズの上限 : <span class="red">1メガバイト</span><br />
		※<span class="red">PHPがセーフモード</span>の場合、「<span class="red"><?php echo $upDir; ?>/header</span>」フォルダのパーミッションを「<span class="red">777</span>」にしてください。<br />
		※表示サイズはブラウザの表示幅に合わせて常にリサイズされるため、特に指定はありませんが、縦のサイズが <span class="red b ft15px">616px(ハーフサイズモードの場合: 308px)</span> 以上の画像ファイルをアップロードしてください。<br />
		※ヘッダー画像エリアは広いため、アップロードする画像は<span class="red">極力圧縮してファイルサイズを最軽量化</span>することを強く推奨します。
		</div>
		</dd>
	
		<dt class="dp_set_title1 icon-bookmark">背景画像 :</dt>
		<dd>
		<!-- Background Image Upload form Start -->
		<div id="imgUploadBgBlock">
			<form action="<?php echo DP_THEME_URI; ?>/inc/scr/upload.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
			<input type="file" name="file" id="bgImg" size="45" />
			<input type="hidden" name="my_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
			<input type="hidden" name="my_dir" value="background" />
			<input type="submit" class="button" value="アップロード" id="upBgImg" />
			</form>
		</div>
		<!-- Background Image Upload form End -->
		
			<div class="slide-title icon-attention "><?php _e('Note...', 'DigiPress'); ?></div>
			<div class="slide-content">
			※アップロード対応フォーマット : <span class="red">*.jpg, *.png, *.gif, *.jpeg</span><br />
			※アップロードファイルサイズの上限 : <span class="red">500キロバイト</span><br />
			※<span class="red">PHPがセーフモード</span>の場合、「<span class="red"><?php echo $upDir; ?>/background</span>」フォルダのパーミッションを「<span class="red">777</span>」にしてください。
			</div>
		</dd>
	</dl>
	<div class="mg20px-top mg10px-l mg20px-btm clearfix">
	<p class="fl-l mg20px-r"><a href="?page=digipress_edit_images" class="btn open_trim_menu">画像のトリミング／リサイズ</a></p>
	<p class="fl-l"><a href="?page=digipress_delete_file" class="btn btn-red open_delete_menu">アップロード画像の削除</a></p>
	</div>
</div>


<input class="btn close_all mg20px-btm" type="button" name="close_all" value="   <?php _e('Close All', 'DigiPress'); ?>   " />

<!--
========================================
テーマ選択ここから
========================================
-->
<form method="post" action="#" name="dp_form" enctype="multipart/form-data">
<h3 class="dp_h3 icon-menu">表示カラム数／サイドバー位置設定</h3>
<div class="dp_box">
		<dl>
			<!-- サイドバーのタイプ -->
			<dt class="dp_set_title1 icon-bookmark">カラムタイプ :</dt>
				<dd class="clearfix">
				<div class="mg45px-r fl-l">
					<div class="clearfix pd5px-btm">
					<img src="<?php echo DP_THEME_URI; ?>/inc/admin/img/1column.png" />
					</div>
				<input name="dp_column" id="dp_column1" type="radio" value="1" <?php if($options['dp_column'] === "1") echo "checked"; ?> /><label for="dp_column1"> 1カラム</label>
				</div>
				
				<div class="clearfix">
					<div class="fl-l">
						<div class="clearfix pd10px-btm" id="sidebar_img_block">
						<img src="<?php echo DP_THEME_URI; ?>/inc/admin/img/2column_right_sidebar.png" id="sidebar_r_img" class="hiddenImg" />
						<img src="<?php echo DP_THEME_URI; ?>/inc/admin/img/2column_left_sidebar.png" id="sidebar_l_img" class="hiddenImg" />
						</div>
						<div class="pd14px-top">
							<input name="dp_column" id="dp_column2" type="radio" value="2" <?php if($options['dp_column'] === "2") echo "checked"; ?>  /><label for="dp_column2" class="mg12px-r"> 2カラム</label>
							<div class="mg10px-l mg10px-top">
								<select name="dp_theme_sidebar" id="dp_theme_sidebar" size="1" class="mg40px-up" style="width:120px;">
								<option value="left" <?php if($options['dp_theme_sidebar'] == 'left') echo "selected=\"selected\""; ?>>左サイドバー</option>
								<option value="right" <?php if($options['dp_theme_sidebar'] == 'right') echo "selected=\"selected\""; ?>>右サイドバー</option>
								</select>
							</div>
						</div>
				</div>
			
				<div class="fl-l">
					<div class="clearfix pd10px-btm" id="sidebar_img_block">
					<img src="<?php echo DP_THEME_URI; ?>/inc/admin/img/3column_right_sidebar.png" id="3column_right_sidebar_img" class="hiddenImg" />
					<img src="<?php echo DP_THEME_URI; ?>/inc/admin/img/3column_center_content.png" id="3column_center_content_img" class="hiddenImg" />
					<img src="<?php echo DP_THEME_URI; ?>/inc/admin/img/3column_left_sidebar.png" id="3column_left_sidebar_img" class="hiddenImg" />
					</div>
					<div class="pd14px-top">
						<input name="dp_column" id="dp_column3" type="radio" value="3" <?php if($options['dp_column'] === "3") echo "checked"; ?>  /><label for="dp_column3" class="mg12px-r"> 3カラム</label>
						<div class="mg10px-l mg10px-top">
							<select name="dp_theme_sidebar2" id="dp_theme_sidebar2" size="1" class="mg40px-up" style="width:120px;">
							<option value="left2" <?php if($options['dp_theme_sidebar2'] == 'left2') echo "selected=\"selected\""; ?>>左サイドバーx2</option>
							<option value="both" <?php if($options['dp_theme_sidebar2'] == 'both') echo "selected=\"selected\""; ?>>両サイドバー</option>
							<option value="right2" <?php if($options['dp_theme_sidebar2'] == 'right2') echo "selected=\"selected\""; ?>>右サイドバーx2</option>
							</select>
						</div>
					</div>
				</div>
				</div>
				<input name="dp_1column_only_top" class="cl-r" id="dp_1column_only_top" type="checkbox" value="true" <?php if($options['dp_1column_only_top']) echo "checked"; ?> /><label for="dp_1column_only_top">トップページのみ1カラム</label>
				</dd>
		</dl>
<!-- 保存ボタン -->
<p class="clear-fix">
<input class="btn btn-save" type="submit" name="dp_save_visual" value="<?php _e(' Save ', 'DigiPress'); ?>" />
</p>
</div>
<!--
========================================
テーマ選択ここまで
========================================
-->

<input class="btn close_all mg20px-btm" type="button" name="close_all" value="   <?php _e('Close All', 'DigiPress'); ?>   " />

<!--
========================================
ヘッダーデザインカスタマイズここから
========================================
-->
<h3 class="dp_h3 icon-menu">ヘッダーエリア設定</h3>
<div class="dp_box">
	<dl>
	<dt class="dp_set_title1 icon-bookmark">サイトヘッダー全体設定</dt>
	   <dd class="clearfix">
			<h3 class="dp_set_title2 icon-triangle-right">フローティングナビゲーションメニュー表示設定 :</h3>
				<div class="clearfix">
    			<div class="sample_img icon-camera mg25px-l fl-l">表示サンプル1
    			<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/floating_menu_color.png" /></div>

    			<div class="sample_img icon-camera mg25px-l fl-l">表示サンプル2
    			<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/floatingmenu_shadow.png" /></div>
    			</div>

    			<div class="mg25px-l mg25px-btm">
    				<table class="tbl-picker">
						<tr>
							<td>背景カラー :</td>
							<td>
								<input type="text" name="fixed_menu_color" value="<?php echo $fixed_menu_color; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['fixed_menu_color']; ?>" />
							</td>
						</tr>
						<tr>
							<td>メニューリンクカラー(通常) :</td>
							<td>
								<input type="text" name="fixed_menu_link_color" value="<?php echo $fixed_menu_link_color; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['fixed_menu_link_color']; ?>" />
							</td>
						</tr>
						<tr>
							<td>メニューリンクホバーカラー1 :</td>
							<td>
								<input type="text" name="fixed_menu_border_color1" value="<?php echo $fixed_menu_border_color1; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['fixed_menu_border_color1']; ?>" />
							</td>
						</tr>
						<tr>
							<td>メニューリンクホバーカラー2 :</td>
							<td>
								<input type="text" name="fixed_menu_border_color2" value="<?php echo $fixed_menu_border_color2; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['fixed_menu_border_color2']; ?>" />
							</td>
						</tr>
						<tr>
							<td>メニューリンクホバーカラー3 :</td>
							<td>
								<input type="text" name="fixed_menu_border_color3" value="<?php echo $fixed_menu_border_color3; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['fixed_menu_border_color3']; ?>" />
							</td>
						</tr>
						<tr>
							<td>メニューリンクホバーカラー4 :</td>
							<td>
								<input type="text" name="fixed_menu_border_color4" value="<?php echo $fixed_menu_border_color4; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['fixed_menu_border_color4']; ?>" />
							</td>
						</tr>
						<tr>
							<td>メニューリンクホバーカラー5 :</td>
							<td>
								<input type="text" name="fixed_menu_border_color5" value="<?php echo $fixed_menu_border_color5; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['fixed_menu_border_color5']; ?>" />
							</td>
						</tr>
						<tr>
							<td>シャドウの不透明度 :</td>
							<td>
								<input type="text" size=3 id="fixed_menu_shadow_opacity" name="fixed_menu_shadow_opacity" style="text-align:right;" value="<?php echo $options['fixed_menu_shadow_opacity']; ?>" /> % (0:透明　～ 100:不透明) 
							</td>
						</tr>
					</table>

    				<div class="slide-title icon-attention  mg18px-top"><?php _e('Note...', 'DigiPress'); ?></div>
    				<div class="slide-content">
    				※フローティングメニューのシャドウカラーは<span class="red">ブラック固定</span>です。シャドウの<span class="red">濃淡はパーセンテージで調整</span>してください()。<br />
    				※シャドウはInternet Explorer 8以下では反映されません。<br />
    				※<span class="red">テーマ標準の値に戻す場合</span>は、カラーコードまたは不透明度を<span class="red">「デフォルト」ボタンクリックして保存</span>してください。
    				</div>
    			</div>

				<!-- ヘッダーのフォントカラー -->
				<div class="mg25px-btm">
				<h3 id="set_hd_text_color" class="dp_set_title2 icon-triangle-right">テキスト／リンクカラー :</h3>
		  			<div class="sample_img icon-camera mg25px-l">
		  			対象エリア
		  			<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/header_paged_text_color.png" />
		  			</div>
		  			<div class="mg25px-l mg25px-btm">
		  				<table class="tbl-picker">
							<tr>
								<td>フォントカラー :</td>
								<td>
									<input type="text" name="header_paged_font_color" value="<?php echo $header_paged_font_color; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['header_paged_font_color']; ?>" />
								</td>
							</tr>
							<tr>
								<td>リンクカラー :</td>
								<td>
									<input type="text" name="header_paged_link_color" value="<?php echo $header_paged_link_color; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['header_paged_link_color']; ?>" />
								</td>
							</tr>
							<tr>
								<td>リンクカラー(ホバー時) :</td>
								<td>
									<input type="text" name="header_paged_link_hover_color" value="<?php echo $header_paged_link_hover_color; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['header_paged_link_hover_color']; ?>" />
								</td>
							</tr>
							<tr>
								<td>テキストシャドウカラー :</td>
								<td>
									<input type="text" name="header_paged_text_shadow" value="<?php echo $header_paged_text_shadow; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['header_paged_text_shadow']; ?>" />
								</td>
							</tr>
						</table>
		  				
		  				<div class="slide-title icon-attention  mg18px-top"><?php _e('Note...', 'DigiPress'); ?></div>
		  				<div class="slide-content">
		  				※トップページ以外のサイトヘッダーエリアのテキストとリンクが対象です。<br />
		  				※トップページでは、この設定以外にヘッダーイメージ上に表示するテキスト専用のフォントカラーの設定が行えます。詳細は「<span class="red">トップページ専用設定</span>」にて行ってください。<br />
		  				※<span class="red">テーマ標準のカラーに戻す場合</span>は、カラーピッカーにて<span class="red">「デフォルト」ボタンをクリックして保存</span>してください。<br />
		  				※<span class="red">テキストシャドウを表示しない場合は、「transparent」</span>と指定して保存してください。
		  				</div>
		  			</div>
			  	</div>
			  
				<!-- ヘッダー上部背景カラー -->
				<div class="mg25px-btm">
					<h3 class="dp_set_title2 icon-triangle-right">背景カラー／グラデーション :</h3>
						<div class="sample_img icon-camera mg25px-l">
						対象エリア
						<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/header_paged_gradient.png" />
						</div>
					
						<div class="mg25px-l mg25px-btm">
							<table class="tbl-picker">
								<tr>
									<td>開始カラー :</td>
									<td>
										<input type="text" name="header_top_gradient1" value="<?php echo $header_top_gradient1; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['header_top_gradient1']; ?>" />
									</td>
								</tr>
								<tr>
									<td>終了カラー :</td>
									<td>
										<input type="text" name="header_top_gradient2" value="<?php echo $header_top_gradient2; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['header_top_gradient2']; ?>" />
									</td>
								</tr>
							</table>
		  				
			  				<div class="slide-title icon-attention  mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
			  				<div class="slide-content">
			  				※トップページ以外のサイトヘッダーエリアの背景カラーが対象です。<br />
			  				※背景カラーを<span class="red">単色(非グラデーション)にする場合</span>は、開始カラーと終了カラーをそれぞれ<span class="red">同じカラーコード</span>にして保存してください。
			  				</div>
						</div>
				</div>

			<!-- ボックスシャドウ -->
			 <h3 class="dp_set_title2 icon-triangle-right">ヘッダーエリアのボックスシャドウ :</h3>
    			<div class="sample_img icon-camera mg25px-l">
    			表示サンプル
    			<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/header_box_shadow.png" />
    			</div>
    			<div class="mg25px-l mg25px-btm">
    				<table class="tbl-picker">
						<tr>
							<td>シャドウの不透明度 :</td>
							<td>
								<input type="text" size=3 id="header_area_shadow_opacity" name="header_area_shadow_opacity" size=8 style="text-align:right;" value="<?php echo $options['header_area_shadow_opacity']; ?>" /> % (0:透明　～ 100:不透明)
							</td>
						</tr>
					</table>

    				<div class="slide-title icon-attention "><?php _e('Note...', 'DigiPress'); ?></div>
    				<div class="slide-content">
    				※ヘッダーエリアのボックスシャドウカラーは<span class="red">ブラック固定</span>です。シャドウの<span class="red">濃淡はパーセンテージで調整</span>してください()。<br />
    				※シャドウはInternet Explorer 8以下では反映されません。<br />
    				※<span class="red">テーマ標準の値に戻す場合</span>は、不透明度を<span class="red">「デフォルト」ボタンクリックして保存</span>してください。
    				</div>
    			</div>
	
	<dt class="dp_set_title1 icon-bookmark">トップページ専用設定</dt>
	   <dd class="clearfix">
	   		<h3 id="set_hd_title" class="dp_set_title2 icon-triangle-right">サイトタイトル(H1)表示設定 :</h3>
			<div class="sample_img icon-camera mg25px-l">
				表示サンプル
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/h1_title.png" />
				</div>
				
				<div class="clearfix mg20px-btm mg15px-top mg20px-l">
					<div class="mg20px-btm">
	  				<input name="h1title_as_what" id="h1title_as_what1" type="radio" value="text" <?php if($options['h1title_as_what'] == 'text') echo "checked"; ?> />
	  				<label for="h1title_as_what1" id="h1title_as_what1" class="12px b">
	  				サイトタイトルをテキストで表示
	  				</label>
					
	  				<div id="h1title_as_text" class="mg20px-l mg12px-top">
	  					<table class="tbl-picker">
							<tr>
								<td>タイトルフォントカラー :</td>
								<td>
									<input type="text" name="header_toppage_h1_color" value="<?php echo $header_toppage_h1_color; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['header_toppage_h1_color']; ?>" />
								</td>
							</tr>
						</table>

	    				<div class="cl-a slide-title icon-attention "><?php _e('Note...', 'DigiPress'); ?></div>
	    				<div class="slide-content">
	    				※<span class="red">テーマ標準のカラーに戻す場合</span>は、カラーピッカーにて<span class="red">「デフォルト」ボタンをクリックして保存</span>してください。<br />
	    				※H1タグの<span class="red">サイトタイトル名を変更</span>する場合は、<span class="red">「詳細設定」→「サイトヘッダー表示設定」→"H1タグに表示するサイト名の変更"</span>オプションから変更してください。
	    				</div>

	  				</div>
	  				</div>
				
					<input name="h1title_as_what" id="h1title_as_what2" type="radio" value="image" <?php if($options['h1title_as_what'] == 'image') echo "checked"; ?> />
					<label for="h1title_as_what2" id="h1title_as_what2" class="12px b">
					サイトタイトルを画像で表示
					</label>
					
					<div id="h1title_as_image" class="box-c">
						<h3 class="dp_set_title2 icon-triangle-right pd24px-l">
						<a href="#upload" id="title_img_upload">タイトル画像をアップロード</a>
						</h3>
							
							<div class="mg25px-l mg25px-btm">
							アップロードメニューにジャンプします。<br />
							サイトタイトルのリンクを任意の画像で表示する場合は、こちらよりアップロードを行います。
							</div>
							
						<!-- タイトル画像一覧・選択 -->
						<div class="mg25px-btm">
							<h3 class="dp_set_title2 icon-triangle-right pd24px-l">タイトル画像選択 (トップページ用) :</h3>
								<div class="mg40px-l mg25px-btm">
								<div class="imgHover">
							<?php
							//Open image directory hundle
							if ($handle = opendir($upDir . '/title')) {
								echo '<ul class="clearfix thumb">';
								//Counter
								$cnt = 0;
								//Reading file
								while (false !== ($file = readdir($handle))) {
									if ($file != "." && $file != "..") {
										//Image file only
										if (preg_match($strPattern, $file)) {
											//Current Image
											if ($options['dp_title_img'] === $file) {
												$chk	= " checked";
											} else {
												$chk	= "";
											}

											echo '<li>
												  <div class="clearfix pd10px-btm">
												  <img src="' . DP_THEME_URI . '/img/_uploads/title/' . $file . '"  class="thumbImg" />
												  <img src="' . DP_THEME_URI . '/img/_uploads/title/' . $file . '" class="hiddenImg" />
												  </div>
												  <input name="dp_title_img" id="dp_title_img'.$cnt.'" type="radio" value="' . $file . '"' . $chk . ' />
												  <label for="dp_title_img'.$cnt.'">' . $file . '</label></li>';
											//count
											$cnt ++;
										}
									}
								}
								//Close hundle
								closedir($handle);
								echo '</ul>';
							}
							if ($cnt === 0) {
								echo '<p class="red">アップロードされたイメージはまだありません。</p>';
							}
							?>
								</div>
								</div>
						</div>

						<!-- タイトル画像一覧・選択 -->
						<div class="mg25px-btm">
							<h3 class="dp_set_title2 icon-triangle-right pd24px-l">タイトル画像選択 (トップページ以外) :</h3>
								<div class="mg40px-l mg25px-btm">
								<div class="imgHover">
							<?php
							//Open image directory hundle
							if ($handle = opendir($upDir . '/title')) {
								echo '<ul class="clearfix thumb">';
								//Counter
								$cnt = 0;
								//Reading file
								while (false !== ($file = readdir($handle))) {
									if ($file != "." && $file != "..") {
										//Image file only
										if (preg_match($strPattern, $file)) {
											//Current Image
											if ($options['dp_title_img_paged'] === $file) {
												$chk	= " checked";
											} else {
												$chk	= "";
											}

											echo '<li>
												  <div class="clearfix pd10px-btm">
												  <img src="' . DP_THEME_URI . '/img/_uploads/title/' . $file . '"  class="thumbImg" />
												  <img src="' . DP_THEME_URI . '/img/_uploads/title/' . $file . '" class="hiddenImg" />
												  </div>
												  <input name="dp_title_img_paged" id="dp_title_img_paged'.$cnt.'" type="radio" value="' . $file . '"' . $chk . ' />
												  <label for="dp_title_img_paged'.$cnt.'">' . $file . '</label></li>';
											//count
											$cnt ++;
										}
									}
								}
								//Close hundle
								closedir($handle);
								echo '</ul>';
							}
							if ($cnt === 0) {
								echo '<p class="red">アップロードされたイメージはまだありません。</p>';
							}
							?>
								</div>
								</div>
						</div>

						<!-- タイトル画像一覧・選択 -->
						<div class="mg25px-btm">
							<h3 class="dp_set_title2 icon-triangle-right pd24px-l">タイトル画像選択 (モバイル用) :</h3>
								<div class="mg40px-l mg25px-btm">
								<div class="imgHover">
							<?php
							//Open image directory hundle
							if ($handle = opendir($upDir . '/title')) {
								echo '<ul class="clearfix thumb">';
								//Counter
								$cnt = 0;
								//Reading file
								while (false !== ($file = readdir($handle))) {
									if ($file != "." && $file != "..") {
										//Image file only
										if (preg_match($strPattern, $file)) {
											//Current Image
											if ($options['dp_title_img_mobile'] === $file) {
												$chk	= " checked";
											} else {
												$chk	= "";
											}

											echo '<li>
												  <div class="clearfix pd10px-btm">
												  <img src="' . DP_THEME_URI . '/img/_uploads/title/' . $file . '"  class="thumbImg" />
												  <img src="' . DP_THEME_URI . '/img/_uploads/title/' . $file . '" class="hiddenImg" />
												  </div>
												  <input name="dp_title_img_mobile" id="dp_title_img_mobile'.$cnt.'" type="radio" value="' . $file . '"' . $chk . ' />
												  <label for="dp_title_img_mobile'.$cnt.'">' . $file . '</label></li>';
											//count
											$cnt ++;
										}
									}
								}
								//Close hundle
								closedir($handle);
								echo '</ul>';
							}
							if ($cnt === 0) {
								echo '<p class="red">アップロードされたイメージはまだありません。</p>';
							}
							?>
								</div>
								</div>
						</div>

					<div class="slide-title icon-attention "><?php _e('Note...', 'DigiPress'); ?></div>
					<div class="slide-content">
					※トップページは画像の上に表示されるため、トップページ専用とそれ以外の場合に分けてタイトル画像を指定してください。<br />
					※タイトル用の画像のサイズは「<span class="red b">180(縦) x 600(横)ピクセル</span>」(実表示の2倍 = 高精度ディスプレイ対策)を目安としたサイズを用意してください(表示上は90ピクセル(縦)を基準としてリサイズされます)。<br />
					※背景色がグラデーションの場合、<span class="red">PNGまたはGIF形式の透過画像</span>をアップロードしてください。
					</div>
				 </div>
			</div>


			<h3 class="dp_set_title2 icon-triangle-right pd18px-top">テキスト表示設定 : </h3>
			<div class="mg25px-l mg25px-btm">
				<div class="sample_img icon-camera">
				表示サンプル
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/header_top_text_color.png" />
				</div>
				
				<table class="tbl-picker">
					<tr>
						<td>フォントカラー :</td>
						<td>
							<input type="text" name="header_toppage_font_color" value="<?php echo $header_toppage_font_color; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['header_toppage_font_color']; ?>" />
						</td>
					</tr>
					<tr>
						<td>テキストシャドウカラー :</td>
						<td>
							<input type="text" name="header_toppage_text_shadow_color" value="<?php echo $header_toppage_text_shadow_color; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['header_toppage_text_shadow_color']; ?>" />
						</td>
					</tr>
				</table>

				<div class="cl-a slide-title icon-attention  mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※トップページのヘッダーエリアのH2テキストや、サイト説明文などのテキストとリンクカラーに反映されます。<br />
				※<span class="red">テーマ標準のカラーに戻す場合</span>は、カラーピッカーにて<span class="red">「デフォルト」ボタンをクリックして保存</span>してください。<br />
				※<span class="red">テキストシャドウを表示しない場合は、「transparent」</span>と指定して保存してください。
				</div>
			</div>

			<!-- 背景カラー設定 -->
			<h3 class="dp_set_title2 icon-triangle-right pd18px-top">タイトル領域背景カラー設定 :</h3>
			<div class="sample_img icon-camera mg25px-l">
			表示サンプル
			<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/header_top_title_bgcolor.png" />
			</div>
			<div class="mg25px-l mg15px-btm">
				<div class="clearfix pd12px-btm ">
				<input type="checkbox" id="show_bgcolor_in_header_title" name="show_bgcolor_in_header_title" value="true" <?php if ($options['show_bgcolor_in_header_title']) echo 'checked'; ?> />
				<label for="show_bgcolor_in_header_title"> 背景カラーを表示</label>
				</div>

				<div id="header_title_bgcolor_div" class="mg20px-l">
					<table class="tbl-picker">
						<tr>
							<td>背景カラー :</td>
							<td>
								<input type="text" name="header_title_bgcolor" value="<?php echo $header_title_bgcolor; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['header_title_bgcolor']; ?>" />
							</td>
						</tr>
						<tr>
							<td>背景カラーの不透明度 :</td>
							<td>
								<input type="text" size=3 id="header_title_bg_opacity" name="header_title_bg_opacity" style="text-align:right;" value="<?php echo $options['header_title_bg_opacity']; ?>" /> % (0:透明　～ 100:不透明)
							</td>
						</tr>
					</table>
				</div>

				<div class="slide-title icon-attention "><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※トップページのサイト名(H1)、サブフレーズ(H2)、およびその下に表示されるサイト説明文を含む領域の背景カラーを指定するときにこのオプションを使用できます。<br />
				※トップページのヘッダー画像と同化してタイトルなどが見にくい場合には、タイトル領域の背景カラーを有効にすることで視認性が向上します。
				</div>
			</div>

			<!-- ヘッダーコンテンツサイズ -->
			<h3 class="dp_set_title2 icon-triangle-right pd18px-top">ヘッダーエリアサイズ設定 :</h3>
			<div class="sample_img icon-camera mg25px-l">
			表示サンプル
			<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/header_area_half.png" />
			</div>
			<div class="mg25px-l mg25px-btm">
				<div class="clearfix pd12px-btm ">
				<input type="checkbox" id="header_area_low_height" name="header_area_low_height" value="true" <?php if ($options['header_area_low_height']) echo 'checked'; ?> />
				<label for="header_area_low_height"> ハーフサイズ表示</label>
				</div>

				<div class="slide-title icon-attention "><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※このオプションを有効にすると、トップページにおけるヘッダーエリアのコンテンツスペースの<span class="red">高さが規定値(616px)の半分(308px)</span>になります。
				</div>
			</div>
		</dd>

	<!-- パンクズリストエリア -->
    <dt class="dp_set_title1 icon-bookmark">パンくずリストエリア設定</dt>
	   <dd class="clearfix pd20px-btm">
	   		<div class="sample_img icon-camera">
			表示サンプル
			<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/breadcrumb_color.png" />
			</div>

			<h3 class="dp_set_title2 icon-triangle-right pd18px-top">テキスト表示設定 : </h3>
			<div class="mg25px-l mg25px-btm">
				<table class="tbl-picker">
					<tr>
						<td>フォントカラー :</td>
						<td>
							<input type="text" name="header_breadcrumb_font_color" value="<?php echo $header_breadcrumb_font_color; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['header_breadcrumb_font_color']; ?>" />
						</td>
					</tr>
					<tr>
						<td>テキストシャドウカラー :</td>
						<td>
							<input type="text" name="header_breadcrumb_text_shadow" value="<?php echo $header_breadcrumb_text_shadow; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['header_breadcrumb_text_shadow']; ?>" />
						</td>
					</tr>
				</table>

				<div class="cl-a slide-title icon-attention  mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※<span class="red">テーマ標準のカラーに戻す場合</span>は、カラーピッカーにて<span class="red">「デフォルト」ボタンをクリックして保存</span>してください。<br />
				※<span class="red">テキストシャドウを表示しない場合は、「transparent」</span>と指定して保存してください。
				</div>
			</div>

  			<h3  class="dp_set_title2 icon-triangle-right">背景カラー／グラデーション :</h3>
  				<div class="mg25px-l mg25px-btm">
  					<table class="tbl-picker">
						<tr>
							<td>開始カラー :</td>
							<td>
								<input type="text" name="header_bottom_gradient1" value="<?php echo $header_bottom_gradient1; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['header_bottom_gradient1']; ?>" />
							</td>
						</tr>
						<tr>
							<td>終了カラー :</td>
							<td>
								<input type="text" name="header_bottom_gradient2" value="<?php echo $header_bottom_gradient2; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['header_bottom_gradient2']; ?>" />
							</td>
						</tr>
					</table>
	  				
	  				<div class="cl-a slide-title icon-attention  mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
	  				<div class="slide-content">
	  				※パンくずリストが表示される領域の背景カラーまたはグラデーションカラーを指定します。<br />
	  				※背景カラーを<span class="red">単色(非グラデーション)にする場合</span>は、開始カラーと終了カラーをそれぞれ<span class="red">同じカラーコードに</span>して保存してください。<br />
	  				※<span class="red">テーマ標準のグラデーションカラーに戻す場合</span>は、カラーピッカーにて<span class="red">「デフォルト」ボタンをクリックして保存</span>してください。<br />
	  				</div>
  				</div>
		</dd>
	</dl>
<!-- 保存ボタン -->
<p class="clear-fix">
<input class="btn btn-save" type="submit" name="dp_save_visual" value="<?php _e(' Save ', 'DigiPress'); ?>" />
</p>
</div>
<!--
========================================
ヘッダーデザインカスタマイズここまで
========================================
-->

<input class="btn close_all mg20px-btm" type="button" name="close_all" value="   <?php _e('Close All', 'DigiPress'); ?>   " />

<!--
========================================
ヘッダーイメージ/コンテンツ設定ここから
========================================
-->
<h3 class="dp_h3 icon-menu" id="header_contents">ヘッダー画像／コンテンツカスタマイズ</h3>
<div class="dp_box" id="header_custom">
	<dl>
		<dt class="dp_set_title1 icon-bookmark">コンテンツタイプ :</dt>
			<dd>
			<div class="sample_img icon-camera">
			対象エリア
			<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/header_content_area.png" />
			</div>
			
			<div class="mg25px-btm">
				<div class="mg10px-btm">
				<input name="dp_header_content_type" id="dp_header_content_type1" type="radio" value="1" <?php if($options['dp_header_content_type'] == "1") echo "checked"; ?> />
				<label for="dp_header_content_type1" class="mg20px-r b">
				ヘッダー画像の静止画表示
				</label>
				</div>

			<div id="header_banner_settings" class="box-c">
			<h3 class="dp_set_title2 icon-triangle-right">
			<a href="#upload" id="header_img_upload">ヘッダー画像をアップロード</a>
			</h3>
				
				<div class="mg25px-l mg25px-btm">
				アップロードメニューにジャンプします。<br />
				オリジナルのヘッダー画像を使用する場合は、こちらよりアップロードを行います。
				</div>

			<!-- ヘッダー画像一覧・選択 -->
			<h3 class="dp_set_title2 icon-triangle-right">ヘッダー画像選択 :</h3>
				<div class="mg25px-l mg25px-btm">
				 サイトのヘッダー領域におけるヘッダー画像、またはスライドショーの有無を選択できます。
				<div class="imgHover">
			<?php
			//Open image directory hundle
			if ($handle = opendir($upDir . '/header')) {
				echo '<ul class="clearfix thumb">';
				//Counter
				$cnt = 0;
				//Reading file
				while (false !== ($file = readdir($handle))) {
					if ($file != "." && $file != "..") {
						//Image file only
						if (preg_match($strPattern, $file)) {
							//Current Image
							if ($options['dp_header_img'] === $file) {
								$chk	= " checked";
							} else {
								$chk	= "";
							}

							echo '<li>
								  <div class="clearfix pd10px-btm">
								  <img src="' . DP_THEME_URI . '/img/_uploads/header/' . $file . '"  class="thumbBannerImg_crop" />
								  <img src="' . DP_THEME_URI . '/img/_uploads/header/' . $file . '" class="hiddenImg" />
								  </div>
								  <input name="dp_header_img" id="dp_header_img'.$cnt.'" type="radio" value="' . $file . '"' . $chk . ' />
								  <label for="dp_header_img'.$cnt.'">' . $file . '</label></li>';
							//count
							$cnt ++;
						}
					}
				}
				//Close hundle
				closedir($handle);
				
				$chkRandom = "";
				$chkNothing = "";
				if ($options['dp_header_img'] == 'random') {
					$chkRandom	= " checked='checked'";
				} else if (($options['dp_header_img'] == '') || ($options['dp_header_img'] == 'none') ) {
					$chkNothing	= " checked='checked'";
				}
				echo '</ul>';
				echo '<ul class="mg30px-top clearfix">'.
					 '<li class="fl-l"><input name="dp_header_img" id="dp_header_img_random" type="radio" value="random" '.$chkRandom.' /><span class="ft12px b pd15px-r"><label for="dp_header_img_random"> ヘッダー画像をランダム表示</label></span></li>
					<li class="fl-l"><input name="dp_header_img" id="dp_header_img_none" type="radio" value="none" '.$chkNothing.' /><label for="dp_header_img_none"> なし(標準ヘッダー画像)</label></li></ul>';
			}
			if ($cnt === 0) {
				echo '<p class="red">アップロードされたイメージはまだありません。</p>';
			}
			?>
				</div>
				</div>


			<!-- ヘッダー画像表示方法 -->
			<h3 class="dp_set_title2 icon-triangle-right">ヘッダー画像の表示方法 :</h3>
			<div class="mg25px-l mg25px-btm">
				<input name="dp_header_repeat" id="dp_header_repeat1" type="radio" value="repeat-x" <?php if($options['dp_header_repeat'] === 'repeat-x') echo "checked"; ?> />
				<label for="dp_header_repeat1" class="ft12px"> 平行(横)方向に繰り返し</label>
				
				<input name="dp_header_repeat" id="dp_header_repeat2" type="radio" value="repeat-y" <?php if($options['dp_header_repeat'] === 'repeat-y') echo "checked"; ?> />
				<label for="dp_header_repeat2" class="ft12px"> 垂直(縦)方向に繰り返し</label>

				<input name="dp_header_repeat" id="dp_header_repeat3" type="radio" value="repeat" <?php if($options['dp_header_repeat'] === 'repeat') echo "checked"; ?> />
				<label for="dp_header_repeat3" class="ft12px"> 全方向(縦・横)に繰り返し</label>
				
				<input name="dp_header_repeat" id="dp_header_repeat4" type="radio" value="no-repeat" <?php if($options['dp_header_repeat'] === 'no-repeat') echo "checked"; ?> />
				<label for="dp_header_repeat4" class="ft12px"> 繰り返しなし(固定表示)</label>

				<div class="cl-a slide-title icon-attention  mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※<span class="red">平行方向</span>に繰り返して表示する画像の<span class="red">最適な高さは「616px(ハーフサイズモードの場合は308px)」</span>です。
				</div>

				<div class="mg20px-top">
					<input name="dp_header_img_fixed" id="dp_header_img_fixed" type="checkbox" value="true" <?php if($options['dp_header_img_fixed']) echo "checked"; ?> />
					<label for="dp_header_img_fixed" class="mg20px-r b"> スクロール時もヘッダー画像の位置を固定する</label>
				</div>
			</div>
			</div>
				
			<div class="clearfix mg10px-btm">
				<input name="dp_header_content_type" id="dp_header_content_type2" type="radio" value="2" <?php if($options['dp_header_content_type'] == "2") echo "checked"; ?> />
				<label for="dp_header_content_type2" class="mg20px-r b">
				新着記事またはヘッダー画像のスライドショー
				</label>
				
				<div id="slideshow_settings" class="box-c pd20px-btm">
				<div class="clearfix">
				<ul>
				<li class="mg24px-btm" style="position:relative;">表示対象 : 
					<div style="position:absolute;left:160px;top:0;">
					<input type="radio" name="dp_slideshow_type" id="dp_slideshow_type1" type="radio" value="post" <?php if($options['dp_slideshow_type'] === 'post') echo "checked"; ?> />
					<label for="dp_slideshow_type1" class="mg20px-r">記事 (指定した記事のみ)</label>

					<input type="radio" name="dp_slideshow_type" id="dp_slideshow_type2" type="radio" value="header_img" <?php if($options['dp_slideshow_type'] === 'header_img') echo "checked"; ?> />
					<label for="dp_slideshow_type2">ヘッダー画像</label>
				</div>
				</li>

				<li class="mg24px-btm" style="position:relative;">最大表示数 : 
				<div style="position:absolute;left:160px;top:0;">
					<select name="dp_number_of_slideshow" id="dp_number_of_slideshow" size="1" style="width:90px;">
					<option value='3' <?php if($options['dp_number_of_slideshow'] == '3') echo "selected=\"selected\""; ?>>～3記事</option>
					<option value='4' <?php if($options['dp_number_of_slideshow'] == '4') echo "selected=\"selected\""; ?>>～4記事</option>
					<option value='5' <?php if($options['dp_number_of_slideshow'] == '5') echo "selected=\"selected\""; ?>>～5記事</option>
					<option value='6' <?php if($options['dp_number_of_slideshow'] == '6') echo "selected=\"selected\""; ?>>～6記事</option>
					<option value="7" <?php if($options['dp_number_of_slideshow'] == '7') echo "selected=\"selected\""; ?>>～7記事</option>
					<option value='8' <?php if($options['dp_number_of_slideshow'] == '8') echo "selected=\"selected\""; ?>>～8記事</option>
					<option value="9" <?php if($options['dp_number_of_slideshow'] == '9') echo "selected=\"selected\""; ?>>～9記事</option>
					<option value="10" <?php if($options['dp_number_of_slideshow'] == '10') echo "selected=\"selected\""; ?>>～10記事</option>
					</select>
				</div>
				</li>
				
				<li class="mg24px-btm" style="position:relative;">スライドショー表示順序 : 
				<div style="position:absolute;left:160px;top:0;">
					<select name="dp_slideshow_order" id="dp_slideshow_order" style="width:300px;">
						<option value='date' <?php if($options['dp_slideshow_order'] == 'date') echo "selected=\"selected\""; ?>>投稿日付順 (ヘッダー画像の場合は名前順)</option>
						<option value='random' <?php if($options['dp_slideshow_order'] == 'random') echo "selected=\"selected\""; ?>>ランダム</option>
					</select>
				</div>
				</li>
				
				<li class="mg24px-btm" style="position:relative;">
				スライドエフェクト : 
				<div style="position:absolute;left:160px;top:0;">
				<select name="dp_slideshow_effect" id="dp_slideshow_effect" size="1" style="width:168px;">
					<option value='none' <?php if($options['dp_slideshow_effect'] == 'none') echo "selected=\"selected\""; ?>>なし</option>
					<option value='fade' <?php if($options['dp_slideshow_effect'] == 'fade') echo "selected=\"selected\""; ?>>フェード</option>
					<option value='simpleSlide' <?php if($options['dp_slideshow_effect'] == 'simpleSlide') echo "selected=\"selected\""; ?>>並べてスライド</option>
					<option value='superSlide' <?php if($options['dp_slideshow_effect'] == 'superSlide') echo "selected=\"selected\""; ?>>重ねてスライド</option>
				</select>
				</div>
				</li>

				<li class="mg24px-btm" style="position:relative;">
				トランジション時間 : 
				<div style="position:absolute;left:160px;top:-6px;">
				<input type="text" size=8 name="dp_slideshow_transition_time" id="dp_slideshow_transition_time" value="<?php echo $options['dp_slideshow_transition_time']; ?>" style="text-align:right;" /> ミリ秒 (1秒 = 1000)
				</div>
				</li>
				
				<li class="mg24px-btm" style="position:relative;">
				スライド間隔 : 
				<div style="position:absolute;left:160px;top:-6px;">
				<input type="text" size=8 name="dp_slideshow_speed" id="dp_slideshow_speed" value="<?php echo $options['dp_slideshow_speed']; ?>" style="text-align:right;" /> ミリ秒 (1秒 = 1000)
				</div>
				</li>
				
				<li class="mg24px-btm" style="position:relative;">
				スライド方向 : 
				<div style="position:absolute;left:160px;top:0;">
				<select name="dp_slideshow_direction" id="dp_slideshow_direction" size="1" style="width:168px;">
					<option value='W' <?php if($options['dp_slideshow_direction'] == 'W') echo "selected=\"selected\""; ?>>左方向</option>
					<option value='E' <?php if($options['dp_slideshow_direction'] == 'E') echo "selected=\"selected\""; ?>>右方向</option>
					<option value='N' <?php if($options['dp_slideshow_direction'] == 'N') echo "selected=\"selected\""; ?>>上方向</option>
					<option value='S' <?php if($options['dp_slideshow_direction'] == 'S') echo "selected=\"selected\""; ?>>下方向</option>
					<option value='NW' <?php if($options['dp_slideshow_direction'] == 'NW') echo "selected=\"selected\""; ?>>左上方向</option>
					<option value='SW' <?php if($options['dp_slideshow_direction'] == 'SW') echo "selected=\"selected\""; ?>>左下方向</option>
					<option value='NE' <?php if($options['dp_slideshow_direction'] == 'NE') echo "selected=\"selected\""; ?>>右上方向</option>
					<option value='SE' <?php if($options['dp_slideshow_direction'] == 'SE') echo "selected=\"selected\""; ?>>右下方向</option>
				</select>
				</div>
				</li>
				</ul>
				</div>

					<div class="mg20px-btm">
						<div class="cl-a slide-title icon-attention "><?php _e('Note...', 'DigiPress'); ?></div>
						<div class="slide-content">
						※スライドショーの対象とする記事は、記事<span class="red">投稿画面のオプション項目</span>にて、記事ごとに指定できます。<br />
						※スライドショー用の画像を<span class="red">個別に指定またはアップロード</span>するには、記事<span class="red">投稿画面からWordPressのアップローダーと連携して記事ごとに直接行う</span>ことができます。<br />
						※「記事のタイトルリンクと概要」をチェックした場合、イメージのみの表示になります。非公開の<span class="red">ダミー記事にスライドショーイメージを指定し、スライドショー表示対象として投稿</span>することで、完全なイメージのみのスライドショーとすることができます。
						<span class="point_blue">スライドショーに使用する画像は、以下の優先順位によって決められます。</span>
							<div class="box-c">
							<span class="ft12px">
							1. 投稿画面のオプション項目にて指定またはアップロードした<span class="red">スライドショー用の画像</span>（任意）</span><br />
							<span class="ft12px">
							2. 記事にアイキャッチ画像が設定されている場合は、その<span class="red">記事のアイキャッチ画像</span></span><br />
							<span class="ft12px">
							3. 記事に画像(imgタグ)が挿入されている場合は、最初に見つかった<span class="red">記事内の画像</span></span><br />
							<span class="ft12px">
							4. 記事にアイキャッチも画像もない場合は、DigiPressテーマが<span class="red">ランダムに選択したスライド用画像</span></span>
							</div>
						</div>
					</div>

				</div>
			</dd>
	</dl>

<!-- 保存ボタン -->
<p class="clear-fix">
<input class="btn btn-save" type="submit" name="dp_save_visual" value="<?php _e(' Save ', 'DigiPress'); ?>" />
</p>
</div>
<!--
========================================
ヘッダーイメージ/コンテンツ設定ここまで
========================================
-->

<input class="btn close_all mg20px-btm" type="button" name="close_all" value="   <?php _e('Close All', 'DigiPress'); ?>   " />

<!--
========================================
テーマ基本フォントカスタマイズここから
========================================
-->
<h3 class="dp_h3 icon-menu">基本テキスト設定</h3>
<div class="dp_box">
	<dl>
			<!-- テーマ基本カラー設定 -->
			<dt class="dp_set_title1 icon-bookmark">基本フォント設定 :</dt>
				<dd>
					<table class="tbl-picker">
						<tr>
							<td>フォントカラー :</td>
							<td>
								<input type="text" name="base_font_color" value="<?php echo $base_font_color; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['base_font_color']; ?>" />
							</td>
						</tr>
						<tr>
							<td>テキストシャドウカラー :</td>
							<td>
								<input type="text" name="base_text_shadow_color" value="<?php echo $base_text_shadow_color; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['base_text_shadow_color']; ?>" />
							</td>
						</tr>
						<tr>
							<td>フォントサイズ :</td>
							<td>
								<input type="text" size=4 class="fl-l mg10px-r" style="text-align:right;" id="base_font_size" name="base_font_size" value="<?php echo $options['base_font_size']; ?>" />
								<div class="fl-l pd20px-r pd5px-top">
		  				  			<input name="base_font_size_unit" id="base_font_size_unit1" type="radio" value="px" <?php if($options['base_font_size_unit'] === 'px') echo "checked"; ?> />
		  							<label for="base_font_size_unit1">px</label>
		  						</div>
		  						<div class="pd5px-top fl-l">
		  				  			<input name="base_font_size_unit" id="base_font_size_unit2" type="radio" value="em" <?php if($options['base_font_size_unit'] === 'em') echo "checked"; ?> />
		  				  			<label for="base_font_size_unit2">em</label>
		  						</div>
							</td>
						</tr>
					</table>

					<div class="cl-a slide-title icon-attention "><?php _e('Note...', 'DigiPress'); ?></div>
					<div class="slide-content">
					※記事本文など、サイト(テーマ)上で表示されるあらゆるテキストのフォントが対象です。<br />
					※フォントサイズは、<span class="red">半角数字のみ</span>で入力してください。<br />
					※<span class="red">テーマ標準のカラーに戻す場合</span>は、カラーピッカーにて<span class="red">「デフォルト」ボタンをクリックして保存</span>してください。
					</div>
				</dd>
				
			<!-- テーマ基本リンク設定 -->
			<dt class="dp_set_title1 icon-bookmark">基本リンク設定 :</dt>
				<dd>
					<table class="tbl-picker">
						<tr>
							<td>リンクスタイル :</td>
							<td>
								<div class="pd10px-btm">
									<input name="base_link_underline" id="base_link_underline1" type="radio" value="1" <?php if($options['base_link_underline'] === '1') echo "checked"; ?> /><label for="base_link_underline1">アンダーラインなし (※ホバー時のみ表示)</label>
								</div>
								<div class="pd10px-btm">
									<input name="base_link_underline" id="base_link_underline2" type="radio" value="2" <?php if($options['base_link_underline'] === '2') echo "checked"; ?> /><label for="base_link_underline2">アンダーラインあり</label>
								</div>
								<div class="pd10px-btm">
									<input type="checkbox" id="base_link_bold" name="base_link_bold" value="true" <?php if($options['base_link_bold'] === 'true') echo "checked"; ?> /><label for="base_link_bold">ボールド(太字)</label>
								</div>
							</td>
						</tr>
						<tr>
							<td>リンクカラー :</td>
							<td>
								<input type="text" name="base_link_color" value="<?php echo $base_link_color; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['base_link_color']; ?>" />
							</td>
						</tr>
						<tr>
							<td>リンクカラー(ホバー時) :</td>
							<td>
								<input type="text" name="base_link_hover_color" value="<?php echo $base_link_hover_color; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['base_link_hover_color']; ?>" />
							</td>
						</tr>
					</table>
					
					<div class="cl-a slide-title icon-attention  mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
					<div class="slide-content">
					※記事本文など、サイト(テーマ)上で表示される基本のリンクカラーが対象です。<br />
					※アンダーラインをなしにした場合は、ホバー時にアンダーラインが表示されます。<br />
					※<span class="red">テーマ標準のカラーに戻す場合</span>は、カラーピッカーにて<span class="red">「デフォルト」ボタンをクリックして保存</span>してください。
					</div>
				</dd>
				
			<dt class="dp_set_title1 icon-bookmark">基本タイトルカラー :</dt>
				<dd>
					<div class="sample_img icon-camera mg15px-l">
					表示サンプル
					<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/common_title_color.png" />
					</div>

					<table class="tbl-picker">
						<tr>
							<td>タイトルテキストカラー :</td>
							<td>
								<input type="text" name="common_title_color" value="<?php echo $common_title_color; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['common_title_color']; ?>" />
							</td>
						</tr>
					</table>
					
					<div class="cl-a slide-title icon-attention "><?php _e('Note...', 'DigiPress'); ?></div>
					<div class="slide-content">
					※記事タイトル、ウィジェットタイトル、記事内のHタグなど、サイト(テーマ)上で表示される一般的な見出しタイトルの背景グラデーションと、タイトルテキストのカラーが対象です。<br />
					※<span class="red">テーマ標準のカラーに戻す場合</span>は、カラーピッカーにて<span class="red">「デフォルト」ボタンをクリックして保存</span>してください。
					</div>
				</dd>				
		</dl>

<!-- 保存ボタン -->
<p class="clear-fix">
<input class="btn btn-save" type="submit" name="dp_save_visual" value="<?php _e(' Save ', 'DigiPress'); ?>" />
</p>
</div>
<!--
========================================
テーマ基本フォントカスタマイズここまで
========================================
-->

<input class="btn close_all mg20px-btm" type="button" name="close_all" value="   <?php _e('Close All', 'DigiPress'); ?>   " />

<!--
========================================
フッターデザインカスタマイズここから
========================================
-->
<h3 class="dp_h3 icon-menu">フッターエリア設定</h3>
<div class="dp_box">
	<dl>
		<dt class="dp_set_title1 icon-bookmark">コンテナ下部ウィジェットエリア設定</dt>
			<dd class="clearfix pd20px-btm">
				<div class="sample_img icon-camera">
				表示サンプル
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/footer_container_widget.png" />
				</div>


				<h3 class="dp_set_title2 icon-triangle-right pd18px-top">テキスト表示設定 : </h3>
				<div class="mg25px-l mg25px-btm">
					<table class="tbl-picker">
						<tr>
							<td>フォントカラー :</td>
							<td>
								<input type="text" name="container_bottom_font_color" value="<?php echo $container_bottom_font_color; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['container_bottom_font_color']; ?>" />
							</td>
						</tr>
						<tr>
							<td>テキストシャドウカラー :</td>
							<td>
								<input type="text" name="container_bottom_text_shadow" value="<?php echo $container_bottom_text_shadow; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['container_bottom_text_shadow']; ?>" />
							</td>
						</tr>
					</table>

					<div class="cl-a slide-title icon-attention  mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
					<div class="slide-content">
					※テキストシャドウは、<span class="red">Internet Explorerでは無効</span>です。<br />
					※<span class="red">テキストシャドウを表示しない場合は、「transparent」</span>と指定して保存してください。<br />
					※<span class="red">テーマ標準のカラーに戻す場合</span>は、カラーピッカーにて<span class="red">「デフォルト」ボタンをクリックして保存</span>してください。
					</div>
				</div>

	  			<h3  class="dp_set_title2 icon-triangle-right">背景カラー／グラデーション :</h3>
	  				<div class="mg25px-l">
	  					<table class="tbl-picker">
							<tr>
								<td>開始カラー :</td>
								<td>
									<input type="text" name="container_bottom_gradient1" value="<?php echo $container_bottom_gradient1; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['container_bottom_gradient1']; ?>" />
								</td>
							</tr>
							<tr>
								<td>終了カラー :</td>
								<td>
									<input type="text" name="container_bottom_gradient2" value="<?php echo $container_bottom_gradient2; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['container_bottom_gradient2']; ?>" />
								</td>
							</tr>
						</table>
		  				
		  				<div class="cl-a slide-title icon-attention  mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
		  				<div class="slide-content">
		  				※コンテナエリアの最下部スペースの背景カラーまたはグラデーションカラーを指定します。<br />
		  				※背景カラーを<span class="red">単色(非グラデーション)にする場合</span>は、開始カラーと終了カラーをそれぞれ<span class="red">同じカラーコードに</span>して保存してください。<br />
		  				※<span class="red">テーマ標準のグラデーションカラーに戻す場合</span>は、カラーピッカーにて<span class="red">「デフォルト」ボタンをクリックして保存</span>してください。<br />
		  				</div>
	  				</div>
			</dd>

		<!-- フッターエリアカラー設定 -->
		<dt class="dp_set_title1 icon-bookmark">フッターエリア設定 :</dt>
			<dd class="clearfix pd10px-btm">
			<div class="sample_img icon-camera">
			表示サンプル
			<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/footer_color.png" />
			</div>

			<h3 class="dp_set_title2 icon-triangle-right">テキスト表示設定 :</h3>
	
			<div class="mg25px-l">
				<table class="tbl-picker">
					<tr>
						<td>フォントカラー :</td>
						<td>
							<input type="text" name="footer_text_color" value="<?php echo $footer_text_color; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['footer_text_color']; ?>" />
						</td>
					</tr>
					<tr>
						<td>テキストシャドウカラー :</td>
						<td>
							<input type="text" name="footer_text_shadow_color" value="<?php echo $footer_text_shadow_color; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['footer_text_shadow_color']; ?>" />
						</td>
					</tr>
					<tr>
						<td>リンクカラー :</td>
						<td>
							<input type="text" name="footer_link_color" value="<?php echo $footer_link_color; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['footer_link_color']; ?>" />
						</td>
					</tr>
					<tr>
						<td>リンクカラー(ホバー時) :</td>
						<td>
							<input type="text" name="footer_link_hover_color" value="<?php echo $footer_link_hover_color; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['footer_link_hover_color']; ?>" />
						</td>
					</tr>
				</table>

				<div class="cl-a slide-title icon-attention "><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※テキストシャドウは、<span class="red">Internet Explorerでは無効</span>です。<br />
				※テキストシャドウを表示しない場合は、「transparent」と指定して保存してください。<br />
				※<span class="red">テーマ標準のカラーに戻す場合</span>は、カラーピッカーにて<span class="red">「デフォルト」ボタンをクリックして保存</span>してください。
				</div>
			</div>


			<h3  class="dp_set_title2 icon-triangle-right mg35px-top">背景カラー／グラデーション :</h3>
  				<div class="mg25px-l mg20px-btm">
  					<table class="tbl-picker">
						<tr>
							<td>開始カラー :</td>
							<td>
								<input type="text" name="footer_gradient1" value="<?php echo $footer_gradient1; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['footer_gradient1']; ?>" />
							</td>
						</tr>
						<tr>
							<td>終了カラー :</td>
							<td>
								<input type="text" name="footer_gradient2" value="<?php echo $footer_gradient2; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['footer_gradient2']; ?>" />
							</td>
						</tr>
					</table>

	  				<div class="cl-a slide-title icon-attention "><?php _e('Note...', 'DigiPress'); ?></div>
		  			<div class="slide-content">
		  			※サイトフッター領域の背景カラーまたはグラデーションカラーを指定します。<br />
		  			※背景カラーを<span class="red">単色(非グラデーション)にする場合</span>は、開始カラーと終了カラーをそれぞれ<span class="red">同じカラーコードに</span>して保存してください。<br />
		  			※<span class="red">テーマ標準のグラデーションカラーに戻す場合</span>は、カラーピッカーにて<span class="red">「デフォルト」ボタンをクリックして保存</span>してください。
		  			</div>
  				</div>
			</dd>
		
		<!-- フッターカラム数数 -->
		<dt class="dp_set_title1 icon-bookmark">フッターエリアのカラム(列)数 :</dt>
			<dd>
			<div class="sample_img icon-camera">
			表示サンプル
			<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/footer_col_number.png" />
			</div>
			<div class="mg12px-top">
			表示カラム数 : 
			<select name="footer_col_number" id="footer_col_number" size="1" style="width:100px;">
				<option value='1' <?php if($options['footer_col_number'] == '1') echo "selected=\"selected\""; ?>>1カラム</option>
				<option value='2' <?php if($options['footer_col_number'] == '2') echo "selected=\"selected\""; ?>>2カラム</option>
				<option value='3' <?php if($options['footer_col_number'] == '3') echo "selected=\"selected\""; ?>>3カラム</option>
				<option value='4' <?php if($options['footer_col_number'] == '4') echo "selected=\"selected\""; ?>>4カラム</option>
			</select>
			</div>
			
			<div class="cl-a slide-title icon-attention "><?php _e('Note...', 'DigiPress'); ?></div>
			<div class="slide-content">
			※フッターエリアのウィジェットコンテンツを何列(＝カラム)で表示するかを指定します。<br />
			※ここで指定したカラム数に合わせて<span class="red">列の幅は自動調整</span>されます。<br />
			※2～4カラムの場合、<span class="red">一番左のカラムの横幅は300px固定</span>です。<br />
			※レスポンシブ表示(980px以下)の場合、表示幅が狭くなるにつれて、<span class="red">右側のカラムから非表示</span>になっていきます。<br />
			※レスポンシブ表示の最小幅(320px)であっても、一番左の1カラム目は常に幅が300px固定で表示されるため、<span class="red">300pxx250pxの広告コードなどは、1カラム目に表示</span>してください。
			</div>
			</dd>
	</dl>
<!-- 保存ボタン -->
<p class="clear-fix">
<input class="btn btn-save" type="submit" name="dp_save_visual" value="<?php _e(' Save ', 'DigiPress'); ?>" />
</p>
</div>
<!--
========================================
フッターエリアデザインカスタマイズここまで
========================================
-->

<input class="btn close_all mg20px-btm" type="button" name="close_all" value="   <?php _e('Close All', 'DigiPress'); ?>   " />

<!--
========================================
背景カスタマイズここから
========================================
-->
<h3 class="dp_h3 icon-menu">テーマ背景カスタマイズ</h3>
<div class="dp_box" id="bg_custom">
	<dl>	
		<!-- 背景カラー設定 -->
		<dt class="dp_set_title1 icon-bookmark">サイト全体の背景設定 :</dt>
			<dd>
				<div class="sample_img icon-camera">
				対象エリア
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/site_bg.png" />
				</div>

				<table class="tbl-picker mg25px-l mg20px-btm">
					<tr>
						<td>背景カラー :</td>
						<td>
							<input type="text" name="site_bg_color" value="<?php echo $site_bg_color; ?>" class="dp-color-field" data-default-color="<?php echo $def_visual['site_bg_color']; ?>" />
						</td>
					</tr>
				</table>
				

			<div class="mg20px-btm">
			<h3 class="dp_set_title2 icon-triangle-right"><a href="#upload" id="bg_img_upload">背景画像をアップロード</a></h3>
				<div class="mg25px-l mg25px-btm">アップロードメニューにジャンプします。<br />
				オリジナルの背景画像を使用する場合は、こちらよりアップロードを行います。</div>
			</div>
			
			<!-- 背景画像一覧・選択 -->
			<h3 class="dp_set_title2 icon-triangle-right">カスタム背景画像設定 :</h3>
				<div class="mg25px-l mg25px-btm">
					<div class="imgHover">
					<?php
					//Open image directory hundle
					if ($handle = opendir($upDir . '/background')) {
						echo '<ul class="clearfix thumb">';
						
						//Counter
						$cnt = 0;
						//Reading file
						while (false !== ($file = readdir($handle))) {
							if ($file != "." && $file != "..") {
								//Image file only
								if (preg_match($strPattern, $file)) {
									 //Current Image
									 if ($options['dp_background_img'] === $file) {
									 	$chk 	 =  " checked";
									 } else {
									 	$chk = "";
									 }
									 
									echo '<li><div class="clearfix pd10px-btm">
										 <img src="' . DP_THEME_URI . '/img/_uploads/background/' . $file . '" class="thumbImgBg mg8px-btm" />
										 <img src="' . DP_THEME_URI . '/img/_uploads/background/' . $file . '" class="hiddenImg" />
										 </div>
									<input name="dp_background_img" id="dp_background_img'.$cnt.'" type="radio" value="' . $file . '"' . $chk . ' />
									<label for="dp_background_img'.$cnt.'">' . $file . '</label></li>';
									//count
									$cnt ++;
								}
							}
						}
						//Close hundle
						closedir($handle);

						// target
						$chkNone;
						if (($options['dp_background_img'] === 'none') || ($options['dp_background_img'] === '')) $chkNone	= "checked";

						// HTML
						echo '</ul>';
						echo '<ul>'.
						 	 '<li><p style="height:50px;">&nbsp;</p><input name="dp_background_img" id="dp_background_img_none" type="radio" value="none" ' . $chkNone . ' class="fl-l" /><label for="dp_background_img_none">画像なし</label></li></ul>';
					}
					if ($cnt === 0) {
						echo '<p class="red">アップロードされたイメージはまだありません。</p>';
					}
					?>
					</ul>

					<div class="cl-a slide-title icon-attention "><?php _e('Note...', 'DigiPress'); ?></div>
					<div class="slide-content">
					※サムネイルにカーソルを合わせると実寸大のイメージが表示されます。<br />
					※<span class="red">テーマのデフォルトに戻す</span>場合は、<span class="red">「画像なし」を選択</span>して保存してください。<br />
					※<span class="red">背景画像を表示しない</span>場合は、<span class="red">「画像なし」を選択</span>して保存してください。<br />
					　ただし、<span class="red">背景カラーが未定義</span>の場合は、このオプションを選択しても<span class="red">反映されません</span>。<br />
					※イメージの保存先は「<?php echo $upDir;?>/background」です。
					</div>

				</div>
			</div>
			
			<!-- 画像表示方法 -->
			<h3 class="dp_set_title2 icon-triangle-right">背景画像の表示方法 :</h3>
				<div class="mg25px-l mg25px-btm">
					<input name="dp_background_repeat" id="dp_background_repeat1" type="radio" value="repeat-x" <?php if($options['dp_background_repeat'] === 'repeat-x') echo "checked"; ?> />
					<span class="ft12px mg10px-r"><label for="dp_background_repeat1">
					平行(横)方向に繰り返し
					</label></span>
					<input name="dp_background_repeat" id="dp_background_repeat2"type="radio" value="repeat-y" <?php if($options['dp_background_repeat'] === 'repeat-y') echo "checked"; ?> />
					<span class="ft12px mg10px-r"><label for="dp_background_repeat2">
					垂直(縦)方向に繰り返し
					</span>
					<input name="dp_background_repeat" id="dp_background_repeat3"type="radio" value="repeat" <?php if($options['dp_background_repeat'] === 'repeat') echo "checked"; ?> />
					<span class="ft12px mg10px-r"><label for="dp_background_repeat3">
					全方向(縦・横)に繰り返し
					</span>
					<input name="dp_background_repeat" id="dp_background_repeat4"type="radio" value="no-repeat" <?php if($options['dp_background_repeat'] === 'no-repeat') echo "checked"; ?> />
					<span class="ft12px mg10px-r"><label for="dp_background_repeat4">
					繰り返しなし(固定表示)
					</span>

					<div class="cl-a slide-title icon-attention  mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
					<div class="slide-content">
					※カスタム背景画像を指定(使用)しない場合、このオプションは<span class="red">無効</span>です。
					</div>
				</div>
			</dd>
	</dl>
<!-- 保存ボタン -->
<p class="clear-fix">
<input class="btn btn-save" type="submit" name="dp_save_visual" value="<?php _e(' Save ', 'DigiPress'); ?>" />
</p>
</div>

<input class="btn close_all mg20px-btm" type="button" name="close_all" value="   <?php _e('Close All', 'DigiPress'); ?>   " />


<!--
========================================
オリジナルCSS
========================================
-->
<h3 class="dp_h3 icon-menu">オリジナルスタイルシート設定</h3>
<div class="dp_box" id="bg_custom">
	<dl>
		<dt class="dp_set_title1 icon-bookmark">オリジナルスタイルシート :</dt>
			<dd>
			<p>テーマのCSSに、オリジナルのスタイルを組み込むことができます。</p>
			<p>CSSを個別に編集・追加する場合は、テーマファイルのCSSを編集せずに以下のテキストエリアに記述してください。</p>
			<div class="mg15px-top">
			<textarea name="original_css" id="original_css" cols="50" rows="16" style="width:550px;"><?php echo($options['original_css']); ?></textarea>
			</div>
			<div class="cl-a slide-title icon-attention "><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※CSSに関する知識が前提となります。<br />
				※オリジナルのスタイルシートによって、デザインやレイアウトが崩れた場合は、セレクタ名を変更するか、一旦すべての定義を削除してください。
				<p class="circle1">定義例</p>
				<div class="box-c"><pre><code class="bg-none">/* オリジナルCSSクラス(my-text)の指定 */
.my-text {
	font-weight:bold;
	font-size:18px;
	color:#0000ff;
	line-height:188%;
}
/* オリジナルID(my-title)の指定 */
#my-title {
	position:relative;
	top:12px;
	padding:2px 8px;
	display:block;
	font-size:22px;
}
</code></pre></div>
				</div>
			</dd>
	</dl>
<!-- 保存ボタン -->
<p class="clear-fix">
<input class="btn btn-save" type="submit" name="dp_save_visual" value="<?php _e(' Save ', 'DigiPress'); ?>" />
</p>
</div>


<input class="btn close_all" type="button" name="close_all" value="   <?php _e('Close All', 'DigiPress'); ?>   " />

<p>
<input type="submit" name="dp_reset_visual" value="<?php _e(' Restore Default ', 'DigiPress'); ?>" onclick="return confirm('現在の設定は全てクリアされます。初期状態に戻しますか？')" />
</p>
</form>
<!-- フォームの終了 -->
<!--
========================================
背景カスタマイズここまで
========================================
-->


</div>
</div>
