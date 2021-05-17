<?php
include("../connection.php");
include("../upload.php");

if (isset($_POST['insert'])) {
  $query = "insert into station set sname='" . $_POST['name'] . "', scode='" . $_POST['code'] . "'";
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
  <h1>Add Station</h1>
  <form method="POST" action="">
    <table>
      <tr>
        <td><label for="name">Station Name</label></td>
        <td>:</td>
        <td><input type="text" name="name" id="name"></td>
      </tr>
      <tr>
        <td><label for="code">Station Code</label></td>
        <td>:</td>
        <td><input type="text" name="code" id="code"></td>
      </tr>
      <tr>
        <td colspan="3"><input type="submit" name="insert" value="Insert"></td>
      </tr>
    </table>
  </form>
</body>

</html>