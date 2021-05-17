<?php
include("../connection.php");
include("../upload.php");

$query0 = "select * from train where tid='" . $_REQUEST['id'] . "'";
$result = mysqli_query($con, $query0);
$train = mysqli_fetch_object($result);

$query1 = "select * from category where active='1'";
$categories = mysqli_query($con, $query1);

$query2 = "select * from station";
$stations = mysqli_query($con, $query2);

if (isset($_POST['insert'])) {
  $file_name = upload_file("../../uploads/", $_FILES);
  $query = "update train set
             tname='" . $_POST['name'] . "', 
             tnum='" . $_POST['num'] . "',
             cat='" . $_POST['cid'] . "',
             startStn='" . $_POST['startStn'] . "',
             endStn='" . $_POST['endStn'] . "',
             price='" . $_POST['price'] . "',
             startTime='" . $_POST['startTime'] . "',
             travelTime='" . $_POST['travelTime'] . "',
             image='" . $file_name . "'
             where tid='" . $_REQUEST['id'] . "'
             ";

  echo $query;
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
  <h1>Edit Train</h1>
  <form method="POST" action="" enctype="multipart/form-data">
    <table>
      <tr>
        <td><label for="name">Train Name</label></td>
        <td>:</td>
        <td><input type="text" name="name" id="name" value="<?php echo $train->tname ?>"></td>
      </tr>
      <tr>
        <td><label for="num">Train Number</label></td>
        <td>:</td>
        <td><input type="text" name="num" id="num" value="<?php echo $train->tnum ?>"></td>
      </tr>
      <tr>
        <td><label for="cid">Select Category</label></td>
        <td>:</td>
        <td>
          <select name="cid" id="cid">
            <?php while ($fetch = mysqli_fetch_object($categories)) { ?>
              <option value="<?php echo $fetch->cid ?>" <?php if ($train->cat == $fetch->cid) echo "selected" ?>>
                <?php echo $fetch->cname ?>
              </option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td><label for="startStn">Select Start Station</label></td>
        <td>:</td>
        <td>
          <select name="startStn" id="startStn">
            <?php while ($fetch = mysqli_fetch_object($stations)) { ?>
              <option value="<?php echo $fetch->sid ?>" <?php if ($train->startStn == $fetch->sid) echo "selected" ?>>
                <?php echo $fetch->scode ?> - <?php echo $fetch->sname ?>
              </option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td><label for="endStn">Select End Station</label></td>
        <td>:</td>
        <td>
          <select name="endStn" id="endStn">
            <?php
            mysqli_data_seek($stations, 0);
            while ($fetch = mysqli_fetch_object($stations)) { ?>
              <option value="<?php echo $fetch->sid ?>" <?php if ($train->endStn == $fetch->sid) echo "selected" ?>>
                <?php echo $fetch->scode ?> - <?php echo $fetch->sname ?>
              </option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td><label for="price">Ticket Price</label></td>
        <td>:</td>
        <td><input type="number" name="price" id="price" value="<?php echo $train->price ?>"></td>
      </tr>
      <tr>
        <td><label for="startTime">Start Time</label></td>
        <td>:</td>
        <td><input type="number" name="startTime" id="startTime" value="<?php echo $train->startTime ?>"></td>
      </tr>
      <tr>
        <td><label for="travelTime">Travel Time</label></td>
        <td>:</td>
        <td><input type="number" name="travelTime" id="travelTime" value="<?php echo $train->travelTime ?>"></td>
      </tr>
      <tr>
        <td><label for="pic">Image</label></td>
        <td>:</td>
        <td><input type="file" name="pic" id="pic"></td>
      </tr>
      <tr>
        <td colspan="3"><input type="submit" name="insert" value="Edit"></td>
      </tr>
    </table>
  </form>
</body>

</html>