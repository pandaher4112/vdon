<!-- 検索ページ -->
<?php get_header(); ?>
<?php include('db.php'); ?>
<!-- 指定のデータベースの読み込み -->
<?php
    call_user_func('dbOpen');
    $sql="select * from proposetable where GoodRankSum > 0 order by GoodRankSum DESC" ;
    call_user_func('sqlRun',$sql);
    $ID = array_column($row,'ID');
    $Title = array_column($row,'Title');
    $RegisterID = array_column($row,'RegisterID');
    $RegisterName = array_column($row,'RegisterName');
    $RegisterSec = array_column($row,'RegisterSec');
    $date = array_column($row,'UpdateDate');
    $DlCount = array_column($row,'DlCount');
    if(isset($DlCount[0])){$Dlcount[0] = 0 ; }
    $Rank = array_column($row,'GoodRankSum');
    $db = null;
?>

<!-- メイン画面 (2023/03/16)  -->
<main class="favoritMain" id="favorit" >
    <div class="TBox">
        <p class="title"><?php the_title(); ?></p>
        <a href="../" class="Top-Link">TOPMENU</a>
        <!-- <?php the_content(); ?> -->
    </div>
    <div class="dsparea">
        <div class="scroll-box">
            <ul class="result-lists">
<?php
        if( count($ID) == 0 ){
            echo "<li><p>該当する提案資料は現在存在しません</p></li>";
        }
        for($i=0;$i<count($ID);$i++ ){
?>
               <li class="result-list">
                    <p class="List-icon">WEB</P>
                    <p class="List-caption"><?php echo $Title[$i] ;?></p>
                    <div>
                        <a href="<?php echo esc_url( home_url( '/' ) );?>content/?id=<?php echo $ID[$i] ;?>" class="List-view" id="view">VIEW</a>
                        <div class="List-dl" id="dl">DL</div>
                    </div>
                    <div class="List-line"></div>
                </li>
<?php } ?>

            </ul>
        </div>
    </div>
</main>
<?php get_footer(); ?>
