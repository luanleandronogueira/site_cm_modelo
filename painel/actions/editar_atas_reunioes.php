<?php

require_once("../../config/db.php");
require_once('../../functions.php');

if (!isset($_POST['btn_editar_ata_reuniao']) || (empty($_POST['btn_editar_ata_reuniao']))) {
  $_SESSION['erroMessage'] = "<b>Oops</b>, Você não tem permissão para executar essa função !";
  redirect("painel/gerenciar_atas_reunioes");
  die;
}

if (isset($_POST['btn_editar_ata_reuniao'])) {
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
      if (is_file("../../documentos/arquivos_pdf/atas_ordinarias/".$_POST['file_editar_ata_reuniao'])) {
        /* Remove o arquivo */
        unlink("../../documentos/arquivos_pdf/atas_ordinarias/".$_POST['file_editar_ata_reuniao']);
    }
      move_uploaded_file($image['tmp_name'], '../../documentos/arquivos_pdf/atas_ordinarias/' . $new_image_name);
    } else {
      $new_image_name = $_POST['file_editar_ata_reuniao'];
    }
    $editar_requerimento = $db->prepare("UPDATE `atas_reunioes` SET `title` = :title, `content` = :content, `date` = :date, `file` = :file WHERE `idAta` = :idAta");
    $editar_requerimento->execute(array(
      ':idAta' => $_POST['id_editar_ata_reuniao'],
      ':title' => $_POST['title'],
      ':content' => $_POST['content'],
      ':date' => $_POST['date'],
      ':file' => $new_image_name
    ));
    $_SESSION['successMessage'] = 'Ata ordinária editada com sucesso !';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  }
}