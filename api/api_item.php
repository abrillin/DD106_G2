<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

try {
    require_once("connectDB.php");

    // $sql = "SELECT * FROM item INNER JOIN item_tag INNER JOIN itemtag_des ON item.no = item_tag.item_no AND item_tag.tag_no = itemtag_des.no ";

    // $member = $pdo->prepare($sql);

    // $member->execute();
    // $memRow = $member->fetchAll(PDO::FETCH_ASSOC);

    // echo json_encode($memRow);
    /*PDO*/

    $sql = "select * from `item`";
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

        // $val['itemRows'] = $itemRows;
    }

    echo json_encode(array('pro' => $itemRows, 'mem' =>  $output));
} catch (PDOException $e) {
    echo "錯誤原因 : ", $e->getMessage(), "\n";
    echo "錯誤行號 : ", $e->getLine(), "\n";
}
