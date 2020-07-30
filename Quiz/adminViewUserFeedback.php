<!DOCTYPE html>
<html>
<head>
	<title>Admin View User Feedback</title>
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

	$i=1;

	$result=mysqli_query($con,"select * from quizfeedback");	
		
		echo"<h1 style='color:black;'>User Feedback</h1><br>";
		echo "<tr><th>ID</th><th>Name ID</th><th>Email</th><th>Date and Time</th><th>Feedback</th><th>Delete</th></tr>";
	
	while($test=mysqli_fetch_assoc($result)){
	$id=$test['id'];
	
		echo"<tr><td width=50>" .$i."</td>";
		echo"<td width=150>" .$test['name']."</td>";
		echo"<td width=250>" .$test['email']."</td>";
		echo"<td width=320>" .date("d-m-Y ", strtotime($test['reg_date']))."<br>".date("h:i A ", strtotime($test['reg_date']))."</td>";
		echo"<td width=320>" .$test['feedback']."</td>";
		echo "<td width=100><a href='deleteFeedback.php?id=$id'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";

	$i++;
	}

?>
</table>
</div>
</center>
</body>
</html>