<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

session_start();
require_once("connectDB.php");
$sql = "select o.*, d.item_no from `ordermaster` o join `detail` d on (o.no = d.order_no) where o.seller_no = :no";
$listmanage = $pdo->prepare($sql);

$listmanage->bindValue(":no", $_SESSION["seller_no"]);

$listmanage->execute();
$memRow = $listmanage->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($memRow);
