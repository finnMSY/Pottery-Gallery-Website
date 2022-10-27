<?php 
include('setup.php');
session_start();

if ($_POST['price'] == 'high') {
	$_SESSION['direction'] = "price DESC";
}
else if ($_POST['price'] == 'low') {
	$_SESSION['direction'] = "price ASC";
}
print($_SESSION['direction']);

header("Location: store.php");