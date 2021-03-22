<?php
include("./connection.php");

$query = "select * from course where cid='" . $_REQUEST['id'] . "'";
$result = mysqli_query($con, $query);
$fetch = mysqli_fetch_object($result);

if (isset($_POST['click'])) {
  $query = "update course set cname='" . $_POST['name'] . "' where cid='" . $_REQUEST['id'] . "'";
  $result = mysqli_query($con, $query);
  header("location:courses.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Week 4</title>
</head>

<body>
  <h1>Edit Details</h1>
  <a href="./courses.php">GO TO USERS</a>
  <form method="POST" action="">
    <table>
      <tr>
        <td><label for="name">Name</label></td>
        <td>:</td>
        <td><input type="text" name="name" id="name" value="<?php echo $fetch->cname ?>"></td>
      </tr>
      <tr>
        <td colspan="3"><input type="submit" name="click" value="Edit"></td>
      </tr>
    </table>
  </form>
</body>

</html>