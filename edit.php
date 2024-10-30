<?php
require 'db.php';

$codigo = $_GET['codigo'];
$stmt = $pdo->prepare("SELECT * FROM produtos WHERE codigo = ?");
$stmt->execute([$codigo]);
$produtos = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produtos) {
  die("Produto não encontrado.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $descritivo = $_POST['descritivo'];
  $udm = $_POST['udm'];
  $categoria = $_POST['categoria'];


  $stmt = $pdo->prepare("UPDATE produtos SET descritivo = ?, udm = ?, categoria = ?  WHERE codigo = ?");
  $stmt->execute([$descritivo,$udm,$categoria, $codigo]);

  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Editar Produto</title>
</head>

<body>
  <h1>Editar Produto</h1>
  <form method="POST" action="">

    <label for="descritivo">Descritivo:</label>
    <input type="text" name="descritivo" id="descritivo" value="<?= $produtos['descritivo'] ?>" required><br>

    <label for="udm">Udm:</label>
    <input type="text" name="udm" id="udm" value="<?= $produtos['udm'] ?>" required><br>

    <label for="categoria">Categoria:</label>
    <input type="text" name="categoria" id="categoria" value="<?= $produtos['categoria'] ?>" required><br>

    <button type="submit">Atualizar</button>
  </form>
  <a href="index.php">Voltar</a>
</body>

</html>