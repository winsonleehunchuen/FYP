<!DOCTYPE html>
<html>
<head>
<title>User Result</title>
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

	.move1{
		padding-top: 70px;
	
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
		margin: 2% 0%;
	}

</style>
</head>

<body>
<?php include "menu.php"?>

<div class="move1">

<table style="width:100%" align="center">
	<tr><th><h1 style="background-color:#6495ED; color:white;">Test Result 😊</h1></th></tr>
</table>

<?php
include "database.php";
extract($_SESSION);


//pagination
$results_per_page = 5; // number of records to display per page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1; // get the current page number, default is 1
$offset = ($current_page - 1) * $results_per_page; // calculate the offset of records for the current page


// Get results for current page
$result = mysqli_query($con, "SELECT t.test_name, r.total_question, r.test_date, r.score FROM quiz_test t, quiz_result r WHERE t.test_id=r.test_id AND r.loginid='$loginid' LIMIT $offset, $results_per_page");

if(mysqli_num_rows($result) == "") {
    echo "<h1 align=center>You haven't done any tests 😥</h1>";
    exit;
}

echo "<table border=1px solid black align=center>
	<tr>
		<td width=300>Test Name</td>
		<td align=center width=110>Total Question</td>
		<td align=center width=190>Test Date and Time</td>
		<td align=center width=100>Score</td>
	</tr>";

while($row = mysqli_fetch_row($result)) {
    echo "<tr>
			  <td>$row[0]</td>
			  <td align=center>$row[1]</td>
			  <td align=center>".date("d-m-Y ", strtotime($row[2]))."<br>".date("h:i A ", strtotime($row[2]))."</td>
			  <td align=center>$row[3]</td>
		  </tr>";
}
echo "</table>";


// Add pagination links
// Get total number of results
$total_results = mysqli_query($con, "SELECT COUNT(*) FROM quiz_test t, quiz_result r WHERE t.test_id=r.test_id AND r.loginid='$loginid'");
$total_results1 = mysqli_fetch_array($total_results)[0];

$total_pages = ceil($total_results1 / $results_per_page);

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
</body>
</html>
