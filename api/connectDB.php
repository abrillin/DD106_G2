<?php
<<<<<<< HEAD
	$dsn = "mysql:host=localhost;port=8889;dbname=dd106g2;charset=utf8";
	$user = "root";
	$password = "root";
=======
	$dsn = "mysql:host=localhost;port=3306;dbname=dd106g2;charset=utf8";
	$user = "dd106g2";
	$password = "dd106g2";
>>>>>>> 186eee51b3203cc1d5700d671273f1ccf9f1d049
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO( $dsn, $user, $password, $options);  
?>