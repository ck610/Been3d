<?php
require "config.php";

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
  die("Accesso negato");
}
?>

<h1>🛠️ Staff Panel</h1>
<p>Solo admin</p>
