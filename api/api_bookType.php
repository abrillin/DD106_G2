<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

try {
    require_once("connectDB.php");

    // 計算每個季節有幾筆資料
    $sql = "select `type`, count(*) count from `encyclopedia` group by `type`";
    $type = $pdo->prepare($sql);
    $type->execute();
    $typeRows = $type->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($typeRows);
} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}
