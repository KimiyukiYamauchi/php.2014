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

$douken = array( 1 => "北海道", 2 => "青森県", 3 => "岩手県", 47 => "沖縄県");

$pref = "不明";

if(isset($_POST['pref'])){
	$pref = $douken[$_POST['pref']];
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
<li>都道府県：<?php echo $pref; ?></li>
</ul>

<p>
<a href="form.php">フォームに戻る</a>
</p>
	
</body>
</html>
