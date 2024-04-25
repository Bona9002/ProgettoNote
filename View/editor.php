<?php

include '../Model/config.php';
include '../Controller/checkAuthenticate.php';
include '../Model/model_raccoglitori.php';

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../View/css/editor.css'>
    <script src="../View/js/editor.js"></script>
    <title>Appunti</title>
</head>

<body>

    <div class="container">
        <?$titolo?>
        <div class="button-container">
            <button onclick="saveNote()">Salva Appunto</button>
            <button class="delete-btn" onclick="deleteNote()">Elimina Appunti</button>
        </div>

        <textarea id="noteInput" placeholder="Inserisci il tuo appunto qui..."></textarea>
    </div>

</body>

</html>