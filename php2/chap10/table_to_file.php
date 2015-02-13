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

// 書き出すためにdishes.txtを開く
$fh = fopen('dishes.txt', 'wb');

$q = $db->query("SELECT dish_name, price FROM dishes");
while($row = $q->fetchRow()){
	// 各行を（行末の改行とともに）dishes.txtファイルに書き出す
	fwrite($fh, "The price of $row[0] is $row[1] \n");
}
fclose($fh);

print 'OK!!!';
