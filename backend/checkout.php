<?php
require 'vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_TUA_SECRET_KEY');

// recuperi il servizio dal database (esempio)
$servizi = [
  1 => ["nome" => "Consulenza Web", "prezzo" => 5000] // prezzo in centesimi
];

$id = $_GET['id'];
$servizio = $servizi[$id];

$session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'mode' => 'payment',
  'line_items' => [[
    'price_data' => [
      'currency' => 'eur',
      'product_data' => [
        'name' => $servizio['nome'],
      ],
      'unit_amount' => $servizio['prezzo'],
    ],
    'quantity' => 1,
  ]],
  'success_url' => 'http://localhost/success.php',
  'cancel_url' => 'http://localhost/cancel.php',
]);

header("Location: " . $session->url);
exit;
