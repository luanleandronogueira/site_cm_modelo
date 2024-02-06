<?php require_once("header.php") ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800 text-center">Seção de Requerimentos</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
      <div class="row align-items-center">
        <div class="col">
          <h6 class="m-0 font-weight-bold text-primary">Novo Requerimento</h6>
        </div>
      </div>
    </div>
    <div class="card-body">

      <form action="actions/cadastrar_requerimento" method="POST" enctype="multipart/form-data">
          <?php require_once("../config/messages.php"); ?>
          <div class="mb-3">
            <label class="form-label">Nome do Vereador:</label>
            <select name="id_vereador" class="form-control">
              <option value="" selected disabled>Selecione o Vereador...</option>
              <?php renderVereadores($db); ?>
            </select>
          </div>
        <div class="mb-3">
          <label class="form-label">N° do Ato:</label>
          <input type="text" name="number_ato" class="form-control" placeholder="Exemplo: 003/2022">
        </div>
        <div class="mb-3">
          <label class="form-label">Título:</label>
          <input type="text" name="title" class="form-control" placeholder="Exemplo: Requerimento - N° 003/2022...">
        </div>
        <div class="mb-3">
          <label class="form-label">Data do requerimento:</label>
          <input type="date" name="date" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Conteúdo:</label>
          <textarea class="form-control" name="content" rows="3" placeholder="Exemplo: REQUER A CHEFE DO PODER EXECUTIVO MUNICIPAL JUNTO COM A SECRETARIA COMPETENTE..."></textarea>
        </div>
        <div class="mb-3">
          <label for="formFileSm" class="form-label">Arquivo do requerimento <b>(PDF)</b>:</label>
          <input type="file" name="image" class="form-control form-control-sm" id="formFileSm">
        </div>
        <div class="mb-3 mt-4">
          <input type="submit" name="cadastrar_requerimento" value="Cadastrar Requerimento" class="btn btn-primary">
        </div>
      </form>

    </div>
  </div>
</div>
</div>
<!-- /.container-fluid -->

<?php require_once("footer.php") ?>