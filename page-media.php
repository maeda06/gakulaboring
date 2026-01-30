<?php get_header(); ?>
<!-- DEBUG: page-media.php is loaded -->
<main>
  <!-- カテゴリナビゲーション -->
  <section class="category-nav">
    <div class="category-nav__inner">
      <div class="category-nav__row category-nav__row--top">
        <div class="category-nav__item" data-cat="4">
          <span class="category-nav__text">将来性・企業・業界動向・研究</span>
        </div>
        <div class="category-nav__item" data-cat="2">
          <span class="category-nav__text">就活準備・就活進め方・エントリーシート・選考対策</span>
        </div>
        <div class="category-nav__item" data-cat="3">
          <span class="category-nav__text">キャリア・自己分析</span>
        </div>
        <div class="category-nav__item" data-cat="10">
          <span class="category-nav__text">労働市場・待遇・福利厚生</span>
        </div>
      </div>
      <div class="category-nav__divider"></div>
      <div class="category-nav__row category-nav__row--bottom">
        <div class="category-nav__item" data-cat="7">
          <span class="category-nav__text">若者に人気の求人・募集情報</span>
        </div>
        <div class="category-nav__item" data-cat="8">
          <span class="category-nav__text">お金の勉強・保険・若者向けの資産運用(新NISA・iDeCo)</span>
        </div>
        <div class="category-nav__item" data-cat="9">
          <span class="category-nav__text">今後将来必要なスキルアップ</span>
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
        <?php while ( $archive_query->have_posts() ) : $archive_query->the_post(); ?>
          <article class="archive__item">
            <div class="archive__item-content">
              <p class="archive__item-meta">
                <?php
                  $source = function_exists('get_field') ? (get_field('source') ?: '毎日新聞') : '毎日新聞';
                  $date = get_the_date('m/d(D)');
                  $time_ago = human_time_diff( get_the_time('U'), current_time('timestamp') ) . '前';
                  echo esc_html($source . '　' . $date . '  ' . $time_ago);
                ?>
              </p>
              <div class="archive__item-title-wrapper">
                <h3 class="archive__item-title">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <span class="archive__item-arrow">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/arrorw.png" alt="矢印">
                </span>
              </div>
            </div>
            <div class="archive__item-image">
              <a href="<?php the_permalink(); ?>">
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
      <?php else : ?>
        <!-- ダミーデータ -->
        <?php for ( $i = 1; $i <= 7; $i++ ) : ?>
          <article class="archive__item">
            <div class="archive__item-content">
              <p class="archive__item-meta">毎日新聞　10/27(月)  10時間前</p>
              <div class="archive__item-title-wrapper">
                <h3 class="archive__item-title">
                  <a href="#">記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル</a>
                </h3>
                <span class="archive__item-arrow">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/arrorw.png" alt="矢印">
                </span>
              </div>
            </div>
            <div class="archive__item-image">
              <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="archive__item-img">
            </div>
          </article>
        <?php endfor; ?>
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
      else :
      ?>
        <!-- ダミーページネーション -->
        <span class="archive__pagination-link archive__pagination-link--active">1</span>
        <a href="#" class="archive__pagination-link">2</a>
        <a href="#" class="archive__pagination-link">3</a>
        <a href="#" class="archive__pagination-link">4</a>
        <a href="#" class="archive__pagination-link">5</a>
      <?php endif; ?>
    </nav>
  </section>

  <!-- 記事一覧セクション -->
  <section class="company">
    <h2 class="company__title">将来性・企業・業界動向・研究</h2>
    <?php
    // 企業・業界研究カテゴリの投稿を取得（カテゴリID: 4）
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => -1,
      'post_status' => 'publish',
      'cat' => 4,
      'orderby' => 'date',
      'order' => 'DESC'
    );
    $the_query = new WP_Query( $args );
    ?>
    <div class="company__layout">
      <!-- 左側カード -->
      <div class="company__column company__column--left">
        <div class="company__card-wrapper">
          <div class="company__bar company__bar--left"></div>
          <div class="company__card company__card--large">
          <?php if ( $the_query->have_posts() ) : ?>
            <?php $the_query->the_post(); ?>
            <h3 class="company__card-title">
              <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <p class="company__card-meta">
              <?php
                $source = function_exists('get_field') ? (get_field('source') ?: '毎日新聞') : '毎日新聞';
                $date = get_the_date('m/d(D)');
                $time_ago = human_time_diff( get_the_time('U'), current_time('timestamp') ) . '前';
                echo esc_html($source . '　' . $date . '  ' . $time_ago);
              ?>
            </p>
            <div class="company__card-image">
              <a href="<?php echo get_permalink(); ?>">
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
          <?php else : ?>
            <!-- ダミーデータ -->
            <h3 class="company__card-title">記事タイトル記事タイトル記事タイトル記事タイトル</h3>
            <p class="company__card-meta">毎日新聞　10/27(月)  10時間前</p>
            <div class="company__card-image">
              <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="company__card-img">
            </div>
          <?php endif; ?>
          </div>
        </div>
      </div>
      
      <!-- 右側エリア（中央列と右側列、ボタン） -->
      <div class="company__columns-right">
        <!-- 中央列と右側列を横に並べる -->
        <div class="company__columns-inner company__columns-scroll">
          <!-- 中央列 -->
          <div class="company__column company__column--middle">
            <div class="company__cards">
              <?php if ( $the_query->have_posts() ) : ?>
                <?php 
                $post_count = 0;
                while ( $the_query->have_posts() ) : $the_query->the_post(); 
                  $post_count++;
                  // 2列目（中央列）のカードのみ表示
                  if ($post_count % 3 == 2) :
                ?>
                  <div class="company__card-wrapper">
                    <div class="company__bar company__bar--right"></div>
                    <div class="company__card company__card--small-col-2">
                      <div class="company__card-image">
                        <a href="<?php echo get_permalink(); ?>">
                          <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail('medium', array('class' => 'company__card-img')); ?>
                          <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="company__card-img">
                          <?php endif; ?>
                        </a>
                      </div>
                      <h3 class="company__card-title">
                        <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                      </h3>
                      <p class="company__card-meta">
                        <?php
                          $source = function_exists('get_field') ? (get_field('source') ?: '毎日新聞') : '毎日新聞';
                          $date = get_the_date('m/d(D)');
                          $time_ago = human_time_diff( get_the_time('U'), current_time('timestamp') ) . '前';
                          echo esc_html($source . '　' . $date . '  ' . $time_ago);
                        ?>
                      </p>
                    </div>
                  </div>
                <?php 
                  endif;
                endwhile; 
                wp_reset_postdata();
                ?>
              <?php else : ?>
                <!-- ダミーデータ -->
                <?php for ( $i = 1; $i <= 6; $i++ ) : ?>
                  <?php if ($i % 3 == 2) : ?>
                  <div class="company__card-wrapper">
                    <div class="company__bar company__bar--right"></div>
                    <div class="company__card company__card--small-col-2">
                      <div class="company__card-image">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="company__card-img">
                      </div>
                      <h3 class="company__card-title">記事タイトル記事タイトル記事タイトル記事タイトル</h3>
                      <p class="company__card-meta">毎日新聞　10/27(月)  10時間前</p>
                    </div>
                  </div>
                  <?php endif; ?>
                <?php endfor; ?>
              <?php endif; ?>
            </div>
          </div>
          
          <!-- 右側列 -->
          <div class="company__column company__column--right">
            <div class="company__cards">
              <?php if ( $the_query->have_posts() ) : ?>
                <?php 
                $post_count = 0;
                while ( $the_query->have_posts() ) : $the_query->the_post(); 
                  $post_count++;
                  // 3列目（右側列）のカードのみ表示
                  if ($post_count % 3 == 0) :
                ?>
                  <div class="company__card-wrapper">
                    <div class="company__bar company__bar--right"></div>
                    <div class="company__card company__card--small-col-3">
                      <div class="company__card-image">
                        <a href="<?php echo get_permalink(); ?>">
                          <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail('medium', array('class' => 'company__card-img')); ?>
                          <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="company__card-img">
                          <?php endif; ?>
                        </a>
                      </div>
                      <h3 class="company__card-title">
                        <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                      </h3>
                      <p class="company__card-meta">
                        <?php
                          $source = function_exists('get_field') ? (get_field('source') ?: '毎日新聞') : '毎日新聞';
                          $date = get_the_date('m/d(D)');
                          $time_ago = human_time_diff( get_the_time('U'), current_time('timestamp') ) . '前';
                          echo esc_html($source . '　' . $date . '  ' . $time_ago);
                        ?>
                      </p>
                    </div>
                  </div>
                <?php 
                  endif;
                endwhile; 
                wp_reset_postdata();
                ?>
              <?php else : ?>
                <!-- ダミーデータ -->
                <?php for ( $i = 1; $i <= 6; $i++ ) : ?>
                  <?php if ($i % 3 == 0) : ?>
                  <div class="company__card-wrapper">
                    <div class="company__bar company__bar--right"></div>
                    <div class="company__card company__card--small-col-3">
                      <div class="company__card-image">
                      <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="company__card-img">
                      </div>
                      <h3 class="company__card-title">記事タイトル記事タイトル記事タイトル記事タイトル</h3>
                      <p class="company__card-meta">毎日新聞　10/27(月)  10時間前</p>
                    </div>
                  </div>
                  <?php endif; ?>
                <?php endfor; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
        
        <!-- VIEW ALL POSTS ボタン（中央列と右側列を跨ぐ） -->
        <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: get_home_url() . '/blog' ); ?>" class="company__button">VIEW ALL POSTS</a>
      </div>
    </div>
  </section>

  <!-- howtoセクション -->
  <section class="howto">
    <div class="howto__bg">
      <div class="howto__header">
        <div class="howto__header-left">
          <div class="howto__bar"></div>
          <h2 class="howto__title">就活準備・就活進め方・エントリーシート・選考対策</h2>
        </div>
        <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: get_home_url() . '/blog' ); ?>" class="howto__button">VIEW ALL POSTS</a>
      </div>
    </div>
    <div class="howto__cards">
      <?php
      // 就活の進め方・基本ガイドカテゴリの投稿を取得（カテゴリID: 2）
      $howto_args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'cat' => 2,
        'orderby' => 'date',
        'order' => 'DESC'
      );
      $howto_query = new WP_Query( $howto_args );
      ?>
      <?php if ( $howto_query->have_posts() ) : ?>
        <?php while ( $howto_query->have_posts() ) : $howto_query->the_post(); ?>
          <div class="howto__card">
            <div class="howto__card-image">
              <a href="<?php echo get_permalink(); ?>">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail('medium_large', array('class' => 'howto__card-img')); ?>
                <?php else : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="howto__card-img">
                <?php endif; ?>
              </a>
              <div class="howto__card-meta">
                <h3 class="howto__card-title">
                  <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <p class="howto__card-source">
                  <?php
                    $source = function_exists('get_field') ? (get_field('source') ?: '毎日新聞') : '毎日新聞';
                    $date = get_the_date('m/d(D)');
                    $time_ago = human_time_diff( get_the_time('U'), current_time('timestamp') ) . '前';
                    echo esc_html($source . '　' . $date . '  ' . $time_ago);
                  ?>
                </p>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else : ?>
        <!-- ダミーデータ -->
        <?php for ( $i = 1; $i <= 6; $i++ ) : ?>
          <div class="howto__card">
            <div class="howto__card-image">
              <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="howto__card-img">
              <div class="howto__card-meta">
                <h3 class="howto__card-title">記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル</h3>
                <p class="howto__card-source">毎日新聞　10/27(月)  10時間前</p>
              </div>
            </div>
          </div>
        <?php endfor; ?>
      <?php endif; ?>
    </div>
  </section>

  <!-- careerセクション（キャリア・自己分析） -->
  <section class="career">
    <div class="career__header">
      <div class="career__bar"></div>
      <h2 class="career__title">キャリア・自己分析</h2>
    </div>

    <div class="career__separator"></div>

    <?php
    // 自己分析・キャリア設計カテゴリの投稿を取得（カテゴリID: 3）
    $career_args = array(
      'post_type' => 'post',
      'posts_per_page' => 9,
      'post_status' => 'publish',
      'cat' => 3,
      'orderby' => 'date',
      'order' => 'DESC'
    );
    $career_query = new WP_Query( $career_args );
    $career_count = 0;
    ?>

    <?php if ( $career_query->have_posts() ) : ?>
      <?php while ( $career_query->have_posts() ) : $career_query->the_post(); $career_count++; ?>
        <?php if ( $career_count === 1 ) : ?>
          <!-- 最上部の大きいカード -->
          <a href="<?php the_permalink(); ?>" class="career__card career__card--large">
            <div class="career__card-content">
              <h3 class="career__card-title"><?php the_title(); ?></h3>
              <p class="career__card-excerpt"><?php 
                $excerpt = get_the_excerpt();
                echo mb_strlen($excerpt) > 200 ? mb_substr($excerpt, 0, 200) . '…' : $excerpt;
              ?></p>
              <p class="career__card-meta">
                <?php
                  $source = function_exists('get_field') ? (get_field('source') ?: '毎日新聞') : '毎日新聞';
                  $date = get_the_date('m/d(D)');
                  $time_ago = human_time_diff( get_the_time('U'), current_time('timestamp') ) . '前';
                  echo esc_html($source . '　' . $date . '  ' . $time_ago);
                ?>
              </p>
            </div>
            <div class="career__card-image">
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('medium', array('class' => 'career__card-img')); ?>
              <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="career__card-img">
              <?php endif; ?>
            </div>
          </a>

          <div class="career__separator"></div>

          <!-- 2列の小さいカード群開始 -->
          <div class="career__cards">
        <?php else : ?>
          <!-- 小さいカード -->
          <div class="career__card-wrapper">
            <a href="<?php the_permalink(); ?>" class="career__card career__card--small">
              <div class="career__card-content">
                <h3 class="career__card-title"><?php the_title(); ?></h3>
                <p class="career__card-meta">
                  <?php
                    $source = function_exists('get_field') ? (get_field('source') ?: '毎日新聞') : '毎日新聞';
                    $date = get_the_date('m/d(D)');
                    $time_ago = human_time_diff( get_the_time('U'), current_time('timestamp') ) . '前';
                    echo esc_html($source . '　' . $date . '  ' . $time_ago);
                  ?>
                </p>
              </div>
              <div class="career__card-image">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail('thumbnail', array('class' => 'career__card-img')); ?>
                <?php else : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="career__card-img">
                <?php endif; ?>
              </div>
            </a>
            <div class="career__card-line"></div>
          </div>
        <?php endif; ?>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
          </div><!-- .career__cards -->
    <?php else : ?>
      <!-- ダミーデータ -->
      <a href="#" class="career__card career__card--large">
        <div class="career__card-content">
          <h3 class="career__card-title">記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル</h3>
          <p class="career__card-excerpt">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト...</p>
          <p class="career__card-meta">毎日新聞　10/27(月)  10時間前</p>
        </div>
        <div class="career__card-image">
          <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="career__card-img">
        </div>
      </a>

      <div class="career__separator"></div>

      <div class="career__cards">
        <?php for ( $i = 1; $i <= 8; $i++ ) : ?>
          <div class="career__card-wrapper">
            <a href="#" class="career__card career__card--small">
              <div class="career__card-content">
                <h3 class="career__card-title">記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル</h3>
                <p class="career__card-meta">毎日新聞　10/27(月)  10時間前</p>
              </div>
              <div class="career__card-image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="career__card-img">
              </div>
            </a>
            <div class="career__card-line"></div>
          </div>
        <?php endfor; ?>
      </div>
    <?php endif; ?>

    <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: get_home_url() . '/blog' ); ?>" class="career__button">VIEW ALL POSTS</a>
  </section>

  <!-- laborセクション（労働市場・待遇・福利厚生） -->
  <section class="labor">
    <div class="labor__bg">
      <div class="labor__header">
        <div class="labor__header-left">
          <div class="labor__bar"></div>
          <h2 class="labor__title">労働市場・待遇・福利厚生</h2>
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
          // ニュース・特集カテゴリの投稿を取得（カテゴリID: 10）
          $labor_args = array(
            'post_type' => 'post',
            'posts_per_page' => 4,
            'post_status' => 'publish',
            'cat' => 10,
            'orderby' => 'date',
            'order' => 'DESC'
          );
          $labor_query = new WP_Query( $labor_args );
          ?>
          <?php if ( $labor_query->have_posts() ) : ?>
            <?php while ( $labor_query->have_posts() ) : $labor_query->the_post(); ?>
              <div class="labor__card">
                <div class="labor__card-image">
                  <a href="<?php the_permalink(); ?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                      <?php the_post_thumbnail('medium', array('class' => 'labor__card-img')); ?>
                    <?php else : ?>
                      <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="labor__card-img">
                    <?php endif; ?>
                  </a>
                </div>
                <h3 class="labor__card-title">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <p class="labor__card-meta">
                  <?php
                    $source = function_exists('get_field') ? (get_field('source') ?: '毎日新聞') : '毎日新聞';
                    $date = get_the_date('m/d(D)');
                    $time_ago = human_time_diff( get_the_time('U'), current_time('timestamp') ) . '前';
                    echo esc_html($source . '　' . $date . '  ' . $time_ago);
                  ?>
                </p>
              </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php else : ?>
            <!-- ダミーデータ -->
            <?php for ( $i = 1; $i <= 4; $i++ ) : ?>
              <div class="labor__card">
                <div class="labor__card-image">
                  <a href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="labor__card-img">
                  </a>
                </div>
                <h3 class="labor__card-title">
                  <a href="#">記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル</a>
                </h3>
                <p class="labor__card-meta">毎日新聞　10/27(月)  10時間前</p>
              </div>
            <?php endfor; ?>
          <?php endif; ?>
        </div>
      </div>

      <div class="labor__button-wrap">
        <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: get_home_url() . '/blog' ); ?>" class="labor__button">VIEW ALL POSTS</a>
      </div>
    </div>
  </section>

  <!-- recruitセクション（若者に人気の求人・募集情報） -->
  <section class="recruit">
    <h2 class="recruit__title">若者に人気の求人・募集情報</h2>
    <?php
    // 注目企業・求人情報カテゴリの投稿を取得（カテゴリID: 7）
    $recruit_args = array(
      'post_type' => 'post',
      'posts_per_page' => -1,
      'post_status' => 'publish',
      'cat' => 7,
      'orderby' => 'date',
      'order' => 'DESC'
    );
    $recruit_query = new WP_Query( $recruit_args );
    ?>
    <div class="recruit__layout">
      <!-- 左側カード -->
      <div class="recruit__column recruit__column--left">
        <div class="recruit__card-wrapper">
          <div class="recruit__bar recruit__bar--left"></div>
          <div class="recruit__card recruit__card--large">
          <?php if ( $recruit_query->have_posts() ) : ?>
            <?php $recruit_query->the_post(); ?>
            <h3 class="recruit__card-title">
              <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <p class="recruit__card-meta">
              <?php
                $source = function_exists('get_field') ? (get_field('source') ?: '毎日新聞') : '毎日新聞';
                $date = get_the_date('m/d(D)');
                $time_ago = human_time_diff( get_the_time('U'), current_time('timestamp') ) . '前';
                echo esc_html($source . '　' . $date . '  ' . $time_ago);
              ?>
            </p>
            <div class="recruit__card-image">
              <a href="<?php echo get_permalink(); ?>">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail('medium_large', array('class' => 'recruit__card-img')); ?>
                <?php else : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="recruit__card-img">
                <?php endif; ?>
              </a>
            </div>
          <?php else : ?>
            <h3 class="recruit__card-title">記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル</h3>
            <p class="recruit__card-meta">毎日新聞　10/27(月)  10時間前</p>
            <div class="recruit__card-image">
              <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="recruit__card-img">
            </div>
          <?php endif; ?>
          </div>
        </div>
      </div>
      
      <!-- 右側エリア -->
      <div class="recruit__columns-right">
        <div class="recruit__columns-inner recruit__columns-scroll">
          <!-- 中央列 -->
          <div class="recruit__column recruit__column--middle">
            <div class="recruit__cards">
              <?php if ( $recruit_query->have_posts() ) : ?>
                <?php 
                $recruit_count = 0;
                while ( $recruit_query->have_posts() ) : $recruit_query->the_post(); 
                  $recruit_count++;
                  // 記事数が少ない場合は順番に表示、多い場合は3で割った余りが2の記事を表示
                  if ($recruit_query->post_count <= 3 || $recruit_count % 3 == 2) :
                ?>
                  <div class="recruit__card-wrapper">
                    <div class="recruit__bar recruit__bar--right"></div>
                    <div class="recruit__card recruit__card--small-col-2">
                      <div class="recruit__card-image">
                        <a href="<?php echo get_permalink(); ?>">
                          <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail('medium', array('class' => 'recruit__card-img')); ?>
                          <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="recruit__card-img">
                          <?php endif; ?>
                        </a>
                      </div>
                      <h3 class="recruit__card-title">
                        <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                      </h3>
                      <p class="recruit__card-meta">
                        <?php
                          $source = function_exists('get_field') ? (get_field('source') ?: '毎日新聞') : '毎日新聞';
                          $date = get_the_date('m/d(D)');
                          $time_ago = human_time_diff( get_the_time('U'), current_time('timestamp') ) . '前';
                          echo esc_html($source . '　' . $date . '  ' . $time_ago);
                        ?>
                      </p>
                    </div>
                  </div>
                <?php 
                  endif;
                endwhile; 
                wp_reset_postdata();
                ?>
              <?php else : ?>
                <?php for ( $i = 1; $i <= 6; $i++ ) : ?>
                  <?php if ($i % 3 == 2) : ?>
                  <div class="recruit__card-wrapper">
                    <div class="recruit__bar recruit__bar--right"></div>
                    <div class="recruit__card recruit__card--small-col-2">
                      <div class="recruit__card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="recruit__card-img">
                      </div>
                      <h3 class="recruit__card-title">記事タイトル記事タイトル記事タイトル記事タイトル</h3>
                      <p class="recruit__card-meta">毎日新聞　10/27(月)  10時間前</p>
                    </div>
                  </div>
                  <?php endif; ?>
                <?php endfor; ?>
              <?php endif; ?>
            </div>
          </div>
          
          <!-- 右側列 -->
          <div class="recruit__column recruit__column--right">
            <div class="recruit__cards">
              <?php if ( $recruit_query->have_posts() ) : ?>
                <?php 
                $recruit_count = 0;
                while ( $recruit_query->have_posts() ) : $recruit_query->the_post(); 
                  $recruit_count++;
                  if ($recruit_count % 3 == 0) :
                ?>
                  <div class="recruit__card-wrapper">
                    <div class="recruit__bar recruit__bar--right"></div>
                    <div class="recruit__card recruit__card--small-col-3">
                      <div class="recruit__card-image">
                        <a href="<?php echo get_permalink(); ?>">
                          <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail('medium', array('class' => 'recruit__card-img')); ?>
                          <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="recruit__card-img">
                          <?php endif; ?>
                        </a>
                      </div>
                      <h3 class="recruit__card-title">
                        <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                      </h3>
                      <p class="recruit__card-meta">
                        <?php
                          $source = function_exists('get_field') ? (get_field('source') ?: '毎日新聞') : '毎日新聞';
                          $date = get_the_date('m/d(D)');
                          $time_ago = human_time_diff( get_the_time('U'), current_time('timestamp') ) . '前';
                          echo esc_html($source . '　' . $date . '  ' . $time_ago);
                        ?>
                      </p>
                    </div>
                  </div>
                <?php 
                  endif;
                endwhile; 
                wp_reset_postdata();
                ?>
              <?php else : ?>
                <?php for ( $i = 1; $i <= 6; $i++ ) : ?>
                  <?php if ($i % 3 == 0) : ?>
                  <div class="recruit__card-wrapper">
                    <div class="recruit__bar recruit__bar--right"></div>
                    <div class="recruit__card recruit__card--small-col-3">
                      <div class="recruit__card-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="recruit__card-img">
                      </div>
                      <h3 class="recruit__card-title">記事タイトル記事タイトル記事タイトル記事タイトル</h3>
                      <p class="recruit__card-meta">毎日新聞　10/27(月)  10時間前</p>
                    </div>
                  </div>
                  <?php endif; ?>
                <?php endfor; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
        
        <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: get_home_url() . '/blog' ); ?>" class="recruit__button">VIEW ALL POSTS</a>
      </div>
    </div>
  </section>

  <!-- moneyセクション（お金の勉強・保険・若者向けの資産運用） -->
  <section class="money">
    <div class="money__bg">
      <div class="money__header">
        <div class="money__header-left">
          <div class="money__bar"></div>
          <h2 class="money__title">お金の勉強・保険・若者向けの資産運用(新NISA・iDeCo)</h2>
        </div>
        <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: get_home_url() . '/blog' ); ?>" class="money__button">VIEW ALL POSTS</a>
      </div>
    </div>
    <div class="money__cards">
      <?php
      // ライフプラン・資産運用カテゴリの投稿を取得（カテゴリID: 8）
      $money_args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'cat' => 8,
        'orderby' => 'date',
        'order' => 'DESC'
      );
      $money_query = new WP_Query( $money_args );
      ?>
      <?php if ( $money_query->have_posts() ) : ?>
        <?php while ( $money_query->have_posts() ) : $money_query->the_post(); ?>
          <div class="money__card">
            <div class="money__card-image">
              <a href="<?php echo get_permalink(); ?>">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail('medium_large', array('class' => 'money__card-img')); ?>
                <?php else : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="money__card-img">
                <?php endif; ?>
              </a>
              <div class="money__card-meta">
                <h3 class="money__card-title">
                  <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <p class="money__card-source">
                  <?php
                    $source = function_exists('get_field') ? (get_field('source') ?: '毎日新聞') : '毎日新聞';
                    $date = get_the_date('m/d(D)');
                    $time_ago = human_time_diff( get_the_time('U'), current_time('timestamp') ) . '前';
                    echo esc_html($source . '　' . $date . '  ' . $time_ago);
                  ?>
                </p>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else : ?>
        <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
          <div class="money__card">
            <div class="money__card-image">
              <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="money__card-img">
              <div class="money__card-meta">
                <h3 class="money__card-title">記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル</h3>
                <p class="money__card-source">毎日新聞　10/27(月)  10時間前</p>
              </div>
            </div>
          </div>
        <?php endfor; ?>
      <?php endif; ?>
    </div>
  </section>

  <!-- skillupセクション（今後将来必要なスキルアップ） -->
  <section class="skillup">
    <div class="skillup__header">
      <div class="skillup__bar"></div>
      <h2 class="skillup__title">今後将来必要なスキルアップ</h2>
    </div>

    <div class="skillup__separator"></div>

    <?php
    // スキルアップ・資格カテゴリの投稿を取得（カテゴリID: 9）
    $skillup_args = array(
      'post_type' => 'post',
      'posts_per_page' => 9,
      'post_status' => 'publish',
      'cat' => 9,
      'orderby' => 'date',
      'order' => 'DESC'
    );
    $skillup_query = new WP_Query( $skillup_args );
    $skillup_count = 0;
    ?>

    <?php if ( $skillup_query->have_posts() ) : ?>
      <?php while ( $skillup_query->have_posts() ) : $skillup_query->the_post(); $skillup_count++; ?>
        <?php if ( $skillup_count === 1 ) : ?>
          <a href="<?php the_permalink(); ?>" class="skillup__card skillup__card--large">
            <div class="skillup__card-content">
              <h3 class="skillup__card-title"><?php the_title(); ?></h3>
              <p class="skillup__card-excerpt"><?php 
                $excerpt = get_the_excerpt();
                echo mb_strlen($excerpt) > 60 ? mb_substr($excerpt, 0, 60) . '…' : $excerpt;
              ?></p>
              <p class="skillup__card-meta">
                <?php
                  $source = function_exists('get_field') ? (get_field('source') ?: '毎日新聞') : '毎日新聞';
                  $date = get_the_date('m/d(D)');
                  $time_ago = human_time_diff( get_the_time('U'), current_time('timestamp') ) . '前';
                  echo esc_html($source . '　' . $date . '  ' . $time_ago);
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
            <a href="<?php the_permalink(); ?>" class="skillup__card skillup__card--small">
              <div class="skillup__card-content">
                <h3 class="skillup__card-title"><?php the_title(); ?></h3>
                <p class="skillup__card-meta">
                  <?php
                    $source = function_exists('get_field') ? (get_field('source') ?: '毎日新聞') : '毎日新聞';
                    $date = get_the_date('m/d(D)');
                    $time_ago = human_time_diff( get_the_time('U'), current_time('timestamp') ) . '前';
                    echo esc_html($source . '　' . $date . '  ' . $time_ago);
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
    <?php else : ?>
      <a href="#" class="skillup__card skillup__card--large">
        <div class="skillup__card-content">
          <h3 class="skillup__card-title">記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル</h3>
          <p class="skillup__card-excerpt">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト...</p>
          <p class="skillup__card-meta">毎日新聞　10/27(月)  10時間前</p>
        </div>
        <div class="skillup__card-image">
          <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="skillup__card-img">
        </div>
      </a>

      <div class="skillup__separator"></div>

      <div class="skillup__cards">
        <?php for ( $i = 1; $i <= 8; $i++ ) : ?>
          <div class="skillup__card-wrapper">
            <a href="#" class="skillup__card skillup__card--small">
              <div class="skillup__card-content">
                <h3 class="skillup__card-title">記事タイトル記事タイトル記事タイトル記事タイトル記事タイトル</h3>
                <p class="skillup__card-meta">毎日新聞　10/27(月)  10時間前</p>
              </div>
              <div class="skillup__card-image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/no_image.jpg" alt="記事画像" class="skillup__card-img">
              </div>
            </a>
            <div class="skillup__card-line"></div>
          </div>
        <?php endfor; ?>
      </div>
    <?php endif; ?>

    <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: get_home_url() . '/blog' ); ?>" class="skillup__button">VIEW ALL POSTS</a>
  </section>

  <!-- ダミーセクション -->
  <section class="dummy-section"></section>
</main>
<?php get_footer(); ?>
