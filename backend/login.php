<?php
require "config.php";

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
  $_SESSION['user'] = [
    "id" => $user['id'],
    "username" => $user['username'],
    "role" => $user['role']
  ];
  header("Location: index.html");
} else {
  echo "Credenziali errate";
}
