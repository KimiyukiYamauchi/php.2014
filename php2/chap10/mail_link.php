<?php
$fh = fopen('peaple.txt', 'rb');
print '<ul>';
for($line = fgets($fh); !feof($fh); $line = fgets($fh)){
	$line = trim($line);
	$info = explode('|', $line);
	print '<li><a href="mailto:' . $info[0] . '">' . $info[1] . "</a></li>\n";
}
print '</ul>';
fclose($fh);
