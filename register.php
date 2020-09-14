<?php
	//Include database connection details
	require_once dirname(__FILE__). './classes/class_register.php';

	$reg = new Register;
	$response = $reg->register($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['repassword']);
	if($response == "Register successfully") {
		header("location: login.php?username=".$username."&password=".$password);
	}
	
	echo $response;
	//header("location: error.php");
?>
