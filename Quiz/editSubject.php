<!DOCTYPE html>
<html>
<head>
	<title>Edit Subject</title>
  <link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
<style>

    *{
      font-weight: bold;
    }

    table {
      border-collapse: collapse;
      text-align: center;
    }

    table, td, th {
      border: 1px solid black;
    }

    body{
      background-color:#DBFFFF;
      margin: 0;

    }

    .all-Table{
      position: absolute;
      margin: 13% 24%;
    }

    .style{
      position: absolute;
      padding-top: 27%;
      right: 41%;
      color:#D83D5A;
    }

</style>
</head>
<body>
 <?php include "adminMenu.php"?>
 <?php 
      include "database.php";

    $id = $_REQUEST['sub_id'];

        $result=mysqli_query($con,"SELECT * FROM quiz_subject WHERE sub_id = '$id'");
        $test = mysqli_fetch_array($result);

    if(!$result){
    die("Error: Data not found..");
    }

    $Subname=$test['sub_name'];



  if(isset($_POST['subname'])){
    if(($_POST['subname']!="")){
    
    $subname = $_POST['subname'];

    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "UPDATE quiz_subject SET sub_name = '$subname' WHERE sub_id = '$id'  ";

    if (mysqli_query($con, $sql)) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . mysqli_error($con);
    }

    mysqli_close($con);

    header("location: adminViewSubject.php");

    }else{

          ?>

            <div class="style"><?php echo "Please insert your Subject Name !";?></div>
            
          <?php
    }

  }
  ?>
  <center>
    <div class ="all-Table">
    <h1>Edit Subject Name :</h1>
    <form method="post">
      <table>
        <tr>
          <td width ="300px" height="50px" >Edit Subject Name  : </td>
          <td width ="500px" height="50px"><input class="form-control" value="<?php echo $Subname?>" name="subname" placeholder="Enter Language Name" type="text" id="subname"></td>
        </tr>
      </table><br>
      <input type="submit" name="Submit1" value="Update">
		</form>
	</div>
</body>
</html>