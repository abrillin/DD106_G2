<?php
header('Access-Control-Allow-Origin:*'); // 允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); // 允許POST、GET訪問方式
session_start(); // 啟用 session
try {
    // 連接 DBserver
    require_once("connectDB.php");
    // SQL操作
    $sql = "update `member` set `img`=:img where `acc`=:acc and `no`=:no";
    // 使用PDO物件的方法發送SQL操作
    $member = $pdo->prepare($sql);
    // 接收前端發送的 JSON 資料
    $memberInfo = json_decode(file_get_contents("php://input"));
    // 綁定屬性值
    $member->bindValue(":no", $memberInfo->no);
    $member->bindValue(":acc", $memberInfo->acc);
    $member->bindValue(":img", $memberInfo->img);
    // 回傳資料
    $member->execute();

    // 檢查有無修改成功 ( rowCount 代表影響的筆數)
    if ($member->rowCount() == 0) {
        // 沒有
        echo "1";
    } else {
        // 有
        echo "0";
    }
} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}
