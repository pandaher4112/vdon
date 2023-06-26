<?php
//データベースに接続
$lhost = 'mysql210.phy.lolipop.lan';
$mydb = 'LAA1419635-aaa';
$user = 'LAA1419635';
$password = 'panda2001';
$db = '';
$rs = '';
$row = '';
$docFile = '/datum/doc/' ;
$imgFile = '/datum/img/' ;

function FileDeff(){
    global $docFile;
    global $imgFile;
}

function dbOpen(){
   global $db;
   $db = new PDO(
        'mysql:host=mysql210.phy.lolipop.lan;dbname=LAA1419635-aaa;charset=utf8',
        'LAA1419635',
        'panda2001',
        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)
        );

}    // $db = new mysqli($lhost,$user,$password,$mydb);

function sqlRun($sql){
    global $rs;
    global $db;
    global $row;
    $rs = $db->query($sql);
    $row = $rs->fetchAll();
}

function NewData($Title,$Sno,$Sname){
    global $db;
    $aDate=date('y/m/d');
    $sql="INSERT INTO proposetable (Title, RegisterID, RegisterDate , RegisterName)  VALUES   ('" .$Title ."'," .$Sno .",'" .$aDate."','" .$Sname ."') ";
    echo $sql;
    $result = $db->query($sql);
}

function UpdateData($Title,$RegisterID,$RegisterDate){
//    $sql="INSERT INTO proposetable (Title, MainKey, SubKey, TraMainID, TraSubID, RegisterID, RegisterDate, UpdateID, UpdateDate, GoodRankSum, UseRankSum, Folder, FileName)
 // VALUES
 // ('Sample Title 1', 'Sample MainKey 1', 'Sample SubKey 1', 1, 1, 1, '2023-02-23', 1, '2023-02-23', 0, 0, 'Sample Folder 1', 'Sample File Name 1'),
 // ('Sample Title 2', 'Sample MainKey 2', 'Sample SubKey 2', 1, 1, 1, '2023-02-23', 1, '2023-02-23', 0, 0, 'Sample Folder 2', 'Sample File Name 2'),
 // ('Sample Title 3', 'Sample MainKey 3', 'Sample SubKey 3', 1, 1, 1, '2023-02-23', 1, '2023-02-23', 0, 0, 'Sample Folder 3', 'Sample File Name 3'),
 // ('Sample Title 4', 'Sample MainKey 4', 'Sample SubKey 4', 1, 1, 1, '2023-02-23', 1, '2023-02-23', 0, 0, 'Sample Folder 4', 'Sample File Name 4'),
 // ('Sample Title 5', 'Sample MainKey 5', 'Sample SubKey 5', 1, 1, 1, '2023-02-23', 1, '2023-02-23', 0, 0, 'Sample Folder 5', 'Sample File Name 5'),
 // ('Sample Title 6', 'Sample MainKey 6', 'Sample SubKey 6', 1, 1, 1, '2023-02-23', 1, '2023-02-23', 0, 0, 'Sample Folder 6', 'Sample File Name 6'),
 // ('Sample Title 7', 'Sample MainKey 7', 'Sample SubKey 7', 1, 1, 1, '2023-02-23', 1, '2023-02-23', 0, 0, 'Sample Folder 7', 'Sample File Name 7'),
 // ('Sample Title 8', 'Sample MainKey 8', 'Sample SubKey 8', 1, 1, 1, '2023-02-23', 1, '2023-02-23', 0, 0, 'Sample Folder 8', 'Sample File Name 8'),
 // ('Sample Title 9', 'Sample MainKey 9', 'Sample SubKey 9', 1, 1, 1, '2023-02-23', 1, '2023-02-23', 0, 0, 'Sample Folder 9', 'Sample File Name 9'),
 // ('Sample Title 10', 'Sample MainKey 10', 'Sample SubKey 10', 1, 1, 1, '2023-02-23', 1, '2023-02-23', 0, 0, 'Sample Folder 10', 'Sample File Name 10')";
 
 // $result->execute();
  
 }