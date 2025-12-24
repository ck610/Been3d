<?php
require "config.php";

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);

if ($stmt->execute()) {
  header("Location: login.html");
} else {
  echo "Username già esistente";
}
