<?php
require 'db.php';include 'header.php';

$stmt = $pdo->query("SELECT * FROM produtos");
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Listar Defensivos</title>
  

</head>



<body >


  <h1 class="pd">Defensivos</h1>
   <a href="create.php" class="pd mg"><button type="button" class="btn btn-primary">Adicionar</button></a>
  <br> 
  <table border="1" class="table ">
    <tr>
      <th>Codigo</th>
      <th>Descritivo</th>
      <th>UDM</th>
      <th>Categoria</th>
      <th>Ações</th>
    </tr>
    <?php foreach ($produtos as $produtos): ?>
      <tr>
        <td><?= $produtos['codigo'] ?></td>
        <td><?= $produtos['descritivo'] ?></td>
        <td><?= $produtos['udm'] ?></td>
        <td><?= $produtos['categoria'] ?></td>
        <td>
          <a href="edit.php?codigo=<?= $produtos['codigo'] ?>"> <button type="button" class="btn btn-primary">Editar</button> </a>
          <a href="delete.php?codigo=<?= $produtos['codigo'] ?>" onclick="return confirm('Tem certeza que deseja deletar este produto?')">
            <button type="button" class="btn btn-danger">Deletar</button>
        </a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>