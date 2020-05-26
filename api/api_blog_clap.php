<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

session_start();

try {
    require_once 'connectDB.php';
    $frontInfo = json_decode(file_get_contents('php://input'));


    if (isset($_SESSION['member_no'])) {
        $member_no = $_SESSION['member_no'];
        $sql =
        'INSERT INTO `clap` (`log_no`, `member_no`) VALUES (:blog_no, :mem_no)';
    $blog = $pdo->prepare($sql);
    $blog->bindValue(':blog_no', $_SESSION['blogNo']);
    $blog->bindValue(':mem_no', $member_no);
    $blog->execute();
    } else {
        echo "123";
    }

    

    // echo $_SESSION['member_no'], '  ', $_SESSION['blogNo'];
} catch (PDOException $e) {
    //echo "error : " . $e->getMessage();
    $error = ['error' => $e->getMessage()];
    echo json_encode($error);
}
?>

