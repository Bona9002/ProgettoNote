<?php
// Include il file di configurazione per ottenere le credenziali del database
include "config.php";

// Crea una nuova connessione al database utilizzando le credenziali fornite
$conn = new mysqli($servername, $username, $password, $dbname);

// Esegue una query SQL per selezionare tutti gli username degli utenti
$query = "SELECT ute_username FROM utenti";
$tabella = $conn->query($query);

// Controlla se ci sono risultati dalla query
if ($tabella->num_rows > 0) {
	$elenco = "";
	// Iterazione attraverso ogni record restituito dalla query
	while ($record = $tabella->fetch_assoc()) {
		// Aggiunge l'username corrente all'elenco, separato da un trattino
		$elenco .= $record["ute_username"] . "-";
	}
	// Redireziona l'utente alla pagina di login, passando l'elenco degli username come parametro
	header("Location: ../Controller/login.php?u=$elenco");
} else {
	header("Location: ../View/login.html");
}

// Chiude la connessione al database
$conn->close();
?>
