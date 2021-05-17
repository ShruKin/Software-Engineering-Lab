<?php
include("./connection.php");

$query = "select *, doctor.active as dact from doctor, cat where doctor.dept = cat.cid";
$result = mysqli_query($con, $query);

if (isset($_REQUEST["del"])) {
  $query = "delete from doctor where id='" . $_REQUEST["del"] . "'";
  $result = mysqli_query($con, $query);
  header("location:index.php");
}

if (isset($_REQUEST["active"])) {
  $query = "update doctor set active='" . $_REQUEST['active'] . "' where id='" . $_REQUEST["id"] . "'";
  $result = mysqli_query($con, $query);
  header("location:index.php");
  echo $_REQUEST['active'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
</head>

<body>
  <h1>Doctor Appointment doctor</h1>
  <a href="./cats.php">Categories</a>
  <a href="./doctorAdd.php">ADD New doctor</a>

  <table>
    <tr>
      <td>Doctor ID</td>
      <td>Name</td>
      <td>Day </td>
      <td>Department</td>
      <td>Price</td>
      <td>Active</td>
      <td>Edit</td>
      <td>Delete</td>
    </tr>

    <?php while ($fetch = mysqli_fetch_object($result)) { ?>
      <tr>
        <td><?php echo $fetch->id ?></td>
        <td><?php echo $fetch->name ?></td>
        <td><?php echo $fetch->speed ?></td>
        <td><?php echo $fetch->cname ?></td>
        <td><?php echo $fetch->price ?></td>
        <td>
          <?php if ($fetch->dact) { ?>
            <a href="?active=0&id=<?php echo $fetch->id ?>">Active</a>
          <?php } else { ?>
            <a href="?active=1&id=<?php echo $fetch->id ?>">Inactive</a>
          <?php } ?>
        </td>
        <td><a href="doctorEdit.php?id=<?php echo $fetch->id ?>">Edit</a></td>
        <td><a href="?del=<?php echo $fetch->id ?>">Delete</a></td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>