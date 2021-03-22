<?php
include("./connection.php");

$query = "select * from emp, dept where dept.did = emp.did";
$result = mysqli_query($con, $query);

if (isset($_REQUEST["del"])) {
  $query = "delete from emp where eid='" . $_REQUEST["del"] . "'";
  $result = mysqli_query($con, $query);
  header("location:emps.php");
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
  <a href="./emp_add.php">ADD EMPLOYEE</a>
  <table>
    <tr>
      <td>Employee ID</td>
      <td>Name</td>
      <td>Image</td>
      <td>Department</td>
      <td>Address</td>
      <td>Email</td>
      <td>Edit</td>
      <td>Delete</td>
    </tr>

    <?php while ($fetch = mysqli_fetch_object($result)) { ?>
      <tr>
        <td><?php echo $fetch->eid ?></td>
        <td><?php echo $fetch->name ?></td>
        <td>
          <img src="<?php echo $fetch->p_image ?>" style="max-width:100px">
        </td>
        <td><?php echo $fetch->dname ?></td>
        <td><?php echo $fetch->address ?></td>
        <td><?php echo $fetch->email ?></td>
        <td><a href="emp_edit.php?id=<?php echo $fetch->eid ?>">Edit</a></td>
        <td><a href="emps.php?del=<?php echo $fetch->eid ?>">Delete</a></td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>