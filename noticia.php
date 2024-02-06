<?php

require_once("config/db.php");

$noticia_id = trim($_GET['id']);


$noticia_completa = $db->prepare("SELECT * FROM `noticias` WHERE `id_noticia` = :noticia_id");
$noticia_completa->execute(array(
  ':noticia_id' => $noticia_id
));

$resultado_noticia = $noticia_completa->fetch();

if (empty($noticia_id)) {
  header("Location: index");
  die;
}

if ($noticia_completa->rowCount() < 1) {
  header("Location: index");
  die;
}

require_once("header.php");
?>

<body id="vereadores" class="view">
  <section class="container" id="conteudo">
    <div class="row clearfix">
      <div class="col-xs-12">
        <a href="index" title="" class="home" itemprop="url">
          <i class="fa fa-home"></i>
          <strong itemprop="title" class="hide"></strong></a></span>
        <span class="breadcrumb-item" itemprop="child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
          <a href="index" itemprop="url"><span itemprop="title">Home </span></a>&gt; <span itemprop="title">Noticias</span> </span>
      </div>
    </div>
    <div id="news">
      <div class="media">
        <div class="media-body"><br><br>
          <h2 class="media-heading text-justify"> <?= $resultado_noticia['titulo_noticia']; ?> </h2>
        </div>
        <hr>
        </div>
        <div class="media-body">
          <br><br>
          <h4 align="justify"> <?= nl2br($resultado_noticia['conteudo_noticia']); ?> </h4>
          </p>
          <br> </p>
          <br>
          <div class="row">
            <div class='col-md-12'></div>
          </div>
        </div>
      </div>
      <ul class="pager">
        <li class="previous"><a href="index">&larr; Voltar</a></li>
      </ul>
    </div>

  </section>


  <?php require_once("footer.php") ?>
</body>

</html>