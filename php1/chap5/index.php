<?php

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ひよこ掲示板</title>
<style>
p {
	padding: 5px;
	margin-left: 50px;
}
div.content {
	border-top: 1px dashed #555;
	margin-top: 10px;
}
</style>
</head>
<body>
<h1>ひよこ掲示板</h1>
<form action="">
名前<br />
<input type="text" name="name" value="" size="24"><br />
コメント<br />
<textarea name="comment" cols="40" rows="3"></textarea><br />
<input type="submit" name="submit" value="書き込み"><br />
</form>
<?php

?>
<div class="content">
<span class="id">11</span>
<span class="name">名前：山内</span>
<span class="time">2014年10月15日 19:38:00</span>
<p class="comment">コメント１行目<br />コメント２行目<br />コメント３行目</p>
</div>
<?php

?>
</body>
</html>
