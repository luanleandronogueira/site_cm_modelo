<?php require_once("header.php") ?>

<body id="vereadores" class="view">

  <section class="container" id="conteudo">

    <div class="row clearfix">
      <div class="col-xs-12">

        <a href="tvcamara.php.html#/" title="" class="home" itemprop="url">
          <i class="fa fa-home"></i>
          <strong itemprop="title" class="hide"></strong></a></span>
        <span class="breadcrumb-item" itemprop="child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
          <a href="index.php.html" itemprop="url"><span itemprop="title">Home </span></a>&gt; <span itemprop="title">TV Câmara</span> </span>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <h1 class="title-page">Acervo de Transmissão (Lives Gravadas das Reuniões)</h1>
      </div>
      <div class="clearfix"></div>
      <div class="jumbotron jumbotron-pontilhado jumbotron-busca clearfix">

        <div class="col-xs-12 col-sm-8 col-md-4">
          <label for="UserMandatoId" class="label">Filtrar por tipo <span data-html="true" data-toggle="tooltip" data-placement="top" data-title="escolha um ato legislativo" class="tooltip-icon" data-original-title="" title="">(?)</span></label>
          <select name="mandato" class="input" id="UserMandatoId">
            <option value="">Todos</option>
          </select>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-1">

          <div class="clearfix"></div>
        </div>

      </div>

      <div class="col-xs-12 vereadores-mandato">
        <ul class="list list-vereadores">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Data</th>
                <th scope="col">Título</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope='row'></th>
                <td></td>
              </tr>
            </tbody>
          </table>
        </ul>
      </div>
    </div>

    <div class="container clearfix conteudo-vereador">
      <div class="row"></div>
    </div>
  </section>


  <?php require_once("footer.php") ?>

  <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <div>
            <iframe class="col-md-12" width="100%" height="400px" frameborder="0" scrolling="no" src="tvcamara"></iframe>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <div>
            <iframe class="col-md-12" width="100%" height="350px" frameborder="0" scrolling="no" src="tvcamara"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    //FUNCTION TO GET AND AUTO PLAY YOUTUBE VIDEO FROM DATATAG
    autoPlayYouTubeModal();

    //FUNCTION TO GET AND AUTO PLAY YOUTUBE VIDEO FROM DATATAG
    function autoPlayYouTubeModal() {
      var trigger = $("body").find('[data-toggle="modal"]');
      trigger.click(function() {
        var theModal = $(this).data("target"),
          videoSRC = $(this).attr("data-theVideo"),
          videoSRCauto = videoSRC;
        $(theModal + ' iframe').attr('src', videoSRCauto);
        $(theModal + ' button.close').click(function() {
          $(theModal + ' iframe').attr('src', videoSRC);
        });
      });
    }
  </script>
</body>

</html>