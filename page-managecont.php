<!-- 管理ページ -->
<?php get_header(); ?>
<?php include('db.php'); ?>
<?php
    // 既存データの確認
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        call_user_func('dbOpen');
        if($id == "new"){
            echo "id=".$id;
            $Title[0]="";
            $Sno[0]="";
            $Sname[0]="";
            $Mainkey[0]="";
            $Subkey[0]="";
        }else{
            $sql="select * from proposetable where id={$id}" ;
            call_user_func('sqlRun',$sql);
            $Title = array_column($row,'Title');
            $Sno = array_column($row,'RegisterID');
            $Sname = array_column($row,'RegisterName');
            $Mainkey = array_column($row,'MainKey');
            $Subkey = array_column($row,'SubKey');
            // $RegisterSec = array_column($row,'RegisterSec');
            // $date = array_column($row,'UpdateDate');
            // $DlCount = array_column($row,'DlCount');
            // if(isset($DlCount[0])){$Dlcount[0] = 0 ; }
            // $Rank = array_column($row,'GoodRankSum');
            // $ILs = array_column($row,'UseRankSum');
            // $REs = array_column($row,'GoodRankSum');
            $docFileName = array_column($row,'DocFileName');
            $imgFileName = array_column($row,'ImgFileName');
            $db = null;
            if(isset($ILs[0])){$IL = $ILs[0];} else {$IL = 1;}
            if(isset($REs[0])){$RE = $REs[0];} else {$RE = 1;}
        }
    }
    // 処理ボタンの確認
    $btnN="";
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['btnID'])){$btnN = $_POST['btnID'];} else{$btnN = "";}
        if(isset($_POST['sno'])){$Sno[0] = $_POST['sno'];} else{$Sno[0] = "";}
        if(isset($_POST['sname'])){$Sname[0] = $_POST['sname'];} else{$Sname[0] = "";}
        if(isset($_POST['title'])){$Title[0] = $_POST['title'];} else{$Title[0] = "";}
    }

    // ファイルのアップロードおよび新規登録処理
    if($btnN === "保存"){
       // アップロードされたファイルを保存するディレクトリ
       // $targetDir = $_SERVER['DOCUMENT_ROOT']."/wp-content/themes/vdon/datum/doc/"; //local用
       $targetDir = $_SERVER['DOCUMENT_ROOT']."/vdon/wp-content/themes/vdon/datum/doc/"; //サーバー用
        // $targetDir = get_theme_file_uri()."/datum/doc/"; 
        echo $targetDir;
        // $targetDir = esc_url( home_url( '/' ) )."datum/doc/"; 
        // アップロードされたファイルのパス
        $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]); 
    
        // ファイルが正しくアップロードされたかをチェックする
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "ファイルがアップロードされました。";
        } else {
            echo "ファイルのアップロードに失敗しました。";
        }
        //新規情報の保存
        $sql="";
        if($id=="new"){
            echo $Title[0] .$Sname[0];
            call_user_func('dbOpen');
            call_user_func('NewData',$Title[0],$Sno[0],$Sname[0]);
            // $sql="INSERT INTO proposetable (Title, RegisterID, RegisterDate , RegisterName)  VALUES   ('" + $Title[0] + "',"+ $Sno[0] +",'" + date('y/m/d') + "','" + $Sname[0] + "') ";
            // echo $sql;
            // $result->execute();
            $db=null;
        }
    }

?>
<!-- メイン画面 (2023/03/16)  -->
<main class="manageCont" id="manageCont" >
    <div class="TBox">
        <p class="title"><?php the_title(); ?></p>
        <a href="<?php echo esc_url( home_url( '/' ) );?>" class="Top-Link">TOPMENU</a>
        <!-- <?php the_content(); ?> -->
    </div>
    <form action="<?php echo esc_url( home_url( '/' ) );?>managecont/?id=<?= $id ?>" id="manageInp" method="POST" enctype="multipart/form-data">
    <div class="dsparea">
        <h2 class="manage-title"><?=$id=="new" ? '提案書情報登録' :'提案書情報修正' ?></h2>
        <div class="inp">
            <p class="AddTitle">①登録者情報</p>
            <p class="AddCont">社員番号</p>
            <input type="text" class="sno inpText" id="sno" name="sno" value="<?=$Sno[0]?>">
            <p class="AddCont">漢字氏名</p>
            <input type="text" class="sname inpText" id="sname" name="sname" value="<?=$Sname[0]?>">
        </div>
        <div class="inp">
            <p class="AddTitle">②提案書名</p>
            <input type="text" class="titleText inpText" id="title" name="title" value="<?=$Title[0]?>">
        </div>
        <div class="inp">
            <p class="AddTitle">③ファイル名</p>
            <p class="inpText docFileLabel" name="fileLabel"  id="fileLabel">ファイルを選択してください</p>
            <label class="btAdd">参照
                <input onchange="fileChg()" type="file" id="fileToUpload" name="fileToUpload" class="docFileText" id="titleText">
            </label>
            <input type="submit" class="btAdd" value="保存" name="btnID">
        </div>
        <div class="inp"></div>
        <div class="inp">
            <span class="label tagTitle">タグ付け</span>
            <a href="../managetag?id=1" class="labelCont tagText">
                MainKey:<?=$Mainkey[0]?><br>
                SubKey:<?=$Subkey[0]?>
            </a>
        </div>
        <div class="inp">
            <span class="label learnings">研修情報</span>
            <span class="btAdd learningAdd">研修資料の登録</span>
            <div class="labelCont learningText">
                テキストテキストテキストの活用方法
            </div>
        </div>
        <div class="inp">
            <span class="label learningUrl"> 研修資料URL</span>
            <a href="#" class="learningUrlCont">
                https://www.********
            </a>
        </div>
    </div>
    </form>
</main>
<?php get_footer(); ?>
