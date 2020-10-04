<?php
	$c_name = $_POST['c_name'];
	$c_contento = $_POST['c_contento'];
	$c_date = date("y-m-d");
	$thread_id = $_POST['thread_id'];
	
	$dsn = 'mysql:dbname=bbs;host=localhost';
	$user = '';
	$password = '';

    
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "INSERT INTO comment(c_name, c_contento, c_date, thread_id) "
		 . "VALUES(?, ?, ?, ?)";
	
	$data = array($c_name, $c_contento, $c_date, $thread_id);
	

	$rs = $db->prepare($sql);
	$rs->execute($data);
	
	$db = null;
	
	header("location:thread.php?thread_id=".$thread_id);
	