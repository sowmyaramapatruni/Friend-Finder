<?php

include "config.php";

// Create connection to database
$conn = new mysqli(dbservername, dbusername, dbpassword, dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//check for an existing table users
$query = "DROP TABLE IF EXISTS users";
$result = $conn->query($query);

// sql to create table
$sql = "CREATE TABLE users (
id int(10) AUTO_INCREMENT PRIMARY KEY,
email varchar(20) NOT NULL,
full_name varchar(20) NOT NULL,
password varchar(20) NOT NULL,
last_active_time datetime NOT NULL,
latitude DECIMAL(16,10),
longitude DECIMAL(16,10),
token varchar(1024)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table USERS created successfully \n";
} else {
    echo "Error creating table: " . $conn->error. "\n";
}

$conn->close();
?>