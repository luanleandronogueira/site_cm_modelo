<?php

require_once("../config/db.php");
require_once("header.php");

$listar_projetos_lei = $db->prepare("SELECT * FROM `projeto_de_lei`");
$listar_projetos_lei->execute();

$resultado_projetos_lei = $listar_projetos_lei->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800 text-center">Seção de Projetos de Lei</h1>

  <?php require_once("../config/messages.php") ?>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
      <div class="row align-items-center">
        <div class="col">
          <h6 class="m-0 font-weight-bold text-primary">Projetos de Lei Públicados</h6>
        </div>
        <div class="col text-right">
          <a href="cadastrar_projeto_lei" class="btn btn-primary btn-sm">Adicionar novo projeto</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="tablePautas" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th>Título</th>
              <th>Número</th>
              <th>Data</th>
              <th>Origem</th>
              <th>Ementa</th>
              <th>Autor</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php foreach ($resultado_projetos_lei as $key => $value) { ?>
              <tr>
                <td style="max-width: 190px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap"><?= $value['title'] ?></td>
                <td style="max-width: 190px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap"><?= $value['number_projeto'] ?></td>
                <td><?= date('d/m/Y', strtotime($value['date'])) ?></td>
                <td style="max-width: 190px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap"><?= $value['origem'] ?></td>
                <td style="max-width: 190px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap"><?= $value['ementa'] ?></td>
                <td style="max-width: 190px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap"><?= $value['author'] ?></td>
                <td>
                  <a type="button" class="btn btn-primary btn-sm" href="../documentos/arquivos_pdf/projetos_lei/<?= $value['file'] ?>" target="_blank"><i class="fas fa-eye"></i></a>
                  <a type="button" class="btn btn-success btn-sm" data-id="<?php echo $value['idProjeto']; ?>" data-title="<?php echo $value['title']; ?>" data-relator="<?php echo $value['relator']; ?>" data-andamento="<?php echo $value['andamento']; ?>" data-origem="<?php echo $value['origem']; ?>" data-number="<?php echo $value['number_projeto']; ?>" data-ementa="<?php echo $value['ementa']; ?>" data-date="<?php echo $value['date']; ?>" data-file="<?php echo $value['file']; ?>" data-toggle="modal" data-target="#modal-editar-projeto-lei"><i class="fas fa-edit"></i></a>
                  <a type="button" class="btn btn-danger btn-sm" data-id="<?php echo $value['idProjeto']; ?>" data-image="<?php echo $value['file']; ?>" data-toggle="modal" data-target="#modal-excluir-pl"><i class="fas fa-trash-alt"></i></a>
                  <a type="button" class="btn btn-info btn-sm" data-id="<?php echo $value['idProjeto']; ?>" data-toggle="modal" data-target="#modal-cadastrar-tramitacao"><i class="fas fa-project-diagram"></i></a>
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

    $('#modal-excluir-projeto-lei').on('show.bs.modal', function(e) {
      var id_excluir_projeto_lei = $(e.relatedTarget).data('id');
      var file_excluir_projeto_lei = $(e.relatedTarget).data('image');

      //Adiciona o valor expecificado ao input hidden
      $("#id_excluir_projeto_lei").val(id_excluir_projeto_lei);
      $("#file_excluir_projeto_lei").val(file_excluir_projeto_lei);

    });

    $('#modal-cadastrar-tramitacao').on('show.bs.modal', function(e) {
      var id_projeto_lei = $(e.relatedTarget).data('id');

      //Adiciona o valor expecificado ao input hidden
      $("#id_projeto_lei").val(id_projeto_lei);

    });

    $('#modal-editar-projeto-lei').on('show.bs.modal', function(e) {
      var id_editar_projeto_lei = $(e.relatedTarget).data('id');
      var title_editar_projeto_lei = $(e.relatedTarget).data('title');
      var number_editar_projeto_lei = $(e.relatedTarget).data('number');
      var origem_editar_projeto_lei = $(e.relatedTarget).data('origem');
      var andamento_editar_projeto_lei = $(e.relatedTarget).data('andamento');
      var relator_editar_projeto_lei = $(e.relatedTarget).data('relator');
      var ementa_editar_projeto_lei = $(e.relatedTarget).data('ementa');
      var date_editar_projeto_lei = $(e.relatedTarget).data('date');
      var file_editar_projeto_lei = $(e.relatedTarget).data('file');

      $("#id_editar_projeto_lei").val(id_editar_projeto_lei);
      $("#title_editar_projeto_lei").val(title_editar_projeto_lei);
      $("#number_editar_projeto_lei").val(number_editar_projeto_lei);
      $("#origem_editar_projeto_lei").val(origem_editar_projeto_lei);
      $("#andamento_editar_projeto_lei").val(andamento_editar_projeto_lei);
      $("#relator_editar_projeto_lei").val(relator_editar_projeto_lei);
      $("#ementa_editar_projeto_lei").val(ementa_editar_projeto_lei);
      $("#date_editar_projeto_lei").val(date_editar_projeto_lei);
      $("#file_editar_projeto_lei").val(file_editar_projeto_lei);

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