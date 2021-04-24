<?php
include("./connection.php");

$query = "select * from prod where pid='" . $_REQUEST['id'] . "'";
$result = mysqli_query($con, $query);
$fetch = mysqli_fetch_object($result);

$query = "select * from cat where active=1";
$cats = mysqli_query($con, $query);

if (isset($_POST['click'])) {
  // for image upload
  $target_dir = "../uploads/";
  $allowed_exts = array('gif', 'png', 'jpg', 'jpeg');
  echo $_FILES["pic"];

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

  $query = "update prod set name='" . $_POST['name'] . "', image='" . $name . "', cid='" . $_POST['cid'] . "', price='" . $_POST['price'] . "' where pid='" . $_REQUEST['id'] . "'";
  $result = mysqli_query($con, $query);
  header("location:prods.php");
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
  <h1>Edit Details</h1>
  <a href="./prods.php">GO TO Products</a>
  <form method="POST" action="" enctype="multipart/form-data">
    <table>
      <tr>
        <td><label for="name">Name</label></td>
        <td>:</td>
        <td><input type="text" name="name" id="name" value="<?php echo $fetch->name ?>"></td>
      </tr>
      <tr>
        <td><label for="cid">Select Category</label></td>
        <td>:</td>
        <td>
          <select name="cid" id="cid">
            <?php while ($cat = mysqli_fetch_object($cats)) { ?>
              <option value="<?php echo $cat->cid ?>" <?php if ($cat->cid == $fetch->cid) echo "selected" ?>><?php echo $cat->cname ?></option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td><label for="price">Price</label></td>
        <td>:</td>
        <td><input type="number" name="price" id="price" value="<?php echo $fetch->price ?>"></td>
      </tr>
      <tr>
        <td><label for="pic">Picture</label></td>
        <td>:</td>
        <td><input type="file" name="pic" id="pic"></td>
      </tr>
      <tr>
        <td colspan="3"><input type="submit" name="click" value="Edit"></td>
      </tr>
    </table>
  </form>
</body>

</html>