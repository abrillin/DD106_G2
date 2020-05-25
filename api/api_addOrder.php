<?php
header('Access-Control-Allow-Origin:*'); //允許所有來源訪問
header('Access-Control-Allow-Method:POST,GET'); //允許POST、GET訪問方式

session_start();
try {
    require_once("connectDB.php");

    $info = json_decode(file_get_contents("php://input"));

    $sql =
        "insert into `orderMaster` (`no`, `member_no`, `seller_no`, `total`, `date`, `name`, `address`, `phone`, `transport`, `review`, `status`, `payment_status`) values(null, :member_no, :seller_no, :total, :date, :name, :address, :phone, :transport, 0, 0, 0)";

    $order = $pdo->prepare($sql);

    $total = 0;

    foreach ($info->detail as $i => $sub) {

        $total += $sub->price * $sub->amount;
    }

    $order->bindValue(":member_no", $_SESSION["member_no"]);
    $order->bindValue(":seller_no", $info->no);
    $order->bindValue(":total", $total);
    $order->bindValue(":date", date("Y-m-d"));
    $order->bindValue(":name", $info->info->name);
    $order->bindValue(":address", $info->info->add);
    $order->bindValue(":phone", (int) $info->info->phone);
    $order->bindValue(":transport", $info->info->transport);
    $order->execute();

    if ($order->rowCount() == 0) {

        echo "0";
    } else {
        $sql = "select no from `orderMaster` order by no DESC LIMIT 1";
        $no = $pdo->prepare($sql);
        $no->execute();
        $no = $no->fetch(PDO::FETCH_ASSOC);

        foreach ($info->itemNo as $i => $noRow) {
            $sql = "insert into `detail` (`item_no`, `order_no`, `price`, `amount`) values(:no, :orderNo, :price, :amount)";
            $detail = $pdo->prepare($sql);

            $detail->bindValue(":no", $info->itemNo[$i]);
            $detail->bindValue(":orderNo", $no['no']);
            $detail->bindValue(":price", $info->detail[$i]->price);
            $detail->bindValue(":amount", $info->detail[$i]->amount);
            $detail->execute();
        }

        echo "1";
    }
} catch (PDOException $e) {
    $error = ["error" => $e->getMessage()];
    echo json_encode($error);
}
