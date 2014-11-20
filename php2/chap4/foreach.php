<?php
$dinner = array('Sweet Corn and Asparagus',
								'Lemon Chiken',
								'Braised Bamboo Fungus');

$meal = array('breakfast' => 'Walnut Bun',
							'lunch' => 'Cashew Nuts and White Mushrooms',
							'snack' => 'Dried MulBerries',
							'dinner' => 'Eggplant with Chili Souce');

$mealjp = array('朝食' => 'トースト',
							'昼食' => 'スパゲティ',
							'おやつ' => 'ドーナツ',
							'夕食' => 'すき焼き');

print "Before Sorting:<br />\n";
print '<p>';
foreach($dinner as $key => $value){
	print "\$dinner: $key $value<br />\n";
}
print '</p>';
print '<p>';
foreach($meal as $key => $value){
	print "\$meal: $key $value<br />\n";
}
print '</p>';

sort($dinner);
sort($meal);

print "After Sorting:<br />\n";
print '<p>';
foreach($dinner as $key => $value){
	print "\$dinner: $key $value<br />\n";
}
print '</p>';
print '<p>';
foreach($meal as $key => $value){
	print "\$meal: $key $value<br />\n";
}
print '</p>';

//$arinasi = array_key_exists('breakfa', $meal);
//$arinasi = array_key_exists('朝食a', $mealjp);
//$arinasi = in_array('Walnut Bu', $meal);
//$arinasi = in_array('トースト', $mealjp);
//var_dump($arinasi);

/*
$row_color = array('red', 'green');
$color_index = 0;

print "<table border='1'>\n";

foreach($meal as $key => $value){
	print '<tr bgcolor="' . $row_color[$color_index] . '">';
	print "<td>$key</td><td>$value</td></tr>\n";
	$color_index = 1 - $color_index;
}
foreach($mealjp as $key => $value){
	print '<tr bgcolor="' . $row_color[$color_index] . '">';
	print "<td>$key</td><td>$value</td></tr>\n";
	$color_index = 1 - $color_index;
}

print "</table>\n";
 */
