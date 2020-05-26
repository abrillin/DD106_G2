<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

try {
    require_once("connectDB.php");

    $sql = "select * from `report_comment`";
    $comment = $pdo->prepare($sql);

    $report = json_decode(file_get_contents("php://input"));

    $comment->execute();

    $comments = $comment->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($comments);
} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}
