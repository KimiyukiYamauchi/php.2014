<?php

var_dump($_POST);

$name = $_POST['name'];
$password = $_POST['password'];
$note = nl2br($_POST['note']);

$seibetu = array( 1 => "男性", 2 => "女性", 9 => "回答しない");

$sex = "不明";

if(isset($_POST['sex'])){
	$sex = $seibetu[$_POST['sex']];
}


?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>入力のチェック</title>
</head>
<body>
<ul>
<li>なまえ：<?php echo $name; ?></li>
<li>パスワード：<?php echo $password; ?></li>
<li>備考：<br /><?php echo $note; ?></li>
<li>性別：<?php echo $sex; ?></li>
</ul>

<p>
<a href="form.php">フォームに戻る</a>
</p>
	
</body>
</html>
