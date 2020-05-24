<?php 
$no = $_REQUEST["encyno"];
$errMsg = "";

try {
    require_once("connectDB.php");
    
	$sql = "select * from `encyclopedia` where `no`=:encyno";
    $encyEdit = $pdo->prepare($sql);

    $encyEditInfo = json_decode(file_get_contents("php://input"));

    $encyEdit-> bindValue(":no", $encyEditInfo->encyno);

    // $encyEdit -> bindValue(":title", $encyEditInfo->title);
    // $encyEdit -> bindValue(":type", $encyEditInfo->type);
    // $encyEdit -> bindValue(":content", $encyEditInfo->content);
    // $encyEdit -> bindValue(":question", $encyEditInfo->question);
    // $encyEdit -> bindValue(":answer", $encyEditInfo->answer);
    // $encyEdit -> bindValue(":titleImg", $encyEditInfo->titleImg);
    // $encyEdit -> bindValue(":video", $encyEditInfo->video);
    $encyEdit -> execute();

    $editrow = $encyEdit->fetchObject(); // 抓欲修改的資料內容

    echo json_encode($editrow); // 傳回去帶資料到修改商品的頁面上 AdminEncyInfo

}catch(PDOException $e){
  $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
  $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}
?>  