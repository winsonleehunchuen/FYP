<?php
session_start();
unset($_SESSION['loginid']);
header("Location:index.php");
?>