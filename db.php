<?php
$host = 'localhost';  
$dbname = 'trabalho_crud_redes';  
$username = 'root';  
$password = 'treeofmysql15';  

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}
