<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

session_start();
require_once("connectDB.php");

$listNo = json_decode(file_get_contents("php://input"));

$sql = "select * from `ordermaster` where no = :no";
$order = $pdo->prepare($sql);

$order->bindValue(":no", $_SESSION["listNo"]);

$order->execute();

$orderRow = $order->fetch(PDO::FETCH_ASSOC);

$sql = "select i.no no from `ordermaster` o join `detail` d on (o.no = d.order_no) join `item` i on (d.item_no = i.no) where o.no = :no";
$itemInfo = $pdo->prepare($sql);

$itemInfo->bindValue(":no", $_SESSION["listNo"]);

$itemInfo->execute();

$itemInfos = $itemInfo->fetchAll(PDO::FETCH_ASSOC);

foreach ($itemInfos as $i => $info) {
    $sql = "select i.*, d.amount from `item` i join `detail` d where no={$info["no"]}";
    $item = $pdo->query($sql);
    $info = $item->fetch(PDO::FETCH_ASSOC);
    $orderRow["item"][$i] = $info;
}

echo json_encode($orderRow);
