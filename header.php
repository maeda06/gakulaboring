<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>がくラボりんぐ</title>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/reset.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Noto+Sans+JP:wght@100..900&display=swap&family=Mochiy+Pop+One&display=swap&family=Anton&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body>
	<!-- <div class="loading" data-opening-animation>
		<div class="loading__inner">
			<img class="loading_subtitle" src="<?//php echo get_template_directory_uri(); ?>/images/kv-subtitle.png" alt="">
		</div>
	</div> -->
	<header id="main-header">
		<nav>
			<ul>
				<li><a href="#">項目1</a></li>
				<li><a href="#">項目2</a></li>
				<li><a href="#">項目3</a></li>
				<li><a href="#">項目4</a></li>
				<li><a href="#">項目5</a></li>
				<li><a href="#">項目6</a></li>
				<li><a href="#">項目7</a></li>
				<li><a href="#">項目8</a></li>
				<li><a href="#">項目9</a></li>
			</ul>
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
			<ul>
				<li><a href="#">項目1</a></li>
				<li><a href="#">項目2</a></li>
				<li><a href="#">項目3</a></li>
				<li><a href="#">項目4</a></li>
				<li><a href="#">項目5</a></li>
				<li><a href="#">項目6</a></li>
				<li><a href="#">項目7</a></li>
				<li><a href="#">項目8</a></li>
				<li><a href="#">項目9</a></li>
			</ul>
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