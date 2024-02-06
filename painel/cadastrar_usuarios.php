<?php 

require_once("../config/db.php");

if ($_POST) {
  //Checking if the email already exists
  $stmt = $db->prepare("SELECT * FROM users WHERE `login` = ':login'");
  $stmt->execute(array(
    ':login' => $_POST['login']
  ));
  $results = $stmt->fetchAll();

  if (count($results) < 1) {
    //Registering the user
    $stmt = $db->prepare('INSERT INTO users (`login`, `name`, `password`, `status`, `access_level`) VALUES (:login, :name, :password, :status, :access_level)');
    $stmt->execute(array(
      ':login' => $_POST['login'],
      ':name' => $_POST['name'],
      ':password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
      ':status' => 1,
      ':access_level' => $_POST['access_level']
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