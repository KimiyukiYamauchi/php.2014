<?php

//require_once('config.php');

//var_dump($_POST);

if(!isset($_POST['submit'])){
	$host = $_SERVER['SERVER_NAME'];
	$url = $_SERVER['SCRIPT_NAME'];
	$url = str_replace("check.php", "form.php", $url);

	//var_dump($host);

	header("location: http://{$host}{$url}" );
//	header("location: " . FORM_URL);
}

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

$syumi = array( 1 => "ネット", 2 => "読書", 3 => "ショッピング", 4 => "サイクリング", 5 => "投資");

$hobbys[] = "不明";

if(isset($_POST['hobby'])){
	$hobbys = array();
	foreach($_POST['hobby'] as $hobby){
		$hobbys[] = $syumi[$hobby];
	}
}

//var_dump($hobbys);

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
<li>趣味：<br />
<?php
$shumi_kaji = '<ul><li>';
$shumi_kaji .= implode('</li><li>', $hobbys);
$shumi_kaji .= '</li></ul>';
echo $shumi_kaji;
?>
</li>
</ul>

<p>
<a href="form.php">フォームに戻る</a>
</p>
	
</body>
</html>
