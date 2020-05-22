<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');

try {
    require_once("connectDB.php");



    $sql = "insert into `blog` (`no`, `content` ,`content2`, `title`, `date`, `status`, `img`, `seller_no`) values(:no, :content1, :content2, :title, :date, 1, :img, :sellerno)";
    $blog = $pdo->prepare($sql);
    $blogInfo = json_decode(file_get_contents("php://input"));
    $blog ->bindValue(":no", $blogInfo->no);
    $blog ->bindValue(":img", $blogInfo->img);
    $blog ->bindValue(":date", $blogInfo->date);
    $blog ->bindValue(":content1", $blogInfo->content1);
    $blog ->bindValue(":content2", $blogInfo->content2);
    $blog ->bindValue(":title", $blogInfo->title);
    $blog ->bindValue(":sellerno", $blogInfo->sellerno);

    $blog ->execute();

        // 如果註冊失敗，回傳 0，註冊成功，回傳 1
    if ($blog ->rowCount() == 0) {
        echo "0";
    } else {

        echo "1";
    }

} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}

