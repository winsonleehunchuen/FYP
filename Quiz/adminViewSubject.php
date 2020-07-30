<!DOCTYPE html>
<html>
<head>
	<title>Admin View Subject</title>
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
			margin: 10% 1%;
			width: 99%;
		}

	</style>
</head>
<body>
<?php include"adminMenu.php";?>
<center>
<div class="all-Table table-striped">
<table border="1px solid black" width="70%" >

<?php

include"database.php";

	$i=1;
	
	$result=mysqli_query($con,"select * from quiz_subject");	
			
		echo "<tr><a class='btn btn-danger' href='adminSubjectAdd.php'>Add Subject</a></tr><br><br>";
		echo "<tr><th>ID</th><th>Subject Name</th><th>Update</th><th>Delete</th></tr>";
	
	while($test=mysqli_fetch_assoc($result)){
	
	$id=$test['sub_id'];
	
		echo"<tr><td><font color='black'>" .$i."</font></td>";
		echo"<td><font color='black'>" .$test['sub_name']."</font></td>";
		echo "<td><a href='editSubject.php?sub_id=$id'><span class='glyphicon glyphicon-edit'></span></a></td>";
		echo "<td><a href='deleteSubject.php?sub_id=$id'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";
	
	$i++;
	}

?>
</table>
</div>
</center>
</body>
</html>



