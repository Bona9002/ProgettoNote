<?php

include '../Model/config.php';

function create_nota($titolo, $contenuto, $id_utente, $id_raccoglitore, $conn){
    $sql = "INSERT INTO note (titolo, contenuto, data_creazione, data_modifica, id_utente, id_raccoglitore)
            VALUES (?, ?, NOW(), NOW(), ? , ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $titolo, $contenuto, $id_utente, $id_raccoglitore);
    return $stmt->execute();
}

function create_nota_titolo($titolo, $id_utente, $id_raccoglitore, $conn){
    $sql = "INSERT INTO note (titolo, data_creazione, data_modifica, id_utente, id_raccoglitore)
            VALUES (?, NOW(), NOW(), ? , ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $titolo, $id_utente, $id_raccoglitore);
    return $stmt->execute();
}

function update_nota_titolo($titolo, $id, $conn){
    $sql = "UPDATE note SET titolo=?, data_modifica=NOW() WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $titolo, $id);
    return $stmt->execute();
}

function update_nota_contenuto($contenuto, $id, $conn){
    $sql = "UPDATE note SET contenuto=?, data_modifica=NOW() WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $contenuto, $id);
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
    $queryRes = $stmt->get_result();
    $result = $queryRes->fetch_assoc();
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

function get_note($id_utente, $id_raccoglitore, $conn){
    $sql = "SELECT * FROM note WHERE id_utente=? AND id_raccoglitore=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $id_utente, $id_raccoglitore);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function mostra_note($id_utente, $id_raccoglitore, $conn){
    $result = get_note($id_utente, $id_raccoglitore, $conn);
    $k =0;
    echo "<table id=\"tabella\">";
    if ($result->num_rows > 0) {
        echo "<tr>";
        while($row = $result->fetch_assoc()) {
            $k = $k + 1;
            $formatted_date = date('d/m/Y', strtotime($row['data_modifica']));
            echo "<td class='box' onclick='redirectToEditor(" . $row['id'] . ")'><b>" . $row['titolo'] . "</b><br><small>Data ultima modifica: " . $formatted_date . "</small></td>";
            if ($k % 10 == 0) {
                echo "</tr><tr>";
            }
        }
        echo "</tr>";
    } else {
        echo "<tr><td colspan='5'>Non è ancora stata creata nessuna nota</td></tr>";
    }
    echo "</table>";
}

?>