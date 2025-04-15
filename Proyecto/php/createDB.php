<?php
$servername = "localhost:3308";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE MarvelDB";
if ($conn->query($sql) === TRUE) {
  echo "Datu-base ongi sortu da";
} else {
  echo "Errorea datu basea sortzerako orduan" . $conn->error;
}

$conn->close();
?>