<?php
include("./connection.php");

$query = "select * from emp where eid='" . $_REQUEST['id'] . "'";
$result = mysqli_query($con, $query);
$fetch = mysqli_fetch_object($result);

$query = "select * from dept where active=1";
$depts = mysqli_query($con, $query);

if (isset($_POST['click'])) {
  // for image upload
  $target_dir = "uploads/";
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

  $rename = $target_dir . md5(time() . rand()) . "." . $ext;

  move_uploaded_file($_FILES["pic"]["tmp_name"], $rename);

  $query = "update emp set name='" . $_POST['name'] . "', p_image='" . $rename . "', did='" . $_POST['cid'] . "', address='" . $_POST['address'] . "', email='" . $_POST['email'] . "' where eid='" . $_REQUEST['id'] . "'";
  $result = mysqli_query($con, $query);
  header("location:emps.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Week 4</title>
</head>

<body>
  <h1>Edit Details</h1>
  <a href="./emps.php">GO TO EMPLOYEES</a>
  <form method="POST" action="" enctype="multipart/form-data">
    <table>
      <tr>
        <td><label for="name">Name</label></td>
        <td>:</td>
        <td><input type="text" name="name" id="name" value="<?php echo $fetch->name ?>"></td>
      </tr>
      <tr>
        <td><label for="cid">Select Department</label></td>
        <td>:</td>
        <td>
          <select name="cid" id="cid">
            <?php while ($dept = mysqli_fetch_object($depts)) { ?>
              <option value="<?php echo $dept->did ?>" <?php if ($dept->did == $fetch->did) echo "selected" ?>><?php echo $dept->dname ?></option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td><label for="address">Address</label></td>
        <td>:</td>
        <td><textarea name="address" id="address" cols="30" rows="3"><?php echo $fetch->address ?></textarea></td>
      </tr>
      <tr>
        <td><label for="email">Email</label></td>
        <td>:</td>
        <td><input type="email" name="email" id="email" value="<?php echo $fetch->email ?>"></td>
      </tr>
      <tr>
        <td><label for="pic">Profile Picture</label></td>
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