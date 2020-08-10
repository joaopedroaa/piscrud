<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <title>Sign in</title>
</head>

<body>
  <div class="img-background"></div>
  <section class="login">
    <form method="POST" action="./php/signin.php">
      <h1>Sign in</h1>
      <label for="login">Login</label>
      <input type="text" name="username" id="" placeholder="your login">

      <label for="password">Password</label>
      <input type="password" name="password" id="" placeholder="your password">

      <?php if (isset($_SESSION['unauthorized_password'])) : ?>
        <p class="login login-erro">Senha inválida</p>
      <?php endif; ?>

      <?php if (isset($_SESSION['unauthorized_login'])) : ?>
        <p class="login login-erro">Login inválida</p>
      <?php endif; ?>

      <?php if (isset($_SESSION['signup'])) : ?>
        <p class="login login-ok">Cadastrado com sucesso</p>
      <?php endif; ?>

      <?php
      session_start();
      unset($_SESSION['signup']);
      unset($_SESSION['unauthorized_login']);
      unset($_SESSION['unauthorized_password']);
      ?>

      <button class="btn-signin">Login</button>
      <p>Não possui cadastro? <a class="signin" href="./signup.php">Sign up</a> </p>
    </form>
  </section>
</body>

</html>
