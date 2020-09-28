<?php
	require_once('config.php');
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['id']);
	unset($_SESSION['admin']);
	session_write_close();
	header("location: ".HOMEURL);
	exit();
?>