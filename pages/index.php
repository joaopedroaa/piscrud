<!DOCTYPE html>
<?php session_start(); ?>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
  <title>Piscrud</title>
</head>

<body>
  <aside class="locadora">
    <form action="../php/create.php" method="post">
      <h2>
        <a href="../php/utils/logout.php">
          <i class="fas fa-times"></i>
          <?php echo $_SESSION['name']; ?>
        </a>
      </h2>
      <!-- <h1>Lo<span>car</span>dora</h1> -->

      <label for="name">Nome do aluno</label>
      <input type="text" name="name" id="name">

      <label for="birth">Data de Nascimento</label>
      <input type="date" name="birth" id="birth">

      <label for="rg">RG</label>
      <input type="text" name="rg" id="rg">

      <label for="cpf">CPF</label>
      <input type="text" name="cpf" id="cpf">

      <label for="phone">Telefone</label>
      <input type="text" name="phone" id="phone">

      <label for="course">Curso</label>
      <select name="course" id="course">
        <option value="Química">Química</option>
        <option value="Informática">Informática</option>
        <option value="Administração">Administração</option>
        <option value="Petróleo e Gás">Petróleo e Gás</option>
        <option value="Segurança do Trabalho">Segurança do Trabalho</option>
      </select>

      <label for="year">Ano</label>
      <select name="year" id="year">
        <option value="1">1 Ano</option>
        <option value="2">2 Ano</option>
        <option value="3">3 Ano</option>
      </select>

      <label for="expedient">Turno</label>
      <select name="expedient" id="expedient">
        <option value="matutino">Matutino</option>
        <option value="vespertino">Vespertino</option>
      </select>


      <button type="submit">Cadastrar</button>
    </form>
  </aside>

  <section class="table">
    <h1>Cadastros</h1>

    <form class="search-section" action="" method="post">
      <select name="options" id="">
        <option value="registration">Matricula</option>
        <option value="name">Nome</option>
        <option value="birth">Data de nascimento</option>
        <option value="rg">RG</option>
        <option value="cpf">CPF</option>
        <option value="phone">Telefone</option>
        <option value="course">Curso</option>
        <option value="year">Ano</option>
        <option value="expedient">Turno</option>
      </select>
      <input type="text" name="search">
      <button><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>

    <?php
    include_once "../php/connect.php";
    include_once '../php/utils/verify_login.php';

    $searchText = $_POST['search'];
    $options = $_POST['options'];


    // TODO: Arrumar está coisa horrivel depois
    // if (!isset($options) || $searchText == "") {
    //   $sqlRead = "SELECT * FROM $tableApp";
    //   $sqlCount =  "SELECT COUNT(*) as total FROM $tableApp";
    // } else {
    //   if (
    //     $options == "registration" || $options == "rg" || $options == "cpf" ||
    //     $options == "phone" || $options == "year" || $options == "expedient"
    //   ) {
    //     $sqlRead = "SELECT * FROM $tableApp WHERE $options LIKE '$searchText';";
    //     $sqlCount =  "SELECT COUNT(*) as total FROM $tableApp WHERE $options LIKE '$searchText';";
    //   } else {
    //     $sqlRead = "SELECT * FROM $tableApp WHERE $options LIKE '$searchText%';";
    //     $sqlCount =  "SELECT COUNT(*) as total FROM $tableApp WHERE $options LIKE '$searchText%';";
    //   }
    // }


    $sqlRead = "SELECT * FROM $tableApp";
    $sqlCount =  "SELECT COUNT(*) as total FROM $tableApp";
    if (isset($options) && $searchText !== "") {
      if (
        $options == "registration" || $options == "rg" || $options == "cpf" ||
        $options == "phone" || $options == "year" || $options == "expedient"
      ) {
        $sqlRead .= " WHERE $options LIKE '$searchText'";
        $sqlCount .=  " WHERE $options LIKE '$searchText'";
      } else {
        $sqlRead .= " WHERE $options LIKE '$searchText%'";
        $sqlCount .=  " WHERE $options LIKE '$searchText%'";
      }
    }
    $sqlRead .= ";";
    $sqlCount .=  ";";

    $queryRead = mysqli_query($connect, $sqlRead);
    $queryCount = mysqli_query($connect, $sqlCount);
    $searchTotal = mysqli_fetch_assoc($queryCount)['total'];

    if (!$queryCount || !$queryRead) {
      die("Falha na comunicação com o banco de dados!");
    }

    echo "<p class='query'>$searchTotal encontrados</p>";
    // echo "<p class='query'>$sqlRead </p>";
    // echo "<p class='query'>$sqlCount </p>";


    $searchRows = [];
    if (mysqli_num_rows($queryRead) > 0) {
      while ($row = mysqli_fetch_assoc($queryRead)) {
        $searchRows[] = $row;
      }
    } else {
      echo "Nenhum dado encontrado";
    }
    ?>
    <table>
      <thead>
        <th>Matricula</th>
        <th>Nome</th>
        <th>Nascimento</th>
        <th>RG</th>
        <th>CPF</th>
        <th>Telefone</th>
        <th>Curso</th>
        <th>Ano</th>
        <th>Turno</th>
        <th></th>
      </thead>
      <tbody>
        <?php foreach ($searchRows as $value) : ?>
          <tr>
            <td><?= $value["registration"] ?> </td>
            <td><?= $value["name"]  ?> </td>
            <td><?= $value["birth"] ?> </td>
            <td><?= $value["rg"] ?> </td>
            <td><?= $value["cpf"] ?> </td>
            <td><?= $value["phone"] ?> </td>
            <td><?= $value["course"] ?> </td>
            <td><?= $value["year"] ?> </td>
            <td><?= $value["expedient"] ?> </td>
            <td><a class='btn-delete' href='../php/delete.php?id=<?= $value['registration'] ?>'><i class='fas fa-trash'></i></a></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </section>
</body>

<script src="https://kit.fontawesome.com/1e26d1774e.js" crossorigin="anonymous"></script>
<script src="../js/data.js"></script>
<script src="../js/shared.js"></script>
<script src="../js/addInput.js"></script>

</html>
