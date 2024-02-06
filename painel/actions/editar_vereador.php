<?php

require_once("../../config/db.php");
require_once('../../functions.php');

if (!isset($_POST['btn_editar_vereador']) || (empty($_POST['btn_editar_vereador']))) {
  $_SESSION['erroMessage'] = "<b>Oops</b>, Você não tem permissão para executar essa função !";
  redirect("painel/gerenciar_vereadores");
  die;
}

if (isset($_POST['btn_editar_vereador'])) {
  if (empty($_POST['name'])) {
    $_SESSION['erroMessage'] = "Campo <b>Nome</b> não pode ser vazio !";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  } elseif (empty($_POST['party'])) {
    $_SESSION['erroMessage'] = "Campo <b>Partido</b> não pode ser vazio !";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  } elseif (empty($_POST['legislature'])) {
    $_SESSION['erroMessage'] = "Campo <b>Legislação</b> não pode ser vazio !";
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
      if (is_file("../../documentos/imagens_vereadores/".$_POST['image_editar_vereador'])) {
        
        unlink("../../documentos/imagens_vereadores/".$_POST['image_editar_vereador']);
    }
      move_uploaded_file($image['tmp_name'], '../../documentos/imagens_vereadores/' . $new_image_name);
    } else {
      $new_image_name = $_POST['image_editar_vereador'];
    }
    $editar_vereador = $db->prepare("UPDATE `vereadores` SET `name` = :name, `party` = :party, `legislature` = :legislature, `historic` = :historic, `email` = :email, `facebook` = :facebook, `whatsapp` = :whatsapp, `instagram` = :instagram, `image` = :image, `status` = :status WHERE `idVereador` = :idVereador");
    $editar_vereador->execute(array(
      ':idVereador' => $_POST['id_editar_vereador'],
      ':name' => $_POST['name'],
      ':party' => $_POST['party'],
      ':legislature' => $_POST['legislature'],
      ':historic' => $_POST['historic'],
      ':email' => $_POST['email'],
      ':facebook' => $_POST['facebook'],
      ':whatsapp' => $_POST['whatsapp'],
      ':instagram' => $_POST['instagram'],
      ':image' => $new_image_name,
      ':status' => $_POST['status']
    ));
    $_SESSION['successMessage'] = 'Vereador(a) editado(a) com sucesso ! ';
    header("Location: {$_SERVER['HTTP_REFERER']}");
    die();
  }
}