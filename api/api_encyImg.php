<?php

if (file_exists("encyImg") == false) {
	mkdir("encyImg"); //make dir
}

$from = $_FILES['file']['tmp_name'];
$to = "encyImg/" . "encyEdit" . $_FILES['file']['name']; //   images/7.gif
if (copy($from, $to)) {
	echo "0";
} else {
	echo "1";
}

?>