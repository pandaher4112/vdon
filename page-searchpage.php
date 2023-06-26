<!-- 検索ページ -->
<?php get_header(); ?>
<?php include('db.php'); ?>

<!-- 検索用のdb読出 -->
<?php
    //  パラメータの取得
    $Key="";
    $vKey="";
    $sortNo=0;
    $cId=0;
    $Order="";
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['Key'])){$Key = $_POST['Key'];} else{$Key = "";}
        if(isset($_POST['vKey'])){$vKey = $_POST['vKey'];} else{$vKey = "";}
        if(isset($_POST['sortno'])){$sortNo = $_POST['sortno'];} else{$sortNo = 0;}
        // データの検索
        switch($sortNo){
            case 1: 
                $Order = " order by GoodRankSum desc" ;
                break ;
            case 2:
                $Order = " order by UseRankSum desc" ;
                break ;
            case 3:
                $Order = " order by UpdateDate desc" ;
                break ;
        }
        if($Key != ""){
            call_user_func('dbOpen');
            $sql="select * from proposetable where MainKey like '%{$Key}%' or SubKey like '%{$Key}%'".$Order;
            echo $sql;
            call_user_func('sqlRun',$sql);

            $id = array_column($row,'ID');
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
            $cId=count($id);
        }
    }

?>

<!-- メイン画面 (2023/03/16)  -->
<main class="contsearch" id="contsearch" >
    <div class="TBox">
        <p class="title"><?php the_title(); ?></p>
        <a href="../" class="Top-Link">TOPMENU</a>
        <!-- <?php the_content(); ?> -->
    </div>
    <form action="<?php echo esc_url( home_url( '/' ) );?>searchpage/" method="POST" name="searchform" id="searchform">
    <div class="keyform">
        <div class="keyword">
            <div class="inp">
                <p class="label">キーワード検索</p>
                <div class="keycont">
                    <input type="text" class="key" name="Key" value="<?=$Key?>"><br>
                </div>
            </div>
            <div class="inp">
                <p class="label">会話検索(OP)</p>
                <div class="keycont">
                    <input type="text" class="key" value="" name="vKey" disabled><br>
                    <p>※Amivoiceを利用した音声入力</p>
                </div>
            </div>
        </div>
        <input type="submit" class="run" value="検索">
    </div>
    <div class="dsparea">
        <div class="list">
            <p class="result">検索結果一覧</p>
            <div class="list-cat">
                <p>並べ替え順</p>
                <div class="list-selects">
                    <select onchange="searchSel()" id="SearchsortSel" name="sortno" class="sortno" >
                        <option value="1" <?= $sortNo==1? ' selected':'' ?>> 人気順 </option>
                        <option value="2" <?= $sortNo==2? ' selected':'' ?>> 商談順 </option>
                        <option value="3" <?= $sortNo==3? ' selected':'' ?>> 更新順 </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="scroll-box">
            <ul class="result-lists">
<?php
    if($cId>0){
        for($i=0;$i<$cId;$i++){
?>
                <li class="result-list">
                    <p class="List-icon">WEB</P>
                    <p class="List-caption"><?=$Title[$i]?></p>
                    <div>
                        <a href="<?php echo esc_url( home_url( '/' ) );?>content/?id=<?=$id[$i]?>" class="List-view" id="view">VIEW</a>
                        <div class="List-dl" id="dl">DL</div>
                    </div>
                    <div class="List-line"></div>
                </li>
  <?php }}
  else{ ?>
                <li class="result-list">
                    <p class="List-caption">検索データはありません</p>
                </li>
<?php } ?>
            </ul>
        </div>
    </div>
    </form>
</main>
<?php get_footer(); ?>
