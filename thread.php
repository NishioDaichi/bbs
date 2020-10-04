<?php header("content-type:text/html;charset=UTF-8"); ?>
<?php
	$dsn = 'mysql:dbname=bbs;host=localhost';
	$user = '';
	$password = '';

    $db = new PDO($dsn, $user, $password);
	
	
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	$sql = "select thread_id, t_title, t_date, t_name, t_contento
			from thread 
			where thread_id = ? ;";
			
	
	$date = array($_GET['thread_id']);
	
	$rs = $db->prepare($sql);
	$rs->execute($date);
	
?>
<html>
<head>
<title>スレッド</title>
</head>
<body>

<?php while($row = $rs->fetch(PDO::FETCH_ASSOC)){ ?>
<h1><?php print($row['t_title']); ?></h1>

	
		<p>スレッド名</p>
		<?php print($row['t_title']); ?>
		<p>作成日時</p>
		<?php print($row['t_date']); ?>
		<p>作者名</p>
		<?php print($row['t_name']); ?>
		<p>スレッド内容</p>
		<?php print($row['t_contento']); ?>

<?php } ?>
<hr>




<h2>コメント</h2>
<form method="POST" action="writecomment.php">
<p>投稿者名：<input type="text" name="c_name" size="30"></p>
<p>コメント：<input type="text" name="c_contento" size="30"></p>
<input type="hidden" name="thread_id" value="<?php print($_GET['thread_id']); ?>">

<p>
<input type="submit" value="書き込む">
<input type="reset" value="リセット">
<hr>




<h2>コメント欄</h2>
<?php
	
	
	$db = new PDO($dsn, $user, $password);
	
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$sql = "select c_name, c_date, c_contento
			from comment
			where thread_id = ? ;";
	
	$date2 = array($_GET['thread_id']);
	
	$rs2 = $db->prepare($sql);
	
	$rs2->execute($date2);


	$db = new PDO($dsn, $user, $password);
	
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$sql = "select thread_id,count(*) as num
			from comment
			where thread_id = ? ;";
	
	$date3 = array($_GET['thread_id']);
	
	$rs3 = $db->prepare($sql);
	
	$rs3->execute($date3);

?>
<?php while($row = $rs2->fetch(PDO::FETCH_ASSOC)) { ?>


		<p><?php print($row['c_name']); ?>さん   :
			<?php print($row['c_contento']); ?>:
			<?php print($row['c_date']); ?></p>
	
<?php } ?>

<?php while($row = $rs3->fetch(PDO::FETCH_ASSOC)) { ?>
<p>総コメント数<?php print($row['num']); ?></p>
<?php } ?>

</body>
</head>
</html>
