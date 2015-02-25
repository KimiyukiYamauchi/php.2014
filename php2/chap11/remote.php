<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>RSSリーダーもどき</title>
</head>
<body>
<?php
$page = file_get_contents('http://localhost/wp/feed/');
$xml = simplexml_load_string($page);
print "<dl>\n";
foreach($xml->channel->item as $item){
	print "<dt><a href='$item->link'>$item->title</a></dt>\n";
	print "<dd>$item->description</dd>";
}
print "</dl>\n";
?>
</body>
</html>
