<?php

require_once("../../config/db.php");
require_once('../../functions.php');

if (!isset($_POST['cadastrar_requerimento'])) {
  $_SESSION['erroMessage'] = "<b>Oops</b>, Você não tem permissão para executar essa função !";
  redirect("painel/gerenciar_requerimentos");
  die;
}

if (isset($_POST['cadastrar_requerimento'])) {
  if (empty($_POST['number_ato'])) {
    $_SESSION['erroMessage'] = "Campo <b>N° Ato</b> não pode ser vazio !";
    redirect("painel/cadastrar_requerimentos");
    die;
  } elseif (empty($_POST['title'])) {
    $_SESSION['erroMessage'] = "Campo <b>Título</b> não pode ser vazio !";
    redirect("painel/cadastrar_requerimentos");
    die;
  } elseif (empty($_POST['date'])) {
    $_SESSION['erroMessage'] = "Campo <b>Data</b> não pode ser vazio !";
    redirect("painel/cadastrar_requerimentos");
    die;
  } elseif (empty($_POST['content'])) {
    $_SESSION['erroMessage'] = "Campo <b>Conteúdo</b> não pode ser vazio !";
    redirect("painel/cadastrar_requerimentos");
    die;
  } elseif ($_FILES['image']['size'] == 0) {
    $_SESSION['erroMessage'] = "Campo <b>Imagem</b> não pode ser vazio !";
    redirect("painel/cadastrar_requerimentos");
    die;
  } else {
    if ($_FILES['image']['size'] != 0) {
      $image = $_FILES['image'];
      $image_name = $image['name'];
      $extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
      $new_image_name = uniqid() . '.' . $extension;

      if ($extension != "pdf") {
        $_SESSION['erroMessage'] = "Formato de arquivo inválido ! Formatos permitidos: <b>PDF</b>";
        redirect("painel/cadastrar_requerimentos");
        die;
      } else {
        $cadastrar_requerimento = $db->prepare("INSERT INTO `requerimentos` (`number_ato`, `title`, `date`, `content`, `file`, `id_vereador`, `author`, `register_date`) VALUES (:number_ato, :title, :date, :content, :file, :id_vereador, :author, :register_date)");
        $cadastrar_requerimento->execute(array(
          ':number_ato' => $_POST['number_ato'],
          ':title' => $_POST['title'],
          ':content' => $_POST['content'],
          ':date' => $_POST['date'],
          ':id_vereador' => $_POST['id_vereador'],
          ':author' => $_SESSION[$userIdentifier],
          ':register_date' => date('Y-m-d'),
          ':file' => $new_image_name
        ));

        move_uploaded_file($image['tmp_name'], '../../documentos/arquivos_pdf/requerimentos/' . $new_image_name);

        $_SESSION['successMessage'] = 'Requerimento cadastrado com sucesso ! ';
        header("Location: {$_SERVER['HTTP_REFERER']}");
        die();
      }
    }
  }
}
