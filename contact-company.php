<?php /* Template Name:問い合わせ（企業向け） */ ?>
<?php get_header(); ?>
<main>
	<section class="header-title">
		<small>企業の方向け</small>
		<h1>お問い合わせ</h1>
		<div class="en">contact</div>
	</section>

	<section class="form-wrapper">
		<form action="#" method="post">
			<!-- 会社名 -->
			<div class="form-row">
				<div class="form-label">
					会社名
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="company" type="text" class="form-control" placeholder="例：テキストテキストテキスト">
				</div>
			</div>
			<!-- 氏名 -->
			<div class="form-row">
				<div class="form-label">
					氏名
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="name" type="text" class="form-control" placeholder="例：テキストテキストテキスト">
				</div>
			</div>
			<!-- 読み仮名 -->
			<div class="form-row">
				<div class="form-label">
					読み仮名（カナ）
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="kana" type="text" class="form-control" placeholder="例：テキストテキストテキスト">
				</div>
			</div>
			<!-- メールアドレス -->
			<div class="form-row">
				<div class="form-label">
					メールアドレス
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="email" type="email" class="form-control" placeholder="例：テキストテキストテキスト">
				</div>
			</div>
			<!-- 電話番号 -->
			<div class="form-row">
				<div class="form-label">
					電話番号（ハイフン無し）
				</div>
				<div class="form-field">
					<input name="tell" type="tel" class="form-control" placeholder="例：テキストテキストテキスト">
				</div>
			</div>
			<!-- 住所 -->
			<div class="form-row">
				<div class="form-label">
					住所
				</div>
				<div class="form-field">
					<input name="address" type="text" class="form-control" placeholder="例：テキストテキストテキスト">
				</div>
			</div>
			<!-- お問い合わせ内容 -->
			<div class="form-row">
				<div class="form-label">
					お問い合わせ内容
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<textarea name="detail" class="form-control" placeholder="例：テキストテキストテキスト"></textarea>
				</div>
			</div>
			<div class="submit-wrapper">
				<button type="submit" class="btn-submit">送信</button>
			</div>
		</form>
	</section>
</main>
<?php get_footer(); ?>