<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');

try {

    require_once("connectDB.php");

    // 查詢帳號是否已經被註冊過
    $sql = "insert into `member` (`no`, `name`, `nick`, `acc`, `psw`, `img`, `gender`, `phone`, `email`, `status`) values(null, :name, :nick, :acc, :psw, null, :gender, :phone, :email, '1')";
    $member = $pdo->prepare($sql);

    $memberInfo = json_decode(file_get_contents("php://input"));

    $member->bindValue(":name", $memberInfo->name);
    $member->bindValue(":nick", $memberInfo->nick);
    $member->bindValue(":acc", $memberInfo->acc);
    $member->bindValue(":psw", $memberInfo->psw);
    $member->bindValue(":gender", $memberInfo->gender);
    $member->bindValue(":phone", $memberInfo->phone);
    $member->bindValue(":email", $memberInfo->email);

    $member->execute();

    if ($member->rowCount() == 0) {

        echo "1";
    } else {

        echo "0";
    }
} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}
