<?php 
	session_start();
	$contact_input = $_POST['contact_filter_input'];
	$_SESSION['contact_filter'] = $contact_input;
	header("Location: admin.php?pagechooser=3")
?>