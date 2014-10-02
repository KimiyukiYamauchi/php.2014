<?php
// 結果配列を用意する
$uranai[1] = "大吉ですおめでとうございます";
$uranai[2] = "大吉臨時収入があるかもしれません";
$uranai[3] = "大吉です今日は楽しく過ごせるでしょう";
$uranai[4] = "中吉です街に出かけるといいことがあるでしょう";
$uranai[5] = "小吉今日はまったり過ごしてみては";
$uranai[6] = "末吉ですPHPの勉強をするといいことがあるでしょう";
$uranai[7] = "大凶です今日は自宅でゆっくり過ごしてください";

//var_dump($uranai);

// mt_rand()関数の結果を$key変数に記憶
$key = mt_rand(1,7);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>おみくじ</title>
</head>
<body>

<p>あなたが引いたおみくじの結果は、「<?php print $uranai[$key]; ?>」</p>
<!--<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>">もう一度</a>-->
<button onclick="location.reload()">もう一度</button>

</body>
</html>
