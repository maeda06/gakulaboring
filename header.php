<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>がくラボりんぐ</title>
	<meta name="description" content="がくラボりんぐは大学生・美大生・芸大生の就活・キャリア形成を支援するプラットフォーム。学生起業家・フリーランサー向けのデザイン・生成AI・マーケティングなどのビジネススキル習得や、地域インフルエンサー・地方創生・地域活性の活動を応援。NISA・お金の勉強などマネー知識、広告代理店へのキャリア支援、ワークライフ情報も提供します。">
	<meta name="keywords" content="がくラボりんぐ,がくラボリング,がくらぼりんぐ,がくらぼリング,がくラボ,がくらぼ,就活,学生起業家,フリーランサー,大学生,美大,芸大,就職活動,デザイン,生成AI,マーケティング,広告代理店,キャリア形成,地域インフルエンサー,地方創生,地域活性,キャリア,ワークライフ,ビジネススキル,マネー,NISA,お金の勉強">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/reset.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Noto+Sans+JP:wght@100..900&display=swap&family=Mochiy+Pop+One&display=swap&family=Anton&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
	<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "がくラボりんぐ",
    "alternateName": ["がくラボリング", "がくらぼりんぐ", "がくらぼリング", "がくラボ", "がくらぼ"],
    "description": "大学生・美大生・芸大生の就活・キャリア形成を支援。学生起業家・フリーランサー向けのデザイン・生成AI・マーケティングなどのビジネススキル習得や、地域インフルエンサー・地方創生・地域活性の活動を応援。NISA・お金の勉強などマネー知識、広告代理店へのキャリア支援、ワークライフ情報も提供します。",
    "url": "https://www.gakulabo.sustainablejpn.com/",
    "keywords": "就活,学生起業家,フリーランサー,大学生,美大,芸大,就職活動,デザイン,生成AI,マーケティング,広告代理店,キャリア形成,地域インフルエンサー,地方創生,地域活性,キャリア,ワークライフ,ビジネススキル,マネー,NISA,お金の勉強"
  }
  </script>
</head>
<body>
	<!-- <div class="loading" data-opening-animation>
		<div class="loading__inner">
			<img class="loading_subtitle" src="<?//php echo get_template_directory_uri(); ?>/images/kv-subtitle.png" alt="">
		</div>
	</div> -->
	<header id="main-header">
		<nav>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'global',
				'container'      => false
			));
			?>
		</nav>
		<div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo/logo04.png" alt=""></a></div>
		<div class="btn btn--black">
			<a class="worker" href="/contact-worker"><span>会員登録</span></a>
			<a class="company" href="/contact-company"><span>企業登録</span></a>
			<button type="button">
				<span class="line"></span>
			</button>
		</div>
	</header>
	<header id="fixed-header">
		<nav>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'global',
				'container'      => false
			));
			?>
		</nav>
		<div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo/logo04.png" alt=""></a></div>
		<div class="btn btn--black">
			<a class="worker" href="/contact-worker"><span>会員登録</span></a>
			<a class="company" href="/contact-company"><span>企業登録</span></a>
			<button type="button">
				<span class="line"></span>
			</button>
		</div>
	</header>