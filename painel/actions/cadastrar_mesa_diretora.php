<?php

require_once("../../config/db.php");
require_once('../../functions.php');

if (!isset($_POST['cadastrar_mesa_diretora'])) {
  $_SESSION['erroMessage'] = "<b>Oops</b>, Você não tem permissão para executar essa função !";
  redirect("painel/gerenciar_mesa_diretora");
  die;
}

if (isset($_POST['cadastrar_mesa_diretora'])) {
  if (empty($_POST['id_vereador'])) {
    $_SESSION['erroMessage'] = "Campo <b>Nome do Vereador(a)</b> não pode ser vazio !";
    redirect("painel/cadastrar_mesa_diretora");
    die;
  } elseif (empty($_POST['responsibility'])) {
    $_SESSION['erroMessage'] = "Campo <b>Responsabilidade</b> não pode ser vazio !";
    redirect("painel/cadastrar_mesa_diretora");
    die;
  }
}

if ($_POST['cadastrar_mesa_diretora']) {
  $listar_mesa_diretora = $db->prepare("SELECT * FROM `mesa_diretora` WHERE `id_vereador` = :id_vereador || `responsibility` = :responsibility");
  $listar_mesa_diretora->execute(array(
    ':id_vereador' => $_POST['id_vereador'],
    ':responsibility' => $_POST['responsibility']
  ));
  $resultado_mesa_diretora = $listar_mesa_diretora->fetchAll();

  if (count($resultado_mesa_diretora) < 1) {
    $stmt = $db->prepare("INSERT INTO `mesa_diretora` (`id_vereador`, `responsibility`, `bieno`, `start_date`, `end_date`, `status_mesa`) VALUES (:id_vereador, :responsibility, :bieno, :start_date, :end_date, :status_mesa)");
    $stmt->execute(array(
      ':id_vereador' => $_POST['id_vereador'],
      ':responsibility' => $_POST['responsibility'],
      ':bieno' => $_POST['bieno'],
      ':start_date' => $_POST['start_date'],
      ':end_date' => $_POST['end_date'],
      ':status_mesa' => 1
    ));

    $_SESSION['successMessage'] = 'Cargo cadastrado com sucesso !';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  } else {
    $_SESSION['erroMessage'] = 'Vereador(a) já possui um cargo cadastrado !';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  }
}
