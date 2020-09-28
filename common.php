<?php

	function isLoggedIn()
	{
		return (isset($_SESSION['id']) &&
		       	(trim($_SESSION['id']) != ''));
	}

	function isAdmin()
	{
		return (isset($_SESSION['admin']) &&
		       	(trim($_SESSION['admin']) != ''));
	}

	function getUserID()
	{
		return trim($_SESSION['id']);
	}
?>