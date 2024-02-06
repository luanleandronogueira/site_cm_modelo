<?php

require_once("../../config/db.php");
require_once("../../functions.php");

if (empty($_POST['btn_excluir_vereador'])) {
  $_SESSION['erroMessage'] = "<b>Oops</b>, Você não tem permissão para executar essa função !";
  redirect("painel/gerenciar_vereadores");
  die;
}

if (isset($_POST['btn_excluir_vereador'])) {
  $excluir_vereador = $db->prepare("DELETE FROM `vereadores` WHERE `idVereador` = :idVereador");
  $excluir_vereador->execute(array(
    ':idVereador' => $_POST['id_excluir_vereador']
  ));

  if (is_file("../../documentos/imagens_vereadores/" . $_POST['image_excluir_vereador'])) {
    /* Remove o arquivo */
    unlink("../../documentos/imagens_vereadores/" . $_POST['image_excluir_vereador']);
  }

  $excluir_vereador_mesa = $db->prepare("DELETE FROM `mesa_diretora` WHERE `id_vereador` = :idVereador");
  $excluir_vereador_mesa->execute(array(
    ':idVereador' => $_POST['id_excluir_vereador']
  ));

  $_SESSION['successMessage'] = 'Vereador Excluido com Sucesso !';
  header("Location: {$_SERVER['HTTP_REFERER']}");
  die();
}
