<?php
// ホームヘルパー関数のコードをインクルード
require_once 'formhelpers.php';
// show_form()、validate_form()及びprocess_form()
// で、参照するので以下の配列はグローバル宣言する
$main_dishes = array('katsu' => 'カツ丼',
											'ten' => '天丼',
											'oya' => '親子丼',
											'tanin' => '他人丼',
											'soba' => '沖縄そば',
											'maku' => '幕の内');

$sweets = array('cue' => 'シュークリーム',
								'sho' => 'ショートケーキ',
								'mon' => 'モンブラン',
								'cho' => 'チョコレートケーキ');


// フォームがサブミットされたときに何かをする
function process_form(){
	print "Hello, ". $_POST['my_name'];
}

// フォームを表示
function show_form($errors = ''){
	global $main_dishes;

	// フォームがサブミットされたら、
	// サブミットされたパラメータからデフォルト値を取得
	if(isset($_POST['_submit_check']) && $_POST['_submit_check'] == 1){
		$defaults = $_POST;
	}else{
		$defaults = array();
		$defaults['my_name'] = '';
		$defaults['email'] = '';
		$defaults['age'] = '';
		$defaults['order'] = 'cue';
		$defaults['main_dish'] = array('katsu');
		$defaults['delivery'] = 'yes';
		$defaults['size'] = 'medium';
	}

	// 何かエラーが渡されると、それを出力
	if($errors){
		$error_text = '<tr><td>エラーを修正してください:';
		$error_text .= '</td><td><ul><li>';
		$error_text .=  implode('</li><li>', $errors);
		$error_text .= '</li></ul></td></tr>';
	}else{
		// エラーがなければ、$error_textはブランクにする
		$error_text = '';
	}
?>

<form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
<table>
<?php print $error_text; ?>

<tr>
<td>Your name:</td> 
<td><?php input_text('my_name', $defaults); ?></td>
</tr>

<tr>
<td>メールアドレス：</td>
<td><input type="text" name="email" value="<?php echo h($defaults['email']); ?>"></td>
</tr>

<tr>
<td>年齢：</td>
<td><input type="text" name="age" size="2" value="<?php echo h($defaults['age']); ?>"></td>
</tr>

<tr>
<td>料理を選択してくください（複数選択可）：</td>
<td>
<select name="main_dish[]" multiple="multiple">
<?php
$selected_options = array();
foreach($defaults['main_dish'] as $option){
	$selected_options[$option] = true;
}

// <option>タグを出力
foreach($main_dishes as $option => $label){
	print '<option value="' . h($option) . '"';
	if(array_key_exists($option, $selected_options)){
		print ' selected="selected"';
	}
	print '>' . h($label) . '</option>';
	print "\n";
}
?>
</select>
</td>
</tr>

<tr>
<td>デザートを選択してください:</td>
<td>
<select name="order">
<?php
foreach($GLOBALS['sweets'] as $key => $choice){
	print "<option value=\"" . $key . '"';
	if($key == $defaults['order']){
		print ' selected="selected"';
	}
	print ">$choice</option>\n";
}
?>
</select>
</td>
</tr>

<tr>
<td colspan="2" align="center"><input type="submit" value="Say Hello"></td>
</tr>

</table>

<input type="hidden" name="_submit_check" value="1">
</form>

<?php
}

function validate_form(){
	// エラーメッセージを格納する配列を初期化
	$errors = array();

	// 名前が短すぎる場合のチェック
	if(mb_strlen($_POST['my_name']) < 3){
		$errors[] = '名前は３文字以上で入力してください';
	}

	// メールアドエレスが入力されているかチェック
	if(strlen($_POST['email']) == 0){
		$errors[] = 'メールアドレスを入力してください';
	}elseif(!preg_match('/^[^@\s]+@([-a-z0-9]+\.)+[a-z]{2,}$/i', $_POST['email'])){
		$errors[] = '正しいメールアドレスを入力してください';
	}

	// 整数チェック
	if($_POST['age'] != strval(intval($_POST['age']))){
		$errors[] = '年齢は数値で入力してください';
	}elseif($_POST['age'] <18 || $_POST['age'] > 65){
		$errors[] = '年齢は１８歳以上６５歳以下で入力してください';
	}

	// orderでの選択のチェック
	if(!array_key_exists($_POST['order'], $GLOBALS['sweets'])){
		$errors[] = 'メニューから選択してください';
	}

	// エラーメッセージの配列（エラーがなければ空）を返す
	return $errors;
}
/*
function h($str){
	return htmlentities($str, ENT_QUOTES, 'UTF-8');
}
 */
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>フォームのひな形</title>
</head>
<body>

<?php

// メインページのロジック：
// - フォームがサブミットされた場合は検証して処理、
// - サブミットされなかった場合はフォームを表示
if(array_key_exists('_submit_check', $_POST)){
	// サブミットされたデータが正しければ、それを処理
	if($form_erros = validate_form()){
		show_form($form_erros); // フォームを再表示
	}else{
		process_form(); // 処理を実行
	}
}else{
	// サブミットされていなければフォームを表示
	show_form(); // フォームを表示
}


?>
	
</body>
</html>
