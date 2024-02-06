<?php require_once("header.php") ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800 text-center">Seção de Projetos de Lei</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
      <div class="row align-items-center">
        <div class="col">
          <h6 class="m-0 font-weight-bold text-primary">Novo Projeto</h6>
        </div>
      </div>
    </div>
    <div class="card-body">

      <form action="actions/cadastrar_projeto_lei" method="POST" enctype="multipart/form-data">
          <?php require_once("../config/messages.php"); ?>
        
        <div class="mb-3">
          <label class="form-label">Título:</label>
          <input type="text" name="title" class="form-control" placeholder="Exemplo: Lei Orçamentária Anual (loa) - Proposta...">
        </div>
        <div class="mb-3">
          <label class="form-label">Data do projeto:</label>
          <input type="date" name="date" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Número:</label>
          <input type="text" name="number_projeto" class="form-control" placeholder="Exemplo: 028/2023">
        </div>
        <div class="mb-3">
          <label class="form-label">Origem:</label>
          <input type="text" name="origem" class="form-control" placeholder="Exemplo: Executivo">
        </div>
        <div class="mb-3">
          <label class="form-label">Ementa:</label>
          <input type="text" name="ementa" class="form-control" placeholder="Exemplo: Lei Orçamentária Anual (loa) - Proposta...">
        </div>
        <div class="mb-3">
          <label class="form-label">Autor:</label>
          <input type="text" name="author" class="form-control" placeholder="Exemplo: Maria Salvador da Silva">
        </div>
        <div class="mb-3">
          <label class="form-label">Relator:</label>
          <input type="text" name="relator" class="form-control" placeholder="Exemplo: Maria Salvador da Silva">
        </div>
        <div class="mb-3">
          <label for="formFileSm" class="form-label">Arquivo do projeto <b>(PDF)</b>:</label>
          <input type="file" name="image" class="form-control form-control-sm" id="formFileSm">
        </div>
        <div class="mb-3 mt-4">
          <input type="submit" name="cadastrar_projeto" value="Cadastrar Projeto" class="btn btn-primary">
        </div>
      </form>

    </div>
  </div>
</div>
</div>
<!-- /.container-fluid -->

<?php require_once("footer.php") ?>