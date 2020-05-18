<?php
session_start();

if(isset($_SESSION["seller_no"])){
    $seller = array(
        "no" => $_SESSION["seller_no"],
        "member_no" => $_SESSION["seller_member_no"],
        "name" => $_SESSION["seller_name"],
        "phone" => $_SESSION["seller_phone"],
        "email" => $_SESSION["seller_email"],
        "gender" => $_SESSION["seller_gender"],
        "img" => $_SESSION["seller_img"],
        "acc" => $_SESSION["seller_acc"],
        "nick" => $_SESSION["seller_nick"],
        "status" => $_SESSION["seller_status"],
        "review_total" => $_SESSION["seller_review_total"],
    );
    echo json_encode($seller);
}else{
    echo "";
}
?>