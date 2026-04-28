<footer>
		<div class="top-btn" href="#"><img src="<?php echo get_template_directory_uri() ?>/images/back-to-top.png" alt=""></div>
		<div class="footer-inner">
			<div class="icon">
				<div class="logo"><img src="<?php echo get_template_directory_uri() ?>/images/logo/logo03.png" alt=""></div>
				<ul class="sns-list">
					<li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/sns_x.png" alt=""></a></li>
					<li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/sns_fb.png" alt=""></a></li>
					<li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/sns_insta.png" alt=""></a></li>
					<li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/sns_youtube.png" alt=""></a></li>
					<li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/sns_line.png" alt=""></a></li>
				</ul>
			</div>
			<div class="footer-nav">
				<nav>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'container'      => false
					));
					?>
				</nav>
				<div class="footer-btn">
					<a class="worker" href="/contact-worker">会員登録</a>
					<a class="company" href="/contact-company">企業登録</a>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<ul>
				<li><a href="#">プライバシーポリシー</a></li>
				<li><a href="#">利用規約／免責事項</a></li>
				<li><a href="#">運営会社</a></li>
			</ul>
			<p class="site-alias">がくラボりんぐ（がくラボリング / がくらぼりんぐ / がくらぼリング）は「がくラボ」「がくらぼ」の愛称で親しまれています。</p>
			<p class="site-keywords" aria-hidden="true">就活・就職活動、学生起業家・フリーランサー支援、デザイン・生成AI・マーケティング・ビジネススキルの学習、広告代理店へのキャリア形成、地域インフルエンサー・地方創生・地域活性の推進、大学生・美大生・芸大生のワークライフ支援、NISA・お金の勉強などマネー情報を提供しています。</p>
		<span class="copyright">© 2025 がくラボりんぐ All Rights Reserved.</span>
		</div>
	</footer>

	<?php wp_footer(); ?>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inview/1.0.0/jquery.inview.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/rellax/1.12.1/rellax.min.js"></script>
	<script src="<?php echo get_template_directory_uri() ?>/js/main.js"></script>
</body>
</html>