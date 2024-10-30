<?php
require 'db.php';include 'header.php';

$codigo = $_GET['codigo'];
$stmt = $pdo->prepare("DELETE FROM produtos WHERE codigo = ?");
$stmt->execute([$codigo]);

header('Location: index.php');
exit;
