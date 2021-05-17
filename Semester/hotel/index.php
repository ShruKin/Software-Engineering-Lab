<?php
include("./connection.php");

$query = "select * from room, cat where cat.cid = room.cid";
$result = mysqli_query($con, $query);
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
  <a href="./cart.php">View Cart</a>
  <table>
    <tr>
      <td>Room ID</td>
      <td>Image</td>
      <td>Price</td>
      <td>Category</td>
      <td>Cart</td>
    </tr>

    <?php while ($fetch = mysqli_fetch_object($result)) { ?>
      <tr>
        <td><?php echo $fetch->rid ?></td>
        <td>
          <img src="./uploads/<?php echo $fetch->image ?>" style="max-width:100px">
        </td>

        <td><?php echo $fetch->price ?></td>
        <td> <?php echo $fetch->cname ?> </td>
        <td><a href="cart.php?id=<?php echo $fetch->rid ?>">Add to cart</a></td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>