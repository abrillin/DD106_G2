<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');

session_start();
try {

    require_once("connectDB.php");

    // 新增帳號
    $sql = "insert into `seller` (`no`, `address`, `content`, `review_total`, `review_count`, `status`, `member_no`) values(null,:add,0,0,0,0,:no )";
    $member = $pdo->prepare($sql);

    $memberInfo = json_decode(file_get_contents("php://input"));
    //帶入值
    $member->bindValue(":no", $memberInfo->no);
    $member->bindValue(":add", $memberInfo->add);


    $member->execute();

    if ($member->rowCount() == 0) {

        echo "1";
    } else {
        // 註冊完成後，資料寫入 session
        $sql = "select * from `seller` where member_no = :no";

        $seller = $pdo->prepare($sql);

        $seller->bindValue(":no", $memberInfo->no);

        $seller->execute();

        if ($seller->rowCount() != 0) {

            $sellerRow = $seller->fetch(PDO::FETCH_ASSOC);

            // 寫入session
            $item = array("no", "status", "address", "content", "review_total", "review_count", "member_no");

            for ($i = 0; $i < count($item); $i++) {

                $_SESSION["seller_" . $item[$i]] = $sellerRow[$item[$i]];
            }

            echo "0";
        }
    }
} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}
