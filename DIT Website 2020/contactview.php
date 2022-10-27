<?php 
session_start();
if (isset($_SESSION['Username']) AND $_SESSION['Username'] == 'admin') { 
	session_start();
	include ("setup.php");
	$contactview = $_POST['contactview'];
	$contactdelete = $_POST['contactdelete'];

	if ($contactdelete == '') {
		$_SESSION['contact'] = $contactview;
	}	
	else if ($contactview == '') {
		$sql = "DELETE FROM contact WHERE id='$contactdelete'";
		if ($conn->query($sql) === TRUE) {
		  echo "Record updated successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	header("Location: admin.php?pagechooser=3");
}
else {
	header("Location: index.php");
}
?>