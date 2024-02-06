<?php
require_once("../config/db.php");
require_once('../functions.php');

if (isset($_SESSION[$sessionIdentifier])) {
  redirect('painel/dashboard');
  die();
}

if ($_POST) {
  $checkUser = $db->prepare("SELECT * FROM users WHERE `login` = :login");
  $checkUser->bindValue(":login", $_POST['login']);
  $checkUser->execute();

  
  if ($checkUser->rowCount() > 0) {
    $resultUser = $checkUser->fetchAll()[0];
    
    if (password_verify($_POST['password'], $resultUser['password'])) {
      $_SESSION[$sessionIdentifier] = $resultUser['idUser'];
      $_SESSION[$userIdentifier] = $resultUser['name'];
      $_SESSION[$permissionIdentifier] = $resultUser['access_level'];
      $_SESSION[$statusIdentifier] = $resultUser['status'];
      $_SESSION[$vereadorIdentifier] = $resultUser['id_vereador'];

      redirect('painel/dashboard');
      die();

    } else {
      $messageErro = 'Usuario ou senha incorretos.';
    }
    
  } else {
    $messageErro = 'Usuario ou senha incorretos.';
  }
}
?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>JS Informática</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin w-100 m-auto">

    <form action="" method="POST">
      <img class="mb-4" src="img/logo.png" alt="" width="130">
      <h1 class="h3 mb-3 fw-normal">BEM - VINDO (A) !</h1>
      <?php require_once("../config/messages.php") ?>

      <div class="form-floating">
        <input type="text" name="login" class="form-control mb-3" id="login" required placeholder="Insira seu usuário...">
        <label for="login">Usuário</label>
      </div>

      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="password" required placeholder="Insira sua senha...">
        <label for="password">Senha</label>
      </div>

      <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">ENTRAR</button>
      <p class="mt-5 mb-3 text-muted">&copy; JS Informática <?= date('Y'); ?></p>
    </form>

  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>i
</body>

</html>