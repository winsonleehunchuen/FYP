<!DOCTYPE html>
<html>
<head>
<title>User Result</title>
	<link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
	<link href="https://fonts.googleapis.com/css?family=Merienda+One|Yeseva+One&display=swap" rel="stylesheet">

<style>

	body{
		margin:0;
		font-family: 'Yeseva One', cursive;
	}

	html{
		background-repeat: no-repeat;
		background-size: 100% 100%;
		height:720px;
		background-image:url("images/background1.jpg");
	}

	.move1{
		padding-top: 70px;
	
	}

</style>
</head>

<body>
<?php include "menu.php"?>

<div class="move1">

<table style="width:100%" align="center">
	<tr><th><h1 style="background-color:#6495ED; color:white;">Test Result 😊</h1></th></tr>
</table>

<?php
include"database.php";

extract($_SESSION);

$result=mysqli_query($con,"select t.test_name,r.total_question,r.test_date,r.score from quiz_test t, quiz_result r where t.test_id=r.test_id and r.loginid='$loginid'");

if(mysqli_num_rows($result) == "")
{
	echo "<h1 align=center>You haven't do any test 😥</h1>";
	exit;
}

echo "<table border=1px solid black align=center>
		<tr><td width=300>Test Name</td>
		<td align=center width=110>Total Question</td>
		<td align=center width=190>Test Date and Time</td>
		<td align=center width=100>Score</td></tr>";

while($row=mysqli_fetch_row($result))
{
echo "<tr><td>$row[0]</td>
	  <td align=center>$row[1]</td>
	  <td align=center>".date("d-m-Y ", strtotime($row[2]))."<br>".date("h:i A ", strtotime($row[2]))."</td>
	  <td align=center>$row[3]</td></tr>";
}
echo "</table>";
?>
</div>
</body>
</html>
