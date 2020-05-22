<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

session_start();

try {
    require_once("connectDB.php");
    $frontInfo = json_decode(file_get_contents("php://input"));

    $_SESSION["itemNo"] = $frontInfo->no;

    echo $_SESSION["itemNo"];
} catch (PDOException $e) {
    echo "錯誤原因 : ", $e->getMessage(), "\n";
    echo "錯誤行號 : ", $e->getLine(), "\n";
}
