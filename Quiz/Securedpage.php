<!DOCTYPE html>
<html>
<head>
	<title>Secured Page</title>
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
		height:100%;
		background-image:url("images/background.jpg");
	}

	body{
		margin:0;
		font-family: 'Yeseva One', cursive;
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

	a:link, a:visited {
 		text-decoration: none;
	}

	.move{
		padding-top: 15%;
	}

</style>
<body>
<center>
<div class="move">
<h1>Please Login Your Id</h1>
<a class="button" href="index.php">Log In </a>
</div>
</center>
</body>
</html>
