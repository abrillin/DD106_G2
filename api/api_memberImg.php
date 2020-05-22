<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

session_start();
try {

    require_once("connectDB.php");

    $sql = "select * from `member` where no=:no and acc=:acc";
    $member = $pdo->prepare($sql);

    $memberInfo = json_decode(file_get_contents("php://input"));

    $member->bindValue(":no", $memberInfo->no);
    $member->bindValue(":acc", $memberInfo->acc);

    $member->execute();

    if ($member->rowCount() == 0) {
        echo "0";
    } else {

        header("./api_fileUpload.php");
    }
} catch (PDOException $e) {

    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}
