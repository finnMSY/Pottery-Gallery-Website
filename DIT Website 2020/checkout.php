<!DOCTYPE html>
<html lang="English">
	<head>
		<link rel="stylesheet" type="text/css" href="Css/stylesheet.css">
	</head>
	<body>
		<?php 
			$pagedecider = 2;
			$error = 0;
			include ('navigation.php'); 

			if (isset($_GET['back'])) {
				if ($_GET['back'] == 1) {
					unset($_SESSION['confirm']);
				}
				else if ($_GET['back'] == 2) {
					$_SESSION['confirm'] = 2;
				}
				else if ($_GET['back'] == 3) {
					$_SESSION['confirm'] = 1;
				}

				if (isset($_SESSION['Username'])) {
					header("Location: checkout.php"); 
				}
			}

			if (isset($_SESSION['confirm'])) {
				$pagedisplay = $_SESSION['confirm']; 
			}
			else {
				$pagedisplay = 0;
			}
			
		?>
		<div style="display: <?=$pagedisplay == 0 ? 'block' : 'none'?>">
			<div class="checkoutgrid">
				<div class="topbox">
					<h2 class="checkoutheader">Please Sign In</h2>
				</div>
				<div class="leftbox">
					<h2>Returning Customers</h2>
					<br>
					<?php
					if (isset($_SESSION['Username'])) {
						$username = $_SESSION['Username'];
						$sql = "SELECT * FROM accounts where Username= '$username'";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							$row = $result->fetch_assoc();
							$email = $row["email"];
						} else {
							echo "0 Results";
						}
					}
					else {
						$email = "";
					}

					if (isset($_SESSION['loginerror'])) {
						$error = 1;
					}
					else {
						$error = 0;
					}

					if ($pagedisplay != 0) {
						unset($_SESSION['loginerror']);
					}
					?>

					<p class="loginerror" style="display: <?=$error == 1 ? 'block' : 'none'?>">Your login details are incorrect</p>
					<form method="post" enctype="multipart/form-data" action="checkout_action.php">
						<input type="text" name="username" placeholder="Username" required value="<?php print($email); ?>">
						<input type="Password" name="psw" placeholder="Password" required>
						<button type="submit">Log in</button>
					</form>
				</div>
				<div class="rightbox">
					<h2>Guest Checkout</h2>
					<p>Create an account later</p>

					<form method="post" enctype="multipart/form-data" action="checkout_action.php">
						<button class="checkoutbutton">Continue as Guest</button>
					</form>
				</div>
			</div>
		</div>

		<div style="display: <?=$pagedisplay == 1 ? 'block' : 'none'?>">
			<div class="checkoutgrid">
				<div class="topbox">
					<h2 class="checkoutheader">Product Collection</h2>
				</div>
				<div class="leftbox2">
					<form method="post" enctype="multipart/form-data" action="checkout_action.php">
						<button class="checkoutbutton" name="pickup">Pick-up Product</button>
					</form>
				</div>
				<div class="rightbox">
					<form method="post" enctype="multipart/form-data" action="checkout_action.php">
						<button class="checkoutbutton" name="deliver">Deliver Product</button>
					</form>
				</div>
			</div>
			<div class="nextbutton" style="text-align: center; margin-top: 15px;">
				<a href="checkout.php?back=1">Back</a> 
			</div>
			<br>
		</div>

		<div style="display: <?=$pagedisplay == 4 ? 'block' : 'none'?>">
			<div class="checkoutcollection_grid">
				<div class="topbox">
					<h2 class="checkoutheader">Product Collection</h2>
				</div>
				<?php 
				$username = $_SESSION['checkout'];
				$sql_account = "SELECT * FROM accounts where Username= '$username'";
				$result = $conn->query($sql_account);

				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$account_id = $row["ID"];
					$sql_accountinfo = "SELECT * FROM account_info where account_id= '$account_id'";
				    $result = $conn->query($sql_accountinfo);

				    if ($result->num_rows > 0) {
				        $row = $result->fetch_assoc();
					    $name = $row["name"];
					    $phone = $row["phone"];
					    $email = $row["email"];
					    $address1 = $row["address1"];
					    $address2 = $row["address2"];
					    $town = $row["town"];
					    $country = $row["country"];
				    }
				} else {
					$name = $phone = $email = $address1 = $address2 = $town = $country = '';
				}

				?>
				<form method="post" enctype="multipart/form-data" action="checkout_action.php">
					<div class="centerbox">
						<div style="grid-area: name;" class="collect_grid_box">
							<input type="text" name="name" placeholder="Enter your Full Name" required value="<?php print($name)?>">
						</div>
						<div style="grid-area: phone;" class="collect_grid_box">
							<input type="text" name="phone" placeholder="Enter your Phone Number" required value="<?php print($phone)?>">
						</div>
						<div style="grid-area: email;" class="collect_grid_box">
							<input type="text" name="email" placeholder="Enter your Email" required value="<?php print($email)?>">
						</div>
						<div style="grid-area: address1; display: <?=$_SESSION['collection'] == 1 ? 'block' : 'none'?>" class="collect_grid_box">
							<input type="text" name="address1" placeholder="Address Line 1" <?=$_SESSION['collection'] == 1 ? 'required' : 'none'?> value="<?php print($address1)?>">
						</div>
						<div style="grid-area: address2; display: <?=$_SESSION['collection'] == 1 ? 'block' : 'none'?>" class="collect_grid_box">
							<input type="text" name="address2" placeholder="Address Line 2" <?=$_SESSION['collection'] == 1 ? 'required' : 'none'?> value="<?php print($address2)?>">
						</div>
						<div style="grid-area: town; display: <?=$_SESSION['collection'] == 1 ? 'block' : 'none'?>" class="collect_grid_box">
							<input type="text" name="town" placeholder="Town" <?=$_SESSION['collection'] == 1 ? 'required' : 'none'?> value="<?php print($town)?>">
						</div>
						<div style="grid-area: country; display: <?=$_SESSION['collection'] == 1 ? 'block' : 'none'?>" class="collect_grid_box">
							<input type="text" name="country" placeholder="Country" <?=$_SESSION['collection'] == 1 ? 'required' : 'none'?> value="<?php print($country)?>">
						</div>
						<div style="grid-area: submit;" class="collect_grid_box">
							<button style="width: 100%; height: 50px; border: none;">SUBMIT</button>
						</div>	
					</div>
				</form>
			</div>
			<div class="nextbutton" style="text-align: center; margin-top: 15px;">
				<a href="checkout.php?back=3">Back</a> 
			</div>
		</div>

		<div style="display: <?=$pagedisplay == 5 ? 'block' : 'none'?>">
			<a href="checkout.php?back=3">Back</a> 
		</div>

		<div style="display: <?=$pagedisplay == 2 ? 'block' : 'none'?>">
			<div class="checkoutcollection_grid"> 
				<div class="topbox"><h2 class="checkoutheader">Confirm</h2></div>

				<?php 
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
							$id = $row["id"];
							array_push($_SESSION['price_array'], $price);
						}
					?>
					<div class="item">
					    <div class="image">
					      <img src="Images/<?php print($image);?>" width="100" height="100%" alt="<?php print($image);?>" />
					    </div>
					    <div class="description">
					      <span><?php print($name);?></span>
					    </div>	
					    <div class="quantity">
						    <div class="quantitybar"><input type="text" disabled name="name" value="<?php print($h[$counter+1]);?>"></div>
					    </div>
					    <div class="total-price">$<?php print($price);?></div>
					</div>
					<?php
							$counter = $counter + 2;
						}
						$_SESSION['guestCart'] = $h;
				}
				else {
					$cart_array = [];
					$account = $_SESSION['Username'];
					$qry="SELECT accounts.Username, global_cart.product_id, global_cart.quantity FROM accounts INNER JOIN global_cart on accounts.ID = global_cart.account_id WHERE Username = '$account'";
					$result=$conn->query($qry);
					while($row = mysqli_fetch_array($result)) {

						$username_array = $row['Username'];
						$product_id_array = $row['product_id'];
						$quantity_array = $row['quantity'];
						array_push($cart_array, $username_array);
						array_push($cart_array, $product_id_array);
						array_push($cart_array, $quantity_array);
					}

					$counter = 0;
					while ($counter <= count($cart_array) - 1) {
						if ($cart_array[$counter] == $username_array) {
							$idk = $cart_array[$counter+1];
							$sql = "SELECT * FROM cart_products WHERE id = '$idk'";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								$row = $result->fetch_assoc();
								$name = $row["name"];
								$text = $row["text"];
								$image = $row["image"];
								$price = $row["price"] * $cart_array[$counter+2];;
								$id = $row["id"];
								array_push($_SESSION['price_array'], $price);
							}
							?>
							<div class="item">
							    <div class="image">
							      <img src="Images/<?php print($image);?>" width="100" height="100%" alt="<?php print($image);?>" />
							    </div>
							    <div class="description">
							      <span><?php print($name);?></span>
							    </div>	
							    <div class="quantity">
								    <div class="quantitybar"><input type="text" disabled name="name" value="<?php print($cart_array[$counter+2]);?>"></div>
							    </div>
							    <div class="total-price">$<?php print($price);?></div>
							</div>
							<?php
						}
						$counter = $counter + 1;
					}
				}
				?>
				<div>
					<h4 style="color: #2B4E29; text-align: center; margin-top: 30px; padding-bottom: 30px; border-bottom: 1px solid #E1E8EE; font-weight: normal;">Total Price: NZ$<?php print($_SESSION['total_price'])?></h4>
				</div>
				<div style="margin-top: 40px;">
					<div class="confirm_grid">
						<div style="grid-area: confirm_grid_contact; text-decoration: underline; color: #2B4E29;">
							<h2>Contact Details</h2>
						</div>
						<div style="grid-area: confirm_grid_1;">
							<input type="text" disabled value="<?php print($_SESSION['product_name']); ?>">
						</div>
						<div style="grid-area: confirm_grid_2;">
							<input type="text" disabled value="<?php print($_SESSION['product_phone']); ?>">
						</div>
						<div style="grid-area: confirm_grid_3;">
							<input type="text" disabled value="<?php print($_SESSION['product_email']); ?>">
						</div>
						<div style="grid-area: confirm_grid_address; display: <?=$_SESSION['product_address1'] == '' ? 'none' : 'block'?>; text-decoration: underline; color: #2B4E29; margin-top: 20px;">
							<h2>Address Details</h2>
						</div>
						<div style="grid-area: confirm_grid_4; display: <?=$_SESSION['product_address1'] == '' ? 'none' : 'block'?>">
							<input type="text" disabled value="<?php print($_SESSION['product_address1']); ?>">
						</div>
						<div style="grid-area: confirm_grid_5; display: <?=$_SESSION['product_address1'] == '' ? 'none' : 'block'?>">
							<input type="text" disabled value="<?php print($_SESSION['product_address2']); ?>">
						</div>
						<div style="grid-area: confirm_grid_6; display: <?=$_SESSION['product_address1'] == '' ? 'none' : 'block'?>">
							<input type="text" disabled value="<?php print($_SESSION['product_town']); ?>">
						</div>
						<div style="grid-area: confirm_grid_7; display: <?=$_SESSION['product_address1'] == '' ? 'none' : 'block'?>">
							<input type="text" disabled value="<?php print($_SESSION['product_country']); ?>">
						</div>
					</div>
					<?php 
					?>
				</div>
				<div style="margin: auto;">
					<div class="nextbutton" style="float: left;"><a href="checkout.php?back=3">Back</a></div>
					<form action="order.php" style="float: left;"><button class="confirm_button">Order</button></form>
				</div>
			</div>
		</div>
		<div style="text-align: center; padding: 30px; border: 1px solid #E1E8EE; margin-top: 30px;">
			<p>Need Help: 024683927</p>
		</div>
		<?php include('footer.php'); ?>

		<?php 
		if ($pagedisplay == 0) {
			$checkout = "Checkout";
		}
		else if ($pagedisplay == 1 OR $pagedisplay == 4) {
			$checkout = "Checkout | Collection";
		}
		else if ($pagedisplay == 2) {
			$checkout = "Checkout | Confirm";
		}
		?>
		<title><?php print($checkout); ?></title> 

	</body>
</html>