<?php
include("../connection.php");

$query = "select * from station";
$result = mysqli_query($con, $query);

if (isset($_REQUEST["del"])) {
  $query = "delete from station where sid='" . $_REQUEST["del"] . "'";
  $result = mysqli_query($con, $query);
  header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Store</title>
</head>

<body>
  <a href="../index.php">Dashboard</a>
  <br />
  <a href="./stn_add.php">ADD Station</a>
  <table>
    <tr>
      <td>Station ID</td>
      <td>Name</td>
      <td>Station Code</td>
      <td>Edit</td>
      <td>Delete</td>
    </tr>

    <?php while ($fetch = mysqli_fetch_object($result)) { ?>
      <tr>
        <td><?php echo $fetch->sid ?></td>
        <td><?php echo $fetch->sname ?></td>
        <td><?php echo $fetch->scode ?></td>
        <td><a href="stn_edit.php?id=<?php echo $fetch->sid ?>">Edit</a></td>
        <td><a href="index.php?del=<?php echo $fetch->sid ?>">Delete</a></td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>