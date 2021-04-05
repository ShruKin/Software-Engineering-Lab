<?php
include("./connection.php");

$query = "select * from course where status='1'";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Week 4</title>
</head>

<body>
  <a href="./course_add.php">ADD COURSE</a>
  <table>
    <tr>
      <td>User ID</td>
      <td>Name</td>
    </tr>

    <?php while ($fetch = mysqli_fetch_object($result)) { ?>
      <tr>
        <td><?php echo $fetch->cid ?></td>
        <td><?php echo $fetch->cname ?></td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>