<?php
include '../Model/config.php';
include '../Model/model_utenti.php';

session_start();
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

    $conn = new mysqli($servername, $username, $password, $dbname);
    $result = login_utente($_SESSION['username'], $_SESSION['password'], $conn);

    //Errore utente non autenticato
    if ($result->num_rows === 0) {
        $conn->close();
        header("Location: ../View/login.html");
    } 
} else {
    header("Location: ../View/login.html");
}
?>