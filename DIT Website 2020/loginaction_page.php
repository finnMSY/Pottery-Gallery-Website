<?php 
	session_start();
	print_r($_POST); 
	$email = $_POST["email"];
	$psw = $_POST["psw"];

	include("setup.php");

	$sql = "SELECT * FROM accounts where email = '$email'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$username = $row["Username"];
	} else {
		echo "0 Results";
	}

	if ($conn->query($sql) === TRUE) {
	  echo "Record updated successfully";

	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$verify = password_verify($psw, $row["Password"]);
	if ($verify == 1) {
		$_SESSION['Username'] = $username;
		$_SESSION['IsValid'] = "yes";

		if ($email == 'admin') {
			header("Location: admin.php");
		}
		else {
			header("Location: accounts.php");
		}
	}
	else {
		header("Location: index.php");
		$_SESSION['IsValid'] = "no";
	}

	$conn->close();
?>
