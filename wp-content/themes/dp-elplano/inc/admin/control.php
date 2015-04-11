<?php dp_ver_chk(); ?>
<div class="wrap">
<div id="dp_custom">
<h2 class="dp_h2 icon-equalizer"><?php _e('DigiPress Operation Details Settings', 'DigiPress'); ?></h2>
	<p class="ft11px"><?php echo DP_THEME_NAME . ' Ver.' . DP_OPTION_SPT_VERSION; ?></p>
	<?php echo DP_NEW_VERSION; ?>


<form method="post" action="#" name="dp_form" enctype="multipart/form-data">
<!--
========================================
サイト一般設定
========================================
-->
<h3 class="dp_h3 icon-menu">サイト一般動作設定</h3>
<div class="dp_box">
	<dl>
		<dt class="dp_set_title1 icon-bookmark">
		標準化設定 : 
		</dt>
			<dd>
			<div class="pd15px-top pd15px-btm formblock" style="position:relative;">
				<div>
					<input name="fast_on_ie" id="fast_on_ie" type="checkbox" value="check" <?php if($options['fast_on_ie']) echo "checked"; ?> /><label for="fast_on_ie">　Internet Explorerの表示を高速化する </label>
				</div>
			
				<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※このオプションは、アクセス元のブラウザが<span class="red">IE(～9まで)のみに有効</span>です。その他のモダンブラウザには影響はありません。<br />
				※このオプションを有効にすると、<span class="red">IE(特に7，8)での表示速度は若干向上</span>しますが、一部の<span class="red">グラデーションやボックスシャドウ、角丸などのエフェクトが、IEでは一切無効</span>となります。<br />
				(＊IEで<span class="red">CSS3のエフェクトを疑似的に反映させるJavascriptを読み込まないことによる転送量の縮小</span>。)<br />
				※また、このオプションが有効の場合は、<span class="red">IE8でのレスポンシブレイアウト(メディアクエリ)は無効</span>になります。
				</div>
			</div>

			<div class="pd15px-top pd25px-btm formblock" style="position:relative;">
				<div>
					<input name="use_google_jquery" id="use_google_jquery" type="checkbox" value="check" <?php if($options['use_google_jquery']) echo "checked"; ?> /><label for="use_google_jquery">　圧縮済みのjQueryをGoogleから読み込む</label>
				</div>
			
				<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※WordPress標準のjQuery（無圧縮）ではなく、Googleのサーバー上にある<span class="red">最適（軽量）化されたjQuery</span>を代わりに読み込む場合はこのオプションを有効にしてください。<br />
				※この機能を有効にすると、GoogleのCDN（コンテンツデリバリネットワーク）サーバー上にある常に<span class="red">最新の圧縮済みのjQueryがヘッダ（head）に指定され、セキュリティ対策と高速化</span>が期待できます。<br />
				※<span class="red">認証制サイト</span>などの場合は、GoogleのjQueryが正常に読み込めない場合があります。アコーディオンエフェクトなどJavascriptの処理が動かなくなったときは、このオプションを無効（WordPress標準のjQueryの利用）にしてください。<br />
				※通常はこのオプションを有効にしておくことをおすすめします。
				</div>
			</div>

			<div class="pd15px-top pd25px-btm formblock" style="position:relative;">
				<input name="disable_cat_slider" id="disable_cat_slider" type="checkbox" value="check" <?php if($options['disable_cat_slider']) echo "checked"; ?> /><label for="disable_cat_slider">　カテゴリーウィジェット等のスライド効果を無効にする</label>
				<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※カテゴリー、固定ページ、メニューなどのリストを表示するウィジェットにて、サブメニューを持つ場合に折りたたんでクリックしてスライド展開するエフェクトを使用しない場合にチェックします。
				</div>
			</div>

			<div class="pd15px-top pd25px-btm formblock" style="position:relative;">
				<div>
					<input name="disable_mobile_fast" id="disable_mobile_fast" type="checkbox" value="check" <?php if($options['disable_mobile_fast']) echo "checked"; ?> /><label for="disable_mobile_fast">　モバイル表示対応を無効にする</label>
				</div>
			
				<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※このオプションを有効にすると、スマートフォンで閲覧時の専用テーマの表示が無効となります。
				</div>
			</div>
			</dd>
		
		<dt class="dp_set_title1 icon-bookmark">
		後方互換設定 : 
		</dt>
			<dd>
			<div class="sample_img icon-camera">
				表示サンプル
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/backward_compatibility.png" />
			</div>
			<div class="pd15px-top pd15px-btm formblock" style="position:relative;">
				<div>
					<input name="backward_compatibility" id="backward_compatibility" type="checkbox" value="check" <?php if($options['backward_compatibility']) echo "checked"; ?> /><label for="backward_compatibility">　アクセント画像装飾用CSSを読み込む </label>
				</div>
			
				<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※このオプションは以前のDigiPressテーマに搭載されていたラベル画像、図形、吹き出しなど、<span class="red">画像を使ったコンテンツ装飾のためのCSSをこのテーマでも利用する場合のみ</span>に有効にしてください。<br />
				※アクセント画像装飾用CSSは<span class="red">非推奨 </span>のオプションのため、なるべく利用しないでください。
				</div>
			</div>
			</dd>

		<dt class="dp_set_title1 icon-bookmark">ページナビゲーション設定 : </dt>
			<dd>
			<div class="sample_img icon-camera">
				表示サンプル
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/pagenation.png" />
				</div>
			<div class="mg8px-top formblock">
			<input name="pagenation" id="pagenation" type="checkbox" value="check" <?php if($options['pagenation']) echo "checked"; ?> />
			<label for="pagenation">拡張ページナビゲーションを使用する</label>
			<div class="box mg12px-top" id="pagenation_div">
				<div class="mg18px-btm">
				<input name="pagenation_always_show" id="pagenation_always_show" type="checkbox" value="check" <?php if($options['pagenation_always_show']) echo "checked"; ?> />
				<label for="pagenation_always_show">1ページしかない場合もページナビゲーションを表示する</label>
				</div>
				
				<div>
				<label for="pagenation_pages_text">総ページ数用テキスト:</label> 
					<div style="position:relative;top:-20px;left:200px;">
					<input id="pagenation_pages_text" name="pagenation_pages_text" type="text" value="<?php echo $options['pagenation_pages_text']; ?>" size="60" /><br />
					<span class="ft11px">%CURRENT_PAGE% - 現在のページ番号。<br />%TOTAL_PAGES% - 総ページ数。</span>
					</div>
				</div>
				
				<div>
				<label for="pagenation_current_text">現在のページ用テキスト:</label> 
					<div style="position:relative;top:-20px;left:200px;">
					<input id="pagenation_current_text" name="pagenation_current_text" type="text" value="<?php echo $options['pagenation_current_text']; ?>" size="34" /><br />
					<span class="ft11px">%PAGE_NUMBER% - 現在のページ番号。</span>
					</div>
				</div>
				
				<div>
				<label for="pagenation_page_text">ページ用テキスト:</label> 
					<div style="position:relative;top:-20px;left:200px;">
					<input id="pagenation_page_text" name="pagenation_page_text" type="text" value="<?php echo $options['pagenation_page_text']; ?>" size="34" /><br />
					<span class="ft11px">%PAGE_NUMBER% - ページ番号。</span>
					</div>
				</div>
				
				<div>
				<label for="pagenation_first_text">最初のページ用テキスト:</label> 
					<div style="position:relative;top:-20px;left:200px;">
					<input id="pagenation_first_text" name="pagenation_first_text" type="text" value="<?php echo $options['pagenation_first_text']; ?>" size="34" />
					</div>
				</div>
				
				<div>
				<label for="pagenation_last_text">最後のページ用テキスト:</label> 
					<div style="position:relative;top:-20px;left:200px;">
					<input id="pagenation_last_text" name="pagenation_last_text" type="text" value="<?php echo $options['pagenation_last_text']; ?>" size="34" />
					</div>
				</div>
				
				<div>
				<label for="pagenation_prev_text">前のページ用テキスト:</label> 
					<div style="position:relative;top:-20px;left:200px;">
					<input id="pagenation_prev_text" name="pagenation_prev_text" type="text" value="<?php echo $options['pagenation_prev_text']; ?>" size="34" />
					</div>
				</div>
				
				<div>
				<label for="pagenation_next_text">次のページ用テキスト:</label> 
					<div style="position:relative;top:-20px;left:200px;">
					<input id="pagenation_next_text" name="pagenation_next_text" type="text" value="<?php echo $options['pagenation_next_text']; ?>" size="34" />
					</div>
				</div>
				
				<div>
				<label for="pagenation_dotleft_text">「前へ...」用テキスト:</label> 
					<div style="position:relative;top:-20px;left:200px;">
					<input id="pagenation_dotleft_text" name="pagenation_dotleft_text" type="text" value="<?php echo $options['pagenation_dotleft_text']; ?>" size="34" />
					</div>
				</div>
				
				<div>
				<label for="pagenation_dotright_text">「次へ...」用テキスト:</label> 
					<div style="position:relative;top:-20px;left:200px;">
					<input id="pagenation_dotright_text" name="pagenation_dotright_text" type="text" value="<?php echo $options['pagenation_dotright_text']; ?>" size="34" />
					</div>
				</div>
				
				<div>
				<label for="pagenation_num_pages">表示するページ数:</label> 
					<div style="position:relative;top:-20px;left:200px;">
					<input id="pagenation_num_pages" name="pagenation_num_pages" type="text" value="<?php echo $options['pagenation_num_pages']; ?>" size="5" />
					</div>
				</div>
				
				<div>
				<label for="pagenation_num_larger_page_numbers">省略表示するページ数:</label> 
					<div style="position:relative;top:-20px;left:200px;">
					<input id="pagenation_num_larger_page_numbers" name="pagenation_num_larger_page_numbers" type="text" value="<?php echo $options['pagenation_num_larger_page_numbers']; ?>" size="5" />
					</div>
				</div>
				
				<div>
				<label for="pagenation_larger_page_numbers_multiple">省略ページを次の倍数で表示:</label> 
					<div style="position:relative;top:-20px;left:200px;">
					<input id="pagenation_larger_page_numbers_multiple" name="pagenation_larger_page_numbers_multiple" type="text" value="<?php echo $options['pagenation_larger_page_numbers_multiple']; ?>" size="5" /><br />
				<span class="ft11px">例えば5を指定(5の倍数)した場合、「5, 10, 15, 20, 25...」のように表示します。</span>
				</div>
				</div>
			</div>
			
				<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※インデックスページとアーカイブページでのページ送りリンクを、前または次のページへのリンク表示から、複数のページ送りリンク表示に変更する場合に有効にします。<br />
				※トップページの場合のみ、2ページ目以降にてページナビゲーションが表示されます。
				</div>
			</div>

			<div class="mg25px-top formblock">
				<div class="mg12px-btm"><input name="autopager" id="autopager" type="checkbox" value="check" <?php if($options['autopager']) echo "checked"; ?> />
				<label for="autopager">オートページャーを使用する(PC)</label></div>
				<div><input name="autopager_mb" id="autopager_mb" type="checkbox" value="check" <?php if($options['autopager_mb']) echo "checked"; ?> />
				<label for="autopager_mb">オートページャーを使用する(モバイル)</label></div>

				<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※トップページやアーカイブページにて、次ページへ遷移せずに同一ページにて次の指定件数の記事を自動で追加して読み込む場合にこのオプションを有効にしてください。
				</div>
			</div>
			</dd>
		
		<dt class="dp_set_title1 icon-bookmark" id="settings_gcs">Google カスタム検索設定 : </dt>
			<dd>
			<label for="gcs_id">検索エンジンID:</label> 
			<input id="gcs_id" name="gcs_id" type="text" value="<?php echo $options['gcs_id']; ?>" size="40" /> 
			<a href="http://www.google.com/cse/manage/all" target="_blank">Googleで作成・確認</a>
			<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
			<div class="slide-content">
			※この設定は、サイト内検索機能として Google カスタム検索 を使う場合に、対象の検索エンジンを特定するための Google カスタム検索 にて作成されているIDを指定します。<br />
			※<span class="red">検索ウィジェット</span>や、<span class="red">テーマに組み込まれている検索ボックス</span>を、Google カスタム検索 に置き換える場合は必ず指定してください。<br />

			<p class="circle1">検索エンジンの作成</p>
			<div>Googleカスタム検索で<a href="http://www.google.com/cse/manage/create" target="_blank">新しい検索エンジンを作成</a>します。<br />
			<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/create_gcs.png" /></div>

			<p class="circle1">検索エンジンIDの確認</p>
			<div>
			<ol>
			<li><a href="http://www.google.com/cse/manage/all" target="_blank">検索エンジンの編集</a> から作成した検索エンジンの名前をリストから選びます。</li>
			<li>対象検索エンジンの「設定」画面の "基本" タブにある「検索エンジンID」ラベルをクリックして表示された "検索エンジンID" をペーストします。<br />
			<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/gcs_id.png" /></li>
			</ol>
			</div>
			
			<p class="circle1">検索エンジンの設定 ※必須</p>
			<div>
			<ol>
			<li>カスタム検索エンジンの コントロールパネル から「デザイン」を選び、"レイアウトの選択" にて「<span class="ft15px b red">デザイン</span>」画面の "レイアウト" タブを選択し、「<span class="ft15px b red">保存してコードを取得</span>」ボタンをクリックします。<br />
			<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/gcs_layout1.png" /></li>
			<li>検索ボックスコードの取得画面が表示されたら、「検索結果の詳細」ラベルをクリックし、最初に指定したカスタム検索エンジンを利用するサイトのURLとなっていることを確認して完了です。<br />
			<span class="ft13px b red">※コードを取得する必要はありません。</span></br />
			<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/gcs_layout2.png" class="bd-grey" /><br />
			※この検索エンジンの設定を行わないと、Googleカスタム検索 が機能しません。</li>
			</ol>
			</div>
			</div>
			</dd>
		
		<dt class="dp_set_title1 icon-bookmark">アフィリエイト設定 : </dt>
			<dd>
			<h3 class="dp_set_title2 icon-triangle-right">リンクシェア :</h3>
			<div class="mg15px-l formblock">
				<div class="mg15px-top">
					<label for="ls_token">トークン:</label> 
					<input id="ls_token" name="ls_token" type="text" value="<?php echo $options['ls_token']; ?>" size="50" /> 
					<a href="http://cli.linksynergy.com/cli/publisher/links/webServices.php" target="_blank">リンクシェアで作成・確認</a>
					<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
					<div class="slide-content">
					※この設定は、リンクシェアのアフィリエイトリンクを生成できるDigiPressの<span class="red">ショートコード([linkshare])を利用する場合に、デフォルトで使用するサイトアカウントのトークン</span>を指定するものです(ショートコード使用時に "token" パラメータを省略できます)。<br />
					※この設定が空欄の場合は、linkshareショートコードを利用する際に、"token" パラメータでトークンをその都度指定してください。<br />
					※linkshareショートコードの <span class="red">"token" パラメータを指定した場合は、デフォルトのトークンよりも "token" パラメータのトークンが優先</span>されます。<br />
					<p class="circle1">サイトアカウントのトークン確認方法</p>
						<div>
						<ol>
						<li>リンクシェアに<a href="http://cli.linksynergy.com/cli/publisher/links/webServices.php" target="_blank">ログインしてWebサービスメニューにアクセス</a>します。</li>
						<li>まだトークンを作成していない場合は、[トークンの更新]ボタンでトークンを生成します。<br />
						<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/ls_token_create.png" class="bd-grey" />
						</li>
						<li>作成されたトークンをコピーし、上記テキストボックスにペーストして保存します。<br />
						<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/ls_token_get.png" class="bd-grey" />
						</li>
						</ol>
						</div>
					</div>
					
					<div class="mg15px-top">
					<label for="ls_mid">ECサイトID(MID):</label> 
					<input id="ls_mid" name="ls_mid" type="text" value="<?php echo $options['ls_mid']; ?>" size="10" /> 
					<a href="http://cli.linksynergy.com/cli/publisher/programs/advertisers.php?my_programs=1" target="_blank">リンクシェアで確認</a>
					<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
					<div class="slide-content">
					※この設定は、リンクシェアのアフィリエイトリンクを生成できるDigiPressの<span class="red">ショートコード([linkshare])を利用する場合に、アフィリエイトに利用するデフォルトのECサイト</span>を指定するための MID を登録します。<br />
					※この設定が空欄の場合、または linkshareショートコードの "mid" パラメータを省略した場合は、<span class="red">リンクシェアアフィリエイト紹介プログラム(2451)が設定</span>されます。<br />
					※linkshareショートコードの <span class="red">"mid" パラメータを指定した場合は、デフォルトのMIDよりも "mid" パラメータの MID が優先</span>されます。<br />
					<p class="circle1">ECサイトID(MID)の確認方法</p>
						<div>
						<ol>
						<li>リンクシェアに<a href="http://cli.linksynergy.com/cli/publisher/programs/advertisers.php?my_programs=1" target="_blank">ログインして提携中のECサイトメニューにアクセス</a>します。</li>
						<li>参加プログラムリストの中から、デフォルトで利用したいECサイトのリンクにカーソルを合わせて、表示されたポップアップに記載の MID を上記テキストボックスに入力して保存します。<br />
						<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/ls_mid.png" class="bd-grey" />
						</li>
						</ol>
						</div>
					</div>
				</div>
				</div>
			</div>

			<h3 class="dp_set_title2 icon-triangle-right">iTunesパートナー アフィリエイトプログラム(PHG) :</h3>
			<div class="mg15px-l formblock">
				<div class="mg15px-top">
					<label for="phg_token">アフィリエイト・トークン:</label> 
					<input id="phg_token" name="phg_token" type="text" value="<?php echo $options['phg_token']; ?>" size="10" /> 
					<a href="https://phgconsole.performancehorizon.com/login/itunes" target="_blank">申し込み・トークン確認</a>
					<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
					<div class="slide-content">
						※この設定はDigiPressのショートコードにてiTunes Store, App Storeのアプリや音楽などのアフィリエイトリンクを生成する場合に設定しておく必要があります。<br />
						※ショートコードを利用する場合は、<span class="red">[phg url="https://itunes.apple.com/jp/app/APP_NAME/id12345678?mt=8&uo=4"]</span>のような形式でiTunes StoreのURLをパラメータに指定して記事やテキストウィジェットに指定してください。<br />
						※iTunesのアフィリエイトプログラムへの申し込みは<a href="http://www.apple.com/jp/itunes/affiliates/" target="_blank">こちら</a>から行ってください。iTunes Storeの商品リンクの検索は<a href="http://www.apple.com/jp/itunes/link/" target="_blank">こちら</a>から行えます。
					</div>
				</div>
			</div>
			
			<h3 class="dp_set_title2 icon-triangle-right">Googleアドセンス :</h3>
			<div class="mg15px-l formblock">
				<div class="mg15px-top">
					<label for="adsense_id">サイト運営者 ID:</label> 
					<input id="adsense_id" name="adsense_id" type="text" value="<?php echo $options['adsense_id']; ?>" size="50" /> 
					<a href="https://www.google.com/adsense/v3/app?hl=ja#account" target="_blank">Googleアドセンスで確認</a><br />
					※IDの先頭にある "pub-" は省いてください。
					<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
					<div class="slide-content">
					※この設定は、Googleアドセンス広告を表示できるDigiPressの<span class="red">ショートコード([adsense])を利用する場合に、デフォルトで使用するGoogleアドセンスアカウントのサイト運営者ID</span>を指定するものです(ショートコード使用時に "id" パラメータを省略できます)。<br />
					※この設定が空欄の場合は、adsenseショートコードを利用する際に、"id" パラメータでサイト運営者IDをその都度指定してください。<br />
					※adsenseショートコードの <span class="red">"id" パラメータを指定した場合は、デフォルトのサイト運営者IDよりも "id" パラメータのIDが優先</span>されます。<br />
					<p class="circle1">Googleアドセンスアカウントの運営者ID確認方法</p>
						<div>
						<ol>
						<li>Googleアドセンスに<a href="https://www.google.com/adsense/v3/app?hl=ja#account" target="_blank">ログインしてアカウント設定にアクセス</a>します。</li>
						<li>アカウント情報の「サイト運営者ID」から "pub-" を省いたIDをコピーし、上記テキストボックスにペーストして保存します。<br />
						<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/adsense_id.png" class="bd-grey" />
						</li>
						</ol>
						</div>
					</div>
				</div>
			</div>
			</dd>

		<dt class="dp_set_title1 icon-bookmark">コピーライト設定 : </dt>
			<dd>
				<label for="blog_start_year">サイト運営開設年(西暦):</label> 
				<input id="blog_start_year" name="blog_start_year" type="text" value="<?php echo $options['blog_start_year']; ?>" size="5" /> 年
				<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※この設定は、フッターのコピーライト表記の開始年に利用されます。未指定の場合は、現在の西暦のみが表示されます。
				<p class="checked">例 (開始年に2010を指定):</p>
				<div class="box"><p>&copy; <span class="pink">2010-</span>2013 サイト名.</p>
					※ピンクの部分がセットされます。</div>
			</div>

			</dd>

		<dt class="dp_set_title1 icon-bookmark">カスタム投稿タイプ設定 : </dt>
			<dd>
				<label for="news_cpt_slug_id">「お知らせ」カスタム投稿タイプのスラッグ(ID):</label> 
				<input id="news_cpt_slug_id" name="news_cpt_slug_id" type="text" value="<?php if ($options['news_cpt_slug_id']) { echo $options['news_cpt_slug_id'];} else {echo 'news';} ?>" size="15" /> 
				<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※この設定は、「お知らせ」カスタム投稿タイプ専用のスラッグを任意の文字列に変えるときに指定してください。<br />
				※何も指定しない場合は「news」というスラッグが利用されますが、<span class="ft12px red">既に「news」というスラッグのカテゴリーが存在</span>していた場合は競合が発生するため表示されなくなります。このような場合は<span class="ft12px red">スラッグを変更</span>してください。<br />
				※この設定を変更したあとは、必ず<span class="b ft14px red">WordPressのパーマリンク設定を保存し直してください</span>。
			</div>

			</dd>

		<dt class="dp_set_title1 icon-bookmark">サムネイル表示設定 : </dt>
			<dd>
				<div class="sample_img icon-camera">
				表示サンプル
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/thumb_method.png" />
				</div>

			<div class="pd15px-top pd15px-btm formblock" style="position:relative;">
				<div class="mg12px-btm">
				<input name="thumbnail_method" id="thumbnail_method1" type="radio" value="width" <?php if(($options['thumbnail_method'] == '') || ($options['thumbnail_method'] === 'width')) echo "checked"; ?> />
				<label for="thumbnail_method1">画像の横の長さを基準としてサムネイルを表示する</label>
				</div>

				<div class="mg12px-btm">
				<input name="thumbnail_method" id="thumbnail_method2" type="radio" value="height" <?php if ($options['thumbnail_method'] === 'height') echo "checked"; ?> />
				<label for="thumbnail_method2">画像の縦の長さを基準としてサムネイルを表示する</label>
				</div>
			
				<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※インデックスやアーカイブページで表示される投稿サムネイルの表示スケールの基準を選択します。
				</div>
			</div>
			</dd>

	</dl>
	
	<!-- 保存ボタン -->
	<p class="clearfix">
	<input class="btn btn-save" type="submit" name="dp_save" value="<?php _e(' Save ', 'DigiPress'); ?>" />
	</p>
</div>
<!--
========================================
サイト一般設定
========================================
-->

<input class="btn close_all mg20px-btm" type="button" name="close_all" value="   <?php _e('Close All', 'DigiPress'); ?>   " />


<!--
========================================
HTMLヘッダー設定ここから
========================================
-->
<h3 class="dp_h3 icon-menu"><?php _e('HTML Head Part Setting', 'DigiPress'); ?></h3>
<div class="dp_box">
	<dl>
		<!-- titleタグのタイトル変更有無 -->
		<dt class="dp_set_title1 icon-bookmark">
		&lt;title&gt;タグにセットするサイト名の変更 :
		</dt>
			<dd>
			<div class="formblock  mg12px-top">
			<input name="enable_title_site_name" id="enable_title_site_name" type="checkbox" value="check" <?php if($options['enable_title_site_name']) echo "checked"; ?> />
			<label for="enable_title_site_name">変更する</label>
			</div>
			
			<div id="html_title_block" class="mg15px-top">
			<!-- titleタグのタイトル -->
			<p class="dp_set_title2 icon-triangle-right">
			&lt;title&gt;タグにセットするサイト名(TOP用) :
			</p>
				<div class="dp_indent1">
				<div class="formblock">
				<input type="text" name="title_site_name_top" size="50" value="<?php echo($options['title_site_name_top']); ?>" /><p class="clearfix">※トップページのみに表示されるサイト名を指定します。</p>
				</div>
				</div>
			<p class="dp_set_title2 icon-triangle-right">
			&lt;title&gt;タグにセットするサイト名(記事、アーカイブ用) :
			</p>
				<div class="dp_indent1">
				<div class="formblock">
				<input type="text" name="title_site_name" size="50" value="<?php echo($options['title_site_name']); ?>" />
				<p class="clearfix">※<span class="red">「ページ名」→「サイト名」</span>の順で表示されます。</p>
				</div>
				</div>
			<p class="dp_set_title2 icon-triangle-right">
			ページ名とサイト名のセパレータ(分割記号) :
			</p>
				<div class="dp_indent1">
				<div class="formblock">
				<input type="text" name="title_site_name_separate" size="10" value="<?php echo($options['title_site_name_separate']); ?>" />
				</div>
				</div>

			<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
			<div class="slide-content">
			※「&lt;title&gt;タグにセットするサイト名の変更」がチェックされているときのみに反映されます。<br />
			※チェック(指定)しない場合は、<span class="red">「設定」⇒「一般」にて設定したサイト名(ヘッダー画像上のサイト名)で統一</span>されます。
			</div>
			
			</div>
			</dd>


		<!-- TOPページのmetaタグキーワードの指定 -->
		<dt>
		<p class="dp_set_title1 icon-bookmark">
		&lt;head&gt;～&lt;/head&gt;内の&lt;meta&gt;タグに関する設定 :
		</p>
		</dt>

			<dd>
				<p>※<span class="red">All in One SEO Packプラグインが使用されている場合</span>は、ここで設定した&lt;meta&gt;タグの情報は<span class="red">無効</span>になり、該当プラグインの設定が優先されます。</p>

				<!-- meta キーワードの設定 -->
				<p class="dp_set_title2 icon-triangle-right">
				トップページの&lt;meta&gt;タグの’keywords’にセットするキーワード :
				</p>

					<div class="dp_indent1">
					<input name="enable_meta_def_kw" id="enable_meta_def_kw" type="checkbox" value="check" <?php if($options['enable_meta_def_kw']) echo "checked"; ?> />
					<label for="enable_meta_def_kw">指定する</label>
					</div>

					<div id="html_meta_kw_block" class="mg10px-top">
					<p class="dp_set_title2 icon-triangle-right">
					セットするキーワード (半角カンマ「,」区切り)  :
					</p>
						<div class="dp_indent1">
						<div class="formblock">
						<input type="text" name="meta_def_kw" size="80" value="<?php echo($options['meta_def_kw']); ?>" />
						
						<div class="slide-title icon-attention"><?php _e('Note...', 'DigiPress'); ?></div>
						<div class="slide-content">
						※上記「キーワード」オプションがチェックされているときのみに反映されます。<br />
						※1つのキーワードは、半角カンマ「,」で区切ってください。<br />
						※指定するキーワードは、<span class="red">最大で10個程度まで</span>を目安にしてください。<br />
						※<span class="red">アーカイブページでは、設定したキーワードに "アーカイブ名" が追加されたテキストが&lt;meta&gt;タグのキーワードとして自動的にセット</span>されます。<br />
						※<span class="red">記事ページでは、投稿時に指定した「記事のタグ」が&lt;meta&gt;タグのキーワードとして自動的にセット</span>されます。
						</div>

						</div>
						</div>
					</div>


				<!-- meta ディスクリプションの設定 -->
				<p class="dp_set_title2 icon-triangle-right">
				&lt;meta&gt;タグの’description’にセットするサイト説明 :
				</p>

					<div class="dp_indent1">
					<input name="enable_meta_def_desc" id="enable_meta_def_desc" type="checkbox" value="check" <?php if($options['enable_meta_def_desc']) echo "checked"; ?> />
					<label for="enable_meta_def_desc">指定する</label>
					</div>
					
					<div id="html_meta_desc_block" class="mg10px-top">
					<p class="dp_set_title2 icon-triangle-right">
					セットする説明文 :
					</p>
						<div class="dp_indent1">
						<textarea name="meta_def_desc" cols="70%" rows="3"><?php echo($options['meta_def_desc']); ?></textarea>
						
						<div class="slide-title icon-attention"><?php _e('Note...', 'DigiPress'); ?></div>
						<div class="slide-content">
						※上記「サイト説明」オプションがチェックされているときのみに反映されます。<br />
						※HTMLタグや改行は無効です。<br />
						※指定する説明文は、<span class="red">最大100文字程度まで</span>を目安にしてください。<br />
						※<span class="red">カテゴリページではカテゴリの説明文があればそちらが優先</span>されます。<br />
						※<span class="red">記事ページで、本文の抜粋をメタディスクリプションに指定</span>したい場合は、記事投稿時の<span class="red">「抜粋」欄に文章を記述</span>してください。<br />
						※オプションが有効で<span class="red">説明文を空</span>にした場合は、WordPressの「設定」⇒「一般」の<span class="red">”キャッチフレーズ”に指定したテキストが代入</span>されます。<br />
						※各アーカイブの複数ページ目(カテゴリの2ページ目以降など)では、<span class="red">自動的にページ数を付加してページごとで説明文が重複しない</span>ように設定されます。
						</div>

						</div>
					</div>


				<h3 class="dp_set_title2 icon-triangle-right">OGP(Open Graph Protocol)設定 :</h3>

				<div class="mg10px-top mg20px-l">
					サイトのサムネイル画像URL(og:image用) :
					<input type="text" name="meta_ogp_img_url" size="60" value="<?php echo($options['meta_ogp_img_url']); ?>" />
					
					<div class="slide-title icon-attention mg15px-top"><?php _e('Note...', 'DigiPress'); ?></div>
					<div class="slide-content">
					※推奨画像サイズは、<span class="red">300 x 300 ピクセル以上</span>です。<br />
					※指定する画像URLはサーバーからの<span class="red">相対パスではなく、http:// から始まる絶対パスで指定</span>してください。<br />
					※ここで指定したサムネイル画像は<span class="red">記事ページまたは固定ページ以外</span>のサイト内ページの "og:image" パラメータの値としてセットされます。<br />
					※記事ページまたは固定ページでは、<span class="red">アイキャッチ画像または記事内に掲載した画像のURL</span>が自動的に "og:image" パラメータの値としてセットされます。
					</div>
				</div>

			</dd>
		
		<dt class="dp_set_title1 icon-bookmark">
		&lt;head&gt;～&lt;/head&gt;内のユーザー定義 :
		</dt>
			<dd>
			上記カスタマイズ項目以外に、&lt;head&gt;～&lt;/head&gt;内に任意の定義を含める場合は以下に記述してください。
			<div class="formblock  mg12px-top">
			<textarea name="custom_head_content" cols="100%" rows="5"><?php echo($options['custom_head_content']); ?></textarea>
			</div>

			<div class="slide-title icon-attention"><?php _e('Note...', 'DigiPress'); ?></div>
			<div class="slide-content">
			※headタグ内に、<span class="red">linkタグによる外部CSS、Javascriptなどの指定</span>や、<span class="red">metaタグによるOGPなどの指定</span>をしたい場合はここに記述してください。<br />
			※scriptタグによる<span class="red">Javascriptの直書き</span>も可能です。<br />
			※headタグへの追記は必ずここで指定し、テーマファイル(header.php)自体は絶対に変更しないでください。
			</div>
			</dd>
	</dl>
	
	<!-- 保存ボタン -->
	<p class="clearfix">
	<input class="btn btn-save" type="submit" name="dp_save" value="<?php _e(' Save ', 'DigiPress'); ?>" />
	</p>
</div>
<!--
========================================
HTMLヘッダー設定ここまで
========================================
-->

<input class="btn close_all mg20px-btm" type="button" name="close_all" value="   <?php _e('Close All', 'DigiPress'); ?>   " />

<!--
========================================
サイトヘッダー表示設定ここから
========================================
-->
<h3 class="dp_h3 icon-menu">サイトヘッダー表示設定</h3>
<div class="dp_box">
	<dl>
		<!-- h1タグのタイトル変更有無 -->
		<dt>
		<h3 class="dp_set_title1 icon-bookmark">
		H1タグに表示するサイト名の変更 :
		</h3>
		</dt>
			<dd>
			<div class="formblock">
				<div class="sample_img icon-camera">
				表示サンプル
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/h1_title.png" />
				</div>
			<input name="enable_h1_title" id="enable_h1_title" type="checkbox" value="check" <?php if($options['enable_h1_title']) echo "checked"; ?> />
			<label for="enable_h1_title">変更する</label>
			</div>

			<div id="h1_title_block" class="mg15px-top">
			<!-- h2タグのタイトル -->
			<h3 class="dp_set_title2 icon-triangle-right">
			H1タグに表示するサイトタイト :
			</h3>
				<div class="dp_indent1">
				<div class="formblock">
				<input type="text" name="h1_title" id="h1_title" size="50" value="<?php echo($options['h1_title']); ?>" />
				</div>
				<div class="slide-title icon-attention mg8px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※最上部に表示される、全ページ固定のメインサイト名(H1)を指定します。<br />
				※サイトタイトル(H1)をテキストで表示している場合に表示され、<span class="red">画像で表示している場合はそのタイトル画像の alt 属性に指定</span>されます。
				</div>
				</div>
			</dd>


		<!-- h2タグのタイトル変更有無 -->
		<dt>
		<p class="dp_set_title1 icon-bookmark">
		H2タグに表示するキャッチフレーズの変更 :
		</p>
		</dt>
			<dd>
			<div class="formblock">
				<div class="sample_img icon-camera">
				表示サンプル
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/header_h2.png" />
				</div>
			<input name="enable_h2_title" id="enable_h2_title" type="checkbox" value="check" <?php if($options['enable_h2_title']) echo "checked"; ?> />
			<label for="enable_h2_title">変更する</label>
			</div>
			
			<div id="h2_title_block" class="mg15px-top">
			<!-- h2タグのタイトル -->
			<h3 class="dp_set_title2 icon-triangle-right">
			H2タグに表示するキャッチフレーズ :
			</h3>
				<div class="dp_indent1">
				<div class="formblock">
				<input type="text" name="h2_title_top" size="50" value="<?php echo($options['h2_title_top']); ?>" />
				</div>
				<div><input name="h2_title_paged_show" id="h2_title_paged_show" type="checkbox" value="check" <?php if($options['h2_title_paged_show']) echo "checked"; ?> />
				<label for="h2_title_paged_show">トップページ以外は表示しない</label></div>

				<div class="slide-title icon-attention mg8px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※変更しない場合は、WordPressに設定されているサイト名が表示されます。<br />
				※キャッチフレーズ(H2テキスト)を<span class="red">表示しない場合は、空欄</span>にして保存してください。
				</div>
				</div>
			</div>
			</dd>


		<!-- ヘッダー上のサイト説明の変更 -->
		<dt>
		<p class="dp_set_title1 icon-bookmark">
		ヘッダー画像上のサイト説明文のカスタマイズ :
		</p>
		</dt>
			<dd>
			<div class="formblock">
				<div class="sample_img icon-camera">
				表示サンプル
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/header_desc_area.png" />
				</div>
			<input name="enable_my_desc" id="enable_my_desc" type="checkbox" value="check" <?php if($options['enable_my_desc']) echo "checked"; ?> />
			<label for="enable_my_desc">変更する</label>
			</div>

			<!-- ヘッダー上のサイト説明文 -->
			<div id="header_desc_block" class="mg15px-top">
			<h3 class="dp_set_title2 icon-triangle-right">
			ヘッダー画像上のサイト説明文 ( HTMLタグが使用できます。 ) :
			</h3>
				<div class="dp_indent1">
				<textarea name="my_desc" cols="70%" rows="5"><?php echo($options['my_desc']); ?></textarea>
				
				<div class="slide-title icon-attention"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※トップページのヘッダーエリア内のH2タイトル直下に、サイトの簡単な説明文をカスタマイズする場合に利用します。<br />
				※変更しない場合は、WordPressに設定されているサイトの説明文が表示されます。<br />
				※キャッチフレーズ(H2テキスト)を<span class="red">表示しない場合は、空欄</span>にして保存してください。<br />
				※<span class="red">HTMLタグを使用</span>できます。
				</div>
				
				</div>
			</div>
			</dd>
			
		<!-- トップフローティングメニュー -->
		<dt>
		<p class="dp_set_title1 icon-bookmark">
		フローティングトップメニュー設定 :
		</p>
		</dt>
			<dd>
			<div class="formblock">
				<div class="sample_img icon-camera">
				表示サンプル
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/fixed_menu.png" />
				</div>
				
				<div class="mg15px-btm">
					<input name="show_fixed_menu_search" id="show_fixed_menu_search" type="checkbox" value="true" <?php if($options['show_fixed_menu_search']) echo "checked"; ?> /><label for="show_fixed_menu_search">検索フォームを表示する</label>
					<div id="show_floating_gcs_div" class="mg20px-l mg10px-top">
						<input name="show_floating_gcs" id="show_floating_gcs" type="checkbox" value="true" <?php if($options['show_floating_gcs']) echo "checked"; ?> />
						<label for="show_floating_gcs">検索フォームにGoogleカスタム検索を使用する</label>
					</div>
				</div>

				<div class="mg20px-top">
					<input name="show_fixed_menu_sns" id="show_fixed_menu_sns" type="checkbox" value="true" <?php if($options['show_fixed_menu_sns']) echo "checked"; ?> />
					<label for="show_fixed_menu_sns">RSS/SNSアイコンを表示する</label>
				
					<div id="fixed_menu_sns_block" class="mg15px-top mg20px-l">
						<div class="mg15px-btm">
						<input name="rss_to_feedly" id="rss_to_feedly" type="checkbox" value="true" <?php if($options['rss_to_feedly']) echo "checked"; ?> />
						<label for="rss_to_feedly">RSSをfeedlyにリダイレクトする</label>
						</div>
					<h3 class="dp_set_title2 icon-triangle-right">Twitter URL :</h3>
						<div class="dp_indent1">
						<div class="formblock">
						<input type="text" name="fixed_menu_twitter_url" size="64" value="<?php echo($options['fixed_menu_twitter_url']); ?>" /><br />※サイト専用のTwitterアカウントのURL
						</div>
						</div>
					<h3 class="dp_set_title2 icon-triangle-right">Facebook URL :</h3>
						<div class="dp_indent1">
						<div class="formblock">
						<input type="text" name="fixed_menu_fb_url" size="64" value="<?php echo($options['fixed_menu_fb_url']); ?>" /><br />※サイト専用のFacebookアカウントのURL
						</div>
						</div>
					<h3 class="dp_set_title2 icon-triangle-right">Google+ URL :</h3>
						<div class="dp_indent1">
						<div class="formblock">
						<input type="text" name="fixed_menu_gplus_url" size="64" value="<?php echo($options['fixed_menu_gplus_url']); ?>" /><br />※サイト専用またはあなたのGoogle+アカウントのURL
						</div>
						</div>
					</div>
					<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
					<div class="slide-content">
					※対象外(非表示)とするSNSサービスがある場合は、URLを空にして保存してください。<br />
					※Googleカスタム検索を使用するには、事前に <span class="red">検索エンジンID の設定が必要</span>です。<br />
					<span class="red">[サイト一般動作設定] → [Google カスタム検索設定] </span>にて検索エンジンIDを指定してください。
					※フローティングメニューへのメニューの追加は、WordPressのカスタムメニューから作成してください。<br />
					<a href="nav-menus.php" class="button">カスタムメニューはこちら</a>
					</div>
				</div>
			</dd>

		<!-- パンくずナビ-->
		<dt class="dp_set_title1 icon-bookmark">
		パンくずリストエリアの設定 :
		</dt>
			<dd>
			<div class="formblock">
				<div class="sample_img icon-camera">
				表示サンプル
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/breadcrumb.png" />
				</div>

				<div class="mg12px-btm">
				<input name="hide_home_breadcrumb" id="hide_home_breadcrumb" type="checkbox" value="true" <?php if($options['hide_home_breadcrumb']) echo "checked"; ?> />
				<label for="hide_home_breadcrumb">パンくずリストに「HOME」リンクを表示しない (トップページ以外)</label>
				</div>

				<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※パンくずリストは<span class="red">トップページには表示されません</span>。<br />
				※パンくずリストは自動的に <span class="ft14px b red">microdata化</span>されたタグで出力されます。
				</div>
			</div>
			</dd>
	</dl>
	
	<!-- 保存ボタン -->
	<p class="clearfix">
	<input class="btn btn-save" type="submit" name="dp_save" value="<?php _e(' Save ', 'DigiPress'); ?>" />
	</p>
</div>

<!--
========================================
サイトヘッダー表示設定ここまで
========================================
-->

<input class="btn close_all mg20px-btm" type="button" name="close_all" value="   <?php _e('Close All', 'DigiPress'); ?>   " />

<!--
========================================
トップページ表示設定ここから
========================================
-->
<h3 class="dp_h3 icon-menu">トップページ表示設定</h3>
<div class="dp_box">
	<dl>
		<!-- TOPの表示コンテンツ -->
		<dt class="dp_set_title1 icon-bookmark">共通設定 :</dt>
			<dd>
			<h3 class="dp_set_title2 icon-triangle-right">表示記事数設定 :</h3>
			<div class="dp_indent1">
				<div>PC : <div style="position:relative;left:80px;margin:-22px 0 10px 0;"><input type="text" name="number_posts_index" size="5" value="<?php if ($options['number_posts_index'] !== '') { echo $options['number_posts_index']; } else { echo get_option('posts_per_page'); } ?>" />記事</div>
				</div>
				<div>モバイル : <div style="position:relative;left:80px;margin:-22px 0 10px 0;"><input type="text" name="number_posts_index_mobile" size="5" value="<?php if ($options['number_posts_index_mobile'] !== '') { echo $options['number_posts_index_mobile']; } else { echo get_option('posts_per_page'); } ?>" />記事</div>
				</div>
				<div class="slide-title icon-attention"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※WordPressの既定値に戻すには、空欄にして保存してください。<br />
				※トップページ下部の記事一覧が対象です。
				</div>
			</div>

			<h3 class="dp_set_title2 icon-triangle-right">ページナビゲーションテキスト設定 :</h3>
			<div class="dp_indent1">
				<div class="sample_img icon-camera">対象エリア
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/text_for_2page_top.png" />
				</div>

				<div>2ページ目へのリンクテキスト : <div style="position:relative;top:-20px;left:200px;"><input type="text" name="navigation_text_to_2page" size=30 value="<?php if ($options['navigation_text_to_2page']) { echo $options['navigation_text_to_2page']; } else { echo 'SHOW OLDER POSTS'; } ?>" /></div>
				</div>
				<div class="slide-title icon-attention"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※トップページにはページナビゲーションではなく2ページ目へのリンクのみが表示されます。そのリンクに表示するテキストを指定できます。<br />
				※規定値に戻すには空にして保存してください。<br />
				※その他、全体のページナビゲーションの表示設定については「<span class="red b">サイト一般動作設定</span>」オプションにて変更してください。
				</div>
			</div>
			</dd>
	
		<dt class="dp_set_title1 icon-bookmark">
		ヘッドライン設定 :
		</dt>
		<dd>
			<div class="sample_img icon-camera">対象エリア
			<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/headline.png" />
			</div>

			<div class="mg15px-btm">
				<input name="headline_type" id="headline_type1" type="radio" value="1" <?php if($options['headline_type'] === '1') echo "checked"; ?> />
				<label for="headline_type1">ヘッドラインエリアを表示しない</label>
			</div>

			<div class="mg15px-btm">
				<input name="headline_type" id="headline_type2" type="radio" value="2" <?php if($options['headline_type'] === '2') echo "checked"; ?> />
				<label for="headline_type2">静的テキストを表示する</label>
				<div id="headline_type2_div" class="mg5px-top mg25px-l">
					表示テキスト : <input type="text" name="headline_static_text" size="40" value="<?php echo $options['headline_static_text']; ?>" />(※HTMLタグ可)
				</div>
			</div>
			
			<div class="mg15px-btm">
				<div class="pd10px-btm"><input name="headline_type" id="headline_type3" type="radio" value="3" <?php if($options['headline_type'] === '3') echo "checked"; ?> />
				<label for="headline_type3">コンテンツスライダーを表示する</label></div>
				<div id="headline_type3_div" class="box-c">
					<div class="mg15px-btm mg15px-top">メインタイトル : <input type="text" name="headline_slider_main_title" value="<?php echo $options['headline_slider_main_title']; ?>" size=30 />
					</div>

					 <h3 class="dp_set_title2 icon-triangle-right">表示対象 :</h3>
					 <div class="mg20px-l mg20px-btm">
						 <div class="mg15px-btm">
						 	<p><input name="headline_slider_type" id="headline_slider_type1" type="radio" value="1" <?php if($options['headline_slider_type'] === '1') echo "checked"; ?> />
							<label for="headline_slider_type1">任意の記事へのリンク(※対象記事は投稿オプションにて指定)</label></p>
							<div id="headline_slider_type1_div" class="box-c">
								<div class="mg10px-btm">表示件数 : <input type="text" name="headline_slider_num" value="<?php echo $options['headline_slider_num']; ?>" size=4 />件
								</div>
								<div class="mg10px-btm">表示順序 : 
									<select name="headline_slider_order" size="1" style="margin:0;">
										<option value="post_date" <?php if($options['headline_slider_order'] === "post_date") echo "selected=\"selected\""; ?>>投稿日付順</option>
										<option value="rand" <?php if($options['headline_slider_order'] === "rand") echo "selected=\"selected\""; ?>>ランダム</option>
									</select>
								</div>
								<div class="mg10px-btm"><input type="checkbox" name="headline_slider_date" id="headline_slider_date" value="true" <?php if ($options['headline_slider_date']) echo 'checked'; ?> /><label for="headline_slider_date">投稿日付を表示する</label>
								</div>

								<div class="slide-title icon-attention"><?php _e('Note...', 'DigiPress'); ?></div>
								<div class="slide-content">
								※記事をヘッドラインの対象とするには、投稿画面の「投稿オプション」にて "<span class="red">この記事をヘッドラインに含める</span>" にチェックをして投稿・更新をしてください。
								</div>
							</div>
						</div>
						 <div class="mg10px-btm">
						 	<p><input name="headline_slider_type" id="headline_slider_type2" type="radio" value="2" <?php if($options['headline_slider_type'] === '2') echo "checked"; ?> />
							<label for="headline_slider_type2">任意のテキスト(※HTMLタグ可)</label></p>
							<div id="headline_slider_type2_div" class="box-c">
								<div class="mg10px-btm">表示テキスト1 : <input type="text" name="headline_slider_text1" size="40" value="<?php echo $options['headline_slider_text1']; ?>" /></div>
								<div class="mg10px-btm">表示テキスト2 : <input type="text" name="headline_slider_text2" size="40" value="<?php echo $options['headline_slider_text2']; ?>" /></div>
								<div class="mg10px-btm">表示テキスト3 : <input type="text" name="headline_slider_text3" size="40" value="<?php echo $options['headline_slider_text3']; ?>" /></div>
								<div class="mg10px-btm">表示テキスト4 : <input type="text" name="headline_slider_text4" size="40" value="<?php echo $options['headline_slider_text4']; ?>" /></div>
								<div class="mg10px-btm">表示テキスト5 : <input type="text" name="headline_slider_text5" size="40" value="<?php echo $options['headline_slider_text5']; ?>" /></div>
								<div class="mg10px-btm"><input type="checkbox" name="headline_slider_shuffle" id="headline_slider_shuffle" value="true" <?php if ($options['headline_slider_shuffle']) echo 'checked'; ?> /><label for="headline_slider_shuffle">ランダムに表示する</label></div>

							</div>
						</div>
					</div>
					<h3 class="dp_set_title2 icon-triangle-right">動作設定 :</h3>
					<div class="mg20px-l">
						<p><input name="headline_slider_fx" id="headline_slider_fx1" type="radio" value="1" <?php if($options['headline_slider_fx'] === '1') echo "checked"; ?> />
							<label for="headline_slider_fx1">スライダー</label></p>
						<div id="headline_slider_fx1_div" class="box-c">
							<div class="mg5px-btm">表示時間 : <input type="text" name="headline_slider_time" value="<?php echo $options['headline_slider_time']; ?>" size=4 />ミリ秒 (1秒 = 1000)
							</div>
							<div class="mg5px-btm"><input type="checkbox" name="headline_hover_stop" id="headline_hover_stop" value="true" <?php if ($options['headline_hover_stop']) echo 'checked'; ?> /><label for="headline_hover_stop">ホバー時はスライダーを停止する</label>
							</div>
							<div class="mg5px-btm"><input type="checkbox" name="headline_arrow" id="headline_arrow" value="true" <?php if ($options['headline_arrow']) echo 'checked'; ?> /><label for="headline_arrow">ナビゲーション(矢印)を表示する</label>
							</div>
						</div>

						<p><input name="headline_slider_fx" id="headline_slider_fx2" type="radio" value="2" <?php if($options['headline_slider_fx'] === '2') echo "checked"; ?> />
							<label for="headline_slider_fx2">スクロールティッカー</label></p>
						<div id="headline_slider_fx2_div" class="box-c">
							<div class="mg5px-btm">ベロシティ(速度) : <input type="text" name="headline_ticker_velocity" value="<?php echo $options['headline_ticker_velocity']; ?>" size=4 /> (例:0.08 など)
							</div>
							<div class="mg5px-btm"><input type="checkbox" name="headline_ticker_hover_stop" id="headline_ticker_hover_stop" value="true" <?php if ($options['headline_ticker_hover_stop']) echo 'checked'; ?> /><label for="headline_ticker_hover_stop">ホバー時はスクロールを停止する</label>
							</div>

							<div class="slide-title icon-attention"><?php _e('Note...', 'DigiPress'); ?></div>
								<div class="slide-content">
								※ベロシティは数値を大きくするとスクロール速度が速くなり、小さくすると遅くなります。デフォルトは「<span class="red">0.07</span>」です。
								</div>
						</div>			
					</div>
				</div>
			</div>
		</dd>
		
		<dt class="dp_set_title1 icon-bookmark">
		トップページの上部コンテンツ表示設定 :
		</dt>
			<dd>
				<!-- 表示有無 -->
				<div class="formblock">
					<div class="sample_img icon-camera">
					対象エリア
					<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/content_top.png" />
					</div>
				<input name="show_top_content" id="show_top_content" type="checkbox" value="check" <?php if($options['show_top_content']) echo "checked"; ?> />
				<label for="show_top_content">新着記事一覧またはカスタム投稿タイプの記事一覧を表示する</label>
				</div>
				
				<div id="home_top_content_dd" class="box">
					<div id="top_content_new_entry" class="pd15px-top mg20px-btm">
						<!-- 対象カテゴリ -->
						<h4 class="dp_set_title2 icon-triangle-right pd12px-btm">
						対象カテゴリまたはカスタム投稿タイプの指定 :
						</h4>
						<div class="mg20px-l mg30px-btm formblock">
							<div class="mg12px-btm">
							<input name="show_specific_cat_index_top" id="show_specific_cat_index_top1" type="radio" value="none" <?php if(($options['show_specific_cat_index_top'] == '') || ($options['show_specific_cat_index_top'] === 'none')) echo "checked"; ?> />
							<label for="show_specific_cat_index_top1">指定しない (全カテゴリの新着記事)</label>
							</div>

							<div class="mg12px-btm">
							<input name="show_specific_cat_index_top" id="show_specific_cat_index_top2" type="radio" value="cat" <?php if($options['show_specific_cat_index_top'] === 'cat') echo "checked"; ?> />
							<label for="show_specific_cat_index_top2">特定のカテゴリの新着記事のみ表示する</label>
								<div class="mg15px-l pd12px-top" id="div_specific_cat_index_top">
									<div id="index_top_target_cat_div">対象カテゴリ : 
									<?php wp_dropdown_categories(
											array(
												'name'			=> 'specific_cat_index_top',
												'hierarchical'	=> 1,
												'selected'		=> $options['specific_cat_index_top']
											)
									); ?>
									</div>

									<div class="mg15px-btm">
									<input name="index_top_except_cat" id="index_top_except_cat" type="checkbox" value="true" <?php if($options['index_top_except_cat']) echo "checked"; ?> />
									<label for="index_top_except_cat">除外カテゴリを指定する</label>
									<div class="mg10px-top mg15px-l" id="index_top_except_cat_id_div">除外カテゴリID : <input type="text" name="index_top_except_cat_id" size="20" value="<?php echo($options['index_top_except_cat_id']); ?>" />
									</div>
									<div class="slide-title icon-attention orange-b mg10px-top"><?php _e('Note...', 'DigiPress'); ?></div>
									<div class="slide-content">
									※除外カテゴリIDは<span class="red">半角数字</span>で指定してください。<br />
									※IDを複数指定する場合は、<span class="red">カンマ( , )</span>で区切ってください。<br />
									※除外カテゴリの指定を有効にした場合は、対象カテゴリ設定は無効になります。
									</div>
									</div>
								</div>
							</div>

							<div>
							<input name="show_specific_cat_index_top" id="show_specific_cat_index_top3" type="radio" value="custom" <?php if($options['show_specific_cat_index_top'] === 'custom') echo "checked"; ?> />
							<label for="show_specific_cat_index_top3">特定のカスタム投稿タイプの記事のみ表示する</label>
								<div class="mg15px-l pd12px-top" id="div_specific_post_type_index_top">対象カスタム投稿タイプ : 
								<?php $post_types = get_post_types(
										array(
											'public'	=> true,
											'_builtin'	=> false),
										'objects'
										); ?>
								<select name="specific_post_type_index_top" class="postform">
								<?php
								foreach ($post_types as $post_type ) {
									if ($options['specific_post_type_index_top'] === $post_type->name) {
										echo '<option value="' . $post_type->name . '" selected="selected">' . $post_type->label . '</option>';
									} else {
										echo '<option value="' . $post_type->name . '">' . $post_type->label . '</option>';
									}
								} ?>
								</select>
								</div>
							</div>
						</div>


						<!-- 最新記事一覧タイトルラベル -->
						<h4 class="dp_set_title2 icon-triangle-right pd12px-btm">
						トップページの「最新記事一覧」ボックスのタイトルラベル :
						</h4>
					
						<div class="mg20px-l formblock">
						<input type="text" name="new_post_label" size="40" value="<?php echo($options['new_post_label']); ?>" />
						</div>

						<!-- 最新記事表示件数 -->
						<h4 class="dp_set_title2 icon-triangle-right pd12px-btm" id="topnewentry_id">
						トップページの最新記事タイトルリンクの表示件数 :
						</h4>
						<div class="mg20px-l formblock">
						<select name="new_post_count" size="1">
							<option value="3" <?php if($options['new_post_count'] == 3) echo "selected=\"selected\""; ?>>3件</option>
							<option value="4" <?php if($options['new_post_count'] == 4) echo "selected=\"selected\""; ?>>4件</option>
							<option value="5" <?php if($options['new_post_count'] == 5) echo "selected=\"selected\""; ?>>5件</option>
							<option value="6" <?php if($options['new_post_count'] == 6) echo "selected=\"selected\""; ?>>6件</option>
							<option value="7" <?php if($options['new_post_count'] == 7) echo "selected=\"selected\""; ?>>7件</option>
							<option value="8" <?php if($options['new_post_count'] == 8) echo "selected=\"selected\""; ?>>8件</option>
							<option value="9" <?php if($options['new_post_count'] == 9) echo "selected=\"selected\""; ?>>9件</option>
							<option value="10" <?php if($options['new_post_count'] == 10) echo "selected=\"selected\""; ?>>10件</option>
							<option value="11" <?php if($options['new_post_count'] == 11) echo "selected=\"selected\""; ?>>11件</option>
							<option value="12" <?php if($options['new_post_count'] == 12) echo "selected=\"selected\""; ?>>12件</option>
							<option value="13" <?php if($options['new_post_count'] == 13) echo "selected=\"selected\""; ?>>13件</option>
							<option value="14" <?php if($options['new_post_count'] == 14) echo "selected=\"selected\""; ?>>14件</option>
							<option value="15" <?php if($options['new_post_count'] == 15) echo "selected=\"selected\""; ?>>15件</option>
							<option value="16" <?php if($options['new_post_count'] == 16) echo "selected=\"selected\""; ?>>16件</option>
							<option value="17" <?php if($options['new_post_count'] == 17) echo "selected=\"selected\""; ?>>17件</option>
							<option value="18" <?php if($options['new_post_count'] == 18) echo "selected=\"selected\""; ?>>18件</option>
							<option value="19" <?php if($options['new_post_count'] == 19) echo "selected=\"selected\""; ?>>19件</option>
							<option value="20" <?php if($options['new_post_count'] == 20) echo "selected=\"selected\""; ?>>20件</option>
							<option value="21" <?php if($options['new_post_count'] == 21) echo "selected=\"selected\""; ?>>21件</option>
							<option value="22" <?php if($options['new_post_count'] == 22) echo "selected=\"selected\""; ?>>22件</option>
							<option value="23" <?php if($options['new_post_count'] == 23) echo "selected=\"selected\""; ?>>23件</option>
							<option value="24" <?php if($options['new_post_count'] == 24) echo "selected=\"selected\""; ?>>24件</option>
							<option value="25" <?php if($options['new_post_count'] == 25) echo "selected=\"selected\""; ?>>25件</option>
						</select>
						</div>

						<!-- 投稿サムネイル表示有無 -->
						<h4 class="dp_set_title2 icon-triangle-right pd12px-btm">
						投稿サムネイル表示 :
						</h4>
						<div class="mg20px-l formblock">
						<input name="show_thumbnail" id="show_thumbnail" type="checkbox" value="true" <?php if($options['show_thumbnail']) echo "checked"; ?> />
						<label for="show_thumbnail">表示する</label>
						</div>
						
						<!-- 投稿日表示有無 -->
						<h4 class="dp_set_title2 icon-triangle-right pd12px-btm">
						記事メタ情報表示設定 :
						</h4>
						<div class="mg20px-l formblock">
							<div class="mg12px-btm">
							<input name="show_pubdate" id="show_pubdate" type="checkbox" value="check" <?php if($options['show_pubdate']) echo "checked"; ?> />
							<label for="show_pubdate">投稿日を表示</label><br />
							<span class="pd6px-top mg15px-l ft11px">※記事タイトルの前に表示される投稿日(○○月○○日 : )。</span>
							</div>

							<div class="mg12px-btm">
							<input name="show_cat_entrylist" id="show_cat_entrylist" type="checkbox" value="check" <?php if($options['show_cat_entrylist']) echo "checked"; ?> />
							<label for="show_cat_entrylist">カテゴリーを表示</label>
							</div>
							
							<div class="mg12px-btm">
							<input name="show_comment_num_index" id="show_comment_num_index" type="checkbox" value="true" <?php if($options['show_comment_num_index']) echo "checked"; ?> />
							<label for="show_comment_num_index">コメント数を表示</label>
							</div>
							
							<div class="mg12px-btm">
							<input name="show_hatebu_number" id="show_hatebu_number" type="checkbox" value="true" <?php if($options['show_hatebu_number']) echo "checked"; ?> />
							<label for="show_hatebu_number">はてなブックマーク数を表示</label>
							</div>
						
						</div>
						
						<!--  ***** ツイート数、いいね数(将来予定 20121201) ***** -->
						<div style="display:none;">
							<div class="mg6px-btm">
							<input name="show_tweet_number" id="show_tweet_number" type="checkbox" value="true" <?php if($options['show_tweet_number']) echo "checked"; ?> />
							<label for="show_tweet_number">ツイート数を表示(※)</label>
							</div>
							<div class="mg10px-btm">
							<input name="show_likes_number" id="show_likes_number" type="checkbox" value="true" <?php if($options['show_likes_number']) echo "checked"; ?> />
							<label for="show_likes_number">Facebookの「いいね！」数を表示(※)</label>
							</div>
							
							<div class="slide-title icon-attention"><?php _e('Note...', 'DigiPress'); ?></div>
							<div class="slide-content">
							※ツイート数、「いいね！」数を表示する場合、取得処理に時間がかかるため、<span class="red">ページの表示速度が著しく遅くなる</span>場合があります。表示の有無はレスポンスとのバランスを考慮して慎重に決定してください。
							</div>
						</div>
					</div>
				</div>

				<div class="slide-title icon-attention mg20px-top">フリーコンテンツの表示について</div>
				<div class="slide-content">
					<p>コンテンツエリアの上部に任意のコンテンツを表示する場合は、「<a href="widgets.php" class="b ft15px">ウィジェット</a>」の「<span class="b ft15px pink">メインコンテンツエリア上部</span>」ウィジェットエリアへ テキストウィジェットなどを利用して表示してください。</p>
					<div class="pd20px"><img src="<?php echo DP_THEME_URI ?>/inc/admin/img/content_top_widget.png" /></div>
				</div>
			</dd>

		<!-- TOPの表示コンテンツ -->
		<dt class="dp_set_title1 icon-bookmark">
		トップページの下部コンテンツ表示設定 :
		</dt>
			<dd>
				<!-- 表示有無 -->
				<div class="formblock">
					<div class="sample_img icon-camera">
					対象エリア
					<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/content_bottom.png" />
					</div>
				<input name="show_top_under_content" id="show_top_under_content" type="checkbox" value="check" <?php if($options['show_top_under_content']) echo "checked"; ?> />
				<label for="show_top_under_content">コンテンツを表示する</label>
				</div>
				
				<div id="home_bottom_content_dd" class="box">
					<!-- 最新記事の表示形式 -->
					<div id="top_posts_show_setting" class="pd15px-top">
						
						<!-- 対象カテゴリ -->
						<h4 class="dp_set_title2 icon-triangle-right pd12px-btm">
						対象カテゴリまたはカスタム投稿タイプの指定 :
						</h4>
						<div class="mg20px-l mg30px-btm formblock">
							<div class="mg12px-btm">
							<input name="show_specific_cat_index" id="show_specific_cat_index1" type="radio" value="none" <?php if(($options['show_specific_cat_index'] == '') || ($options['show_specific_cat_index'] === 'none')) echo "checked"; ?> />
							<label for="show_specific_cat_index1">指定しない (デフォルト)</label>
							</div>

							<div class="mg12px-btm">
							<input name="show_specific_cat_index" id="show_specific_cat_index2" type="radio" value="cat" <?php if($options['show_specific_cat_index'] === 'cat') echo "checked"; ?> />
							<label for="show_specific_cat_index2">特定のカテゴリの記事のみ表示する</label>
								<div class="mg15px-l pd12px-top" id="div_specific_cat_index">
									<div id="index_bottom_target_cat_div">対象カテゴリ : 
									<?php wp_dropdown_categories(
											array(
												'name'			=> 'specific_cat_index',
												'hierarchical'	=> 1,
												'selected'		=> $options['specific_cat_index']
											)
									); ?>
									</div>

									<div class="mg15px-btm">
									<input name="index_bottom_except_cat" id="index_bottom_except_cat" type="checkbox" value="true" <?php if($options['index_bottom_except_cat']) echo "checked"; ?> />
									<label for="index_bottom_except_cat">除外カテゴリを指定する</label>
									<div class="mg10px-top mg15px-l" id="index_bottom_except_cat_id_div">除外カテゴリID : <input type="text" name="index_bottom_except_cat_id" size="20" value="<?php echo($options['index_bottom_except_cat_id']); ?>" />
									</div>
									<div class="slide-title icon-attention orange-b mg10px-top"><?php _e('Note...', 'DigiPress'); ?></div>
									<div class="slide-content">
									※除外カテゴリIDは<span class="red">半角数字</span>で指定してください。<br />
									※IDを複数指定する場合は、<span class="red">カンマ( , )</span>で区切ってください。<br />
									※除外カテゴリの指定を有効にした場合は、対象カテゴリ設定は無効になります。
									</div>
									</div>
								</div>
							</div>
							<div>
							<input name="show_specific_cat_index" id="show_specific_cat_index3" type="radio" value="custom" <?php if($options['show_specific_cat_index'] === 'custom') echo "checked"; ?> />
							<label for="show_specific_cat_index3">特定のカスタム投稿タイプの記事のみ表示する</label>
								<div class="mg15px-l pd12px-top" id="div_specific_post_type_index">対象カスタム投稿タイプ : 
								<?php $post_types = get_post_types(
										array(
											'public'	=> true,
											'_builtin'	=> false),
										'objects'
										); ?>
								<select name="specific_post_type_index" class="postform">
								<?php
								foreach ($post_types as $post_type ) {
									if ($options['specific_post_type_index'] === $post_type->name) {
										echo '<option value="' . $post_type->name . '" selected="selected">' . $post_type->label . '</option>';
									} else {
										echo '<option value="' . $post_type->name . '">' . $post_type->label . '</option>';
									}
								} ?>
								</select>
								</div>
							</div>
						</div>
						
					<h4 class="dp_set_title2 icon-triangle-right pd12px-btm">各記事の表示形式 :</h4>
						<div class="clearfix mg20px-l">

							<div class="mg18px-btm">
								<input name="top_post_show_type" id="top_post_show_type1" type="radio" value="normal" <?php if($options['top_post_show_type'] === 'normal') echo "checked"; ?> />
								<label for="top_post_show_type1">通常 ( ※一般的なブログ形式のように最新記事を順番に表示 )</label>
					
								<div class="mg12px-up pd18px-l formblock">
									<div class="mg10px-btm"><input name="top_excerpt_type" id="top_excerpt_type1" type="radio" value="all" <?php if($options['top_excerpt_type'] === 'all') echo "checked"; ?> />
									<label for="top_excerpt_type1">全文 ( ※”追記あり(more指定)”にて投稿することで、追記以前の記事と [続きを読む] リンクを表示)</label></div>
									
									<div><input name="top_excerpt_type" id="top_excerpt_type2" type="radio" value="excerpt" <?php if($options['top_excerpt_type'] === 'excerpt') echo "checked"; ?> />
									<label for="top_excerpt_type2">概要または抜粋 ( ※120文字まで / HTMLタグは無効化　投稿サムネイル付き)</label>
									</div>
								</div>

								<div class="sample_img icon-camera mg10px-top pd18px-l">
								表示サンプル
								<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/show_post_normal.png" />
								</div>
							</div>

							<div class="mg18px-btm">
								<input name="top_post_show_type" id="top_post_show_type2" type="radio" value="table" <?php if($options['top_post_show_type'] === 'table') echo "checked"; ?> />
							<label for="top_post_show_type2">ポートフォリオ ( ※投稿サムネイル上に記事タイトルを表示したテーブル形式 )</label>
								<div class="sample_img icon-camera pd18px-l pd5px-up">
								表示サンプル
								<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/show_post_portfolio.png" />
								</div>
							</div>

							<div>
								<input name="top_post_show_type" id="top_post_show_type3" type="radio" value="gallery" <?php if($options['top_post_show_type'] === 'gallery') echo "checked"; ?> />
								<label for="top_post_show_type3">マガジン ( ※投稿サムネイルと記事概要を敷き詰めた表示形式 )</label>
								<div class="sample_img icon-camera pd18px-l pd5px-up">
								表示サンプル
								<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/show_posts_magazine.png" />
								</div>
							</div>

							<div>ポートフォリオまたはマガジン領域全体のタイトル : <br />
							<div class="mg12px-l"><input type="text" name="top_posts_table_title" size=30 value="<?php echo($options['top_posts_table_title']); ?>" /><br />
							※<span class="red">タイトルを表示しない</span>場合は、<span class="red">テキストボックスを空にして保存</span>してください。</div>
							</div>

							<div class="slide-title icon-attention mg15px-top"><?php _e('Note...', 'DigiPress'); ?></div>
							<div class="slide-content">
							※ポートフォリオ形式の場合、記事タイトルが184文字(はてなブックマーク数を表示する場合は180文字)以上のときは省略されます。<br />
							※「概要または抜粋」、「ポートフォリオ」、「マガジン」形式の場合は、<span class="red">投稿サムネイル(アイキャッチ画像 or 記事内の画像の自動選択)</span>が表示されます。アイキャッチ画像はWordPressの記事編集画面にて記事ごとにアップロードや指定が行えます。<br />
							※アイキャッチ画像が記事に設定されていない場合は、記事内で最初に見つかったimgタグの画像を投稿サムネイルとして表示します。<br />
							※アイキャッチ画像も記事内に画像も見つからない場合は、DigiPressが持つアイキャッチ用の複数の画像からランダムに選ばれ表示されます。<br />
							※DigiPressの既定のアイキャッチ画像を変更する場合は、<span class="red">テーマフォルダの "/img/post_thumbnail/"</span>内の画像を自由に置き換えてください。
							</div>
						</div>
						
					<h4 class="dp_set_title2 icon-triangle-right mg20px-top pd15px-btm">ソーシャルネットワークサービス連携設定 :</h4>

						<div class="clearfix mg20px-l">
							<div class="sample_img icon-camera">
							表示サンプル
							<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/show_share_num_after_title.png" />
							</div>
							
							<div class="mg6px-btm">
							<input name="hatebu_number_after_title_top" id="hatebu_number_after_title_top"  type="checkbox" value="check" <?php if($options['hatebu_number_after_title_top']) echo "checked"; ?> />
							<label for="hatebu_number_after_title_top">記事タイトルの後に、はてなブックマーク数を表示</label>
							</div>
							
							<div class="mg6px-btm">
							<input name="tweet_number_after_title_top" id="tweet_number_after_title_top"  type="checkbox" value="check" <?php if($options['tweet_number_after_title_top']) echo "checked"; ?> />
							<label for="tweet_number_after_title_top">記事タイトルの後に、ツイート数を表示</label>
							</div>

							<div class="mg15px-btm">
							<input name="likes_number_after_title_top" id="likes_number_after_title_top"  type="checkbox" value="check" <?php if($options['likes_number_after_title_top']) echo "checked"; ?> />
							<label for="likes_number_after_title_top">記事タイトルの後に、Facebookの「いいね！」数を表示</label>
							</div>
						</div>
					</div>
			</dd>
	</dl>
	
	<!-- 保存ボタン -->
	<p class="clearfix">
	<input class="btn btn-save" type="submit" name="dp_save" value="<?php _e(' Save ', 'DigiPress'); ?>" />
	</p>
</div>
<!--
========================================
トップページ表示設定ここまで
========================================
-->

<input class="btn close_all mg20px-btm" type="button" name="close_all" value="   <?php _e('Close All', 'DigiPress'); ?>   " />

<!--
========================================
アーカイブページ表示設定ここから
========================================
-->
<h3 class="dp_h3 icon-menu">アーカイブページ表示設定</h3>
<div class="dp_box">
<p>アーカイブページとは、<span class="red">サイトトップ、カテゴリー、検索結果、年月日別などの記事一覧が表示される形式(単一記事、単一ページ以外)のページ</span>を指します。</p>
	<dl>
		<!-- アーカイブページ記事表示タイプ -->
		<dt class="dp_set_title1 icon-bookmark">
		共通設定 :
		</dt>
			<dd>
				<h3 class="dp_set_title2 icon-triangle-right">表示記事数設定 :</h3>
				<div class="dp_indent1">
					<h4 class="dp_set_title3">PC用</h4>
					<div class="mg15px-l">
						<div>
						カテゴリーページ : <div style="position:relative;left:120px;margin:-22px 0 10px 0;"><input type="text" name="number_posts_category" size="5" value="<?php if ($options['number_posts_category'] !== '') { echo $options['number_posts_category']; } else { echo get_option('posts_per_page'); } ?>" />記事</div>
						</div>
						<div>
						タグページ : <div style="position:relative;left:120px;margin:-22px 0 10px 0;"><input type="text" name="number_posts_tag" size="5" value="<?php if ($options['number_posts_tag'] !== '') { echo $options['number_posts_tag']; } else { echo get_option('posts_per_page'); } ?>" />記事</div>
						</div>
						<div>
						検索結果ページ : <div style="position:relative;left:120px;margin:-22px 0 10px 0;"><input type="text" name="number_posts_search" size="5" value="<?php if ($options['number_posts_search'] !== '') { echo $options['number_posts_search']; } else { echo get_option('posts_per_page'); } ?>" />記事</div>
						</div>
						<div>
						日付アーカイブ : <div style="position:relative;left:120px;margin:-22px 0 10px 0;"><input type="text" name="number_posts_date" size="5" value="<?php if ($options['number_posts_date'] !== '') { echo $options['number_posts_date']; } else { echo get_option('posts_per_page'); } ?>" />記事</div>
						</div>
					</div>
					
					<h4 class="dp_set_title3">モバイル用</h4>
					<div class="mg15px-l">
						<div>
						カテゴリーページ : <div style="position:relative;left:120px;margin:-22px 0 10px 0;"><input type="text" name="number_posts_category_mobile" size="5" value="<?php if ($options['number_posts_category_mobile'] !== '') { echo $options['number_posts_category_mobile']; } else { echo get_option('posts_per_page'); } ?>" />記事</div>
						</div>
						<div>
						タグページ : <div style="position:relative;left:120px;margin:-22px 0 10px 0;"><input type="text" name="number_posts_tag_mobile" size="5" value="<?php if ($options['number_posts_tag_mobile'] !== '') { echo $options['number_posts_tag_mobile']; } else { echo get_option('posts_per_page'); } ?>" />記事</div>
						</div>
						<div>
						検索結果ページ : <div style="position:relative;left:120px;margin:-22px 0 10px 0;"><input type="text" name="number_posts_search_mobile" size="5" value="<?php if ($options['number_posts_search_mobile'] !== '') { echo $options['number_posts_search_mobile']; } else { echo get_option('posts_per_page'); } ?>" />記事</div>
						</div>
						<div>
						日付アーカイブ : <div style="position:relative;left:120px;margin:-22px 0 10px 0;"><input type="text" name="number_posts_date_mobile" size="5" value="<?php if ($options['number_posts_date_mobile'] !== '') { echo $options['number_posts_date_mobile']; } else { echo get_option('posts_per_page'); } ?>" />記事</div>
						</div>
					</div>

					<div class="slide-title icon-attention"><?php _e('Note...', 'DigiPress'); ?></div>
					<div class="slide-content">
					※WordPressの既定値に戻すには、空欄にして保存してください。
					</div>
				</div>

				<h3 class="dp_set_title2 icon-triangle-right">ページナビゲーションテキスト設定 :</h3>
				<div class="dp_indent1">
					<div class="sample_img icon-camera">対象エリア
					<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/text_for_2page_top.png" />
					</div>

					<div>2ページ目へのリンクテキスト : <div style="position:relative;top:-20px;left:200px;"><input type="text" name="navigation_text_to_2page_archive" size=30 value="<?php if ($options['navigation_text_to_2page_archive']) { echo $options['navigation_text_to_2page_archive']; } else { echo 'SHOW OLDER POSTS'; } ?>" /></div>
					</div>
					<div class="slide-title icon-attention"><?php _e('Note...', 'DigiPress'); ?></div>
					<div class="slide-content">
					※1ページ目にはページナビゲーションではなく2ページ目へのリンクのみが表示されます。そのリンクに表示するテキストを指定できます。<br />
					※規定値に戻すには空にして保存してください。<br />
					※その他、全体のページナビゲーションの表示設定については「<span class="red b">サイト一般動作設定</span>」オプションにて変更してください。
					</div>
				</div>
			</dd>

		<dt class="dp_set_title1 icon-bookmark">
		記事一覧表示形式設定 :
		</dt>
			<dd>
				<div class="mg20px-btm"><h3 class="dp_set_title2 icon-triangle-right">共通設定</h3>
					<div class="mg20px-l">
						<div class="mg18px-btm">
							<input name="archive_post_show_type" id="archive_post_show_type1" type="radio" value="normal" <?php if($options['archive_post_show_type'] === 'normal') echo "checked"; ?> />
							<label for="archive_post_show_type1">通常 ( ※一般的なブログ形式のように最新記事を順番に表示 )</label>
				
							<div class="mg12px-up pd18px-l formblock">
								<div class="mg10px-btm"><input name="archive_excerpt_type" id="archive_excerpt_type1" type="radio" value="all" <?php if($options['archive_excerpt_type'] === 'all') echo "checked"; ?> />
								<label for="archive_excerpt_type1">全文 ( ※”追記あり”にて投稿することで、追記以前の記事と [続きを読む] リンクを表示)</label></div>
								
								<div><input name="archive_excerpt_type" id="archive_excerpt_type2" type="radio" value="excerpt" <?php if($options['archive_excerpt_type'] === 'excerpt') echo "checked"; ?> />
								<label for="archive_excerpt_type2">概要または抜粋 ( ※120文字まで / HTMLタグは無効化　投稿サムネイル付き)</label>
								</div>
							</div>

							<div class="sample_img icon-camera mg10px-top pd18px-l">
							表示サンプル
							<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/show_post_normal.png" />
							</div>
						</div>

						<div class="mg18px-btm">
							<input name="archive_post_show_type" id="archive_post_show_type2" type="radio" value="table" <?php if($options['archive_post_show_type'] === 'table') echo "checked"; ?> />
							<label for="archive_post_show_type2">ポートフォリオ ( ※投稿サムネイル上に記事タイトルを表示したテーブル形式 )</label>
							<div class="sample_img icon-camera pd10px-top pd18px-l">
							表示サンプル
							<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/show_post_portfolio.png" />
							</div>
						</div>

						<div>
							<input name="archive_post_show_type" id="archive_post_show_type3" type="radio" value="gallery" <?php if($options['archive_post_show_type'] === 'gallery') echo "checked"; ?> />
							<label for="archive_post_show_type3">マガジン ( ※投稿サムネイルと記事概要を敷き詰めた表示形式 )</label>
							<div class="sample_img icon-camera pd18px-l pd5px-up">
							表示サンプル
							<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/show_posts_magazine.png" />
							</div>
						</div>

						<div class="slide-title icon-attention"><?php _e('Note...', 'DigiPress'); ?></div>
						<div class="slide-content">
						※ポートフォリオ形式の場合、記事タイトルが184文字(はてなブックマーク数を表示する場合は180文字)以上のときは省略されます。<br />
						※「概要または抜粋」、「ポートフォリオ」、「マガジン」形式の場合は、<span class="red">投稿サムネイル(アイキャッチ画像 or 記事内の画像の自動選択)</span>が表示されます。アイキャッチ画像はWordPressの記事編集画面にて記事ごとにアップロードや指定が行えます。<br />
						※アイキャッチ画像が記事に設定されていない場合は、記事内で最初に見つかったimgタグの画像を投稿サムネイルとして表示します。<br />
						※アイキャッチ画像も記事内に画像も見つからない場合は、DigiPressが持つアイキャッチ用の複数の画像からランダムに選ばれ表示されます。<br />
						※DigiPressの既定のアイキャッチ画像を変更する場合は、<span class="red">テーマフォルダの "/img/post_thumbnail/"</span>内の画像を自由に置き換えてください。
						</div>
					</div>
				</div>

				<div><h3 class="dp_set_title2 icon-triangle-right">カテゴリー別設定</h3>
					<div class="mg20px-l">
						<div class="mg15px-btm">
							<div>通常(概要または抜粋)形式で表示するカテゴリー :</div>
							<input type="text" name="show_type_cat_normal" class="mg20px-l" size=30 value="<?php echo $options['show_type_cat_normal']; ?>" />
						</div>
						<div class="mg15px-btm">
							<div>ポートフォリオ形式で表示するカテゴリー :</div>
							<input type="text" name="show_type_cat_portfolio" class="mg20px-l" size=30 value="<?php echo $options['show_type_cat_portfolio']; ?>" />
						</div>

						<div class="mg15px-btm">
							<div>マガジン形式で表示するカテゴリー :</div>
							<input type="text" name="show_type_cat_magazine" class="mg20px-l" size=30 value="<?php echo $options['show_type_cat_magazine']; ?>" />
						</div>

						<div class="slide-title icon-attention"><?php _e('Note...', 'DigiPress'); ?></div>
						<div class="slide-content">
						※アーカイブ共通設定と区別して、個別に特定のカテゴリーページのみ別の表示形式にする場合にその表示形式と対象の<span class="red">カテゴリーIDまたはカテゴリースラッグ</span>を指定してください。<br />
						※指定するカテゴリーが<span class="red">複数ある場合は、対象のカテゴリーIDまたはスラッグを半角カンマ「,」で区切って指定</span>してください。<br />
						※カテゴリー別に表示形式を指定しない(共通設定で統一する)場合は、未指定にして保存してください。
						</div>
					</div>
				</div>
			</dd>
			
		<dt class="dp_set_title1 icon-bookmark">
		ソーシャルネットワークサービス連携設定 :
		</dt>
			<dd>
				<div class="sample_img icon-camera">
				表示サンプル
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/show_share_num_after_title.png" />
				</div>
				<div class="clearfix mg10px-l">
					<div class="mg6px-btm">
					<input name="hatebu_number_after_title_archive" id="hatebu_number_after_title_archive"  type="checkbox" value="check" <?php if($options['hatebu_number_after_title_archive']) echo "checked"; ?> />
					<label for="hatebu_number_after_title_archive">記事タイトルの後に、はてなブックマーク数を表示</label>
					</div>

					<div class="mg6px-btm">
					<input name="tweet_number_after_title_archive" id="tweet_number_after_title_archive"  type="checkbox" value="check" <?php if($options['tweet_number_after_title_archive']) echo "checked"; ?> />
					<label for="tweet_number_after_title_archive">記事タイトルの後に、ツイート数を表示</label>
					</div>
					
					<div class="mg15px-btm">
					<input name="likes_number_after_title_archive" id="likes_number_after_title_archive"  type="checkbox" value="check" <?php if($options['likes_number_after_title_archive']) echo "checked"; ?> />
					<label for="likes_number_after_title_archive">記事タイトルの後に、Facebookの「いいね！」数を表示</label>
					</div>
				</div>
			</dd>
	</dl>

	<!-- 保存ボタン -->
	<p class="clearfix">
	<input class="btn btn-save" type="submit" name="dp_save" value="<?php _e(' Save ', 'DigiPress'); ?>" />
	</p>
</div>
<!--
========================================
アーカイブページ表示設定ここまで
========================================
-->

<input class="btn close_all mg20px-btm" type="button" name="close_all" value="   <?php _e('Close All', 'DigiPress'); ?>   " />

<!--
========================================
シングルページ表示設定ここから
========================================
-->
<h3 class="dp_h3 icon-menu">シングルページ表示設定</h3>
<div class="dp_box">
<p>シングルページとは、<span class="red">投稿記事、固定ページ</span>を指します。</p>
	<dl>
		<dt class="dp_set_title1 icon-bookmark">日付表示設定 :</dt>
			<dd class="clearfix">
				<div class="sample_img icon-camera">
				表示サンプル
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/date_pattern.png" />
				</div>
				<div class="mg15px-r mg5px-top">
						<div class="mg12px-btm"><input name="date_reckon_mode" id="date_reckon_mode" type="checkbox" value="true" <?php if($options['date_reckon_mode']) echo "checked"; ?> />
						<label for="date_reckon_mode">投稿日からの起算形式で表示する (タイトル直下の日付)</label></div>
						<div class="mg12px-btm"><input name="show_last_update" id="show_last_update" type="checkbox" value="true" <?php if($options['show_last_update']) echo "checked"; ?> />
						<label for="show_last_update">最終更新日時も表示する (記事下部メタ情報の日付に追加)</label></div>
						<span class="red">※日付表示の有無は「記事メタ情報表示設定」→ "投稿日時表示" にて設定してください。</span>
				</div>
				
				<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※起算形式の場合は、通常の投稿日付形式から「<span class="red">◯時間前の投稿</span>」などのように投稿日時からの起算で経過した時間を表示する形式になります。これは<span class="red">記事タイトル直下に日付を表示している場合</span>のみに有効です。<br />
				※最終更新日時は記事の最後に表示される投稿日付と一緒に表示されます。<br />
				※投稿日時と更新日時が同一(未更新)の場合は最終更新日時は表示されません。
				</div>
			</dd>

		<!-- 記事を読む時間 -->
		<dt class="dp_set_title1 icon-bookmark">記事閲覧時間の目安表示 :</dt>
			<dd class="clearfix">
				<div class="sample_img icon-camera">
				表示サンプル
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/time_for_reading.png" />
				</div>
				<div class="mg15px-r mg5px-top">
				<input name="time_for_reading" id="time_for_reading" type="checkbox" value="true" <?php if($options['time_for_reading']) echo "checked"; ?> />
				<label for="time_for_reading">表示する</label>
				</div>
				
				<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※1分間で読める文字数を600文字として換算表示します。
				</div>
			</dd>

		<!-- 記事ページでのソーシャルサービスボタン表示有無 -->
		<dt class="dp_set_title1 icon-bookmark">
		ソーシャルサービス連携ボタン表示 :
		</dt>
			<dd>
			<div class="sample_img icon-camera">
				表示サンプル
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/sns_btn.png" />
			</div>
			<div class="clearfix mg12px-top">
				<div class="fl-l mg15px-r">
				<input name="sns_button_under_title" id="sns_button_under_title" type="checkbox" value="title" <?php if($options['sns_button_under_title']) echo "checked"; ?> />
				<label for="sns_button_under_title">投稿タイトル直下に表示する</label>
				</div>
				<div class="fl-l">
				<input name="sns_button_on_meta" id="sns_button_on_meta" type="checkbox" value="meta" <?php if($options['sns_button_on_meta']) echo "checked"; ?> />
				<label for="sns_button_on_meta">記事メタパート内に表示する</label>
				</div>
				
			</div>
			
			<div id="target_sns_services" class="mg15px-top mg15px-l clearfix">
				<div class="mg15px-btm ">
				表示形式 : <input name="sns_button_type" id="sns_button_type1" type="radio" value="standard" <?php if($options['sns_button_type'] == "standard") echo "checked"; ?> />
				<label for="sns_button_type1" class="pd15px-r">
				スタンダード</label>
				<input name="sns_button_type" id="sns_button_type2" type="radio" value="box" <?php if($options['sns_button_type'] == "box") echo "checked"; ?> />
				<label for="sns_button_type2"  class="pd15px-r">
				ボックス</label>
				</div>
			
				<input name="show_google_button" id="show_google_button" type="checkbox" value="check" <?php if($options['show_google_button']) echo "checked"; ?> />
				<label for="show_google_button" id="google_btn" class="pd15px-r">
				Google+1</label>
				<input name="show_twitter_button" id="show_twitter_button" type="checkbox" value="check" <?php if($options['show_twitter_button']) echo "checked"; ?> />
				<label for="show_twitter_button" id="twitter_btn" class="pd15px-r">
				Twitter</label>
				<input name="show_facebook_button" id="show_facebook_button" type="checkbox" value="check" <?php if($options['show_facebook_button']) echo "checked"; ?> />
				<label for="show_facebook_button" id="facebook_btn" class="pd15px-r">
				Facebook</label>
				<input name="show_pocket_button" id="show_pocket_button" type="checkbox" value="check" <?php if($options['show_pocket_button']) echo "checked"; ?> />
				<label for="show_pocket_button" id="pocket_btn" class="pd15px-r">
				Pocket</label>
				<input name="show_feedly_button" id="show_feedly_button" type="checkbox" value="check" <?php if($options['show_feedly_button']) echo "checked"; ?> />
				<label for="show_feedly_button" id="show_feedly_button" class="pd15px-r">
				feedly</label>
				<input name="show_hatena_button" id="show_hatena_button" type="checkbox" value="check" <?php if($options['show_hatena_button']) echo "checked"; ?> />
				<label for="show_hatena_button" id="hatena_btn" class="pd15px-r">
				はてなブックマーク</label>
				<input name="show_mixi_button" id="show_mixi_button" type="checkbox" value="check" <?php if($options['show_mixi_button']) echo "checked"; ?> />
				<label for="show_mixi_button" id="mixi_btn">
				mixiイイネ！</label> *<a href="http://developer.mixi.co.jp/connect/mixi_plugin/mixi_check/mixicheck/#add_service" target="_blank">チェックキー</a>:<input type="text" name="mixi_accept_key" id="mixi_accept_key"  class="mg15px-r" size="15" value="<?php echo($options['mixi_accept_key']); ?>" />
				<input name="show_evernote_button" id="show_evernote_button" type="checkbox" value="check" <?php if($options['show_evernote_button']) echo "checked"; ?> />
				<label for="show_evernote_button" id="evernote_btn" class="pd15px-r">
				Evernote</label>
				<input name="show_tumblr_button" id="show_tumblr_button" type="checkbox" value="check" <?php if($options['show_tumblr_button']) echo "checked"; ?> />
				<label for="show_tumblr_button" id="tumblr_btn" class="pd15px-r">
				Tumblr</label>
				<input name="show_line_button" id="show_line_button" type="checkbox" value="check" <?php if($options['show_line_button']) echo "checked"; ?> />
				<label for="show_line_button" id="line_btn" class="pd15px-r">
				LINE</label>
			</div>
			
			<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
			<div class="slide-content">
			※投稿ページ、固定ページでのSNS連携ボタンの表示有無は、投稿の編集画面、および固定ページの編集画面の「DigiPressテーマ用投稿オプション」にて個別に指定してください。<br />
			※「mixiイイネ！」ボタンを表示するには、事前にmixiのアカウントが必要です。<br />さらに、mixiの<a href="http://developer.mixi.co.jp/connect/developer_registration/" target="_blank">開発者登録</a>を行い、「<a href="https://sap.mixi.jp/home.pl" target="_blank">Partner Dashboard</a>」にて、”mixi Plugin”からサービスを追加し、チェックキーを取得する必要があります。<br />
			※「LINEで送る」ボタンは、スマートフォンサイズ(表示幅600ピクセル以下)にて表示されます。
			</div>
			</dd>

		<dt class="dp_set_title1 icon-bookmark">アイキャッチ表示設定 :</dt>
			<dd class="clearfix">
				<div class="sample_img icon-camera">
				表示サンプル
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/show_eyecatch_first.png" />
				</div>
				<div class="mg15px-r mg5px-top">
				<input name="show_eyecatch_first" id="show_eyecatch_first" type="checkbox" value="true" <?php if($options['show_eyecatch_first']) echo "checked"; ?> />
				<label for="show_eyecatch_first">アイキャッチ画像がある場合は自動的に記事先頭に表示する</label>
				</div>
				
				<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※記事の投稿画面にてアイキャッチ画像を指定した場合に、<span class="red">本文の先頭(タイトル直下)に自動的にそのアイキャッチ画像を表示</span>させる場合に指定してください。<br />
				※このオプションは固定ページやカスタム投稿タイプの単体ページの場合は対象外です。
				</div>
			</dd>

			<!-- Facebookコメント欄 -->
			<dt class="dp_set_title1 icon-bookmark">Facebookコメント欄 :</dt>
				<dd class="clearfix">
					<div class="sample_img icon-camera">
					表示サンプル
					<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/fbcomment.png" />
					</div>
					<div class="fl-l mg15px-r mg5px-top">
					<input name="facebookcomment" id="facebookcomment" type="checkbox" value="true" <?php if($options['facebookcomment']) echo "checked"; ?> />
					<label for="facebookcomment">記事ページに表示する</label>
					</div>
					<div class="mg15px-r pd4px-top mg18px-btm">
					<input name="facebookcomment_page" id="facebookcomment_page" type="checkbox" value="true" <?php if($options['facebookcomment_page']) echo "checked"; ?> />
					<label for="facebookcomment_page">固定ページにに表示する</label>
					</div>
					<div class="clearfix">
					コメント表示件数 : 
					<input type="text" size=2 style="text-align:right;" id="number_fb_comment" name="number_fb_comment" value="<?php echo ($options['number_fb_comment']) ? $options['number_fb_comment'] : "10"; ?>" />件
					</div>
				</dd>
			
			<!-- Facebookおすすめボックス -->
			<dt class="dp_set_title1 icon-bookmark">Facebookおすすめ記事ボックス :</dt>
				<dd class="clearfix">
					ページ右下または左下に、Facebookで「いいね！」された記事を表示します。
					<div class="sample_img icon-camera">
					表示サンプル
					<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/fbrecommend.png" />
					</div>
					<div class="mg15px-r mg5px-top">
					<input name="facebookrecommend" id="facebookrecommend" type="checkbox" value="true" <?php if($options['facebookrecommend']) echo "checked"; ?> />
					<label for="facebookrecommend">表示する</label>
					</div>
					
					<div class="mg15px-top mg15px-l" id="fb_recommend_params">
						<div class="mg12px-btm">
						*App ID : <input type="text" name="fb_app_id" id="fb_app_id" size="20" value="<?php echo($options['fb_app_id']); ?>" /><br />
						<span class="ft11px red mg12px-l">※おすすめ記事ボックスを表示するには、<a href="https://developers.facebook.com/apps/" target="_blank">Facebookディベロッパーズ</a>から新規アプリを作成して発行される「App ID」をここに登録しておく必要があります。</span>
						</div>
						
						<div class="mg12px-btm">
						表示位置 : 
						<input name="fb_recommend_position" id="fb_recommend_position1" type="radio" value="right" <?php if($options['fb_recommend_position'] != 'left') echo "checked"; ?> /><label for="fb_recommend_position1" class="pd15px-r"> ページ右下 </label> 
						<input name="fb_recommend_position" id="fb_recommend_position2" type="radio" value="left" <?php if($options['fb_recommend_position'] == 'left') echo "checked"; ?> /><label for="fb_recommend_position2" class="pd15px-r"> ページ左下 </label>
						</div>
						<div>
						おすすめ記事表示件数 : 
						<select name="number_fb_recommend" size="1">
							<option value="2" <?php if($options['number_fb_recommend'] == 2) echo "selected=\"selected\""; ?>>2件</option>
							<option value="3" <?php if($options['number_fb_recommend'] == 3) echo "selected=\"selected\""; ?>>3件</option>
							<option value="4" <?php if($options['number_fb_recommend'] == 4) echo "selected=\"selected\""; ?>>4件</option>
							<option value="5" <?php if($options['number_fb_recommend'] == 5) echo "selected=\"selected\""; ?>>5件</option>
						</select>
						</div>
						
						<div>
						おすすめ記事を表示するページスクロール割合 : 
						<select name="fb_recommend_scroll" size="1">
							<option value="5%" <?php if($options['fb_recommend_scroll'] == '5%') echo "selected=\"selected\""; ?>>5%</option>
							<option value="10%" <?php if($options['fb_recommend_scroll'] == '10%') echo "selected=\"selected\""; ?>>10%</option>
							<option value="20%" <?php if($options['fb_recommend_scroll'] == '20%') echo "selected=\"selected\""; ?>>20%</option>
							<option value="30%" <?php if($options['fb_recommend_scroll'] == '30%') echo "selected=\"selected\""; ?>>30%</option>
							<option value="40%" <?php if($options['fb_recommend_scroll'] == '40%') echo "selected=\"selected\""; ?>>40%</option>
						</select>
						</div>
						
						<div>
						ページ表示後、おすすめ記事を表示するまでの時間 : 
						<select name="fb_recommend_time" size="1">
							<option value="5" <?php if($options['fb_recommend_time'] == 5) echo "selected=\"selected\""; ?>>5秒</option>
							<option value="6" <?php if($options['fb_recommend_time'] == 6) echo "selected=\"selected\""; ?>>6秒</option>
							<option value="7" <?php if($options['fb_recommend_time'] == 7) echo "selected=\"selected\""; ?>>7秒</option>
							<option value="8" <?php if($options['fb_recommend_time'] == 8) echo "selected=\"selected\""; ?>>8秒</option>
							<option value="9" <?php if($options['fb_recommend_time'] == 9) echo "selected=\"selected\""; ?>>9秒</option>
							<option value="10" <?php if($options['fb_recommend_time'] == 10) echo "selected=\"selected\""; ?>>10秒</option>
							<option value="11" <?php if($options['fb_recommend_time'] == 11) echo "selected=\"selected\""; ?>>11秒</option>
							<option value="12" <?php if($options['fb_recommend_time'] == 12) echo "selected=\"selected\""; ?>>12秒</option>
							<option value="13" <?php if($options['fb_recommend_time'] == 13) echo "selected=\"selected\""; ?>>13秒</option>
							<option value="14" <?php if($options['fb_recommend_time'] == 14) echo "selected=\"selected\""; ?>>14秒</option>
							<option value="15" <?php if($options['fb_recommend_time'] == 15) echo "selected=\"selected\""; ?>>15秒</option>
							<option value="16" <?php if($options['fb_recommend_time'] == 16) echo "selected=\"selected\""; ?>>16秒</option>
							<option value="17" <?php if($options['fb_recommend_time'] == 17) echo "selected=\"selected\""; ?>>17秒</option>
							<option value="18" <?php if($options['fb_recommend_time'] == 18) echo "selected=\"selected\""; ?>>18秒</option>
							<option value="19" <?php if($options['fb_recommend_time'] == 19) echo "selected=\"selected\""; ?>>19秒</option>
							<option value="20" <?php if($options['fb_recommend_time'] == 20) echo "selected=\"selected\""; ?>>20秒</option>
							<option value="25" <?php if($options['fb_recommend_time'] == 25) echo "selected=\"selected\""; ?>>25秒</option>
							<option value="30" <?php if($options['fb_recommend_time'] == 30) echo "selected=\"selected\""; ?>>30秒</option>
						</select>
						<span class="ft11px red">※ページスクロール割合よりも、この時間の値が優先されます。</span>
						</div>
						
						<div class="mg12px-btm">
						表示形式 : 
						<input name="fb_recommend_action" id="fb_recommend_action1" type="radio" value="like" <?php if($options['fb_recommend_action'] != 'recommend') echo "checked"; ?> /><label for="fb_recommend_action1" class="mg15px-r">【**人が「いいね！」と言っています。】</label>
						<input name="fb_recommend_action" id="fb_recommend_action2" type="radio" value="recommend" <?php if($options['fb_recommend_action'] == 'recommend') echo "checked"; ?> /><label for="fb_recommend_action2">【 **人がすすめています。】</label>
						</div>
					</div>
					
					<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※おすすめ記事ボックスを表示するには、<a href="https://developers.facebook.com/apps/" target="_blank">Facebookディベロッパーズ</a>にて開発者登録を行い、新規アプリを作成して発行される「App ID」を登録しておく必要があります。<br />
				※おすすめ記事を表示する条件は、ページスクロール割合よりも、ページ表示後の経過時間の設定が優先されます。
				</div>
				</dd>
			
			<!-- 関連記事の表示 -->
			<dt class="dp_set_title1 icon-bookmark">関連記事・その他の記事表示 :</dt>
				<dd class="clearfix">
					記事の最後に関連記事または同一カテゴリー内のその他の記事を表示します。
					<div class="sample_img icon-camera">
					表示サンプル
					<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/related_posts.png" />
					</div>
					<div class="mg15px-r mg5px-top">
					<input name="show_related_posts" id="show_related_posts" type="checkbox" value="true" <?php if($options['show_related_posts']) echo "checked"; ?> />
					<label for="show_related_posts">表示する</label>
					</div>
					
					<div class="mg15px-top mg15px-l" id="related_posts_params">

						<div class="mg12px-btm">
						タイトル : <input type="text" name="related_posts_title" id="related_posts_title" size="60" value="<?php echo($options['related_posts_title']); ?>" />
						</div>

						<div class="mg12px-btm">
						表示対象 : 
						<select name="related_posts_target" size=1 style="position:relative;top:8px;">
							<option value="1" <?php if($options['related_posts_target'] == 1) echo "selected=\"selected\""; ?>>同じタグを持つ関連記事</option>
							<option value="2" <?php if($options['related_posts_target'] == 2) echo "selected=\"selected\""; ?>>同一カテゴリーの投稿記事(投稿日付順)</option>
							<option value="3" <?php if($options['related_posts_target'] == 3) echo "selected=\"selected\""; ?>>同一カテゴリーの投稿記事(ランダム)</option>
						</select>
						</div>

						<div class="mg12px-btm">
						表示スタイル : 
						<input name="related_posts_style" id="related_posts_style1" type="radio" value="vertical" <?php if($options['related_posts_style'] != 'horizon') echo "checked"; ?> /><label for="related_posts_style1" class="pd15px-r"> 縦並び </label> 
						<input name="related_posts_style" id="related_posts_style2" type="radio" value="horizon" <?php if($options['related_posts_style'] == 'horizon') echo "checked"; ?> /><label for="related_posts_style2" class="pd15px-r"> 横並び </label>
						</div>

						<div class="mg12px-btm">
						関連記事表示件数 : 
						<select name="number_related_posts" size="1" style="position:relative;top:8px;">
							<option value="3" <?php if($options['number_related_posts'] == 3) echo "selected=\"selected\""; ?>>3件</option>
							<option value="4" <?php if($options['number_related_posts'] == 4) echo "selected=\"selected\""; ?>>4件</option>
							<option value="5" <?php if($options['number_related_posts'] == 5) echo "selected=\"selected\""; ?>>5件</option>
							<option value="6" <?php if($options['number_related_posts'] == 6) echo "selected=\"selected\""; ?>>6件</option>
							<option value="7" <?php if($options['number_related_posts'] == 7) echo "selected=\"selected\""; ?>>7件</option>
							<option value="8" <?php if($options['number_related_posts'] == 8) echo "selected=\"selected\""; ?>>8件</option>
							<option value="9" <?php if($options['number_related_posts'] == 9) echo "selected=\"selected\""; ?>>9件</option>
							<option value="10" <?php if($options['number_related_posts'] == 10) echo "selected=\"selected\""; ?>>10件</option>
							<option value="11" <?php if($options['number_related_posts'] == 11) echo "selected=\"selected\""; ?>>11件</option>
							<option value="12" <?php if($options['number_related_posts'] == 12) echo "selected=\"selected\""; ?>>12件</option>
							<option value="13" <?php if($options['number_related_posts'] == 13) echo "selected=\"selected\""; ?>>13件</option>
							<option value="14" <?php if($options['number_related_posts'] == 14) echo "selected=\"selected\""; ?>>14件</option>
							<option value="15" <?php if($options['number_related_posts'] == 15) echo "selected=\"selected\""; ?>>15件</option>
						</select>
						</div>

						<div class="mg12px-btm">
						<input name="related_posts_thumbnail" id="related_posts_thumbnail" type="checkbox" value="true" <?php if($options['related_posts_thumbnail']) echo "checked"; ?> />
						<label for="related_posts_thumbnail">サムネイルを表示する</label>
						</div>
						
						<div>
						<input name="related_posts_category" id="related_posts_category" type="checkbox" value="true" <?php if($options['related_posts_category']) echo "checked"; ?> />
						<label for="related_posts_category">記事の投稿カテゴリーを表示する</label>
						</div>
					</div>

					<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
					<div class="slide-content">
					※対象が関連記事の表示は、記事に付けられたタグを元に同じタグを持つものを検出して表示します。<br />
					※対象が同一カテゴリーの投稿記事の場合は、表示中の投稿が属するカテゴリーに投稿された他の投稿記事を表示します。
					</div>
				</dd>

		<dt class="dp_set_title1 icon-bookmark">前後記事のナビゲーション :</dt>
			<dd class="clearfix">
				<div class="sample_img icon-camera">表示サンプル
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/next_prev_navi.png" />
				</div>
				<div class="mg15px-r mg5px-top">
				<input name="next_prev_in_same_cat" id="next_prev_in_same_cat" type="checkbox" value="true" <?php if($options['next_prev_in_same_cat']) echo "checked"; ?> />
				<label for="next_prev_in_same_cat">同一カテゴリーの記事を対象とする</label>
				</div>
				
				<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※記事ページの下に表示される隣接する前後記事へのリンクを表示記事と同じ投稿カテゴリーの記事のみに絞リ込む場合に選択します。<br />
				※規定値は絞り込みをせずに投稿順の前後の記事を対象とします。
				</div>
			</dd>
	</dl>

	<!-- 保存ボタン -->
	<p class="clearfix">
	<input class="btn btn-save" type="submit" name="dp_save" value="<?php _e(' Save ', 'DigiPress'); ?>" />
	</p>
</div>
<!--
========================================
シングルページ表示設定ここまで
========================================
-->

<input class="btn close_all mg20px-btm" type="button" name="close_all" value="   <?php _e('Close All', 'DigiPress'); ?>   " />

<!--
========================================
記事メタ情報表示設定ここから
========================================
-->
<h3 class="dp_h3 icon-menu">記事メタ情報表示設定</h3>
<div class="dp_box">
	<dl>
		<!-- アーカイブ/記事ページでの投稿日表示有無 -->
		<dt class="dp_set_title1 icon-bookmark">
		投稿日時表示 :
		</dt>
			<dd>
			<div class="sample_img icon-camera">
				表示サンプル
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/postmeta_date.png" />
			</div>
			<div class="clearfix">
				<div class="fl-l mg15px-r">
				<input name="show_pubdate_on_meta" id="show_pubdate_on_meta" type="checkbox" value="check" <?php if($options['show_pubdate_on_meta']) echo "checked"; ?> />
				<label for="show_pubdate_on_meta">投稿記事と記事一覧に表示する</label>
				</div>
				<div class="fl-l">
				<input name="show_pubdate_on_meta_page" id="show_pubdate_on_meta_page" type="checkbox" value="check" <?php if($options['show_pubdate_on_meta_page']) echo "checked"; ?> />
				<label for="show_pubdate_on_meta_page">固定ページに表示する</label>
				</div>
			</div>

			<div id="show_date_position_div" class="mg15px-l mg15px-top clearfix">
				<h4 class="dp_set_title2 icon-triangle-right">シングルページでの表示位置 : </h4>

				<div class="fl-l mg15px-l mg15px-r">
				<input name="show_date_under_post_title" id="show_date_under_post_title" type="checkbox" value="check" <?php if($options['show_date_under_post_title']) echo "checked"; ?> />
				<label for="show_date_under_post_title">投稿タイトル直下</label>
				</div>

				<div class="fl-l pd12px-btm">
				<input name="show_date_on_post_meta" id="show_date_on_post_meta" type="checkbox" value="check" <?php if($options['show_date_on_post_meta']) echo "checked"; ?> />
				<label for="show_date_on_post_meta">記事メタパート内</label>
				</div>

				<div class="slide-title cl-l icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※この設定はテーマ全体での共通設定となり、記事編集画面の<span class="red">DigiPressテーマ投稿オプションにて個別に投稿日時の表示有無を指定</span>することもできます。
				</div>
			</div>
			</dd>
			
		<!-- アーカイブ/記事ページでの投稿者表示有無 -->
		<dt class="dp_set_title1 icon-bookmark">
		投稿者表示 :
		</dt>
			<dd>
			<div class="sample_img icon-camera">
				表示サンプル
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/postmeta_author.png" />
			</div>
			<div class="clearfix">
				<div class="fl-l mg15px-r">
				<input name="show_author_on_meta" id="show_author_on_meta" type="checkbox" value="check" <?php if($options['show_author_on_meta']) echo "checked"; ?> />
				<label for="show_author_on_meta">投稿記事と記事一覧に表示する</label>
				</div>
				<div class="fl-l">
				<input name="show_author_on_meta_page" id="show_author_on_meta_page" type="checkbox" value="check" <?php if($options['show_author_on_meta_page']) echo "checked"; ?> />
				<label for="show_author_on_meta_page">固定ページに表示する</label>
				</div>
			</div>

			<div id="show_author_position_div" class="mg15px-l mg15px-top clearfix">
				<h4 class="dp_set_title2 icon-triangle-right">シングルページでの表示位置 : </h4>

				<div class="fl-l mg15px-l mg15px-r">
				<input name="show_author_under_post_title" id="show_author_under_post_title" type="checkbox" value="check" <?php if($options['show_author_under_post_title']) echo "checked"; ?> />
				<label for="show_author_under_post_title">投稿タイトル直下</label>
				</div>

				<div class="fl-l pd12px-btm">
				<input name="show_author_on_post_meta" id="show_author_on_post_meta" type="checkbox" value="check" <?php if($options['show_author_on_post_meta']) echo "checked"; ?> />
				<label for="show_author_on_post_meta">記事メタパート内</label>
				</div>

				<div class="slide-title cl-l icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※この設定はテーマ全体での共通設定となり、記事編集画面の<span class="red">DigiPressテーマ投稿オプションにて個別に寄稿者(投稿者)の表示有無を指定</span>することもできます。
				</div>
			</div>
			</dd>
		
		<!-- アーカイブ/記事ページでの閲覧回数表示有無 -->
		<dt class="dp_set_title1 icon-bookmark">
		ページ閲覧回数表示 :
		</dt>
			<dd>
			<div class="sample_img icon-camera">
				表示サンプル
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/postmeta_views.png" />
			</div>
			<div class="clearfix">
				<div class="fl-l mg15px-r">
				<input name="show_views_on_meta" id="show_views_on_meta" type="checkbox" value="check" <?php if($options['show_views_on_meta']) echo "checked"; ?> />
				<label for="show_views_on_meta">投稿記事と記事一覧に表示する</label>
				</div>
			</div>

			<div id="show_views_position_div" class="mg15px-l mg15px-top clearfix">
				<h4 class="dp_set_title2 icon-triangle-right">シングルページでの表示位置 : </h4>

				<div class="fl-l mg15px-l mg15px-r">
				<input name="show_views_under_post_title" id="show_views_under_post_title" type="checkbox" value="check" <?php if($options['show_views_under_post_title']) echo "checked"; ?> />
				<label for="show_views_under_post_title">投稿タイトル直下</label>
				</div>

				<div class="fl-l pd12px-btm">
				<input name="show_views_on_post_meta" id="show_views_on_post_meta" type="checkbox" value="check" <?php if($options['show_views_on_post_meta']) echo "checked"; ?> />
				<label for="show_views_on_post_meta">記事メタパート内</label>
				</div>

				<div class="slide-title cl-l icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※ページ閲覧回数の表示対象は記事ページのみで、<span class="red">固定ページやカスタム投稿タイプの単体ページは対象外</span>です。<br />
				※この設定はテーマ全体での共通設定となり、記事編集画面の<span class="red">DigiPressテーマ投稿オプションにて個別に閲覧回数の表示有無を指定</span>することもできます。
				</div>
			</div>
			</dd>

		<!-- アーカイブ/記事ページでのカテゴリ表示有無 -->
		<dt class="dp_set_title1 icon-bookmark">
		カテゴリ表示 :
		</dt>
			<dd>
			<div class="sample_img icon-camera">
				表示サンプル
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/postmeta_category.png" />
			</div>
			<div class="clearfix">
				<div class="fl-l mg15px-r">
				<input name="show_cat_on_meta" id="show_cat_on_meta" type="checkbox" value="check" <?php if($options['show_cat_on_meta']) echo "checked"; ?> />
				<label for="show_cat_on_meta">投稿記事と記事一覧に表示する</label>
				</div>
			</div>

			<div id="show_cat_position_div" class="mg15px-l mg15px-top clearfix">
				<h4 class="dp_set_title2 icon-triangle-right">シングルページでの表示位置 : </h4>

				<div class="fl-l mg15px-l mg15px-r">
				<input name="show_cat_under_post_title" id="show_cat_under_post_title" type="checkbox" value="check" <?php if($options['show_cat_under_post_title']) echo "checked"; ?> />
				<label for="show_cat_under_post_title">投稿タイトル直下</label>
				</div>

				<div class="fl-l pd12px-btm">
				<input name="show_cat_on_post_meta" id="show_cat_on_post_meta" type="checkbox" value="check" <?php if($options['show_cat_on_post_meta']) echo "checked"; ?> />
				<label for="show_cat_on_post_meta">記事メタパート内</label>
				</div>

				<div class="slide-title cl-l icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※記事一覧(アーカイブ形式)でカテゴリが表示される形式は、「<span class="red">概要または抜粋</span>」にて記事一覧を表示しているときのみです。<br />
				※カテゴリの表示対象は<span class="red">固定ページやカスタム投稿タイプの単体ページは対象外</span>です。<br />
				※この設定はテーマ全体での共通設定となり、記事編集画面の<span class="red">DigiPressテーマ投稿オプションにて個別にカテゴリの表示有無を指定</span>することもできます。
				</div>
			</div>
			</dd>

		<!-- 記事ページでのタグ表示有無 -->
		<dt class="dp_set_title1 icon-bookmark">
		タグリンク表示 :
		</dt>
			<dd>
			<div class="sample_img icon-camera">
				表示サンプル
				<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/postmeta_tag.png" />
			</div>
			<div class="clearfix">
				<div class="fl-l mg12px-btm">
				<input name="show_tags" id="show_tags" type="checkbox" value="check" <?php if($options['show_tags']) echo "checked"; ?> />
				<label for="show_tags">投稿記事と記事一覧に表示する</label>
				</div>

				<div class="cl-l slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
				<div class="slide-content">
				※記事一覧(アーカイブ形式)でタグが表示される形式は、「<span class="red">概要または抜粋</span>」にて記事一覧を表示しているときのみです。<br />
				※記事のタグ表示は固定ページやカスタム投稿タイプのページでは無効です。<br />
				※この設定はテーマ全体での共通設定となり、記事編集画面の<span class="red">DigiPressテーマ投稿オプションにて個別にタグの表示有無を指定</span>することもできます。
				</div>
			</div>
			</dd>
	</dl>

	<!-- 保存ボタン -->
	<p class="clearfix">
	<input class="btn btn-save" type="submit" name="dp_save" value="<?php _e(' Save ', 'DigiPress'); ?>" />
	</p>
</div>
<!--
========================================
記事メタ情報表示設定ここまで
========================================
-->

<input class="btn close_all mg20px-btm" type="button" name="close_all" value="   <?php _e('Close All', 'DigiPress'); ?>   " />

<!--
========================================
サイドバー表示設定ここから
========================================
-->
<h3 class="dp_h3 icon-menu">サイドバー表示設定</h3>
<div class="dp_box">
	<dl>	
		<!-- サイドバーのカテゴリ投稿数表示有無 -->
		<dt class="dp_set_title1 icon-bookmark">
		サイドバーウィジェット内のカテゴリの投稿数表示有無 :
		</dt>
			<dd>
			<div class="sample_img icon-camera">
			表示サンプル
			<img src="<?php echo DP_THEME_URI ?>/inc/admin/img/count_posts.png" />
			</div>
			<div class="pd15px-top formblock">
			<input name="show_cat_with_postcount" id="show_cat_with_postcount" type="checkbox" value="check" <?php if($options['show_cat_with_postcount']) echo "checked"; ?> />
			<label for="show_cat_with_postcount">表示している</label>
			
			<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
			<div class="slide-content">
			※サイドバーウィジェットに表示しているカテゴリ一覧にて、<span class="red">カテゴリ名と共に投稿数も表示している場合はチェック</span>をしてください。<br />
			※このオプションは、カテゴリに<span class="red">投稿数の表示有無を設定するものではありません</span>。使用するCSSを判定するためのオプションです。
			</div>
			
			</div>
			</dd>
	</dl>
	
	<!-- 保存ボタン -->
	<p class="clearfix">
	<input class="btn btn-save" type="submit" name="dp_save" value="<?php _e(' Save ', 'DigiPress'); ?>" />
	</p>
</div>
<!--
========================================
サイドバー表示設定ここまで
========================================
-->

<input class="btn close_all mg20px-btm" type="button" name="close_all" value="   <?php _e('Close All', 'DigiPress'); ?>   " />

<!--
========================================
アクセス解析用コード設定ここから
========================================
-->
<h3 class="dp_h3 icon-menu">アクセス解析コード設定</h3>
<div class="dp_box">
	<dl>
		<!-- サイドバーのカテゴリ投稿数表示有無 -->
		<dt class="dp_set_title1 icon-bookmark">
		アクセス解析コード :
		</dt>
			<dd>
			<div class="formblock mg12px-top">
			<textarea name="tracking_code" cols="95%" rows="5"><?php echo($options['tracking_code']); ?></textarea><br />
			<input name="no_track_admin" id="no_track_admin" type="checkbox" value="check" <?php if($options['no_track_admin']) echo "checked"; ?> />
			<label for="no_track_admin">管理者自身(ログイン中)はカウントしない</label>
			
			<div class="slide-title icon-attention mg12px-top"><?php _e('Note...', 'DigiPress'); ?></div>
			<div class="slide-content">
			※アクセス解析コードを<span class="red">使用しない場合は、空の状態で保存</span>してください。<br />
			※チェックボックスにチェックを入れると、ログイン中の管理者のサイトへのアクセスはカウントされずスルーされます。
			</div>
			
			</div>
			</dd>
	</dl>

	<!-- 保存ボタン -->
	<p class="clearfix">
	<input class="btn btn-save" type="submit" name="dp_save" value="<?php _e(' Save ', 'DigiPress'); ?>" />
	</p>
</div>

<input class="btn close_all" type="button" name="close_all" value="   <?php _e('Close All', 'DigiPress'); ?>   " />

<p>
<input type="submit" name="dp_reset_control" value="<?php _e(' Restore Default ', 'DigiPress'); ?>" onclick="return confirm('現在の設定は全てクリアされます。初期状態に戻しますか？')" />
</p>
<!--
========================================
アクセス解析用コード設定ここまで
========================================
-->
</form>
</div>

</div>
