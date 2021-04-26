<?php
include("./connection.php");

$query0 = "select * from plans where id='" . $_REQUEST['id'] . "'";
$result0 = mysqli_query($con, $query0);
$fetch = mysqli_fetch_object($result0);

if (isset($_POST['insert'])) {
  $query = "update plans set name='" . $_POST['name'] . "', speed='" . $_POST['speed'] . "', price='" . $_POST['price'] . "' where id='" . $_POST['id'] . "'";
  $result = mysqli_query($con, $query);
  header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Plans</title>
</head>

<body>
  <h1>Create a new Plan</h1>
  <form method="POST">
    <table>
      <input type="hidden" name="id" value="<?php echo $fetch->id ?>">
      <tr>
        <td><label for="name">Plan Name</label></td>
        <td>:</td>
        <td><input type="text" name="name" id="name" value="<?php echo $fetch->name ?>"></td>
      </tr>
      <tr>
        <td><label for="speed">Speed</label></td>
        <td>:</td>
        <td><input type="text" name="speed" id="speed" value="<?php echo $fetch->speed ?>"></td>
      </tr>
      <tr>
        <td><label for="price">Price</label></td>
        <td>:</td>
        <td><input type="text" name="price" id="price" value="<?php echo $fetch->price ?>"></td>
      </tr>
      <tr>
        <td colspan="3"><input type="submit" name="insert" value="Create"></td>
      </tr>
    </table>
  </form>
</body>

</html>