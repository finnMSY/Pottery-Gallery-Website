<?php 
include("setup.php"); 

session_start();
print_r($_POST);
if (isset($_SESSION['Username'])) {
	$username = $_SESSION['Username'];
}
else {
	$username = "Guest";
} 
$email = $_POST["email"];
$phone = $_POST["phone"]; 
$query = $_POST["query"]; 

// print("Page: $pagenum, First Title: $title1, Paragraph: $paragraph1, First Image: $image1");

$sql = "INSERT INTO contact (username, email, phone, query) VALUES ('$username', '$email', '$phone', '$query')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("Location: contact.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
