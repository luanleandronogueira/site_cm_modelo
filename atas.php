<?php

require_once("config/db.php");
require_once("header.php");

$listar_atas_reunioes = $db->prepare("SELECT * FROM `atas_reunioes`");
$listar_atas_reunioes->execute();

?>

<body id="vereadores" class="view">
  <section class="container" id="conteudo">
    <div class="row clearfix">
      <div class="col-xs-12">
        <a href="legislacao" title="" class="home" itemprop="url">
          <i class="fa fa-home"></i>
          <strong itemprop="title" class="hide"></strong></a></span>
        <span class="breadcrumb-item" itemprop="child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
          <a href="index" itemprop="url"><span itemprop="title">Home </span></a>&gt; <span itemprop="title">Legislação</span> </span>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <h1 class="title-page">Atos do Legislativo</h1>
      </div>
      <div class="clearfix"></div>
      <div class="jumbotron jumbotron-pontilhado jumbotron-busca clearfix">
        <form action="" method="post" name="formulario" id="formulario">
          <div class="col-xs-12 col-sm-8 col-md-2">
            <label for="UserMandatoId" class="label">Nº do ato <span data-html="true" data-toggle="tooltip" data-placement="top" data-title="filtra por número do ato" class="tooltip-icon" data-original-title="" title="">(?)</span></label>
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
          <div class="col-xs-12 col-sm-8 col-md-4">
            <br>
            <input class="btn btn-primary" name="btnConsulta" id="btnConsulta" onclick="SelecionaAto()" type="submit" value=" Filtrar ">
          </div>
          <input name="mostrar" type="hidden" id="mostrar" value="0">
        </form>
      </div>
    </div>

    <div class="col-xs-12 vereadores-mandato">
      <div class="table-responsive">
        <table id="tableAtas" class="display col-xs-12 col-sm-12 dataTable no-footer" style="width:100%">
          <thead>
            <tr>
              <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 1073px;">Name</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($listar_atas_reunioes as $key => $value) { ?>
              <tr>
                <td>
                  <a href="documentos/arquivos_pdf/atas_ordinarias/<?= $value['file'] ?>" target="_blank" class="link-table clearfix">
                    <strong class="vereador-nome"> ATAS - <?= $value['title'] ?> </strong>
                    <p align="justify"> <?= date('d/m/Y', strtotime($value['date'])) ?> - <?= $value['content'] ?> </p>
                  </a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    </div>

    <div class="container clearfix conteudo-vereador">
      <div class="row"></div>
    </div>
  </section>


  <?php require_once("footer.php") ?>
  <script>
    $(document).ready(function() {
      $('#tableAtas').DataTable({
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json"
        }
      });
    });
  </script>
</body>

</html>