<?php
include("../connection.php");

$query = "select * from station where sid='" . $_REQUEST['id'] . "'";
$result = mysqli_query($con, $query);
$fetch = mysqli_fetch_object($result);

if (isset($_POST['click'])) {
  $query = "update station set sname='" . $_POST['name'] . "', scode='" . $_POST['code'] . "' where sid='" . $_REQUEST['id'] . "'";
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
  <title>Store</title>
</head>

<body>
  <h1>Edit Station</h1>
  <a href="./cats.php">GO TO Station</a>
  <form method="POST" action="">
    <table>
      <tr>
        <td><label for="name">Station Name</label></td>
        <td>:</td>
        <td><input type="text" name="name" id="name" value="<?php echo $fetch->sname ?>"></td>
      </tr>
      <tr>
        <td><label for="code">Station Code</label></td>
        <td>:</td>
        <td><input type="text" name="code" id="code" value="<?php echo $fetch->scode ?>"></td>
      </tr>
      <tr>
        <td colspan="3"><input type="submit" name="click" value="Edit"></td>
      </tr>
    </table>
  </form>
</body>

</html>