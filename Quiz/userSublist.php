<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>User Show Subject</title>
	<link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
	<link href="https://fonts.googleapis.com/css?family=Merienda+One|Yeseva+One&display=swap" rel="stylesheet">

	<style>
	body{
		margin:0;
		font-family: 'Yeseva One', cursive;
	}

	html{
		background-repeat: no-repeat;
		background-size: 1600px 720px;
		height:720px;
		background-image:url("images/background1.jpg");
	}

	table,td {
		border-collapse: collapse;
		text-align: center;
		height:20px;  
	}

	.move{
		padding-top: 75px;
	}

	a:link, a:visited {
 		text-decoration: none;
	}

	a:hover {
	color: #20B2AA;
	text-decoration: underline;
	}
	</style>
</head>
<body>
<?php include "menu.php"?>
<center>
	<div class="move">
	<table>
		<tr><h1 style="background-color:#6495ED; height:50px; color:white;">Select Subject to Give Quiz</h1></tr>
	</table>

<table border="1px solid black" width="90%">
<?php

include"database.php";

$result=mysqli_query($con,"select * from quiz_subject");

while($row=mysqli_fetch_row($result))
{
	echo "<tr style='height:40px; background-color:white;'><td><a href=userShowtest.php?subid=$row[0]><font size=4>$row[1]</font></a></td></tr>";
}

?>
</table>
</div>
</center>
</body>
</html>
