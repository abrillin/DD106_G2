<?php
session_start();
if (isset($_SESSION["ency_no"])) {
    $encyEdit = array(
        "no" => $_SESSION["ency_no"],
        "title" => $_SESSION["ency_title"],
        "content" => $_SESSION["ency_content"],
        "titleImg" => $_SESSION["ency_title_img"],
        "video" => $_SESSION["ency_video"],
        "question" => $_SESSION["ency_question"],
        "answer" => $_SESSION["ency_answer"],
        "type" => $_SESSION["ency_type"], 
    );
    echo json_encode($encyEdit);
} else {
    echo "";
}

?>
