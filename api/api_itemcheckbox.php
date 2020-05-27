<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

session_start();

try {
    require_once("connectDB.php");
    $frontInfo = json_decode(file_get_contents("php://input"));

    /*PDO*/

    $_SESSION["key"] = $frontInfo;

    if ($_SESSION["key"] == 0) {
        $sql = "SELECT * FROM item i join item_tag t on i.no = t.item_no  WHERE t.tag_no = 21";
    } else if ($_SESSION["key"] == 1) {
        $sql = "SELECT * FROM item i join item_tag t on i.no = t.item_no  WHERE t.tag_no = 22";
    } else if ($_SESSION["key"] == 2) {
        $sql = "SELECT * FROM item i join item_tag t on i.no = t.item_no  WHERE t.tag_no = 23";
    };


    $item = $pdo->prepare($sql);
    $item->execute();
    $itemRows = $item->fetchAll(PDO::FETCH_ASSOC);

    foreach ($itemRows as $i => $itemRow) {
        $sql = "select * from `item_tag` t join `itemtag_des` d on t.tag_no = d.no
        where t.item_no={$itemRow["no"]}";
        $tag = $pdo->query($sql);
        $tagRows = $tag->fetchAll(PDO::FETCH_ASSOC);
        $itemRows[$i]["tags"] = $tagRows;
    }


    $sql2 = "SELECT  member.name, seller.review_total, seller.review_count, member.img 
    from seller INNER JOIN member on seller.member_no = member.no ";
    $seller = $pdo->prepare($sql2);
    $seller->execute();
    $output = $seller->fetchAll(PDO::FETCH_ASSOC);
    foreach ($output as $key => $val) {
        $total = (int)  $val['review_total'];
        $count = (int)  $val['review_count'];
        $val['Starsaverage'] = $total / $count;
    }

    echo json_encode(array('pro' => $itemRows, 'mem' =>  $output, 'key' =>  $_SESSION["key"]));
} catch (PDOException $e) {
    echo "錯誤原因 : ", $e->getMessage(), "\n";
    echo "錯誤行號 : ", $e->getLine(), "\n";
}
