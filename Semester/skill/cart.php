<?php
include("sqlcon.php");
session_start();

if (!isset($_SESSION['cart'])) {
  $session = session_id();
  $_SESSION['cart'] = $session;
} else {
  $session = $_SESSION['cart'];
}
// echo $_SESSION['cart'];

if (isset($_REQUEST['id'])) {
  $query = "select id from cart where u_id=" . $_REQUEST['id'] . " and session='" . $_SESSION['cart'] . "'";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) > 0) {
    $fetch = mysqli_fetch_object($result);
    $query2 = "update cart set qty=qty+1 where id='" . $fetch->id . "'";
    mysqli_query($con, $query2);
  } else {
    $query2 = "insert into cart set u_id=" . $_REQUEST['id'] . ", qty=1, session='" . $_SESSION['cart'] . "'";
    mysqli_query($con, $query2);
  }

  header("location:cart.php");
}

if (isset($_REQUEST['add'])) {
  $query3 = "update cart set qty=qty+1 where id='" . $_REQUEST['add'] . "' and session='" . $_SESSION['cart'] . "'";
  mysqli_query($con, $query3);

  header("location:cart.php");
}

if (isset($_REQUEST['rem'])) {
  $query3 = "update cart set qty=qty-1 where id='" . $_REQUEST['rem'] . "' and session='" . $_SESSION['cart'] . "'";
  mysqli_query($con, $query3);

  header("location:cart.php");
}

if (isset($_REQUEST['del'])) {
  $query3 = "delete from cart where id='" . $_REQUEST['del'] . "' and session='" . $_SESSION['cart'] . "'";
  mysqli_query($con, $query3);

  header("location:cart.php");
}

$query0 = "select * from cart, prog where session='" . $_SESSION['cart'] . "' and cart.u_id=prog.u_id and qty>0";
$result0 = mysqli_query($con, $query0);
?>

<!DOCTYPE html>
<html lang="en">

<body>

  <a href="./index.php">progs</a>

  <table>
    <tr>
      <!-- <td>Cart ID</td> -->
      <!-- <td>Name</td> -->
      <td>progs</td>
      <td>Quantity</td>
      <td>Price</td>
      <td>Subtotal</td>
      <td>+</td>
      <td>-</td>
      <td>X</td>
    </tr>

    <?php
    $total = 0;
    while ($fetch = mysqli_fetch_object($result0)) {
      $subtotal = $fetch->price * $fetch->qty;
      $total += $subtotal;
    ?>
      <tr>
        <!-- <td><?php echo $fetch->id ?></td> -->
        <!-- <td><?php echo $fetch->u_id ?></td> -->
        <td><?php echo $fetch->name ?></td>
        <td><?php echo $fetch->qty ?></td>
        <td><?php echo $fetch->price ?></td>
        <td><?php echo $subtotal ?></td>
        <td><a href="cart.php?add=<?php echo $fetch->id ?>">Increase</a></td>
        <td><a href="cart.php?rem=<?php echo $fetch->id ?>">Derease</a></td>
        <td><a href="cart.php?del=<?php echo $fetch->id ?>">Delete</a></td>
      </tr>
    <?php } ?>
  </table>

  <h2>Total Amount: <?php echo $total ?></h2>

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

      <input type="hidden" name="productinfo" value="<?php echo $_SESSION['cart'] ?>">
      <input type="hidden" name="amount" value="<?php echo $total ?>">
      <input type="hidden" name="surl" value="http://localhost/skill/pay/success.php">
      <input type="hidden" name="furl" value="http://localhost/skill/pay/failure.php">
      <tr>
        <td colspan="3"><input type="submit" name="submit" value="Proceed to Payment"></td>
      </tr>
    </table>
  </form>

</body>

</html>