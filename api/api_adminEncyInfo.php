<?php
session_start();
 // 取得ency_no 並確認其是否存在、設定好了
if (isset($_SESSION["ency_no"])) {
    $encyEdit = array(
        // key => value, $_SESSION["name"] 去取得資料
        "no" => $_SESSION["ency_no"],
        "title" => $_SESSION["ency_title"],
        "content" => $_SESSION["ency_content"],
        "titleImg" => $_SESSION["ency_title_img"],
        "video" => $_SESSION["ency_video"],
        "question" => $_SESSION["ency_question"],
        "answer" => $_SESSION["ency_answer"],
        "type" => $_SESSION["ency_type"], 
    );
    // 將encyedit內容轉為json
    echo json_encode($encyEdit);
} else {
    echo "";
}

?>
