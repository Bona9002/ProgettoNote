<?php

include '../Model/config.php';
include '../Controller/checkAuthenticate.php';
include '../Model/model_note.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel='stylesheet' href='../View/css/note.css'>
    <script src="../View/js/note.js"></script>
    <title>Dashboard Note</title>
</head>
<body>
    <div class="dashboard-page">
        
        <div class="container"">
        <!-- todo <span id="logout" class="material-symbols-outlined" onclick="chiudiDialog()">close</span> -->
            <!-- htmlspecialchars evita che ciò che inserisco venga interpretato dal browser (sanitizzazione)-->
            <h1>Benvenuto <?= htmlspecialchars($_SESSION['username']) ?></h1>
            <button id="aggiungiElemento">Crea nota</button>
            <div id="dialog" style="display: none;">
            <span id="chiudiDialog" class="material-symbols-outlined" onclick="chiudiDialog()">close</span>
                <input type="text" id="titoloElemento" placeholder="Inserisci il titolo">
                <button id="confermaAggiunta">Aggiungi</button>
            </div>
            <?php
            $_SESSION['id_raccoglitore'] = $_GET['id_raccoglitore'];
            mostra_note($_SESSION['id_utente'], $_SESSION['id_raccoglitore'], $conn);
            ?>
        </div>
    </div>
</body>
</html>
