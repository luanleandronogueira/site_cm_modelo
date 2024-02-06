<?php

require_once("../../config/db.php");
require_once("../../functions.php");

if (empty($_POST['btn_excluir_ata_reuniao'])) {
    $_SESSION['erroMessage'] = "<b>Oops</b>, Você não tem permissão para executar essa função !";
    redirect("painel/gerenciar_atas_reunioes");
    die;
}  

if (isset($_POST['btn_excluir_ata_reuniao'])) {
    $excluir_noticia = $db->prepare("DELETE FROM `atas_reunioes` WHERE `idAta` = :idAta");
    $excluir_noticia->execute(array(
      ':idAta' => $_POST['id_excluir_ata_reuniao']
    ));

    if (is_file("../../documentos/arquivos_pdf/atas_ordinarias/".$_POST['file_excluir_ata_reuniao'])) {
      /* Remove o arquivo */
      unlink("../../documentos/arquivos_pdf/atas_ordinarias/".$_POST['file_excluir_ata_reuniao']);
  }

    $_SESSION['successMessage'] = 'Ata ordinária excluida com sucesso !';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  }
