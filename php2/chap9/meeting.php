<?php
require_once 'formhelpers.php';

$months = array( 1 => 'January', 2 => 'February', 3 => 'March',
								4 => 'April', 5 => 'May', 6 => 'June',
								7 => 'July', 8 => 'August', 9 => 'September',
								10 => 'October', 11 => 'November', 12 => 'December');

$days = array();
for($i=1; $i<=31; $i++){ $days[$i] = $i; }

$years = array();
for($year = date('Y') - 1, $max_year = date('Y') +5; $year < $max_year; $year++){
	$years[$year] = $year;
}

$hours = array();
for($hour = 1; $hour <= 12; $hour++){
	$hours[$hour] = $hour;
}

$minutes = array();
for($minute = 0; $minute < 60; $minute+=5){
	$formatted_minute = sprintf('%02d', $minute);
	$minutes[$formatted_minute] = $formatted_minute;
}

if(isset($_POST['_submit_check'])){
	// validate_form()がエラーを返した場合は、それを、show_form()へ渡す
	if($form_errors = validate_form()){
		show_form($form_errors);
	}else{
		// サブミットされたデータが妥当であれば、それを処理する
		process_form();
	}
}else{
	// サブミットされていなければフォームの表示
	show_form();
}

function show_form($errors = ''){
	global $hours, $minutes, $months, $days, $years;

	// フォームがサブミットされたら、サブミットされた値からデフォルトを得る
	if(isset($_POST['_submit_check'])){
		$defaults = $_POST;
	}else{
		// それ以外は、デフォルトを設定する：現在の時刻と日付
		$defaults = array('hour' => date('g'),
											'ampm' => date('a'),
											'month' => date('n'),
											'day' => date('j'),
											'year' => date('Y'));
	
		// 分の選択のメニューは５分刻みなので、
		// 現在の分が５の倍数でなければ、丸め込む必要がある
		$this_minute = date('i');
		$minute_mod_five = $this_minute % 5;
		if($minute_mod_five != 0){
			$this_minute -= $minute_mod_five;
		}
		$defaults['minute'] = sprintf('%02d', $this_minute);
	}

	// エラーが渡された場合は、(HTMLのマークアップとともに）$error_textに入れる
	if($errors){
		print 'You need to corret the following errors: <ul><li>';
		print implode('</li><li>', $errors);
		print '</li></ul>';
	}

	print '<form method="POST" action="' . $_SERVER['PHP_SELF'] . '">';
	print 'Enter a date and tie:';

	input_select('hour', $defaults, $hours);
	print ':';
	input_select('minute', $defaults, $minutes);
	input_select('ampm', $defaults, array('am' => 'am', 'pm' => 'pm'));
	input_select('month', $defaults, $months);
	print ' ';
	input_select('day', $defaults, $days);
	print ' ';
	input_select('year', $defaults, $years);
	print '<br />';
	input_submit('submit', 'Find Meeting');
	print '<input type="hidden" name="_submit_check" value="1" />';
	print '</form>';
}

function validate_form(){
	global $hours, $minutes, $months, $days, $years;

	$errors = array();

	if(!array_key_exists($_POST['month'], $months)){
		$errors[] = 'Select a valid month.';
	}
	if(!array_key_exists($_POST['day'], $days)){
		$errors[] = 'Select a valid day.';
	}
	if(!array_key_exists($_POST['year'], $years)){
		$errors[] = 'Select a valid year.';
	}
	if(!array_key_exists($_POST['hour'], $hours)){
		$errors[] = 'Select a valid hour.';
	}
	if(!array_key_exists($_POST['minute'], $minutes)){
		$errors[] = 'Select a valid minute.';
	}
	if(($_POST['ampm'] != 'am') && ($_POST['ampm'] != 'pm')){
		$errors[] = 'Select valid am/pm choice.';
	}

	return $errors;
}

function process_form(){
	// mktime()にフォームパラメータを与える前に
	// $_POST['ampm']を考慮して時間を24時間値にする必要がある
	
	if(($_POST['ampm'] == 'am') && ($_POST['hour'] == 12)){
		// 12amは24時間制では0
		$_POST['hour'] = 0;
	}elseif(($_POST['ampm'] == 'pm') && ($_POST['hour'] != 12)){
		$_POST['hour'] += 12;
	}

	// ユーザ入力の日付からエポックタイムスタンプを作る
	$timestamp = mktime($_POST['hour'], $_POST['minute'], 0,
											$_POST['month'], $_POST['day'], $_POST['year']);

	// ユーザが入力した日にち以降で次のミーティングの日付を見つけ出す
	// $timestampがその月の第４木曜日かその前であれば、ミーティングは
	// $timestampと同じ月、そうでなければミーティングは翌月

	// ユーザ入力の日付の真夜中
	$midnight = mktime(0,0,0, $_POST['month'], $_POST['day'], $_POST['year']);
	// ユーザが入力した月の最初の真夜中
	$first_of_month = mktime(0,0,0, $_POST['month'], 1, $_POST['year']);
	// ユーザが入力した月の第４木曜日の真夜中
	$month_nyphp = strtotime('fourth thursday', $first_of_month);

	if($midnight < $month_nyphp){
		// ユーザの日付は今月のミーティングより前
		print "Meeting this month: ";
		print date('l, F j, Y', $month_nyphp);
	}elseif($midnight == $month_nyphp){
		// ユーザの日付はミーティング当日
		print "Meeting today. ";
		$meeting_start = strtotime('6:30pm', $month_nyphp);
		// もし、6:30pm以降であれば、ミーティングはすでに始まっている
		if($timestamp > $meeting_start){
			print 'It started at 6:30 but you entered ';
			print date('g:i a', $timestamp);
		}
	}else{
		// ユーザ入力の日付がミーティング日の後であれば、
		// 翌月のミーティング日を見つける
		$first_of_next_month = mktime(0,0,0, $_POST['month'] + 1, 1, $_POST['year']);
		$next_month_nyphp = strtotime('fourth thursday', $first_of_next_month);
		print 'Meeting next month: ';
		print date('l, F j, Y', $next_month_nyphp);
	}
}	
