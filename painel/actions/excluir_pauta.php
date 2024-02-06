<?php

require_once("../../config/db.php");
require_once("../../functions.php");

if (empty($_POST['btn_excluir_pauta'])) {
    $_SESSION['erroMessage'] = "<b>Oops</b>, Você não tem permissão para executar essa função !";
    redirect("painel/gerenciar_pautas");
    die;
}  

if (isset($_POST['btn_excluir_pauta'])) {
    $excluir_noticia = $db->prepare("DELETE FROM `pautas` WHERE `idPauta` = :idPauta");
    $excluir_noticia->execute(array(
      ':idPauta' => $_POST['id_excluir_pauta']
    ));

    if (is_file("../../documentos/arquivos_pdf/pautas/".$_POST['file_excluir_pauta'])) {
      /* Remove o arquivo */
      unlink("../../documentos/arquivos_pdf/pautas/".$_POST['file_excluir_pauta']);
  }

    $_SESSION['successMessage'] = 'Pauta excluida com sucesso !';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  }
