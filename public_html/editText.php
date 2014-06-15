<?php
session_start();
$fieldname = $_REQUEST['fieldname'];
$encrypt_pass = @file_get_contents('files/password');
if($_SESSION['l']!=$encrypt_pass){
	header('HTTP/1.1 401 Unauthorized');
	exit;
}

$content = trim(rtrim(stripslashes($_REQUEST['content'])));

$file = @fopen("files/$fieldname", "w");
if(!$file){
	echo "Editing failed. Set correct permissions (755) to the 'files' folder.";
	exit;
}

fwrite($file, $content);
fclose($file);
echo $content;
?>