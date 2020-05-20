<?php
session_start();
if (isset($_SESSION["seller_no"])) {
    $seller = array(
        "no" => $_SESSION["seller_no"],
        "name" => $_SESSION["seller_name"],
        "phone" => $_SESSION["seller_phone"],
        "email" => $_SESSION["seller_email"],
        "gender" => $_SESSION["seller_gender"],
        "img" => $_SESSION["seller_img"],
        "acc" => $_SESSION["seller_acc"],
        "nick" => $_SESSION["seller_nick"],
        "status" => $_SESSION["seller_status"],
        "address" => $_SESSION["seller_address"],
        "content" => $_SESSION["seller_content"],
        "reviewtotal" => $_SESSION["seller_review_total"],
        "reviewcount" => $_SESSION["seller_review_count"],
        "memberno" => $_SESSION["seller_member_no"],
    );
    echo json_encode($seller);
} else {
    echo "";
}

?>