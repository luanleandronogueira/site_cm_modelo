<?php

require_once("config/db.php");
require_once("header.php");

?>

<body id="vereadores" class="view">
  <div id="links-fixos" class="hidden-md-down">
    <a href="https://www.instagram.com/camaratabira/" target="_blank">
      <img src="imagens/instagram-logo.png" style="margin-left: 12px" width="40px"></a><br><br>
    <a href="https://www.facebook.com/camaratabira" target="_blank">
      <img src="imagens/facebook-logo.png" style="margin-left: 12px" width="40px">
    </a>
  </div>
  <section class="container">
    
    <section id="content" role="main">
      <div class="row">
        <div class="col-xs-12 hidden-xs hidden-sm">
          <h2 class="strong title-destaque-noticias">
            Notícias em Destaque
          </h2>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3 block-menu-auxiliar pull-right">
          <a href="#" class="btn btn-menu-auxiliar show" data-toggle="modal" data-target="#modalAoVivo">
            <span class="hidden-md pull-right icon-menu"></span>Reunião ao Vivo (Offline)</strong>
          </a>

          <a href="mapa" class="btn btn-menu-auxiliar show">
            <span class="hidden-md pull-right icon-menu"></span>
            <span>Mapa do Site</span>
          </a>

          <a href="https://it-solucoes.com/transparenciaMunicipal/frmAcessoInformacao.aspx?ID=59&e=C" target="_blank" class="btn btn-menu-auxiliar show"> <span class="hidden-md pull-right icon-menu"></span>
            <span>e-SIC</span> </a>

          <a href="https://it-solucoes.com/transparenciaMunicipal/perguntasRespostas.aspx?ID=59&e=C" target="_blank" class="btn btn-menu-auxiliar show">
            <span>Perguntas frequentes</span>
          </a>

          <a href="glossario" class="btn btn-menu-auxiliar show">
            <span>Glossário</span>
          </a>
        </div>
        <div class="col-xs-12 visible-xs visible-sm">
          <h2 class="strong title-destaque-noticias">
            Notícias
          </h2>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-9">
          <div id="carousel-destaques" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carousel-destaques" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-destaques" data-slide-to="1" class=""></li>
              <li data-target="#carousel-destaques" data-slide-to="2" class=""></li>
            </ol>


            <div class='carousel-inner'>
              <?php
              $active_control = 2;
              $listar_noticias_slider = $db->query("SELECT * FROM `noticias` ORDER BY id_noticia DESC LIMIT 3");
              $listar_noticias_slider->execute();

              foreach ($listar_noticias_slider as $key => $value) {

                if ($active_control == 2) {

              ?>
                  <div class='item active'>
                    <a class='show' href='noticia?id=<?= $value['id_noticia'] ?>'>
                      <img src='<?= $value['foto_noticia'] ?>' alt='Imagem da noticia' class='img-responsive'>
                      <div class='carousel-caption text-left'>
                        <span class='noticia-titulo'> <?= $value['titulo_noticia'] ?> </span>
                      </div>
                    </a>
                  </div>

                <?php $active_control = 1;
                } else {

                ?>
                  <div class='item'>
                    <a class='show' href='noticia?id=<?= $value['id_noticia'] ?>'>
                      <img src='<?= $value['foto_noticia']; ?>' alt='Imagem da noticia' class='img-responsive'>
                      <div class='carousel-caption text-left'>
                        <span class='noticia-titulo'> <?= $value['titulo_noticia'] ?> </span>
                      </div>
                    </a>
                  </div>
                <?php } ?>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12">
          <span class="title-outras-noticias show">
            Últimas <strong class="strong">Notícias</strong>
          </span>
          <div class="row ">
            <?php
            $listar_outras_noticias = $db->prepare("SELECT * FROM `noticias` ORDER BY id_noticia DESC LIMIT 4");
            $listar_outras_noticias->execute();

            foreach ($listar_outras_noticias as $key => $value) {
            ?>
              <div class='col-xs-12 col-sm-3'>
                <a href='noticia?id=<?= $value['id_noticia'] ?>' class='link-outras-noticias'>
                  <img src='<?= $value['foto_noticia'] ?>' class='img-responsive'>
                  <span class='title-outras-noticias-item show'><?= mb_substr($value['titulo_noticia'], 0, 62) ?></span></a>
              </div>
            <?php } ?>
            <br><br> <a href="todas_noticias" class="pull-right link-com-linha">Ver mais notícias</a>
          </div>
        </div>
      </div>

      <div class="jumbotron jumbotron-pontilhado com-sombra vereadores-exercicio">
        <div class="container">
          <div class="row">
            <div class="title-vereadores text-center">
              <a href="vereadores" class="strong white">
                Vereadores da Legislatura Atual &nbsp;&nbsp;&nbsp;&nbsp;
                <small>2021 - 2024</small>
              </a>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg-12 text-center ">

              <?php

              $vereadores_cadatrados = $db->prepare("SELECT * FROM `vereador` WHERE `ativo` = 'S' ");
              $vereadores_cadatrados->execute();

              $resultado_vereadores = $vereadores_cadatrados->fetchAll(PDO::FETCH_ASSOC);

              foreach ($resultado_vereadores as $row_vereador => $value) {

              ?>

                <a href='detalha_vereador?id=<?= $value['id'] ?>' title="<?= $value['nome'] ?>" class='link-vereadores' data-toggle='tooltip' data-placement='top'>
                  <figure class='figure'><img src='<?= $value['foto'] ?>' width='130px' class='councilors-item-pic' alt='<?= $value['nome'] ?>'>
                    <figcaption class='partido text-center'></figcaption>
                  </figure>
                </a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="block block-agenda">
            <div class="block-header">
              Últimas <strong class="strong">Sessões</strong></div>
            <div class="block-body">
              <ul>
                <?php
                $listar_atas_ordinarias = $db->prepare("SELECT * FROM `transmissao_historico` ORDER BY `id` DESC LIMIT 3");
                $listar_atas_ordinarias->execute();

                foreach ($listar_atas_ordinarias as $key => $value) {
                ?>
                  <li class='agenda-item'>
                    <!-- <span class='agenda-data pull-left'> <?= date('d/m/Y', strtotime($value['date'])) ?> </span> -->
                    <span class='agenda-titulo'> <?= $value['titulo'] ?></span>
                  </li>
                <?php } ?>
              </ul>
              <a href="atas" class="agenda-completa strong relative text-right">
                ver todas os documentos
              </a>
            </div>
          </div>
        </div>

        <div class="col-sm-6 text-center">

          <span style="vertical-align: bottom; width: 600px; height: 400px;"><iframe name="mapa" width="100%" height="100%" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" marginheight="0" marginwidth="0" src="mapa.html" style="border-radius: 10px; border: none; visibility: visible; width: 554px; height: 375px;"></iframe></span>

        </div>

      </div>
    </section>
  </section>

  <div class="modal fade" data-backdrop="static" id="modalAoVivo">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body text-center">
          <b> Nenhuma reunião ao vivo no momento. </b>
        </div>

        <div class="modal-footer">
          <button class="btn btn-success" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <?php require_once("footer.php") ?>

</body>

</html>