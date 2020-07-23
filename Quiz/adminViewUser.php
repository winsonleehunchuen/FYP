<!DOCTYPE html>
<html>
<head>
	<title>Admin View User</title>
	<link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
	<link href="https://fonts.googleapis.com/css?family=Merienda+One|Yeseva+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<style>
		body{
			margin:0;
			background-color:#DBFFFF;
		}

		table,td,th {
		 	border-collapse: collapse;
		  	text-align: center;
		    font-size: 17px;
		}

		.all-Table{
			position: absolute;
			margin: 7% 0%;
			width: 100%;
		}

	</style>
</head>
<body>
<?php include"adminMenu.php";?>
<center>
<div class="all-Table table-striped">
<table border="1px solid black" width="90%">

<?php

include"database.php";

	$result=mysqli_query($con,"select * from quizregisterpage");	
		
		echo"<h1 style='color:black;'>Registered User Detail</h1><br>";
		echo "<tr><th>ID</th><th>Login ID</th><th>Name</th><th>Address</th><th>City</th><th>Phone</th><th>Email</th><th>Birthday</th><th>Password</th><th>Delete</th></tr>";
	
	while($test=mysqli_fetch_assoc($result)){
	$id=$test['id'];
	
		echo"<tr><td width=50><font color='black'>" .$test['id']."</font></td>";
		echo"<td width=100><font color='black'>" .$test['loginid']."</font></td>";
		echo"<td width=150><font color='black'>" .$test['username']."</font></td>";
		echo"<td width=320><font color='black'>" .$test['address']."</font></td>";
		echo"<td width=100><font color='black'>" .$test['city']."</font></td>";
		echo"<td width=150><font color='black'>" .$test['phone']."</font></td>";
		echo"<td width=250><font color='black'>" .$test['email']."</font></td>";
		echo"<td width=150><font color='black'>" .$test['birthday']."</font></td>";
		echo"<td width=100><font color='black'>" .$test['password']."</font></td>";
		echo "<td width=100><a href='deleteUser.php?id=$id'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";

	}

?>
</table>
</div>
</center>
</body>
</html>