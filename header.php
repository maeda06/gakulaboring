<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>がくラボりんぐ</title>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/reset.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/common.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/style.css">
	<?php if( is_page('portfolio') ): ?><link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/portfolio.css"><?php endif; ?>
	<?php if( is_page('review') ): ?><link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/review.css"><?php endif; ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/sp.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Noto+Sans+JP:wght@100..900&display=swap&family=Mochiy+Pop+One&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body>
	<header>
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
		<div class="logo"><h1>ロゴ</h1></div>
		<div class="btn btn--black">
			<a href="#"><span>ログイン</span></a>
			<a href="#"><span>会員登録</span></a>
			<button type="button">
				<span class="line"></span>
			</button>
		</div>
	</header>