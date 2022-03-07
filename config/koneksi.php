<?php
	define('server','127.0.0.1');
	define('username','root');
	define('password','');
	define('database','db_enkripsi');
	
	$connect=new mysqli(server, username, password, database) or die(mysqli_errno());
	
?>