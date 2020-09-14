
<?php
	//Include database connection details
	require_once dirname(__FILE__). './classes/class_login.php';
	//Start session
	session_start();

	$login = new Login;
	$response = $login->login($_REQUEST['username'], $_REQUEST['password']);
	if($response == "Login successfully") {
		session_start();
		$_SESSION['id']=$tableName;
		//header("location: ".HOMEURL);
	}
	
	echo $response;
	//header("location: error.php");
?>