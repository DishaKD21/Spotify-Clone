<?php
$host = 'localhost';
$db   = 'spotify_clone';
$user = 'root';         // change if your DB username is different
$pass = 'root';             // change if your DB has a password

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
