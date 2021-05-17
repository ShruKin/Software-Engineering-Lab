<?php
include("./connection.php");

if (isset($_POST['insert'])) {
  $query = "insert into doctor set name='" . $_POST['name'] . "', speed='" . $_POST['speed'] . "',dept='" . $_POST['dept'] . "', price='" . $_POST['price'] . "'";
  $result = mysqli_query($con, $query);
  header("location:index.php");
}

$query = "select * from cat where active=1";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add doctor</title>
</head>

<body>
  <h1>Create a new doctor</h1>
  <form method="POST">
    <table>
      <tr>
        <td><label for="name">Doctor Name</label></td>
        <td>:</td>
        <td><input type="text" name="name" id="name"></td>
      </tr>
      <tr>
        <td><label for="speed">Day</label></td>
        <td>:</td>
        <td><input type="text" name="speed" id="speed"></td>
      </tr>
      <tr>
        <td><label for="dept">Department</label></td>
        <td>:</td>
        <td>
          <select name="cid" id="cid">
            <?php while ($fetch = mysqli_fetch_object($result)) { ?>
              <option value="<?php echo $fetch->cid ?>"><?php echo $fetch->cname ?></option>
            <?php } ?>
          </select>
        </td>
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