<?php

require_once("header.php");

// PUXAR O TOTAL DE NOTICIAS CADASTRADAS NO SITE.
$total_noticias = $db->prepare("SELECT * FROM `news`");
$total_noticias->execute();

$resultado_todas_noticias = $total_noticias->fetchALL(PDO::FETCH_ASSOC);

// PUXAR O TOTAL DE REQUERIMENTOS CADASTRADOS NO SITE.
$total_requerimentos = $db->prepare("SELECT * FROM `requerimentos`");
$total_requerimentos->execute();

$resultado_todos_requerimentos = $total_requerimentos->fetchALL(PDO::FETCH_ASSOC);

// PUXAR O TOTAL DE ATAS ORDINÁRIAS CADASTRADAS NO SITE.
$total_atas_reunioes = $db->prepare("SELECT * FROM `atas_reunioes`");
$total_atas_reunioes->execute();

$resultado_todas_atas = $total_atas_reunioes->fetchALL(PDO::FETCH_ASSOC);

// PUXAR O TOTAL DE PROJETOS DE LEI CADASTRADOS NO SITE.
$total_projetos_lei = $db->prepare("SELECT * FROM `projeto_de_lei`");
$total_projetos_lei->execute();

$resultado_projeto_lei = $total_projetos_lei->fetchALL(PDO::FETCH_ASSOC);

// PUXAR O TOTAL DE PAUTAS CADASTRADAS NO SITE.
$total_pautas = $db->prepare("SELECT * FROM `pautas`");
$total_pautas->execute();

$resultado_pautas = $total_pautas->fetchALL(PDO::FETCH_ASSOC);

?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800 text-center">Painel Administrativo</h1>

  <?php require_once("../config/messages.php") ?>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Atalhos</h6>
    </div>
    <div class="card-body">
      <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-12 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <a href="cadastrar_noticias">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      Cadastrar Notícias
                    </div>
                    <div class="h6 mb-0 font-weight-bold text-gray-800">Total de Notícias Públicadas: <b><?php echo count($resultado_todas_noticias);?></b></div>
                  </div>
                  <div class="col-auto">
                    <i class="far fa-newspaper fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-12 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <a href="cadastrar_requerimentos">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      Cadastrar Requerimentos
                    </div>
                    <div class="h6 mb-0 font-weight-bold text-gray-800">Total de Requerimentos Públicados: <b><?php echo count($resultado_todos_requerimentos);?></b></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-12 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <a href="cadastrar_pautas">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      Cadastrar Pautas
                    </div>
                    <div class="h6 mb-0 font-weight-bold text-gray-800">Total de Pautas Públicadas: <b><?php echo count($resultado_pautas);?></b></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>

      </div>

      <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-12 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <a href="cadastrar_projeto_lei">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      Cadastrar Projetos de Lei
                    </div>
                    <div class="h6 mb-0 font-weight-bold text-gray-800">Total de Projetos de Lei Públicados: <b><?php echo count($resultado_projeto_lei);?></b></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-12 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <a href="cadastrar_atas_reunioes">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      Cadastrar Atas Reuniões Ordinárias
                    </div>
                    <div class="h6 mb-0 font-weight-bold text-gray-800">Total de Atas Reuniões Ordinárias Públicadas: <b><?php echo count($resultado_todas_atas);?></b></b></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-12 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <a href="cadastrar_atas_reunioes">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      Cadastrar Atas Reuniões Extra Ordinárias
                    </div>
                    <div class="h6 mb-0 font-weight-bold text-gray-800">Total de Atas Reuniões Extra Ordinárias Públicadas: <b><?php echo count($resultado_todas_atas);?></b></b></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
</div>
<!-- /.container-fluid -->

<?php require_once("footer.php") ?>