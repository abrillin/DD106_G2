<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');

session_start();
try {
    require_once("connectDB.php");

    $sql = "select * from `member` where acc=:acc and no=:no";
    $member = $pdo->prepare($sql);

    $memberInfo = json_decode(file_get_contents("php://input"));

    $member->bindValue(":acc", $memberInfo->acc);
    $member->bindValue(":no", $memberInfo->no);

    $member->execute();

    if ($member->rowCount() == 0) {
        echo "";
    } else {

        $memRow = $member->fetch(PDO::FETCH_ASSOC);

        $item = array("no", "name", "phone", "email", "gender", "img", "acc", "psw", "nick", "status");

        for ($i = 0; $i < count($item); $i++) {

            $_SESSION["member_" . $item[$i]] = $memRow[$item[$i]];
        }

        echo "1";
    }
} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}
