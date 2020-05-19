<?php 
try {
    require_once("connectDB.php");

    $addAdminInfo = json_decode(file_get_contents("php://input"));
    // 使用file_get_contents獲取php://input內容，由json檔轉為物件/陣列
    // 前面表單輸入進來的資料會在以下被處理
    
	$sql = "insert into `admin` (`no`, `name`, `acc`, `psw`, `status`) values(null, :name, :acc, :psw, '0')";
    // $addAdmin = $pdo->query($sql);
    $addAdmin = $pdo->prepare($sql);
    $addAdmin -> bindValue(":name", $addAdminInfo->name);
    $addAdmin -> bindValue(":acc", $addAdminInfo->acc);
    $addAdmin -> bindValue(":psw", $addAdminInfo->psw);
    $addAdmin-> execute();

    // 跑sql既有資料，看acc是否有重複
    if ($addAdmin->rowCount() == 0) { // 成功新增0筆嗎？
        echo "0"; // 新增 失敗
    } else {
        echo "1";  // 新增成功
    }
    
    
    // $no = $pdo->lastInsertId();
    
    // echo json_encode($addAdminInfo); // 以上處理完後，將物件轉json檔
    
} catch (PDOException $e) {
   echo "錯誤原因 : ", $e->getMessage(), "<br>";
   echo "錯誤行號 : ", $e->getLine(), "<br>";	
}
