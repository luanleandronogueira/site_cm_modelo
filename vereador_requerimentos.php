<?php


require_once("config/db.php");

$idVereador = trim($_GET['id']);

if (empty($idVereador)) {
  header("Location: index");
  die;
}

$listar_todos_requerimentos = $db->prepare("SELECT * FROM `atos_oficiais` WHERE tipo_ato = 2 AND `autor` = :idVereador");
$listar_todos_requerimentos->bindValue(":idVereador", $idVereador);
$listar_todos_requerimentos->execute();

require_once("header.php");
?>

<body id="vereadores" class="view">
  <section class="container" id="conteudo">
    <div class="row clearfix">
      <div class="col-xs-12">

        <a href="vereador_requerimento.php%3Fconteudo=44.html#/" title="" class="home" itemprop="url">
          <i class="fa fa-home"></i>
          <strong itemprop="title" class="hide"></strong></a></span>
        <span class="breadcrumb-item" itemprop="child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
          <a href="index" itemprop="url"><span itemprop="title">Home </span></a>&gt; <a href="vereadores" itemprop="url"><span itemprop="title">Vereador </span></a>&gt; <span itemprop="title">Requerimento</span> </span>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <h1 class="title-page">Requerimentos</h1>
      </div>
      <div class="clearfix"></div>
      <div class="jumbotron jumbotron-pontilhado jumbotron-busca clearfix">

        <div class="col-xs-12 col-sm-8 col-md-4">
          <label for="UserMandatoId" class="label">Filtrar por tipo <span data-html="true" data-toggle="tooltip" data-placement="top" class="tooltip-icon" data-original-title="" title=""></span></label>
          <select name="mandato" class="input" id="UserMandatoId">
            <option value="">Todos</option>
          </select>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-1">

        </div>

      </div>

      <div class="col-xs-12 vereadores-mandato">
        <ul class="list list-vereadores">
          <?php
            foreach ($listar_todos_requerimentos as $key => $value) {
          ?>
        <li class="list-item relative clearfix">
          <a href="<?= $value['arquivo'] ?>" class="list-link clearfix">
            <div class="col-xs-8 col-sm-12">
              <strong class="vereador-nome">REQUERIMENTO - <?= $value['titulo'] ?> </strong>
              <p><?= $value['data_cadastro'] ?> - <?= $value['descricao'] ?></p>
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