<?php
$servername = "localhost";
$username = "root";
$password = NULL;
$dbname = "alumni";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
