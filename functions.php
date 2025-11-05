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