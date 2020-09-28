<?php

require_once dirname(__FILE__). './../config.php';

class Register {

	//Function to sanitize values received from the form. Prevents SQL injection
	public function clean($con = '', $str = '') {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($con, $str);
	}

	// default value is required for parameters
	public function register($username = "", $password = "", $repassword = "") {
		//Connect to mysql server
		$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		if(!$link) {
			die('Failed to connect to server: ' . mysqli_error($link));
		}

		//Sanitize the POST values
		$username = $this->clean($link, $username);
		$password = $this->clean($link, $password);
		$repassword = $this->clean($link, $repassword);

		if($username == '') {
			return 'Please enter your username';
		}
		if($password == '') {
			return 'Please enter your password';
		}
		if($repassword == '') {
			return 'Please confirm your password';
		}
		if( strcmp($password, $repassword) != 0 ) {
			return 'Passwords do not match';
		}
		
		//Check for duplicate username address
		if($username != '') {
			$qry = "SELECT * FROM accounts WHERE username='$username'";

			$result = mysqli_query($link, $qry);
			if($result) {
				if(mysqli_num_rows($result) > 0) {
					return 'Username is already in use';
				}
				@mysqli_free_result($result);
			}
			else {
				return 'Query failed';
			}
		}

		//Create INSERT query
		$sql = "INSERT INTO accounts(username, password) VALUES('$username','".md5($password)."')";
		$result = @mysqli_query($link, $sql);

		//Check whether the query was successful or not
		if($result) {

			$_SESSION['id'] = $username;
			$_SESSION['admin'] = 0;
			session_write_close();
			return 'Register successfully';
		}
		return 'Query failed';
	}
}
?>