<?php
session_start();

$host = "localhost";
$db   = "tuo_database";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Errore DB");
}
