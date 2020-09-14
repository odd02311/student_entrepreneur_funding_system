
<?php
	//Include database connection details
	require_once dirname(__FILE__). './classes/class_login.php';
	//Start session
	session_start();

	$login = new Login;
	$response = $login->login($_REQUEST['username'], $_REQUEST['password']);
	if($response == "Login successfully") {
		session_start();
		$_SESSION['id']=$_REQUEST['username'];
		header("location: ".HOMEURL);
	}
	
	echo "<script> window.alert ('".$response."')</script>";
	echo "<script>window.location='login.html'</script>";
?>