<?php

require_once("../../config/db.php");
require_once('../../functions.php');

if (!isset($_POST['cadastrar_projeto'])) {
  $_SESSION['erroMessage'] = "<b>Oops</b>, Você não tem permissão para executar essa função !";
  redirect("painel/gerenciar_pautas");
  die;
}

if (isset($_POST['cadastrar_projeto'])) {
  if (empty($_POST['title'])) {
    $_SESSION['erroMessage'] = "Campo <b>Título</b> não pode ser vazio !";
    redirect("painel/cadastrar_projeto_lei");
    die;
  } elseif (empty($_POST['date'])) {
    $_SESSION['erroMessage'] = "Campo <b>Data</b> não pode ser vazio !";
    redirect("painel/cadastrar_projeto_lei");
    die;
  } elseif (empty($_POST['number_projeto'])) {
    $_SESSION['erroMessage'] = "Campo <b>Número</b> não pode ser vazio !";
    redirect("painel/cadastrar_projeto_lei");
    die;
  } elseif (empty($_POST['origem'])) {
    $_SESSION['erroMessage'] = "Campo <b>Origem</b> não pode ser vazio !";
    redirect("painel/cadastrar_projeto_lei");
    die;
  } elseif (empty($_POST['ementa'])) {
    $_SESSION['erroMessage'] = "Campo <b>Ementa</b> não pode ser vazio !";
    redirect("painel/cadastrar_projeto_lei");
    die;
  } elseif ($_FILES['image']['size'] == 0) {
    $_SESSION['erroMessage'] = "Campo <b>Imagem</b> não pode ser vazio !";
    redirect("painel/cadastrar_projeto_lei");
    die;
  } else {
    if ($_FILES['image']['size'] != 0) {
      $image = $_FILES['image'];
      $image_name = $image['name'];
      $extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
      $new_image_name = uniqid() . '.' . $extension;

      if ($extension != "pdf") {
        $_SESSION['erroMessage'] = "Formato de arquivo inválido ! Formatos permitidos: <b>PDF</b>";
        redirect("painel/cadastrar_projeto_lei");
        die;
      } else {
        $cadastrar_ata_reuniao = $db->prepare("INSERT INTO `projeto_de_lei` (`title`, `date`, `number_projeto`, `origem`, `ementa`, `author`, `relator`, `file`) VALUES (:title, :date, :number_projeto, :origem, :ementa, :author, :relator, :file)");
        $cadastrar_ata_reuniao->execute(array(
          ':title' => $_POST['title'],
          ':date' => $_POST['date'],
          ':number_projeto' => $_POST['number_projeto'],
          ':origem' => $_POST['origem'],
          ':ementa' => $_POST['ementa'],
          ':author' => $_POST['author'],
          ':relator' => $_POST['relator'],
          ':file' => $new_image_name
        ));

        move_uploaded_file($image['tmp_name'], '../../documentos/arquivos_pdf/projetos_lei/' . $new_image_name);

        $_SESSION['successMessage'] = 'Projeto de Lei cadastrado com sucesso !';
        header("Location: {$_SERVER['HTTP_REFERER']}");
        die();
      }
    }
  }
}
