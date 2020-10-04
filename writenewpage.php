<?php
	$t_title = $_POST['t_title'];
	$t_name = $_POST['t_name'];
	$t_contento = $_POST['t_contento'];
	$t_date = date("y-m-d");
	
	$dsn = 'mysql:dbname=bbs;host=localhost';
	$user = '';
	$password = '';



    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
	$sql = "INSERT INTO thread(t_title, t_name, t_contento, t_date) "
		 . "VALUES(?, ?, ?, ?)";
	
	$data = array($t_title, $t_name, $t_contento, $t_date);
	
	
	$rs = $db->prepare($sql);
	
	$rs->execute($data);
	
	$db = null;
	
	header("location:index.php");
	