<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

try {
    require_once("connectDB.php");

    $info = json_decode(file_get_contents("php://input"));
    // 查詢某個季節的某個名稱的水果資料
    $sql = "select * from `encyclopedia` where type=:type";
    $type = $pdo->prepare($sql);

    $type->bindValue(":type", $info->type);
    // $type->bindValue(":index", $info->index);

    $type->execute();

    if ($type->rowCount() == 0) {

        // 查無資料
        echo "0";
    } else {
        $typeRows = $type->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($typeRows);
    }
} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}
