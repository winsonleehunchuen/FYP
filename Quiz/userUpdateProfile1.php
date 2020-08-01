<!DOCTYPE html>
<html>
<head>
  <title>User Update Profile1</title>
  <link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
  <link href="https://fonts.googleapis.com/css?family=Merienda+One|Yeseva+One&display=swap" rel="stylesheet">
<style>

  html{
    background-repeat: no-repeat;
    background-size: 1600px 980px;
    height:980px;
    background-image:url("images/background1.jpg");
  }

  body{
     margin: 0;
     font-family: 'Yeseva One', cursive;
  }

  *{
    font-family: 'Merienda One', cursive;
    font-weight: bold;
  }

   input[type=username] {
    border-radius: 0.4rem;
    width: 100%;
    padding: 7px 20px;
    box-sizing: border-box;
  }

  input[type=loginid] {
    border-radius: 0.4rem;
    width: 100%;
    padding: 7px 20px;
    box-sizing: border-box;
  }
  input[type=password] {
    border-radius: 0.4rem;
    width: 100%;
    padding: 7px 20px;
    box-sizing: border-box;
  }
  input[type=email] {
    border-radius: 0.4rem;
    width: 100%;
    padding: 7px 20px;
    box-sizing: border-box;
  }
    textarea[type=address] {
    border-radius: 0.4rem;
    border: 2px solid black;
    width: 100%;
    padding: 7px 20px;
    box-sizing: border-box;
  }
    input[type=city] {
    border-radius: 0.4rem;
    width: 100%;
    padding: 7px 20px;
    box-sizing: border-box;
  }
    input[type=tel] {
    border-radius: 0.4rem;
    width: 100%;
    padding: 7px 20px;
    box-sizing: border-box;
  }
  input[type=date]::-webkit-outer-spin-button,
  input[type=date]::-webkit-inner-spin-button{
    -webkit-appearance:none;
  }
  input[type=date] {
    border-radius: 0.4rem;
    padding: 5px 250px;
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
    padding: 5% 0
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
</head>
<body>
 <?php include "menu.php"?>

 <?php 
  include "database.php";

  $user_check=$_SESSION['loginid'];
  $ses_sql=mysqli_query($con,"select id from quizregisterpage where loginid='$user_check'");
  $row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
  $loggedin_id=$row['id'];

  $result=mysqli_query($con,"SELECT * FROM quizregisterpage WHERE id = $loggedin_id");          
  while($row=mysqli_fetch_array($result)){



  if(isset($_POST['Username'])){
    if(($_POST['Username']!="") && ($_POST['Address']!="") && ($_POST['City']!="") && ($_POST['Phone']!="") && ($_POST['Email']!="") && ($_POST['bday']!="") && ($_POST['Password']!="") && ($_POST['CPassword']!="")){

    $Username=$_POST['Username'];
    $Address=$_POST['Address'];
    $City=$_POST['City'];
    $Phone=$_POST['Phone'];
    $Email=$_POST['Email'];
    $bday=$_POST['bday'];
    $Password=$_POST['Password'];
    $CPassword=$_POST['CPassword'];

    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
    }

    if($Password != $CPassword){

          $password_error = "Sorry... the password not same!";

    }else{




    $sql = "UPDATE quizregisterpage SET  username = '$Username' , address = '$Address' , city = '$City' , phone = '$Phone' , email = '$Email' , birthday = '$bday' , password = '$Password' , confrimpassword = '$CPassword' WHERE  id = $loggedin_id  ";

    if (mysqli_query($con, $sql)) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . mysqli_error($con);
    }

    mysqli_close($con);

    header("location: userUpdateProfile.php");



    }

    }else{

       echo "Please insert your thing !";

      }
  }
  ?>

  <center>
    <form method="post">
        <div class="reg-Title">

          <table>
            <tr>
              <td><h1>Update Profile</h1></td><td><img src="images/picture1.png" width="129" height="100"></td>
            </tr>
          </table>

         <table>

          <tr><td><h4>Login ID : </h4></td><td><input type="loginid" name="LoginId" disabled value="<?php echo $row['loginid']?>" minlength="4" maxlength="8" required></td></tr>

          <tr><td><h4>Name : </h4></td><td><input type="username" name="Username" value="<?php echo $row['username']?>" required></td></tr>

          <tr><td><h4>Address : </h4></td><td><textarea type="address" name="Address" required><?php echo $row['address'] ?></textarea></td></tr>

          <tr><td><h4>City : </h4></td><td><input type="city" name="City" value="<?php echo $row['city']?>" required></td></tr>

          <tr><td><h4>Phone : </h4></td><td><input type="tel" name="Phone" placeholder="123-4567678"pattern="[0-9]{3}-[0-9]{7}" value="<?php echo $row['phone']?>" required></td></tr>

          <tr><td><h4>Email : </h4></td><td><input type="email" name="Email" value="<?php echo $row['email']?>" required></td></tr>

          <tr><td><h4>Birthday: </h4></td><td><input type="date" name="bday" value="<?php echo $row['birthday']?>" required>
          </td></tr>

          <tr><td><h4>Password : </h4></td><td>
          <div <?php if (isset($password_error)): ?> class="form_error" <?php endif ?> >
            <input type="password" name="Password" value="<?php echo $row['password']?>" required>
          <?php if (isset($password_error)): ?>
          <span><?php echo $password_error; ?></span>
          <?php endif ?>
          </div></td></tr>

          <tr><td><h4>Confrim Password : </h4></td><td>
          <div <?php if (isset($password_error)): ?> class="form_error" <?php endif ?> >
            <input type="password" name="CPassword" value="<?php echo $row['confrimpassword']?>" required>
          <?php if (isset($password_error)): ?>
          <span><?php echo $password_error; ?></span>
          <?php endif ?>
          </div></td></tr>

        </table>
        <br>
        <input class="button" type="submit" value="Upadte Profile">
    </form>
  </div>
<?php
}
?>
</body>
</html>