<?php
include("setup.php");
session_start();
$_SESSION['category'] = $_POST["category"];
if ($_SESSION['category'] == 'all') {
	$_SESSION['category'] = '';
}
header('Location: store.php');
?>