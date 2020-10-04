<?php header("content-type:text/html;charset=UTF-8"); ?>
<?php

$t_title = $_POST['t_title'];
$t_name = $_POST['t_name'];
$t_contento = $_POST['t_contento'];
?>

<html>
<head>
<meta charset="utf-8">
<title>確認</title>
</head>
<body>
<h1>確認</h1>

<p>スレッド名  ：<?php print($t_title); ?></p>
<p>作成者名    ：<?php print($t_name); ?></p>
<p>スレッド内容：<?php print($t_contento); ?></p>

お間違いありませんか？

<p><form method="POST" action="writenewpage.php">
<input type="hidden" name="t_title" value="<?php print($t_title); ?> ">
<input type="hidden" name="t_name" value="<?php print($t_name); ?> ">
<input type="hidden" name="t_contento" value="<?php print($t_contento); ?> ">
<input type="submit" value="登録">
</form>

<form method="POST" action="newpage.php">
<input type="hidden" name="t_title" value="<?php print($t_title); ?> ">
<input type="hidden" name="t_name" value="<?php print($t_name); ?> ">
<input type="hidden" name="t_contento" value="<?php print($t_contento); ?> ">
<input type="submit" value="戻る">
</form></p>
</body>
</html>