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
      echo "<h3>Your order status is " . $status . ".</h3>";
      echo "<h4>Your transaction id for this transaction is " . $txnid . ". You may try making the payment by clicking the link below.</h4>";
}