<!DOCTYPE html>
<html>
<head>
  <title>Admin Add Test</title>
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

    .php{
      position: absolute;
      top:64%;
      left:43%;
      color:#D83D5A;
    }

  </style>
</head>
<body>
  <?php include "adminMenu.php"?>

<div class="php">
        <?php
        $testname="";

        if(isset($_POST['subid']) && isset($_POST['testname'])){
        if(($_POST['subid']!="") && ($_POST['testname']!="")){
            $subid = $_POST['subid'];
            $testname = $_POST['testname'];

            $con=mysqli_connect("localhost","root","","quiz_exam");
        if(mysqli_connect_errno()) {//check connection
            echo "Failed to connect to MySQL:".mysqli_connect_error();
        }   

            $sql = "INSERT INTO quiz_test (sub_id,test_name)VALUES('$subid','$testname')";
            if(!mysqli_query($con,$sql)){
            die('Error:'.mysqli_error($con));
            }
            
             echo "Test <b> \" $testname \"</b> Added Successfully.";
             mysqli_close($con);
    
      }else{
            echo "&nbsp;&nbsp;Please insert your test !";
      }
    }
  ?>
</div>

  <center>   
    <div class ="all-Table">
    <h1>Add Test :</h1>
    <form method="post" action="adminTestAdd.php" ENCTYPE="multipart/form-data">

      <table>
        <tr>
          <td width ="300px" height="50px" >Enter Subject ID  : </td>
          <td width ="500px" height="50px"><select class="form-control" style='width:210px;' name="subid">
            <?php

            include"database.php";
                $result=mysqli_query($con,"Select * from quiz_subject order by sub_name");
                    while($row=mysqli_fetch_array($result))
                {
                if($row[0]==$subid)
                {
                  echo "<option value='$row[0]' selected>$row[1]</option>";
                }
                else
                {
                  echo "<option value='$row[0]'>$row[1]</option>";
                }
              }

            ?>
        </select></td></tr>
        <tr>
          <td width ="300px" height="50px" >Enter Test Name  : </td>
          <td width ="500px" height="50px"><input class="form-control" name="testname" type="text" id="testname" value="<?php echo $testname?>"></td>
        </tr>
      </table><br>
      <input type="submit" name="Submit1" value="Add">

</form>
</div>
</center>
</body>
</html>

 
