<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');

try {
    require_once("connectDB.php");



    $sql = "insert into `item` (`no`, `name` ,`price`, `description`, `status`, `img`, `date`, `seller_no`) values(:no, :name, :price, :description, 1, :img, :date, :sellerno)";
    $item = $pdo->prepare($sql);
    $itemInfo = json_decode(file_get_contents("php://input"));
    $item ->bindValue(":no", $itemInfo->no);
    $item ->bindValue(":name", $itemInfo->name);
    $item ->bindValue(":price", $itemInfo->price);
    $item ->bindValue(":description", $itemInfo->description);
    $item ->bindValue(":img", $itemInfo->img);
    $item ->bindValue(":date", $itemInfo->date);
    $item ->bindValue(":sellerno", $itemInfo->sellerno);

    $item ->execute();

        // 如果註冊失敗，回傳 0，註冊成功，回傳 1
    if ( $item ->rowCount() == 0) {
        echo "0";
    } else {

        echo "1";
    }

} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}