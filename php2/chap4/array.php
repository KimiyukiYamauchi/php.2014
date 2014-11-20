<?php
/*
$vagetable['corn'] = 'yellow';
$vagetable['beet'] = 'red';
$vagetable['carrot'] = 'orange';
 */
$vagetable = array('corn' => 'yellow',
										'beet' => 'red',
										'carrot' => 'orange');

//var_dump($vagetable);

//print '<br /><br />';

/*
$dinner[] = 'Sweet Corn and Asparagus';
$dinner[] = 'Lemon Chicken';
$dinner[] = 'Brased Bamboo Fungus';
 */

$dinner = array('Sweet Corn and Asparagus',
								'Lemon Chicken',
								'Lemon Chicken',
								'Lemon Chicken',
								'Lemon Chicken',
								'Lemon Chicken',
								'Lemon Chicken',
								'Brased Bamboo Fungus');

$row_color = array('red', 'green');
$color_index = 0;

print "<table border='1'>\n";
foreach($dinner as $key => $value){
	print '<tr bgcolor="' . $row_color[$color_index] . '">';
	print "<td>$key</td><td>$value</td></tr>\n";
	$color_index = 1 - $color_index;
}
print "</table>\n";

//var_dump($dinner);

$dishes = count($dinner);
//var_dump($dishes);
