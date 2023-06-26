<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); wp_title('|',true, 'left'); ?></title>
    <meta name="description" content="提案書管理システム">
    <?php wp_head(); ?>
    <!--google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital@1&family=Noto+Sans+JP:wght@700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/vnd.microsoft.icon">
    <!--css-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    <!--js-->
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.6.0.min.js" defer></script> <!--deferをつけるとHTML読んだあとにjavaを読み込みする-->
    <script src="<?php echo get_template_directory_uri(); ?>/js/script.js" defer></script>
    <!--swiper.js-->
    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper@7.4.1/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper@7.4.1/swiper-bundle.min.js" defer></script> -->
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/webpage">
    <!--header-->
    <div class="container<?php
         if (is_page("searchpage")){
            echo " searchPage";
         } elseif (is_page("favorit")){
           echo " favoritPage";
         } elseif (is_page(array("manage","managecont"))){
            echo " managePage";
         } elseif (is_page("managetag")){
            echo " manageTag";
         }
      ?>" 
     >
        <!-- ヘッダー部分 -->
    <header id="header" class="header">
        <div  class="bl-header">
            <div class="bl-headerMenu">
                <div class="bl-headerLogo">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/VdonLogo.png" alt="提案書">
                        <h1 class="bl-headerTitle">MAG提案書管理システム</h1>
                </div>
                <nav class="bl-header_Nav">
                    <?php
                        $args = array(
                            'menu'              => 'header',
                            'menu_class'        => 'bl-headerNav', //メニューを構成するul要素につけるCSSクラス名
                            'container'         => 'nav', //ulを囲う要素を指定、 div or nav なしの場合にはfalse
                            'depth'             => 1,  //何階層まで表示するか、0は全階層、1は現メニューまで、2は子メニューまで
                            'theme_location'    => 'header', //メニューの位置を指定
                        );
                        wp_nav_menu($args);
                    ?>
                </nav>
            </div>
            <div class="bl-humbergarMenu">
                <div class="openbtn4"><span></span><span></span><span></span> </div>
            </div>
        </div>

        <!-- <div class="bl-humbergarMenuNav">
            <?php
                    $args = array(
                        'menu'              => '',
                        'menu_class'        => 'bl-humbergarMenuNavLists', //メニューを構成するul要素につけるCSSクラス名
                        'container'         => 'div', //ulを囲う要素を指定、 div or nav なしの場合にはfalse
                        'depth'             => 1,  //何階層まで表示するか、0は全階層、1は現メニューまで、2は子メニューまで
                        'theme_location'    => 'humbarger_header', //メニューの位置を指定(function.phpにてメニューを作る)
                    );
                    wp_nav_menu($args);
            ?>
        </div> -->
    </header>
