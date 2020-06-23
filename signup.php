<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <title>Sign up</title>
</head>

<body>
  <div class="img-background"></div>
  <section class="login">
    <form method="POST" action="./php/signup.php">
      <h1>Sign up</h1>
      <label for="name">Nome</label>
      <input type="text" name="name" id="" placeholder="your name">

      <label for="login">Login</label>
      <input type="text" name="login" id="" placeholder="your login">

      <label for="password">Password</label>
      <input type="password" name="password" id="" placeholder="your password">

      <button class="btn-signup">Cadastrar</button>
      <p>já possui cadastro? <a class="signup" href="./index.php">Login</a> </p>
    </form>
  </section>
</body>

</html>