<?php 
try {
    require_once("connectDB.php");
    
	$sql = "select * from `encyclopedia`";
	$encyEdit = $pdo->query($sql);
    $encyEditInfo = $encyEdit->fetchAll(PDO::FETCH_ASSOC);
    $encyEdit->execute();

    echo json_encode($encyEditInfo);
    
} catch (PDOException $e) {

    $error = ["error" => $e->getMessage()]; // 這裡的"error"是function
    echo json_encode($error);
}
?>