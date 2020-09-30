<?php

require_once dirname(__FILE__). './../config.php';

class Login {

	//Function to sanitize values received from the form. Prevents SQL injection
	public function clean($con = '', $str = '') {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($con, $str);
	}

	// default value is required for parameters
	public function login($username = "", $password = "") {

		if (empty($username)){
			return 'Please enter your username';
		}
		else if (empty($password)){
			return 'Please enter your password';
		}

		//Connect to mysql server
		$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		if(!$link) {
			die('Failed to connect to server: ' . mysqli_error($link));
		}

		//Sanitize the REQUEST values - parameters may come from GET or POST
		$username = $this->clean($link, $username);
		$password = $this->clean($link, $password);

		//Create query
		$sql="SELECT * FROM accounts WHERE username='$username' AND password='".md5($password)."'";
		$result=mysqli_query($link, $sql);

		//print($sql);
		//Check whether the query was successful or not
		if($result) {
			if(mysqli_num_rows($result) == 1) {
				//Login Successful
				//session_regenerate_id();
				$account = mysqli_fetch_assoc($result);

				$_SESSION['id'] = $account['id'];
				$_SESSION['username'] = $account['username'];
				$_SESSION['admin'] = $account['is_admin'];
				$_SESSION['phone'] = $account['phone'];
				$_SESSION['school'] = $account['school'];
				$_SESSION['email'] = $account['email'];
				$_SESSION['desc'] = $account['description'];

				return "Login successfully";

			}else {
				//Login failed
				return 'Username or password wrong';
			}
		}else {
			return 'Username or password wrong';
		}
	}
}
?>