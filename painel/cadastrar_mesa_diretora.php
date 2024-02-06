<?php require_once("header.php") ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800 text-center">Cadastrar Mesa Diretora</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
      <div class="row align-items-center">
        <div class="col">
          <h6 class="m-0 font-weight-bold text-primary">Mesa Diretora</h6>
        </div>
      </div>
    </div>
    <div class="card-body">

      <form action="actions/cadastrar_mesa_diretora" method="POST">
          <?php require_once("../config/messages.php"); ?>
        <div class="mb-3">
          <label class="form-label">Nome do Vereador(a):</label>
          <select name="id_vereador" class="form-control">
            <option value="" disabled selected>Selecione um Vereador...</option>
            <?php renderVereadores($db); ?>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Responsabilidade:</label>
          <input type="text" name="responsibility" class="form-control" placeholder="Exemplo: Presidente">
        </div>
        <div class="mb-3">
          <label class="form-label">Bieno:</label>
          <input type="text" name="bieno" class="form-control" placeholder="Exemplo: 2022 - 2024">
        </div>
        <div class="mb-3">
          <label class="form-label">Data início:</label>
          <input type="date" name="start_date" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Data final:</label>
          <input type="date" name="end_date" class="form-control">
        </div>
        <div class="mb-3 mt-4">
          <input type="submit" name="cadastrar_mesa_diretora" value="Cadastrar" class="btn btn-primary">
        </div>
      </form>

    </div>
  </div>
</div>
</div>
<!-- /.container-fluid -->

<?php require_once("footer.php") ?>