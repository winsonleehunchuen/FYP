<?php
	include("database.php");

		$id = $_REQUEST['test_id'];

		//sending query
		mysqli_query($con,"DELETE FROM quiz_test WHERE test_id = '$id' ")or die(mysql_error());

		header("location: adminViewTest.php");
?>