<?php
include("./connection.php");

if (isset($_POST['insert'])) {
  // for image upload
  $target_dir = "../uploads/";
  $allowed_exts = array('gif', 'png', 'jpg', 'jpeg');

  $target_file = $target_dir . basename($_FILES["pic"]["name"]);
  $ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  if (!in_array($ext, $allowed_exts)) {
    echo "The file you are trying to upload is not an Image";
    return;
  }

  if ($_FILES['pic']['size'] > 2097152) {
    echo "The file you are trying to upload is greater than 2MB in size";
    return;
  }

  $name = md5(time() . rand()) . "." . $ext;
  $rename = $target_dir . $name;

  move_uploaded_file($_FILES["pic"]["tmp_name"], $rename);

  $query = "insert into room set cid='" . $_POST['cid'] . "', image='" . $name . "', price='" . $_POST['price'] . "'";
  $result = mysqli_query($con, $query);
  header("location:room.php");
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
  <title>Store</title>
</head>

<body>
  <h1>Add Room</h1>
  <form method="POST" action="" enctype="multipart/form-data">
    <table>
      <tr>
        <td><label for="cid">Select Category</label></td>
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
        <td><input type="number" name="price" id="price"></td>
      </tr>
      <tr>
        <td><label for="pic">Picture</label></td>
        <td>:</td>
        <td><input type="file" name="pic" id="pic"></td>
      </tr>
      <tr>
        <td colspan="3"><input type="submit" name="insert" value="Insert"></td>
      </tr>
    </table>
  </form>
</body>

</html>