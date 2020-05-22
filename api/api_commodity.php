<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

try {
    require_once("connectDB.php");

    $sql = "select * from `item`";

    $member = $pdo->prepare($sql);
    $member->execute();

    $memRow = $member->fetch(PDO::FETCH_ASSOC);


    echo json_encode($memRow);
} catch (PDOException $e) {
    echo "錯誤原因 : ", $e->getMessage(), "\n";
    echo "錯誤行號 : ", $e->getLine(), "\n";
}
