<?php

require_once("../../config/db.php");
require_once('../../functions.php');


if (!isset($_POST['btn_editar_mesa_diretora']) || (empty($_POST['btn_editar_mesa_diretora']))) {
  $_SESSION['erroMessage'] = "<b>Oops</b>, Você não tem permissão para executar essa função !";
  redirect("painel/gerenciar_mesa_diretora");
  die;
}

if (isset($_POST['btn_editar_mesa_diretora'])) {
  if (empty($_POST['responsibility'])) {
    $_SESSION['erroMessage'] = "Campo <b>Responsabilidade</b> não pode ser vazio !";
    redirect("painel/gerenciar_mesa_diretora");
    die;
  } else {
    
    $editar_mesa_diretora = $db->prepare("UPDATE `mesa_diretora` SET `responsibility` = :responsibility, `bieno` = :bieno, `start_date` = :start_date, `end_date` = :end_date, `status_mesa` = :status_mesa WHERE `id` = :id");
    $editar_mesa_diretora->execute(array(
      ':id' => $_POST['id_editar_mesa_diretora'],
      ':responsibility' => $_POST['responsibility'],
      ':bieno' => $_POST['bieno'],
      ':start_date' => $_POST['start_date'],
      ':end_date' => $_POST['end_date'],
      ':status_mesa' => $_POST['status_mesa']
    ));

    $_SESSION['successMessage'] = 'Mesa editada com sucesso !';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  }
}