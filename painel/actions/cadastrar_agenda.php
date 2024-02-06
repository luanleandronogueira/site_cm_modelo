<?php

require_once("../../config/db.php");
require_once('../../functions.php');

if (!isset($_POST['cadastrar_agenda'])) {
  $_SESSION['erroMessage'] = "<b>Oops</b>, Você não tem permissão para executar essa função !";
  redirect("painel/gerenciar_agenda");
  die;
}

if (isset($_POST['cadastrar_agenda'])) {
  if (empty($_POST['title'])) {
    $_SESSION['erroMessage'] = "Campo <b>Título</b> não pode ser vazio !";
    redirect("painel/cadastrar_agenda");
    die;
  } elseif (empty($_POST['date'])) {
    $_SESSION['erroMessage'] = "Campo <b>Data</b> não pode ser vazio !";
    redirect("painel/cadastrar_agenda");
    die;
  } elseif (empty($_POST['hour'])) {
    $_SESSION['erroMessage'] = "Campo <b>Horário</b> não pode ser vazio !";
    redirect("painel/cadastrar_agenda");
    die;
  } elseif (empty($_POST['description'])) {
    $_SESSION['erroMessage'] = "Campo <b>Evento</b> não pode ser vazio !";
    redirect("painel/cadastrar_agenda");
    die;
  } else {
    $cadastrar_agenda = $db->prepare("INSERT INTO `agenda_oficial` (`title`, `date`, `description`, `hour`) VALUES (:title, :date, :description, :hour)");
    $cadastrar_agenda->execute(array(
      ':title' => $_POST['title'],
      ':description' => $_POST['description'],
      ':date' => $_POST['date'],
      ':hour' => $_POST['hour'],
    ));

    $_SESSION['successMessage'] = 'Agenda oficial cadastrada com sucesso !';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  }
}
