<?php
// Avviare la sessione per accedere ai dati della sessione
session_start();

// Includere il file di configurazione per accedere alle variabili di configurazione del database
include "config.php";

// Creare una nuova connessione al database utilizzando le variabili di configurazione
$conn = new mysqli($servername, $username, $password, $dbname);

// Preparare la query SQL per inserire il nuovo utente
$query = "INSERT into utenti (ute_username, ute_password, ute_email) VALUES 
    ('" . $_SESSION["ute_username"] . "', '" . $_SESSION["ute_password"] . "', '" . $_SESSION["ute_email"] . "')";

// Eseguire la query e memorizzare il risultato nella variabile $tabella
$tabella = $conn->query($query);

header("Location: ../View/primoAccesso.html");

// Chiudere la connessione al database
$conn->close();
?>
