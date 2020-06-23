<?php
session_start();
include('../php/verify_login.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=MuseoModerno&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
  <title>Secret App</title>
</head>

<body>
  <div class="app">
    <div class="img-background"></div>
    <section class="menu">
      <h1>Bem vindo(a) <?php echo $_SESSION['username']; ?></h1>
      <ul>
        <li><a href="">Cadastro</a></li>
        <li><a href="">Consulta</a></li>
        <li><a href="">Busca</a></li>
      </ul>
      <h1> <a href="../php/logout.php">Sair</a></h1>
    </section>

  </div>
</body>

</html>