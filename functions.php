<?php

add_theme_support('post-thumbnails');

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
    }elseif( is_page('contact-company') ) {
      wp_enqueue_style( 'contact-company', get_template_directory_uri() . '/css/contact-company.css', array() );
    }elseif( is_page('contact-worker') ) {
      wp_enqueue_style( 'contact-worker', get_template_directory_uri() . '/css/contact-worker.css', array() );
    }
}
add_action( 'wp_enqueue_scripts', 'my_styles' );