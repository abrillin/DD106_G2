<?php
session_start();
if (isset($_SESSION["admin_no"])) {
    $member = array(
        "no" => $_SESSION["admin_no"],
        "name" => $_SESSION["admin_name"],

        // "status" => $_SESSION["admin_status"]

    );
    echo json_encode($member);
} else {
    echo "0";
}
