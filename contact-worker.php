<?php /* Template Name:問い合わせ（求職者向け） */ ?>
<?php get_header(); ?>
<main>
	<section class="header-title">
		<small>求職者向け</small>
		<h1>会員登録</h1>
		<div class="en">join</div>
	</section>

	<section class="form-wrapper">
		<div id="loadingOverlay" class="loading-overlay">
		  <div class="spinner"></div>
		  <p>送信中です…</p>
		</div>
		<form action="" method="post" id="studentForm">
			<!-- 氏名 -->
			<div class="form-row">
				<div class="form-label">
					氏名
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="name" type="text" class="form-control" placeholder="例：鈴木花子" required>
				</div>
			</div>
			<!-- 読み仮名（カナ） -->
			<div class="form-row">
				<div class="form-label">
					読み仮名（カナ）
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="nameKana" type="text" class="form-control" placeholder="例：すずきはなこ" required>
				</div>
			</div>
			<!-- メールアドレス -->
			<div class="form-row">
				<div class="form-label">
					メールアドレス
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="email" type="email" class="form-control" placeholder="例：example@gmail.com" required>
					<small class="form-note">
					  ※ Googleアカウントのメールアドレスをご入力ください（フリーメール不可）
					</small>
				</div>
			</div>
			<!-- 電話番号 -->
			<div class="form-row">
				<div class="form-label">
					電話番号（ハイフン無し）
				</div>
				<div class="form-field">
					<input name="tel" type="tel" class="form-control" placeholder="例：09012345678">
				</div>
			</div>
			<!-- 郵便番号 -->
			<div class="form-row">
				<div class="form-label">
					郵便番号
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="zip" type="text" class="form-control" placeholder="例：123-4567" required>
				</div>
			</div>
			<!-- 住所 -->
			<div class="form-row">
				<div class="form-label">
					住所
				</div>
				<div class="form-field">
					<input name="address" type="text" class="form-control" placeholder="例：東京都千代田区霞ヶ関">
				</div>
			</div>
			<!-- 生年月日 -->
			<div class="form-row">
				<div class="form-label">
					生年月日
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="birthDate" type="text" class="form-control" placeholder="例：YYYYMMDD" required>
				</div>
			</div>
			<!-- 所属学校名/学部/お勤め先 -->
			<div class="form-row">
				<div class="form-label">
					所属学校名/学部/お勤め先
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="affiliation" type="text" class="form-control" placeholder="例：〇〇美術大学、〇〇学科2年" required>
				</div>
			</div>
			<!-- 経験スキルセット/対応可能ツール -->
			<div class="form-row">
				<div class="form-label">
					経験スキルセット/対応可能ツール
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="skills" type="text" class="form-control" placeholder="例：Canva 1年、Adobe Photoshop 3年、Illustrator 2年、Figma 2年" required>
					<small class="form-note">
					  ※ 特に無い場合は『なし』と記載ください。
					</small>
				</div>
			</div>
			<!-- ポートフォリオ -->
			<div class="form-row">
				<div class="form-label">
					ポートフォリオ
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<textarea name="portfolio" class="form-control" placeholder="例：canva、notion、forioなどのリンク" required></textarea>
					<small class="form-note">
					  ※ 特に無い場合は『なし』と記載ください。
					</small>
				</div>
			</div>
			<!-- その他アピールポイント -->
			<div class="form-row">
				<div class="form-label">
					その他アピールポイント
				</div>
				<div class="form-field">
					<textarea name="appealPoint" class="form-control" placeholder="例：フリーランスデザイナーとして今後頑張りたいと思っています。やる気あります。"></textarea>
				</div>
			</div>
			<div class="submit-wrapper">
				<button type="submit" class="btn-submit">送信</button>
			</div>
		</form>
	</section>
</main>
<script>
	function isAllowedEmail(email) {
	  const domain = email.split('@')[1]?.toLowerCase();
	  if (!domain) return false;

	  // Gmail
	  if (domain === 'gmail.com' || domain === 'googlemail.com') {
		return true;
	  }

	  // 明確に弾くフリーメール
	  const blockedDomains = [
		'yahoo.co.jp',
		'yahoo.com',
		'outlook.com',
		'hotmail.com',
		'icloud.com',
		'me.com',
		'live.com',
		'aol.com',
		'gmx.com',
		'gmx.net',
		'yandex.com'
	  ];

	  if (blockedDomains.includes(domain)) {
		return false;
	  }

	  // それ以外は独自ドメイン（Workspace含む想定）
	  return true;
	}
	  
	function isOnlyNumber(value) {
	  return /^[0-9]+$/.test(value);
	}
	  
	function isHyphenNumber(value) {
	  return /^[0-9-]+$/.test(value);
	}
	 
	  document.getElementById('studentForm').addEventListener('submit', async function(e) {
	  e.preventDefault();

	  const form = e.target;
	  const submitBtn = form.querySelector('button[type="submit"]');
	  const loading = document.getElementById('loadingOverlay');

	  // --------------------
	  // メールバリデーション
	  // --------------------
	  if (!isAllowedEmail(form.email.value)) {
		alert(
		  '担当者メールアドレスは\n' +
		  'Googleアカウントのメールアドレスをご入力ください。'
		);
		return;
	  }

	  // --------------------
	  // 数字のみバリデーション
	  // --------------------

	  // 郵便番号
	  if (!isHyphenNumber(form.zip.value)) {
		alert('郵便番号は数字のみで入力してください。');
		form.zip.focus();
		return;
	  }

	  // 電話番号（任意入力）
	  if (form.tel.value && !isOnlyNumber(form.tel.value)) {
		alert('電話番号は数字のみで入力してください。');
		form.tel.focus();
		return;
	  }

	  // 誕生日（YYYYMMDD）
	  if (!isOnlyNumber(form.birthDate.value)) {
		alert('誕生日は数字のみ（YYYYMMDD）で入力してください。');
		form.establishedDate.focus();
		return;
	  }

	  // 送信中UI ON
	  submitBtn.disabled = true;
	  loading?.classList.add('active');

	  try {
		const params = new URLSearchParams({
		  name: form.name.value,
		  nameKana: form.nameKana.value,
		  email: form.email.value,
		  tel: form.tel.value,
		  zip: form.zip.value,
		  address: form.address.value,
		  birthDate: form.birthDate.value,
		  affiliation: form.affiliation.value,
		  skills: form.skills.value,
		  portfolio: form.portfolio.value,
		  appealPoint: form.appealPoint.value,
		});

		const res = await fetch(
		  'https://script.google.com/macros/s/AKfycbw40S-gLyzg6lQ7G1qNpThZU70CiMnJ50_Xerik4Py1Qo1AJPEeNRkqRRTdDIIhbQXxPQ/exec',
		  {
			method: 'POST',
			body: params
		  }
		);

		const result = await res.json();

		if (result.status === 'ok') {
		  window.location.href = '/contact-thanks/?type=student';
		} else {
		  throw new Error(result.message);
		}

	  } catch (err) {
		console.error(err);
		alert('送信に失敗しました。\n' + err.message);

		submitBtn.disabled = false;
		loading?.classList.remove('active');
	  }
	});
</script>
<?php get_footer(); ?>