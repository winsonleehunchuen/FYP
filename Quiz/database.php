<?php
	$con = mysqli_connect('localhost','root','');
	if(!$con)
	{
		// die("Could not connect: " .mysqli_connect_error());
		die("Could not connect: " .mysqli_error());
	}
	mysqli_select_db($con,"quiz_exam");
?>