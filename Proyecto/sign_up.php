<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>

</body>
</html>
<?php
session_start();

$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "MarvelDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $izena = $_POST['izena'];
    $abizena = $_POST['abizena'];
    $emaila = $_POST['emaila'];
    $pasahitza = password_hash($_POST['pasahitza'], PASSWORD_DEFAULT);

    $check = $conn->prepare("SELECT id FROM erregistroak WHERE Emaila = ?");
    $check->bind_param("s", $emaila);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "Email hau erregistratuta dago. <a href='LogIn.html'>Saioa hasi</a>";
    } else {
        $stmt = $conn->prepare("INSERT INTO erregistroak (Izena, Abizena, Emaila, Contraseña) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $izena, $abizena, $emaila, $pasahitza);

        if ($stmt->execute()) {
            echo "Erabiltzailea erregistratu da. <a href='LogIn.html'>Saioa hasi</a>";
        } else {
            echo "Errorea: " . $stmt->error;
        }

        $stmt->close();
    }

    $check->close();
}
?>