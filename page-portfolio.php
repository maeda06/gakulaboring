<? get_header(); ?>
<main>
  <!-- メインビジュアル -->
  <section id="hero">
		<img class="cloud cloud--small" src="<?php echo get_template_directory_uri(); ?>/images/small-cloud--orange.png" alt="">
		<img class="cloud cloud--large" src="<?php echo get_template_directory_uri(); ?>/images/large-cloud--orange.png" alt="">
		<div class="hero__text">
			<h1>作品で<span class="orange">未来</span>を<span class="blue">引き寄せろ！</span><br><span class="blue">スカウト</span>が届く、<span class="orange">次世代の就活サイト</span></h1>
			<p><span>自己PRよりポートフォリオ</span>あなたらしさで未来を引き寄せよう</p>
			<img src="<?php echo get_template_directory_uri() ;?>/images/cta.png" alt="">
		</div>
		<img class="hero-image" src="<?php echo get_template_directory_uri() ;?>/images/portfolio-hero.png" alt="">
  </section>

  <!-- 機能紹介 -->
  <section id="features">
		<div class="features__content">
			<h2>機能紹介</h2>
			<ul>
				<li>
					<h3>ポートフォリオ作成</h3>
					<p>作品を登録して、じぶん展を始めよう！</p>
				</li>
				<li>
					<h3>スカウト受信</h3>
					<p>あなたの作品を見た企業からスカウトが届くかも！？</p>
				</li>
				<li>
					<h3>求人検索・いいね機能</h3>
					<p>こだわりの条件で検索して、気になる企業にアプローチ！</p>
				</li>
			</ul>
		</div>
		<img class="target cloud cloud--large" src="<?php echo get_template_directory_uri(); ?>/images/large-cloud--orange.png" alt="">
		<img class="target cloud cloud--small" src="<?php echo get_template_directory_uri(); ?>/images/large-cloud--orange.png" alt="">
		<img class="target cloud cloud--orange-frame" src="<?php echo get_template_directory_uri(); ?>/images/small-cloud--orange-frame.png" alt="">
  </section>

  <section id="howto">
		<!-- 使い方3ステップ -->
		<div class="three-step">
			<div class="three-step__title"><h2>使い方3ステップ</h2></div>
			<ul>
				<li>
					<p>登録する</p>
					<img src="<?php echo get_template_directory_uri() ?>/images/three-step--registration.png" alt="">
				</li>
				<li>
					<p>ポートフォリオを投稿</p>
					<img src="<?php echo get_template_directory_uri() ?>/images/three-step--post.png" alt="">
				</li>
				<li>
					<p>スカウトor気になる<br>企業にアプローチ！</p>
					<img src="<?php echo get_template_directory_uri() ?>/images/three-step--approach.png" alt="">
				</li>
			</ul>
		</div>
		<!-- ギャラリー紹介 -->
		<div class="gallery">
			<img class="kv" src="<?php echo get_template_directory_uri(); ?>/images/portfolio-girl.png" alt="">
			<div class="gallery-content">
				<h3>先輩のポートフォリオを<br>参考にしよう！</h3>
				<div class="btn btn--orange"><a href="#"><span>作品ギャラリーを見る</span></a></div>
			</div>
		</div>
		<!-- アップしてみよう -->
		<div class="upload">
			<h1><span>1枚アップ	</span>してみよう</h1>
			<div class="upload-btn">
				<div class="btn btn--orange"><a href="#"><span>今すぐアップロード</span></a></div>
				<div class="btn btn--blue"><a href="#"><span>下書きから作る</span></a></div>
			</div>
		</div>
  </section>

  <!-- 企業の皆様へ -->
  <section id="for-companies">
		<h2>企業の皆様へ</h2>
		<p>採用ご担当者はこちら</p>
		<ul>
			<li>作品からマッチングする採用を始めませんか？</li>
			<li>光る原石を見つけよう</li>
			<li>クリエイター採用を作品から</li>
		</ul>
		<img class="cta" src="<?php echo get_template_directory_uri(); ?>/images/for-campanies-cta.png" alt="">
  </section>

</main>
<?php get_footer(); ?>