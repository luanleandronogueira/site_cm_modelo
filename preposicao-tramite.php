<?php

require_once("config/db.php");

$listar_tramitacoes = $db->prepare("SELECT * FROM `tramitacao` INNER JOIN `projeto_de_lei` ON tramitacao.id_projeto = projeto_de_lei.idProjeto WHERE `idProjeto` = :idProjeto");
$listar_tramitacoes->execute(array(
  ':idProjeto' => $_GET['id']
));

$resultado_tramitacoes = $listar_tramitacoes->fetchAll(PDO::FETCH_ASSOC);

if (empty($_GET['id'])) {
  header("Location: projetos-resolucoes");
  die;
}

if ($listar_tramitacoes->rowCount() < 1) {
  header("Location: projetos-resolucoes");
  die;
}

require_once("header.php");

?>

<body id="vereadores" class="view">
  <section class="container" id="conteudo">
    <div class="row clearfix">
      <div class="col-xs-12">
        <a href="preposicao-tramite" title="" class="home" itemprop="url">
          <i class="fa fa-home"></i>
          <strong itemprop="title" class="hide"></strong></a></span>
        <span class="breadcrumb-item" itemprop="child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
          <a href="index" itemprop="url"><span itemprop="title">Home </span></a> &gt; <a href="projetos-resolucoes" itemprop="url"><span itemprop="title">Projetos de Lei </span></a> &gt; <span itemprop="title">Tramitação</span> </span>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <center>
          <h1 class='title-page'><b><?= $resultado_tramitacoes[0]['title'] ?></b></h1>
          <div style="text-align: left; margin-left: 70px; font-size: 15pt; color: black; margin-top: 10px;"><b>Ementa:</b> <?= $resultado_tramitacoes[0]['ementa'] ?></div>
          <div style="text-align: left; margin-left: 70px; font-size: 15pt; color: black; margin-top: 10px;"><b>Origem:</b> <?= $resultado_tramitacoes[0]['origem'] ?></div>
          <div style="text-align: left; margin-left: 70px; font-size: 15pt; color: black; margin-top: 10px;"><b>Autoria:</b> <?= $resultado_tramitacoes[0]['author'] ?></div>
          <div style="text-align: left; margin-left: 70px; font-size: 15pt; color: black; margin-top: 10px;"><b>Relator:</b> <?= $resultado_tramitacoes[0]['relator'] ?></div>
          <h1  style="text-align: left; margin-left: 70px; font-size: 15pt; margin-top: 15px;"><b><a href="documentos/arquivos_pdf/projetos_lei/<?= $resultado_tramitacoes[0]['file'] ?>" style="color: #428bca;" target="_blank">Baixar Projeto Inicial</a></b></h1>
        </center>
      </div>
      <div class="clearfix"></div>

      <div class="container clearfix conteudo-vereador">
        <div class="row">
          <div class="container">
            <div class="page-header">
              <ol class="widget-49-meeting-points">

              </ol>
            </div>
            <ul class="timeline">

              <?php foreach ($resultado_tramitacoes as $key => $value) { ?>
                
              <li>
                <div class='timeline-badge warning'><i class='fas fa-retweet'></i></div>
                <div class='timeline-panel'>
                  <div class='timeline-heading'>
                    <p><small class='text-muted'><i class='far fa-clock'></i> <?= date('d/m/Y', strtotime($value['date'])) ?></small></p>
                    <h4 class='timeline-title'><?= $value['title_tramit'] ?></h4>

                  </div>
                  <div class='timeline-body'>
                    <p><?= $value['content'] ?></p>
                    <a href="documentos/arquivos_pdf/tramitacao/<?= $value['file2'] ?>" target="_BLANK">Baixar arquivo anexo</a>
                  </div>
                </div>
              </li>
             
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
  </section>

  <?php require_once("footer.php") ?>
</body>

</html>