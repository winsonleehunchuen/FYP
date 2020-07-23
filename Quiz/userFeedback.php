<!DOCTYPE html>
<html>
<link href="https://fonts.googleapis.com/css?family=Merienda+One|Yeseva+One&display=swap" rel="stylesheet">
<link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
<head>
<title>Feedback</title>
  <style>
  body{
     margin: 0;
     font-family: 'Yeseva One', cursive;
  }

  *{
    font-family: 'Merienda One', cursive;
    font-weight: bold;
  }
  html{
    background-repeat: no-repeat;
    background-size: 1600px 880px;
    height:880px;
    background-image:url("images/background.jpg");
  }

  input[type=name] {
    border-radius: 0.4rem;
    width: 150%;
    padding: 7px 20px;
    box-sizing: border-box;
  }


  input[type=email] {
    border-radius: 0.4rem;
    width: 150%;
    padding: 7px 20px;
    box-sizing: border-box;
  }

  textarea[type=feedback] {
    border-radius: 0.4rem;
    border: 2px solid black;
    width: 218%;
    height: 120px;
    padding: 7px 20px;
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

  body h1{
    margin:0;
  }

  .reg-Title{
    padding: 1% 0
  }

  .feedback{
    position: absolute;
    padding-left: 35%;
    padding-top: 1%;
  }

  .move{
    position: relative;
    padding-right: 8%;
  }

  .button1{
    position: relative;
    padding-left: 27%;
  }

  a:hover {
  color: #20B2AA;
  text-decoration: underline;
  }

  .form_error span {
    font-size: 1.0em;
    color: #D83D5A;
  }

  .form_error input {
    border: 1px solid #D83D5A;
  }

  
</style>
<head>
  <title>Register Page</title>
</head>
<body>

    <center>
      <form method="post">
        <div class="reg-Title">
          
          <table>
            <tr>
              <td><h1>Feedback/Report A Problem</h1></td><td><img src="images/picture1.png" width="129" height="100"></td>
            </tr>
          </table>

          <h4>Send us your feedback in this e-mail: leehunchuen8669@e.djzhlc.edu.my</h4>
          <h4>Or you can directly submit your feedback by filling the enteries below:-</h4>

        <div class="move">
         <table>

          <tr><td style="width:40%;"><h4>Name : </h4></td><td><input type="name" name="Name" placeholder="Enter your name" required></td></tr>

          <tr><td><h4>Email : </h4></td><td><input type="email" name="Email" placeholder="Enter your email" required></td></tr>

         </table>
        </div>

        <div class="feedback">
          <textarea type="feedback" name="Feedback" placeholder="Write feedback here..." required></textarea>
        </div>

        <br/><br><br><br><br><br><br>
        <div class="button1">
          <table><tr><td width=20%>
          <input class="button" type="submit" value="Submit"></td><td width="54%"><a href="index.php">GO BACK !</a></td></tr></table>
        </div>
      <?php

      include "database.php";
      
      if(isset($_POST['Name'])){

        if(($_POST['Name']!="") && ($_POST['Email']!="") && ($_POST['Feedback']!="")){

          $name = $_POST['Name'];
          $email = $_POST['Email'];
          $feedback = $_POST['Feedback'];      

          if(mysqli_connect_errno()) {
            echo "Failed to connect to MySQL:".mysqli_connect_error();
          }

            $sql = "INSERT INTO quizfeedback (name, email, feedback)VALUES('$name', '$email', '$feedback')";

            if(!mysqli_query($con,$sql)){

              die('Error:'.mysqli_error($con));

            }

            echo "<br>";
            echo "<p align=center>✅Thank you for your valuable feedback😊</p>";

            mysqli_close($con);


        }else{

          echo "<br>";
          echo "Please insert your feedback😊";

        }
        
      }
           
    ?>
      </div>   
    </center>
  </form>
</body>
</html>