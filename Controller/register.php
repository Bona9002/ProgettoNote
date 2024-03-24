<?php

// Avvia la sessione per utilizzare le variabili di sessione
session_start();

// Verifica se i dati dell'utente sono stati inviati tramite POST
if (isset($_POST["register-username"]) && isset($_POST["register-password"]) && isset($_POST["register-email"])) {
	// Salva l'username, la password e la mail dell'utente nella sessione
	$_SESSION["ute_username"] = $_POST["register-username"];
	$_SESSION["ute_password"] = $_POST["register-password"];
	$_SESSION["ute_email"] = $_POST["register-email"];
}
header("Location: ../Model/test_register.php");
// Controlla se il parametro "u" è stato passato tramite GET
// if (!isset($_GET["u"])) {
// 	// Se non è presente, reindirizza l'utente alla pagina di test
// 	header("Location: ../Model/test_register.php");
// } else {
// 	// Inizializza il contatore e la variabile per il controllo dell'username
// 	$i = 0;
// 	$tabella = $_GET["u"];
// 	$flag = false;

// 	// Ciclo per analizzare la stringa dell'username
// 	while ($i < strlen($tabella)) {
// 		$temp = "";
// 		// Raccoglie i caratteri fino al carattere "-"
// 		while ($tabella[$i] != "-") {
// 			$temp .= $tabella[$i];
// 			$i++;
// 		}
// 		$i++;
// 		// Confronta l'username raccolto con quello della sessione
// 		if ($_SESSION["ute_username"] == $temp) {
// 			$flag = true; // Se corrispondono, imposta il flag a true
// 		}
// 	}

// 	// Se il flag è true, reindirizza l'utente alla pagina di verifica
// 	if ($flag) {
// 		header("Location: ../Model/verifica_register.php");
// 	} else {
// 		// Altrimenti, reindirizza l'utente alla pagina di login
// 		header("Location: ../View/login.html");
// 	}
// }

// include "config.php";
// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
// 	die("Connection failed: " . $conn->connect_error);
// }

// $username = $_POST['register-username'];
// $password = $_POST['register-password'];
// $email = $_POST['register-password'];

// $sql_check_user = "SELECT * FROM utenti WHERE ute_username = '$username' AND ute_password ='$password' AND ute_email = '$email'";
// $result = $conn->query($sql_check_user);

// if ($result->num_rows > 0) {
//     // L'utente esiste già nel database
//     header('Location: ../View/primoLogin.html');
// } else {
//     header('Location: ../View/login.html');
// }

$conn->close();
?>