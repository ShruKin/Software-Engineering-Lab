<?php
include("./connection.php");

$query = "select * from user where uid='" . $_REQUEST['id'] . "'";
$result = mysqli_query($con, $query);
$fetch = mysqli_fetch_object($result);

$query = "select * from course";
$courses = mysqli_query($con, $query);

if (isset($_POST['click'])) {
  $query = "update user set name='" . $_POST['name'] . "', cid='" . $_POST['cid'] . "', address='" . $_POST['address'] . "', email='" . $_POST['email'] . "' where uid='" . $_REQUEST['id'] . "'";
  $result = mysqli_query($con, $query);
  header("location:users.php");
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
  <a href="./users.php">GO TO USERS</a>
  <form method="POST" action="">
    <table>
      <tr>
        <td><label for="name">Name</label></td>
        <td>:</td>
        <td><input type="text" name="name" id="name" value="<?php echo $fetch->name ?>"></td>
      </tr>
      <tr>
        <td><label for="cid">Select course</label></td>
        <td>:</td>
        <td>
          <select name="cid" id="cid">
            <?php while ($course = mysqli_fetch_object($courses)) { ?>
              <option value="<?php echo $course->cid ?>" <?php if ($course->cid == $fetch->cid) echo "selected" ?>><?php echo $course->cname ?></option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td><label for="address">Address</label></td>
        <td>:</td>
        <td><textarea name="address" id="address" cols="30" rows="3"><?php echo $fetch->address ?></textarea></td>
      </tr>
      <tr>
        <td><label for="email">Email</label></td>
        <td>:</td>
        <td><input type="email" name="email" id="email" value="<?php echo $fetch->email ?>"></td>
      </tr>
      <tr>
        <td colspan="3"><input type="submit" name="click" value="Edit"></td>
      </tr>
    </table>
  </form>
</body>

</html>