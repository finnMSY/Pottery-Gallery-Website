<?php 

include('setup.php');
session_start();

$minus = $_POST['minus'];
$plus = $_POST['plus'];

if ($minus != '') {
	$value = $minus;
}
else {
	$value = $plus;
}

if (!isset($_SESSION['Username']) OR $_SESSION['Username'] == 'Guest') {
	$sql_stock = "SELECT * FROM cart_products WHERE value=16";
	$result_stock = $conn->query($sql_stock);
	if ($result_stock->num_rows > 0) { 
		$row_stock = $result_stock->fetch_assoc();
		$total_quantity = $row_stock["total_quantity"];
		if ($plus == '') {
			$output = array_search($minus,$_SESSION['guestCart'],true);
			$quantity_multipyler = $_SESSION['guestCart'][$output + 1] - 1;
			if ($quantity_multipyler < 1) {
				$quantity_multipyler = $total_quantity;
			}
			$a1 = array(($output+1)=>$quantity_multipyler);
			$_SESSION['guestCart'] = array_replace($_SESSION['guestCart'],$a1);
			header("Location: cart.php");
		}
		else if ($minus == '') {
			$output = array_search($plus,$_SESSION['guestCart'],true);
			$quantity_multipyler = $_SESSION['guestCart'][$output + 1] + 1;
			if ($quantity_multipyler > $total_quantity) {
				$quantity_multipyler = 1;
			}
			$a1 = array(($output+1)=>$quantity_multipyler);
			$_SESSION['guestCart'] = array_replace($_SESSION['guestCart'],$a1);
			header("Location: cart.php");
		}
	}
	else {
		print("Hello");
	}
}

else {

	if ($minus == '') {
		$product_id = $_POST['plus'];
	}
	else {
		$product_id = $_POST['minus'];
	}
	print($product_id);

	$account_id = $_SESSION['account_id'];
	$sql = "SELECT * FROM global_cart WHERE account_id='$account_id' AND product_id='$product_id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$sql_stock = "SELECT * FROM cart_products WHERE id='$product_id'";
		$result_stock = $conn->query($sql_stock);
		if ($result_stock->num_rows > 0) { 
			$row_stock = $result_stock->fetch_assoc();
			$total_quantity = $row_stock["total_quantity"];
		}
		if ($minus == '') {
			$quantity = $row["quantity"] + 1;
			if ($quantity > $total_quantity) {
				$quantity = 1;
			}
		}
		else {
			$quantity = $row["quantity"] - 1;
			if ($quantity < 1) {
				$quantity = $total_quantity;
			}
		}
		$sql = "UPDATE global_cart set quantity='$quantity' WHERE account_id='$account_id' AND product_id='$product_id'";
			if ($conn->query($sql) === TRUE) {
		  echo "Record updated successfully";
		  header("Location: cart.php");
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}	
}
?>