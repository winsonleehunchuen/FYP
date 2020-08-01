<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Online Quiz</title>
</head>
<link href="https://fonts.googleapis.com/css?family=Merienda+One|Yeseva+One&display=swap" rel="stylesheet">
<link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
<style>

	*{
		font-family: 'Merienda One', cursive;
		font-weight: bold;
	}

	html{
		background-repeat: no-repeat;
		background-size: 100% 100%;
		height:880px;
		background-image:url("images/background.jpg");
	}

	body{
		margin:0;
		font-family: 'Yeseva One', cursive;
	}

	input[type=username] {
		border-radius: 0.4rem;
		padding: 7px 10px;
		box-sizing: border-box;

	}
	input[type=password] {
		border-radius: 0.4rem;
		padding: 7px 10px;
		box-sizing: border-box;
	}
	.button {
		padding: 10px 20px;
		font-size: 20px;
		text-align: center;
		cursor: pointer;
		outline: none;
		color: #fff;
		background-color: #6495ED;
		border: none;
		border-radius: 15px;
		box-shadow: 0 9px #999;
	}
	.button:hover {background-color: #20B2AA}
	.button:active {
		background-color: #3e8e41;
		box-shadow: 0 5px #666;
		transform: translateY(4px);
	}

	.login{
		position: relative;
		z-index: 1;
		margin-top: 2%;
	}

	.login h1 {
		margin:0;
	}

	.login-relative{
		position:absolute;
		width:100%;
	}

	.img-relative{
		position: relative;
		width: 100%;
	}

	.img-absolute{
		position: absolute;
		width: 100%;
		left: 6%;
		margin-top: 15%;
	}

	.img-relative2{
		position: relative;

	}

	.img-absolute2{
		position: absolute;
		width: 100%;
		left: 65%;
		margin-top: 14%;

	}

	a:link, a:visited {
 		text-decoration: none;
	}

	.dropbtn {
		box-shadow: 0 2.1px 1.3px rgba(0, 0, 0, 0.044),
    	0 5.9px 4.2px rgba(0, 0, 0, 0.054), 0 12.6px 9.5px rgba(0, 0, 0, 0.061);
  		background-color: #20B2AA;
  		color: white;
  		padding: 13px  16px;
  		border: 1px;
 		border-radius: 50%;
	}

	.dropdown-content {
 		display: none;
  		position: absolute;
  		background-color: #f1f1f1;
  		min-width: 160px;
  		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  		z-index: 1; 
	}

	.dropdown-content a {
  		color: black;
 		padding: 12px 16px;
  		text-decoration: none;
  		display: block;
	}

	.dropdown{ 
		position: absolute;
		padding-top: 2%;
		left: 6%;
	}
	.dropdown-content a:hover {background-color: #ddd;}

	.dropdown:hover .dropdown-content {display: block;}

	.dropdown:hover .dropbtn {background-color: #07948c;}

	p{
		font-size: 14px;
	}
</style>
<head>
	<title>Login</title>
</head>
<body>

		<div class="login-relative">
			<form method="post" >
			<div class = "login" >
				<center>
					<table>
						<tr>
							<td><h1>Welcome to Programming Quiz</h1></td><td><img src="images/picture1.png" width="129" height="100"></td>
						</tr>
					</table>
            		<h3>This Site will provide the quiz for various subject of interest.</h3>
            		<h3>You need to login for the take the online quiz.</h3>

					<h1 class="text-center">LOGIN PAGE</h1>
					<img style="border-radius:50%" src="images/picture2.jpg"  title="this is my profile pic" width="240px" height="190px" border="1" />
					<table>
						<tr>
							<td><h2>Login ID : </h2></td><td><input name="Username" type="username" maxlength="10" size="25" placeholder="Login ID"></h2></td>
						</tr>
						<tr>
							<td><h2>Enter Password : </h2></td><td><input name="Password" type="password" maxlength="10" size="25"></h2></td>
						</tr>
					</table>
					
					
					<input class="button" type="submit" value="Login" name="but_submit" id="but_submit">
					<br><br>
					
					
					<?php
					include "database.php";

					if(isset($_POST['but_submit'])){

						$uname = mysqli_real_escape_string($con,$_POST['Username']);
						$password = mysqli_real_escape_string($con,$_POST['Password']);

						if($uname == "" || $password == "" ){
							echo "<font color=#D83D5A>Invalid Login ID and Password!</font>";
						}
						else if($uname == "admin" && $password == "admin"){

								header("Location:adminViewSubject.php");
								$_SESSION['loginAdmin'] = $uname;

						}
						else{
							if ($uname != "" && $password != ""){

								$result = mysqli_query($con,"select * from quizregisterpage where loginid='".$uname."' and password='".$password."'");
								
								if(mysqli_num_rows($result) == ""){

										echo "<font color=#D83D5A>Invalid Login ID and Password!</font>";

								}else {
									$_SESSION['loginid'] = $uname;
									header("Location:userpage.php");
								}

							}
						}
					}
					?>
				</center>
				<div align="center">
				<br>
				<a class="button" href="register.php">Register New User</a>
				</div>

				<div style="position:fixed; width: 100%; top:10%; z-index: 99;">
				<div class="dropdown">
    				<a class="dropbtn">▼</a>
    			<div class="dropdown-content">
     		 		<a href="userfeedback.php">Feedback</a>

<style>
	.modal {
  		display: none; 
 		position: fixed;
  		z-index: 1; 
  		padding-top: 100px; 
  		left: 0;
  		top: 0;
  		width: 100%; 
  		height: 100%; 
  		overflow: auto; 
  		background-color: rgb(0,0,0); 
  		background-color: rgba(0,0,0,0.4); 
	}

	.modal-content {
  		background-color: #fefefe;
  		margin: auto;
  		padding: 20px;
 		border: 1px solid #888;
  		width: 40%;
	}

	.close {
  		color: #aaaaaa;
  		float: right;
  		font-size: 28px;
  		font-weight: bold;
	}

	.close:hover,
	.close:focus {
 		color: #000;
  		text-decoration: none;
  		cursor: pointer;
	}

	.modal-header {
  		padding: 2px 16px;
  		border-bottom: 2px solid black;
	}
</style>

      				<a id="myBtn">Developer</a>

				<div id="myModal" class="modal">
  					<div class="modal-content">
  					<div class="modal-header">
    					<span class="close">&times;</span>
						<h4 style="color:orange;">Developers 👨‍💼</h4>
					</div>
 					<br>
 					<table>
    					<tr><th rowspan="4" width=10><img src="images/me.jpg" width=180 height=180 ></th>
    					<td width=50><p>Lee Hun Chuen ✅</p></td></tr>
    					<tr><td><p>012-5058168 ✅</p></td></tr>
						<tr><td><p>leehunchuen8669@e.djzhlc.edu.my ✅</p></td></tr>
						<tr><td><p>Software Engineering and Mobile Application Development (SEMD) ✅</p></td></tr>
					</table>
  					</div>
				</div>

					<script>
					// Get the modal
					var modal = document.getElementById("myModal");

					// Get the button that opens the modal
					var btn = document.getElementById("myBtn");

					// Get the <span> element that closes the modal
					var span = document.getElementsByClassName("close")[0];

					// When the user clicks the button, open the modal 
					btn.onclick = function() {
  						modal.style.display = "block";
					}

					// When the user clicks on <span> (x), close the modal
					span.onclick = function() {
  						modal.style.display = "none";
					}		

					// When the user clicks anywhere outside of the modal, close it
					window.onclick = function(event) {
  						if (event.target == modal) {
    						modal.style.display = "none";
  						}
					}
					</script>
  				</div>
				</div>
				</div>

		</div>
		</div>
	</form>

</body>
</html>