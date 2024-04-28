<?php

include '../Model/config.php';
include '../Controller/checkAuthenticate.php';
include '../Model/model_note.php';

$result = delete_nota($_SESSION['id_nota'], $conn);

if ($result === true) {
    http_response_code(200);
} else {
    http_response_code(500);
}

?>