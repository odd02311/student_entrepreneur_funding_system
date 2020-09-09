
<form action="login.php" method="POST">
<table>
<tr><td>Full Name</td>
<td><input type="text" name="Username" required></td></tr>
<tr><td>Password</td>
<td><input type="password" name="Password" required></td></tr>
<tr>
<td><input type="submit" name="Login" value="Login"></td></tr>
</table>
</form>


<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('config.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;

	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	

	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the REQUEST values - parameters may come from GET or POST
	$login = clean($_REQUEST['username']);
	$password = clean($_REQUEST['password']);
	
	//Input Validations
	if($login == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: login.php");
		exit();
	}
	
	//Create query
	$qry="SELECT * FROM accounts WHERE username='$login' AND passcode='".md5($_REQUEST['password'])."'";
	$result=mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) == 1) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_USERNAME'] = $member['username'];
			session_write_close();
			header("location: ".HOMEURL);
			exit();
		}else {
			//Login failed
			$errmsg_arr[] = 'Username or password wrong.';
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			//header("location: login_form.php");
			exit();
		}
	}else {
		die("Query failed");
	}
?>
