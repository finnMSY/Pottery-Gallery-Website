<?php
session_start();
include('setup.php');

if ($_POST['name'] != "") {
	$name = $_POST['name'];
}
else {
	$name = "";
}

if ($_POST['phone'] != "") {
	$phone = $_POST['phone'];
}
else {
	$phone = '';
}

if ($_POST['email'] != "") {
	$email = $_POST['email'];
}
else {
	$email = "";
}

if ($_POST['address1'] != "") {
	$address1 = $_POST['address1'];
}
else {
	$address1 = "";
}

if ($_POST['address2'] != "") {
	$address2 = $_POST['address2'];
}
else {
	$address2 = "";
}

if ($_POST['town'] != "") {
	$town = $_POST['town'];
}
else {
	$town = "";
}

if ($_POST['country'] != "") {
	$country = $_POST['country'];
}
else {
	$country = "";
}

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
	$sql = "UPDATE account_info set name='$name', phone='$phone', email='$email', address1='$address1', address2='$address2', town='$town', country='$country' where account_id='$account_id'";

	if ($conn->query($sql) === TRUE) {
	  echo "Record updated successfully";
	  header("Location: accounts.php");
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

} else {
	$sql = "INSERT INTO account_info (account_id, name, email, phone, address1, address2, town, country) VALUES ('$account_id', '$name', '$email', '$phone', '$address1', '$address2', '$town', '$country')";

	if ($conn->query($sql) === TRUE) {
	  echo "New record created successfully";
	  header("Location: accounts.php");
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>
