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

// CSVファイルを開く
$fh = fopen('dishes.csv', 'rb');

for($info = fgetcsv($fh, 1024); !feof($fh); $info=fgetcsv($fh, 1024)){
	// $info[0] は料理の名前(dishes.csvの最初のフィールド)
	// $info[1] は値段(2番目のフィールド)
	// $info[2] は辛さ(3番目のフィールド)
	// データベースのテーブルに行を挿入
	$sth = $db->prepare('INSERT INTO ' . 
		'dishes(dish_name, price, is_spicy) VALUES(?,?,?)');
	$sth->execute($info);
	print "Inserted $info[0]<br />\n";
}
// ファイルを閉じる
fclose($fh);
