<?php

require_once("../../config/db.php");
require_once("../../functions.php");

if (empty($_POST['btn_excluir_tramitacao'])) {
    $_SESSION['erroMessage'] = "<b>Oops</b>, Você não tem permissão para executar essa função !";
    redirect("painel/gerenciar_pautas");
    die;
}  

if (isset($_POST['btn_excluir_tramitacao'])) {
    $excluir_noticia = $db->prepare("DELETE FROM `tramitacao` WHERE `idTramitacao` = :idTramitacao");
    $excluir_noticia->execute(array(
      ':idTramitacao' => $_POST['id_excluir_tramitacao']
    ));

    if (is_file("../../documentos/arquivos_pdf/tramitacao/".$_POST['file_excluir_tramitacao'])) {
      /* Remove o arquivo */
      unlink("../../documentos/arquivos_pdf/tramitacao/".$_POST['file_excluir_tramitacao']);
  }

    $_SESSION['successMessage'] = 'Tramitação excluida com sucesso !';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  }
