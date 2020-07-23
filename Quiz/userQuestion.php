<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<title>User Test</title>
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

	h1{
		text-align: center;
	}

	.move{
		padding-top: 9%;
	}

	.move1{
		padding-top: 70px;
	}																

	.pmove{
		position:absolute;
		top: 40%;
		right: 10%;
	}

	a:hover {
	color: #20B2AA;
	text-decoration: underline;
	}
</style>

</head>

<body>
<?php include "menu.php"?>

<?php
include"database.php";

extract($_POST);
extract($_GET);
extract($_SESSION);

if(isset($subid) && isset($testid))
{
$_SESSION[sid]=$subid;
$_SESSION[tid]=$testid;
header("location:userQuestion.php");
}

$result=mysqli_query($con,"select * from quiz_question where test_id=$tid");

if(isset($_SESSION[total])=="")
{
	$_SESSION[total]="";
	mysqli_query("delete from quiz_useranswer where id='" . session_id() ."'") or die(mysqli_error());
	$_SESSION[trueans]="";
	
}
else
{

		if($submit=='Next Question' && isset($answer))
		{
				mysqli_data_seek($result,$_SESSION[total]);
				$row= mysqli_fetch_row($result);	
				mysqli_query($con,"insert into quiz_useranswer(id, test_id, question, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$answer')") or die(mysqli_error());

				$_SESSION[total]=$_SESSION[total]+1;

				if($answer==$row[7])
				{
					$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
				
		}
		else if($submit1=='Get Result' && isset($answer))
		{
				mysqli_data_seek($result,$_SESSION[total]);
				$row= mysqli_fetch_row($result);	
				mysqli_query($con,"insert into quiz_useranswer(id, test_id, question, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$answer')") or die(mysqli_error());

				$_SESSION[total]=$_SESSION[total]+1;

				if($answer==$row[7])
				{
					$_SESSION[trueans]=$_SESSION[trueans]+1;
				}

				if( $_SESSION[trueans] == 0){

				?><div class="move"><?php

					echo "<h1>Result</h1>";
					echo "<table align=center><tr><td>Total Question<td> $_SESSION[total]</td></tr>";
					echo "<tr><td style='color:#00CC66;'>True Answer<td>"."0</td></tr>";
					$wrong=$_SESSION[total]-$_SESSION[trueans];
					echo "<tr><td style='color: red;'>Wrong Answer<td> ". $wrong."</td></tr></table>";

					mysqli_query($con,"insert into quiz_result(loginid,test_id,score) values('$loginid',$tid,0)") or die(mysqli_error());
					echo "<h1><a href=userViewanswer.php> View Answer</a></h1>";
					unset($_SESSION[total]);
					unset($_SESSION[sid]);
					unset($_SESSION[tid]);
					unset($_SESSION[trueans]);
					exit;

				?></div><?php

				}else{

				?><div class="move"><?php

					echo "<h1>Result</h1>";
					echo "<table align=center><tr><td>Total Question<td> $_SESSION[total]</td></tr>";
					echo "<tr><td style='color:#00CC66;'>True Answer<td>".$_SESSION[trueans]."</td></tr>";
					$wrong=$_SESSION[total]-$_SESSION[trueans];
					echo "<tr><td style='color: red;'>Wrong Answer<td> ". $wrong."</td></tr></table>";

					mysqli_query($con,"insert into quiz_result(loginid,test_id,score) values('$loginid',$tid,$_SESSION[trueans])") or die(mysqli_error());
					echo "<h1><a href=userViewanswer.php> View Answer</a></h1>";
					unset($_SESSION[total]);
					unset($_SESSION[sid]);
					unset($_SESSION[tid]);
					unset($_SESSION[trueans]);
					exit;

				?></div><?php
			}
			
		}
}
?>

<div class="move1">

<table style="width:100%" align="center">
	<tr><th><h1 style="background-color:#6495ED; color:white;">Welcome to Online Quiz</h1></th></tr>
</table>

<?php

if($_SESSION[total]>mysqli_num_rows($result)-1)
{
unset($_SESSION[total]);
echo "<h2 align=center>Sorry, temporarily haven't add Question😥</h2>";
echo "<center>Please <a href=userpage.php> Choose Again</a></center>";
exit;
}

mysqli_data_seek($result,$_SESSION[total]);
$row= mysqli_fetch_row($result);
$quenumber=$_SESSION[total]+1;

echo "<form method=post id=form1>";
echo "<table style='padding-left:10%'>";
echo "<tr><td>Que ".  $quenumber .": $row[2]</td></tr>";
echo "<tr><td><input type=radio name=answer value=1>$row[3]</td></tr>";
echo "<tr><td><input type=radio name=answer value=2>$row[4]</td></tr>";
echo "<tr><td><input type=radio name=answer value=3>$row[5]</td></tr>";
echo "<tr><td><input type=radio name=answer value=4>$row[6]</td></tr>";

if($_SESSION[total]<mysqli_num_rows($result)-1)
echo "<tr><td><input type=submit name=submit value='Next Question'></td></tr>";

else
echo "<tr><td><input type=submit name=submit1 value='Get Result'></td></tr></form>";
echo "</table>";

?>
</div>
<div class="pmove">
<img src="images/wrong.png" width="220" height="300">
</div>
</body>
</html>