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

// prepare and bind
$stmt = $conn->prepare("INSERT INTO Erregistroak (Izena, Abizena, Emaila, Contraseña) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email);

// set parameters and execute
$Izena = $_POST["izena"];
$Abizena = $_POST["abizena"];
$Email = $_POST["emaila"];
$Pasahitza = $_POST["pasahitza"];
$stmt->execute();


echo "New records created successfully";

$stmt->close();
$conn->close();
?>
