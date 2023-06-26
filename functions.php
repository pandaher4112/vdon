<?php

/************* CSS & JS *************/
 	// サイト共通のJSの読み込み
function add_scripts() {
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.6.0.min.js', array( 'jquery' ), '20220901', true );
  wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '20220901', true );
  wp_enqueue_script( 'swiper','https://unpkg.com/swiper@7.4.1/swiper-bundle.min.js', array( 'jquery' ), '20220901', true );
  wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '20220901', true );
}
add_action('wp_print_scripts', 'add_scripts');

  // サイト共通のCSSの読み込み
function add_files() {
  wp_enqueue_style( 'reset', get_template_directory_uri() . '/css/reset.css', "", '20220901' );
  wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.css', "", '20220901' );
  wp_enqueue_style( 'swiper','https://unpkg.com/swiper@7.4.1/swiper-bundle.min.css', "", '20220901' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css', "", '20220901' );
}
add_action( 'wp_enqueue_scripts', 'add_files' );


/************* THUMBNAIL SIZE OPTIONS *************/
// アイキャッチ画像を有効にする。
add_theme_support('post-thumbnails');
// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'bones-thumb-600' => __('600px by 150px'),
        'bones-thumb-300' => __('300px by 100px'),
    ) );
}
/************* MENU *************/
register_nav_menus( array(
  'header' => 'Header Menu',
  'humbarger_header' => 'HumBarger Menu',
  'footer1'  => 'Footer Menu1',
  'footer2'  => 'Footer Menu2',
  'footer3'  => 'Footer Menu3'
) );
/************* REMOVE MENU ADMIN *************/
add_action( 'admin_menu', 'remove_menus' );

//メニューとして表示させたくない場合に以下に記述する
function remove_menus(){
    // remove_menu_page( 'index.php' ); //ダッシュボード
    // remove_menu_page( 'edit.php' ); //投稿メニュー
    //remove_menu_page( 'upload.php' ); //メディア
    //remove_menu_page( 'edit.php?post_type=page' ); //ページ追加
    //remove_menu_page( 'edit-comments.php' ); //コメントメニュー
    // remove_menu_page( 'themes.php' ); //外観メニュー
    // remove_menu_page( 'plugins.php' ); //プラグインメニュー
    //remove_menu_page( 'tools.php' ); //ツールメニュー
    // remove_menu_page( 'options-general.php' ); //設定メニュー
}
/************* POST SETTING *************/
function my_the_post() {
  global $previousday;
  $previousday = '';
}
add_action( 'the_post', 'my_the_post' );

function pageslug_class($classes = '') {
  if (is_page()) {
    $page = get_post(get_the_ID());
    $classes[] = $page->post_name;
    if ($page->post_parent) {  // ページが子ページであったときの処理
      $classes[] = get_page_uri($page->post_parent) . '-' . $page->post_name;
      // 「親ページのスラッグ-子ページのスラッグ」という表示に調整
    }
  }
  return $classes;
}
add_filter('body_class', 'pageslug_class');

//ショートコードを使ったphpファイルの呼び出し方法
function my_php_Include($params = array()) {
  extract(shortcode_atts(array('file' => 'default'), $params));
  ob_start();
  include(STYLESHEETPATH . "/$file.php");
  return ob_get_clean();
  }
  add_shortcode('myphp', 'my_php_Include'); 