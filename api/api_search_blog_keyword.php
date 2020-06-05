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
        "SELECT b.content,b.content2,b.date,b.img,b.no,b.title,m.nick,m.img m_img,s.review_total,s.review_count FROM blog b JOIN seller s ON b.seller_no=s.no JOIN member m ON s.member_no=m.no WHERE (b.content LIKE '%$frontInfo%' OR b.content2 LIKE '%$frontInfo%' OR b.title LIKE '%$frontInfo%' OR m.nick LIKE '%$frontInfo%') AND b.status=1;";
    $blog = $pdo->prepare($sql);
    // $blog->bindValue(':keyword', $frontInfo);
    $blog->execute();
    $result1 = $blog->fetchAll(PDO::FETCH_ASSOC);

    // $sql2 = 'select * from blog_comment order by no desc limit 1';
    // $blog_comment = $pdo->prepare($sql2);
    // $blog_comment->execute();
    // $blog_comment_Rows = $blog_comment->fetchAll(PDO::FETCH_ASSOC);
    // $blog_comment_Rows_no = $blog_comment_Rows[0]['no'];

    // $sql3 =
    //     'INSERT INTO `blog_comment_des` (`blog_no`, `blog_comment`) VALUES (:blog_no, :blog_comment)';
    // $blog_comment_des = $pdo->prepare($sql3);
    // $blog_comment_des->bindValue(':blog_no', $frontInfo[1]);
    // $blog_comment_des->bindValue(':blog_comment', $blog_comment_Rows_no);
    // $blog_comment_des->execute();

    echo json_encode($result1);
} catch (PDOException $e) {
    //echo "error : " . $e->getMessage();
    $error = ['error' => $e->getMessage()];
    echo json_encode($error);
}
?>

