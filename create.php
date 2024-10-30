<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $descritivo = $_POST['descritivo'];
  $udm = $_POST['udm'];
  $categoria = $_POST['categoria'];
  

  $stmt = $pdo->prepare("INSERT INTO produtos (descritivo, udm,categoria) VALUES (?, ?, ?)");
  $stmt->execute([$descritivo, $udm,$categoria]);

  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Adicionar Produto</title>
</head>

<body>
  <h1>Adicionar Produto</h1>
  <form method="POST" action="">

    <label for="robson_field_one">Descritivo:</label>
    <input type="text" name="descritivo" id="descritivo" required><br>


    <label for="robson_field_two">UDM:</label>
    <input type="text" name="udm" id="udm" required><br>

    <label for="robson_field_two">Categoria:</label>
    <input type="text" name="categoria" id="categoria" required><br>



    <button type="submit">Adicionar</button>
  </form>
  <a href="index.php">Voltar</a>
</body>

</html>