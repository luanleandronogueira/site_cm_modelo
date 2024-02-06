<?php

require_once("config/db.php");
require_once("header.php");

?>

<body id="vereadores" class="view">
  <section class="container" id="conteudo">
    <div class="row clearfix">
      <div class="col-xs-12">
        <a href="index" title="" class="home" itemprop="url">
          <i class="fa fa-home"></i>
          <strong itemprop="title" class="hide"></strong></a>
        <span class="breadcrumb-item" itemprop="child">
          <a href="index" itemprop="url"><span itemprop="title">Home </span></a>&gt; <span itemprop="title">Vereadores</span> </span>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <h1 class="title-page">Vereadores</h1>
      </div>
      <div class="clearfix"></div>
      <div class="jumbotron jumbotron-pontilhado jumbotron-busca clearfix">

        <div class="col-xs-12 col-sm-8 col-md-4">
          <label for="UserMandatoId" class="label">Filtrar por Legislatura <span data-html="true" data-toggle="tooltip" data-placement="top" data-title="Encontre vereadores de &lt;br/&gt; um mandato" class="tooltip-icon" data-original-title="" title="">(?)</span></label>
          <select name="mandato" class="input" id="UserMandatoId">
            <option value="2021-2024" selected="selected">2021 - 2024</option>
          </select>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-1">

        </div>

      </div>

      <div class="col-xs-12 vereadores-mandato">
        <h2 class="subtitle-page">Vereadores: <strong class="strong">2021 - 2024</strong></h2>
        <ul class="list list-vereadores">
          <?php

          $vereadores_cadatrados = $db->prepare("SELECT * FROM `vereador` WHERE `ativo` = 'S' ");
          $vereadores_cadatrados->execute();

          $resultado_vereadores = $vereadores_cadatrados->fetchAll(PDO::FETCH_ASSOC);

          foreach ($resultado_vereadores as $row_vereador => $value) {

          ?>
            <li class='list-item relative clearfix'><a href='detalha_vereador?id=<?= $value['id'] ?>' class='list-link clearfix'>
                <div class='pull-left vereador-img'><img src='<?= $value['foto'] ?>' height='90px' class='img-circle' alt='Foto vereador'></div>
                <div class='col-xs-8 col-sm-5'><strong class='vereador-nome'><b><?= $value['nome'] ?></b></strong>
                  <p class='vereador-desc'><?= $value['partido'] ?> </p>
                </div>
              </a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>

    <div class="container clearfix conteudo-vereador">
      <div class="row"></div>
    </div>
  </section>

  <?php require_once("footer.php") ?>
</body>

</html>