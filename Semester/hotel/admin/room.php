<?php
include("./connection.php");

$query = "select * from room, cat where cat.cid = room.cid";
$result = mysqli_query($con, $query);

if (isset($_REQUEST["del"])) {
  $query = "delete from room where rid='" . $_REQUEST["del"] . "'";
  $result = mysqli_query($con, $query);
  header("location:room.php");
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
  <a href="./room_add.php">ADD Room</a>
  <table>
    <tr>
      <td>Room ID</td>
      <td>Image</td>
      <td>Category</td>
      <td>Price</td>
      <td>Edit</td>
      <td>Delete</td>
    </tr>

    <?php while ($fetch = mysqli_fetch_object($result)) { ?>
      <tr>
        <td><?php echo $fetch->rid ?></td>
        <td>
          <img src="../uploads/<?php echo $fetch->image ?>" style="max-width:100px">
        </td>
        <td><?php echo $fetch->cname ?></td>
        <td><?php echo $fetch->price ?></td>
        <td><a href="room_edit.php?id=<?php echo $fetch->rid ?>">Edit</a></td>
        <td><a href="room.php?del=<?php echo $fetch->rid ?>">Delete</a></td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>