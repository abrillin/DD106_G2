<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

require_once("connectDB.php");
$sql = "update `item` set `status`=:status where `no`=:no";
$orderupdate = $pdo->prepare($sql);

$orderupdateInfo = json_decode(file_get_contents("php://input"));

$orderupdate->bindValue(":no", $orderupdateInfo->no);
$orderupdate->bindValue(":status", $orderupdateInfo->status);

$orderupdate->execute();
?>