<?php 
try {
    require_once("connectDB.php");
    
	$sql = "select * from `member`";
	$member = $pdo->query($sql);
    $memberInfo = $member->fetchAll(PDO::FETCH_ASSOC);
    $member->execute();

    echo json_encode($memberInfo);
    
} catch (PDOException $e) {
   echo "錯誤原因 : ", $e->getMessage(), "<br>";
   echo "錯誤行號 : ", $e->getLine(), "<br>";	
}	
?>