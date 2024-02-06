<?php

require_once("../config/db.php");
require_once("header.php");

$listar_pautas = $db->prepare("SELECT * FROM `pautas`");
$listar_pautas->execute();

$resultado_pautas = $listar_pautas->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800 text-center">Seção de Pautas</h1>

  <?php require_once("../config/messages.php") ?>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
      <div class="row align-items-center">
        <div class="col">
          <h6 class="m-0 font-weight-bold text-primary">Pautas Públicadas</h6>
        </div>
        <div class="col text-right">
          <a href="cadastrar_pautas" class="btn btn-primary btn-sm">Adicionar nova pauta</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="tablePautas" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th>Título</th>
              <th>Conteúdo</th>
              <th>Data</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php
            foreach ($resultado_pautas as $key => $value) {
            ?>
              <tr>
                <td style="max-width: 190px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap"><?= $value['title'] ?></td>
                <td style="max-width: 190px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap"><?= $value['content'] ?></td>
                <td><?= date('d/m/Y', strtotime($value['date'])) ?></td>
                <td>
                  <a type="button" class="btn btn-primary btn-sm" href="../documentos/arquivos_pdf/pautas/<?= $value['file'] ?>" target="_blank"><i class="fas fa-eye"></i></a>
                  <a type="button" class="btn btn-success btn-sm" data-id="<?php echo $value['idPauta']; ?>" data-title="<?php echo $value['title']; ?>" data-content="<?php echo $value['content']; ?>" data-date="<?php echo $value['date']; ?>" data-file="<?php echo $value['file']; ?>" data-toggle="modal" data-target="#modal-editar-pauta"><i class="fas fa-edit"></i></a>
                  <a type="button" class="btn btn-danger btn-sm" data-id="<?php echo $value['idPauta']; ?>" data-image="<?php echo $value['file']; ?>" data-toggle="modal" data-target="#modal-excluir-pauta"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
<!-- /.container-fluid -->

<?php require_once("footer.php") ?>

<script>
  $(document).ready(function() {

    $('#modal-excluir-pauta').on('show.bs.modal', function(e) {
      var id_excluir_pauta = $(e.relatedTarget).data('id');
      var file_excluir_pauta = $(e.relatedTarget).data('image');

      //Adiciona o valor expecificado ao input hidden
      $("#id_excluir_pauta").val(id_excluir_pauta);
      $("#file_excluir_pauta").val(file_excluir_pauta);

    });

    $('#modal-editar-pauta').on('show.bs.modal', function(e) {
      var id_editar_pauta = $(e.relatedTarget).data('id');
      var title_editar_pauta = $(e.relatedTarget).data('title');
      var content_editar_pauta = $(e.relatedTarget).data('content');
      var date_editar_pauta = $(e.relatedTarget).data('date');
      var file_editar_pauta = $(e.relatedTarget).data('file');

      $("#id_editar_pauta").val(id_editar_pauta);
      $("#title_editar_pauta").val(title_editar_pauta);
      $("#content_editar_pauta").val(content_editar_pauta);
      $("#date_editar_pauta").val(date_editar_pauta);
      $("#file_editar_pauta").val(file_editar_pauta);

    });
  });
</script>

<script>
  $(document).ready(function() {
    $('#tablePautas').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json"
      }
    });
  });
</script>