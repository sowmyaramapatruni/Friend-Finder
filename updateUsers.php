<?php

include "config.php";

$input = json_decode(file_get_contents('php://input'), true);
$latitude = floatval($input["latitude"]);
$longitude = floatval($input["longitude"]);
$email = $input["email"];

// Create connection to database
$conn = new mysqli(dbservername, dbusername, dbpassword, dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//update users
$query = "UPDATE users SET last_active_time = now(), latitude = '$latitude', longitude = '$longitude' WHERE email = '$email'";
$result = $conn->query($query);

if(!$result){
	echo "Error while updating location : " . $conn->error . "\n";
}

$conn->close();
?>