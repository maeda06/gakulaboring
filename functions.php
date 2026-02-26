<?php

add_theme_support('post-thumbnails');

/*----------------------------------------------------------*/
/* 管理バーを非表示にする */
/*----------------------------------------------------------*/
add_filter('show_admin_bar', '__return_false');

/*----------------------------------------------------------*/
/* 投稿の抜粋文の文字数制限 */
/*----------------------------------------------------------*/
add_filter( 'excerpt_length', function( $length ){
  return 50;
}, 999 );

// 省略記号を「…」に変更する
add_filter( 'excerpt_more', function( $more ){
  return '…';
}, 999 );

/*----------------------------------------------------------*/
/* テンプレートファイルごとにcssを出しわける */
/*----------------------------------------------------------*/
function my_styles() {
    if ( is_front_page() ) {
      wp_enqueue_style( 'front-page', get_template_directory_uri() . '/css/front-page.css', array() );
    }elseif( is_single() ){
      wp_enqueue_style( 'single', get_template_directory_uri() . '/css/single.css', array() );
    }elseif( is_page('portfolio') ) {
      wp_enqueue_style( 'portfolio', get_template_directory_uri() . '/css/page-portfolio.css', array() );
    }elseif( is_page('review') ) {
      wp_enqueue_style( 'review', get_template_directory_uri() . '/css/page-review.css', array() );
    }elseif( is_page('chat') ) {
      wp_enqueue_style( 'chat', get_template_directory_uri() . '/css/page-chat.css', array() );
    }elseif( is_page('skillup') ) {
      wp_enqueue_style( 'skillup', get_template_directory_uri() . '/css/page-skillup.css', array() );
    }elseif( is_page('media') ) {
      wp_enqueue_style( 'page-media', get_template_directory_uri() . '/css/page-media.css', array() );
    }elseif( is_page('contact-company') ) {
      wp_enqueue_style( 'contact-company', get_template_directory_uri() . '/css/contact-company.css', array() );
    }elseif( is_page('contact-worker') ) {
      wp_enqueue_style( 'contact-worker', get_template_directory_uri() . '/css/contact-worker.css', array() );
    }
}
add_action( 'wp_enqueue_scripts', 'my_styles' );

/*----------------------------------------------------------*/
/* カスタムメニュー */
/*----------------------------------------------------------*/
register_nav_menus(array(
  'global'    => 'グローバルナビゲーション',
  'footer'    => 'フッターナビゲーション',
));

/*----------------------------------------------------------*/
/* カテゴリナビ用AJAX処理 */
/*----------------------------------------------------------*/
function load_category_posts() {
  $cat_id_raw = isset($_POST['cat_id']) ? sanitize_text_field($_POST['cat_id']) : '';
  $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
  
  // 単一ID または カンマ区切り複数ID に対応
  $cat_ids = array_filter(array_map('intval', explode(',', $cat_id_raw)));
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 7,
    'paged' => $paged,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC'
  );
  if (count($cat_ids) === 1) {
    $args['cat'] = $cat_ids[0];
  } elseif (count($cat_ids) > 1) {
    $args['category__in'] = $cat_ids;
  }
  
  $query = new WP_Query($args);
  $html = '';
  
  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $post_link = get_post_meta(get_the_ID(), 'redirect_url', true);
      if (empty($post_link)) {
        $post_link = get_permalink();
      }
      $post_link = esc_url($post_link);
      $datetime = get_the_time('Y/m/d H:i');
      $thumbnail = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : get_template_directory_uri() . '/images/no_image.jpg';
      
      $html .= '<article class="archive__item">';
      $html .= '<div class="archive__item-content">';
      $html .= '<p class="archive__item-meta">' . esc_html($datetime) . '</p>';
      $html .= '<div class="archive__item-title-wrapper">';
      $html .= '<h3 class="archive__item-title"><a href="' . $post_link . '">' . get_the_title() . '</a></h3>';
      $html .= '<span class="archive__item-arrow"><a href="' . $post_link . '"><img src="' . get_template_directory_uri() . '/images/arrorw.png" alt="矢印"></a></span>';
      $html .= '</div></div>';
      $html .= '<div class="archive__item-image"><a href="' . $post_link . '">';
      $html .= '<img src="' . esc_url($thumbnail) . '" alt="記事画像" class="archive__item-img">';
      $html .= '</a></div></article>';
    }
    wp_reset_postdata();
  } else {
    $html = '<p class="archive__no-posts">この カテゴリの記事はまだありません。</p>';
  }
  
  // ページネーション
  $pagination = '';
  $total_pages = $query->max_num_pages;
  if ($total_pages > 1) {
    for ($i = 1; $i <= min($total_pages, 5); $i++) {
      $active_class = ($paged == $i) ? ' archive__pagination-link--active' : '';
      $pagination .= '<a href="#" class="archive__pagination-link' . $active_class . '" data-page="' . $i . '">' . $i . '</a>';
    }
  }
  
  wp_send_json_success(array(
    'html' => $html,
    'pagination' => $pagination,
    'total_pages' => $total_pages
  ));
}
add_action('wp_ajax_load_category_posts', 'load_category_posts');
add_action('wp_ajax_nopriv_load_category_posts', 'load_category_posts');

/*----------------------------------------------------------*/
/* AJAXのURL・nonce をフロントに渡す */
/*----------------------------------------------------------*/
function enqueue_ajax_scripts() {
  if (is_page('media')) {
    wp_localize_script('jquery', 'ajax_object', array(
      'ajax_url' => admin_url('admin-ajax.php'),
      'nonce' => wp_create_nonce('category_nav_nonce')
    ));
  }
}
add_action('wp_enqueue_scripts', 'enqueue_ajax_scripts');

// mediaページで ajax_object を wp_footer の先頭で出力（main.js より前に読み込むため）
function output_ajax_object_for_media() {
  if (is_page('media')) {
    echo '<script>var ajax_object = ' . wp_json_encode(array(
      'ajax_url' => admin_url('admin-ajax.php'),
      'nonce' => wp_create_nonce('category_nav_nonce')
    )) . ';</script>' . "\n";
  }
}
add_action('wp_footer', 'output_ajax_object_for_media', 5);

/*----------------------------------------------------------*/
/* 就活情報セクション用: PR TIMES（cat 11）＋ METI Journal RSS をマージして日付順で返す */
/*----------------------------------------------------------*/
function get_company_section_items() {
  $items = array();

  // 1. PR TIMES カテゴリ（ID: 11）の投稿
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 50,
    'post_status' => 'publish',
    'cat' => 11,
    'orderby' => 'date',
    'order' => 'DESC'
  );
  $query = new WP_Query($args);
  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $img_url = null;
      if (has_post_thumbnail()) {
        $img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
      }
      $items[] = (object) array(
        'title' => get_the_title(),
        'link' => esc_url(get_post_meta(get_the_ID(), 'redirect_url', true) ?: get_permalink()),
        'date' => get_the_time('Y/m/d H:i'),
        'image_url' => $img_url,
        'excerpt' => get_the_excerpt()
      );
    }
    wp_reset_postdata();
  }

  // 2. METI Journal ONLINE（経済産業省）RSS
  if (!function_exists('fetch_feed')) {
    require_once ABSPATH . WPINC . '/feed.php';
  }
  $feed = fetch_feed('https://journal.meti.go.jp/feed/');
  if (!is_wp_error($feed)) {
    $max = $feed->get_item_quantity(20);
    $feed_items = $feed->get_items(0, $max);
    foreach ($feed_items as $item) {
      $items[] = (object) array(
        'title' => $item->get_title(),
        'link' => esc_url($item->get_permalink()),
        'date' => $item->get_date('Y/m/d H:i'),
        'image_url' => null,
        'excerpt' => ''
      );
    }
  }

  // 日付でソート（新しい順）
  usort($items, function ($a, $b) {
    return strtotime($b->date) - strtotime($a->date);
  });

  return array_slice($items, 0, 50);
}


add_action( 'init', function() {
    register_post_meta( '', 'redirect_url', array(
      'show_in_rest'  => true,
      'single'        => true,
      'type'          => 'string',
      'auth_callback' => function() {
        return current_user_can( 'edit_posts' );
      }
    ) );
  } );