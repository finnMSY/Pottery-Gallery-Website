<?php

$product_value = $_POST['product_value'];
session_start();
include("setup.php");

if (!isset($_SESSION['Username']) OR $_SESSION['Username'] == 'Guest') {
	print($product_value . " | ");
	$output = array_search($product_value,$_SESSION['guestCart'],true);
	print($output);
	unset($_SESSION['guestCart'][$output]);
	unset($_SESSION['guestCart'][$output+1]);
	$_SESSION['guestCart'] = array_values($_SESSION['guestCart']);
	header("Location: cart.php");

}
else {

	$account_id = $_SESSION['account_id'];

	// sql to delete a record
	print($product_value);
	$sql = "DELETE FROM global_cart WHERE account_id='$account_id' AND product_id='$product_value'";

	if ($conn->query($sql) === TRUE) {
	  echo "Record updated successfully";
	  header("Location: cart.php");
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

?>