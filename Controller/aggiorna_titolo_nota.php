<?php

include '../Model/config.php';
include '../Controller/checkAuthenticate.php';
include '../Model/model_note.php';

$result = update_nota_titolo($_POST['titolo'], $_SESSION['id_nota'], $conn);

if ($result === true) {
    http_response_code(200);
} else {
    http_response_code(500);
}

?>