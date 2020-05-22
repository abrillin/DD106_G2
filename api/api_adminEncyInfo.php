<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

session_start();
try {
    require_once("connectDB.php");
    $editEncyInfo = json_decode(file_get_contents("php://input"));
    // 使用file_get_contents獲取php://input內容，由json檔轉為物件/陣列
    // 前面表單輸入進來的資料會在以下被處理
    
	$sql = "update `encyclopedia` (`no`, `title`, `type`, `content`, `question`, `answer`, `title_img`, `video`) values(null, :title, :type, :content, :question, :answer, :titleImg, :video)";
    $editEncy = $pdo->prepare($sql);
    $editEncy -> bindValue(":title", $editEncyInfo->title);
    $editEncy -> bindValue(":type", $editEncyInfo->type);
    $editEncy -> bindValue(":content", $editEncyInfo->content);
    $editEncy -> bindValue(":question", $editEncyInfo->question);
    $editEncy -> bindValue(":answer", $editEncyInfo->answer);
    $editEncy -> bindValue(":titleImg", $editEncyInfo->titleImg);
    $editEncy -> bindValue(":video", $editEncyInfo->video);
    $editEncy -> execute();

 
    if ($editEncy->rowCount() == 0) {
        echo "0";
    } else {

        $sql = "select * from `encyclopedia` where acc=:acc and no=:no";
        $updateEncy = $pdo->prepare($sql);

        $updateEncy->bindValue(":acc", $editEncyInfo->acc);
        $updateEncy->bindValue(":no", $editEncyInfo->no);

        $updateEncy->execute();

        if ($updateEncy->rowCount() == 0) {
            echo "";
        } else {

            $editRow = $updateEncy->fetch(PDO::FETCH_ASSOC);

            $item = array("no", "title", "type", "content", "question", "answer", "title_img", "video");

            for ($i = 0; $i < count($item); $i++) {

                $_SESSION["ency_" . $item[$i]] = $editRow[$item[$i]];
            }

            echo "1";
        }
    }
} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}


?>
