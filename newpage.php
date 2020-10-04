<?php header("content-type:text/html;charset=UTF-8"); ?>

<html>
<head>
<meta charset="utf-8">
<title>スレッド新規作成</title>
</head>
<body>
<h1>スレッド新規作成</h1>
<form method="POST" action="renewpage.php">
<p>スレッド名  ：<input type="text" name="t_title" size="30"></p>
<p>作成者名    ：<input type="text" name="t_name" size="30"></p>
<p>スレッド内容：<input type="text" name="t_contento" size="30"></p>

<p>
<input type="submit" value="登録">
<input type="reset" value="リセット">
</p>
</form>

</body>
</html>