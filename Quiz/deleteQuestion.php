<?php
	include("database.php");

		$id = $_REQUEST['que_id'];

		//sending query
		mysqli_query($con,"DELETE FROM quiz_question WHERE que_id = '$id' ")or die(mysql_error());

		header("location: adminViewQuestion.php");
?>