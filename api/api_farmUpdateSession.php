<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');

session_start();
try {
    require_once("connectDB.php");

    $sql = "select a.*, b.`address`,b.`content`,b.`review_total`,b.`review_count`,b.`member_no` FROM `member` a,`seller` b WHERE b.member_no=:memberno && a.no=:no";
    $seller = $pdo->prepare($sql);

    $sellerInfo = json_decode(file_get_contents("php://input"));

   
    $seller->bindValue(":memberno", $sellerInfo->memberno);
    $seller->bindValue(":no", $sellerInfo->no);
    $seller->execute();

    if ($seller->rowCount() == 0) {
        echo "";
    } else {

        $selRow = $seller->fetch(PDO::FETCH_ASSOC);

        $item = array("no", "name", "phone", "email", "gender", "img", "acc", "psw", "nick", "status","address","content","review_total","review_count","member_no");

        for ($i = 0; $i < count($item); $i++) {

            $_SESSION["seller_" . $item[$i]] = $selRow[$item[$i]];
        }

        echo "1";
    }
} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}
