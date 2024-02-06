<?php

require_once("config/db.php");

$idVereador = trim($_GET['id']);

if (empty($idVereador)) {
  header("Location: index");
  die;
}

$detalhes_vereadores = $db->prepare("SELECT * FROM `vereador` WHERE `id` = :idVereador LIMIT 1");
$detalhes_vereadores->bindValue(":idVereador", $idVereador);
$detalhes_vereadores->execute();

if ($detalhes_vereadores->rowCount() < 1) {
  header("Location: index");
  die;
}

$requerimentos_vereador = $db->prepare("SELECT * FROM `atos_oficiais` WHERE `autor` = :idVereador");
$requerimentos_vereador->execute(array(
  ':idVereador' => $idVereador
));

require_once("header.php");
?>

<body id="vereadores" class="view">
  <section class="container" id="conteudo">
    <div class="row clearfix">
      <div class="col-xs-12">
        <i class="fa fa-home"></i>
        <strong itemprop="title" class="hide"></strong></a></span>
        <span class="breadcrumb-item" itemprop="child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
          <a href="index" itemprop="url"><span itemprop="title">Home </span></a>&gt; <a href="vereadores" itemprop="url"><span itemprop="title">Vereadores</span></a></span>
        &gt; Detalha
      </div>
    </div>
    <div class="vereador-header clearfix">
      <div class="wrapper-content">
        <div class="row">
          <?php

          foreach ($detalhes_vereadores as $key => $value) {

          ?>
            <div align="right">

              <a href="<?= $value['facebook'] !== '#' ? $value['facebook'] : 'javascript:void(0);' ?>" <?= $value['facebook'] !== '#' ? 'target="_blank"' : '' ?>><i class="fab fa-facebook fa-2x"></i></a>&nbsp;&nbsp;&nbsp;
              <a href="<?= $value['instagram'] !== '#' ? $value['instagram'] : 'javascript:void(0);' ?>" <?= $value['instagram'] !== '#' ? 'target="_blank"' : '' ?>><i class="fab fa-instagram fa-2x"></i></a>&nbsp;&nbsp;&nbsp;
              <a href="<?= $value['whatsapp'] !== '#' ? $value['whatsapp'] : 'javascript:void(0);' ?>" <?= $value['whatsapp'] !== '#' ? 'target="_blank"' : '' ?>><i class="fab fa-whatsapp fa-2x"></i></a>&nbsp;&nbsp;&nbsp;

            </div>
            
            <div class='col-xs-12 col-sm-3 col-md-2'>
              <figure><a href='<?= $value['foto'] ?>' class='fancybox'><img src='<?= $value['foto'] ?>' class='img-circle img-responsive'></a></figure>
            </div>
            <div class='col-xs-12 col-sm-9 col-md-10'>
              <h1 class='vereador-nome'> <?= $value['nome'] ?> </h1>
              <p class='vereador-info'><span class='councilor-bar-mandates fleft'><strong>Mandato: </strong><?= $value['legislatura'] ?><br><strong>Partido: </strong> <i><?= $value['partido'] ?></i></span></p>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="menu-vereador">
      <div class="row">
        <div class="col-xs-6 col-sm-3 col-lg-2">
          <a href="detalha_vereador?id=<?= $value['id'] ?>" class="btn btn-cinza btn-full ativo">Apresentação</a>
        </div>
        <div class="col-xs-6 col-sm-3  col-lg-2">
          <a href="vereador_requerimentos?id=<?= $value['id'] ?>" class="btn btn-cinza btn-full fancybox">Requerimentos</a>
        </div>

      </div>
      <div class="row"></div>
    </div>
    <div class="clearfix conteudo-vereador">
      <div class="row">
        <div class="col-xs-12 col-sm-5">
          <h2 class="subtitle-page">Sobre o <strong class="strong">Vereador</strong></h2>

          <ol class="informacoes-vereador">
            <li class="informacoes-vereador-item"><span class="informacoes-vereador-valor" style="text-align: justify">
                <p align='justify'> <?= nl2br($value['historico']) ?> </p>
                <p><br><strong>E-mail: </strong> <?= $value['email'] ?> </p>
              </span> </li>
            <li class="informacoes-vereador-item"></li>
          </ol>
        </div>

        <div class="col-xs-12 col-sm-7">
          <h2 class="subtitle-page">Últimos <strong class="strong">Documentos</strong></h2>
          <?php

          foreach ($requerimentos_vereador as $key => $value) {

          ?>
            <ul class="list list-ultimos-doc">
              <li class="list-item"><a href="<?= $value['arquivo'] ?>" target="_blank" class="list-link"><span class="list-title">REQUERIMENTO - <?= (date('d/m/Y', strtotime($value['data_cadastro']))) ?> - N° <?= $value['numero'] ?></span></a></li>
            </ul>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>

  <?php require_once("footer.php") ?>
</body>

</html>