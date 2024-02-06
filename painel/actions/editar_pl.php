<?php

require_once("../../config/db.php");
require_once('../../functions.php');

if (!isset($_POST['btn_editar_pl']) || (empty($_POST['btn_editar_pl']))) {
  $_SESSION['erroMessage'] = "<b>Oops</b>, Você não tem permissão para executar essa função !";
  redirect("painel/gerenciar_atas_reunioes");
  die;
}

if (isset($_POST['btn_editar_pl'])) {
  if (empty($_POST['title'])) {
    $_SESSION['erroMessage'] = "Campo <b>Título</b> não pode ser vazio !";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  } elseif (empty($_POST['date'])) {
    $_SESSION['erroMessage'] = "Campo <b>Data do requerimento</b> não pode ser vazio !";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  } elseif (empty($_POST['ementa'])) {
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
      if (is_file("../../documentos/arquivos_pdf/projetos_lei/".$_POST['file_editar_projeto_lei'])) {
        /* Remove o arquivo */
        unlink("../../documentos/arquivos_pdf/projetos_lei/".$_POST['file_editar_projeto_lei']);
    }
      move_uploaded_file($image['tmp_name'], '../../documentos/arquivos_pdf/projetos_lei/' . $new_image_name);
    } else {
      $new_image_name = $_POST['file_editar_projeto_lei'];
    }
    $editar_requerimento = $db->prepare("UPDATE `projeto_de_lei` SET `title` = :title, `status_projeto` = :status_projeto, `number_projeto` = :number_projeto, `origem` = :origem, `andamento` = :andamento, `relator` = :relator, `ementa` = :ementa, `date` = :date, `file` = :file WHERE `idProjeto` = :idProjeto");
    $editar_requerimento->execute(array(
      ':idProjeto' => $_POST['id_editar_projeto_lei'],
      ':title' => $_POST['title'],
      ':number_projeto' => $_POST['number_projeto'],
      ':origem' => $_POST['origem'],
      ':andamento' => $_POST['andamento'],
      ':relator' => $_POST['relator'],
      ':status_projeto' => $_POST['status_projeto'],
      ':ementa' => $_POST['ementa'],
      ':date' => $_POST['date'],
      ':file' => $new_image_name
    ));
    $_SESSION['successMessage'] = 'Tramitação editada com sucesso !';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  }
}