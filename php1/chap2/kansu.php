<?php
function sayHello($name){
	$aisatu = "こんにちは！{$name}さん";
	return $aisatu;
}

function bmi($height, $mass){ //身長と体重
	$height = $height / 100;
	$mass = $mass / ($height * $height);
	return $mass; // BMI値を返す
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>関数の動作確認</title>
</head>
<body>
<p><?php echo sayHello("やまうちきみゆき"); ?></p>
<p><?php echo sayHello("山田太郎"); ?>
あなたのBMI値は<?php echo bmi(170, 50); ?>です。</p>
	
</body>
</html>
