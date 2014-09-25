<?php
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
<?php

//var_dump($_POST);

if(isset($_POST['_submit_check'])){

//$bmi = bmi(170, 50);
//$bmi = bmi(166, 80);
//$bmi = bmi(166, 60);
	$bmi = bmi($_POST['height'], $_POST['mass']);

$bmi = round($bmi, 1);

print "BMI値は{$bmi}で、";
?>

<?php if($bmi < 18.5): ?>
やせ過ぎです
<?php endif; ?>
<?php if ($bmi > 25) : ?>
太り過ぎです
<?php else : ?>
標準です
<?php endif; ?>

<?php }else{ ?>

	<form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
身長：
  <input type="text" name="height">
<br />体重：
  <input type="text" name="mass">
<br />
  <input type="submit" value="BMI値計算">
  <input type="hidden" name="_submit_check" value="1">
</form>
<?php } ?>
</body>
</html>
