<?php
include '../Model/config.php';
include '../Model/model_utenti.php';

session_start();
if (!(isset($_POST['login-username']) && isset($_POST['login-password']))) {
    header("Location: ../View/login.html");
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = login_utente($_POST['login-username'], $_POST['login-password'], $conn);

if ($result->num_rows > 0) {
    $_SESSION['username'] = $_POST['login-username'];
    $_SESSION['password'] = $_POST['login-password'];
    $row = $result->fetch_assoc();
    $_SESSION['id_utente'] = $row['id'];
    $conn->close();
    header("Location: ../View/dashboard.php");
} else {
    $conn->close();
    header("Location: ../View/login.html?error=Utente o Password non corretti");
}

?>