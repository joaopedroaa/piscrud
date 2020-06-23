<!DOCTYPE html>
<html lang="pt-br">
<?php
session_start();
include('../php/utils/verify_login.php')
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
  <title>Locardora</title>
</head>

<body>
  <aside class="locadora">
    <form action="../php/create.php" method="post">
      <h2><a href="../php/utils/logout.php"><i class="fas fa-times"></i> Sair</a></h2>
      <!-- <h1>Lo<span>car</span>dora</h1> -->

      <label for="">Modelo</label>
      <input type="text" name="model" id="model" placeholder="S" required>

      <label for="">Marca</label>
      <input type="text" name="brand" id="brand" placeholder="Tesla" required>

      <label for="">Preco</label>
      <input type="number" name="price" id="price" placeholder="50.200" required step="0.001">

      <label for="">Ano</label>
      <input type="number" name="year" id="year" placeholder="2017" required min="1769" max="2022">

      <label for="">Cor</label>
      <input type="text" name="color" id="color" placeholder="Roxo" required>

      <button type="submit">Cadastrar</button>
    </form>
  </aside>

  <section class="table">
    <h1>Cadastros</h1>

    <form class="search-section" action="" method="post">
      <select name="options" id="">
        <option value="brand">Marca</option>
        <option value="id">Código</option>
        <option value="model">Modelo</option>
        <option value="price">Preco</option>
        <option value="carYear">Ano</option>
        <option value="color">Cor</option>
      </select>
      <input type="text" name="search">
      <button><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>

    <?php
    include_once "../php/connect.php";
    $searchText = $_POST['search'];
    $options = $_POST['options'];

    // TODO: Arrumar está coisa horrivel depois
    if (isset($options)) {
      if ($options == "id" || $options == "price" || $options == "carYear") {
        $sqlRead = "SELECT * FROM $table WHERE $options LIKE '$searchText';";
        $sqlCount =  "SELECT COUNT(*) as total FROM $table WHERE $options LIKE '$searchText';";
      } else {
        $sqlRead = "SELECT * FROM $table WHERE $options LIKE '$searchText%';";
        $sqlCount =  "SELECT COUNT(*) as total FROM $table WHERE $options LIKE '$searchText%';";
      }
    } else {
      $sqlRead = "SELECT *  FROM $table";
      $sqlCount =  "SELECT COUNT(*) as total FROM $table";
    }

    $queryRead = mysqli_query($connect, $sqlRead);
    $queryCount = mysqli_query($connect, $sqlCount);

    $searchTotal = mysqli_fetch_assoc($queryCount)['total'];
    echo "<p class='query'>$searchTotal encontrados</p>";
    // echo "<p class='query'>$sqlRead </p>";
    // echo "<p class='query'>$sqlCount </p>";
    $searchData = [];
    if ($queryRead->num_rows > 0) {
      while ($row = mysqli_fetch_assoc($queryRead)) {
        $searchData[] = $row;
      }
    } else {
      echo "Nada encontrado";
    }
    ?>

    <table>
      <thead>
        <th>Código</th>
        <th>Modelo</th>
        <th>Marca</th>
        <th>Preco</th>
        <th>Ano</th>
        <th>Cor</th>
        <th></th>
      </thead>
      <tbody>
        <?php foreach ($searchData as $value) : ?>
          <tr>
            <td><?= $value['id'] ?> </td>
            <td><?= $value['model'] ?> </td>
            <td><?= $value['brand'] ?> </td>
            <td><?= $value['price'] ?> </td>
            <td><?= $value['carYear'] ?> </td>
            <td><?= $value['color'] ?> </td>
            <td><a class='btn-delete' href='../php/delete.php?id=<?= $value['id'] ?>'><i class='fas fa-trash'></i></a></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </section>

</body>
<script src="../js/addInput.js"></script>
<script src="../js/data.js"></script>
<script src="https://kit.fontawesome.com/1e26d1774e.js" crossorigin="anonymous"></script>

</html>