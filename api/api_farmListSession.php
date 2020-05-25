<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');

session_start();

$listNo = json_decode(file_get_contents("php://input"));

$_SESSION["listNo"] = $listNo;
