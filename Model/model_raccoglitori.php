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

// function get_n_raccoglitori($id_utente, $conn){
//     $sql = "SELECT count(*) FROM raccoglitori WHERE id_utente=?";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("i", $id_utente);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     return $result;
// }

function mostraRaccoglitori($id_utente, $conn){
    $result = get_raccoglitori($id_utente, $conn);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='box' onclick='redirectToView(" . $row['id'] . ")'>" . $row['titolo'] . "</div>";
        }
    } else {
        echo "<div>Non è ancora stato creato un raccoglitore</div>";
    }
}

?>