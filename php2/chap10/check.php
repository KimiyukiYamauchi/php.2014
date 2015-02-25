<?php
/*
if(file_exists('/var/www/nofile')){
	print 'Index file is there.';
}else{
	print 'No index file in /var/www/';
}
$template_file = 'page-template.html';
if(is_readable($template_file)){
	print $template_file . ' is readable';
}else{
	print "Can't read template file.";
}
 */
$template_file = 'page-template.html';
if(is_writable($template_file)){
	print $template_file . ' is writable';
}else{
	print "Can't write template file.";
}
