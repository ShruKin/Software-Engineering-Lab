<?php
include("./connection.php");

$query = "select doctor.*, orders.id as oid from orders, doctor where orders.pid=doctor.id";
$result = mysqli_query($con, $query);
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
  <h1>Orders</h1>

  <table>
    <tr>
      <td>Order ID</td>
      <td>Doctor ID</td>
      <td>Name</td>
      <td>Day</td>
      <td>Price</td>
    </tr>

    <?php while ($fetch = mysqli_fetch_object($result)) { ?>
      <tr>
        <td><?php echo $fetch->oid ?></td>
        <td><?php echo $fetch->id ?></td>
        <td><?php echo $fetch->name ?></td>
        <td><?php echo $fetch->speed ?></td>
        <td><?php echo $fetch->price ?></td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>