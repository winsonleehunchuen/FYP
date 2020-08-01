<!DOCTYPE html>
<html>
<head>
	<title>User Update Profile</title>
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

		table,td,th {
		 	border-collapse: collapse;
		  	text-align: center;
		    font-size: 17px;
		}

		.all-Table{
			position: absolute;
			padding-top: 2%;
			width: 99%;
		}

		.move{
			padding-top: 70px;
		}

		a:hover {
			color: #20B2AA;
			text-decoration: underline;
		}

		.pmove{
			position:absolute;
			top: 56%;
			right: 6%;
		}
</style>
</head>
<body>
<?php include"menu.php";?>
<?php
include"database.php";
$user_check=$_SESSION['loginid'];
$ses_sql=mysqli_query($con,"select loginid,id from quizregisterpage where loginid='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$row['loginid'];
$loggedin_id=$row['id'];
?>
<center>

	<div class="move">
	<table style="width:100%" align="center">
	<tr><th><h1 style="background-color:#6495ED; color:white;">Welcome <?php echo $loggedin_session; ?> Profile 🧐</h1></th></tr>
	</table>

<div class="all-Table table-striped">
<table border="1px solid black" width="80%" >

<?php

	$result=mysqli_query($con,"SELECT * FROM quizregisterpage WHERE id = $loggedin_id");					
	while($row=mysqli_fetch_array($result)){

		echo"<tr><td width=100>Login ID :</td><td width=170>" .$row['loginid']."</td></tr>";
		echo"<tr><td>Name :</td><td width=170>" .$row['username']."</font></td></tr>";
		echo"<tr><td>Address :</td><td width=170>" .$row['address']."</font></td></tr>";
		echo"<tr><td>City :</td><td width=170>" .$row['city']."</font></td></tr>";
		echo"<tr><td>Phone :</td><td width=170>" .$row['phone']."</font></td></tr>";
		echo"<tr><td>Birthday :</td><td width=170>" .$row['birthday']."</font></td></tr>";
		echo"<tr><td>Password :</td><td width=170>" .$row['password']."</font></td></tr>";
		echo"<table><br><tr><td><a href='userUpdateProfile1.php?loginid'><font size='4px'>Update Profile</font></a></td></tr></table>";

	}

?>
</table>
</div>
</center>
<div class="pmove">
<img src="images/question.png" width="250" height="270">
</div>
</body>
</html>



