<?php

	function isLoggedIn()
	{
		return (isset($_SESSION['id']) &&
		       	(trim($_SESSION['id']) != ''));
	}

	function getUserID()
	{
		return trim($_SESSION['id']);
	}
?>