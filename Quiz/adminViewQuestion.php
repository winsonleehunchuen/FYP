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
		<a class='btn btn-danger' href='adminQuestionAdd.php'>Add Question</a>
		</div>
		<form method="get">
			<input placeholder="Enter Test Name" type="text" name="searchTest">
			<input class="button" type="submit" name="buttonSubmitSearch" value="Search">
		</form>
	</div>

<table border="1px solid black" width="90%" >

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
	

	if(isset($_GET['searchTest'])){

		$testN = $_GET['searchTest'];

	}else if(isset($_GET['testN'])){

	// Use parse_str() function to parse the
	// string passed via URL
		parse_str($url_components['query'], $params);

		$testN = $params['testN'];
	}  



	if(isset($testN)){

		$result2=mysqli_query($con,"select q.que_id,t.test_name,q.que_desc,q.date from quiz_test t, quiz_question q where t.test_id=q.test_id and t.test_name LIKE '%$testN%' LIMIT $offset, $results_per_page");

		if(mysqli_num_rows($result2) <= 0 || $testN == ""){

			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo '<h1>No result found!</h1>';

		}else{

		echo "<table border='1px solid black' width='70%' >";
		echo "<br><br><br><tr><th>ID</th><th>Test Name</th><th>Question</th><th>Date</th><th>Update</th><th>Delete</th></tr>";

			while($test1 = mysqli_fetch_array($result2)){
			$id1=$test1['que_id'];

				echo"<tr><td width=70 height=50>".$currentNumber++."</td>";
				echo"<td width=260>" .$test1['test_name']."</td>";
				echo"<td width=1100>" .$test1['que_desc']."</td>";
				echo"<td width=280>" .date("d-m-Y ", strtotime($test1['date']))."<br>".date("h:i A ", strtotime($test1['date']))."</td>";
				echo "<td width=120><a href='editQuestion.php?que_id=$id1'><span class='glyphicon glyphicon-edit'></span></a></td>";
				echo "<td width=120><a href='deleteQuestion.php?que_id=$id1'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";
			
			}

		echo "</table>";

		}



	// count total number of records
	$total_results = mysqli_query($con, "select count(*) as total from quiz_test t, quiz_question q where t.test_id=q.test_id and t.test_name LIKE '%$testN%'");
	$total_records = mysqli_fetch_assoc($total_results)['total'];

	// calculate total number of pages
	$total_pages = ceil($total_records / $results_per_page);

	echo "<nav class='pagination_nav'> 
		<ul class='pagination'>";
	
	if ($current_page > 1) {
		echo "<li class='page-item'>
		<a class='page-link' href='?page=".($current_page - 1)."&testN=$testN'>Prev</a> 
		</li>";
	}
	
	if ($current_page > 3) {
		echo "<li class='page-item'><a class='page-link' href='?page=1&testN=$testN'>1</a></li>";
		if ($current_page > 4) {
			echo "<li class='page-item'><span>...</span></li>";
		}
	}
	
	for ($i=max(1, $current_page-2); $i<=min($current_page+2, $total_pages); $i++) {
		if ($i == $current_page) {
			echo "<li class='page-item disabled'>
			<a class='active' href='?page=$i&testN=$testN'>$i</a>
			</li>";
		} else {
			echo "<li class='page-item'>
			<a href='?page=$i&testN=$testN'>$i</a>
			</li>";
		}
	}
	
	if ($current_page < $total_pages-2) {
		if ($current_page < $total_pages-3) {
			echo "<li class='page-item'><span>...</span></li>";
		}
		echo "<li class='page-item'><a class='page-link' href='?page=$total_pages&subject=$testN'>$total_pages</a></li>";
	}
	
	if ($current_page < $total_pages) {
		echo "<li class='page-item'>
		<a href='?page=".($current_page + 1)."&testN=$testN'>Next</a>
		</li>";
	}
	
	echo "</ul> </nav>";



	}else{

		$result=mysqli_query($con,"select q.que_id,t.test_name,q.que_desc,q.date from quiz_question q, quiz_test t where t.test_id=q.test_id order by q.que_id LIMIT $offset, $results_per_page");

		echo "<table border='1px solid black' width='70%' >";
		echo "<br><br><br><tr><th>ID</th><th>Test Name</th><th>Question</th><th>Date</th><th>Update</th><th>Delete</th></tr>";

		//$result1=mysqli_query($con,"select * from quiz_question");		
	
			while($test=mysqli_fetch_array($result)){

				//$row=mysqli_fetch_row($result);
				$id=$test['que_id'];

				echo"<tr><td width=70 height=50>".$currentNumber++."</td>";
				//echo"<td width=220>" .$row[1]."</td>";
				echo"<td width=260>" .$test['test_name']."</td>";
				echo"<td width=1100>" .$test['que_desc']."</td>";
				echo"<td width=280>" .date("d-m-Y ", strtotime($test['date']))."<br>".date("h:i A ", strtotime($test['date']))."</td>";
				echo "<td width=120><a href='editQuestion.php?que_id=$id'><span class='glyphicon glyphicon-edit'></span></a></td>";
				echo "<td width=120><a href='deleteQuestion.php?que_id=$id'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";
			
			}

		echo "</table>";


	// count total number of records
	$total_results = mysqli_query($con, "select count(*) as total from quiz_question");
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