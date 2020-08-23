<!DOCTYPE html>
<html>
<head>
  <title>Admin Add Question</title>
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

    .form-control{
      width:90%;
    }

    .php{
      position: absolute;
      top:85%;
      left:43%;
      color:#D83D5A;
    }

  </style>
</head>
<body>
  <?php include "adminMenu.php"?>
  <div class="php">
  <?php
      $ans1="";
      $ans2="";
      $ans3="";
      $ans4="";
      $anstrue="";
      $addque="";

        if(isset($_POST['testid']) && isset($_POST['addque']) && isset($_POST['ans1']) && isset($_POST['ans2']) && isset($_POST['ans3']) && isset($_POST['ans4']) && isset($_POST['anstrue'])){
        if(($_POST['testid']!="") && ($_POST['addque']!="") && ($_POST['ans1']!="") && ($_POST['ans2']!="") && ($_POST['ans3']!="") && ($_POST['ans4']!="") && ($_POST['anstrue']!="")){
            $testid = $_POST['testid'];
            $addque = $_POST['addque'];
            $ans1 = $_POST['ans1'];
            $ans2 = $_POST['ans2'];
            $ans3 = $_POST['ans3'];
            $ans4 = $_POST['ans4'];
            $anstrue = $_POST['anstrue'];

            $con=mysqli_connect("localhost","root","","quiz_exam");
        if(mysqli_connect_errno()) {//check connection
            echo "Failed to connect to MySQL:".mysqli_connect_error();
      }

      if( $anstrue > 4 || $anstrue < 0 || $anstrue == 0 ){
  
             echo "<br><br>";
             echo "Insert Correct Answer Number !";

      }else{



            $sql = "INSERT INTO quiz_question (test_id,que_desc,ans1,ans2,ans3,ans4,true_ans)VALUES('$testid','$addque','$ans1','$ans2','$ans3','$ans4','$anstrue')";
            
            if(!mysqli_query($con,$sql)){
            die('Error:'.mysqli_error($con));
      }

            echo "<br>";
            echo "<br>";
            echo "Question Added Successfully.";
            $ans1="";
            $ans2="";
            $ans3="";
            $ans4="";
            $anstrue="";
            $addque="";
            mysqli_close($con);


    
      }

      }else{
            echo "<br>";
            echo "<br>";
            echo "Please insert your question !";


      }
    }
  ?>
</div>
  <center>   
    <div class ="all-Table">
    <h1>Add Question :</h1>
    <form method="post" action="adminQuestionAdd.php" ENCTYPE="multipart/form-data">

      <table>
        <tr>
          <td width ="300px" height="50px" >Select Test ID  : </td>
          <td width ="1100px" height="50px"><select class="form-control" style='width:90%;' name="testid">
            <?php

            include"database.php";
                $result=mysqli_query($con,"Select * from quiz_test order by test_id");
                    while($row=mysqli_fetch_array($result))
                {
                if($row[0]==$testid)
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
          <td width ="300px" height="50px" >Enter Question  : </td>
          <td width ="1100px" height="70px"><textarea class="form-control" name="addque" type="text" id="addque"><?php echo $addque?></textarea></td>
        </tr>
        <tr>
          <td width ="300px" height="50px" >Enter Answer1  : </td>
          <td width ="1100px" height="50px"><input class="form-control" name="ans1" type="text" id="ans1" value="<?php echo $ans1?>"></td>
        </tr>
        <tr>
          <td width ="300px" height="50px" >Enter Answer2  : </td>
          <td width ="1100px" height="50px"><input class="form-control" name="ans2" type="text" id="ans2" value="<?php echo $ans2?>"></td>
        </tr>
        <tr>
          <td width ="300px" height="50px" >Enter Answer3  : </td>
          <td width ="1100px" height="50px"><input class="form-control" name="ans3" type="text" id="ans3" value="<?php echo $ans3?>"></td>
        </tr>
        <tr>
          <td width ="300px" height="50px" >Enter Answer4  : </td>
          <td width ="1100px" height="50px"><input class="form-control" name="ans4" type="text" id="ans4" value="<?php echo $ans4?>"></td>
        </tr>
        <tr>
          <td width ="300px" height="50px" >Enter True Answer  : </td>
          <td width ="1100px" height="50px"><input class="form-control" placeholder="Choose one answer from Answer1 to Answer4" name="anstrue" type="number" id="anstrue" value="<?php echo $anstrue?>"></td>
        </tr>
      </table><br>
      <input type="submit" name="Submit1" value="Add">

</form>
</div>
</center>
</body>
</html>

 
