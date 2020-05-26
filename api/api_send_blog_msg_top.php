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

    $sql =
        "INSERT INTO `blog_comment` (`no`, `content`, `status`, `date`, `member_no`, `blog_no`) VALUES (NULL, :content, '1', :date1, :member_no,:blog_no)";
    $blog = $pdo->prepare($sql);
    $blog->bindValue(':content', $frontInfo[0]);
    $blog->bindValue(':date1', $frontInfo[2]);
    $blog->bindValue(':member_no', $member_no);
    $blog->bindValue(':blog_no', $frontInfo[1]);
    $blog->execute();

    $sql2 = 'select * from blog_comment order by no desc limit 1';
    $blog_comment = $pdo->prepare($sql2);
    $blog_comment->execute();
    $blog_comment_Rows = $blog_comment->fetchAll(PDO::FETCH_ASSOC);
    $blog_comment_Rows_no = $blog_comment_Rows[0]['no'];

    $sql3 =
        'INSERT INTO `blog_comment_des` (`blog_no`, `blog_comment`) VALUES (:blog_no, :blog_comment)';
    $blog_comment_des = $pdo->prepare($sql3);
    $blog_comment_des->bindValue(':blog_no', $frontInfo[1]);
    $blog_comment_des->bindValue(':blog_comment', $blog_comment_Rows_no);
    $blog_comment_des->execute();

    echo json_encode($frontInfo);
} catch (PDOException $e) {
    //echo "error : " . $e->getMessage();
    $error = ['error' => $e->getMessage()];
    echo json_encode($error);
}
?>

