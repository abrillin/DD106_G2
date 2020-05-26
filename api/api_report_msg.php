<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

session_start();

try {
  require_once("connectDB.php");
  $frontInfo = json_decode(file_get_contents("php://input"));

  $sql = "select * from `report_comment` where whistleblower_no = :no and com_no = :comNo";
  $select_blog_content = $pdo->prepare($sql);
  $select_blog_content->bindValue(":no", $_SESSION["member_no"]);
  $select_blog_content->bindValue(":comNo", $frontInfo->bc_no);
  $select_blog_content->execute();

  $selectRow = $select_blog_content->fetch(PDO::FETCH_ASSOC);

  if ($selectRow) {

    echo "1";
  } else {

    $sql = "INSERT INTO `report_comment` (`no`, `reason`, `whistleblower_no`, `name`, `date`, `com_no`, `status`) VALUES (NULL, :reason, :whistleblower_no, :name1, :date1, :com_no, 0)";
    $get_blog_content = $pdo->prepare($sql);
    $get_blog_content->bindValue(":reason", $frontInfo->reason);
    $get_blog_content->bindValue(":whistleblower_no", $_SESSION["member_no"]);
    $get_blog_content->bindValue(":name1", $_SESSION["member_name"]);
    $get_blog_content->bindValue(":date1", $frontInfo->date);
    $get_blog_content->bindValue(":com_no", $frontInfo->bc_no);
    $get_blog_content->execute();
  }


  // $get_blog_content = $get_blog_content->fetchAll(PDO::FETCH_ASSOC); 
  // echo json_encode(123);
} catch (PDOException $e) {
  //echo "error : " . $e->getMessage();
  $error = ["error" => $e->getMessage()];
  echo json_encode($error);
}
