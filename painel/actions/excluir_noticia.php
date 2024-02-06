<?php

require_once("../../config/db.php");
require_once("../../functions.php");

if (empty($_POST['btn_excluir_noticia'])) {
    $_SESSION['erroMessage'] = "<b>Oops</b>, Você não tem permissão para executar essa função !";
    redirect("painel/gerenciar_noticias");
    die;
}  

if (isset($_POST['btn_excluir_noticia'])) {
    $excluir_noticia = $db->prepare("DELETE FROM `news` WHERE `idNews` = :idNews");
    $excluir_noticia->execute(array(
      ':idNews' => $_POST['id_excluir_noticia']
    ));

    if (is_file("../../documentos/imagens_noticias/".$_POST['image_excluir_noticia'])) {
      /* Remove o arquivo */
      unlink("../../documentos/imagens_noticias/".$_POST['image_excluir_noticia']);
  }

    $_SESSION['successMessage'] = 'Notícia excluida com sucesso ! ';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  }
