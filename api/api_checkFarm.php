<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

session_start();
try {
    // 登入DB
    require_once("connectDB.php");

    // 操作DB
    $sql = "select * from `seller` where member_no=:no";
    $seller = $pdo->prepare($sql);

    $sellerInfo = json_decode(file_get_contents("php://input"));

    $seller->bindValue(":no", $sellerInfo->no);


    // 返回data
    $seller->execute();

    if ($seller->rowCount() == 0) {
        // 查無此人
        echo "0";
    }else{
        echo "1";
    }
    
       

    }
catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}

?>