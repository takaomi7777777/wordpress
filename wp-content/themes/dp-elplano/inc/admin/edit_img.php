<?php
dp_ver_chk();
//Preg Match Pattern
$strPattern	=	'/(\.gif|\.jpg|\.jpeg|\.png)$/';
//Upload Folder
$upDir		= DP_THEME_DIR . '/img/_uploads';

$target_file_name;
$target_crop_img;
$target_crop_img_w;
$target_crop_img_h;
?>
<div class="wrap">
<div id="dp_custom">
<h2 class="dp_h2 icon-picture"><?php _e('Image editing', 'DigiPress'); ?></h2>
<p class="ft11px"><?php echo DP_THEME_NAME . ' Ver.' . DP_OPTION_SPT_VERSION; ?></p>
<hr />

<!--
========================================
トリミング／リサイズ
========================================
-->
<!---  タイトル画像 --->
<h3 class="dp_set_title1 icon-bookmark" id="crop_title_top">サイトタイトル画像 : </h3>
	<div class="pd20px-btm mg20px-l">
		<p class="pd10px-top"><a href="?page=digipress#upload" class="button open_upload_menu">画像のアップロード</a></p>
		<p><a href="?page=digipress_delete_file" class="button open_delete_menu">アップロード画像の削除</a></p>
		<form method="post" id="form_trim_title_img" enctype="multipart/form-data">
			<h3 class="dp_set_title2 icon-triangle-right">編集対象画像の選択 : </h3>
			<div class="clearfix mg15px-l">
			トリミングまたはリサイズする画像を選んでください。
			<?php
			//Open image directory hundle
			if ($handle = opendir($upDir . '/title')) {
				echo '<ul class="clearfix" id="crop_title_img">';
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
								$target_file_name = $file;
								$target_crop_img = DP_THEME_URI . '/img/_uploads/title/' . $file;
								$imgInfo = getimagesize($target_crop_img);
								if($imgInfo){
								    $target_crop_img_w = $imgInfo[0];  // width
								    $target_crop_img_h = $imgInfo[1];    //height
								}else{
								    echo 'データの取得に失敗しました';
								}
							} else {
								$chk	= "";
							}

							echo '<li class="list_title_img">
								  <div class="clearfix pd8px-btm">
								  <img src="' . DP_THEME_URI . '/img/_uploads/title/' . $file . '"  class="thumbTitleImg_crop" />
								  <img src="' . DP_THEME_URI . '/img/_uploads/title/' . $file . '" class="hiddenImg" />
								  </div>
								  <div class="pd10px-btm"><input name="target_crop_title_img" id="target_crop_title_img'.$cnt.'" type="radio" value="' . DP_THEME_URI . '/img/_uploads/title/' . $file . '"' . $chk . ' />
								  <label for="target_crop_title_img'.$cnt.'">' . $file . '</label></div></li>';
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

			<h3 class="dp_set_title2 icon-triangle-right">トリミング／リサイズ : </h3>
			<div class="mg15px-l" id="edit_title_img_box">
					<div class="pd12px-btm"><input type="radio" name="title_img_edit_target" id="title_img_edit_target_trim" value="trim" /><label for="title_img_edit_target_trim" class="mg12px-r">トリミング</label> 
					<input type="radio" name="title_img_edit_target" id="title_img_edit_target_resize" value="resize" /><label for="title_img_edit_target_resize">リサイズ</label>
					</div>
					
					<div id="label_for_title_img">マウスでトリミング範囲を選択してください。</div>
					<div id="trim_title_img_div">
						<img src="<?php echo $target_crop_img; ?>" id="target_title_img" width="<?php echo $target_crop_img_w; ?>" height="<?php echo $target_crop_img_h; ?>" />
						<input type="hidden" name="crop_title_img" value="<?php echo $target_crop_img; ?>" />
						<input type="hidden" name="crop_title_img_file_name" id="crop_title_img_file_name" value="<?php echo $target_file_name; ?>" />
					</div>

					<div id="title_img_trim_params" class="mg10px-top mg20px-btm">
						<div class="mg8px-btm">トリミング起点(x, y) : 
							<input type="text" name="title_x1" id="title_x1" size="5" /> , <input type="text" name="title_y1" id="title_y1" size="5" />	
							<input type="hidden" name="title_x2" id="title_x2" />
							<input type="hidden" name="title_y2" id="title_y2" />
							<input type="hidden" name="template_url" class="template_url" value="<?php bloginfo('template_url'); ?>" />
							<input type="hidden" name="template_dir" class="template_dir" value="<?php echo DP_THEME_DIR; ?>" />
						</div>
						<div>選択範囲(幅 : 高さ) : <input type="text" name="title_crop_width" id="title_crop_width" size="5" /> : <input type="text" name="title_crop_height" id="title_crop_height" size="5" />
						</div>
					</div>

					<div id="title_img_resize_params" class="mg10px-top mg20px-btm">
						<p>リサイズ方法を選んでください。※アスペクト比は保持されます。</p>
						<div class="mg8px-btm"><input type="radio" name="title_img_resize_type" id="title_img_resize_px" value="pixel" /><label for="title_img_resize_px"> リサイズ後の幅(ピクセル)</label> : 
							<input type="text" name="title_resize_val_px" id="title_resize_val_px" size="5" /> px
						</div>
						<div><input type="radio" name="title_img_resize_type" id="title_img_resize_percent" value="percent" /><label for="title_img_resize_percent"> 元画像との比率 : 
							<input type="text" name="title_resize_val_percent" id="title_resize_val_percent" size="5" /> %
						</div>
					</div>
		</div>

		<!-- Trim button -->
		<p class="clear-fix pd20px-btm">
		<input class="btn btn-save" id="send_trim_title" type="submit" value="<?php _e('Edit this image', 'DigiPress'); ?>" />
		</p>
	</form>
	</div>

<hr />

<h3 class="mg15px-top dp_set_title1 icon-bookmark" id="crop_banner_top">ヘッダー画像 : </h3>
	<div class="pd30px-btm mg20px-l">
		<p class="pd10px-top"><a href="?page=digipress#upload" class="button open_upload_menu">画像のアップロード</a></p>
		<p><a href="?page=digipress_delete_file" class="button open_delete_menu">アップロード画像の削除</a></p>
		<form method="post" id="form_trim_header_img" enctype="multipart/form-data">
			<h3 class="dp_set_title2 icon-triangle-right">編集対象画像の選択 : </h3>
			<div class="clearfix mg15px-l">
			トリミングまたはリサイズする画像を選んでください。
			<?php
			//Open image directory hundle
			if ($handle = opendir($upDir . '/header')) {
				echo '<ul class="clearfix" id="crop_header_img">';
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
								$target_file_name = $file;
								$target_crop_img = DP_THEME_URI . '/img/_uploads/header/' . $file;
								$imgInfo = getimagesize($target_crop_img);
								if($imgInfo){
								    $target_crop_img_w = $imgInfo[0];  // width
								    $target_crop_img_h = $imgInfo[1];    //height
								}else{
								    echo 'データの取得に失敗しました';
								}
							} else {
								$chk	= "";
							}

							echo '<li class="list_header_img">
								  <div class="clearfix pd8px-btm">
								  <img src="' . DP_THEME_URI . '/img/_uploads/header/' . $file . '"  class="thumbBannerImg_crop" />
								  <img src="' . DP_THEME_URI . '/img/_uploads/header/' . $file . '" class="hiddenImg" />
								  </div>
								  <div class="pd10px-btm"><input name="target_crop_banner_img" id="target_crop_banner_img'.$cnt.'" type="radio" value="' . DP_THEME_URI . '/img/_uploads/header/' . $file . '"' . $chk . ' />
								  <label for="target_crop_banner_img'.$cnt.'">' . $file . '</label></div></li>';
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

			<h3 class="dp_set_title2 icon-triangle-right">トリミング／リサイズ : </h3>
			<div class="mg15px-l">
				<div class="pd12px-btm"><input type="radio" name="header_img_edit_target" id="header_img_edit_target_trim" value="trim" /><label for="header_img_edit_target_trim" class="mg12px-r">トリミング</label> 
					<input type="radio" name="header_img_edit_target" id="header_img_edit_target_resize" value="resize" /><label for="header_img_edit_target_resize">リサイズ</label>
					</div>
					<p id="label_for_header_img">マウスでトリミング範囲を選択してください。</p>
				<div id="trim_banner_img_div">
					<img src="<?php echo $target_crop_img; ?>" id="target_banner_img" width="<?php echo $target_crop_img_w; ?>" height="<?php echo $target_crop_img_h; ?>" />
					<input type="hidden" name="crop_banner_img" id="crop_banner_img" value="<?php echo $target_crop_img; ?>" />
					<input type="hidden" name="crop_banner_img_file_name" id="crop_banner_img_file_name" value="<?php echo $target_file_name; ?>" />
				</div>
	
				<div id="header_img_trim_params" class="mg10px-top mg20px-btm">
					<div class="mg8px-btm">トリミング起点(x, y) : 
						<input type="text" name="header_x1" id="header_x1" size="5" /> , <input type="text" name="header_y1" id="header_y1" size="5" />	
						<input type="hidden" name="header_x2" id="header_x2" />
						<input type="hidden" name="header_y2" id="header_y2" />
						<input type="hidden" name="template_url" class="template_url" value="<?php bloginfo('template_url'); ?>" />
						<input type="hidden" name="template_dir" class="template_dir" value="<?php echo DP_THEME_DIR; ?>" />
					</div>
					<div>選択範囲(幅 : 高さ) :  <input type="text" name="header_crop_width" id="header_crop_width" size="5" /> : <input type="text" name="header_crop_height" id="header_crop_height" size="5" />
					</div>
				</div>
				
				<div id="header_img_resize_params" class="mg10px-top mg20px-btm">
					<p>リサイズ方法を選んでください。※アスペクト比は保持されます。</p>
					<div class="mg8px-btm"><input type="radio" name="header_img_resize_type" id="header_img_resize_px" value="pixel" /><label for="header_img_resize_px"> リサイズ後の幅(ピクセル)</label> : 
						<input type="text" name="header_resize_val_px" id="header_resize_val_px" size="5" /> px
					</div>
					<div><input type="radio" name="header_img_resize_type" id="header_img_resize_percent" value="percent" /><label for="header_img_resize_percent"> 元画像との比率 : 
						<input type="text" name="header_resize_val_percent" id="header_resize_val_percent" size="5" /> %
					</div>
				</div>
		</div>

		<!-- trim button -->
		<p class="clear-fix pd20px-btm">
		<input class="btn btn-save" id="send_trim_banner" type="submit" value="<?php _e('Edit this image', 'DigiPress'); ?>" />
		</p>
	</form>
	</div>

</div>
</div>
