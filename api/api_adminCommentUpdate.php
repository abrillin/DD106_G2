<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

try {

    require_once("connectDB.php");

    $sql = "update `report_comment` set `status`=:status where `no`=:no";
    $update = $pdo->prepare($sql);

    $info = json_decode(file_get_contents("php://input"));

    $update->bindValue(":no", $info->no);
    $update->bindValue(":status", $info->status);

    $update->execute();
    $status = $info->status;
    if ($status == 1) {

        $s = $status + 1;

        $sql = "update `blog_comment` set `status`=:status where `no`=:no";
        $updateComment = $pdo->prepare($sql);

        $updateComment->bindValue(":no", $info->com);
        $updateComment->bindValue(":status", $s);

        $updateComment->execute();
    }
} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}
