<?php
include("./connection.php");

$query0 = "select * from doctor where id='" . $_REQUEST['id'] . "'";
$result0 = mysqli_query($con, $query0);
$fetch = mysqli_fetch_object($result0);

if (isset($_POST['insert'])) {
  $query = "update doctor set name='" . $_POST['name'] . "', speed='" . $_POST['speed'] . "', dept='" . $_POST['dept'] . "', price='" . $_POST['price'] . "' where id='" . $_POST['id'] . "'";
  $result = mysqli_query($con, $query);
  header("location:index.php");
}

$query1 = "select * from cat where active=1";
$cats = mysqli_query($con, $query1);
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
      <input type="hidden" name="id" value="<?php echo $fetch->id ?>">
      <tr>
        <td><label for="name">doctor Name</label></td>
        <td>:</td>
        <td><input type="text" name="name" id="name" value="<?php echo $fetch->name ?>"></td>
      </tr>
      <tr>
        <td><label for="speed">Speed</label></td>
        <td>:</td>
        <td><input type="text" name="speed" id="speed" value="<?php echo $fetch->speed ?>"></td>
      </tr>
      <tr>
        <td><label for="dept">Department</label></td>
        <td>:</td>
        <td>
          <select name="dept" id="dept">
            <?php while ($cat = mysqli_fetch_object($cats)) { ?>
              <option value="<?php echo $cat->cid ?>" <?php if ($cat->cid == $fetch->dept) echo "selected" ?>><?php echo $cat->cname ?></option>
            <?php } ?>
          </select>
        </td>
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