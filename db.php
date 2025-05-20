<?php
session_start();
error_reporting(E_ALL);
$dbHost = "localhost";
$dbUser = "root";         // Change for deployment
$dbPass = "root";         // Change for deployment
$dbName = "spotify_clone";
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>