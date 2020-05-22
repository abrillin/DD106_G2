<?php
session_start();
if (isset($_SESSION["ency_no"])) {
    $editEncy = array(
        "no" => $_SESSION["ency_no"],
        "title" => $_SESSION["ency_title"],
        "type" => $_SESSION["ency_type"],
        "content" => $_SESSION["ency_content"],
        "question" => $_SESSION["ency_question"],
        "answer" => $_SESSION["ency_answer"],
        "titleImg" => $_SESSION["ency_titleImg"],
        "video" => $_SESSION["ency_video"],
      
    );
    echo json_encode($editEncy);
} else {
    echo "";
}

?>
