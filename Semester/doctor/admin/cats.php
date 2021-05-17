<?php
include("./connection.php");

$query = "select * from cat";
$result = mysqli_query($con, $query);

if (isset($_REQUEST["del"])) {
  $query = "delete from cat where cid='" . $_REQUEST["del"] . "'";
  $result = mysqli_query($con, $query);
  header("location:cats.php");
}

if (isset($_REQUEST["active"])) {
  $query = "update cat set active='" . $_REQUEST['active'] . "' where cid='" . $_REQUEST["id"] . "'";
  $result = mysqli_query($con, $query);
  header("location:cats.php");
  echo $_REQUEST['active'];
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
  <a href="./cat_add.php">ADD Category</a>
  <table>
    <tr>
      <td>Category ID</td>
      <td>Name</td>
      <td>Active</td>
      <td>Edit</td>
      <td>Delete</td>
    </tr>

    <?php while ($fetch = mysqli_fetch_object($result)) { ?>
      <tr>
        <td><?php echo $fetch->cid ?></td>
        <td><?php echo $fetch->cname ?></td>
        <td>
          <?php if ($fetch->active) { ?>
            <a href="?active=0&id=<?php echo $fetch->cid ?>">Active</a>
          <?php } else { ?>
            <a href="?active=1&id=<?php echo $fetch->cid ?>">Inactive</a>
          <?php } ?>
        </td>
        <td><a href="cat_edit.php?id=<?php echo $fetch->cid ?>">Edit</a></td>
        <td><a href="cats.php?del=<?php echo $fetch->cid ?>">Delete</a></td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>