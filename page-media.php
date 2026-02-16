<?php get_header(); ?>
<!-- DEBUG: page-media.php is loaded -->
<main>
  <!-- カテゴリナビゲーション（5セクション） -->
  <section class="category-nav">
    <div class="category-nav__inner">
      <div class="category-nav__row category-nav__row--top">
        <div class="category-nav__item" data-cat="11">
          <span class="category-nav__text">就活情報・市場動向・総合ニュース</span>
        </div>
        <div class="category-nav__item" data-cat="4,10,8">
          <span class="category-nav__text">就活・フリーランス情報</span>
        </div>
        <div class="category-nav__item" data-cat="2,3">
          <span class="category-nav__text">スキルアップ情報</span>
        </div>
      </div>
      <div class="category-nav__divider"></div>
      <div class="category-nav__row category-nav__row--bottom">
        <div class="category-nav__item" data-cat="9">
          <span class="category-nav__text">お金の勉強・若者向け資産運用・NISA・iDeCo</span>
        </div>
        <div class="category-nav__item" data-cat="7">
          <span class="category-nav__text">人生設計・ワークライフ・地域活性情報</span>
        </div>
      </div>
    </div>
  </section>

  <!-- カテゴリ選択時の記事一覧セクション（デフォルト非表示） -->
  <section class="archive" id="archive-section" style="display: none;">
    <div class="archive__list">
      <?php
      // archive用の投稿を取得（ページネーション対応）
      $paged = get_query_var('paged') ? get_query_var('paged') : 1;
      $archive_args = array(
        'post_type' => 'post',
        'posts_per_page' => 7,
        'paged' => $paged,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
      );
      $archive_query = new WP_Query( $archive_args );
      ?>
      <?php if ( $archive_query->have_posts() ) : ?>
        <?php while ( $archive_query->have_posts() ) : $archive_query->the_post();
          $post_link = get_post_meta( get_the_ID(), 'redirect_url', true );
          if ( empty( $post_link ) ) { $post_link = get_permalink(); }
          $post_link = esc_url( $post_link );
        ?>
          <article class="archive__item">
            <div class="archive__item-content">
              <p class="archive__item-meta">
                <?php
                  $datetime = get_the_time('Y/m/d H:i');
                  echo esc_html($datetime);
                ?>
              </p>
              <div class="archive__item-title-wrapper">
                <h3 class="archive__item-title">
                  <a href="<?php echo $post_link; ?>"><?php the_title(); ?></a>
                </h3>
                <span class="archive__item-arrow">
                  <a href="<?php echo $post_link; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/arrorw.png" alt="矢印"></a>
                </span>
              </div>
            </div>
            <div class="archive__item-image">
              <a href="<?php echo $post_link; ?>">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail('medium', array('class' => 'archive__item-img')); ?>
                <?php else : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="archive__item-img">
                <?php endif; ?>
              </a>
            </div>
          </article>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>

    <!-- ページネーション -->
    <nav class="archive__pagination">
      <?php
      $total_pages = $archive_query->max_num_pages;
      if ( $total_pages > 1 ) :
        for ( $i = 1; $i <= min($total_pages, 5); $i++ ) :
      ?>
        <a href="<?php echo get_pagenum_link($i); ?>" class="archive__pagination-link <?php echo ($paged == $i) ? 'archive__pagination-link--active' : ''; ?>"><?php echo $i; ?></a>
      <?php
        endfor;
      endif;
      ?>
    </nav>
  </section>

  <!-- 記事一覧セクション1: 就活情報・市場動向・総合ニュース（PR TIMES / カテゴリID: 11） -->
  <section class="company">
    <h2 class="company__title">就活情報・市場動向・総合ニュース</h2>
    <?php
    // PR TIMES カテゴリの投稿を取得（カテゴリID: 11）・1回だけ取得して重複なく振り分け
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => -1,
      'post_status' => 'publish',
      'cat' => 11,
      'orderby' => 'date',
      'order' => 'DESC'
    );
    $the_query = new WP_Query( $args );
    $company_posts = $the_query->posts; // 0=最新、1,2,3... の順
    ?>
    <div class="company__layout">
      <!-- 左側カード（最新1件） -->
      <div class="company__column company__column--left">
        <div class="company__card-wrapper">
          <div class="company__bar company__bar--left"></div>
          <div class="company__card company__card--large">
          <?php if ( ! empty( $company_posts ) ) : ?>
            <?php
              $post = $company_posts[0];
              setup_postdata( $post );
              $post_link = get_post_meta( get_the_ID(), 'redirect_url', true );
              if ( empty( $post_link ) ) { $post_link = get_permalink(); }
              $post_link = esc_url( $post_link );
            ?>
            <h3 class="company__card-title">
              <a href="<?php echo $post_link; ?>"><?php the_title(); ?></a>
            </h3>
            <p class="company__card-meta">
              <?php
                $datetime = get_the_time('Y/m/d H:i');
                echo esc_html($datetime);
              ?>
            </p>
            <div class="company__card-image">
              <a href="<?php echo $post_link; ?>">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail('medium_large', array('class' => 'company__card-img')); ?>
                <?php else : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="company__card-img">
                <?php endif; ?>
              </a>
            </div>
            <?php if ( has_excerpt() ) : ?>
              <div class="company__card-excerpt"><?php the_excerpt(); ?></div>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
          </div>
        </div>
      </div>
      
      <!-- 右側エリア（中央列と右側列、ボタン） -->
      <div class="company__columns-right">
        <!-- 中央列と右側列を横に並べる -->
        <div class="company__columns-inner company__columns-scroll">
          <!-- 中央列（2番目、5番目、8番目…の記事を順に表示） -->
          <div class="company__column company__column--middle">
            <div class="company__cards">
              <?php
              for ( $i = 1; isset( $company_posts[ $i ] ); $i += 3 ) :
                $post = $company_posts[ $i ];
                setup_postdata( $post );
                $post_link = get_post_meta( get_the_ID(), 'redirect_url', true );
                if ( empty( $post_link ) ) { $post_link = get_permalink(); }
                $post_link = esc_url( $post_link );
              ?>
                <div class="company__card-wrapper">
                  <div class="company__bar company__bar--right"></div>
                  <div class="company__card company__card--small-col-2">
                    <div class="company__card-image">
                      <a href="<?php echo $post_link; ?>">
                        <?php if ( has_post_thumbnail() ) : ?>
                          <?php the_post_thumbnail('medium', array('class' => 'company__card-img')); ?>
                        <?php else : ?>
                          <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="company__card-img">
                        <?php endif; ?>
                      </a>
                    </div>
                    <h3 class="company__card-title">
                      <a href="<?php echo $post_link; ?>"><?php the_title(); ?></a>
                    </h3>
                    <p class="company__card-meta">
                      <?php
                        $datetime = get_the_time('Y/m/d H:i');
                        echo esc_html($datetime);
                      ?>
                    </p>
                  </div>
                </div>
              <?php
                wp_reset_postdata();
              endfor;
              ?>
            </div>
          </div>
          
          <!-- 右側列（3番目、6番目、9番目…の記事を順に表示） -->
          <div class="company__column company__column--right">
            <div class="company__cards">
              <?php
              for ( $i = 2; isset( $company_posts[ $i ] ); $i += 3 ) :
                $post = $company_posts[ $i ];
                setup_postdata( $post );
                $post_link = get_post_meta( get_the_ID(), 'redirect_url', true );
                if ( empty( $post_link ) ) { $post_link = get_permalink(); }
                $post_link = esc_url( $post_link );
              ?>
                <div class="company__card-wrapper">
                  <div class="company__bar company__bar--right"></div>
                  <div class="company__card company__card--small-col-3">
                    <div class="company__card-image">
                      <a href="<?php echo $post_link; ?>">
                        <?php if ( has_post_thumbnail() ) : ?>
                          <?php the_post_thumbnail('medium', array('class' => 'company__card-img')); ?>
                        <?php else : ?>
                          <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="company__card-img">
                        <?php endif; ?>
                      </a>
                    </div>
                    <h3 class="company__card-title">
                      <a href="<?php echo $post_link; ?>"><?php the_title(); ?></a>
                    </h3>
                    <p class="company__card-meta">
                      <?php
                        $datetime = get_the_time('Y/m/d H:i');
                        echo esc_html($datetime);
                      ?>
                    </p>
                  </div>
                </div>
              <?php
                wp_reset_postdata();
              endfor;
              ?>
            </div>
          </div>
        </div>
        
        <!-- VIEW ALL POSTS ボタン（中央列と右側列を跨ぐ） -->
        <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: get_home_url() . '/blog' ); ?>" class="company__button">VIEW ALL POSTS</a>
      </div>
    </div>
  </section>

  <!-- howtoセクション: 就活・フリーランス情報（月曜4/木曜10/土曜8） -->
  <section class="howto">
    <div class="howto__bg">
      <div class="howto__header">
        <div class="howto__header-left">
          <div class="howto__bar"></div>
          <h2 class="howto__title">就活・フリーランス情報</h2>
        </div>
        <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: get_home_url() . '/blog' ); ?>" class="howto__button">VIEW ALL POSTS</a>
      </div>
    </div>
    <div class="howto__cards">
      <?php
      // 就活/フリーランス(4)・エントリーシート/面接(10)・ビジネススキル/就活準備(8)
      $howto_args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'category__in' => array( 4, 10, 8 ),
        'orderby' => 'date',
        'order' => 'DESC'
      );
      $howto_query = new WP_Query( $howto_args );
      ?>
      <?php if ( $howto_query->have_posts() ) : ?>
        <?php while ( $howto_query->have_posts() ) : $howto_query->the_post();
          $post_link = get_post_meta( get_the_ID(), 'redirect_url', true );
          if ( empty( $post_link ) ) { $post_link = get_permalink(); }
          $post_link = esc_url( $post_link );
        ?>
          <div class="howto__card">
            <div class="howto__card-image">
              <a href="<?php echo $post_link; ?>">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail('medium_large', array('class' => 'howto__card-img')); ?>
                <?php else : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="howto__card-img">
                <?php endif; ?>
              </a>
              <div class="howto__card-meta">
                <h3 class="howto__card-title">
                  <a href="<?php echo $post_link; ?>"><?php the_title(); ?></a>
                </h3>
                <p class="howto__card-source">
                  <?php
                $datetime = get_the_time('Y/m/d H:i');
                echo esc_html($datetime);
                  ?>
                </p>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </section>

  <!-- skillupセクション: スキルアップ情報（火曜2/水曜3） -->
  <section class="skillup">
    <div class="skillup__header">
      <div class="skillup__bar"></div>
      <h2 class="skillup__title">スキルアップ情報</h2>
    </div>

    <div class="skillup__separator"></div>

    <?php
    // WEBデザイン等(2)・マーケティング/広告代理店(3)カテゴリの投稿を取得
    $skillup_args = array(
      'post_type' => 'post',
      'posts_per_page' => 9,
      'post_status' => 'publish',
      'category__in' => array( 2, 3 ),
      'orderby' => 'date',
      'order' => 'DESC'
    );
    $skillup_query = new WP_Query( $skillup_args );
    $skillup_count = 0;
    ?>

    <?php if ( $skillup_query->have_posts() ) : ?>
      <?php while ( $skillup_query->have_posts() ) : $skillup_query->the_post();
        $post_link = get_post_meta( get_the_ID(), 'redirect_url', true );
        if ( empty( $post_link ) ) { $post_link = get_permalink(); }
        $post_link = esc_url( $post_link );
        $skillup_count++;
      ?>
        <?php if ( $skillup_count === 1 ) : ?>
          <a href="<?php echo $post_link; ?>" class="skillup__card skillup__card--large">
            <div class="skillup__card-content">
              <h3 class="skillup__card-title"><?php the_title(); ?></h3>
              <p class="skillup__card-excerpt"><?php 
                $excerpt = get_the_excerpt();
                echo mb_strlen($excerpt) > 60 ? mb_substr($excerpt, 0, 60) . '…' : $excerpt;
              ?></p>
              <p class="skillup__card-meta">
                <?php
                  $datetime = get_the_time('Y/m/d H:i');
                  echo esc_html($datetime);
                ?>
              </p>
            </div>
            <div class="skillup__card-image">
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('medium', array('class' => 'skillup__card-img')); ?>
              <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="skillup__card-img">
              <?php endif; ?>
            </div>
          </a>

          <div class="skillup__separator"></div>

          <div class="skillup__cards">
        <?php else : ?>
          <div class="skillup__card-wrapper">
            <a href="<?php echo $post_link; ?>" class="skillup__card skillup__card--small">
              <div class="skillup__card-content">
                <h3 class="skillup__card-title"><?php the_title(); ?></h3>
                <p class="skillup__card-meta">
                  <?php
                $datetime = get_the_time('Y/m/d H:i');
                echo esc_html($datetime);
                  ?>
                </p>
              </div>
              <div class="skillup__card-image">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail('thumbnail', array('class' => 'skillup__card-img')); ?>
                <?php else : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="skillup__card-img">
                <?php endif; ?>
              </div>
            </a>
            <div class="skillup__card-line"></div>
          </div>
        <?php endif; ?>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
          </div>
    <?php endif; ?>

    <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: get_home_url() . '/blog' ); ?>" class="skillup__button">VIEW ALL POSTS</a>
  </section>

  <!-- moneyセクション: お金の勉強・若者向け資産運用・NISA・iDeCo（日曜 / カテゴリID: 9） -->
  <section class="money">
    <div class="money__bg">
      <div class="money__header">
        <div class="money__header-left">
          <div class="money__bar"></div>
          <h2 class="money__title">お金の勉強・若者向け資産運用・NISA・iDeCo</h2>
        </div>
        <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: get_home_url() . '/blog' ); ?>" class="money__button">VIEW ALL POSTS</a>
      </div>
    </div>
    <div class="money__cards">
      <?php
      // マネー/NISA/地域活性カテゴリの投稿を取得（カテゴリID: 9）
      $money_args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'cat' => 9,
        'orderby' => 'date',
        'order' => 'DESC'
      );
      $money_query = new WP_Query( $money_args );
      ?>
      <?php if ( $money_query->have_posts() ) : ?>
        <?php while ( $money_query->have_posts() ) : $money_query->the_post();
          $post_link = get_post_meta( get_the_ID(), 'redirect_url', true );
          if ( empty( $post_link ) ) { $post_link = get_permalink(); }
          $post_link = esc_url( $post_link );
        ?>
          <div class="money__card">
            <div class="money__card-image">
              <a href="<?php echo $post_link; ?>">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail('medium_large', array('class' => 'money__card-img')); ?>
                <?php else : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="money__card-img">
                <?php endif; ?>
              </a>
              <div class="money__card-meta">
                <h3 class="money__card-title">
                  <a href="<?php echo $post_link; ?>"><?php the_title(); ?></a>
                </h3>
                <p class="money__card-source">
                  <?php
                $datetime = get_the_time('Y/m/d H:i');
                echo esc_html($datetime);
                  ?>
                </p>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </section>

  <!-- laborセクション: 人生設計・ワークライフ・地域活性情報（金曜 / カテゴリID: 7） -->
  <section class="labor">
    <div class="labor__bg">
      <div class="labor__header">
        <div class="labor__header-left">
          <div class="labor__bar"></div>
          <h2 class="labor__title">人生設計・ワークライフ・地域活性情報</h2>
        </div>
        <div class="labor__nav">
          <button class="labor__nav-btn labor__nav-btn--prev" aria-label="前へ">
            <span class="labor__nav-arrow"></span>
          </button>
          <button class="labor__nav-btn labor__nav-btn--next" aria-label="次へ">
            <span class="labor__nav-arrow"></span>
          </button>
        </div>
      </div>

      <div class="labor__slider">
        <div class="labor__cards">
          <?php
          // キャリア/ワークライフ/地域活性カテゴリの投稿を取得（カテゴリID: 7）
          $labor_args = array(
            'post_type' => 'post',
            'posts_per_page' => 4,
            'post_status' => 'publish',
            'cat' => 7,
            'orderby' => 'date',
            'order' => 'DESC'
          );
          $labor_query = new WP_Query( $labor_args );
          ?>
          <?php if ( $labor_query->have_posts() ) : ?>
            <?php while ( $labor_query->have_posts() ) : $labor_query->the_post();
              $post_link = get_post_meta( get_the_ID(), 'redirect_url', true );
              if ( empty( $post_link ) ) { $post_link = get_permalink(); }
              $post_link = esc_url( $post_link );
            ?>
              <div class="labor__card">
                <div class="labor__card-image">
                  <a href="<?php echo $post_link; ?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                      <?php the_post_thumbnail('medium', array('class' => 'labor__card-img')); ?>
                    <?php else : ?>
                      <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="labor__card-img">
                    <?php endif; ?>
                  </a>
                </div>
                <h3 class="labor__card-title">
                  <a href="<?php echo $post_link; ?>"><?php the_title(); ?></a>
                </h3>
                <p class="labor__card-meta">
                  <?php
                $datetime = get_the_time('Y/m/d H:i');
                echo esc_html($datetime);
                  ?>
                </p>
              </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        </div>
      </div>

      <div class="labor__button-wrap">
        <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: get_home_url() . '/blog' ); ?>" class="labor__button">VIEW ALL POSTS</a>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
