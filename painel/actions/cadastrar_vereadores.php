<?php

require_once("../../config/db.php");
require_once('../../functions.php');

if (!isset($_POST['cadastrar_vereador'])) {
  $_SESSION['erroMessage'] = "<b>Oops</b>, Você não tem permissão para executar essa função !";
  redirect("painel/gerenciar_vereadores");
  die;
}

if (isset($_POST['cadastrar_vereador'])) {
  if (empty($_POST['name'])) {
    $_SESSION['erroMessage'] = "Campo <b>Nome</b> não pode ser vazio !";
    redirect("painel/cadastrar_vereadores");
    die;
  } elseif (empty($_POST['fantasy_name'])) {
    $_SESSION['erroMessage'] = "Campo <b>Nome fantasia</b> não pode ser vazio !";
    redirect("painel/cadastrar_vereadores");
    die;
  } elseif (empty($_POST['party'])) {
    $_SESSION['erroMessage'] = "Campo <b>Partido</b> não pode ser vazio !";
    redirect("painel/cadastrar_vereadores");
    die;
  } elseif (empty($_POST['legislature'])) {
    $_SESSION['erroMessage'] = "Campo <b>Legislatura</b> não pode ser vazio !";
    redirect("painel/cadastrar_vereadores");
    die;
  } elseif ($_FILES['image']['size'] == 0) {
    $_SESSION['erroMessage'] = "Campo <b>Imagem</b> não pode ser vazio !";
    redirect("painel/cadastrar_vereadores");
    die;
  } else {
    if ($_FILES['image']['size'] != 0) {
      $image = $_FILES['image'];
      $image_name = $image['name'];
      $extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
      $new_image_name = uniqid() . '.' . $extension;
    
      if ($extension != "jpg" && $extension != "png" && $extension != "jpeg") {
        $_SESSION['erroMessage'] = "Formato de arquivo inválido ! Formatos permitidos: <b>JPG, </b> <b>JPEG </b> e <b>PNG</b>";
        redirect("painel/cadastrar_vereadores");
        die;
      } else {
        $cadastrar_vereadores = $db->prepare("INSERT INTO `vereadores` (`name`, `fantasy_name`, `party`, `historic`, `legislature`, `email`, `facebook`, `whatsapp`, `instagram`, `status`, `image`) VALUES (:name, :fantasy_name, :party, :historic, :legislature, :email, :facebook, :whatsapp, :instagram, :status, :image)");
        $cadastrar_vereadores->execute(array(
          ':name' => $_POST['name'],
          ':fantasy_name' => $_POST['fantasy_name'],
          ':party' => $_POST['party'],
          ':historic' => $_POST['historic'],
          ':legislature' => $_POST['legislature'],
          ':email' => $_POST['email'],
          ':facebook' => $_POST['facebook'],
          ':whatsapp' => $_POST['whatsapp'],
          ':instagram' => $_POST['instagram'],
          ':status' => 1,
          ':image' => $new_image_name
        ));
    
        move_uploaded_file($image['tmp_name'], '../../documentos/imagens_vereadores/' . $new_image_name);
    
        $_SESSION['successMessage'] = 'Vereador(a) cadastrado(a) com sucesso ! ';
        header("Location: {$_SERVER['HTTP_REFERER']}");
        die();
      }
    }
    
  }

}