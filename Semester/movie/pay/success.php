<?php
$status = $_POST["status"];
$firstname = $_POST["firstname"];
$amount = $_POST["amount"];
$txnid = $_POST["txnid"];
$posted_hash = $_POST["hash"];
$key = $_POST["key"];
$productinfo = $_POST["productinfo"];
$email = $_POST["email"];
$salt = "e5iIg1jwi8";

include("../connection.php");

$query0 = "update invoice set status='" . $status . "' where transaction='" . $txnid . "'";
mysqli_query($con, $query0);

$query = "insert into orders select * from cart where session='" . $productinfo . "'";
mysqli_query($con, $query);

$query2 = "delete from cart where session='" . $productinfo . "'";
mysqli_query($con, $query2);

session_start();
unset($_SESSION['cart']);
session_destroy();

// Salt should be same Post Request 

if (isset($_POST["additionalCharges"])) {
      $additionalCharges = $_POST["additionalCharges"];
      $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
} else {
      $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
}
$hash = hash("sha512", $retHashSeq);
if ($hash != $posted_hash) {
      echo "Invalid Transaction. Please try again";
} else {
      echo "<h3>Thank You. Your order status is " . $status . ".</h3>";
      echo "<h4>Your Transaction ID for this transaction is " . $txnid . ".</h4>";
      echo "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";
}

?>

<a href="../index.php">Go Home</a>