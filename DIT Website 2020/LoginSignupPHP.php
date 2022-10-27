<?php
	// Initialising Error related variables
    $HasErrorsU = $HasErrorsP = $HasErrorsE = $HasErrorsPA = "no";
    $HasErrors = $HasDuplicatesU = $IsValid = $HasDuplicatesE = "";

	// Action_page Function from the Signup Form
	if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    	include("setup.php"); //Link to setup page

        // Get the values from form
        $email = $_POST["email"];
		$psw = $_POST["psw"];
		$username = $_POST["username"];
		$psw_again = $_POST["psw_again"];

        // $psw = hash('ripemd160', '$psw');
        // $psw_again = hash('ripemd160', '$psw_again');

        // Error checking
        // Check Username is less than 15 characters
        	// DOESN'T DO THAT ATM
        if(!preg_match("/^[A-Za-z\s]{1,50}$/", $username)) {
        	$HasErrors = "yes";
        	$HasErrorsU = "yes";
        }
        //Check email is valid
        else if(!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
        	$HasErrors = "yes";
        	$HasErrorsE = "yes";
        }
        else if ($psw_again != $psw) {
            $HasErrors = "yes";
            $HasErrorsPA = "yes";
        }
        else {
        	$HasErrors = "no";
        }

        $psw = password_hash($_POST["psw"], PASSWORD_DEFAULT);

        //Check for duplicate Username
        $duplicate_sqlU = "SELECT * FROM `accounts` WHERE Username='$username'";
        $duplicate_queryU = mysqli_query($conn, $duplicate_sqlU);
        $countU = mysqli_num_rows($duplicate_queryU);

        if ($countU >= 1) {
        	$HasDuplicatesU = "yes";
        	$HasErrors = "yes";
        }
        //Check for duplicate Email
        $duplicate_sql = "SELECT * FROM `accounts` WHERE Email='$email'";
        $duplicate_query = mysqli_query($conn, $duplicate_sql);
        $count = mysqli_num_rows($duplicate_query);

        if ($count >= 1) {
            $HasDuplicatesE = "yes";
            $HasErrors = "yes";
        }

        if($HasErrors == "no") {

	        // Storing Values in 'accounts' database
	        $sql = "INSERT INTO accounts (email, Username, Password) VALUES ('$email', '$username', '$psw')";
			if ($conn->query($sql) === TRUE) {
				// If the account is successfully added to the database
			} else {
				// If there is an error
			  // header("Location: admin.php");
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
			$conn->close();
        }
    } 
?>