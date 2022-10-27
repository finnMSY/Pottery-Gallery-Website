<?php 
session_start();
if (isset($_SESSION['Username']) AND $_SESSION['Username'] == 'admin') { 
	include('setup.php'); 

	$pageID = $_POST["pageID"];
	$pagename = $_POST["pagename"];
	$paragraph1 = $_POST["paragraph1"]; 
	$title1 = $_POST["title1"]; 

    if (isset($_POST['submit'])) {
	    $name_image = $_FILES['file']['name'];  
	    $temp_name = $_FILES['file']['tmp_name'];  
	    if(isset($name_image) and !empty($name_image)){
	        $location = 'Images/';      
	        if(move_uploaded_file($temp_name, $location.$name_image)){
	            echo 'File uploaded successfully';
	        }
	    } else {
	        echo 'You should select a file to upload !!';
	    }
	    print($name_image);
	}	   

	$image1 = $_SESSION['imagename'];
	$paragraph2 = $_POST["paragraph2"]; 
	$title2 = $_POST["title2"]; 
	$image2 = $_POST["image2"]; 
	$paragraph3 = $_POST["paragraph3"]; 
	$title3 = $_POST["title3"]; 
	$image3 = $_POST["image3"];
	$navlink1 = $_POST["navlink1"];
	$navlink2 = $_POST["navlink2"];
	$navlink3 = $_POST["navlink3"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$instagram = $_POST["instagram"];
	$facebook = $_POST["facebook"];

	include("setup.php"); 

	$sql = "UPDATE pages set title1='$title1', paragraph1='$paragraph1', image1='$image1', title2='$title2', paragraph2='$paragraph2', image2='$image2', title3='$title3', paragraph3='$paragraph3', image3='$image3', pagename='$pagename', navlink1='$navlink1', navlink2='$navlink2', navlink3='$navlink3', client_phone='$phone', client_email='$email', client_instagram='$instagram', client_facebook='$facebook' where id='$pageID'";

	if ($conn->query($sql) === TRUE) {
	  echo "Record updated successfully";
	  // header("Location: admin.php");
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}
else {
	// header("Location: index.php");
}
?>
