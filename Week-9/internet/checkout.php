<?php
include("./connection.php");
$query0 = "select * from plans where id='" . $_REQUEST['id'] . "'";
$result0 = mysqli_query($con, $query0);
$fetch = mysqli_fetch_object($result0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout</title>
</head>

<body>
  <h2>Amount Payable: <?php echo $fetch->price ?></h2>

  <form action="./pay/payment.php" method="POST">
    <table>
      <tr>
        <td><label for="firstname">Name</label></td>
        <td>:</td>
        <td><input type="text" name="firstname" id="firstname"></td>
      </tr>
      <tr>
        <td><label for="address">Address</label></td>
        <td>:</td>
        <td><input type="text" name="address1" id="address"></td>
      </tr>
      <tr>
        <td><label for="email">Email</label></td>
        <td>:</td>
        <td><input type="email" name="email" id="email"></td>
      </tr>
      <tr>
        <td><label for="phone">Phone</label></td>
        <td>:</td>
        <td><input type="tel" name="phone" id="phone"></td>
      </tr>

      <input type="hidden" name="productinfo" value="<?php echo $fetch->id ?>">
      <input type="hidden" name="amount" value="<?php echo $fetch->price ?>">
      <input type="hidden" name="surl" value="http://localhost/internet/pay/success.php">
      <input type="hidden" name="furl" value="http://localhost/internet/pay/failure.php">
      <tr>
        <td colspan="3"><input type="submit" name="submit" value="Proceed to Payment"></td>
      </tr>
</body>

</html>