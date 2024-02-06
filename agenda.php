<?php

require_once("config/db.php");
require_once("header.php");

$listar_agenda = $db->prepare("SELECT * FROM `eventos` ORDER BY `data` ASC");
$listar_agenda->execute();

$resultado_agenda = $listar_agenda->fetchAll(PDO::FETCH_ASSOC);


?>

<body id="vereadores" class="view">
  <section class="container" id="conteudo">
    <div class="row clearfix">
      <div class="col-xs-12">

        <i class="fa fa-home"></i>
        <strong itemprop="title" class="hide"></strong></a></span>
        <span class="breadcrumb-item" itemprop="child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
          <a href="index" itemprop="url"><span itemprop="title">Home </span></a>&gt; <span itemprop="title">Agenda</span></span>
        <div class="col-xs-12">
          <h1 class="title-page">Agenda Oficial da Câmara</h1>
        </div>
        <span class="breadcrumb-item" itemprop="child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"> </span>
      </div>
    </div>
    <div class="container clearfix conteudo-vereador">
      <div class="row"></div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-sm-5 col-md-4">
        <p>&nbsp;</p>
        <p style="text-align: center"><img src="imagens/calendario.jpg" height="200" alt="" /></p>
      </div>
      <div class="col-xs-12 col-sm-7 col-md-8">
        <ul class="list list-agenda">

          <?php foreach ($resultado_agenda as $key => $value) { ?>

          <li class='list-item'><span class='list-agenda-data'><span class='data-agenda'><?= date('d/m', strtotime($value['data'])); ?></span><span class='horario-agenda'><?= date('H:i', strtotime($value['hora'])); ?></span></span><strong class='nome-agenda'><?= $value['titulo'] ?></strong>
            <p class='descricao-agenda'><?= $value['descricao'] ?>, às <strong><?= date('H:i', strtotime($value['hora'])); ?></strong></p>
            <p class='descricao-agenda'></p>
            <p></p>
          </li>

          <?php } ?>
        </ul>
      </div>
    </div>
  </section>

  <?php require_once("footer.php") ?>
</body>

</html>