<?php
session_start();
if (isset($_SESSION['Username']) AND $_SESSION['Username'] == 'admin') { 
	include("setup.php"); 
	include('upload.php'); 

	$value = $_POST["value"];
	$name = $_POST["name"]; 
	$text = $_POST["text"]; 
	$image = $name_image;
	$price = $_POST["price"]; 
	$category = $_POST['category'];
	$total_quantity = $_POST['total_quantity'];

	// print("Page: $pagenum, First Title: $title1, Paragraph: $paragraph1, First Image: $image1");

	$sql = "INSERT INTO cart_products (value, name, text, image, price, category, total_quantity) VALUES ('$value', '$name', '$text', '$image', '$price', '$category', $total_quantity)";

	if ($conn->query($sql) === TRUE) {
	  echo "New record created successfully";
	  header("Location: admin.php?pagechooser=4");
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}
else {
	header("Location: index.php");
}
?>