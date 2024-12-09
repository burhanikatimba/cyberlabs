<?php
// Database configuration
$host = 'localhost';      // Your database host (usually localhost)
$username = 'root';       // Your MySQL username (default is root for XAMPP)
$password = '';           // Your MySQL password (default is empty for XAMPP)
$database = 'nasridb';    // Your database name

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Connection successful
?>
