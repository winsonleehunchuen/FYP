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

		.pagination li {
			margin: -3px !important;
			display: inline;
		}

		.pagination>li:first-child>a, .pagination>li:first-child>span {
			margin-left: 0;
			border-top-left-radius: 4px;
			border-bottom-left-radius: 4px;
		}

		.pagination>li:last-child>a, .pagination>li:last-child>span {
			border-top-right-radius: 4px;
			border-bottom-right-radius: 4px;
		}

		.pagination>li>a, .pagination>li>span {
			position: relative;
			padding: 6px 12px;
			margin-left: -1px;
			line-height: 1.42857143;
			color: #337ab7;
			text-decoration: none;
			background-color: #fff;
			border: 1px solid #ddd;
		}

		.pagination li.page-item.disabled span {
			color: #777;
		}

		.pagination a:hover {
			background-color: #eee;
		}

		.pagination_nav {
			text-align: center;
			margin: 0;
			position: initial;
			display: block;
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

$number = 1;

//pagination
$results_per_page = 5; // number of records to display per page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1; // get the current page number, default is 1
$offset = ($current_page - 1) * $results_per_page; // calculate the offset of records for the current page

// loop table id 
$currentNumber = ($current_page - 1) * $results_per_page + $number; 
$number++;

	$result=mysqli_query($con,"select * from quiz_subject LIMIT $offset, $results_per_page");	
			
		echo "<tr><a class='btn btn-danger' href='adminSubjectAdd.php'>Add Subject</a></tr><br><br>";
		echo "<tr><th>ID</th><th>Subject Name</th><th>Date</th><th>Update</th><th>Delete</th></tr>";
	
	while($test=mysqli_fetch_assoc($result)){
	
	$id=$test['sub_id'];
	
		echo"<tr><td><font color='black'>" .$currentNumber++."</font></td>";
		echo"<td><font color='black'>" .$test['sub_name']."</font></td>";
		echo"<td>" .date("d-m-Y ", strtotime($test['date']))."<br>".date("h:i A ", strtotime($test['date']))."</td>";
		echo "<td><a href='editSubject.php?sub_id=$id'><span class='glyphicon glyphicon-edit'></span></a></td>";
		echo "<td><a href='deleteSubject.php?sub_id=$id'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";
	
	}

?>
</table>
<?php
// Add pagination links
// Get total number of records
$total_results = mysqli_num_rows(mysqli_query($con, "select * from quiz_subject"));

$total_pages = ceil($total_results / $results_per_page);

echo "<nav class='pagination_nav'> 
<ul class='pagination'>";

if ($current_page > 1) {
    echo "<li class='page-item'>
	<a class='page-link' href='?page=".($current_page - 1)."'>Prev</a> 
	</li>";
}

if ($current_page > 3) {
	echo "<li class='page-item'><a class='page-link' href='?page=1'>1</a></li>";
	if ($current_page > 4) {
		echo "<li class='page-item'><span>...</span></li>";
	}
}

for ($i=max(1, $current_page-2); $i<=min($current_page+2, $total_pages); $i++) {
    if ($i == $current_page) {
        echo "<li class='page-item disabled'>
		<span>$i</span>
		</li>";
    } else {
        echo "<li class='page-item'>
		<a class='page-link' href='?page=$i'>$i</a>
		</li>";
    }
}

if ($current_page < $total_pages-2) {
	if ($current_page < $total_pages-3) {
		echo "<li class='page-item'><span>...</span></li>";
	}
	echo "<li class='page-item'><a class='page-link' href='?page=$total_pages'>$total_pages</a></li>";
}

if ($current_page < $total_pages) {
    echo "<li class='page-item'>
	<a class='page-link' href='?page=".($current_page + 1)."'>Next</a>
	</li>";
}

echo "</ul> </nav>";
?>
</div>
</center>
</body>
</html>