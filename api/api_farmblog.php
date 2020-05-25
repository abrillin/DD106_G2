<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

session_start();
require_once("connectDB.php");
$sql = "select * from `blog` where seller_no = :no";
$blogmanage = $pdo->prepare($sql);

$blogmanage->bindValue(":no", $_SESSION["seller_no"]);

$blogmanage->execute();
$memRow = $blogmanage->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($memRow);
