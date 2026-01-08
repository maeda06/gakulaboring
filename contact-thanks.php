<?php /* Template Name:問い合わせ完了（共通） */ ?>
<?php
$type = $_GET['type'] ?? '';

$chat_url = 'https://chat.google.com/room/AAQAIvXu9XY';

if ($type === 'enterprise') {
  $chat_url = 'https://chat.google.com/room/AAQANXBxVXk';
} elseif ($type === 'student') {
  $chat_url = 'https://chat.google.com/room/AAQAIvXu9XY';
}
?>
<?php get_header(); ?>
<main class="thanks">
  <section class="thanks-wrapper">
    <div class="thanks-card">

      <h1 class="thanks-title">
        登録が完了しました。
      </h1>

      <p class="thanks-lead">
        この度は、<br>
		がくラボリングにご登録いただき<br>
        誠にありがとうございます。
      </p>

      <div class="thanks-text">
        <p>
          ご入力頂いたメールアドレスに、<br>
          <strong>2つのGoogleチャットの招待用URL</strong>をお送りしております。
        </p>

        <ul>
          <li>・個人登録用</li>
          <li>・会員チャット用</li>
        </ul>

        <p>
          個人登録用のGoogleチャットに参加の上、<br>
          下記URLより会員チャットへご参加ください。
        </p>

        <p class="thanks-link">
          <a href="<?php echo esc_html($chat_url); ?>" target="_blank" rel="noopener">
            <?php echo esc_html($chat_url); ?>
          </a>
        </p>

        <p>
          また事前に「Googleチャット」アプリをダウンロードして頂きますと、<br>
          登録がよりスムーズに行えます。
        </p>
      </div>

      <div class="thanks-footer">
        <p>
          がくラボリング事業部 事務局一同<br>
          運営団体 一般社団法人 日本サスティナブルコミッティ
        </p>
      </div>

    </div>
	  <div class="app-download">
		  <p class="app-download-text">
			事前に「Google Chat」アプリをダウンロードしていただくと、<br>
			登録がよりスムーズに行えます。
		  </p>

		  <div class="app-download-buttons">
			<a href="https://play.google.com/store/apps/details?id=com.google.android.apps.dynamite"
			   target="_blank" rel="noopener">
			  <img src="https://play.google.com/intl/ja/badges/static/images/badges/ja_badge_web_generic.png"
				   alt="Google Playで手に入れよう">
			</a>

			<a href="https://apps.apple.com/jp/app/google-chat/id1163852619"
			   target="_blank" rel="noopener">
			  <img src="https://tools.applemediaservices.com/api/badges/download-on-the-app-store/black/ja-jp?size=250x83"
				   alt="App Storeからダウンロード">
			</a>
		  </div>
		</div>
  </section>
</main>
<?php get_footer(); ?>