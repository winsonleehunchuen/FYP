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

$result1=mysqli_query($con,"select s.sub_id, s.sub_name, count(t.sub_id) from quiz_subject s, quiz_test t 
where s.sub_id=t.sub_id GROUP BY t.sub_id");

$result=mysqli_query($con,"select * from quiz_subject");

while($row=mysqli_fetch_row($result)){
$row1=mysqli_fetch_row($result1);

	if($row1 != ""){

	echo "<tr style='height:40px; background-color:white;'><td><a href=userShowtest.php?subid=$row[0]><font size=4>$row[1]</font></a>
	<font size=2>\t($row1[2] Tests)</font></td></tr>";

	}else{

	echo "<tr style='height:40px; background-color:white;'><td><a href=userShowtest.php?subid=$row[0]><font size=4>$row[1]</font></a>
	<font size=2>\t(0 Tests)</font></td></tr>";

	}
}

?>
</table>
</div>
</center>
</body>
</html>
