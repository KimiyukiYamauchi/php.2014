<?php
require_once 'formhelpers.php';

$channel = array('title' => "What's For Dinner",
								'link' => 'http://menu.example.com/',
							'description' => 'These are your choice of what to eat tonight.');

print "<channel>\n";
foreach($channel as $element => $content){
	print "<$element>";
	print h($content);
	print "</$element>\n";
}
print "</channel>";
