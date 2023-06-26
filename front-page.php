
<?php get_header(); ?>
<!-- データベースに関する定義 -->
<?php
// db定義ファイルの読み込み
include('db.php');

// 追加するデータの初期設定
$title = '提案書のタイトル';
$mainKey = 'メインキー';
$subKey = 'サブキー';

$traMainID = 1; // 研修資料のメインID
$traSubID = 2; // 研修資料のSubID
$registerID = 3; // 提案書登録者(社員番号)
$registerDate = '2023-02-20'; // 提案書初回登録日
$goodRankSum = 0; // 良いねランクの合計
$useRankSum = 0; // 活用ランクの合計
$folder = '提案書格納場所';
$fileName = '提案書ファイル名';

call_user_func('dbOpen');
// 人気順の提案書を抽出
$sql = 'select * from proposetable order by UseRankSum desc';
call_user_func('sqlRun',$sql);
$id = array_column($row,'ID');
$title=array_column($row,'Title');
$date=array_column($row,'UpdateDate');
$docFileName =array_column($row,'DocFileName');
$imgFileName =array_column($row,'ImgFileName');
// 最新順に提案書を抽出
$sql = 'select * from proposetable order by UpdateDate desc';
call_user_func('sqlRun',$sql);
$id2 = array_column($row,'ID');
$title2=array_column($row,'Title');
$date2=array_column($row,'UpdateDate');
$docFileName2 =array_column($row,'DocFileName');
$imgFileName2 =array_column($row,'ImgFileName');
$db = null;
?>
<!-- メインビュー -->
        <main id="main" class="main">
            <section class="topMenu" id="TopMenu">
                <div class="topMenuCard">
                    <h1 class="topMenuListTitle"> 推奨の提案書</h1>
                    <ul class="topMenuList">
<?php
    for($i=0;$i<3;$i++){
        if($imgFileName[$i] == $title[$i]){$imgFileName[$i]="blunk_m.jpg";}
?>
                      <li>
                          <a href="<?php echo esc_url( home_url( '/' ) );?>content?id=<?php echo $id[$i] ?>" class="listFlex">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/F<?php echo $i+1 ?>.png" alt="人気番号" class="ListImgNo" id="BestListImgNo">
                                <img src="<?php echo get_template_directory_uri().$imgFile.$imgFileName[$i]; ?>" alt="提案書画像" class="ListImgCnt" id="BestListImgCnt">
                                <p class="ListTitle"><?php echo $title[$i] ?></p>                                                        
                                <p class="ListDate"><?php echo $date[$i] ?> 追加</p>
                            </a>
                    </li>
<?php  } ?>
                    </ul>
                </div>
                <div class="topMenuCard">
                    <h1 class="topMenuListTitle"> 最新の提案書</h1>
                    <ul class="topMenuList">
<?php 
    for($i=0;$i<3;$i++){
        if(isset($imgFileName2[$i])){}else{$imgFileName2[$i]="blunk_m.jpg";}
?>
                        <li>
                            <a href="<?php echo esc_url( home_url( '/' ) );?>content/?id=<?php echo $id2[$i] ; ?>" class="listFlex">
                                <img src="<?php echo get_template_directory_uri().$imgFile.$imgFileName2[$i]; ?>" alt="提案書画像" class="ListImgCnt" id="NewListImgCnt">
                                <p class="ListTitle"><?php echo $title2[$i] ?></p>                                                        
                                <p class="ListDate"><?php echo $date2[$i] ?>追加</p>
                            </a>
                        </li>
<?php } ?>
                    </ul>
                </div>
            </section>
        </main>
        <?php get_footer(); ?>
