<?php

include '../Model/config.php';

function login_utente($username, $password, $conn){
    $stmt = $conn->prepare("SELECT * FROM utenti WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}


function create_utente($username, $password, $email, $conn){
    $sql = "INSERT INTO utenti (username, password, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $password, $email);
    $stmt->execute();
    return $stmt->execute();
}

function get_utente_by_username($username, $conn){
    $sql = "SELECT * FROM utenti WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function get_utenti($conn){
    $sql = "SELECT * FROM utenti";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function update_utente($username, $password, $email, $conn){
    $sql = "UPDATE utenti SET password=?, email=? WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $password, $email, $username);
    return $stmt->execute();
}

?>