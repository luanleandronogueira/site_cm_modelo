<?php require_once("header.php") ?>

<?php

 $mesa_diretora = $db->prepare("SELECT * FROM `mesa_diretora` INNER JOIN `vereadores` ON mesa_diretora.id_vereador = vereadores.idVereador WHERE `status_mesa` != 0");
 $mesa_diretora->execute();

 $resultado_mesa_diretora = $mesa_diretora->fetchAll(PDO::FETCH_ASSOC);

 ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800 text-center">Gerenciar Mesa Diretora</h1>

  <?php require_once("../config/messages.php") ?>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
      <div class="row align-items-center">
        <div class="col">
          <h6 class="m-0 font-weight-bold text-primary">Mesa Diretora Atual</h6>
        </div>
        <div class="col text-right">
          <a href="cadastrar_mesa_diretora" class="btn btn-primary btn-sm">Adicionar novo cargo</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="tableMesaDiretora" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th>Nome</th>
              <th>Partido</th>
              <th>Responsabilidade</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody class="text-center">

            <?php
             foreach ($resultado_mesa_diretora as $resultado => $value) {

             ?>

              <tr>
                <td><?= $value['name'] ?></td>
                <td><?= $value['party'] ?></td>
                <td><?= $value['responsibility'] ?></td>
                <td>
                  <a type="button" class="btn btn-primary btn-sm" href="../noticia?id=<?= $value['id'] ?>" target="_blank"><i class="fas fa-eye"></i></a>
                  <a type="button" class="btn btn-success btn-sm" data-id="<?php echo $value['id']; ?>" data-responsibility="<?php echo $value['responsibility']; ?>" data-bieno="<?php echo $value['bieno']; ?>" data-start_date="<?php echo $value['start_date']; ?>" data-end_date="<?php echo $value['end_date']; ?>" data-status_mesa="<?php echo $value['status_mesa']; ?>" data-toggle="modal" data-target="#modal-editar-mesa-diretora"><i class="fas fa-edit"></i></a>
                  <a type="button" class="btn btn-danger btn-sm" data-id="<?php echo $value['id']; ?>" data-toggle="modal" data-target="#modal-excluir-mesa-diretora"><i class="fas fa-trash-alt"></i></a>
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

    $('#modal-excluir-mesa-diretora').on('show.bs.modal', function(e) {
      var id_excluir_mesa_diretora = $(e.relatedTarget).data('id');

      $("#id_excluir_mesa_diretora").val(id_excluir_mesa_diretora);
    });

    $('#modal-editar-mesa-diretora').on('show.bs.modal', function(e) {
      var id_editar_mesa_diretora = $(e.relatedTarget).data('id');
      var responsibility_editar_mesa_diretora = $(e.relatedTarget).data('responsibility');
      var bieno_editar_mesa_diretora = $(e.relatedTarget).data('bieno');
      var start_date_editar_mesa_diretora = $(e.relatedTarget).data('start_date');
      var end_date_editar_mesa_diretora = $(e.relatedTarget).data('end_date');
      var status_editar_mesa_diretora = $(e.relatedTarget).data('status_mesa');
     
      
      $("#id_editar_mesa_diretora").val(id_editar_mesa_diretora);
      $("#responsibility_editar_mesa_diretora").val(responsibility_editar_mesa_diretora);
      $("#bieno_editar_mesa_diretora").val(bieno_editar_mesa_diretora);
      $("#start_date_editar_mesa_diretora").val(start_date_editar_mesa_diretora);
      $("#end_date_editar_mesa_diretora").val(end_date_editar_mesa_diretora);
      $("#status_editar_mesa_diretora").val(status_editar_mesa_diretora);
      
    });
  });
</script>

<script>
 $(document).ready(function() {
   $('#tableMesaDiretora').DataTable( {
       "language": {
           "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json"
       }
   } );
} );
</script>