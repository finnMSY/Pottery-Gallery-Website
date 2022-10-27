<!DOCTYPE html>
<html>
	<head>
		<title>Cart</title> <!-- Website title -->
		<link rel="stylesheet" type="text/css" href="Css/stylesheet.css"> <!-- Link to Stylesheet -->
		<?php include("LoginSignupPHP.php"); //Link to Footer Page ?>

	</head>

	<body>
		<?php 
		$pagedecider = 2;
		$empty = 0;
		include('navigation.php'); 
		$_SESSION['price_array'] = [];
		
		if (!isset($_SESSION['Username']) OR $_SESSION['Username'] == 'Guest') {
			if (!isset($_SESSION['guestCart'])) {
				$_SESSION['guestCart'] = [];
			}
			?>
			<p class="emptycart" style="display: <?=$_SESSION['guestCart'] == [] ? 'block' : 'none'?>;">Your cart is empty</p>
			<?php 
			if ($_SESSION['guestCart'] == []) {
				$empty = 1;
			}
			$counter = 0;
			$h = $_SESSION['guestCart'];
			while ($counter < count($_SESSION['guestCart'])) {
				$lol = $h[$counter];
				$sql = "SELECT * FROM cart_products WHERE value= '$lol'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$name = $row["name"];
					$text = $row["text"];
					$image = $row["image"];
					$price = $row["price"] * $h[$counter+1];;
					$value = $row["value"];
					array_push($_SESSION['price_array'], $price);
				}
			?>
			<div class="item">
			    <form action="cart_delete_actionpage.php" method="post" class="buttons1">
					<button class="deletebtn"><img src="Images/delete_white.png" width="15" height="15"></button>
					<input type="hidden" name="product_value" value="<?php print($value)?>">
				</form>
			 
			    <div class="image">
			      <img src="Images/<?php print($image);?>" width="100" height="100%" alt="<?php print($image);?>" />
			    </div>
			 
			    <div class="description">
			      <span><?php print($name);?></span>
			    </div>	
			 
			    <div class="quantity">
			    	<form action="cart_quantity_actionpage.php" method="post" class="minus-btn">
				    	<button class="minus-btn but navbutton" type="submit" name="button">
				      		<h2>-</h2>
				    	</button>
				    	<input type="hidden" name="minus" value="<?php print($value)?>">
				    	<input type="hidden" name="plus" value="">
				    </form>

				    <div class="quantitybar"><input type="text" disabled name="name" value="<?php print($h[$counter+1]);?>"></div>
				    <form action="cart_quantity_actionpage.php" method="post" class="plus-btn">
				    	<button type="submit" name="button" class="minus-btn but navbutton">
				        	<h2>+</h2>
				    	</button>
				    	<input type="hidden" name="plus" value="<?php print($value)?>">
				    	<input type="hidden" name="minus" value="">
			  		</form>
			    </div>
			 
			    <div class="total-price">$<?php print($price);?></div>
			</div>
			<?php
					$counter = $counter + 2;
				}
				$_SESSION['guestCart'] = $h;
		}
		else {
			unset($_SESSION['guestCart']);

			if (isset($_SESSION['Username'])) {
				$username = $_SESSION['Username'];
				$sql_account = "SELECT * FROM accounts where Username= '$username'";
				$result = $conn->query($sql_account);

				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$_SESSION['account_id'] = $row["ID"];
				} else {
					echo "0 Results | ";
				}

				$account_id = $_SESSION['account_id'];
				
				$sql = "SELECT account_id, product_id, quantity FROM global_cart WHERE account_id='$account_id'";
				$result1 = $conn->query($sql);

				if ($result->num_rows > 0) {
				  // output data of each row
				  	while($row = $result1->fetch_assoc()) {
					  	$product_id = $row["product_id"];
					  	$product_quantity = $row["quantity"];

					    $sql = "SELECT * FROM cart_products WHERE id='$product_id'";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							$row = $result->fetch_assoc();
							$product_name = $row["name"];
							$product_text = $row["text"];
							$product_image = $row["image"];
							$product_price = $row["price"] * $product_quantity;
							array_push($_SESSION['price_array'], $product_price);
							?>
			 					<div class="item">
			 					    <form action="cart_delete_actionpage.php" method="post" class="buttons1">
			 							<button class="deletebtn"><img src="Images/delete_white.png" width="15" height="15"></button>
			 							<input type="hidden" name="product_value" value="<?php print($product_id)?>">
			 						</form>
								 
			 					    <div class="image">
			 					      <img src="Images/<?php print($product_image);?>" width="100" height="100%" alt="<?php print($image);?>" />
			 					    </div>
								 
			 					    <div class="description">
			 					      <span><?php print($product_name);?></span>
			 					    </div>	
								 
			 					    <div class="quantity">
			 					    	<form action="cart_quantity_actionpage.php" method="post" class="minus-btn">
			 						    	<button class="minus-btn but navbutton" type="submit" name="button">
			 						      		<h2>-</h2>
			 						    	</button>
			 						    	<input type="hidden" name="minus" value="<?php print($product_id)?>">
			 						    	<input type="hidden" name="plus" value="">
			 						    </form>

			 						    <div class="quantitybar"><input type="text" disabled name="name" value="<?php print($product_quantity);?>"></div>
			 						    <form action="cart_quantity_actionpage.php" method="post" class="plus-btn">
			 						    	<button type="submit" name="button" class="plus-btn but navbutton">
			 						        	<h2>+</h2>
			 						    	</button>
			 						    	<input type="hidden" name="plus" value="<?php print($product_id)?>">
			 						    	<input type="hidden" name="minus" value="">
			 					  		</form>
			 					    </div>
								 
								    <div class="total-price">$<?php print($product_price);?></div>
								  </div>
			 				<?php
						}

				  	}
				} else {
				  echo "0 results";
				}

				$sql = "SELECT * FROM global_cart WHERE account_id= '$account_id'";
				$result = $conn->query($sql);

				if ($result->num_rows == 0) {
					$empty = 1;
					?>
		 			<p class="emptycart">Your cart is empty</p>
		 			<?php
				}
			}
			else {
				print("Guest");
			}
		}
		$total_price = $_SESSION['total_price'] = array_sum($_SESSION['price_array']);
		?>
		<div class="total_price" style="margin-bottom: 50px;">
			<h1 class="total_price_header">Your cart total is NZ$<?php print($total_price); ?> <i style="display: <?=!isset($_SESSION['Username']) ? 'block' : 'none'?>; font-size: 50%">(Guest)</i></h1>
			<div class="total_price_text">
				<p>Subtotal: NZ$<?php print_r(array_sum($_SESSION['price_array'])); ?></p>
				<p>Shipping: <b>FREE</b></p>
			</div>
			<div style="background-color: <?=$empty == 1 ? 'grey' : ''?>;" class="total_price_button"><a href="<?=$empty == 1 ? '' : 'checkout.php'?>">Proceed to Checkout</a></div>
		</div>	
	</body>
</html>
<?php include('footer.php'); ?>	   