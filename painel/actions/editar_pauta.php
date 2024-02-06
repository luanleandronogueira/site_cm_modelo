<?php

require_once("../../config/db.php");
require_once('../../functions.php');

if (!isset($_POST['btn_editar_pauta']) || (empty($_POST['btn_editar_pauta']))) {
  $_SESSION['erroMessage'] = "<b>Oops</b>, Você não tem permissão para executar essa função !";
  redirect("painel/gerenciar_atas_reunioes");
  die;
}

if (isset($_POST['btn_editar_pauta'])) {
  if (empty($_POST['title'])) {
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
      if (is_file("../../documentos/arquivos_pdf/pautas/".$_POST['file_editar_pauta'])) {
        /* Remove o arquivo */
        unlink("../../documentos/arquivos_pdf/pautas/".$_POST['file_editar_pauta']);
    }
      move_uploaded_file($image['tmp_name'], '../../documentos/arquivos_pdf/pautas/' . $new_image_name);
    } else {
      $new_image_name = $_POST['file_editar_pauta'];
    }
    $editar_requerimento = $db->prepare("UPDATE `pautas` SET `title` = :title, `content` = :content, `date` = :date, `file` = :file WHERE `idPauta` = :idPauta");
    $editar_requerimento->execute(array(
      ':idPauta' => $_POST['id_editar_pauta'],
      ':title' => $_POST['title'],
      ':content' => $_POST['content'],
      ':date' => $_POST['date'],
      ':file' => $new_image_name
    ));
    $_SESSION['successMessage'] = 'Pauta editada com sucesso !';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  }
}