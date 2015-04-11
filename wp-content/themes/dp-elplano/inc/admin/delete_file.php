<?php
dp_ver_chk();
//Preg Match Pattern
$strPattern	=	'/(\.gif|\.jpg|\.jpeg|\.png)$/';

//Upload Folder
$upDir		= DP_THEME_DIR . '/img/_uploads';
?>


<div class="wrap">

<div id="dp_custom">
<h2 class="dp_h2 icon-trash-full">アップロード画像削除</h2>
<p class="ft11px"><?php echo DP_THEME_NAME . ' Ver.' . DP_OPTION_SPT_VERSION; ?></p>

<form method="post" action="#" name="dp_form" enctype="multipart/form-data">
<h3 class="dp_h3 icon-menu">タイトル画像削除</h3>
<div class="dp_box">
	<dl>
		<!-- 画像一覧・選択 -->
		<dt id="set_custom_hd_img">
		<p class="dp_set_title1 icon-bookmark">削除するタイトル画像の選択
		</p>
		</dt>
			<dd>
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
							 	$chk 	 =  " checked";
							 } else {
							 	$chk = "";
							 }
							 
							echo '<li><div class="clearfix pd10px-btm">
								 <img src="' . DP_THEME_URI . '/img/_uploads/title/' . $file . '" class="thumbImg" />
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
			}
			echo '</ul>';
			if ($cnt === 0) {
				echo '<li>アップロードされたイメージはまだありません。</li>';
			}
			?>
			<div class="cl-a slide-title icon-attention"><?php _e('Note...', 'DigiPress'); ?></div>
			<div class="slide-content">
			※サムネイルにカーソルを合わせると実寸大のイメージが表示されます。<br />
			※削除できない場合は、FTPクライアント等にて<span class="red">サーバーから該当ファイルを直接削除</span>してください。<br />
			※削除対象のファイルが存在する場所は「<?php echo $upDir; ?>/title/」です。
			</div>
			</div>
			</dd>
	</dl>

<!-- delete -->
<p class="clear-fix"><input class="btn btn-red" type="submit" name="dp_delete_file_title_img" value=" <?php _e('Delete File', 'DigiPress'); ?> " onclick="return confirm('選択したアップロードファイルを削除しますか？')" /></p>
</form>
</div>

<input class="btn close_all mg15px-btm" type="button" name="close_all" value="   <?php _e('Close All', 'DigiPress'); ?>   " />


<form method="post" action="#" name="dp_form" enctype="multipart/form-data">
<h3 class="dp_h3 icon-menu">ヘッダー画像削除</h3>
<div class="dp_box">
	<dl>
		<!-- ヘッダー画像一覧・選択 -->
		<dt id="set_custom_hd_img">
		<p class="dp_set_title1 icon-bookmark">削除するヘッダー画像の選択
		</p>
		</dt>
			<dd>
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
							 	$chk 	 =  " checked";
							 } else {
							 	$chk = "";
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
			}
			echo '</ul>';
			if ($cnt === 0) {
				echo '<li>アップロードされたイメージはまだありません。</li>';
			}
			?>
			<div class="cl-a slide-title icon-attention"><?php _e('Note...', 'DigiPress'); ?></div>
			<div class="slide-content">
			※サムネイルにカーソルを合わせると実寸大のイメージが表示されます。<br />
			※削除できない場合は、FTPクライアント等にて<span class="red">サーバーから該当ファイルを直接削除</span>してください。<br />
			※削除対象のファイルが存在する場所は「<?php echo $upDir; ?>/header/」です。
			</div>
			</div>
			</dd>
	</dl>
<!-- delete -->
<p class="clear-fix"><input class="btn btn-red" type="submit" name="dp_delete_file_hd" value=" <?php _e('Delete File', 'DigiPress'); ?> " onclick="return confirm('選択したアップロードファイルを削除しますか？')" /></p>
</form>
</div>

<input class="btn close_all mg15px-btm" type="button" name="close_all" value="   <?php _e('Close All', 'DigiPress'); ?>   " />


<form method="post" action="#" name="dp_form" enctype="multipart/form-data">
<h3 class="dp_h3 icon-menu">背景画像削除</h3>
<div class="dp_box">
	<dl>
		<!-- 背景画像一覧・選択 -->
		<dt id="set_custom_hd_img">
		<p class="dp_set_title1 icon-bookmark">削除する背景画像の選択
		</p>
		</dt>
			<dd>
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
								 <img src="' . DP_THEME_URI . '/img/_uploads/background/' . $file . '" class="thumbImgBg" />
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
			}
			echo '</ul>';
			if ($cnt === 0) {
				echo '<li>アップロードされたイメージはまだありません。</li>';
			}
			?>
			<div class="cl-a slide-title icon-attention"><?php _e('Note...', 'DigiPress'); ?></div>
			<div class="slide-content">
			※サムネイルにカーソルを合わせると実寸大のイメージが表示されます。<br />
			※削除できない場合は、FTPクライアント等にて<span class="red">サーバーから該当ファイルを直接削除</span>してください。<br />
			※削除対象のファイルが存在する場所は「<?php echo $upDir; ?>/background/」です。
			</div>
			</div>
			</dd>
	</dl>
<!-- delete -->
<p class="clear-fix"><input class="btn btn-red" type="submit" name="dp_delete_file_bg" value=" <?php _e('Delete File', 'DigiPress'); ?> " onclick="return confirm('選択したアップロードファイルを削除しますか？')" /></p>
</form>
</div>

<input class="btn close_all mg15px-btm" type="button" name="close_all" value="   <?php _e('Close All', 'DigiPress'); ?>   " />

</div>
</div>
