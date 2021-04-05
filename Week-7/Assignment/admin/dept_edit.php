<?php
include("./connection.php");

$query = "select * from dept where did='" . $_REQUEST['id'] . "'";
$result = mysqli_query($con, $query);
$fetch = mysqli_fetch_object($result);

if (isset($_POST['click'])) {
  $query = "update dept set dname='" . $_POST['name'] . "' where did='" . $_REQUEST['id'] . "'";
  $result = mysqli_query($con, $query);
  header("location:depts.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment 5</title>
</head>

<body>
  <h1>Edit Department</h1>
  <a href="./depts.php">GO TO DEPARTMENTS</a>
  <form method="POST" action="">
    <table>
      <tr>
        <td><label for="name">Department Name</label></td>
        <td>:</td>
        <td><input type="text" name="name" id="name" value="<?php echo $fetch->dname ?>"></td>
      </tr>
      <tr>
        <td colspan="3"><input type="submit" name="click" value="Edit"></td>
      </tr>
    </table>
  </form>
</body>

</html>