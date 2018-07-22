<?php
$servername = "localhost";

$dbname = "c45new_test";

// Create connection
$conn = new mysqli($servername, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo "Connected successfully";

$conn->close();

?>