<?php 
try {
    require_once("connectDB.php");
    
	$sql = "select * from `admin`";
	$admin = $pdo->query($sql);
    $adminInfo = $admin->fetchAll(PDO::FETCH_ASSOC);
    $admin->execute();

    echo json_encode($adminInfo);
    
} catch (PDOException $e) {

    $error = ["error" => $e->getMessage()]; // 這裡的"error"是function
    echo json_encode($error);
}
?>