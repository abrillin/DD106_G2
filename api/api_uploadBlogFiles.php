<?php

if (file_exists("BlogPic") == false) {
	mkdir("BlogPic"); //make dir
}

$from = $_FILES['mainImg']['tmp_name'];
$to = "BlogPic/" . date("UH") . $_FILES['mainImg']['name']; //   images/7.gif
if (copy($from, $to)) {
	// echo "0";
	echo json_encode([0=>"0",1=>$to]);
} else {
	echo "1";
}

$count = count($_FILES['otherImg']['name']);
for ($i = 0; $i < $count; $i++) {
    $from = $_FILES['otherImg']['tmp_name'][$i];
    $to = "BlogPic/" . date("U") . $_FILES['otherImg']['name'][$i]; //   images/7.gif
    $from = $_FILES['otherImg']['tmp_name'][$i];
    $to = "BlogPic/" . date("U") . $_FILES['otherImg']['name'][$i]; //   images/7.gif
    $from = $_FILES['otherImg']['tmp_name'][$i];
    $to = "BlogPic/" . date("U") . $_FILES['otherImg']['name'][$i]; //   images/7.gif
}




if (copy($from, $to)) {
	// echo "0";
	echo json_encode($_FILES);
} else {
	echo "1";
}

?>