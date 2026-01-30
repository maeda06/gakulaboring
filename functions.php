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
/* カテゴリナビ用AJAX処理 */
/*----------------------------------------------------------*/
function load_category_posts() {
  $cat_id = isset($_POST['cat_id']) ? intval($_POST['cat_id']) : 0;
  $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
  
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 7,
    'paged' => $paged,
    'post_status' => 'publish',
    'cat' => $cat_id,
    'orderby' => 'date',
    'order' => 'DESC'
  );
  
  $query = new WP_Query($args);
  $html = '';
  
  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $source = function_exists('get_field') ? (get_field('source') ?: '毎日新聞') : '毎日新聞';
      $date = get_the_date('m/d(D)');
      $time_ago = human_time_diff(get_the_time('U'), current_time('timestamp')) . '前';
      $thumbnail = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : get_template_directory_uri() . '/images/no_image.jpg';
      
      $html .= '<article class="archive__item">';
      $html .= '<div class="archive__item-content">';
      $html .= '<p class="archive__item-meta">' . esc_html($source . '　' . $date . '  ' . $time_ago) . '</p>';
      $html .= '<div class="archive__item-title-wrapper">';
      $html .= '<h3 class="archive__item-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
      $html .= '<span class="archive__item-arrow"><img src="' . get_template_directory_uri() . '/images/arrorw.png" alt="矢印"></span>';
      $html .= '</div></div>';
      $html .= '<div class="archive__item-image"><a href="' . get_permalink() . '">';
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