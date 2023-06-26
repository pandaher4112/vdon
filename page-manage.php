<!-- 提案書管理ページ -->
<?php get_header(); ?>
<?php include('db.php'); ?>
<?php
    //  パラメータの取得
    $cNo=0;
    $Sno="";
    $Sname="";
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['Sno'])){$Sno = $_POST['Sno'];} else{$Sno = "";}
        if(isset($_POST['Sname'])){$Sname = $_POST['Sname'];} else{$Sname = "";}
        // データの読出
        call_user_func('dbOpen');
        if($Sno!=""){
            $sql="select * from proposetable where RegisterID =" .$Sno ." or UpdateID = " .$Sno;
        } elseif($Sname !=""){
            $sql="select * from proposetable where RegisterName like '%".$Sname."%'" ." or UpdateName like '%".$Sname."%'" ;
        }
        // echo $sql;
        if(isset($sql)){
            call_user_func('sqlRun',$sql);
            $Id = array_column($row,'ID');
            $Title = array_column($row,'Title');
            $RegisterID = array_column($row,'RegisterID');
            $RegisterName = array_column($row,'RegisterName');
            $RegisterSec = array_column($row,'RegisterSec');
            $date = array_column($row,'UpdateDate');
            $cNo=count($Id);
        }
        $db = null;
    }
?>
<!-- メイン画面 (2023/03/16)  -->
<main class="manageMain" id="manage" >
    <div class="TBox">
        <p class="title"><?php the_title(); ?></p>
        <a href="<?php echo esc_url( home_url( '/' ) );?>" class="Top-Link">TOPMENU</a>
        <!-- <?php the_content(); ?> -->
    </div>
    <form action="<?php echo esc_url( home_url( '/' ) );?>manage" id="userFrom" method="POST">
        <div class="creater">
            <p class="label">社員番号</p>
            <input type="text" class="labelCont" name="Sno" value="<?= $Sno ?>">
            <p class="label">漢字氏名</p>
            <input type="text" class="labelCont" name="Sname" value="<?= $Sname ?>">
            <div class="btn">
                <input type="submit" class="List-view btnMg" value="検索">
                <a href="<?php echo esc_url( home_url( '/' ) );?>managecont/?id=new" class="List-view btnMg" >新規登録</a>
            </div>
        </div>
    </form>
    <div class="dsparea">
        <div class="scroll-box">
            <ul class="result-lists">
<?php 
    if($cNo==0){
?>
        <li class="result-list"><p class="List-caption">上記、社員番号または氏名にて検索してください</P></li>

        <?php }
    else{
    for($i=0;$i<$cNo;$i++){
?>
                <li class="result-list">
                    <p class="List-icon">WEB</P>
                    <p class="List-caption"><?php echo "No".$Id[$i]." ：".$Title[$i] ;?></p>
                    <div>
                        <a href="<?php echo esc_url( home_url( '/' ) );?>managecont/?id=<?=$Id[$i]?>" class="List-view" id="Edit">EDIT</a>
                    </div>
                    <div class="List-line"></div>
                </li>
<?php }} ?>
            </ul>
        </div>
    </div>
</main>
<?php get_footer(); ?>
