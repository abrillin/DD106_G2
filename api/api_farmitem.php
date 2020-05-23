<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式
try {
    // 登入DB
    require_once("connectDB.php");

    // 操作DB
    $sql = "select `no` from `item` order by `no` DESC limit 1";
    $no = $pdo->prepare($sql);
    $no->execute();
    $nono = $no->fetch(PDO::FETCH_ASSOC);
    

    $sql2= "select * from `itemtag_des`";
    $tags = $pdo->prepare($sql2);
    $tags->execute();
    $product = $tags->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([0=>$nono,1=>$product]);
    
   
 
} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}
?>