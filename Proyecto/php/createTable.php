<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "MarvelDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE Erregistroak (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Izena VARCHAR(30) NOT NULL,
Abizena VARCHAR(30) NOT NULL,
Emaila VARCHAR(50),
Contraseña VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Erregistroak datu basean ongi sortu dira";
} else {
  echo "Errorea tabla sortzerako orduan: " . $conn->error;
}

$conn->close();
?>