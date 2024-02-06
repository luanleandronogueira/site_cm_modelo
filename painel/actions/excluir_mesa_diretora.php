<?php

require_once("../../config/db.php");
require_once("../../functions.php");

if (empty($_POST['btn_excluir_mesa_diretora'])) {
  $_SESSION['erroMessage'] = "<b>Oops</b>, Você não tem permissão para executar essa função !";
  redirect("painel/gerenciar_mesa_diretora");
  die;
}

if (isset($_POST['btn_excluir_mesa_diretora'])) {
  $excluir_vereador = $db->prepare("DELETE FROM `mesa_diretora` WHERE `id` = :id");
  $excluir_vereador->execute(array(
    ':id' => $_POST['id_excluir_mesa_diretora']
  ));

  $_SESSION['successMessage'] = 'Excluido com Sucesso !';
  header("Location: {$_SERVER['HTTP_REFERER']}");
  die();
}
