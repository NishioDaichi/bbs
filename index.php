<?php header("Content-Type:text/html;charset=utf-8"); ?>
<html>
<head>
<meta charset="utf-8">
<title>掲示板</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>THE・KEIZIBAN</h1>

<form method="POST" action="newpage.php">
<input type="submit" value="スレッド新規作成">
<hr>
<p>
<?php

	$dsn = 'mysql:dbname=bbs;host=localhost';
	$user = '';
	$password = '';

    $db = new PDO($dsn, $user, $password);
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "select t_title, t_date, thread_id
			from thread 
			order by thread_id 
			limit 100;";

	$rs = $db->prepare($sql);

	$rs->execute();
	
?>
<?php
while($row = $rs->fetch(PDO::FETCH_ASSOC)){
?>

<p><a href="thread.php?thread_id=<?php print($row['thread_id']); ?>">
<?php 
		 print($row['t_title']);
	     print("  ");
	 	 print($row['t_date']);
?>
</a></p><hr>
<?php
}
?>
</form>
</body>
</html>