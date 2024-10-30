<?php
require 'db.php';

$codigo = $_GET['codigo'];
$stmt = $pdo->prepare("DELETE FROM produtos WHERE codigo = ?");
$stmt->execute([$codigo]);

header('Location: index.php');
exit;
