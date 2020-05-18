<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

try {
    require_once("connectDB.php");

    $sql = "SELECT seller.content, member.name, seller.review_total, seller.review_count, member.img from seller INNER JOIN member on seller.member_no = member.no INNER JOIN item; ";
    $sql2 = "SELECT * FROM `item` ORDER BY RAND() limit 6";

    $member = $pdo->prepare($sql);
    $member->execute();
    $output = $member->fetch(PDO::FETCH_ASSOC);

    $mem = $pdo->prepare($sql2);
    $mem->execute();
    $items = $mem->fetchAll(PDO::FETCH_ASSOC);


    $total = (int) $output['review_total'];
    $count = (int) $output['review_count'];
    $output['Starsaverage'] = $total / $count;
    $output['items'] = $items;

    echo json_encode($output);
} catch (PDOException $e) {
    // echo "錯誤原因 : ", $e->getMessage(), "<br>";
    // echo "錯誤行號 : ", $e->getLine(), "<br>";
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}
