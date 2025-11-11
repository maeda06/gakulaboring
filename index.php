<?php get_header(); ?>
	<main>
		<section id="kv">
			<img class="asobuyouni" src="<?php echo get_template_directory_uri() ?>/images/kv-asobuyouni.png" alt="">
			<img class="kv-girl" src="<?php echo get_template_directory_uri() ?>/images/portfolio-girl.png" alt="">
			<img class="subtitle" src="<?php echo get_template_directory_uri(); ?>/images/kv-subtitle.png" alt="">
			<img class="sigotowosuru" src="<?php echo get_template_directory_uri() ?>/images/kv-sigotowosuru.png" alt="">
			<div class="cta"><img src="<?php echo get_template_directory_uri() ?>/images/cta.png" alt=""></div>
		</section>
		<div class="lattice--blue">
			<?php
			$args = array(
				'post_type' => 'post',
				'post_per_page' => 4,
			);
			$the_query =new WP_Query( $args );
			if( $the_query->have_posts() ):
			?>
				<section id="news" class="inview">
					<div class="news-content">
						<h2 class="heading heading--blue inview"><span>NEWS</span>NEWS</h2>
						<ul>
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<li>
								<a href="<?php echo get_permalink(); ?>">
									<?php
									if(has_post_thumbnail()):
										the_post_thumbnail();
									else:
									?>
									<img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" alt="" />
									<?php endif; ?>
									<div class="list-text">
										<h3><?php echo get_the_title(); ?></h3>
										<p><?php the_excerpt(); ?></p>
									</div>
								</a>
							</li>
							<?php endwhile; ?>
						</ul>
						<div class="btn btn--black"><a href="#"><span>COMING SOON</span><img src="<?php echo get_template_directory_uri() ?>/images/arrow.png" alt=""></a></div>
					</div>
				</section>
				<?php wp_reset_postdata(); endif; ?>
			<section id="concept">
				<div class="concept-text">
					<h2 class="heading heading--blue inview"><span>CONCEPT</span>CONCEPT</h2>
					<div class="memo">
						<h3><span class="orange">遊ぶように仕事をする!!</span>って？<br><span class="blue">がくラボりんぐとは？</span></h3>
						<p>▼何ができるの？</p>
						<p class="text--pc"><span>就職活動を成功に導く！</span>がくラボりんぐの<span>協力サポート</span><br><span>スキルアップ＆新たな挑戦！</span>がくラボりんぐで<span>広がる可能性</span><span>仲間と繋がる！</span>がくラボりんぐコミュニティ<br>企業とのマッチング<span>企業が君を探す⁉<br></span>ポートフォリオ</span>の作成<br>将来の不安を解消！<span>マネーリテラシー向上支援</span></p>
						<p class="text--sp"><span>就職活動を成功に導く！</span>がくラボりんぐの<span>協力サポート</span><span>スキルアップ＆新たな挑戦！</span>がくラボりんぐで<span>広がる可能性</span><span>仲間と繋がる！</span>がくラボりんぐコミュニティ<br>企業とのマッチング<span>企業が君を探す⁉<br></span>ポートフォリオ</span>の作成<br>将来の不安を解消！<span>マネーリテラシー向上支援</span></p>
						<div class="btn btn--black"><a href="#"><span>COMING SOON</span><img src="<?php echo get_template_directory_uri() ?>/images/arrow.png" alt=""></a></div>
					</div>
					<div class="btn btn--black"><a href="#"><span>COMING SOON</span><img src="<?php echo get_template_directory_uri() ?>/images/arrow.png" alt=""></a></div>
				</div>
				<div class="concept-image">
					<img src="<?php echo get_template_directory_uri() ?>/images/concept-boy.png" alt="">
				</div>
			</section>
		</div>
		<section id="about">
			<div class="loop-wrap loop-wrap--left">
				<ul>
					<li>MEMBER ONRY</li>
					<li>MEMBER ONRY</li>
					<li>MEMBER ONRY</li>
					<li>MEMBER ONRY</li>
					<li>MEMBER ONRY</li>
					<li>MEMBER ONRY</li>
				</ul>
			</div>
			<span class="flower rellax" data-rellax-speed="0" data-rellax-mobile-speed="0" data-rellax-tablet-speed="0" data-rellax-desktop-speed="3"></span>
			<div class="cloud--sp"><img src="<?php echo get_template_directory_uri(); ?>/images/about-bg--cloud-sp.png" alt=""></div>
			<h2 class="heading heading--orange inview"><span>このサイトについて</span>このサイトについて</h2>
			<ul class="about-list inview">
				<li><div class="list-image"><img src="<?php echo get_template_directory_uri() ?>/images/about--glass.png" alt=""></div><p>就職に関する<br>情報収集ができる</p></li>
				<li class="members-only"><div class="list-image"><img src="<?php echo get_template_directory_uri() ?>/images/about--speech-bubble.png" alt=""></div><p>チャットで話せる</p></li>
				<li class="members-only"><div class="list-image"><img src="<?php echo get_template_directory_uri() ?>/images/about--book.png" alt=""></div><p>役に立つ情報を<br>学ぶことが出来る</p></li>
				<li class="members-only"><div class="list-image"><img src="<?php echo get_template_directory_uri() ?>/images/about--hand.png" alt=""></div><p>就職のマッチング<br>ができる</p></li>
			</ul>
			<div class="btn btn--black"><a href="#"><span>COMING SOON</span><img src="<?php echo get_template_directory_uri() ?>/images/arrow.png" alt=""></a></div>
		</section>
		<section id="contents">
			<div class="contents-list inview">
				<h2 class="heading heading--white">会員限定コンテンツ</h2>
				<ul>
					<li>
						<img src="<?php echo get_template_directory_uri() ?>/images/contents--exchange.png" alt="">
						<div class="list-text">
							<h4>【交流を深める】<br>チャットルームで仲間と本音トーク！</h4>
							<p>就活の不安、日々の疑問、誰かに話したいこと…がくラボりんぐの会員なら、全国の仲間とリアルタイムで繋がれます。同じ目標...</p>
						</div>
					</li>
					<li>
						<img src="<?php echo get_template_directory_uri() ?>/images/contents--knowledge.png" alt="">
						<div class="list-text">
							<h4>【交流を深める】<br>チャットルームで仲間と本音トーク！</h4>
							<p>就活の不安、日々の疑問、誰かに話したいこと…がくラボりんぐの会員なら、全国の仲間とリアルタイムで繋がれます。同じ目標...</p>
						</div>
					</li>
					<li>
						<img src="<?php echo get_template_directory_uri() ?>/images/contents--encounter.png" alt="">
						<div class="list-text">
							<h4>【交流を深める】<br>チャットルームで仲間と本音トーク！</h4>
							<p>就活の不安、日々の疑問、誰かに話したいこと…がくラボりんぐの会員なら、全国の仲間とリアルタイムで繋がれます。同じ目標...</p>
						</div>
					</li>
				</ul>
				<div class="btn btn--black"><a href="#"><span>COMING SOON</span><img src="<?php echo get_template_directory_uri(); ?>/images/arrow.png" alt=""></a></div>
				<img class="chatroom-bg chatroom-bg--tv rellax" data-rellax-speed="2" data-rellax-percentage="0.5" src="<?php echo get_template_directory_uri(); ?>/images/tv.png" alt="">
				<img class="chatroom-bg chatroom-bg--sakura rellax" data-rellax-speed="1" data-rellax-percentage="0.5" src="<?php echo get_template_directory_uri(); ?>/images/sakura.png" alt="">
				<img class="chatroom-bg chatroom-bg--bike rellax" data-rellax-speed="2" data-rellax-percentage="0.5" src="<?php echo get_template_directory_uri(); ?>/images/bike.png" alt="">
				<img class="chatroom-bg chatroom-bg--doll rellax" data-rellax-speed="3" data-rellax-percentage="0.5" src="<?php echo get_template_directory_uri(); ?>/images/doll.png" alt="">
			</div>
			<div class="chatroom chatroom--pc inview">
				<div class="loop-wrap loop-wrap--right">
					<ul>
						<li>HOT CHAT</li>
						<li>HOT CHAT</li>
						<li>HOT CHAT</li>
						<li>HOT CHAT</li>
						<li>HOT CHAT</li>
						<li>HOT CHAT</li>
					</ul>
				</div>
				<img class="chatroom-heading" src="<?php echo get_template_directory_uri() ?>/images/contents-chatroom--head.png" alt="">
				<ul class="chatroom__list">
					<li>
						<h4>〇〇は『学生時代に最も打ち込んだこと』を深...</h4>
						<div class="chat">
							<img class="icon" src="<?php echo get_template_directory_uri() ?>/images/chatroom-icon.png" alt="">
							<div class="text">
								<h5>【企業別対策】株式会社〇〇の面接何聞かれますか？</h5>
								<p>株式会社〇〇の面接なんですけど、どんなこと聞かれるか知ってる方いますか？特に最終面接...</p>
							</div>
						</div>
					</li>
					<li>
						<h4>夏インターンから参加してる人多いよ！早めに...</h4>
						<div class="chat">
							<img class="icon" src="<?php echo get_template_directory_uri() ?>/images/chatroom-icon.png" alt="">
							<div class="text">
								<h5>【29卒向け】インターンいつから参加するの？</h5>
								<p>29卒です！周りがインターンの話をしてて焦ってます💦 みんな、いつ頃から参加し始めてますか...</p>
							</div>
						</div>
						<div class="btn btn--black btn--pc"><a href="#"><span>COMING SOON</span><img src="<?php echo get_template_directory_uri() ?>/images/arrow.png" alt=""></a></div>
						<div class="loop-wrap loop-wrap--left">
							<ul>
								<li>HOT CHAT</li>
								<li>HOT CHAT</li>
								<li>HOT CHAT</li>
								<li>HOT CHAT</li>
								<li>HOT CHAT</li>
								<li>HOT CHAT</li>
								<li>HOT CHAT</li>
								<li>HOT CHAT</li>
								<li>HOT CHAT</li>
							</ul>
						</div>
					</li>
					<li>
						<h4>まずは模擬面接で場数を踏むのが一番！がくラ...</h4>
						<div class="chat">
							<img class="icon" src="<?php echo get_template_directory_uri() ?>/images/chatroom-icon.png" alt="">
							<div class="text">
								<h5>【基礎から応用】面接対策について</h5>
								<p>面接が本当に苦手で…特に自己PRと志望動機がうまく話せません。何か練習方法とかアドバイス...</p>
							</div>
						</div>
					</li>
				<div class="btn btn--black btn--sp"><a href="#"><span>COMING SOON</span><img src="<?php echo get_template_directory_uri() ?>/images/arrow.png" alt=""></a></div>
				</ul>
			</div>
		</section>
		<section id="can">
			<h2 class="heading heading--blue inview"><span>このサイトでは<br>こんなことができる！</span>このサイトでは<br>こんなことができる！</h2>
			<ul>
				<li class="inview">
					<div class="item-wrap">
						<p>気になるあの企業のことを知りたい！</p>
						<div class="can-list__link"><a href="#">企業の口コミページへ</a></div>
					</div>
				</li>
				<li class="inview">
					<div class="item-wrap">
						<p>全国の大学生と交流したい！</p>
						<div class="can-list__link"><a href="#">チャットページへ</a></div>
					</div>
				</li>
				<li class="inview">
					<div class="item-wrap">
						<p>就職情報をいち早くキャッチしたい！</p>
						<div class="can-list__link"><a href="#">就活情報ページへ</a></div>
					</div>
				</li>
			</ul>
		</section>
		<section id="help">
			<img class="bg" src="<?php echo get_template_directory_uri() ?>/images/help-bg01.png" alt="">
			<h2 class="heading heading--blue inview"><span>ヘルプページ</span>ヘルプページ</h2>
			<p class="subtitle">よくある質問</p>

			<div class="faq-list faq-list--pc">
				<h3>登録・ログイン・アカウントについて</h3>
				<div class="cp_actab">
					<input id="cp_tabfour1" type="checkbox" name="tabs">
					<label for="cp_tabfour1"><h4>登録したメールアドレスを変更したいです。</h4><span></span></label>
					<div class="cp_actab-content">はい、会員限定コンテンツのご利用には会員登録が必要です。無料会員登録だけで、就活お役立ち記事の閲覧、企業クチコミの検索・投稿、チャットルームへの参加など、すべての機能をご利用いただけます。</div>
				</div>
				<div class="cp_actab">
					<input id="cp_tabfour2" type="checkbox" name="tabs">
					<label for="cp_tabfour2"><h4>どこからログインすればいいですか？</h4><span></span></label>
					<div class="cp_actab-content">サイト右上の「ログイン」ボタンから、ご登録いただいたメールアドレスとパスワードでログインしてください。</div>
				</div>
				<div class="cp_actab">
					<input id="cp_tabfour3" type="checkbox" name="tabs">
					<label for="cp_tabfour3"><h4>ログインができません。どうしたらいいですか？</h4><span></span></label>
					<div class="cp_actab-content">まず、ご入力いただいたメールアドレスとパスワードに誤りがないかご確認ください。全角・半角や大文字・小文字も区別されます。それでもログインできない場合は、ご登録のSNSアカウントでお試しいただくか、「パスワードを忘れた方」より再設定をお願いいたします。</div>
				</div>
				<div class="cp_actab">
					<input id="cp_tabfour4" type="checkbox" name="tabs">
					<label for="cp_tabfour4"><h4>ログインパスワードを忘れてしまいました。</h4><span></span></label>
					<div class="cp_actab-content"><a href="#">こちら</a>より再設定をお願いいたします。</div>
				</div>
			</div>

			<div class="faq-list faq-list--pc">
				<h3>ES体験談口コミの投稿・閲覧について</h3>
				<div class="cp_actab">
					<input id="cp_tabfour5" type="checkbox" name="tabs">
					<label for="cp_tabfour5"><h4>ES体験談・クチコミを投稿したいです。</h4><span></span></label>
					<div class="cp_actab-content">会員登録後、各企業ページから投稿が可能です。実際に体験した内容を投稿することで、他の学生の就活をサポートできます。投稿いただいた内容は、運営事務局が確認後に公開されます。</div>
				</div>
				<div class="cp_actab">
					<input id="cp_tabfour6" type="checkbox" name="tabs">
					<label for="cp_tabfour6"><h4>ES体験談・クチコミは誰でも閲覧できますか？</h4><span></span></label>
					<div class="cp_actab-content">投稿されたES体験談やクチコミは、会員限定コンテンツとなります。無料会員登録をしていただくことで、すべての情報を閲覧できるようになります。</div>
				</div>
				<div class="cp_actab">
					<input id="cp_tabfour7" type="checkbox" name="tabs">
					<label for="cp_tabfour7"><h4>投稿したES体験談を修正・削除したいです。</h4><span></span></label>
					<div class="cp_actab-content">ご自身が投稿された内容は、マイページの「投稿履歴」から修正・削除が可能です。</div>
				</div>
			</div>

			<div class="faq-list faq-list--pc">
				<h3>ポートフォリオ登録について</h3>
				<div class="cp_actab">
					<input id="cp_tabfour8" type="checkbox" name="tabs">
					<label for="cp_tabfour8"><h4>ポートフォリオはどこから登録できますか？</h4><span></span></label>
					<div class="cp_actab-content">マイページのプロフィール編集画面から登録できます。WebサイトのURLやPDFを登録することで、企業から直接オファーが届く可能性が高まります。</div>
				</div>
				<div class="cp_actab">
					<input id="cp_tabfour9" type="checkbox" name="tabs">
					<label for="cp_tabfour9"><h4>ポートフォリオを登録するメリットは何ですか？</h4><span></span></label>
					<div class="cp_actab-content"> あなたのスキルや実績を企業にアピールでき、直接オファーが届く可能性が高まります。デザインやWeb制作のスキルを視覚的に伝えるのに非常に効果的です。</div>
				</div>
				<div class="cp_actab">
					<input id="cp_tabfour10" type="checkbox" name="tabs">
					<label for="cp_tabfour10"><h4>どのような形式でポートフォリオを登録できますか？</h4><span></span></label>
					<div class="cp_actab-content">ポートフォリオサイトのURLや、PDFファイルをアップロードして登録できます。複数の作品をまとめて登録することも可能です。</div>
				</div>
				<div class="cp_actab">
					<input id="cp_tabfour11" type="checkbox" name="tabs">
					<label for="cp_tabfour11"><h4>ポートフォリオに登録する容量に制限はありますか？</h4><span></span></label>
					<div class="cp_actab-content">答えテキスト</div>
				</div>
				<div class="cp_actab">
					<input id="cp_tabfour12" type="checkbox" name="tabs">
					<label for="cp_tabfour12"><h4>二次創作物をアップロードしてもいいですか？</h4><span></span></label>
					<div class="cp_actab-content">二次創作物については自己責任でアップロード頂きますようお願いいたします。トラブルが発生しても弊社では責任を負いかねます。サービスの利用規約も参照ください。</div>
				</div>
				<div class="cp_actab">
					<input id="cp_tabfour13" type="checkbox" name="tabs">
					<label for="cp_tabfour13"><h4>動画の投稿も可能ですか？</h4><span></span></label>
					<div class="cp_actab-content">はい、可能です。</div>
				</div>
			</div>

			<div class="faq-list faq-list--sp">
				<h3>登録・ログイン・アカウントについて</h3>
				<div class="cp_actab">
					<input id="cp_tabfour14" type="checkbox" name="tabs">
					<label for="cp_tabfour14" class="sp-label"><h4>会員登録について</h4><span></span></label>
					<div class="cp_actab-content">
						<label for="cp_tabfour14"><h4>登録したメールアドレスを変更したいです。</h4></label>
						<p>はい、会員限定コンテンツのご利用には会員登録が必要です。無料会員登録だけで、就活お役立ち記事の閲覧、企業クチコミの検索・投稿、チャットルームへの参加など、すべての機能をご利用いただけます。</p>
					</div>
				</div>
				<div class="cp_actab">
					<input id="cp_tabfour15" type="checkbox" name="tabs">
					<label for="cp_tabfour15" class="sp-label"><h4>ログインについて</h4><span></span></label>
					<div class="cp_actab-content">
						<label for="cp_tabfour15"><h4>登録したメールアドレスを変更したいです。</h4></label>
						<p>はい、会員限定コンテンツのご利用には会員登録が必要です。無料会員登録だけで、就活お役立ち記事の閲覧、企業クチコミの検索・投稿、チャットルームへの参加など、すべての機能をご利用いただけます。</p>
					</div>
				</div>
				<div class="cp_actab">
					<input id="cp_tabfour16" type="checkbox" name="tabs">
					<label for="cp_tabfour16" class="sp-label"><h4>ES体験談クチコミの投稿・閲覧について</h4><span></span></label>
					<div class="cp_actab-content">
						<label for="cp_tabfour16"><h4>登録したメールアドレスを変更したいです。</h4></label>
						<p>はい、会員限定コンテンツのご利用には会員登録が必要です。無料会員登録だけで、就活お役立ち記事の閲覧、企業クチコミの検索・投稿、チャットルームへの参加など、すべての機能をご利用いただけます。</p>
					</div>
				</div>
				<div class="cp_actab">
					<input id="cp_tabfour17" type="checkbox" name="tabs">
					<label for="cp_tabfour17" class="sp-label"><h4>謝礼について</h4><span></span></label>
					<div class="cp_actab-content">
						<label for="cp_tabfour17"><h4>登録したメールアドレスを変更したいです。</h4></label>
						<p>はい、会員限定コンテンツのご利用には会員登録が必要です。無料会員登録だけで、就活お役立ち記事の閲覧、企業クチコミの検索・投稿、チャットルームへの参加など、すべての機能をご利用いただけます。</p>
					</div>
				</div>
				<div class="cp_actab">
					<input id="cp_tabfour18" type="checkbox" name="tabs">
					<label for="cp_tabfour18" class="sp-label"><h4>メール・スカウト配信・電話について</h4><span></span></label>
					<div class="cp_actab-content">
						<label for="cp_tabfour18"><h4>登録したメールアドレスを変更したいです。</h4></label>
						<p>はい、会員限定コンテンツのご利用には会員登録が必要です。無料会員登録だけで、就活お役立ち記事の閲覧、企業クチコミの検索・投稿、チャットルームへの参加など、すべての機能をご利用いただけます。</p>
					</div>
				</div>
				<div class="cp_actab">
					<input id="cp_tabfour19" type="checkbox" name="tabs">
					<label for="cp_tabfour19" class="sp-label"><h4>エントリー・イベントについて</h4><span></span></label>
					<div class="cp_actab-content">
						<label for="cp_tabfour19"><h4>登録したメールアドレスを変更したいです。</h4></label>
						<p>はい、会員限定コンテンツのご利用には会員登録が必要です。無料会員登録だけで、就活お役立ち記事の閲覧、企業クチコミの検索・投稿、チャットルームへの参加など、すべての機能をご利用いただけます。</p>
					</div>
				</div>
				<div class="cp_actab">
					<input id="cp_tabfour20" type="checkbox" name="tabs">
					<label for="cp_tabfour20" class="sp-label"><h4>株式会社ワンキャリアの選考について</h4><span></span></label>
					<div class="cp_actab-content">
						<label for="cp_tabfour20"><h4>登録したメールアドレスを変更したいです。</h4></label>
						<p>はい、会員限定コンテンツのご利用には会員登録が必要です。無料会員登録だけで、就活お役立ち記事の閲覧、企業クチコミの検索・投稿、チャットルームへの参加など、すべての機能をご利用いただけます。</p>
					</div>
				</div>
				<div class="cp_actab">
					<input id="cp_tabfour21" type="checkbox" name="tabs">
					<label for="cp_tabfour21" class="sp-label"><h4>退会について</h4><span></span></label>
					<div class="cp_actab-content">
						<label for="cp_tabfour21"><h4>登録したメールアドレスを変更したいです。</h4></label>
						<p>はい、会員限定コンテンツのご利用には会員登録が必要です。無料会員登録だけで、就活お役立ち記事の閲覧、企業クチコミの検索・投稿、チャットルームへの参加など、すべての機能をご利用いただけます。</p>
					</div>
				</div>
				<div class="cp_actab">
					<input id="cp_tabfour22" type="checkbox" name="tabs">
					<label for="cp_tabfour22" class="sp-label"><h4>ワンキャリアIDについて</h4><span></span></label>
					<div class="cp_actab-content">
						<label for="cp_tabfour22"><h4>登録したメールアドレスを変更したいです。</h4></label>
						<p>はい、会員限定コンテンツのご利用には会員登録が必要です。無料会員登録だけで、就活お役立ち記事の閲覧、企業クチコミの検索・投稿、チャットルームへの参加など、すべての機能をご利用いただけます。</p>
					</div>
				</div>
				<div class="cp_actab">
					<input id="cp_tabfour23" type="checkbox" name="tabs">
					<label for="cp_tabfour23" class="sp-label"><h4>データ利用について</h4><span></span></label>
					<div class="cp_actab-content">
						<label for="cp_tabfour23"><h4>登録したメールアドレスを変更したいです。</h4></label>
						<p>はい、会員限定コンテンツのご利用には会員登録が必要です。無料会員登録だけで、就活お役立ち記事の閲覧、企業クチコミの検索・投稿、チャットルームへの参加など、すべての機能をご利用いただけます。</p>
					</div>
				</div>
				<div class="cp_actab">
					<input id="cp_tabfour24" type="checkbox" name="tabs">
					<label for="cp_tabfour24" class="sp-label"><h4>利用規約、プライバシー・ポリシー等</h4><span></span></label>
					<div class="cp_actab-content">
						<label for="cp_tabfour24"><h4>登録したメールアドレスを変更したいです。</h4></label>
						<p>はい、会員限定コンテンツのご利用には会員登録が必要です。無料会員登録だけで、就活お役立ち記事の閲覧、企業クチコミの検索・投稿、チャットルームへの参加など、すべての機能をご利用いただけます。</p>
					</div>
				</div>
			</div>
			<div class="btn  btn--black"><a href="#"><span>COMING SOON</span><img src="<?php echo get_template_directory_uri() ?>/images/arrow.png" alt=""></a></div>
		</section>
	</main>
<?php get_footer(); ?>