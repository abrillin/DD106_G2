<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

try {
    require_once("connectDB.php");

    // 計算每個季節有幾筆資料
    $sql = "select `type`, count(*) count from `encyclopedia` group by `type`";
    $count = $pdo->prepare($sql);
    $count->execute();
    $countRows = $count->fetchAll(PDO::FETCH_ASSOC);

    foreach ($countRows as $i => $infoRow) {
        $sql = "select title from `encyclopedia` where type = {$infoRow["type"]}";
        $title = $pdo->query($sql);
        $titleRows = $title->fetchAll(PDO::FETCH_ASSOC);
        $countRows[$i]["title"] = $titleRows;
    }
    
    echo json_encode($countRows);
} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}
