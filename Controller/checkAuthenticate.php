<?php
include '../Model/config.php';
include '../Model/model_users.php';

session_start();
if (!(isset($_SESSION['login-username']) && isset($_SESSION['login-password']))) {

    $conn = new mysqli($servername, $username, $password, $dbname);
    $result = login_utente($_SESSION['login-username'], $_SESSION['login-password'], $conn);

    //Errore utente non autenticato
    if ($result->num_rows === 0) {
        $conn->close();
        header("Location: ../View/login.html");
    } 
} else {
    header("Location: ../View/login.html");
}
?>