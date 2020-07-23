<script src="https://kit.fontawesome.com/4565a9aee0.js" crossorigin="anonymous"></script>

<?php
session_start();
?>

<style>
*{
	font-family: 'Merienda One', cursive;
}

p,span{
	font-family: 'Yeseva One', cursive;
}
.nav-container{
	position: absolute;
	width: 100%;
	background: #6495ED;
	padding: 18px 16px;
}



.nav{
	position: relative;
	margin: 0 1%;
	font-weight: bold;
}

nav{
	font-weight: bold;
	position: absolute;
    width: 100%;
    padding-bottom: 0%;
    height: 100%;
    align-items: center;
    display: inline-flex;

}

.nav a{
	text-decoration: none;
	margin: 0 5%;
	color: black;
}

.nav a:hover{
	color: #F0F8FF;
}

.gg{
	font-weight: bold;
    display: inline-flex;
    position: absolute;
    margin-top: 0%;
    right: 0;
    width: 18%;
    height: 100%;
    align-items: center;
}


.gg a {
	font-size: 30px;
	color: black;
}
.gg .logoutText {
	font-size: 19px;
}

andrew hello

</style>
<div style="position:fixed; width: 100%; z-index: 99;">
<div class="nav-container">
	<div class="nav">
		<a href="adminViewSubject.php">View Subject</a>
		<nav>
			<a href="adminViewTest.php">View Test</a>
			<a href="adminViewQuestion.php">View Question</a>
			<a href="adminViewUser.php">View User</a>
			<a href="adminViewUserFeedback.php">View Feedback</a>
		</nav>

<div class = "gg" >
		<?php

		if (isset($_SESSION['loginAdmin']) != "") {
			?>
			<?php
			echo'<a href="adminViewSubject.php"><img src="images/icon.png" width="50px" height="50px"></a>'; 
			?>
			<?php
			echo $_SESSION['loginAdmin'];
			?>
			<a href="logout.php" class="logoutText">Log out</a>
			<?php
			}

		?>
</div>
</div>
</div>
</div>
