<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');

try {
    require_once("connectDB.php");



    $sql = "insert into `item_tag` (`item_no`, `tag_no`) values(:no, :tag)";
    $itemtag = $pdo->prepare($sql);
    $itemtagInfo = json_decode(file_get_contents("php://input"));

    $itemtag->bindValue(":no",$itemtagInfo->no);
    $itemtag->bindValue(":tag",$itemtagInfo->selected);


    $itemtag->execute();

        // 如果註冊失敗，回傳 0，註冊成功，回傳 1
    if ($itemtag->rowCount() == 0) {
        echo "0";
    } else {

        echo "1";
    }

} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}

?>