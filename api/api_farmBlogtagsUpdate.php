<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');

try {
    require_once("connectDB.php");



    $sql = "insert into `blog_tag` (`no`, `tag`) values(:no, :tag)";
    $blogtag = $pdo->prepare($sql);
    $blogtagInfo = json_decode(file_get_contents("php://input"));

    $blogtag->bindValue(":no",$blogtagInfo->no);
    $blogtag->bindValue(":tag",$blogtagInfo->selected);


    $blogtag->execute();

        // 如果註冊失敗，回傳 0，註冊成功，回傳 1
    if ($blogtag->rowCount() == 0) {
        echo "0";
    } else {

        echo "1";
    }

} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}

?>
