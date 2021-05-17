<?php
session_start();
unset($_SESSION['NAME']);
unset($_SESSION['EMAIL']);
unset($_SESSION['AID']);
header("location:login.php");
?>
