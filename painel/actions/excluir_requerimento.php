<?php

require_once("../../config/db.php");
require_once("../../functions.php");

if (empty($_POST['btn_excluir_requerimento'])) {
    $_SESSION['erroMessage'] = "<b>Oops</b>, Você não tem permissão para executar essa função !";
    redirect("painel/gerenciar_requerimentos");
    die;
}  

if (isset($_POST['btn_excluir_requerimento'])) {
    $excluir_noticia = $db->prepare("DELETE FROM `requerimentos` WHERE `idRequerimento` = :idRequerimento");
    $excluir_noticia->execute(array(
      ':idRequerimento' => $_POST['id_excluir_requerimento']
    ));

    if (is_file("../../documentos/arquivos_pdf/requerimentos/".$_POST['file_excluir_requerimento'])) {
      /* Remove o arquivo */
      unlink("../../documentos/arquivos_pdf/requerimentos/".$_POST['file_excluir_requerimento']);
  }

    $_SESSION['successMessage'] = 'Requerimento excluido com sucesso ! ';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  }
