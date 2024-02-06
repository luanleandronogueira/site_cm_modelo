<?php

require_once("config/db.php");
require_once("header.php");

$listar_projetos_lei = $db->prepare("SELECT * FROM `atos_oficiais` WHERE tipo_ato = 3 AND tipo_ato = 14");
$listar_projetos_lei->execute();

$resultado_projetos_lei = $listar_projetos_lei->fetchAll(PDO::FETCH_ASSOC);

?>

<body id="vereadores" class="view">
  <section class="container" id="conteudo">
    <div class="row clearfix">
      <div class="col-xs-12">
        <a href="projetos-resolucoes.php%3Fp=projeto.html#/" title="" class="home" itemprop="url">
          <i class="fa fa-home"></i>
          <strong itemprop="title" class="hide"></strong></a></span>
        <span class="breadcrumb-item" itemprop="child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
          <a href="index.php.html" itemprop="url"><span itemprop="title">Home </span></a>&gt; <span itemprop="title">Legislação </span>
        </span>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <h1 class="title-page"><b>Projetos de Lei e Resoluções</b></h1>
      </div>
      <div class="clearfix"></div>
      <div class="jumbotron jumbotron-pontilhado jumbotron-busca clearfix">
        <form action="projetos-resolucoes" method="post" name="formulario" id="formulario">
          <div class="col-xs-12 col-sm-8 col-md-2">
            <label for="UserMandatoId" class="label">Nº do Ato <span data-html="true" data-toggle="tooltip" data-placement="top" data-title="filtra por número do ato" class="tooltip-icon" data-original-title="" title="">(?)</span></label>
            <input class="input" type="text" id="txtnumero" name="txtnumero" placeholder="N° do ato" />
          </div>
          <div class="col-xs-12 col-sm-8 col-md-2">
            <label for="UserMandatoId" class="label">Data Início</label>
            <input class="input" type="date" id="txtdatai" name="txtdatai" />
          </div>
          <div class="col-xs-12 col-sm-8 col-md-2">
            <label for="UserMandatoId" class="label">Data Fim</label>
            <input class="input" type="date" id="txtdataf" name="txtdataf" />
          </div>
          <div class="col-xs-12 col-sm-8 col-md-3">
            <label for="UserMandatoId" class="label">Busca Livre</label>
            <input class="input" type="text" id="txtcriterio" name="txtcriterio" placeholder="Texto Livre" />
          </div>
          <div class="col-xs-12 col-sm-8 col-md-2">
            <p><br>
              <input class="btn btn-primary" name="btnConsulta" id="btnConsulta" onclick="SelecionaAto()" type="submit" value=" Filtrar ">
          </div>
          <input name="mostrar" type="hidden" id="mostrar" value="0">
        </form>
      </div>
    </div>

    <div class="container clearfix conteudo-vereador">
      <div class="row">

        <div class='col-lg-12'>
          <?php foreach ($resultado_projetos_lei as $key => $value) { ?>
            <div class='card card-margin'>
            <div class='card-header no-border text-center' align='center'>
              <center>
                <h4 class='card-title'><a href='preposicao-tramite?id=<?= $value['idProjeto'] ?>' target="_blank"><?= $value['title'] ?></a></h4>
              </center>
            </div>
            <div class='card-body pt-0'>
              <div class='widget-49'>
                <div class='widget-49-title-wrapper'>
                  <div class='widget-49-date-danger'>
                    <span class='widget-49-date-day'><?= date('d', strtotime($value['date'])) ?></span>
                    <span class='widget-49-date-month'><?= date('m', strtotime($value['date'])) ?></span>
                  </div>
                  <div class='widget-49-meeting-info'>

                    <span class='widget-49-pro-title'>Número: <?= $value['number_projeto'] ?></span>
                    <span class='widget-49-meeting-time'><?= date('d/m/Y', strtotime($value['date'])) ?></span>
                  </div>
                </div>
                <ol class='widget-49-meeting-points'>
                  <span class='pt-5'><b>Origem:</b> <?= $value['origem'] ?><br></span>
                  <span class='pt-5 text-justify'><b>Ementa/Assunto:</b> <?= $value['ementa'] ?><br></span>
                  <span class='pt-5'><b>Status do Projeto:</b> <?= $value['status_projeto'] ?></span><br>
                  <span class='pt-5'><b>Andamento:</b> <?= $value['andamento'] ?></span>
                </ol>
                <div class='widget-49-meeting-action'>
                  <a href='preposicao-tramite?id=<?= $value['idProjeto'] ?>' class='btn btn-round bg-danger'>Ver Tramitação</a>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
        
      </div>
    </div>
  </section>

  <?php require_once("footer.php") ?>
</body>

</html>