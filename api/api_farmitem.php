<?php
session_start();
if(isset($_SESSION["item_no"])){
    $item = array(
        "no" => $_SESSION["item_no"],
        "name" => $_SESSION["item_name"],
        "price" => $_SESSION["item_price"],
        "description" => $_SESSION["item_description"],
    );
    echo json_encode($item);
}else{
    echo "";
}
?>