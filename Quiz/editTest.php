<!DOCTYPE html>
<html>
<head>
	<title>Edit Test</title>
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
      padding-top: 33%;
      right: 44%;
      color:#D83D5A;
    }

</style>
</head>
<body>
 <?php include "adminMenu.php"?>
 <?php 
      include "database.php";

    $id = $_REQUEST['test_id'];

        $result=mysqli_query($con,"SELECT * FROM quiz_test WHERE test_id = '$id'");
        $test = mysqli_fetch_array($result);

    if(!$result){
    die("Error: Data not found..");
    }

    $Subid=$test['sub_id'];
    $Testname=$test['test_name'];



  if(isset($_POST['subid'])){
    if(($_POST['subid']!="") && ($_POST['testname']!="")){
    $subid = $_POST['subid'];
    $testname=$_POST['testname'];

    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
    }

    
    $sql = "UPDATE quiz_test SET sub_id = '$subid' , test_name = '$testname' WHERE test_id = '$id'  ";

    if (mysqli_query($con, $sql)) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . mysqli_error($con);
    }

    mysqli_close($con);

    header("location: adminViewTest.php");

    }else{

            ?>

            <div class="style"><?php echo "Please insert your test !";?></div>

            <?php

      }
  }
  ?>
  <center>
    <div class ="all-Table">
    <h1>Edit Test :</h1>
    <form method="post">
      <table>
        <tr>
          <td width ="300px" height="50px" >Edit Subject ID  : </td>
           <td width ="500px" height="50px"><select class="form-control" style='width:210px;' value="<?php echo $Subid?>" name="subid">
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
          <td width ="300px" height="50px" >Edit Test Name  : </td>
          <td width ="500px" height="50px"><input class="form-control" value="<?php echo $Testname?>" name="testname" type="text" id="testname"></td>
        </tr>
      </table><br>
      <input type="submit" name="Submit1" value="Update">
		</form>
	</div>
</body>
</html>