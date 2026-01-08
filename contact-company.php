<?php /* Template Name:問い合わせ（企業向け） */ ?>
<?php get_header(); ?>
<main>
	<section class="header-title">
		<small>企業の方向け</small>
		<h1>お問い合わせ</h1>
		<div class="en">contact</div>
	</section>

	<section class="form-wrapper">
		<div id="loadingOverlay" class="loading-overlay">
		  <div class="spinner"></div>
		  <p>送信中です…</p>
		</div>
		<form action="" method="post" id="enterpriseForm">
			<!-- 会社名 -->
			<div class="form-row">
				<div class="form-label">
					会社名
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="companyName" type="text" class="form-control" placeholder="例：テキストテキストテキスト" required>
				</div>
			</div>

			<!-- 会社名　読み仮名（カナ） -->
			<div class="form-row">
				<div class="form-label">
					会社名（カナ）
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="companyNameKana" type="text" class="form-control" placeholder="例：テキストテキストテキスト" required>
				</div>
			</div>

			<!-- 担当者名 -->
			<div class="form-row">
				<div class="form-label">
					担当者名
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="name" type="text" class="form-control" placeholder="例：テキストテキストテキスト" required>
				</div>
			</div>

			<!-- 担当者名　読み仮名（カナ） -->
			<div class="form-row">
				<div class="form-label">
					担当者名（カナ）
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="nameKana" type="text" class="form-control" placeholder="例：テキストテキストテキスト" required>
				</div>
			</div>

			<!-- ホームページアドレス -->
			<div class="form-row">
				<div class="form-label">
					ホームページアドレス
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="website" type="url" class="form-control" placeholder="例：https://example.com" required>
					<small class="form-note">
					  ※ 特に無い場合は『なし』と記載ください。
					</small>
				</div>
			</div>

			<!-- 担当者メールアドレス -->
			<div class="form-row">
				<div class="form-label">
					担当者メールアドレス
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
					<input name="zip" type="text" class="form-control" placeholder="例：000-0000" required>
				</div>
			</div>

			<!-- 住所 -->
			<div class="form-row">
				<div class="form-label">
					住所
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="address" type="text" class="form-control" placeholder="例：テキストテキストテキスト" required>
				</div>
			</div>

			<!-- 業種 -->
			<div class="form-row">
				<div class="form-label">
					業種
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="industry" type="text" class="form-control" placeholder="例：IT・Web" required>
				</div>
			</div>

			<!-- 事業概要 -->
			<div class="form-row">
				<div class="form-label">
					事業概要
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="businessSummary" type="text" class="form-control" placeholder="例：テキストテキストテキスト" required>
				</div>
			</div>

			<!-- 設立日 -->
			<div class="form-row">
				<div class="form-label">
					設立日
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="establishedDate" type="text" class="form-control" placeholder="例：YYYYMMDD" required>
				</div>
			</div>

			<!-- 資本金 -->
			<div class="form-row">
				<div class="form-label">
					資本金
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="capital" type="text" class="form-control" placeholder="例：1000万円" required>
				</div>
			</div>

			<!-- 代表者名 -->
			<div class="form-row">
				<div class="form-label">
					代表者名
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="representativeName" type="text" class="form-control" placeholder="例：テキストテキストテキスト" required>
				</div>
			</div>

			<!-- 役職 -->
			<div class="form-row">
				<div class="form-label">
					役職
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="position" type="text" class="form-control" placeholder="例：代表取締役" required>
				</div>
			</div>

			<!-- 従業員数 -->
			<div class="form-row">
				<div class="form-label">
					従業員数
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<input name="employees" type="text" class="form-control" placeholder="例：20名" required>
				</div>
			</div>

			<!-- 求める人材像 -->
			<div class="form-row">
				<div class="form-label">
					求める人材像
					<span class="required-badge">必須</span>
				</div>
				<div class="form-field">
					<textarea name="idealCandidate" class="form-control" placeholder="例：テキストテキストテキスト" required></textarea>
				</div>
			</div>

			<!-- その他アピールポイント -->
			<div class="form-row">
				<div class="form-label">
					その他アピールポイント
				</div>
				<div class="form-field">
					<textarea name="appealPoint" class="form-control" placeholder="例：テキストテキストテキスト"></textarea>
				</div>
			</div>

			<div class="submit-wrapper">
				<button type="submit" class="btn-submit">送信</button>
			</div>
		</form>
	</section>
</main>

<!-- フォーム送信処理 -->
<script>
	function isAllowedEmail(email) {
	  const domain = email.split('@')[1]?.toLowerCase();
	  if (!domain) return false;

	  // Gmail
	  if (domain === 'gmail.com' || domain === 'googlemail.com') {
		return true;
	  }

	  // 明確に弾きたいフリーメールドメイン
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

	  // それ以外 = 独自ドメイン（Workspace含む可能性）
	  return true;
	}
	  
	document.getElementById('enterpriseForm').addEventListener('submit', async function(e) {
	  e.preventDefault();

	  const form = e.target;
	  const submitBtn = form.querySelector('button[type="submit"]');
	  const loading = document.getElementById('loadingOverlay');
		
	  //  メールバリデーション
	  if (!isAllowedEmail(form.email.value)) {
		alert(
		  '担当者メールアドレスは\n' +
		  'Googleアカウントのメールアドレスをご入力ください。'
		);
		return;
	  }

	  // 送信中UI ON
	  submitBtn.disabled = true;
	  loading.classList.add('active');

	  try {
		const params = new URLSearchParams({
		  companyName: form.companyName.value,
		  companyNameKana: form.companyNameKana.value,
		  name: form.name.value,
		  nameKana: form.nameKana.value,
		  website: form.website.value,
		  email: form.email.value,
		  tel: form.tel.value,
		  zip: form.zip.value,
		  address: form.address.value,
		  industry: form.industry.value,
		  businessSummary: form.businessSummary.value,
		  establishedDate: form.establishedDate.value,
		  capital: form.capital.value,
		  representativeName: form.representativeName.value,
		  position: form.position.value,
		  employees: form.employees.value,
		  idealCandidate: form.idealCandidate.value,
		  appealPoint: form.appealPoint.value,
		  type: "enterprise"
		});

		const res = await fetch(
		  'https://script.google.com/macros/s/AKfycbxYlmS7j4OWyO8NG_iNulDBm7BMbIe8R3zu54kjc7hetgQo_U1qmWfs90HythsEJ-5xaw/exec',
		  {
			method: 'POST',
			body: params
		  }
		);

		const result = await res.json();

		if (result.status === "ok") {
		  window.location.href = "/contact-thanks/?type=enterprise";
		} else {
		  throw new Error(result.message);
		}

	  } catch (err) {
		console.error(err);
		alert("送信に失敗しました。\n" + err.message);

		// エラー時は戻す
		submitBtn.disabled = false;
		loading.classList.remove('active');
	  }
	});
</script>

<?php get_footer(); ?>