<?php
include '../Model/config.php';
include '../Model/model_users.php';

session_start();

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$birthday = $_POST['birthday'];
//$pwd = $_POST['pwd'];
