<?php
include("include/header.php");

$con=mysqli_connect("localhost","root","","skill");
@session_start();
if ($_SESSION['NAME'] == '') {
    header("location:login.php");
}
?>

