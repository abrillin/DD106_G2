<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

try {

    require_once("connectDB.php");

    $sql = "update `member` set `phone`=:phone, `email`=:email, `nick`=:nick, `gender`=:gender, `name`=:name where `acc`=:acc and `no`=:no";
    $member = $pdo->prepare($sql);

    $memberInfo = json_decode(file_get_contents("php://input"));

    $member->bindValue(":no", $memberInfo->no);
    $member->bindValue(":name", $memberInfo->name);
    $member->bindValue(":nick", $memberInfo->nick);
    $member->bindValue(":acc", $memberInfo->acc);
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
?>




