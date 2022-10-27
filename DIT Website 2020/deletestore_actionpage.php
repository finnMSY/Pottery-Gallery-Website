<?php 

include ('setup.php');
$value = $_GET['value'];
$sql = "DELETE FROM cart_products WHERE id='$value'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
  header("Location: store.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>