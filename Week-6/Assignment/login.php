<?php
$con = mysqli_connect("localhost", "root", "", "office");
if (isset($_REQUEST['login'])) {
  $query = "select * from admin where email='" . $_REQUEST['email'] . "' and password='" . $_REQUEST['password'] . "' and active=1";
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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <form action="login.php" method="POST">
    <table>
      <tr>
        <td><label for="name">Email ID</label></td>
        <td>:</td>
        <td><input type="email" name="email" id="email"></td>
      </tr>
      <tr>
        <td><label for="name">Password</label></td>
        <td>:</td>
        <td><input type="password" name="password" id="password"></td>
      </tr>
      <tr>
        <td colspan="3"><input type="submit" name="login" value="Login"></td>
      </tr>
    </table>
  </form>

</body>

</html>