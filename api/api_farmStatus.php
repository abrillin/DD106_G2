<?php
session_start();
if (isset($_SESSION["seller_no"])) {
    $seller = array(
        "no" => $_SESSION["seller_no"],
        "name" => $_SESSION["member_name"],
        "phone" => $_SESSION["member_phone"],
        "email" => $_SESSION["member_email"],
        "gender" => $_SESSION["member_gender"],
        "img" => $_SESSION["member_img"],
        "acc" => $_SESSION["member_acc"],
        "nick" => $_SESSION["member_nick"],
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