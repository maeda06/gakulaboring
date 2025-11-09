<?php get_header(); ?>
<main>
	<!-- メインビジュアル -->
	<section id="hero">
		<span class="cloud cloud--midium cloud--orange"></span>
		<span class="cloud cloud--large cloud--blue"></span>
		<span class="cloud cloud--small cloud--orange"></span>
		<span class="cloud cloud--small cloud--white cloud--right"></span>
		<span class="cloud cloud--large cloud--white cloud--right"></span>
		<span class="cloud cloud--midium cloud--blue cloud--right"></span>
		<h1>ホンネが見えると、未来が近くなる</h1>
		<p class="sub-title">ES・口コミ・体験談体験談でつづる・働く未来の<span>ヒント</span></p>
		<div class="btn-wrapper">
			<div class="btn btn--orange">
				<p>リアルなES、見ちゃおう</p>
				<a href="#"><span>リアルな声を読む</span></a>
			</div>
			<div class="btn btn--blue">
				<p>先輩たちの本音、気になる…!</p>
				<a href="#"><span>働く人の気持ちに触れてみる</span></a>
			</div>
		</div>
	</section>

	<!-- 何ができる？ -->
	<section id="what">
		<span class="cloud cloud--white cloud--small"></span>
		<span class="cloud cloud--orange cloud--large"></span>
		<span class="cloud cloud--orange cloud--large"></span>
		<span class="cloud cloud--white cloud--small cloud--right"></span>
		<span class="bg bg--duck"><img src="<?php echo get_template_directory_uri(); ?>/images/page-review__what--duck.png" alt=""></span>
		<span class="bg bg--microphone"><img src="<?php echo get_template_directory_uri(); ?>/images/page-review__what--microphone.png" alt=""></span>
		<span class="bg bg--hamburger"><img src="<?php echo get_template_directory_uri(); ?>/images/page-review__what--hamburger.png" alt=""></span>
		<span class="bg bg--pudding"><img src="<?php echo get_template_directory_uri(); ?>/images/page-review__what--pudding.png" alt=""></span>
		<span class="bg bg--frying-pan"><img src="<?php echo get_template_directory_uri(); ?>/images/page-review__what--frying-pan.png" alt=""></span>
		<span class="bg bg--bench"><img src="<?php echo get_template_directory_uri(); ?>/images/page-review__what--bench.png" alt=""></span>
		<h1>何ができる</h1>
		<ul>
			<li>志望企業の<span>実際のES (エントリーシート)</span>が読める</li>
			<li>社員の<span>体験談や本音の口コミ</span>をチェックできる</li>
			<li>選考の流れや面接の雰囲気も、<span>リアルな投稿</span>でわかる</li>
			<li>あなたもチャット形式で<span>気軽に書き込み</span>できる</li>
		</ul>
	</section>

	<!-- 嬉しいポイント -->
		<section id="point">
			<h2>嬉しいポイント</h2>
			<ul>
				<li>
					<div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/images/preview-point-01.png" alt=""></div>
					<p>企業にはない<br>「リアルな声」が満載</p>
				</li>
				<li>
					<div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/images/preview-point-02.png" alt=""></div>
					<p>ESの書き方や面接対策に<br>迷ったときのヒントに</p>
				</li>
				<li>
					<div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/images/preview-point-03.png" alt=""></div>
					<p>登録ユーザーだけの限定<br>公開だから安心、信頼できる</p>
				</li>
				<li>
					<div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/images/preview-point-04.png" alt=""></div>
					<p>匿名・ニックネームOK<br>気軽に参加できる</p>
				</li>
			</ul>
			<span class="cloud"></span>
		</section>

		<!-- ご利用の流れ -->
		<section id="flow">
			<div class="title"><h2>ご利用の流れ</h2></div>
			<ul>
				<li>
					<span>1</span>
					<div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/images/preview__flow-icon-- registration.png" alt=""></div>
					<p>学生・フリーランス<be>として無料登録</p>
				</li>
				<li>
					<span>2</span>
					<div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/images/preview__flow-icon-- login.png" alt=""></div>
					<p>マイページに<be>ログイン</p>
				</li>
				<li>
					<span>3</span>
					<div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/images/preview__flow-icon-- search.png" alt=""></div>
					<p>気になる企業や<be>キーワードで検索！</p>
				</li>
				<li>
					<span>4</span>
					<div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/images/preview__flow-icon-- nice.png" alt=""></div>
					<p>気になる投稿を読んで、参考になったら「いいね」</p>
				</li>
				<li>
					<span>5</span>
					<div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/images/preview__flow-icon-- share.png" alt=""></div>
					<p>自分の経験も投稿して、みんなとシェアしよう！</p>
				</li>
			</ul>
		</section>

		<!-- ログイン -->
			<section id="login">
				<h2>ご利用にはログインが必要です</h2>
				<div class="login-inner">
					<p>学生・フリーランス登録（無料）すると、以下の機能が使えます。</p>
					<ul>
						<li>社員の口コミ・ES・体験談の全文閲覧・投稿</li>
						<li>しゃべり場での書き込み・リアクション</li>
						<li>マイページから企業フォロー・保存も可能！</li>
					</ul>
				</div>
				<a href="#" class="cta"><img src="<?php echo get_template_directory_uri() ?>/images/cta-btn--sub.png" alt=""></a>
			</section>
</main>
<?php get_footer(); ?>