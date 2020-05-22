<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式
  
session_start();

try{
  require_once("connectDB.php");
  // $frontInfo = json_decode(file_get_contents("php://input"));
  // $ec=json_encode($frontInfo);
  // echo $ec;
  $sql = "select * from `blog`"; 
  $blog = $pdo->prepare($sql);
  $blog->execute();
  $blogRows = $blog->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($blogRows);

  


  






}catch(PDOException $e){
  //echo "error : " . $e->getMessage();
	$error = ["error"=>$e->getMessage()];
	echo json_encode($error);
}
?>

