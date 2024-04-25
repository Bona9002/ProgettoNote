<?php

include '../Model/config.php';

function create_nota($titolo, $contenuto, $id_utente, $id_raccoglitore, $conn){
    $sql = "INSERT INTO note (titolo, contenuto, data_creazione, data_modifica, id_utente, id_raccoglitore)
            VALUES (?, ?, NOW(), NOW(), ? , ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $titolo, $contenuto, $id_utente, $id_raccoglitore);
    return $stmt->execute();
}

function update_nota($titolo, $contenuto, $id, $conn){
    $sql = "UPDATE note SET titolo=?, contenuto=?, data_modifica=NOW() WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $titolo, $contenuto, $id);
    return $stmt->execute();
}

function delete_nota($id, $conn){
    $sql = "DELETE FROM note WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

function update_id_raccoglitore($id, $id_raccoglitore, $conn){
    $sql = "UPDATE note SET id_raccoglitore=? where id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $id, $id_raccoglitore);
    return $stmt->execute();
}

function get_nota_by_id($id, $conn){
    $sql = "SELECT * FROM note WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function get_note_by_raccoglitore($id_raccoglitore, $conn){
    $sql = "SELECT * FROM note where id_raccoglitore=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_raccoglitore);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

?>