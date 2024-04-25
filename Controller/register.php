<?php
include '../Model/config.php';
include '../Model/model_utenti.php';

session_start();
if (!(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']))) {
    header("Location: ../View/login.html");
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verifica se l'email esiste già
$result = get_utente_by_username($_POST['register-username'], $conn);

if ($result->num_rows > 0) {
    //echo "utente già registrato";
    $err = 'Username già usato';
    header("Location: ../View/login.html?error=$err");
} else {
    // Inserimento dell'utente nel database
    $result = create_utente($_POST['register-username'], $_POST['register-password'], $_POST['register-email'], $conn);

    if ($result === true) {
        echo "Utente registrato con successo.";
        header("Location: ../View/login.html");
    } else {
        echo "Error: ". $conn->error;
        header("Location: ../View/login.html?error=".$conn->error);
    }
}

$conn->close();


?>