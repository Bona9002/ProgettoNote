<?php
include '../Model/config.php';
include '../Model/model_users.php';

session_start();
if (!(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']))) {
    header("Location: ../View/login.html");
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verifica se l'email esiste già
$result = get_utente_by_username($_POST['username'], $conn);

if ($result->num_rows > 0) {
    //echo "utente già registrato";
    $err = 'err=username_used';
    header("Location: ../View/login.html?$err");
} else {
    // Inserimento dell'utente nel database
    $result = create_utente($_POST['username'], $_POST['email'], $_POST['password'], $conn);

    if ($result === TRUE) {
        echo "Utente registrato con successo.";
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();


?>