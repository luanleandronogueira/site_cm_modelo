<?php

require_once("../config/db.php");
require_once("header.php");

$listar_todas_atas = $db->prepare("SELECT * FROM `atas_reunioes`");
$listar_todas_atas->execute();

$resultado_todas_atas = $listar_todas_atas->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800 text-center">Seção de Atas Ordinárias</h1>

  <?php require_once("../config/messages.php") ?>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
      <div class="row align-items-center">
        <div class="col">
          <h6 class="m-0 font-weight-bold text-primary">Atas Públicadas</h6>
        </div>
        <div class="col text-right">
          <a href="cadastrar_atas_reunioes" class="btn btn-primary btn-sm">Adicionar nova ata</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="tableAtas" width="100%" cellspacing="0">
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
              foreach ($resultado_todas_atas as $key => $value) {
            ?>

              <tr>
                <td style="max-width: 190px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap"><?= $value['title'] ?></td>
                <td style="max-width: 190px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap"><?= $value['content'] ?></td>
                <td><?= date('d/m/Y', strtotime($value['date'])) ?></td>
                <td>
                  <a type="button" class="btn btn-primary btn-sm" href="../documentos/arquivos_pdf/atas_ordinarias/<?= $value['file'] ?>" target="_blank"><i class="fas fa-eye"></i></a>
                  <a type="button" class="btn btn-success btn-sm" data-id="<?php echo $value['idAta']; ?>" data-title="<?php echo $value['title']; ?>" data-content="<?php echo $value['content']; ?>" data-date="<?php echo $value['date']; ?>" data-file="<?php echo $value['file']; ?>" data-toggle="modal" data-target="#modal-editar-ata-reuniao"><i class="fas fa-edit"></i></a>
                  <a type="button" class="btn btn-danger btn-sm" data-id="<?php echo $value['idAta']; ?>" data-image="<?php echo $value['file']; ?>" data-toggle="modal" data-target="#modal-excluir-ata-reuniao"><i class="fas fa-trash-alt"></i></a>
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

    $('#modal-excluir-ata-reuniao').on('show.bs.modal', function(e) {
      var id_excluir_ata_reuniao = $(e.relatedTarget).data('id');
      var file_excluir_ata_reuniao = $(e.relatedTarget).data('image');

      //Adiciona o valor expecificado ao input hidden
      $("#id_excluir_ata_reuniao").val(id_excluir_ata_reuniao);
      $("#file_excluir_ata_reuniao").val(file_excluir_ata_reuniao);

    });

    $('#modal-editar-ata-reuniao').on('show.bs.modal', function(e) {
      var id_editar_ata_reuniao = $(e.relatedTarget).data('id');
      var title_editar_ata_reuniao = $(e.relatedTarget).data('title');
      var content_editar_ata_reuniao = $(e.relatedTarget).data('content');
      var date_editar_ata_reuniao = $(e.relatedTarget).data('date');
      var file_editar_ata_reuniao = $(e.relatedTarget).data('file');

      $("#id_editar_ata_reuniao").val(id_editar_ata_reuniao);
      $("#title_editar_ata_reuniao").val(title_editar_ata_reuniao);
      $("#content_editar_ata_reuniao").val(content_editar_ata_reuniao);
      $("#date_editar_ata_reuniao").val(date_editar_ata_reuniao);
      $("#file_editar_ata_reuniao").val(file_editar_ata_reuniao);

    });
  });
</script>

<script>
  $(document).ready(function() {
    $('#tableAtas').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json"
      }
    });
  });
</script>