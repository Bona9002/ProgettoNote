<?php
// Avviare la sessione per accedere ai dati della sessione
session_start();

// Includere il file di configurazione per accedere alle variabili di configurazione del database
include "config.php";

// Creare una nuova connessione al database utilizzando le variabili di configurazione
$conn = new mysqli($servername, $username, $password, $dbname);

// Inizializzare la variabile $tabella a null
$tabella = null;

// Preparare la query SQL per selezionare la password dell'utente corrente dalla tabella utenti
$query = "SELECT ute_password FROM utenti WHERE ute_username ='" . $_SESSION["ute_username"] . "'";

// Eseguire la query e memorizzare il risultato nella variabile $tabella
$tabella = $conn->query($query);

// Verificare se la query ha restituito almeno un record
if ($tabella->num_rows > 0) {
	// Inizializzare la variabile $password a una stringa vuota
	$password = "";
	// Iterare sui record restituiti dalla query
	while ($record = $tabella->fetch_assoc()) {
		// Assegnare il valore della password dell'utente corrente alla variabile $password
		$password = $record["ute_password"];
	}
}

// Confrontare la password memorizzata nella sessione con quella recuperata dal database
if ($_SESSION["ute_password"] == $password) {
	// Se le password corrispondono, stampare un messaggio di conferma
	//echo "Password corretta";
	header("Location: ../View/home.html");
} else {
	// Se le password non corrispondono, reindirizzare l'utente alla pagina di login
	header("Location: ../View/login.html");
}

// Chiudere la connessione al database
$conn->close();
?>
