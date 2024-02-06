<?php

require_once("../../config/db.php");
require_once('../../functions.php');

if (!isset($_POST['btn_editar_noticia']) || (empty($_POST['btn_editar_noticia']))) {
  $_SESSION['erroMessage'] = "<b>Oops</b>, Você não tem permissão para executar essa função !";
  redirect("painel/gerenciar_noticias");
  die;
}

if (isset($_POST['btn_editar_noticia'])) {
  if (empty($_POST['title'])) {
    $_SESSION['erroMessage'] = "Campo <b>Título</b> não pode ser vazio !";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  } elseif (empty($_POST['date'])) {
    $_SESSION['erroMessage'] = "Campo <b>Data</b> não pode ser vazio !";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  } elseif (empty($_POST['content'])) {
    $_SESSION['erroMessage'] = "Campo <b>Conteúdo</b> não pode ser vazio !";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  } else {
    if ($_FILES['image']['size'] != 0) {
      $image = $_FILES['image'];
      $image_name = $image['name'];
      $extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
      $new_image_name = uniqid() . '.' . $extension;
    
      if ($extension != "jpg" && $extension != "png" && $extension != "jpeg") {
        $_SESSION['erroMessage'] = "Formato de arquivo inválido ! Formatos permitidos: <b>JPG, </b> <b>JPEG</b> e <b>PNG</b>";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        die;
      }
      if (is_file("../../documentos/imagens_noticias/".$_POST['image_editar_noticia'])) {
        /* Remove o arquivo */
        unlink("../../documentos/imagens_noticias/".$_POST['image_editar_noticia']);
    }
      move_uploaded_file($image['tmp_name'], '../../documentos/imagens_noticias/' . $new_image_name);
    } else {
      $new_image_name = $_POST['image_editar_noticia'];
    }
    $editar_noticia = $db->prepare("UPDATE `news` SET `title` = :title, `content` = :content, `date` = :date, `image` = :image WHERE `idNews` = :idNews");
    $editar_noticia->execute(array(
      ':idNews' => $_POST['id_editar_noticia'],
      ':title' => str_replace('"', "'", $_POST['title']),
      ':content' => str_replace('"', "'",$_POST['content']),
      ':date' => $_POST['date'],
      ':image' => $new_image_name
    ));
    $_SESSION['successMessage'] = 'Notícia editada com sucesso ! ';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  }
}