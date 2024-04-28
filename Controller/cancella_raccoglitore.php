<?php

include '../Model/config.php';
include '../Controller/checkAuthenticate.php';
include '../Model/model_note.php';
include '../Model/model_raccoglitori.php';

$test = get_note_by_raccoglitore($_SESSION['id_raccoglitore'], $conn);

if ($test->num_rows > 0) {
    http_response_code(500);
} else if (($test->num_rows === 0)){
    $result = delete_raccoglitore($_SESSION['id_raccoglitore'], $conn);

    if ($result === true) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }
}

?>