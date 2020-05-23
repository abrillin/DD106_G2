<?


if (file_exists("encyPic") == false) {
	mkdir("encyPic"); //make dir
}

$array = [];

$count = count($_FILES['encyPic01']['name']);
for ($i = 0; $i < $count; $i++) {
    $from = $_FILES['encyPic01']['tmp_name'][$i];
    $to = "encyPic/" . date("U") . $_FILES['encyPic01']['name'][$i]; //   images/7.gif
    array_splice($array,0,0,$to);
    copy($from, $to);
}

echo json_encode($array);
?>