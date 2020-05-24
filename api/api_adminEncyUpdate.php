<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

session_start();
try {
    require_once("connectDB.php");

    // no不能變其他都可以

    $sql = "update `encyclopedia` set `title`=:title, `type`=:type, `content`=:content, `question`=:question, `answer`=:answer, `title_img`:=title_img, `video`=:video where `no`=:no";
    

    $encyEdit = $pdo->prepare($sql);

    $encyEditInfo = json_decode(file_get_contents("php://input"));
    // 使用file_get_contents獲取php://input內容，由json檔轉為物件/陣列
    // 前面表單輸入進來的資料會在以下被處理

    $encyEdit-> bindValue(":no", $encyEditInfo->no);
    $encyEdit -> bindValue(":title", $encyEditInfo->title);
    $encyEdit -> bindValue(":type", $encyEditInfo->type);
    $encyEdit -> bindValue(":content", $encyEditInfo->content);
    $encyEdit -> bindValue(":question", $encyEditInfo->question);
    $encyEdit -> bindValue(":answer", $encyEditInfo->answer);
    $encyEdit -> bindValue(":titleImg", $encyEditInfo->titleImg);
    $encyEdit -> bindValue(":video", $encyEditInfo->video);
    $encyEdit -> execute();

 
    if ($encyEdit->rowCount() == 0) {
        echo "0";
    } else {
        echo "1";
        
    }
} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}


?>