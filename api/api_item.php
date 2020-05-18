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

    echo json_encode($itemRows);
} catch (PDOException $e) {
    echo "錯誤原因 : ", $e->getMessage(), "\n";
    echo "錯誤行號 : ", $e->getLine(), "\n";
}
