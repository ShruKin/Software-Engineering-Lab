<?php
include("./connection.php");

if (isset($_POST['insert'])) {
  $query = "insert into plans set name='" . $_POST['name'] . "', speed='" . $_POST['speed'] . "', price='" . $_POST['price'] . "'";
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
      <tr>
        <td><label for="name">Plan Name</label></td>
        <td>:</td>
        <td><input type="text" name="name" id="name"></td>
      </tr>
      <tr>
        <td><label for="speed">Speed</label></td>
        <td>:</td>
        <td><input type="text" name="speed" id="speed"></td>
      </tr>
      <tr>
        <td><label for="price">Price</label></td>
        <td>:</td>
        <td><input type="text" name="price" id="price"></td>
      </tr>
      <tr>
        <td colspan="3"><input type="submit" name="insert" value="Create"></td>
      </tr>
    </table>
  </form>
</body>

</html>