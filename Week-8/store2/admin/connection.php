<?php
$con = mysqli_connect("localhost", "root", "", "store");

@session_start();
if ($_SESSION['NAME'] == '') {
    header("location:login.php");
}
?>

<a href="logout.php">Logout</a>
<br />