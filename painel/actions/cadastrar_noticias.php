<?php

require_once("../../config/db.php");
require_once('../../functions.php');

if (!isset($_POST['publicar_noticia'])) {
  $_SESSION['erroMessage'] = "<b>Oops</b>, Você não tem permissão para executar essa função !";
  redirect("painel/gerenciar_noticias");
  die;
}

if (isset($_POST['publicar_noticia'])) {
  if (empty($_POST['title'])) {
    $_SESSION['erroMessage'] = "Campo <b>Título</b> não pode ser vazio !";
    redirect("painel/cadastrar_noticias");
    die;
  } elseif (empty($_POST['date'])) {
    $_SESSION['erroMessage'] = "Campo <b>Data</b> não pode ser vazio !";
    redirect("painel/cadastrar_noticias");
    die;
  } elseif (empty($_POST['content'])) {
    $_SESSION['erroMessage'] = "Campo <b>Conteúdo</b> não pode ser vazio !";
    redirect("painel/cadastrar_noticias");
    die;
  } elseif ($_FILES['image']['size'] == 0) {
    $_SESSION['erroMessage'] = "Campo <b>Imagem</b> não pode ser vazio !";
    redirect("painel/cadastrar_noticias");
    die;
  } else {
    if ($_FILES['image']['size'] != 0) {
      $image = $_FILES['image'];
      $image_name = $image['name'];
      $extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
      $new_image_name = uniqid() . '.' . $extension;
    
      if ($extension != "jpg" && $extension != "png" && $extension != "jpeg") {
        $_SESSION['erroMessage'] = "Formato de arquivo inválido ! Formatos permitidos: <b>JPG, </b> <b>JPEG </b> e <b>PNG</b>";
        redirect("painel/cadastrar_noticias");
        die;
      } else {
        $cadastrar_noticias = $db->prepare("INSERT INTO news (`title`, `content`, `date`, `author`, `image`) VALUES (:title, :content, :date, :author, :image)");
        $cadastrar_noticias->execute(array(
          ':title' => str_replace('"', "'", $_POST['title']),
          ':content' => str_replace('"', "'", $_POST['content']),
          ':date' => $_POST['date'],
          ':author' => $_SESSION[$userIdentifier],
          ':image' => $new_image_name
        ));
    
        move_uploaded_file($image['tmp_name'], '../../documentos/imagens_noticias/' . $new_image_name);
    
        $_SESSION['successMessage'] = 'Notícia cadastrada com sucesso ! ';
        header("Location: {$_SERVER['HTTP_REFERER']}");
        die();
      }
    }
    
  }

}