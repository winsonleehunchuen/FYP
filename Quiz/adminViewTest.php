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
	<div class="search">
		<div class="move">
		<a class="btn btn-danger" href="adminTestAdd.php">Add Test</a>
		</div>
		<form method="get">
			<input placeholder="Enter Subject Name" type="text" name="searchSubject">
			<input class="button" type="submit" name="buttonSubmitSearch" value="Search">
		</form>
	</div>


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

	// Initialize URL to the variable
	$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		
	// Use parse_url() function to parse the URL
	// and return an associative array which
	// contains its various components
	$url_components = parse_url($url);
	

	if(isset($_GET['searchSubject'])){

		$subject = $_GET['searchSubject'];

	}else if(isset($_GET['subject'])){

	// Use parse_str() function to parse the
	// string passed via URL
		parse_str($url_components['query'], $params);

		$subject = $params['subject'];
	}  


	if(isset($subject)){

		// Total after search id 
		// $re=mysqli_query($con,"select count(t.test_id) from quiz_test t, quiz_subject s where s.sub_id=t.sub_id and s.sub_name LIKE '%$subject%'");
		$result1=mysqli_query($con,"select t.test_id,s.sub_name,t.test_name,t.date from quiz_test t, quiz_subject s where s.sub_id=t.sub_id and s.sub_name LIKE '%$subject%' LIMIT $offset, $results_per_page");

		if(mysqli_num_rows($result1) <= 0 || $subject == ""){

			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo '<h1>No result found!</h1>';
		// $r=mysqli_fetch_array($re);
		// echo "(0 Tests)";
		}else{

		echo "<table border='1px solid black' width='70%' >";
		echo "<br><br><br><tr><th>ID</th><th>Subject Name</th><th>Test Name</th><th>Date</th><th>Update</th><th>Delete</th></tr>";
		// $r=mysqli_fetch_array($re);
		// echo "($r[0] Tests)";
			while($test1 = mysqli_fetch_array($result1)){
				$id1 = $test1['test_id'];

				echo"<tr><td width=50>".$currentNumber++."</td>";
				echo"<td width=280>" .$test1['sub_name']."</td>";
				echo"<td width=280>". $test1['test_name']. "</td>";
				echo"<td width=280>" .date("d-m-Y ", strtotime($test1['date']))."<br>".date("h:i A ", strtotime($test1['date']))."</td>";
				echo "<td width=100><a href='editTest.php?test_id=$id1'><span class='glyphicon glyphicon-edit'></span></a></td>";
				echo "<td width=100><a href='deleteTest.php?test_id=$id1'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";

			}
		
		echo "</table>";
			
		}


	// count total number of records
	$total_results = mysqli_query($con, "select count(*) as total from quiz_test t, quiz_subject s where s.sub_id=t.sub_id and s.sub_name LIKE '%$subject%'");
	$total_records = mysqli_fetch_assoc($total_results)['total'];

	// calculate total number of pages
	$total_pages = ceil($total_records / $results_per_page);

	echo "<nav class='pagination_nav'> 
		<ul class='pagination'>";
	
	if ($current_page > 1) {
		echo "<li class='page-item'>
		<a class='page-link' href='?page=".($current_page - 1)."&subject=$subject'>Prev</a> 
		</li>";
	}
	
	if ($current_page > 3) {
		echo "<li class='page-item'><a class='page-link' href='?page=1&subject=$subject'>1</a></li>";
		if ($current_page > 4) {
			echo "<li class='page-item'><span>...</span></li>";
		}
	}
	
	for ($i=max(1, $current_page-2); $i<=min($current_page+2, $total_pages); $i++) {
		if ($i == $current_page) {
			echo "<li class='page-item disabled'>
			<a class='active' href='?page=$i&subject=$subject'>$i</a>
			</li>";
		} else {
			echo "<li class='page-item'>
			<a href='?page=$i&subject=$subject'>$i</a>
			</li>";
		}
	}
	
	if ($current_page < $total_pages-2) {
		if ($current_page < $total_pages-3) {
			echo "<li class='page-item'><span>...</span></li>";
		}
		echo "<li class='page-item'><a class='page-link' href='?page=$total_pages&subject=$subject'>$total_pages</a></li>";
	}
	
	if ($current_page < $total_pages) {
		echo "<li class='page-item'>
		<a href='?page=".($current_page + 1)."&subject=$subject'>Next</a>
		</li>";
	}
	
	echo "</ul> </nav>";



	}else{

		$result=mysqli_query($con,"select t.test_id,s.sub_name,t.test_name,t.date from quiz_test t, quiz_subject s where s.sub_id=t.sub_id order by t.test_id LIMIT $offset, $results_per_page");

		echo "<table border='1px solid black' width='70%' >";
		echo "<br><br><br><tr><th>ID</th><th>Subject Name</th><th>Test Name</th><th>Date</th><th>Update</th><th>Delete</th></tr>";
			
			while($test=mysqli_fetch_assoc($result)){
				$id=$test['test_id'];

				echo"<tr><td width=50>".$currentNumber++."</td>";
				echo"<td width=280>" .$test['sub_name']."</td>";
				echo"<td width=280>" .$test['test_name']."</td>";
				echo"<td width=280>" .date("d-m-Y ", strtotime($test['date']))."<br>".date("h:i A ", strtotime($test['date']))."</td>";
				echo "<td width=100><a href='editTest.php?test_id=$id'><span class='glyphicon glyphicon-edit'></span></a></td>";
				echo "<td width=100><a href='deleteTest.php?test_id=$id'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";

			}

		echo "</table>";


	// count total number of records
	$total_results = mysqli_query($con, "select count(*) as total from quiz_test");
	$total_records = mysqli_fetch_assoc($total_results)['total'];

	
	// calculate total number of pages
	$total_pages = ceil($total_records / $results_per_page);

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
	

	}


?>
</div>
</center>
</body>
</html>