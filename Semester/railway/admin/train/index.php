<?php
include("../connection.php");

$query = "SELECT t.*, s1.sname as startStnName, s2.sname as endStnName, c.cname as catName
          from train as t 
          inner join station as s1 
            on t.startStn = s1.sid 
          inner join station as s2 
            on t.endStn = s2.sid
          inner join category as c 
            on t.cat = c.cid";

$result = mysqli_query($con, $query);

if (isset($_REQUEST["del"])) {
  $query = "delete from train where tid='" . $_REQUEST["del"] . "'";
  $result = mysqli_query($con, $query);
  header("location:index.php");
}

if (isset($_REQUEST["active"])) {
  $query = "update train set active='" . $_REQUEST['active'] . "' where tid='" . $_REQUEST["id"] . "'";
  $result = mysqli_query($con, $query);
  header("location:index.php");
  echo $_REQUEST['active'];
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
  <a href="../index.php">Dashboard</a>
  <br />
  <a href="./trn_add.php">ADD Train</a>
  <table>
    <tr>
      <td>Train ID</td>
      <td>Train Name</td>
      <td>Train Number</td>
      <td>Train Image</td>
      <td>Category</td>
      <td>Starting Station</td>
      <td>Ending Station</td>
      <td>Starting Time</td>
      <td>Travel Time</td>
      <td>Price</td>
      <td>Active</td>
      <td>Edit</td>
      <td>Delete</td>
    </tr>

    <?php while ($fetch = mysqli_fetch_object($result)) { ?>
      <tr>
        <td><?php echo $fetch->tid ?></td>
        <td><?php echo $fetch->tname ?></td>
        <td><?php echo $fetch->tnum ?></td>
        <td>
          <img src="../../uploads/<?php echo $fetch->image ?>" style="max-width:100px">
        </td>
        <td><?php echo $fetch->catName ?></td>
        <td><?php echo $fetch->startStnName ?></td>
        <td><?php echo $fetch->endStnName ?></td>
        <td><?php echo $fetch->startTime ?></td>
        <td><?php echo $fetch->travelTime ?></td>
        <td><?php echo $fetch->price ?></td>
        <td>
          <?php if ($fetch->active) { ?>
            <a href="?active=0&id=<?php echo $fetch->tid ?>">Active</a>
          <?php } else { ?>
            <a href="?active=1&id=<?php echo $fetch->tid ?>">Inactive</a>
          <?php } ?>
        </td>
        <td><a href="trn_edit.php?id=<?php echo $fetch->tid ?>">Edit</a></td>
        <td><a href="index.php?del=<?php echo $fetch->tid ?>">Delete</a></td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>