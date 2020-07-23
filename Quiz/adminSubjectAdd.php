<!DOCTYPE html>
<html>
<head>
  <title>Admin Add Subject</title>
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
      font-weight: bold;
    }

    .all-Table{
      position: absolute;
      margin: 13% 24%;
    }

    .php{
      position: absolute;
      top:50%;
      left:42%;
      color:#D83D5A;
    }

  </style>
</head>
<body>
  <?php include "adminMenu.php"?>

<div class="php">
<?php
$subname="";

        if(isset($_POST['subname'])){
        if(($_POST['subname']!="")){
            $subname = $_POST['subname'];

            $con=mysqli_connect("localhost","root","","quiz_exam");
        if(mysqli_connect_errno()) {//check connection
            echo "Failed to connect to MySQL:".mysqli_connect_error();
      }
            $sql = "INSERT INTO quiz_subject (sub_name)VALUES('$subname')";
            if(!mysqli_query($con,$sql)){
            die('Error:'.mysqli_error($con));
      }

            echo "<br>";
            echo "<br>";
            echo "Subject <b> \" $subname \"</b> Added Successfully.";
             mysqli_close($con);
    
      }else{
            echo "<br>";
            echo "<br>";
            echo "Please insert your Subject Name !";
      }
    }
  ?>
</div>

  <center>
    <div class ="all-Table">
    <h1>Insert Subject Name :</h1>
    <form method="post" action="adminSubjectAdd.php" ENCTYPE="multipart/form-data">

      <table>
        <tr>
          <td width ="300px" height="50px" >Enter Subject Name  : </td>
          <td width ="500px" height="50px"><input class="form-control" name="subname" placeholder="Enter Language Name" type="text" id="subname" value="<?php echo $subname?>"></td>
        </tr>
      </table><br>
      <input type="submit" name="Submit1" value="Add">
      
</form>
</div>
</center>
</body>
</html>

 
