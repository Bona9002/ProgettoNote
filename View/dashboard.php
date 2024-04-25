<?php

include '../Model/config.php';
include '../Controller/checkAuthenticate.php';
include '../Model/model_raccoglitori.php';

?>

<!--todo 
     logout dalla pagina -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../View/css/dashboard.css'>
    <title>Dashboard</title>
</head>
<body>
    <h1>Benvenuto <?=$_SESSION['username']?></h1>
    <table>
        <tr>
            <td>
                <!-- <div class='box' onclick='redirectToView(" . $row['id'] . ")'>" . $row['titolo'] . "</div> -->
                <!-- <div class='box'> </div> -->
                <?php
                $conn = new mysqli($servername, $username, $password, $dbname);
                mostraRaccoglitori($_SESSION['id_utente'], $conn);

                ?>
            </td>
        </tr>
    </table>
</body>
</html>