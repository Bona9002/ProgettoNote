<?php

include '../Model/config.php';
include '../Controller/checkAuthenticate.php';
include '../Model/model_raccoglitori.php';

?>

<!--todo 
     logout dalla pagina-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel='stylesheet' href='../View/css/dashboard.css'>
    <script src="../View/js/dashboard.js"></script>
    <title>Dashboard Raccoglitori</title>
</head>
<body>
    <div class="dashboard-page">
        
        <div class="container"">
            <a id="logoutButton" href="../Controller/logout.php">Logout</a>
            <!-- htmlspecialchars evita che ciò che inserisco venga interpretato dal browser (sanitizzazione)-->
            <h1>Benvenuto <?= htmlspecialchars($_SESSION['username']) ?></h1>
            <button id="aggiungiElemento">Crea raccoglitore</button>
            <div id="dialog" style="display: none;">
            <span id="chiudiDialog" class="material-symbols-outlined" onclick="chiudiDialog()">close</span>
                <input type="text" id="titoloElemento" placeholder="Inserisci il titolo">
                <button id="confermaAggiunta">Aggiungi</button>
            </div>
            <?php
            mostra_raccoglitori($_SESSION['id_utente'], $conn);
            ?>
        </div>
    </div>

</body>
</html>