<?php
include("./connection.php");

$query = "select * from dept where active='1'";
$result = mysqli_query($con, $query);
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
  <table>
    <tr>
      <td>Department ID</td>
      <td>Name</td>
    </tr>

    <?php while ($fetch = mysqli_fetch_object($result)) { ?>
      <tr>
        <td><?php echo $fetch->did ?></td>
        <td><?php echo $fetch->dname ?></td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>