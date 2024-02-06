<?php require_once("header.php") ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800 text-center">Seção de Agendas Oficiais</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
      <div class="row align-items-center">
        <div class="col">
          <h6 class="m-0 font-weight-bold text-primary">Nova Agenda Oficial</h6>
        </div>
      </div>
    </div>
    <div class="card-body">

      <form action="actions/cadastrar_agenda" method="POST" enctype="multipart/form-data">
          <?php require_once("../config/messages.php"); ?>
        
        <div class="mb-3">
          <label class="form-label">Título:</label>
          <input type="text" name="title" class="form-control" placeholder="Exemplo: 4º Reunião do Quarto Período Legislativo...">
        </div>
        <div class="mb-3">
          <label class="form-label">Data Inicio:</label>
          <input type="date" name="date" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Horário:</label>
          <input type="time" name="hour" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Evento:</label>
          <textarea class="form-control" name="description" rows="3" placeholder="Exemplo: 4º Reunião do Quarto Período Legislativo, as 10:00..."></textarea>
        </div>
        <div class="mb-3 mt-4">
          <input type="submit" name="cadastrar_agenda" value="Cadastrar Agenda" class="btn btn-primary">
        </div>
      </form>

    </div>
  </div>
</div>
</div>
<!-- /.container-fluid -->

<?php require_once("footer.php") ?>