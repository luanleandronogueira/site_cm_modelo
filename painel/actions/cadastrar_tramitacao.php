<?php

require_once("../../config/db.php");
require_once('../../functions.php');

if (!isset($_POST['cadastrar_tramitacao'])) {
  $_SESSION['erroMessage'] = "<b>Oops</b>, Você não tem permissão para executar essa função !";
  redirect("painel/gerenciar_pautas");
  die;
}

if (isset($_POST['cadastrar_tramitacao'])) {
  if (empty($_POST['title_tramit'])) {
    $_SESSION['erroMessage'] = "Campo <b>Título</b> não pode ser vazio !";
    redirect("painel/cadastrar_tramitacao");
    die;
  } elseif (empty($_POST['date'])) {
    $_SESSION['erroMessage'] = "Campo <b>Data</b> não pode ser vazio !";
    redirect("painel/cadastrar_tramitacao");
    die;
  } elseif (empty($_POST['content'])) {
    $_SESSION['erroMessage'] = "Campo <b>Conteúdo</b> não pode ser vazio !";
    redirect("painel/cadastrar_tramitacao");
    die;
  } elseif (empty($_POST['status'])) {
    $_SESSION['erroMessage'] = "Campo <b>Status</b> não pode ser vazio !";
    redirect("painel/cadastrar_tramitacao");
    die;
  } elseif ($_FILES['image']['size'] == 0) {
    $_SESSION['erroMessage'] = "Campo <b>Imagem</b> não pode ser vazio !";
    redirect("painel/cadastrar_tramitacao");
    die;
  } else {
    if ($_FILES['image']['size'] != 0) {
      $image = $_FILES['image'];
      $image_name = $image['name'];
      $extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
      $new_image_name = uniqid() . '.' . $extension;

      if ($extension != "pdf") {
        $_SESSION['erroMessage'] = "Formato de arquivo inválido ! Formatos permitidos: <b>PDF</b>";
        redirect("painel/cadastrar_tramitacao");
        die;
      } else {
        $cadastrar_ata_reuniao = $db->prepare("INSERT INTO `tramitacao` (`title_tramit`, `date`, `status`, `content`, `file2`, `id_projeto`) VALUES (:title_tramit, :date, :status, :content, :file, :idProjeto)");
        $cadastrar_ata_reuniao->execute(array(
          ':idProjeto' => $_POST['id_projeto_lei'],
          ':title_tramit' => $_POST['title_tramit'],
          ':date' => $_POST['date'],
          ':status' => $_POST['status'],
          ':content' => $_POST['content'],
          ':file' => $new_image_name
        ));

        $update_projeto = $db->prepare("UPDATE `projeto_de_lei` SET `status_projeto` = :status_projeto, `andamento` = :andamento WHERE `idProjeto` = :idProjeto");
        $update_projeto->execute(array(
          ':idProjeto' => $_POST['id_projeto_lei'],
          ':status_projeto' => $_POST['title_tramit'],
          ':andamento' => $_POST['status']
        ));

        move_uploaded_file($image['tmp_name'], '../../documentos/arquivos_pdf/tramitacao/' . $new_image_name);
        $_SESSION['successMessage'] = 'Tramitação realizada com sucesso !';
        header("Location: {$_SERVER['HTTP_REFERER']}");
        die();
      }
    }
  }
}
