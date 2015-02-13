<?php
require_once 'MDB2.php';

define('USER_NAME', 'penguin');
define('USER_PASS', 'top^hat');
define('HOST_NAME', 'localhost');
define('DB_NAME', 'restaurant');

$dns = 'mysql://' . USER_NAME . ':' . USER_PASS . '@'. HOST_NAME . '/' . DB_NAME;
$db = MDB2::connect($dns);
if(MDB2::isError($db)){die("Can't connect: " . $db->getMessage()); }

// この後のデータベースエラーに関してはメッセージを出力して抜け出す
$db->setErrorHandling(PEAR_ERROR_DIE);

// 書き出すためのCSVファイルを開く
$fh = fopen('dishes2.csv', 'wb');

$dishes = $db->query('SELECT dish_id, dish_name, price, is_spicy FROM dishes');
while($row = $dishes->fetchRow()){
	// fetchRow()からの配列をcsvフォーマットの文字列に変換する
	$line = make_csv_line($row);
	// ファイルに文字列を書き出す。改行は、make_csv_line()がすでに
	// 付いているので、個々では追加する必要はない。
	fwrite($fh, $line);
}
fclose($fh);

function make_csv_line($values){
	// 値に、カンマ、引用符、スペース、タブ(\t)、改行(\n)
	// あるいは、ラインフィード(\r)を含む場合は、引用符で囲み、
	// その内にある引用符は２つの引用符で表す
	foreach($values as $i => $value){
		if((strpos($value, ',') !== false) ||
				(strpos($value, '"') !== false) ||
				(strpos($value, ' ') !== false) ||
				(strpos($value, "\t") !== false) ||
				(strpos($value, "\n") !== false) ||
				(strpos($value, "\r") !== false)){
			$values[$i] = '"' . str_replace('"', '""', $value) . '"';
		}
	}
	// それぞれの値をカンマで連結し、最後に改行をつけて返す
	return implode(',', $values) . "\n";
}
