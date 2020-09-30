
<?php
	//Include database connection details
	require_once dirname(__FILE__). './classes/class_login.php';
	//Start session
	session_start();

	$username = (empty($_REQUEST['username'])) ? '' : $_REQUEST['username'];
	$password = (empty($_REQUEST['password'])) ? '' : $_REQUEST['password'];

	$login = new Login;
	$response = $login->login($username, $password); 
	// if($response == "Admin login successfully") {
	// 	header("location: " .HOMEURL);
	// }
	// else if($response == "Login successfully") {
	// 	header("location: " .HOMEURL);
	// }

	echo $response;
?>