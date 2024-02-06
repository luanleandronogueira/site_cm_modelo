<?php

require_once("../../config/db.php");
require_once('../../functions.php');

if (!isset($_POST['cadastrar_pauta'])) {
  $_SESSION['erroMessage'] = "<b>Oops</b>, Você não tem permissão para executar essa função !";
  redirect("painel/gerenciar_pautas");
  die;
}

if (isset($_POST['cadastrar_pauta'])) {
  if (empty($_POST['title'])) {
    $_SESSION['erroMessage'] = "Campo <b>Título</b> não pode ser vazio !";
    redirect("painel/cadastrar_pautas");
    die;
  } elseif (empty($_POST['date'])) {
    $_SESSION['erroMessage'] = "Campo <b>Data</b> não pode ser vazio !";
    redirect("painel/cadastrar_pautas");
    die;
  } elseif (empty($_POST['content'])) {
    $_SESSION['erroMessage'] = "Campo <b>Conteúdo</b> não pode ser vazio !";
    redirect("painel/cadastrar_pautas");
    die;
  } elseif ($_FILES['image']['size'] == 0) {
    $_SESSION['erroMessage'] = "Campo <b>Imagem</b> não pode ser vazio !";
    redirect("painel/cadastrar_pautas");
    die;
  } else {
    if ($_FILES['image']['size'] != 0) {
      $image = $_FILES['image'];
      $image_name = $image['name'];
      $extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
      $new_image_name = uniqid() . '.' . $extension;

      if ($extension != "pdf") {
        $_SESSION['erroMessage'] = "Formato de arquivo inválido ! Formatos permitidos: <b>PDF</b>";
        redirect("painel/cadastrar_pautas");
        die;
      } else {
        $cadastrar_ata_reuniao = $db->prepare("INSERT INTO `pautas` (`title`, `date`, `content`, `file`) VALUES (:title, :date, :content, :file)");
        $cadastrar_ata_reuniao->execute(array(
          ':title' => $_POST['title'],
          ':date' => $_POST['date'],
          ':content' => $_POST['content'],
          ':file' => $new_image_name
        ));

        move_uploaded_file($image['tmp_name'], '../../documentos/arquivos_pdf/pautas/' . $new_image_name);

        $_SESSION['successMessage'] = 'Pauta cadastrada com sucesso !';
        header("Location: {$_SERVER['HTTP_REFERER']}");
        die();
      }
    }
  }
}
