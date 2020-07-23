<?php
	include("database.php");

		$id = $_REQUEST['sub_id'];

		//sending query
		mysqli_query($con,"DELETE FROM quiz_subject WHERE sub_id = '$id' ")or die(mysql_error());

		header("location: adminViewSubject.php");
?>