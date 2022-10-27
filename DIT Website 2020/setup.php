<?php
$servername = "localhost";
$serverusername = "sec_user";
$serverpassword = "greenChair153";
$database = "pottery_table";

// Create connection
$conn = new mysqli($servername, $serverusername, $serverpassword, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>