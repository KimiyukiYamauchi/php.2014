<?php

//var_dump($_POST);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>フォームの練習</title>
</head>
<body>
<form action="check.php" method="post">

名前<br />
<input type="text" name="name"><br />
パスワード<br />
<input type="password" name="password"><br />
備考<br />
<textarea name="note" cols="40" rows="5">
</textarea><br />

<input type="submit" value="データ送信">
</form>
</body>
</html>
