<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

try {
    require_once("connectDB.php");
    $itemArr = json_decode(file_get_contents("php://input"));

    $sql = "select s.no, m.name from `item` i join `seller` s on (i.seller_no = s.no) join `member` m on (s.member_no = m.no) where i.no in ($itemArr) group by s.no";

    $itemList = $pdo->prepare($sql);

    $itemList->execute();

    $itemRows = $itemList->fetchAll(PDO::FETCH_ASSOC);

    foreach ($itemRows as $i => $itemRow) {
        $sql = "select i.no, i.name, i.price, i.img from `item` i join `seller` s on (i.seller_no = s.no) join `member` m on (s.member_no = m.no) where s.no = {$itemRow['no']} and i.no in ($itemArr)";

        $sellerItems = $pdo->query($sql);
        $sellerItemRows = $sellerItems->fetchAll(PDO::FETCH_ASSOC);
        $list[$i]["seller"] = $itemRows[$i]["name"];
        $list[$i]["no"] = $itemRows[$i]["no"];
        $list[$i]["item"] = $sellerItemRows;
        $list[$i]["total"] = 0;
    }

    echo json_encode($list);
} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}
