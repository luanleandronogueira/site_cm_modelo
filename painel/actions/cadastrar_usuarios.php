<?php 

require_once("../../config/db.php");

if ($_POST['btn_cadastrar_usuario']) {
  $stmt = $db->prepare("SELECT * FROM `users` WHERE `login` = :login");
  $stmt->execute(array(
    ':login' => $_POST['login']
  ));
  $results = $stmt->fetchAll();

  if (count($results) < 1) {
    $stmt = $db->prepare('INSERT INTO `users` (`login`, `name`, `password`, `status`, `access_level`, `id_vereador`) VALUES (:login, :name, :password, :status, :access_level, :id_vereador)');
    $stmt->execute(array(
      ':login' => $_POST['login'],
      ':name' => $_POST['name'],
      ':password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
      ':status' => 1,
      ':access_level' => $_POST['access_level'],
      ':id_vereador' => $_POST['id_vereador']
    ));
    $user = $db->lastInsertId();

    $_SESSION['successMessage'] = 'Usuário cadastrado com sucesso !';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  } else {
    $_SESSION['erroMessage'] = 'Usuário já está cadastrado, tente outro !';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  }
}

?>