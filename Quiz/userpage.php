<?php
	session_start();

	if (!isset($_SESSION['loginid'])) {
		header('Location: index.php');
		}
?>
<!DOCTYPE html>
<html>
<head>
<title>User Page</title>
	<link href="https://fonts.googleapis.com/css?family=Merienda+One|Yeseva+One&display=swap" rel="stylesheet">
	<link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
</head>
<title>User First Page</title>
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

	.move{
		padding-top: 70px;
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
	<table style="width:100%" align="center">
		<tr><th><h1 style="background-color:#6495ED; color:white;">Welcome to Online Quiz</h1></th></tr>
	</table>

	<table width="25%">	
	 <tr>
    	<td valign="bottom"><img src="images/search.png" width="50" height="50" align="middle"></td>
    	<td width="93%" valign="bottom"> <a href="userSublist.php" >Subject for Quiz </a></td>
  	</tr>
  	<tr>
   		<td height="58" valign="bottom"><img src="images/degree.png" width="43" height="43" align="middle"></td>
   		<td valign="bottom"> <a href="userResult.php">Result </a></td>
  	</tr>
  	<tr>
   		<td valign="center" ><img src="images/profile.png" width="45" height="50" align="middle"></td>
   		<td height="90"> <a href="userUpdateProfile.php">Update Profile </a></td>
  	</tr>
	</table>
	<br>
	<img src="images/picture2.png" width="300" height="200">
	</div>
</center>
</body>
</html>
