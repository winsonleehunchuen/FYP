<!DOCTYPE html>
<html>
<head>
	<title>Admin View Question</title>
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
			padding-left:71%;
			font-weight: bold;
		}

		.move{
			position: absolute;
			left: 53%;
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
		<a class='btn btn-danger' href='adminQuestionAdd.php'>Add Question</a>
		</div>
		<form method="post">
			<input placeholder="Enter Test Name" type="text" name="searchTest">
			<input class="button" type="submit" name="buttonSubmitSearch" value="Search">
		</form>
	</div>

<table border="1px solid black" width="90%" >

<?php

include"database.php";

	if(isset($_POST['buttonSubmitSearch'])){
		$testN = $_POST['searchTest'];

		$i1=1;

		$result2=mysqli_query($con,"select q.que_id,t.test_name,q.que_desc,q.date from quiz_test t, quiz_question q where t.test_id=q.test_id and t.test_name LIKE '%$testN%'");


		if(mysqli_num_rows($result2) <= 0 || $testN == ""){

			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo '<h1>No result found!</h1>';

		}else{

		echo "<br><br><br><tr><th>ID</th><th>Test Name</th><th>Question</th><th>Date</th><th>Update</th><th>Delete</th></tr>";

			while($test1 = mysqli_fetch_array($result2)){
			$id1=$test1['que_id'];

				echo"<tr><td width=70 height=50>".$i1."</td>";
				echo"<td width=260>" .$test1['test_name']."</td>";
				echo"<td width=1100>" .$test1['que_desc']."</td>";
				echo"<td width=280>" .date("d-m-Y ", strtotime($test1['date']))."<br>".date("h:i A ", strtotime($test1['date']))."</td>";
				echo "<td width=120><a href='editQuestion.php?que_id=$id1'><span class='glyphicon glyphicon-edit'></span></a></td>";
				echo "<td width=120><a href='deleteQuestion.php?que_id=$id1'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";
			
				$i1++;
			}

		}

	}else{
		$i=1;

		$result=mysqli_query($con,"select q.que_id,t.test_name,q.que_desc,q.date from quiz_question q, quiz_test t where t.test_id=q.test_id order by q.que_id");

		echo "<br><br><br><tr><th>ID</th><th>Test Name</th><th>Question</th><th>Date</th><th>Update</th><th>Delete</th></tr>";

		//$result1=mysqli_query($con,"select * from quiz_question");		
	
		while($test=mysqli_fetch_array($result)){

		//$row=mysqli_fetch_row($result);
		$id=$test['que_id'];

			echo"<tr><td width=70 height=50>".$i."</td>";
			//echo"<td width=220>" .$row[1]."</td>";
			echo"<td width=260>" .$test['test_name']."</td>";
			echo"<td width=1100>" .$test['que_desc']."</td>";
			echo"<td width=280>" .date("d-m-Y ", strtotime($test['date']))."<br>".date("h:i A ", strtotime($test['date']))."</td>";
			echo "<td width=120><a href='editQuestion.php?que_id=$id'><span class='glyphicon glyphicon-edit'></span></a></td>";
			echo "<td width=120><a href='deleteQuestion.php?que_id=$id'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";
		
		$i++;
		}

	}
?>
</table>
</div>
</center>
</body>
</html>