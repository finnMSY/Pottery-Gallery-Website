<?php
if (!isset($_POST['email'])) {
	$_SESSION['forgotpassword'] = 0;
	header("Location: index.php");
}
else {
	include("setup.php"); //Link to setup page
	$email = $_POST["email"];

	$sql = "SELECT * FROM accounts where email= '$email'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$psw = $row["Password"];
	} else {
		echo "0 Results";
	}

	function sanitize_my_email($field) {
	    $field = filter_var($field, FILTER_SANITIZE_EMAIL);
	    if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
	        return true;
	    } else {
	        return false;
	    }
	}

	$to = $email;
	$subject = 'Forgotten Password';
	$message = 'Your forgotten password is: ' . $psw;
	$headers = 'From: fmassey6@gmail.com' . "\r\n" .
	    'Reply-To: fmassey6@gmail.com' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();

	//check if the email address is invalid $secure_check
	$secure_check = sanitize_my_email($to);
	if ($secure_check == false) {
	    echo "Invalid input";
	    $_SESSION['IsValidEmail'] = "no";
	    print($_SESSION['IsValidEmail']);
	    header("Location: index.php");
	} else { //send email 
		$_SESSION['IsValid'] = "yes";
	    mail($to, $subject, $message, $headers);
	    echo "This email is sent using PHP Mail";
	    header("Location: index.php");
	}
}
?>