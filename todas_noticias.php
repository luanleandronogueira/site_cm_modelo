<?php

require_once("config/db.php");
require_once("header.php");

$listar_todas_noticias = $db->prepare("SELECT * FROM `noticias`");
$listar_todas_noticias->execute();

?>

<body id="vereadores" class="view">
  <section class="container" id="conteudo">
    <div class="row clearfix">
      <div class="col-xs-12">
        <a href="index" title="" class="home" itemprop="url">
          <i class="fa fa-home"></i>
          <strong itemprop="title" class="hide"></strong>
        </a>
        <span class="breadcrumb-item" itemprop="child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
          <a href="index" itemprop="url">
            <span itemprop="title">Home </span>
          </a>&gt; <span itemprop="title">Noticias</span>
        </span>
      </div>
    </div>

    <div id="news">
      <div class="row">
        <div class="col-xs-12">
          <h1 class="title-page">Notícias do Legislativo</h1>
        </div>
        <div class="clearfix"></div>
        <div class="jumbotron jumbotron-pontilhado jumbotron-busca clearfix">
          <div class="col-xs-12 col-sm-8 col-md-4">
            <label for="UserMandatoId" class="label">Filtrar por tipo <span data-html="true" data-toggle="tooltip" data-placement="top" data-title="escolha um ato legislativo" class="tooltip-icon" data-original-title="" title="">(?)</span></label>
            <select name="mandato" class="input" id="UserMandatoId">
              <option value="">Todos</option>
            </select>
          </div>
        </div>

        <div class="col-xs-12 vereadores-mandato">
        <div class="table-responsive">
        <table id="tableRequerimentos" class="display col-xs-12 col-sm-12 dataTable no-footer" style="width:100%">
          <thead>
            <tr>
              <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 100px;">Imagem</th>
              <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 1073px;">Título</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($listar_todas_noticias as $key => $value) { ?>
              <tr>
                <td><a href="noticia?id=<?= $value['id_noticia'] ?>">
                  <img src="<?= $value['foto_noticia'] ?> " class="img-responsive" width="140px">
                    </a>
                </td>
                <td><a href="noticia?id=<?= $value['id_noticia'] ?>">- <?= $value['titulo_noticia'] ?></a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
        </div>
      </div>
      <ul class="pager">
        <li class="previous"><a href="index">&larr; Voltar</a></li>
      </ul>
    </div>
  </section>

  <?php require_once("footer.php") ?>
  <script>
    $(document).ready(function() {
      $('#tableRequerimentos').DataTable({
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json"
        }
      });
    });
  </script>
</body>

</html>