<?php 
try {
    require_once("connectDB.php");
    
	$sql = "select s.no, m.acc, m.name, m.phone, m.email, s.status from `member` m join `seller` s ON(s.member_no=m.no)";
	$seller = $pdo->query($sql);
    $sellerInfo = $seller->fetchAll(PDO::FETCH_ASSOC);
    $seller->execute();

    echo json_encode($sellerInfo);
    
} catch (PDOException $e) {
   echo "錯誤原因 : ", $e->getMessage(), "<br>";
   echo "錯誤行號 : ", $e->getLine(), "<br>";	
}	
?>