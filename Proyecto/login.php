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
    $emaila = trim($_POST['emaila']);
    $pasahitza = $_POST['pasahitza'];

    $stmt = $conn->prepare("SELECT id, Izena, Contraseña FROM erregistroak WHERE Emaila = ?");
    $stmt->bind_param("s", $emaila);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $izena, $pasahitza2);
        $stmt->fetch();

        if (password_verify($pasahitza, $pasahitza2)) {
            $_SESSION['erabiltzaile_id'] = $id;
            $_SESSION['izena'] = $izena;
            $_SESSION['emaila'] = $emaila;
            header("Location: welcome.php");
            exit;
        } else {
            echo "Pasahitza ez da zuzena.";
        }
    } else {
        echo "Email hau ez dago erregistratuta.";
    }

    $stmt->close();
}
?>