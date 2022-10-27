<!DOCTYPE html>
<html>
<head>
	<title>Accounts</title>
	<link rel="stylesheet" type="text/css" href="Css/stylesheet.css"> <!-- Link to Stylesheet -->
	<?php 
	$pagedecider = 3;
	include('navigation.php');
	$noaccount = "no";

	$username = $_SESSION['Username'];
	$sql_account = "SELECT * FROM accounts where Username= '$username'";
	$result = $conn->query($sql_account);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$account_id = $row["ID"];
	} else {
		echo "0 Results";
	}
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
	} else {
		$name = $phone = $email = $address1 = $address2 = $town = $country = '';   
	}
	?>
			<!-- header HTML Begins -->
			<h1 id="titleaccount" style="text-align: center; z-index: 0;">Account</h1>
		</header> <!-- End of Header tag (START IN NAVIGATION) -->
		<h3 class="accounttitle" style=" position: relative; bottom: 50px;">Welcome: 
			<?php
			if (isset($_SESSION['Username'])) { 
				print($_SESSION['Username']);
			}
			else {
				print("Guest");
			}
			?>
		</h3>
		<p style="text-align: center;">Enter/Edit you contact details to save them</p>
		<form method="post" enctype="multipart/form-data" action="account_action.php" style="margin-bottom: 30px;">
			<div class="centerbox">
				<div style="grid-area: name;" class="collect_grid_box">
					<input type="text" name="name" placeholder="Enter your Full Name" value="<?php print($name)?>">
				</div>
				<div style="grid-area: phone;" class="collect_grid_box">
					<input type="text" name="phone" placeholder="Enter your Phone Number" value="<?php print($phone)?>">
				</div>
				<div style="grid-area: email;" class="collect_grid_box">
					<input type="text" name="email" placeholder="Enter your Email" value="<?php print($email)?>">
				</div>
				<div style="grid-area: address1;" class="collect_grid_box">
					<input type="text" name="address1" placeholder="Address Line 1" value="<?php print($address1)?>">
				</div>
				<div style="grid-area: address2;" class="collect_grid_box">
					<input type="text" name="address2" placeholder="Address Line 2" value="<?php print($address2)?>">
				</div>
				<div style="grid-area: town;" class="collect_grid_box">
					<input type="text" name="town" placeholder="Town" value="<?php print($town)?>">
				</div>
				<div style="grid-area: country;" class="collect_grid_box">
					<input type="text" name="country" placeholder="Country" value="<?php print($country)?>">
				</div>
				<div style="grid-area: submit;" class="collect_grid_box">
					<button style="width: 100%; height: 50px; border: none;">SAVE</button>
				</div>	
			</div>
		</form>
	</body>
</html>
<?php include('footer.php'); ?>   

