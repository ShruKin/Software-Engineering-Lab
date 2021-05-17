<?php
include("./sqlcon.php");

$query = "select * from cour, prog where prog.c_id = cour.c_id";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">


<body>
  <a href="./cart.php">View Cart</a>
  <table>
    <tr>
      <td>prog ID</td>
      <td>Name</td>
      <td>Course</td> 
      <td>Price</td>
      <td>Cart</td>
    </tr>

    <?php while ($fetch = mysqli_fetch_object($result)) { ?>
      <tr>
        <td><?php echo $fetch->u_id ?></td>
        <td><?php echo $fetch->name ?></td>
        <td><?php echo $fetch->c_name ?></td>
        <td><?php echo $fetch->price ?></td>
        <td><a href="cart.php?id=<?php echo $fetch->u_id ?>">Add to cart</a></td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>