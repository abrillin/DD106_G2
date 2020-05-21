<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

try {
    require_once("connectDB.php");
    $recordsPerPage = 8;
    $start = ($_GET["pageNo"] - 1) * 8;

    $sql = "select * from `item`";
    $products = $pdo->prepare($sql);
    $products->execute();
    $prodRows = $products->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($prodRows);
} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}
