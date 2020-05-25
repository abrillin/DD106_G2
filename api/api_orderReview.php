<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

session_start();
try {

    require_once("connectDB.php");

    $sql = "update `ordermaster` set `review`=:star,`status`=1 where no=:no";
    $order = $pdo->prepare($sql);

    $orderInfo = json_decode(file_get_contents("php://input"));

    $order->bindValue(":no", $orderInfo->orderno);
    $order->bindValue(":star", $orderInfo->star);


    $order->execute();

    if ($order->rowCount() == 0) {
        echo "1";
    } else {
        $sql = "update `seller` set `review_total`=(review_total + :starstar),`review_count`=(review_count + 1) where no=:nono";
        $review = $pdo->prepare($sql);
    
        $reviewInfo = json_decode(file_get_contents("php://input"));
    
        $review->bindValue(":nono", $reviewInfo->sellerno);
        $review->bindValue(":starstar", $reviewInfo->star);
    
    
        $review->execute();

        if ($review->rowCount() == 0) {
            echo "1";
        }else{
            echo "0";
        }
        
    }
} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}

?>