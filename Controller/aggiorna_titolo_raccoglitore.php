<?php

include '../Model/config.php';
include '../Controller/checkAuthenticate.php';
include '../Model/model_raccoglitori.php';

$result = update_raccoglitore($_POST['titolo'], $_SESSION['id_raccoglitore'], $conn);

if ($result === true) {
    http_response_code(200);
} else {
    http_response_code(500);
}

?>