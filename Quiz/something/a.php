 <?php
$target_dir = "profile/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Check if file already exists
if (file_exists($target_file)){
  echo "Sorry, file already exists.<br>";
  $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000){
  echo "Sorry, your file is too large.<br>";
  $uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
  $uploadOk = 0;
}
//Check if $uploadOk is set to 0 by an error
if($uploadOk == 0){ 
  echo "Sorry, your file was not uploaded.<br>";
// if everything is ok, try to upload file
} else {
  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}
?>

<?php
if(isset($_POST['submit'])){
	$file = $_FILES['file'];

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['name'];
	$fileSize = $_FILES['file']['name'];
	$fileError = $_FILES['file']['name'];
	$fileType = $_FILES['file']['name'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png', 'pdf');

	if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 1000000) {
					$fileNameNew = uniqid('', true).".".$fileActualExt;
					$fileDesrination = 'uploads/'.$fileNameNew;
					move_uploaded_file($fileTmpName, $fileDestination);
					header("Location: index.php");
				} else {
					echo "Your file is too big!";
				}
			} else {
				echo "There was an error uploading your file!";
			}
	} else {
		echo "You cannot upload files of this type!";
	}

}
?>

<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.testname.value;
if (mt.length<1) {
alert("Please Enter Test Name");
document.form1.testname.focus();
return false;
}
tt=document.form1.totque.value;
if(tt.length<1) {
alert("Please Enter Total Question");
document.form1.totque.value;
return false;
}
return true;
}

$sql_query = "select count(*) as cntUser from quizregisterpage where loginid='".$uname."' and password='".$password."'";
								$result = mysqli_query($con,$sql_query);
								$row = mysqli_fetch_array($result);

								$count = $row['cntUser'];

								if($count > 0){

									$_SESSION['loginid'] = $uname;
									header("Location:userpage.php");


								}else {
									echo "Invalid Login ID and Password!";
								}







$sql_e = "SELECT * FROM quizregisterpage WHERE email='$email'";
            $res_e = mysqli_query($con, $sql_e);

if(mysqli_num_rows($res_e) > 0){

            $email_error = "Sorry... email already taken";
        }