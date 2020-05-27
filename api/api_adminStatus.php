<?php
session_start();
if (isset($_SESSION["admin_no"])) {
    // $member = array(
    //     "no" => $_SESSION["admin_no"],
    //     "name" => $_SESSION["admin_name"],

        // "status" => $_SESSION["admin_status"]

    // );
    echo "1";
} else {
    echo "0";
}

?>