<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

session_start();

try {
    require_once 'connectDB.php';
    $frontInfo = json_decode(file_get_contents('php://input'));

    //新增留言
    //新增留言
    //新增留言

    if (isset($_SESSION['member_no'])) {
        $member_no = $_SESSION['member_no'];
    } else {
        $member_no = null;
    }

    $sql = 'SELECT COUNT(*) count FROM clap WHERE log_no=:blog_no';
    $blog = $pdo->prepare($sql);
    $blog->bindValue(':blog_no', $_SESSION['blogNo']);
    $blog->execute();
    $blog_comment_Rows = $blog->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($blog_comment_Rows);

    // echo $_SESSION['member_no'], '  ', $_SESSION['blogNo'];
} catch (PDOException $e) {
    //echo "error : " . $e->getMessage();
    $error = ['error' => $e->getMessage()];
    echo json_encode($error);
}
?>

