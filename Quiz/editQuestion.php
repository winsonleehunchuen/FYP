<!DOCTYPE html>
<html>
<head>
	<title>Edit Question</title>
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
      padding-left:4%;
      padding-top: 8%;
    }

    .style{
      position: absolute;
      padding-top: 43%;
      right: 43%;
      color:#D83D5A;
    }

    .style1{
      position: absolute;
      padding-top: 43%;
      right: 41%;
      color:#D83D5A;
    }

    .form-control{
      width:90%;
    }

</style>
</head>
<body>
 <?php include "adminMenu.php"?>
 <?php 
      include "database.php";

    $id = $_REQUEST['que_id'];

        $result=mysqli_query($con,"SELECT * FROM quiz_question WHERE que_id = '$id'");
        $test = mysqli_fetch_array($result);

    if(!$result){
    die("Error: Data not found..");
    }

    $Testid=$test['test_id'];
    $Quedesc=$test['que_desc'];
    $Ans1=$test['ans1'];
    $Ans2=$test['ans2'];
    $Ans3=$test['ans3'];
    $Ans4=$test['ans4'];
    $Trueans=$test['true_ans'];



  if(isset($_POST['testid'])){
    if(($_POST['testid']!="") && ($_POST['addque']!="") && ($_POST['ans1']!="")
      && ($_POST['ans2']!="") && ($_POST['ans3']!="") && ($_POST['ans4']!="") && ($_POST['anstrue']!="")){
    $testid = $_POST['testid'];
    $addque=$_POST['addque'];
    $ans1=$_POST['ans1'];
    $ans2=$_POST['ans2'];
    $ans3=$_POST['ans3'];
    $ans4=$_POST['ans4'];
    $anstrue=$_POST['anstrue'];

    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
    }

    if( $anstrue > 4 || $anstrue < 0 || $anstrue == 0 ){

            ?>

            <div class="style1"><?php echo "Insert True Answer Number !";?></div>

            <?php

    }else{



    $sql = "UPDATE quiz_question SET test_id = '$testid' , que_desc = '$addque' , ans1 = '$ans1' , ans2 = '$ans2' , ans3 = '$ans3' , ans4 = '$ans4' , true_ans = '$anstrue' WHERE que_id = '$id'  ";

    if (mysqli_query($con, $sql)) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . mysqli_error($con);
    }

    mysqli_close($con);

    header("location: adminViewQuestion.php");



    }

    }else{

            ?>

            <div class="style"><?php echo "Please insert your thing !";?></div>

            <?php

      }
  }
  ?>
  <center>
    <div class ="all-Table">
    <h1>Edit Question :</h1>
    <form method="post">
      <table>
        <tr>
          <td width ="300px" height="50px" >Edit Select Test ID  : </td>
           <td width ="1100px" height="50px"><select class="form-control" style='width:90%;' value="<?php echo $Testid?>" name="testid">
            <?php

            include"database.php";
                $result=mysqli_query($con,"Select * from quiz_test order by test_id");
                    while($row=mysqli_fetch_array($result))
                {
                if($row[0]==$Testid)
                {
                  echo "<option value='$row[0]' selected>$row[2]</option>";
                }
                else
                {
                  echo "<option value='$row[0]'>$row[2]</option>";
                }
              }

            ?>
        </select></td></tr>
         <tr>
          <td width ="300px" height="50px" >Edit Question  : </td>
          <td width ="1100px" height="70px"><textarea class="form-control" name="addque" type="text" id="addque"><?php echo $Quedesc ?></textarea></td>
        </tr>
        <tr>
          <td width ="300px" height="50px" >Edit Answer1  : </td>
          <td width ="1100px" height="50px"><input class="form-control" value="<?php echo $Ans1?>" name="ans1" type="text" id="ans1"></td>
        </tr>
        <tr>
          <td width ="300px" height="50px" >Edit Answer2  : </td>
          <td width ="1100px" height="50px"><input class="form-control" value="<?php echo $Ans2?>" name="ans2" type="text" id="ans2"></td>
        </tr>
        <tr>
          <td width ="300px" height="50px" >Edit Answer3  : </td>
          <td width ="1100px" height="50px"><input class="form-control" value="<?php echo $Ans3?>" name="ans3" type="text" id="ans3"></td>
        </tr>
        <tr>
          <td width ="300px" height="50px" >Edit Answer4  : </td>
          <td width ="1100px" height="50px"><input class="form-control" value="<?php echo $Ans4?>" name="ans4" type="text" id="ans4"></td>
        </tr>
        <tr>
          <td width ="300px" height="50px" >Edit True Answer  : </td>
          <td width ="1100px" height="50px"><input class="form-control" value="<?php echo $Trueans?>" name="anstrue" type="number" id="anstrue"></td>
        </tr>
      </table><br>
      <input type="submit" name="Submit1" value="Update">
		</form>
	</div>
</body>
</html>