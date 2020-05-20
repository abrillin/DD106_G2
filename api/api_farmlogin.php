<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

session_start();
try {
    // 登入DB
    require_once("connectDB.php");

    // 操作DB
    $sql = "select a.*, b.`address`,b.`content`,b.`review_total`,b.`review_count`,b.`member_no` FROM `member` a,`seller` b WHERE b.member_no=:no && a.acc=:acc";
    $seller = $pdo->prepare($sql);

    $sellerInfo = json_decode(file_get_contents("php://input"));

    $seller->bindValue(":no", $sellerInfo->no);
    $seller->bindValue(":acc", $sellerInfo->acc);
    

    // 返回data
    $seller->execute();

    if ($seller->rowCount() == 0) {
        // 查無此人
        echo "";
    } else {
        // 登入成功
        // 自資料庫中取回資料
        $selRow = $seller->fetch(PDO::FETCH_ASSOC);

        // 寫入session
        $item = array("no", "name", "phone", "email", "gender", "img", "acc", "psw", "nick", "status","address","content","review_total","review_count","member_no");

        for ($i = 0; $i < count($item); $i++) {

            $_SESSION["seller_" . $item[$i]] = $selRow[$item[$i]];
        }

        // 送出登入者的姓名資料
        $seller = array("name" => $_SESSION["seller_name"], "nick" => $_SESSION["seller_nick"], "status" => $_SESSION["seller_status"]);

        echo json_encode($selRow);

    }
} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}

?>

