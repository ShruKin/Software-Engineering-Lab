<?php
include("./connection.php");

if (isset($_POST['insert'])) {
  $query = "insert into user set name='" . $_POST['name'] . "', address='" . $_POST['address'] . "', email='" . $_POST['email'] . "'";
  $result = mysqli_query($con, $query);
}

if (isset($_POST['click'])) {
  $query = "update user set name='" . $_POST['name'] . "', address='" . $_POST['address'] . "', email='" . $_POST['email'] . "' where uid='" . $_POST['uid'] . "'";
  $result = mysqli_query($con, $query);
}

$query = "select * from user";
$result = mysqli_query($con, $query);
?>

<div class="row">
  <table>
    <tr>
      <td>User ID</td>
      <td>Name</td>
      <td>Address</td>
      <td>Email</td>
      <td>Action</td>
    </tr>

    <?php while ($fetch = mysqli_fetch_object($result)) { ?>
      <tr>
        <td><?php echo $fetch->uid ?></td>
        <td><?php echo $fetch->name ?></td>
        <td><?php echo $fetch->address ?></td>
        <td><?php echo $fetch->email ?></td>
        <td><a href="edit.php?id=<?php echo $fetch->uid ?>">Edit</a></td>
      </tr>
    <?php } ?>
  </table>
</div>