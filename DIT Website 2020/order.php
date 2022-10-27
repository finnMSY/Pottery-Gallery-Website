<!DOCTYPE html>
<html>
	<head class="contactpage">
		<title>Contact</title>
		<link rel="stylesheet" type="text/css" href="Css/stylesheet.css"> <!-- Link to Stylesheet -->
		
		<?php 
		$pagedecider = 2;
		include("navigation.php"); // Link to navigtion page>
		unset($_SESSION['confirm']);
		?>

	<h2 class="ordersuc">Order Successful</h2>
	<div class="ordersuc_div">
		<p>An email will be sent to the provided email address containing the details and instructions of the payment. You will then safely recieve your products after the payment has been confirmed.</p>
	</div>

	<div class="nextbutton" style="text-align: center; margin-bottom: 50px;">
		<a href="store.php">Store</a>
		<a href="cart.php">Cart</a> 
	</div>
<?php include('footer.php'); ?>