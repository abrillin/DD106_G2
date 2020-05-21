<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');

try {

    require_once("connectDB.php");

    // 查詢是否有此帳號
    $sql = "select * from `member` where acc=:acc";
    $checkMember = $pdo->prepare($sql);

    $memberInfo = json_decode(file_get_contents("php://input"));

    $checkMember->bindValue(":acc", $memberInfo->acc);

    $checkMember->execute();

    // 如果沒有此帳號，進行註冊程序，否則回傳 0
    if ($checkMember->rowCount() == 0) {

        $sql = "insert into `member` (`no`, `name`, `nick`, `acc`, `psw`, `img`, `gender`, `phone`, `email`, `status`) values(null, :name, :nick, :acc, :psw, null, :gender, :phone, :email, '1')";
        $member = $pdo->prepare($sql);

        $member->bindValue(":name", $memberInfo->name);
        $member->bindValue(":nick", $memberInfo->nick);
        $member->bindValue(":acc", $memberInfo->acc);
        $member->bindValue(":psw", $memberInfo->psw);
        $member->bindValue(":gender", $memberInfo->gender);
        $member->bindValue(":phone", $memberInfo->phone);
        $member->bindValue(":email", $memberInfo->email);

        $member->execute();

        // 如果註冊失敗，回傳 0，註冊成功，回傳 1
        if ($member->rowCount() == 0) {

            echo "0";
        } else {

            echo "1";
        }
    } else {

        echo "0";
    }
} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}

