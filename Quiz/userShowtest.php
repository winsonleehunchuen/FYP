<!DOCTYPE html>
<html>
<head>
<title>User Show Test</title>
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

	h2{
		text-align: center;
	}

	.move{
		padding-top: 70px;
	}

	a:link, a:visited {
 		text-decoration: none;
	}

	a:hover {
	color: #20B2AA;
	
	}
</style>

</head>
<body>
<?php include "menu.php"?>
<div class="move">
<?php
include"database.php";

extract($_GET);

$result=mysqli_query($con,"select * from quiz_subject where sub_id = $subid");

$row=mysqli_fetch_array($result);

echo "<h1 align=center><font color=＃FFD700> $row[1] </font></h1>";

$result1=mysqli_query($con,"select t.test_id, t.test_name, count(q.test_id) from quiz_test t, quiz_question q 
where t.test_id=q.test_id and t.sub_id = $subid GROUP BY q.test_id");

$result2=mysqli_query($con,"select * from quiz_test where sub_id = $subid");
//$total=mysqli_query($con,"SELECT count(test_id) FROM quiz_question GROUP BY test_id ");

if(mysqli_num_rows($result2) == "")
{

	echo "<br><br><h2> Sorry, No Quiz for this Subject 😅 </h2>";
	
}else{

echo "<h2> Select Quiz Name to Start Quiz 🤗 </h2>";
echo "<table align=center>";

while($row1=mysqli_fetch_row($result2)){
$row2=mysqli_fetch_row($result1);

	if($row2 != ""){
		
	echo "<tr><td align=center><a href=userQuestion.php?testid=$row1[0]&subid=$subid><font size=4>
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $row1[2]  </td><td> <font size=2>($row2[2] questions)</font> </td></tr></font></a>";

	}else{

	echo "<tr><td align=center><a href=userQuestion.php?testid=$row1[0]&subid=$subid><font size=4>
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $row1[2]  </td><td> <font size=2>(0 questions)</font> </td></tr></font></a>";

	}
	
}
echo "</table>";
}
?>
</div>
</body>
</html>
