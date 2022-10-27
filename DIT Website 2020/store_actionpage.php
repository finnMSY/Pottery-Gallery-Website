<?php
$product = $_POST["product"];
$quantity_post = $_POST["quantity"];

session_start();
include("setup.php"); //Link to setup page
if (!isset($_SESSION['Username']) OR $_SESSION['Username'] == 'Guest') {
	$output = array_search($product,$_SESSION['guestCart'],true);
	$counter = 0;
	$dup_counter = 1;
	while ($counter < count($_SESSION['guestCart'])) {
		if ($product == $_SESSION['guestCart'][$counter]) {
			$dup_counter = $dup_counter + 1;
			print($dup_counter);
		}
		$counter = $counter + 2;
	}
	if ($dup_counter > 1) {
		$dup_counter = 0;
		$quantity_multipyler = $_SESSION['guestCart'][$output + 1] + $quantity_post;
		if ($quantity_multipyler > 20) {
			$quantity_multipyler = 20;
		}
		$a1 = array(($output+1)=>$quantity_multipyler);
		$_SESSION['guestCart'] = array_replace($_SESSION['guestCart'],$a1);
	}
	else {
		array_push($_SESSION['guestCart'], $product);
		array_push($_SESSION['guestCart'], $quantity_post);
	}
	header("Location: store.php");
}
else {
	$username = $_SESSION['Username'];
	$sql_account = "SELECT * FROM accounts where Username= '$username'";
	$result = $conn->query($sql_account);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$_SESSION['account_id'] = $row["ID"];
	} else {
		echo "0 Results |a ";
	}

	$account_id = $_SESSION['account_id'];

	$sql = "SELECT quantity FROM global_cart WHERE account_id='$account_id' AND product_id = '$product'";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$quantity1 = $row["quantity"];
		$quantity = $quantity1 + $quantity_post;

		$sql = "UPDATE global_cart set quantity='$quantity' WHERE account_id='$account_id' AND product_id = '$product'";
		if ($conn->query($sql) === TRUE) {
		  echo "Record updated successfully";
		  header("Location: store.php");
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	else {

		$sql = "INSERT INTO global_cart (account_id, product_id, quantity) VALUES ('$account_id', '$product', '$quantity_post')";

		if ($conn->query($sql) === TRUE) {
		  echo "New record created successfully";
		  header("Location: store.php");
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}
?>
			
		