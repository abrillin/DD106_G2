<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

session_start();
try {
    require_once("connectDB.php");
    $frontInfo = json_decode(file_get_contents("php://input"));

    //賣家資訊
    // $sql = "SELECT seller.content, member.name, seller.review_total, seller.review_count, member.img,seller.review_total / seller.review_count AS review_average FROM seller INNER JOIN member on seller.member_no = member.no INNER JOIN item; ";
    // $member = $pdo->prepare($sql);
    // $member->execute();
    // $output = $member->fetch(PDO::FETCH_ASSOC);


    //隨機抓取資料庫6筆商品資料呈現至輪播
    $sql2 = "SELECT * FROM `item` ORDER BY RAND() limit 6";
    // $sql = "select * from `item_tag` t join `itemtag_des` d on t.tag_no = d.no where t.item_no={$itemRow["no"]}";
    $mem = $pdo->prepare($sql2);
    $mem->execute();
    $items = $mem->fetchAll(PDO::FETCH_ASSOC);
    $output['items'] = $items;


    //接收商品主頁點選商品的編號傳送該商品資訊至商品內頁呈現
    // $sql3 = "SELECT * from `item` where `no` = :itemNo";
    $sql3 = "SELECT i.name iname, i.no, i.price, m.nick, m.name,m.img,i.description,i.infor,s.content, s.review_total / s.review_count average
    FROM item i 
    join member m 
    join seller s
    on i.seller_no = m.no and i.seller_no = s.no
    where i.no = :itemNo";
    $get_item_content = $pdo->prepare($sql3);
    $get_item_content->bindValue(":itemNo", $_SESSION["itemNo"]);
    $get_item_content->execute();
    $get_item_content = $get_item_content->fetchAll(PDO::FETCH_ASSOC);


    echo json_encode(array('itemContent' => $get_item_content, 'mem' =>  $output));
} catch (PDOException $e) {
    // echo "錯誤原因 : ", $e->getMessage(), "<br>";
    // echo "錯誤行號 : ", $e->getLine(), "<br>";
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}
