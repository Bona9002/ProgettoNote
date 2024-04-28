<?php

include '../Model/config.php';
include '../Controller/checkAuthenticate.php';
include '../Model/model_note.php';

$nota = get_nota_by_id($_GET['id'], $conn);
$_SESSION['id_nota'] = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel='stylesheet' href='../View/css/editor.css'>
    <script src="../View/js/editor.js"></script>
    <title>Appunti</title>
</head>

<body>
    <div class="edit-page">
        <div class="container">
            <div class="raccoglitore-header">
            <h1 id="titolo"><?= $nota['titolo'] ?></h1>
                <span class="material-symbols-outlined delete-icon" onclick="cancellaNota()">delete</span>
            </div>
            <div id="dialog" style="display: none;">
                <span id="chiudiDialog" class="material-symbols-outlined" onclick="chiudiDialog()">close</span>
                    <input type="text" id="titoloElemento" placeholder="Modifica il titolo">
                    <button id="confermaModifica">Modifica</button>
            </div>
            <div class="button-container">
                <button onclick="salva_nota()">Salva nota</button>
                <button class="delete-btn" onclick="annulla_nota()">Annulla</button>
            </div>
            <textarea id="noteInput" placeholder="Inserisci il testo della nota..."><?php echo isset($nota['contenuto']) ? htmlspecialchars($nota['contenuto']) : ''; ?></textarea>
        </div>
    </div>
</body>

</html>