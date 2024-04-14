<?php
include '../Model/config.php';
include '../Model/model_users.php';

session_start();
if (!(isset($_POST['username']) && isset($_POST['password']))) {
    header("Location: ../View/login.html");
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = login_utente($_SESSION['login-username'], $_SESSION['login-password'], $conn);

if ($result->num_rows > 0) {
    $_SESSION['login-username'] = $_POST['username'];
    $_SESSION['login-password'] = $_POST['password'];
    $conn->close();
    header("Location: ../View/dashboard.html");
} else {
    $conn->close();
    header("Location: ../View/login.html");
}

?>