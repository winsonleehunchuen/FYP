<!DOCTYPE html>
<html>
<head>
	<title>Admin View Test</title>
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

		.search{
			position: absolute;
			padding-left:67%;
      		font-weight: bold;
		}

		.move{
			position: absolute;
			left: 57%;
			font-weight: bold;
		}

	</style>
</head>
<body>
<?php include"adminMenu.php";?>
<center>

<div class="all-Table table-striped">
	<div class="search">
		<div class="move">
		<a class="btn btn-danger" href="adminTestAdd.php">Add Test</a>
		</div>
		<form method="post">
			<input placeholder="Enter Subject Name" type="text" name="searchSubject">
			<input class="button" type="submit" name="buttonSubmitSearch" value="Search">
		</form>
	</div>

<table border="1px solid black" width="70%" >
<?php
	include"database.php";

	if(isset($_POST['buttonSubmitSearch'])){
		$subject = $_POST['searchSubject'];

		$i1=1;

		$result1=mysqli_query($con,"select t.test_id,s.sub_name,t.test_name,t.date from quiz_test t, quiz_subject s where s.sub_id=t.sub_id and s.sub_name LIKE '%$subject%'")or die(mysqli_error());

		if(mysqli_num_rows($result1) <= 0 || $subject == ""){

			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo '<h1>No result found!</h1>';

		}else{

		echo "<br><br><br><tr><th>ID</th><th>Subject Name</th><th>Test Name</th><th>Date</th><th>Update</th><th>Delete</th></tr>";

			while($test1 = mysqli_fetch_array($result1)){
			$id1 = $test1['test_id'];

			echo"<tr><td width=50>".$i1."</td>";
			echo"<td width=280>" .$test1['sub_name']."</td>";
			echo"<td width=280>". $test1['test_name']. "</td>";
			echo"<td width=280>" .date("d-m-Y ", strtotime($test1['date']))."<br>".date("h:i A ", strtotime($test1['date']))."</td>";
			echo "<td width=100><a href='editTest.php?test_id=$id1'><span class='glyphicon glyphicon-edit'></span></a></td>";
			echo "<td width=100><a href='deleteTest.php?test_id=$id1'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";

			$i1++;
			}

		}

	}else{
		$i=1;

		$result=mysqli_query($con,"select t.test_id,s.sub_name,t.test_name,t.date from quiz_test t, quiz_subject s where s.sub_id=t.sub_id order by t.test_id") or die(mysqli_error());
	
		echo "<br><br><br><tr><th>ID</th><th>Subject Name</th><th>Test Name</th><th>Date</th><th>Update</th><th>Delete</th></tr>";
			
		while($test=mysqli_fetch_assoc($result)){
		$id=$test['test_id'];
	
		echo"<tr><td width=50>".$i."</td>";
		echo"<td width=280>" .$test['sub_name']."</td>";
		echo"<td width=280>" .$test['test_name']."</td>";
		echo"<td width=280>" .date("d-m-Y ", strtotime($test['date']))."<br>".date("h:i A ", strtotime($test['date']))."</td>";
		echo "<td width=100><a href='editTest.php?test_id=$id'><span class='glyphicon glyphicon-edit'></span></a></td>";
		echo "<td width=100><a href='deleteTest.php?test_id=$id'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";

		$i++;
	}

}

?>
</table>
</div>
</center>
</body>
</html>