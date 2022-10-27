<?php
include("setup.php");
session_start();
$_SESSION['search'] = $_POST["search_filter"];
$_SESSION['filter_search'] = 1;
header('Location: store.php');
?>