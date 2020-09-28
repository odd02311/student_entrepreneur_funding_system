<?php
	session_start();
	//Include database connection details
	require_once dirname(__FILE__). './classes/class_register.php';


	$username = (empty($_REQUEST['username'])) ? '' : $_REQUEST['username'];
	$password = (empty($_REQUEST['password'])) ? '' : $_REQUEST['password'];
	$repassword = (empty($_REQUEST['repassword'])) ? '' : $_REQUEST['repassword'];

	echo $username;
	$reg = new Register;
	$response = $reg->register($username, $password, $repassword);
	// if($response == "Register successfully") {
	// 	header("location: login.php?username=".$username."&password=".$password);
	// }
	echo $response;
	//header("location: error.php");
?>
