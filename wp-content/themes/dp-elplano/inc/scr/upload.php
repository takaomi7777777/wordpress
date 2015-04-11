<?php
//Referer
$refUri 	= $_POST['my_url'];
//Redirect URI
$redirectUri 	= "http://" . $_SERVER["SERVER_NAME"];
//Upload Directory
$upDir 		= "../../img/_uploads/".$_POST['my_dir']."/";
//Preg Match Pattern
$strPattern	= '/(\.gif|\.jpg|\.jpeg|\.png)$/';
//Max file size(500kb)
$maxSize	= $_POST['MAX_FILE_SIZE'];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>File Uploader : DigiPress</title>
<style type="text/css">
<!--
body {
	font-size:13px;
	font-family: 'メイリオ', Meiryo, 'ヒラギノ角ゴ Pro W3', 'Hiragino Kaku Gothic Pro', Verdana, 'Lucida Grande', 'ＭＳ Ｐゴシック', sans-serif;
}
.al-c { text-align: center; margin: 0 auto 0 auto; }
.big     { font-size: 16px; line-height: 130%; }
.big-b   { font-size: 16px; font-weight:bold; line-height: 130%; }
.box-green-bg {
	border: 1px solid #66cc33;
	background-color: #eafddf;
}
a, a:visited {color:#2ea0b4;}
a:hover {color:#248191;}
p {
	line-height:170%;
	padding: 4px 0 8px 0;
	margin:5px auto 12px 5px;
}
.pd3px {
	clear:both;
	padding:3px;
}
.pd5px {
	clear:both;
	padding:5px;
}
.pd8px {
	clear:both;
	padding:8px;
}
-->
</style>
</head>
<body>
<div class="box-green-bg al-c pd8px">
<?php
//アップロードフォルダが777でないとき
if( ! is_writable( $upDir ) ){
	echo '"ファイルをアップロードできません。<br /><span class="bd-red">' . $upDir . '</span>" のパーミッションを<strong>「777」</strong>に変更してください。';
} else {
	if (is_uploaded_file($_FILES["file"]["tmp_name"])) {
		//If not support format
		if ( ! preg_match($strPattern, $_FILES["file"]["name"]) ) {
			echo $_FILES["file"]["name"] . "<br />は未対応のファイル形式です。<br />アップロード可能なファイル形式は \"*.jpg, *.png, *.gif, *.jpeg\" のいずれかです。";
		} elseif ( preg_match($strPattern, $_FILES["file"]["size"]) > $maxSize ) {
			echo "アップロード可能なファイルサイズは " . $maxSize / 1000 . "KB までです。";
		
		} else {
			//Upload
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $upDir . $_FILES["file"]["name"])) {
				//change mode
				chmod($upDir . $_FILES["file"]["name"], 0644);
				echo "「" . $_FILES["file"]["name"] . "」をアップロードしました。";
			} else {
				echo "ファイルをアップロードできません。";
			}
		}
	} else {
	  echo "ファイルが選択されていないか、ファイルサイズの上限を超えてアップロードしようとしました。<br />アップロード可能なファイルサイズは " . $maxSize / 1000 . "KB までです。";
	}
}
?>
</div>
<p class="al-c big-b">
<a href="<?php echo $refUri; ?>">前のページに戻る</a>
</p>
</body>
</html>