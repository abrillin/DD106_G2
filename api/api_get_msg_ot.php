<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式
  
session_start();

try{
  require_once("connectDB.php");
  $frontInfo = json_decode(file_get_contents("php://input"));
  $_SESSION["blogNo"]=$frontInfo;
  // echo json_encode(["no"=>$_SESSION["blogNo"]]);
  
  // echo 123;

// if (isset($_SESSION["member_no"])) {
//   $member_no= $_SESSION["member_no"];
// }else{
//   $member_no=null;
// }


  //撈出留言
  //撈出留言
  //撈出留言

  // $sql4 = "SELECT b.no,m.img,m.nick,bc.date,bc.content,m.no,bc.no bc_no from blog b JOIN blog_comment_des bcd ON b.no=bcd.blog_no JOIN blog_comment bc ON bcd.blog_comment=bc.no JOIN member m ON m.no=bc.member_no where b.no=:blogNo AND bc.status=1 order by date;"; 
  // $get_blog_comment = $pdo->prepare($sql4);
  // $get_blog_comment->bindValue(":blogNo",$frontInfo);
  
  // $get_blog_comment->execute();
  // $get_blog_comment_rows = $get_blog_comment->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($frontInfo);




}catch(PDOException $e){
  //echo "error : " . $e->getMessage();
	$error = ["error"=>$e->getMessage()];
	echo json_encode($error);
}
?>

