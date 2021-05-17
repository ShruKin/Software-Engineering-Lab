<?php
include("./connection.php");

$query = "select * from prod, cat where cat.cid = prod.cid";
$result = mysqli_query($con, $query);

if (isset($_REQUEST["del"])) {
  $query = "delete from prod where pid='" . $_REQUEST["del"] . "'";
  $result = mysqli_query($con, $query);
  header("location:prods.php");
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
  <a href="./prod_add.php">ADD Movie</a>
  <table>
    <tr>
      <td>Movie ID</td>
      <td>Movie</td>
      <td>Ticket Available</td>
      <td>Image</td>
      <td>Category</td>
      <td>Price</td>
      <td>Edit</td>
      <td>Delete</td>
    </tr>

    <?php while ($fetch = mysqli_fetch_object($result)) { ?>
      <tr>
        <td><?php echo $fetch->pid ?></td>
        <td><?php echo $fetch->name ?></td>
        <td><?php echo $fetch->TA ?></td>
        <td>
          <img src="../uploads/<?php echo $fetch->image ?>" style="max-width:100px">
        </td>
        <td><?php echo $fetch->cname ?></td>
        <td><?php echo $fetch->price ?></td>
        <td><a href="prod_edit.php?id=<?php echo $fetch->pid ?>">Edit</a></td>
        <td><a href="prods.php?del=<?php echo $fetch->pid ?>">Delete</a></td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>