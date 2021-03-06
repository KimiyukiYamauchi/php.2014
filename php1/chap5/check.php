<?php

function check(){

	$errors = array();

	if(!isset($_POST['name'])){
		$errors['name'] = '名前が入力されていません';
	}elseif(mb_strlen($_POST['name']) == 0){
		$errors['name'] = '名前が入力されていません';
	}elseif(mb_strlen($_POST['name']) > 20){
		$errors['name'] = '名前は20文字以内で入力してください';
	}
		
	// コメントの入力をチェック
	if(!isset($_POST['comment'])){
		$errors['comment'] = 'コメントが入力されていません';
	}elseif(mb_strlen($_POST['comment']) == 0){
		$errors['comment'] = 'コメントが入力されていません';
	}elseif(mb_strlen($_POST['comment']) > 400){
		$errors['comment'] = 'コメントは400文字以内で入力してください';
	}
	return $errors;
}
