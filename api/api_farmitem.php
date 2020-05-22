<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

session_start();
require_once("connectDB.php");
$sql = "select * from `item`";
 $item = $pdo->prepare($sql);

 $item->execute();
 $memRow = $item->fetch(PDO::FETCH_ASSOC);
 $item = array("no", "name", "price", "description", "status", "img", "date", "seller_no");
    for($i = 0; $i<count($item); $i++){
        $_SESSION["item_".$item[$i]] = $memRow[$item[$i]];
    }
if(isset($_SESSION["item_no"])){
    $itemArry = array(
        "no" => $_SESSION["item_no"],
        "name" => $_SESSION["item_name"],
        "price" => $_SESSION["item_price"],
        "description" => $_SESSION["item_description"],
    );
    echo json_encode($itemArry);
}else{
    echo "";
}
?>