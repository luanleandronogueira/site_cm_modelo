<?php


require_once("config/db.php");
require_once("header.php");

$ano = date('Y');

$ano_ant = $ano - 1;

$bienio = $ano_ant ."-". $ano;


$mesa_diretora = $db->prepare("SELECT * FROM `mesa_diretora` INNER JOIN `vereador` ON mesa_diretora.id_vereador = vereador.id");

$mesa_diretora->execute();

$resultado_mesa_diretora = $mesa_diretora->fetchAll(PDO::FETCH_ASSOC);

?>

<body id="vereadores" class="view">
  <section class="container" id="conteudo">
    <div class="row clearfix">
      <div class="col-xs-12">
        <span class="breadcrumb-item" itemprop="child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
          <a href="mesa_diretora" title="" class="home" itemprop="url">
            <i class="fa fa-home"></i>
            <strong itemprop="title" class="hide"></strong></a></span>
        <span class="breadcrumb-item" itemprop="child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
          <a href="index" itemprop="url"><span itemprop="title">Home </span></a>&gt; <span itemprop="title">Mesa diretora</span>
        </span>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <h1 class="title-page">Mesa Diretora</h1>
      </div>
      <div class="clearfix"></div>
      <div class="jumbotron jumbotron-pontilhado jumbotron-busca clearfix">

        <div class="col-xs-12 col-sm-8 col-md-4">
          <label for="UserMandatoId" class="label">Filtrar por Legislatura <span data-html="true" data-toggle="tooltip" data-placement="top" data-title="Encontre vereadores de &lt;br/&gt; um mandato" class="tooltip-icon" data-original-title="" title="">(?)</span></label>
          <select name="mandato" class="input" id="UserMandatoId">
            <option value="" selected disabled>Todos </option>
          </select>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-1">

        </div>

      </div>

      <div class="col-xs-12 vereadores-mandato">
        <ul class="list list-vereadores">

          <?php
          foreach ($resultado_mesa_diretora as $key => $value) {
          ?>
            <li class='list-item relative clearfix'><a href='detalha_vereador?id=<?= $value['id']; ?>' class='list-link clearfix'>
                <div class='pull-left vereador-img'><img src='<?= $value['foto']; ?>' height='90px' class='img-circle' alt='Image vereador(a)'></div>
                <div class='col-xs-8 col-sm-5'><strong class='vereador-nome'><b><?= $value['nome']; ?></b></strong>
                  <p class='vereador-desc' style="font-weight: bold; color: black;"><?= $value['partido']; ?> - <?= $value['cargo']; ?>
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