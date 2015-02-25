<?php
require_once 'MDB2.php';
require_once 'formhelpers.php';

define('USER_NAME', 'penguin');
define('USER_PASS', 'top^hat');
define('HOST_NAME', 'localhost');
define('DB_NAME', 'restaurant');

$dns = 'mysql://' . USER_NAME . ':' . USER_PASS . '@'. HOST_NAME . '/' . DB_NAME;
$db = MDB2::connect($dns);
if(MDB2::isError($db)){die("Can't connect: " . $db->getMessage()); }

// この後のデータベースエラーに関してはメッセージを出力して抜け出す
$db->setErrorHandling(PEAR_ERROR_DIE);

// フェッチモードを文字列キー配列に変更
$db->setFetchMode(MDB2_FETCHMODE_ASSOC);

print "<dishes>\n";
$q = $db->query(
	"SELECT dish_id, dish_name, price FROM dishes WHERE is_spicy = 1");
while($row = $q->fetchRow()){
	print '<dish id="' . h($row['dish_id']) . '">' . "\n";
	print '<name>' . h($row['dish_name']) . "</name>\n";
	print '<price>' . h($row['price']) . "</price>\n";
	print "</dish>\n";
}
print '</dishes>';
