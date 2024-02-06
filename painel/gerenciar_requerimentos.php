<?php require_once("header.php") ?>

<?php

if ($_SESSION[$vereadorIdentifier] == NULL) {
  $requerimentos_cadastrados = $db->prepare("SELECT * FROM `requerimentos`");
  $requerimentos_cadastrados->execute();
  
  $resultado_requerimentos = $requerimentos_cadastrados->fetchAll(PDO::FETCH_ASSOC);
} else {
  $requerimentos_cadastrados = $db->prepare("SELECT * FROM `requerimentos` WHERE `id_vereador` = :idVereador");
  $requerimentos_cadastrados->execute(array(
    ':idVereador' => $_SESSION[$vereadorIdentifier]
  ));
  
  $resultado_requerimentos = $requerimentos_cadastrados->fetchAll(PDO::FETCH_ASSOC);
}


 ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800 text-center">Seção de Requerimentos</h1>

  <?php require_once("../config/messages.php") ?>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
      <div class="row align-items-center">
        <div class="col">
          <h6 class="m-0 font-weight-bold text-primary">Requerimentos Públicados</h6>
        </div>
        <div class="col text-right">
          <a href="cadastrar_requerimentos" class="btn btn-primary btn-sm">Adicionar novo requerimento</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="tableRequerimentos" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th>N° Ato</th>
              <th>Título</th>
              <th>Conteúdo</th>
              <th>Autor</th>
              <th>Data</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody class="text-center">

            <?php
             foreach ($resultado_requerimentos as $resultado => $value) {

             ?>

              <tr>
                <td style="max-width: 190px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap"><?= $value['number_ato'] ?></td>
                <td style="max-width: 190px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap"><?= $value['title'] ?></td>
                <td style="max-width: 190px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap"><?= $value['content'] ?></td>
                <td><?= $value['author'] ?></td>
                <td><?= date('d/m/Y', strtotime($value['date'])) ?></td>
                <td>
                  <a type="button" class="btn btn-primary btn-sm" href="../documentos/arquivos_pdf/requerimentos/<?= $value['file'] ?>" target="_blank"><i class="fas fa-eye"></i></a>
                  <a type="button" class="btn btn-success btn-sm" data-id="<?php echo $value['idRequerimento']; ?>" data-number_ato="<?php echo $value['number_ato']; ?>" data-title="<?php echo $value['title']; ?>" data-content="<?php echo $value['content']; ?>" data-date="<?php echo $value['date']; ?>" data-file="<?php echo $value['file']; ?>" data-toggle="modal" data-target="#modal-editar-requerimento"><i class="fas fa-edit"></i></a>
                  <a type="button" class="btn btn-danger btn-sm" data-id="<?php echo $value['idRequerimento']; ?>" data-image="<?php echo $value['file']; ?>" data-toggle="modal" data-target="#modal-excluir-requerimento"><i class="fas fa-trash-alt"></i></a>
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

    $('#modal-excluir-requerimento').on('show.bs.modal', function(e) {
      var id_excluir_requerimento = $(e.relatedTarget).data('id');
      var file_excluir_requerimento = $(e.relatedTarget).data('image');

      //Adiciona o valor expecificado ao input hidden
      $("#id_excluir_requerimento").val(id_excluir_requerimento);
      $("#file_excluir_requerimento").val(file_excluir_requerimento);

    });

    //Executa a função ao abrir o modal de excluir noticia
    $('#modal-editar-requerimento').on('show.bs.modal', function(e) {
      var id_editar_requerimento = $(e.relatedTarget).data('id');
      var number_ato_editar_requerimento = $(e.relatedTarget).data('number_ato');
      var title_editar_requerimento = $(e.relatedTarget).data('title');
      var content_editar_requerimento = $(e.relatedTarget).data('content');
      var date_editar_requerimento = $(e.relatedTarget).data('date');
      var file_editar_requerimento = $(e.relatedTarget).data('file');

      $("#id_editar_requerimento").val(id_editar_requerimento);
      $("#number_ato_editar_requerimento").val(number_ato_editar_requerimento);
      $("#title_editar_requerimento").val(title_editar_requerimento);
      $("#content_editar_requerimento").val(content_editar_requerimento);
      $("#date_editar_requerimento").val(date_editar_requerimento);
      $("#file_editar_requerimento").val(file_editar_requerimento);
     

    });
  });
</script>

<script>
 $(document).ready(function() {
   $('#tableRequerimentos').DataTable( {
       "language": {
           "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json"
       }
   } );
} );
</script>