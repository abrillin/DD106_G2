<?php
// 捕捉訊息
switch ($_FILES['upFile']['error']) {

    // 如果可以上傳
    case UPLOAD_ERR_OK:

        // 檢查server有無 images 資料夾
        if (file_exists("images") == false) {
            mkdir("images"); //make dir
        }

        $from = $_FILES['upFile']['tmp_name'];
        $to = "images/" . $_FILES['upFile']['name']; //   images/7.gif
        if (copy($from, $to)) {
            echo "上傳成功<br>";
        } else {
            echo "上傳失敗<br>";
        }
        break;

    case UPLOAD_ERR_INI_SIZE:
        echo "檔案太大, 不能超過", ini_get("upload_max_filesize"), "<br>";
        break;

    case UPLOAD_ERR_FORM_SIZE:
        echo "檔案太大, 不能超過", $_POST["MAX_FILE_SIZE"], "位元組<br>";
        break;

    case UPLOAD_ERR_PARTIAL:
        echo "檔案上傳不完整<br>";
        break;

    case UPLOAD_ERR_NO_FILE:
        echo "未選檔案<br>";
        break;

    default:
        echo "error : ", $_FILES['upFile']['error'], "<br>";
        echo "請通知系統維護人員<br>";
}
