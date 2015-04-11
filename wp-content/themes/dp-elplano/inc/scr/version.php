<?php
/*******************************************************
* DigiPress Theme Version Check
*******************************************************/
function dp_ver_chk() {

	$cssPath			= DP_THEME_DIR . "/css/visual-custom.css";
	$hdUpDir			= DP_THEME_DIR . "/img/_uploads/header";
	$bgUpDir			= DP_THEME_DIR . "/img/_uploads/background";
	$titleUpDir			= DP_THEME_DIR . "/img/_uploads/title";
	//Update URL
	$updateUrl = "http://digipress.digi-state.com/update/";

	$msgTitleUpDir = '';
	$msgHdUpDir = '';
	$msgBgUpDir = '';
	$msgSafeMode = '';
	$msgPermission = '';
	$msgCss = '';

	if ( ! is_writable( $cssPath ) ) {
		$msgCss 		= '"<span class="red">' . $cssPath . '</span>" のパーミッションを<span class="red b">「666」</span>または<span class="red b">「606」</span>に変更してください。<br />';
	}
	
	if( ! is_writable( $titleUpDir ) ){
		$msgTitleUpDir 		= '"<span class="red">' . $titleUpDir . '</span>" のパーミッションを<span class="red b">「777」</span>に変更してください。<br />';
	}
	if( ! is_writable( $hdUpDir ) ){
		$msgHdUpDir 		= '"<span class="red">' . $hdUpDir . '</span>" のパーミッションを<span class="red b">「777」</span>に変更してください。<br />';
	}
	if( ! is_writable( $bgUpDir ) ){
		$msgBgUpDir 		= '"<span class="red">' . $bgUpDir . '</span>" のパーミッションを<span class="red b">「777」</span>に変更してください。';
	}

	//If PHP is safe mode...
	if (ini_get('safe_mode')) {
		$msgSafeMode = '<p class="box-green-dot-bg ft12px"><span class="red">PHPはセーフモード</span>です。</p>';
	}

	//Permission
	if (!$msgCss && !$msgHdUpDir && !$msgBgUpDir && !$msgTitleUpDir) {
		$msgPermission =  '';
	} else {
		$msgPermission = '<p class="box-red-dot-bg ft12px">'.$msgCss.$msgTitleUpDir . $msgHdUpDir . $msgBgUpDir."</p>";
	}


	//Message
	if ( phpversion() < 5 ) {
		$msgPHPver = '<p class="box-yellow-dot-bg ft12px">※このPHPのバージョン(' . phpversion() . 
				')では、WordPressおよびDigiPressが正常に動作しません。至急、PHPのバージョンアップを行ってください。</p>';
		$msg =	$msgPHPver . $msgSafeMode . $msgPermission;
	} else {
		$msg = '<span class="b ft14px icon-info-circled">アップデート情報</span><div style="height:88px;width:auto;overflow:auto;padding:10px;margin:0 0 25px 0;border:1px solid #ccc;">'.@file_get_contents($updateUrl).'</div>'
			   .$msgSafeMode . $msgPermission;
	}
	//display
	define ('DP_NEW_VERSION', $msg);
}


/** ===================================================
* Whether target URL is exists.
* @param	string	$url target URI
* @return	bool	$connectable Is session Accepted
*/
function url_exists($url) {
	$handle   = curl_init($url);
	if (false === $handle) return false;

	curl_setopt($handle, CURLOPT_HEADER, false);
	// this works
	curl_setopt($handle, CURLOPT_FAILONERROR, true);
	curl_setopt($handle, CURLOPT_HTTPHEADER, Array("User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.8.1.15) Gecko/20100315 Firefox/3.5.9") );
	// request as if Firefox
	curl_setopt($handle, CURLOPT_NOBODY, true);
	curl_setopt($handle, CURLOPT_RETURNTRANSFER, false);
	$connectable = curl_exec($handle);
	curl_close($handle);
	
	return $connectable;
}

?>