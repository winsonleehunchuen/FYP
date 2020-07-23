<?php
	include("database.php");

		$id = $_REQUEST['id'];

		//sending query
		mysqli_query($con,"DELETE FROM quizregisterpage WHERE id = '$id' ")or die(mysql_error());

		header("location: adminViewUser.php");
?>