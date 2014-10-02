<?php
//include("common.php");
require_once 'common.php';

// 結果配列を用意する
$uranai[] = "大吉ですおめでとうございます";
$uranai[] = "大吉臨時収入があるかもしれません";
$uranai[] = "大吉です今日は楽しく過ごせるでしょう";
$uranai[] = "中吉です街に出かけるといいことがあるでしょう";
$uranai[] = "小吉今日はまったり過ごしてみては";
$uranai[] = "末吉ですPHPの勉強をするといいことがあるでしょう";
$uranai[] = "大凶です今日は自宅でゆっくり過ごしてください";

//var_dump($uranai);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>おみくじ</title>
</head>
<body>

<p>あなたが引いたおみくじの結果は、「<?php print select_random($uranai); ?>」</p>
<!--<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>">もう一度</a>-->
<button onclick="location.reload()">もう一度</button>

</body>
</html>
