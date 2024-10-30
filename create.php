<?php
require 'db.php'; include 'header.php';

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
  <title>Cadastrar Defensivo</title>
  
</head>

<body>
  <div class="centralizar">
  <h1 class="pd mg">Cadastrar Defensivo</h1>
  <form method="POST" action="">

  <div class="mb-3">
  <label for="descritivo">Descritivo:</label>
    <input type="text" name="descritivo" id="descritivo" required><br>
  </div>


   <div class="mb-3">
     <label for="udm">UDM:</label>
     <select name="udm" id="udm" class="form-select">
       <option value="-">-</option>
       <option value="LITRO">Litro</option>
       <option value="KG">Kg</option>
     </select>
   </div>

    <!-- <input type="text" name="udm" id="udm" required><br> -->

<div class="mb-3">  
  <label for="categoria" >Categoria:</label>
  <select name="categoria" id="categoria" class="form-select">
    <option value="-">-</option>
    <option value="HERBICIDA">Herbicida</option>
    <option value="FUNGICIDA">Fungicida</option>
    <option value="INSETICIDA">Inseticida</option>
  </select>
</div>



    <button type="submit" class="btn btn-primary ">Adicionar</button>
  </form>
  

  <a href="index.php" class=""> <button type="button" class="btn btn-secondary mg">Voltar</button>  </a>

</div>
  
</body>

</html>