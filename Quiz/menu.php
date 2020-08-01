<script src="https://kit.fontawesome.com/4565a9aee0.js" crossorigin="anonymous"></script>

<?php
	session_start();

	if (!isset($_SESSION['loginid'])) {
		header('Location: index.php');
		}
?>

<style>
*{
	font-family: 'Merienda One', cursive;
	font-weight: bold;
}

.nav{
	position: relative;
	margin: 0 1%;
}

.nav a{
	text-decoration: none;
	margin: 0 5%;
	color: black;
}

.nav a:hover{
	color: #20B2AA;
}

.gg{
    display: inline-flex;
    position: absolute;
    margin-top: 3%;
    right: 0;
    width: 26%;
    height: 100%;
    align-items: center;
}


.gg a {
	font-size: 30px;
	color: black;
}

.gg .Text {
	font-size: 20px;
}

</style>
<div style=" width: 100%; z-index: 99;">
<div class="nav">
<div class = "gg" >
	<?php

		if (isset($_SESSION['loginid']) != "") {
			?>
			<?php
			echo'<a href="userpage.php"><img src="images/picture1.png" width="50px" height="50px"></a>'; 
			?>
			<?php
			echo $_SESSION['loginid'];
			?>
			<a href="userpage.php" class="Text">Home</a>
			<?php echo "|"?>
			<a href="logout.php" class="Text">Log out</a>
			<?php
		}
	?>	
</div>
</div>
</div>


