<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<title>User View Answer</title>
	<link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
	<link href="https://fonts.googleapis.com/css?family=Merienda+One|Yeseva+One&display=swap" rel="stylesheet">

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

	.move1{
		padding-top: 70px;
	
	}

	.style{
		color:black;
	}

	.true {
		color:#00CC66 ;
	}

	.pmove{
		position:absolute;
		top: 40%;
		right: 6%;
	}
</style>

</head>
<body>
<?php include "menu.php"?>

<?php
include"database.php";

extract($_POST);
extract($_SESSION);

if($submit == 'Next Question')
{
	$_SESSION['total']=$_SESSION['total']+1;
	
}

if($submit1 == 'Finish')
{
	mysqli_query($con,"delete from quiz_useranswer where id='" . session_id() ."'") or die(mysqli_error());
	unset($_SESSION['total']);
	header("Location: userpage.php");
	exit;
}
?>

<div class="move1">

<table style="width:100%" align="center">
	<tr><th><h1 style="background-color:#6495ED; color:white;">View Test Question Answer😊</h1></th></tr>
</table>

<?php
$result=mysqli_query($con,"select * from quiz_useranswer where id='" . session_id() ."'") or die(mysqli_error());
mysqli_data_seek($result,$_SESSION['total']);
$row= mysqli_fetch_row($result);
$quenumber=$_SESSION['total']+1;

echo "<form method=post>";
echo "<table style='padding-left:10%'>";
echo "<tr><td>Que ".  $quenumber .": $row[2]</td></tr>";
echo "<tr><td class=".($row[7]==1?'true':'style')."><input type=radio name=answer value=1 disabled>$row[3]</td></tr>";
echo "<tr><td class=".($row[7]==2?'true':'style')."><input type=radio name=answer value=2 disabled>$row[4]</td></tr>";
echo "<tr><td class=".($row[7]==3?'true':'style')."><input type=radio name=answer value=3 disabled>$row[5]</td></tr>";
echo "<tr><td class=".($row[7]==4?'true':'style')."><input type=radio name=answer value=4 disabled>$row[6]</td></tr>";

if($row[7]==$row[8])
{ echo "<tr><td style='color:blue;'>Your choose answer radio $row[8] is Correct👍</td></tr>"; }
else { echo "<tr><td style='color:red;'>Your choose answer radio $row[8] is Wrong😭</td></tr>"; }


if($_SESSION['total']<mysqli_num_rows($result)-1)
echo "<tr><td><input type=submit name=submit value='Next Question'></td></tr>";

else
echo "<tr><td><input type=submit name=submit1 value='Finish'></td></tr></form>";
echo "</table>";
?>
</div>
<div class="pmove">
<img src="images/correct.png" width="300" height="320">
</div>
</body>
</html>