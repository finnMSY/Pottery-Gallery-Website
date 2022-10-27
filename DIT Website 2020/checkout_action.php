<?php
	include ('setup.php');
	session_start();

	if (!isset($_POST['name'])) {
		if (isset($_POST['deliver'])) {
			$_SESSION['confirm'] = 4;
			$_SESSION['collection'] = 1;
		}
		else if (isset($_POST['pickup'])) {
			$_SESSION['confirm'] = 4;
			$_SESSION['collection'] = 2;
		} 
		else {
			if (isset($_POST['username'])) {
				$email = $_POST['username'];
				$sql = "SELECT * FROM accounts WHERE email = '$email'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$username = $row["Username"];
					$verify = password_verify($_POST['psw'], $row["Password"]);
					if ($verify == 1) {
						$login = $username;
						$_SESSION['confirm'] = 1;
					}
					else {
						$_SESSION['loginerror'] = 1;
					}

				} else {
					print("Error");
				}
			}
			else {
				$login = 'Guest';
				$_SESSION['confirm'] = 1;
			}
			$_SESSION['checkout'] = $login;
		}
	}
	else {
		$_SESSION['confirm'] = 2;
		$_SESSION['product_name'] = $_POST['name'];
		$_SESSION['product_phone'] = $_POST['phone'];
		$_SESSION['product_email'] = $_POST['email'];
		$_SESSION['product_address1'] = $_POST['address1'];
		$_SESSION['product_address2'] = $_POST['address2'];
		$_SESSION['product_town'] = $_POST['town'];
		$_SESSION['product_country'] = $_POST['country'];
	}
	header('Location: checkout.php');
?>