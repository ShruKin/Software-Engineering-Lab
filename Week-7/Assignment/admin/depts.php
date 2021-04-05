<?php
include("./connection.php");

$query = "select * from dept";
$result = mysqli_query($con, $query);

if (isset($_REQUEST["del"])) {
  $query = "delete from dept where did='" . $_REQUEST["del"] . "'";
  $result = mysqli_query($con, $query);
  header("location:depts.php");
}

if (isset($_REQUEST["active"])) {
  $query = "update dept set active='" . $_REQUEST['active'] . "' where did='" . $_REQUEST["id"] . "'";
  $result = mysqli_query($con, $query);
  header("location:depts.php");
  echo $_REQUEST['active'];
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
  <a href="./dept_add.php">ADD DEPARTMENT</a>
  <table>
    <tr>
      <td>Department ID</td>
      <td>Name</td>
      <td>Edit</td>
      <td>Delete</td>
    </tr>

    <?php while ($fetch = mysqli_fetch_object($result)) { ?>
      <tr>
        <td><?php echo $fetch->did ?></td>
        <td><?php echo $fetch->dname ?></td>
        <td>
          <?php if ($fetch->active) { ?>
            <a href="?active=0&id=<?php echo $fetch->did ?>">Active</a>
          <?php } else { ?>
            <a href="?active=1&id=<?php echo $fetch->did ?>">Inactive</a>
          <?php } ?>
        </td>
        <td><a href="dept_edit.php?id=<?php echo $fetch->did ?>">Edit</a></td>
        <td><a href="depts.php?del=<?php echo $fetch->did ?>">Delete</a></td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>