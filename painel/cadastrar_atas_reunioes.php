<?php require_once("header.php") ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800 text-center">Seção de Atas Reuniões</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
      <div class="row align-items-center">
        <div class="col">
          <h6 class="m-0 font-weight-bold text-primary">Nova Ata Reunião</h6>
        </div>
      </div>
    </div>
    <div class="card-body">

      <form action="actions/cadastrar_atas_reunioes" method="POST" enctype="multipart/form-data">
          <?php require_once("../config/messages.php"); ?>
        
        <div class="mb-3">
          <label class="form-label">Título:</label>
          <input type="text" name="title" class="form-control" placeholder="Exemplo: O PROJETO FOI SANCIONADO PELO...">
        </div>
        <div class="mb-3">
          <label class="form-label">Data do requerimento:</label>
          <input type="date" name="date" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Conteúdo:</label>
          <textarea class="form-control" name="content" rows="3" placeholder="Exemplo: CRIA, EXTINGUE CARGOS E FIXA..."></textarea>
        </div>
        <div class="mb-3">
          <label for="formFileSm" class="form-label">Arquivo do requerimento <b>(PDF)</b>:</label>
          <input type="file" name="image" class="form-control form-control-sm" id="formFileSm">
        </div>
        <div class="mb-3 mt-4">
          <input type="submit" name="cadastrar_ata_reuniao" value="Cadastrar Ata Reunião" class="btn btn-primary">
        </div>
      </form>

    </div>
  </div>
</div>
</div>
<!-- /.container-fluid -->

<?php require_once("footer.php") ?>