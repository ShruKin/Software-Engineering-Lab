<?php
include("./connection.php");

$query = "select * from plans";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Internet</title>
</head>

<body>
  <h1>Internet Plans</h1>

  <table>
    <tr>
      <td>Plan ID</td>
      <td>Name</td>
      <td>Speed</td>
      <td>Price</td>
      <td>Select & Pay</td>
    </tr>
    <?php while ($fetch = mysqli_fetch_object($result)) { ?>
      <tr>
        <td><?php echo $fetch->id ?></td>
        <td><?php echo $fetch->name ?></td>
        <td><?php echo $fetch->speed ?></td>
        <td><?php echo $fetch->price ?></td>
        <td><a href="checkout.php?id=<?php echo $fetch->id ?>">Select & Pay</a></td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>