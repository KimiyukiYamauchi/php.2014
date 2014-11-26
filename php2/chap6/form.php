<?php
// フォームがサブミットされたときに何かをする
function process_form(){
	print "Hello, ". $_POST['my_name'];
}

// フォームを表示
function show_form(){
?>

<form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
Your name: <input type="text" name="my_name">
<br />
<input type="submit" value="Say Hello">
<input type="hidden" name="_submit_check" value="1">
</form>

<?php
}

function validate_form(){
	// my_nameの長さは少なくとも３文字あるか？
	if(mb_strlen($_POST['my_name']) < 3){
		return false;
	}else{
		return true;
	}
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>フォームのひな形</title>
</head>
<body>

<?php

// サブミットされたフォームパラメータをベースに
// なすべきことをするロジック
if(array_key_exists('_submit_check', $_POST)){ // サブミットされた?
	if(validate_form()){ // $_POSTのチェック
		process_form(); // 処理を実行
	}else{
		show_form(); // フォームを再表示
	}
}else{
	show_form(); // フォームを表示
}

?>
	
</body>
</html>
