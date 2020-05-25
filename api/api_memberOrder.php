<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

try {
    require_once("connectDB.php");
    
	$sql = "select * from `ordermaster` where member_no=:nono";
    $order = $pdo->prepare($sql);
    
    $orderInfo = json_decode(file_get_contents("php://input"));
    $order->bindValue(":nono",$orderInfo);

    $order->execute();

    $orderInfo = $order->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($orderInfo);
    
} catch (PDOException $e) {

    $error = ["error" => $e->getMessage()]; // 這裡的"error"是function
    echo json_encode($error);
}
?>