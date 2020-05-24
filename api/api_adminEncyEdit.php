<?php
// 這支是新增百科內容

header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

session_start();
try {
    require_once("connectDB.php");
    $encyEditInfo = json_decode(file_get_contents("php://input"));
    // 使用file_get_contents獲取php://input內容，由json檔轉為物件/陣列
    // 前面表單輸入進來的資料會在以下被處理
    
	$sql = "insert into `encyclopedia` (`no`, `title`, `type`, `content`, `question`, `answer`, `title_img`, `video`) values(null, :title, :type, :content, :question, :answer, :titleImg, :video)";
    $encyEdit = $pdo->prepare($sql);
    $encyEdit -> bindValue(":title", $encyEditInfo->title);
    $encyEdit -> bindValue(":type", $encyEditInfo->type);
    $encyEdit -> bindValue(":content", $encyEditInfo->content);
    $encyEdit -> bindValue(":question", $encyEditInfo->question);
    $encyEdit -> bindValue(":answer", $encyEditInfo->answer);
    $encyEdit -> bindValue(":titleImg", $encyEditInfo->titleImg);
    $encyEdit -> bindValue(":video", $encyEditInfo->video);
    $encyEdit -> execute();
    
    $no = $pdo->lastInsertId();
    
    echo json_encode($encyEditInfo); // 以上處理完後，將物件轉json檔
    
} catch (PDOException $e) {
   echo "錯誤原因 : ", $e->getMessage(), "<br>";
   echo "錯誤行號 : ", $e->getLine(), "<br>";	
}


?>