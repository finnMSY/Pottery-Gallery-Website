<?php 

session_start();

$_SESSION['category'] = '';
$_SESSION['search'] = '';
unset($_SESSION['direction']);

$storepage = $_SESSION['storepage'];
if ($storepage == 0) {
	header("Location: store.php");
} 
else {
	header("Location: store.php?storepage=$storepage");
}

?>