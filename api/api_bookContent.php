<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

try {
    require_once("connectDB.php");

    // 計算每個季節有幾筆資料
    $sql = "select `type`, count(*) from `encyclopedia` group by `type`";
    $type = $pdo->prepare($sql);
    $type->execute();
    $typeRows = $item->fetchAll(PDO::FETCH_ASSOC);

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
