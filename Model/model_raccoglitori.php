<?php

include '../Model/config.php';

function create_raccoglitore($titolo, $id_utente, $conn){
    $sql = "INSERT INTO raccoglitori (titolo, id_utente) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $titolo, $id_utente);
    return $stmt->execute();
}

function update_raccoglitore($titolo, $id, $conn){
    $sql = "UPDATE raccoglitori SET titolo=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $titolo, $id);
    return $stmt->execute();
}

function delete_raccoglitore($id, $conn){
    $sql = "DELETE FROM raccoglitori WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

function get_raccoglitori($id_utente, $conn){
    $sql = "SELECT * FROM raccoglitori WHERE id_utente=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_utente);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function mostra_raccoglitori($id_utente, $conn){
    $result = get_raccoglitori($id_utente, $conn);
    $k =0;
    echo "<table id=\"tabella\">";
    if ($result->num_rows > 0) {
        echo "<tr>";
        while($row = $result->fetch_assoc()) {
            $k = $k + 1;
            echo "<td class='box' onclick='redirectToNote(" . $row['id'] . ")'>" . $row['titolo'] . "</td>";
            if ($k % 10 == 0) {
                echo "</tr><tr>";
            }
        }
        echo "</tr>";
    } else {
        echo "<tr><td colspan='5'>Non è ancora stato creato nessun raccoglitore</td></tr>";
    }
    echo "</table>";
}

?>