<?php
$host = 'localhost';
$user = 'root'; // Your database username
$password = ''; // Your database password
$dbname = 'sari_sari_store';

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>