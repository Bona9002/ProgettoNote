<?php

// Avvia la sessione per utilizzare le variabili di sessione
session_start();

// Verifica se i dati dell'utente sono stati inviati tramite POST
if (isset($_POST["login-username"]) && isset($_POST["login-password"])) {
	// Salva l'username e la password dell'utente nella sessione
	$_SESSION["ute_username"] = $_POST["login-username"];
	$_SESSION["ute_password"] = $_POST["login-password"];
}

// Controlla se il parametro "u" è stato passato tramite GET
if (!isset($_GET["u"])) {
	// Se non è presente, reindirizza l'utente alla pagina di test
	header("Location: ../Model/test_login.php");
} else {
	// Inizializza il contatore e la variabile per il controllo dell'username
	$i = 0;
	$tabella = $_GET["u"];
	$flag = false;

	// Ciclo per analizzare la stringa dell'username
	while ($i < strlen($tabella)) {
		$temp = "";
		// Raccoglie i caratteri fino al carattere "-"
		while ($tabella[$i] != "-") {
			$temp .= $tabella[$i];
			$i++;
		}
		$i++;
		// Confronta l'username raccolto con quello della sessione
		if ($_SESSION["ute_username"] == $temp) {
			$flag = true; // Se corrispondono, imposta il flag a true
		}
	}

	// Se il flag è true, reindirizza l'utente alla pagina di verifica
	if ($flag) {
		header("Location: ../Model/verifica_login.php");
	} else {
		// Altrimenti, reindirizza l'utente alla pagina di login
		header("Location: ../View/login.html");
	}
}

$conn->close();
 ?>
