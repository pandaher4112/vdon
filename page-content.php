<!-- 提案書内容ページ -->
<?php get_header(); ?>
<?php include('db.php'); ?>
<!-- 指定のデータベースの読み込み -->
<?php
    call_user_func('dbOpen');
    if(isset($_GET['id'])){ $id = $_GET['id'];}
    $sql="select * from proposetable where id={$id}" ;
    call_user_func('sqlRun',$sql);
    $Title = array_column($row,'Title');
    $RegisterID = array_column($row,'RegisterID');
    $RegisterName = array_column($row,'RegisterName');
    $RegisterSec = array_column($row,'RegisterSec');
    $date = array_column($row,'UpdateDate');
    $DlCount = array_column($row,'DlCount');
    if(isset($DlCount[0])){$Dlcount[0] = 0 ; }
    $Rank = array_column($row,'GoodRankSum');
    $ILs = array_column($row,'UseRankSum');
    $REs = array_column($row,'GoodRankSum');
    $docFileName = array_column($row,'DocFileName');
    $imgFileName = array_column($row,'ImgFileName');
    $db = null;
    if(isset($ILs[0])){$IL = $ILs[0];} else {$IL = 1;}
    if(isset($REs[0])){$RE = $REs[0];} else {$RE = 1;}

    //  パラメータの取得
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['ItemList'])){$IL = $_POST['ItemList'];} else{$IL = 1;}
        if(isset($_POST['review'])){$RE = $_POST['review'];} else{$RE = 1;}
        // データの登録
        call_user_func('dbOpen');
        $sql="update proposetable set UseRankSum = ".$IL.", GoodRankSum =".$RE." where id=".$id;
        call_user_func('sqlRun',$sql);
        $db = null;
    }
    // 星のカラー設定
    for($i=1;$i<=5;$i++){
        if($i<=$RE){ $color[$i] = '#f8c601';} else {$color[$i] = '#000';}
    }
    
?>
<!-- メイン画面 (2023/03/16)  -->
<main class="contentMain" id="content" >
    <div class="TBox">
        <p class="title"><?php the_title(); ?></p>
        <p class="Ttitle"><?php echo $Title[0] ; ?></p>
        <div class="btn">
            <a href="" onclick="history.back();return false;" class="Top-Link conBtn">LIstView</a>
            <a href="../" class="Top-Link conBtn">TOPMENU</a>
        </div>
        <!-- <?php the_content(); ?> -->
    </div>
    <div class="dsparea">
        <div class="dspTexts">
            <P class="dspTitle">提案書情報</P>
            <div class="dspBox">
                <div class="dspBoxFlex">
                    <p class="dspBoxLabel">提供者</p>
                    <span class="dspBoxLabel2"><?php echo "{$RegisterID[0]}　{$RegisterName[0]}" ; ?></span>
                </div>
                <div class="dspBoxFlex">
                    <p class="dspBoxLabel">作成日/更新日</p>
                    <span class="dspBoxLabel2"><?php echo $date[0] ; ?></span>
                </div>
                <div class="dspBoxFlex">
                    <p class="dspBoxLabel">DL数</p>
                    <span class="dspBoxLabel2"><?php echo $DlCount[0] ; ?>DL</span>
                </div>
                <div class="dspBoxFlex">
                    <p class="dspBoxLabel">資料評価点</p>
                    <span class="dspBoxLabel2"><?php echo $Rank[0] ; ?>点/10点</span>
                </div>
            </div>
            <p class="dspTitle">活用報告</p>
            <form action="../content/?id=<?php echo $id ?>" method="POST" name="report">
                <div class="dspBox">
                    <div class="dspBoxFlex">
                        <p class="dspBoxLabel">資料の有効性</p>
                        <select name="ItemList" class="ItemList">
                            <option value="1" <?= $IL == "1" ? 'selected' : '' ?>>1.興味なし</option>
                            <option value="2" <?= $IL == "2" ? 'selected' : '' ?>>2.あまり興味なし</option>
                            <option value="3" <?= $IL == "3" ? 'selected' : '' ?>>3.どちらでもない</option>
                            <option value="4" <?= $IL == "4" ? 'selected' : '' ?>>4.資料に価値あり</option>
                            <option value="5" <?= $IL == "5" ? 'selected' : '' ?>>5.商談を獲得</option>
                        </select>
                    </div>
                    <div class="dspBoxFlex">
                        <p class="dspBoxLabel">資料の評価</p>
                        <div class="dspBoxJudg">
                            <span  onmouseout="labelOut()" >
<?php 
    for($i=5;$i>0;$i--){
?>
                            <input id="review<?= $i ?>" type="radio" name="review" value="<?= $i ?>" <?= $RE == $i ? 'checked' : '' ?>>
                            <label onmouseenter ="vhover()"id="La<?= $i?>" for="review<?= $i ?>"  style="color:<?=$color[$i] ?>;" >★</label>
<?php } ?>
                            </span>
                        </div>
                    </div>
                    <input type="submit" class="dspBoxUp" value="評価登録">
                </div>
            </form>
            <p class="dspTitle">研修資料</p>
            <div class="dspBoxFlex">
                <p class="dspBoxLabel">研修資料</p>
                <span class="dspBoxLabel3">登録件数 2部</span>
                <a href="#" class="dspBoxDl">ＤＬ</a>
            </div>
        </div>
        <div class="dspImg">
            <img src="<?php echo get_template_directory_uri().$imgFile.$imgFileName[0]; ?>" alt="提案書画像" class="dspImgFile" id="dspImgFile">
            <div class="GetCont">提案書ＤＬ</div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
