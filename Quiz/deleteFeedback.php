<?php
	include("database.php");

		$id = $_REQUEST['id'];

		//sending query
		mysqli_query($con,"DELETE FROM quizfeedback WHERE id = '$id' ")or die(mysql_error());

		header("location: adminViewUserFeedback.php");
?>