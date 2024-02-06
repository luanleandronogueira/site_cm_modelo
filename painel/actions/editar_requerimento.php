<?php

require_once("../../config/db.php");
require_once('../../functions.php');

if (!isset($_POST['btn_editar_requerimento']) || (empty($_POST['btn_editar_requerimento']))) {
  $_SESSION['erroMessage'] = "<b>Oops</b>, Você não tem permissão para executar essa função !";
  redirect("painel/gerenciar_requerimentos");
  die;
}

if (isset($_POST['btn_editar_requerimento'])) {
  if (empty($_POST['number_ato'])) {
    $_SESSION['erroMessage'] = "Campo <b>N° Ato</b> não pode ser vazio !";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  } elseif (empty($_POST['title'])) {
    $_SESSION['erroMessage'] = "Campo <b>Título</b> não pode ser vazio !";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  } elseif (empty($_POST['date'])) {
    $_SESSION['erroMessage'] = "Campo <b>Data do requerimento</b> não pode ser vazio !";
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
    
      if ($extension != "pdf") {
        $_SESSION['erroMessage'] = "Formato de arquivo inválido ! Formatos permitidos: <b>PDF</b>";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        die;
      }
      if (is_file("../../documentos/arquivos_pdf/requerimentos/".$_POST['file_editar_requerimento'])) {
        /* Remove o arquivo */
        unlink("../../documentos/arquivos_pdf/requerimentos/".$_POST['file_editar_requerimento']);
    }
      move_uploaded_file($image['tmp_name'], '../../documentos/arquivos_pdf/requerimentos/' . $new_image_name);
    } else {
      $new_image_name = $_POST['file_editar_requerimento'];
    }
    $editar_requerimento = $db->prepare("UPDATE `requerimentos` SET `number_ato` = :number_ato, `title` = :title, `content` = :content, `date` = :date, `file` = :file WHERE `idRequerimento` = :idRequerimento");
    $editar_requerimento->execute(array(
      ':idRequerimento' => $_POST['id_editar_requerimento'],
      ':number_ato' => $_POST['number_ato'],
      ':title' => $_POST['title'],
      ':content' => $_POST['content'],
      ':date' => $_POST['date'],
      ':file' => $new_image_name
    ));
    $_SESSION['successMessage'] = 'Requerimento editado com sucesso ! ';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  }
}