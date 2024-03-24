<?php
session_start();
// Include il file di configurazione per ottenere le credenziali del database
include "config.php";

// Crea una nuova connessione al database utilizzando le credenziali fornite
$conn = new mysqli($servername, $username, $password, $dbname);

// Esegue una query SQL per controllare se esiste l'username da creare
$query = "SELECT ute_username FROM utenti WHERE ute_username = '" . $_SESSION["ute_username"] . "'";
$tabella = $conn->query($query);

// Controlla se ci sono risultati dalla query
if ($tabella->num_rows != 0) {
	header("Location: ../View/login.html");
} else {
	header("Location: ../Model/verifica_register.php");
}

// Chiude la connessione al database
$conn->close();
?>
