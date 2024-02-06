<?php

require_once("../config/db.php");
require_once("header.php");

$listar_tramitacoes = $db->prepare("SELECT * FROM `tramitacao` INNER JOIN `projeto_de_lei` ON tramitacao.id_projeto = projeto_de_lei.idProjeto");
$listar_tramitacoes->execute();

$resultado_tramitacoes = $listar_tramitacoes->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800 text-center">Seção de Tramitações</h1>

  <?php require_once("../config/messages.php") ?>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
      <div class="row align-items-center">
        <div class="col">
          <h6 class="m-0 font-weight-bold text-primary">Tramitações Realizadas</h6>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="tablePautas" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th>Projeto de Lei N°</th>
              <th>Tramitação</th>
              <th>Data</th>
              <th>Centeúdo</th>
              <th>Status</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php foreach ($resultado_tramitacoes as $key => $value) { ?>
              <tr>
                <td style="max-width: 190px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap"><?= $value['title'] ?></td>
                <td style="max-width: 190px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap"><?= $value['title_tramit'] ?></td>
                <td><?= date('d/m/Y', strtotime($value['date'])) ?></td>
                <td style="max-width: 190px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap"><?= $value['content'] ?></td>
                <td style="max-width: 190px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap"><?= $value['status'] ?></td>
                <td>
                  <a type="button" class="btn btn-primary btn-sm" href="../documentos/arquivos_pdf/tramitacao/<?= $value['file2'] ?>" target="_blank"><i class="fas fa-eye"></i></a>
                  <a type="button" class="btn btn-success btn-sm" data-id="<?php echo $value['idTramitacao']; ?>" data-title="<?php echo $value['title_tramit']; ?>" data-status="<?php echo $value['status']; ?>" data-content="<?php echo $value['content']; ?>" data-date="<?php echo $value['date']; ?>" data-file="<?php echo $value['file2']; ?>" data-toggle="modal" data-target="#modal-editar-tramitacao"><i class="fas fa-edit"></i></a>
                  <a type="button" class="btn btn-danger btn-sm" data-id="<?php echo $value['idTramitacao']; ?>" data-image="<?php echo $value['file2']; ?>" data-toggle="modal" data-target="#modal-excluir-tramitacao"><i class="fas fa-trash-alt"></i></a>
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

    $('#modal-excluir-tramitacao').on('show.bs.modal', function(e) {
      var id_excluir_tramitacao = $(e.relatedTarget).data('id');
      var file_excluir_tramitacao = $(e.relatedTarget).data('image');

      //Adiciona o valor expecificado ao input hidden
      $("#id_excluir_tramitacao").val(id_excluir_tramitacao);
      $("#file_excluir_tramitacao").val(file_excluir_tramitacao);

    });

    $('#modal-editar-tramitacao').on('show.bs.modal', function(e) {
      var id_editar_tramitacao = $(e.relatedTarget).data('id');
      var title_editar_tramitacao = $(e.relatedTarget).data('title');
      var status_editar_tramitacao = $(e.relatedTarget).data('status');
      var content_editar_tramitacao = $(e.relatedTarget).data('content');
      var date_editar_tramitacao = $(e.relatedTarget).data('date');
      var file_editar_tramitacao = $(e.relatedTarget).data('file');

      $("#id_editar_tramitacao").val(id_editar_tramitacao);
      $("#title_editar_tramitacao").val(title_editar_tramitacao);
      $("#status_editar_tramitacao").val(status_editar_tramitacao);
      $("#content_editar_tramitacao").val(content_editar_tramitacao);
      $("#date_editar_tramitacao").val(date_editar_tramitacao);
      $("#file_editar_tramitacao").val(file_editar_tramitacao);

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