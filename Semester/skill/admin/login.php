<?php
$con=mysqli_connect("localhost","root","","skill");

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
?>
<html>

<h2>Admin Login</h2>

<form method="post" action="" enctype="multipart/form-data">
    <table>
      <tr><td>
      <p style="font-size:120%;">Email ID: </p>
      </td>
      <td><input type="text" name="email" value="" /></td>
      </tr>
      <tr><td>
      <p style="font-size:120%;">Password: </p>
      </td>
      <td><input type= "password" name="password" value=""/></td>
      </tr>
      <tr><td ><input style="font-size:120%;" type="submit" name="login" value="Login" /></td></tr>
    </table>
  </form>

<html>