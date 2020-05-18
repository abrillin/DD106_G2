<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');

try {

    require_once("connectDB.php");

    // 新增帳號
    $sql = "insert into `seller` (`no`, `address`, `content`, `review_total`, `review_count`, `status`, `member_no`) values(null,:add,0,0,0,1,:no )";
    $member = $pdo->prepare($sql);

    $memberInfo = json_decode(file_get_contents("php://input"));
    //帶入值
    $member->bindValue(":no", $memberInfo->no);
    $member->bindValue(":add", $memberInfo->add);


    $member->execute();

    if ($member->rowCount() == 0) {

        echo "1";
    } else {
    //沒註冊過
        echo "0";
    }
} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}
?>
