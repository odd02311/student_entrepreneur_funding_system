<?php

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
echo $_FILES["file"]["size"];

	if ($_FILES["file"]["error"] > 0)
	{
		echo "error: " . $_FILES["file"]["error"] . "<br>";
	}
	else
	{
		echo "file name: " . $_FILES["file"]["name"] . "<br>";
		echo "file extension: " . $_FILES["file"]["type"] . "<br>";
		echo "file size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		echo "saved to temp path: " . $_FILES["file"]["tmp_name"] . "<br>";
		
		// determine whether there is same file
		if (file_exists("upload/" . $_FILES["file"]["name"]))
		{
			echo $_FILES["file"]["name"] . " file exists ";
		}
		else
		{
			move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
			echo "saved to : " . "upload/" . $_FILES["file"]["name"];
		}
	}

?>