<?php

if (file_exists("ProductPic") == false) {
	mkdir("ProductPic"); //make dir
}

$array = [];
$from = $_FILES['mainImg']['tmp_name'];
$to = "ProductPic/" . date("UH") . $_FILES['mainImg']['name']; //   images/7.gif
array_splice($array,0,0,$to);
copy($from, $to);


$count = count($_FILES['otherImg']['name']);
for ($i = 0; $i < $count; $i++) {
    $from = $_FILES['otherImg']['tmp_name'][$i];
    $to = "ProductPic/" . date("U") . $_FILES['otherImg']['name'][$i]; //   images/7.gif
    array_splice($array,$i+1,0,$to);
    copy($from, $to);
}
echo json_encode($array);
?>