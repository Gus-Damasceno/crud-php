<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM produtos");
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Listar Produtos</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>






<body>


  <h1>Produtos</h1>
   <a href="create.php"><button type="button" class="btn btn-primary">Adicionar</button></a>
  
  <table border="1" class="table ">
    <tr>
      <th>Codigo</th>
      <th>Descritivo</th>
      <th>UDM</th>
      <th>Categoria</th>
    </tr>
    <?php foreach ($produtos as $produtos): ?>
      <tr>
        <td><?= $produtos['codigo'] ?></td>
        <td><?= $produtos['descritivo'] ?></td>
        <td><?= $produtos['udm'] ?></td>
        <td><?= $produtos['categoria'] ?></td>
        <td>
          <a href="edit.php?codigo=<?= $produtos['codigo'] ?>">Editar</a>
          <a href="delete.php?codigo=<?= $produtos['codigo'] ?>" onclick="return confirm('Tem certeza que deseja deletar este produto?')">Deletar</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>