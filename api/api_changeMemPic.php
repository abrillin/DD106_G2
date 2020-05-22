<?php

if (file_exists("MemPic") == false) {
	mkdir("MemPic"); //make dir
}

$from = $_FILES['file']['tmp_name'];
$to = "MemPic/" . date("U") . $_FILES['file']['name']; //   images/7.gif
if (copy($from, $to)) {
	// echo "0";
	echo json_encode([0=>"0",1=>$to]);
} else {
	echo "1";
}

?>