<?php
$con = mysqli_connect("localhost", "root", "", "demo1");
if (isset($_REQUEST['login'])) {
  $query = "select * from admin where email='" . $_REQUEST['email'] . "' and password='" . $_REQUEST['password'] . "' and status='active'";
  $result = mysqli_query($con, $query);
  $count = mysqli_num_rows($result);
  $fetch = mysqli_fetch_object($result);

  if ($count > 0) {
    @session_start();
    $_SESSION['NAME'] = $fetch->name;
    $_SESSION['EMAIL'] = $fetch->email;
    $_SESSION['AID'] = $fetch->id;
    header("location:index.php");
  }
}
