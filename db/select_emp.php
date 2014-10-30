<?php
require_once 'MDB2.php';

$user = 'test'; // ユーザ名
$pass = 'pass'; // パスワード
$dbname = 'testphp'; // データベース名

// データベースへの接続
$db = MDB2::connect("mysql://$user:$pass@localhost/$dbname");

// 失敗するとエラーメッセージを表示して終了
if(MDB2::isError($db)){ die("Can't connect: " . $db->getMessage()); }

// ここまで来たら、接続成功
echo '接続成功<br />';

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>データベース接続</title>
</head>
<body>
	
</body>
</html>
