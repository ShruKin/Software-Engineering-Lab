<?php
$con = mysqli_connect("localhost", "root", "", "demo1");
@session_start();

if ($_SESSION['NAME'] == '') {
    header("location:login.php");
}
