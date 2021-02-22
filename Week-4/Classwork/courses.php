<?php
include("./connection.php");

$query = "select * from course";
$result = mysqli_query($con, $query);

if (isset($_REQUEST["del"])) {
  $query = "delete from course where cid='" . $_REQUEST["del"] . "'";
  $result = mysqli_query($con, $query);
  header("location:courses.php");
}
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
      <td>Edit</td>
      <td>Delete</td>
    </tr>

    <?php while ($fetch = mysqli_fetch_object($result)) { ?>
      <tr>
        <td><?php echo $fetch->cid ?></td>
        <td><?php echo $fetch->cname ?></td>
        <td><a href="course_edit.php?id=<?php echo $fetch->cid ?>">Edit</a></td>
        <td><a href="courses.php?del=<?php echo $fetch->cid ?>">Delete</a></td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>