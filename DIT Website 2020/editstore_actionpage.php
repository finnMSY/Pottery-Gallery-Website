<?php	
session_start();
if (isset($_SESSION['Username']) AND $_SESSION['Username'] == 'admin') {
	$product_id = $_GET['value'];
	include ('setup.php');
	$_SESSION['storevalue'] = $product_id;

	if (isset($_POST['submit'])) {

		include('upload.php'); 

		$name = $_POST['name'];
		$text = $_POST['text'];
		if ($name_image == "") {
			$sql = "SELECT * FROM cart_products where id= '$product_id'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				$name_image = $row["image"];
			} else {
				echo "0 Results";
			}
		}
		$image = $name_image;
		$price = $_POST['price'];
		$category = $_POST['category'];
		$total_quantity = $_POST['total_quantity'];

		$sql = "UPDATE cart_products set name='$name', text='$text', image='$image', price='$price', category='$category', total_quantity='$total_quantity' where id='$product_id'";
		if ($conn->query($sql) === TRUE) {
		  echo "Record updated successfully";
		  // header("Location: admin.php");
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
		unset($_SESSION['storevalue']);
	}  

	$storepage = $_SESSION['storepage'];
	if ($storepage == 0) {
		header("Location: store.php");
	} 
	else {
		header("Location: store.php?storepage=$storepage");
	}

}
else {
	header("Location: index.php");
}
?> 