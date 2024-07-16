<?php
$servername = "localhost"; // Your database server name (usually "localhost" for local development)
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "MPTCL"; // Your database name

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
