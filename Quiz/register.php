<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<link href="https://fonts.googleapis.com/css?family=Merienda+One|Yeseva+One&display=swap" rel="stylesheet">
<link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
<head>
<title>Register Page</title>
  <style>
  body{
     margin: 0;
     font-family: 'Yeseva One', cursive;
  }

  *{
    font-family: 'Merienda One', cursive;
    
  }
  html{
    background-repeat: no-repeat;
    background-size: 100% 100%;
    height:980px;
    background-image:url("images/background.jpg");
  }

  input[type=username] {
    border-radius: 0.4rem;
    width: 100%;
    padding: 7px 20px;
    box-sizing: border-box;
    font-weight: bold;
  }

  input[type=loginid] {
    border-radius: 0.4rem;
    width: 100%;
    padding: 7px 20px;
    box-sizing: border-box;
    font-weight: bold;
  }
  input[type=password] {
    border-radius: 0.4rem;
    width: 100%;
    padding: 7px 20px;
    box-sizing: border-box;
    font-weight: bold;
  }
  input[type=email] {
    border-radius: 0.4rem;
    width: 100%;
    padding: 7px 20px;
    box-sizing: border-box;
    font-weight: bold;
  }
    textarea[type=address] {
    border-radius: 0.4rem;
    border: 2px solid black;
    width: 100%;
    padding: 7px 20px;
    box-sizing: border-box;
    font-weight: bold;
  }
    input[type=city] {
    border-radius: 0.4rem;
    width: 100%;
    padding: 7px 20px;
    box-sizing: border-box;
    font-weight: bold;
  }
    input[type=tel] {
    border-radius: 0.4rem;
    width: 100%;
    padding: 7px 20px;
    box-sizing: border-box;
    font-weight: bold;
  }
  input[type=date]::-webkit-outer-spin-button,
  input[type=date]::-webkit-inner-spin-button{
    -webkit-appearance:none;
  }
  input[type=date] {
    border-radius: 0.4rem;
    padding: 5px 250px;
    box-sizing: border-box;
    font-weight: bold;
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

  .button1{
    position: relative;
    padding-left: 33%;
    padding-top: 10px;
  }

  a{
    font-weight: bold;
  }

  a:hover {
    color: #20B2AA;
    text-decoration: underline;
  }

  .form_error span {
    font-size: 1.0em;
    color: #D83D5A;
    font-weight: bold;
  }

  .form_error input {
    border: 1px solid #D83D5A;
  }

  .modal {
      display: none; 
      position: fixed;
      z-index: 1; 
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
      width: 60%;
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
<head>
  <title>Register Page</title>
</head>
<body>

    <?php

    include "database.php";

    $loginid="";
    $username="";
    $email="";
    $password="";
    $cpassword="";
    $phone="";
    $city="";
    $address="";
    
    if(isset($_POST['LoginId']) && isset($_POST['Username']) && isset($_POST['Address']) && isset($_POST['City']) && isset($_POST['Phone']) && isset($_POST['Email']) && isset($_POST['bday']) && isset($_POST['Password']) && isset($_POST['CPassword'])){

      if(($_POST['LoginId']!="") && ($_POST['Username']!="") && ($_POST['Address']!="") && ($_POST['City']!="") && ($_POST['Phone']!="") && ($_POST['Email']!="") && ($_POST['bday']!="") && ($_POST['Password']!="") && ($_POST['CPassword']!="")){

        $loginid = $_POST['LoginId'];
        $username = $_POST['Username'];
        $address = $_POST['Address'];
        $city = $_POST['City'];
        $phone = $_POST['Phone'];
        $email = $_POST['Email'];
        $birthday = $_POST['bday'];
        $password = $_POST['Password'];
        $cpassword = $_POST['CPassword'];            

        if(mysqli_connect_errno()) {
          echo "Failed to connect to MySQL:".mysqli_connect_error();
        }

        if($password != $cpassword){

          $password_error = "Sorry... the password not same!";

        }else if(!isset($_POST['Checkbox'])){

          $term_error = "Please agree the Terms and Conditions!";

        }else{

            $sql_l = "SELECT * FROM quizregisterpage WHERE loginid='$loginid'";
            $res_l = mysqli_query($con, $sql_l);

        if (mysqli_num_rows($res_l) > 0) {

            $loginid_error = "Sorry... login id already taken";  

        }else{

          $sql = "INSERT INTO quizregisterpage (loginid, username, user_type, address, city, phone, email, birthday, password, confrimpassword)VALUES('$loginid', '$username', 'user', '$address', '$city', '$phone', '$email','$birthday','$password','$cpassword')";

          if(!mysqli_query($con,$sql)){

            die('Error:'.mysqli_error($con));

          }

          $_SESSION['loginid'] = $loginid;
          header("Location:userpage.php");

          mysqli_close($con);

            }

      }

      }else{

        echo "Please fill up all of the data first before insert!";

      }
      
    }
         
    ?>


    <center>
      <form method="post">
        <div class="reg-Title">
          <table>
            <tr>
              <td><h1>Register Form</h1></td><td><img src="images/picture1.png" width="129" height="100"></td>
            </tr>
          </table>
         <table>

          <tr><td><h4>Login ID : </h4></td><td>
            <div <?php if (isset($loginid_error)): ?> class="form_error" <?php endif ?> >
            <input type="loginid" name="LoginId" minlength="4" maxlength="8" value="<?php echo $loginid; ?>" required>
            <?php if (isset($loginid_error)): ?>
            <span><?php echo $loginid_error; ?></span>
            <?php endif ?>
            </div></td></tr>

          <tr><td><h4>Name : </h4></td><td><input type="username" name="Username" value="<?php echo $username; ?>" required></td></tr>

          <tr><td><h4>Address : </h4></td><td><textarea type="address" name="Address" required><?php echo $address; ?></textarea></td></tr>

          <tr><td><h4>City : </h4></td><td><input type="city" name="City" value="<?php echo $city; ?>" required></td></tr>

          <tr><td><h4>Phone : </h4></td><td><input type="tel" name="Phone" placeholder="123-4567678"pattern="[0-9]{3}-[0-9]{7}" value="<?php echo $phone; ?>" required></td></tr>

          <tr><td><h4>Email : </h4></td><td><input type="email" name="Email" value="<?php echo $email; ?>" required></td></tr>

          <tr><td><h4>Birthday: </h4></td><td><input type="date" name="bday" value="<?php echo $birthday; ?>" required></td></tr>

          <tr><td><h4>Password : </h4></td><td>
          <div <?php if (isset($password_error)): ?> class="form_error" <?php endif ?> >
          <input type="password" name="Password" value="<?php echo $password; ?>" required> 
          <?php if (isset($password_error)): ?>
          <span><?php echo $password_error; ?></span>
          <?php endif ?>
          </div></td></tr>

          <tr><td><h4>Confrim Password : </h4></td><td>
          <div <?php if (isset($password_error)): ?> class="form_error" <?php endif ?> >
          <input type="password" name="CPassword" value="<?php echo $cpassword; ?>" required>
          <?php if (isset($password_error)): ?>
          <span><?php echo $password_error; ?></span>
          <?php endif ?>
          </div></td></tr>

        </table>
          <br/>
          <div <?php if (isset($term_error)): ?> class="form_error" <?php endif ?> >
            <input type="checkbox" name="Checkbox"><a id="myBtn">Term & Condition</a>
          <?php if (isset($term_error)): ?><br>
          <span><?php echo $term_error; ?></span>
          <?php endif ?>
          </div>
        </center>

        <div id="myModal" class="modal">
          <div class="modal-content">
            <div class="modal-header">
              <span class="close">&times;</span>
            <h3>Terms and Conditions</h3>
          </div>
          <br>
         <p>The Quizling website and all its mobile versions and applications (“Services”) is a hosted Services operated by Quizling PTY LTD (“Quizling”). Any use of the Services is subject to the following Terms and Conditions of Use (“Terms and Conditions”), as well as to Quizling’s Privacy Policy at www.quizlingapp.com/privacy, all of which are incorporated by reference into these Terms and Conditions.
         Quizling PTY LTD recommends that if you are under 18, you should have a parent or carer read through these terms with you. These are rules, and you must fully understand them.
         Your use of the Services will show your acceptance of these terms and conditions.
         1. Suitability. Use of the Services is void where prohibited. The Services is for users of all ages. For children under 13, Quizling recommends parental consent. By using the Services, you represent and certify that (a) all registration information you submit is truthful and accurate; (b) you will maintain the accuracy of such information; and (c) your use of the Services does not violate any applicable law or regulation.
         2. Your Quizling Account and Data. If you create an account on the Services, you are responsible for maintaining the security of your account and data, and you are fully responsible for all activities that occur under the account. You must immediately notify Quizling of any unauthorized uses of your data, your account or any other breaches of security. Quizling will not be liable for any acts or omissions by You, including any damages of any kind incurred as a result of such acts or omissions. Quizling may from time to time set storage limits for your data, or take any other measures Quizling considers appropriate to manage the Services. Quizling may also from time to time change its policies on offering commercial content or displaying advertising, and it may do this without notice.
         3. Prohibited Content and Activities, and Responsibility of Contributors. If you create quizzes, post material to the Services, post links on the Services, or otherwise make material available by means of the Services (any such material, “Content”), you are entirely responsible for the content of, and any harm resulting from, that Content. That is the case regardless of whether the Content in question constitutes text, graphics, an audio file, computer software or any other format in which Quizling stores data. The purpose of the Services is learning, and users are asked to post only educational related Content.
        <br><br>
        Infringement Notices should be sent to the following:
        <br><br>
        By mail:<br>
        DMCA Notice<br>
        Quizling Pty Ltd<br>
        GPO Box 1711<br>
        Canberra ACT Australia<br>
        2601<br>
        <br>
        By email:<br>
        leehunchuen8669@e.djzhlc.edu.my</p>
        </div>
      </div>
          <script>
          var modal = document.getElementById("myModal");
          var btn = document.getElementById("myBtn");
          var span = document.getElementsByClassName("close")[0];
          btn.onclick = function() {
              modal.style.display = "block";
          }
          span.onclick = function() {
              modal.style.display = "none";
          }   
          window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
          }
          </script>

        <center>
        <div class="button1">
        <table><tr><td width=20%>
        <input class="button" type="submit" value="Register"></td><td width=49%><a href="index.php">Already Register !</a></td></tr></table>
        </div>
      </div>
    </center>
  </form>
</body>
</html>