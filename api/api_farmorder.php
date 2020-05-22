<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

session_start();
require_once("connectDB.php");
$sql = "select * from `item`";
$commodity = $pdo->prepare($sql);

$commodity->execute();
$memRow = $commodity->fetchAll(PDO::FETCH_ASSOC);
// $commodity = array("no", "name", "price", "description", "status", "img", "date", "seller_no");
//     for($i=0; $i<count($commodity); $i++){
//         $_SESSION["commodity_".$commodity[$i]] = $memRow[$commodity[$i]];
//     }
// if(isset($_SESSION["commodity_no"])){
//     $commodityArry = array(
//         "no" => $_SESSION["commodity_no"],
//         "name" => $_SESSION["commodity_name"],
//         "price" => $_SESSION["commodity_price"],
//         "date" => $_SESSION["commodity_date"],
//     );
    echo json_encode($memRow);
// }else{
//     echo "";
// }
?>