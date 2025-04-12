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
$izena = htmlspecialchars(trim($_POST["izena"]));
$abizena = htmlspecialchars(trim($_POST["abizena"]));
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$pasahitza = htmlspecialchars(trim($_POST["pasahitza"]));
$stmt->execute();


echo "Datuak Ongi sortu egin dira";
echo "<br>"
echo "<button><a href="index.html">Bueltatu</button>"


$stmt->close();
$conn->close();
?>k
