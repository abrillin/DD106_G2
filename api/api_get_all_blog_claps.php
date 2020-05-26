<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

session_start();

try {
    require_once 'connectDB.php';
    $frontInfo = json_decode(file_get_contents('php://input'));

    // $_SESSION["blogNo"] = $frontInfo->no;
    // echo $_SESSION["blogNo"];

    $sql = "SELECT COUNT(*) count FROM clap WHERE log_no=:blogNo";
    $get_blog_content = $pdo->prepare($sql);
    $get_blog_content->bindValue(":blogNo",$frontInfo);
    $get_blog_content->execute();
    $get_blog_content = $get_blog_content->fetchAll(PDO::FETCH_ASSOC);
    

    echo json_encode($get_blog_content);
} catch (PDOException $e) {
    //echo "error : " . $e->getMessage();
    $error = ['error' => $e->getMessage()];
    echo json_encode($error);
}
?>

