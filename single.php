<!-- 閲覧投稿サイトを定義 -->
<!-- 製作物の紹介を定義 -->
<?php get_header(); ?>
    <main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
        <div>
            <!-- 投稿した日を取得 -->
            <span class="date"><?php the_time(get_option('date_format'));?></span>
            <!-- 投稿した内容を取得 -->
            <h2>
                <?php
                    if(mb_strlen($post->post_title)>30) {
                    $title= mb_substr($post->post_title,0,30) ;
                        // 30文字以上の場合...で表す
                        echo $title . '...';
                    } else {
                        echo $post->post_title;
                    }
                ?>
            </h2>
            <hr>
            <div class="single-content">
                <?php echo the_content()?>
            </div>
        </div>
    </main>
<?php get_footer(); ?>
