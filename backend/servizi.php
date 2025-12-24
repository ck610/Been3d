<?php
require 'config.php';

$result = $conn->query("SELECT * FROM servizi");

$servizi = [];
while ($row = $result->fetch_assoc()) {
  $servizi[] = $row;
}

echo json_encode($servizi);
