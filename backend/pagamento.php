<?php
require 'config.php';

$payload = @file_get_contents('php://input');
$event = json_decode($payload);

if ($event->type === 'checkout.session.completed') {
  $session = $event->data->object;

  $stmt = $conn->prepare("INSERT INTO ordini (session_id, totale) VALUES (?, ?)");
  $stmt->bind_param("sd", $session->id, $session->amount_total / 100);
  $stmt->execute();
}

http_response_code(200);
