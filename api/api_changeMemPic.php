<?php

if (file_exists("MemPic") == false) {
	mkdir("MemPic"); //make dir
}

$from = $_FILES['file']['tmp_name'];
$to = "MemPic/" . "member" . $_FILES['file']['name']; //   images/7.gif
if (copy($from, $to)) {
	echo "0";
} else {
	echo "1";
}

?>