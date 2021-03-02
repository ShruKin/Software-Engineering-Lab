<?php
include("./connection.php");

$query = "select * from user, course where user.cid = course.cid";
$result = mysqli_query($con, $query);

if (isset($_REQUEST["del"])) {
  $query = "delete from user where uid='" . $_REQUEST["del"] . "'";
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
  <a href="./user_add.php">ADD USER</a>
  <table>
    <tr>
      <td>User ID</td>
      <td>Name</td>
      <td>Image</td>
      <td>Course</td>
      <td>Address</td>
      <td>Email</td>
      <td>Edit</td>
      <td>Delete</td>
    </tr>

    <?php while ($fetch = mysqli_fetch_object($result)) { ?>
      <tr>
        <td><?php echo $fetch->uid ?></td>
        <td><?php echo $fetch->name ?></td>
        <td>
          <img src="<?php echo $fetch->p_image ?>" style="max-width:100px">
        </td>
        <td><?php echo $fetch->cname ?></td>
        <td><?php echo $fetch->address ?></td>
        <td><?php echo $fetch->email ?></td>
        <td><a href="user_edit.php?id=<?php echo $fetch->uid ?>">Edit</a></td>
        <td><a href="users.php?del=<?php echo $fetch->uid ?>">Delete</a></td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>