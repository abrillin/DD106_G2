<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

try {

    require_once("connectDB.php");

    $sql = "update `seller` set `address`=:add, `content`=:content where `member_no`=:no" ;
    $seller = $pdo->prepare($sql);

    $sellerInfo = json_decode(file_get_contents("php://input"));

    $seller->bindValue(":no", $sellerInfo->memberno);
    $seller->bindValue(":add", $sellerInfo->address);
    $seller->bindValue(":content", $sellerInfo->content);


    $seller->execute();

    if ($seller->rowCount() == 0) {
        echo "1";
    } else {
        echo "0";
    }
} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}
?>