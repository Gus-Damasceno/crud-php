<?php
require 'db.php';include 'header.php';

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
  <title>Editar Defensivo</title>
</head>

<body>

  <div class="centralizar">

  <h1 class="pd mg"> Editar Defensivo</h1>
  <form method="POST" action="">

    <div class="mb-3">
    <label for="descritivo">Descritivo:</label>
    <input type="text" name="descritivo" id="descritivo" value="<?= $produtos['descritivo'] ?>" required><br>
    </div>

    <div class="mb-3">    
    <label for="udm">Udm:</label>
    <select name="udm" id="udm" class="form-select">
       <option value="-" <?= $produtos['udm'] == '-' ? 'selected' : '' ?>>-</option>
       <option value="LITRO" <?= $produtos['udm'] == 'LITRO' ? 'selected' : '' ?>>Litro</option>
       <option value="KG" <?= $produtos['udm'] == 'KG' ? 'selected' : '' ?>>Kg</option>
    </select>
</div>

    <div class="mb-3">
    <label for="categoria">Categoria:</label>
    <input type="text" name="categoria" id="categoria" value="<?= $produtos['categoria'] ?>" required><br>      
    </div>

  
   
    <button type="submit" class="btn btn-primary ">Atualizar</button>
  </form>
  <a href="index.php"> <button  type="button" class="btn btn-secondary mg">Voltar</button> </a>

  </div>
</body>

</html>