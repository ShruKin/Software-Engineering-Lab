<?php
include("./connection.php");
$query = "select * from user";
$result = mysqli_query($con, $query);
// $fetch = mysqli_fetch_object($result);
?>

<div class="row">
  <table>
    <tr>
      <td>User ID</td>
      <td>Name</td>
      <td>Address</td>
      <td>Email</td>
    </tr>

    <?php while ($fetch = mysqli_fetch_object($result)) { ?>
      <tr>
        <td><?php echo $fetch->uid ?></td>
        <td><?php echo $fetch->name ?></td>
        <td><?php echo $fetch->address ?></td>
        <td><?php echo $fetch->email ?></td>
      </tr>
    <?php } ?>
  </table>
</div>