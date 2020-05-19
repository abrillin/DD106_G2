<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式
  
session_start();

try{
  require_once("connectDB.php");
  $frontInfo = json_decode(file_get_contents("php://input"));
  // $ec=json_encode($frontInfo);
  // echo $ec;
  $member_no= $_SESSION["member_no"];
  $sql = "INSERT INTO `blog_comment` (`no`, `content`, `status`, `date`, `member_no`) VALUES (NULL, :content, '1', :date1, :member_no)"; 
  $blog = $pdo->prepare($sql);
  $blog->bindValue(":content",$frontInfo->content);
  $blog->bindValue(":date1",$frontInfo->date);
  $blog->bindValue(":member_no",$member_no);
  $blog->execute();
  // $blogRows = $blog->fetchAll(PDO::FETCH_ASSOC);
  // echo json_encode($blogRows);
  

  $sql2 = "select * from blog_comment order by no desc limit 1"; 
  $blog_comment = $pdo->prepare($sql2);
  $blog_comment->execute();
  $blog_comment_Rows = $blog_comment->fetchAll(PDO::FETCH_ASSOC);
  $blog_comment_Rows_no=$blog_comment_Rows[0]["no"];
  echo json_encode($frontInfo);

  
  $sql3 = "INSERT INTO `blog_comment_des` (`blog_no`, `blog_comment`) VALUES (:blog_no, :blog_comment)"; 
  $blog_comment_des = $pdo->prepare($sql3);
  $blog_comment_des->bindValue(":blog_no",$frontInfo->blogNo);
  $blog_comment_des->bindValue(":blog_comment",$blog_comment_Rows_no);
  $blog_comment_des->execute();


  // $sql4 = "select * from blog_comment order by no desc limit 1"; 
  // $blog_comment_des = $pdo->prepare($sql4);
  // $blog_comment_des->bindValue(":blog_no",$frontInfo->blogNo);
  // $blog_comment_des->bindValue(":blog_comment",$blog_comment_Rows_no);
  // $blog_comment_des->execute();

}catch(PDOException $e){
  //echo "error : " . $e->getMessage();
	$error = ["error"=>$e->getMessage()];
	echo json_encode($error);
}
?>

