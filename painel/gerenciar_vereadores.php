<?php require_once("header.php") ?>

<?php

 $vereadores_cadastrados = $db->prepare("SELECT * FROM `vereadores` WHERE `status` != 0");
 $vereadores_cadastrados->execute();

 $resultado_vereadores = $vereadores_cadastrados->fetchAll(PDO::FETCH_ASSOC);

 ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800 text-center">Seção de Notícias</h1>

  <?php require_once("../config/messages.php") ?>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
      <div class="row align-items-center">
        <div class="col">
          <h6 class="m-0 font-weight-bold text-primary">Notícias Públicadas</h6>
        </div>
        <div class="col text-right">
          <a href="cadastrar_vereadores" class="btn btn-primary btn-sm">Adicionar novo vereador</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="tableVereadores" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th>Nome</th>
              <th>Partido</th>
              <th>Legislatura</th>
              <th>Status</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody class="text-center">

            <?php
             foreach ($resultado_vereadores as $resultado => $value) {

              if ($value['status'] == 1) {
                $name_status = 'ATIVO';
              }

             ?>

              <tr>
                <td><?= $value['name'] ?></td>
                <td><?= $value['party'] ?></td>
                <td><?= $value['legislature'] ?></td>
                <td><?= $name_status ?></td>
                <td>
                  <a type="button" class="btn btn-primary btn-sm" href="../noticia?id=<?= $value['idVereador'] ?>" target="_blank"><i class="fas fa-eye"></i></a>
                  <a type="button" class="btn btn-success btn-sm" data-id="<?php echo $value['idVereador']; ?>" data-name="<?php echo $value['name']; ?>" data-party="<?php echo $value['party']; ?>" data-legislature="<?php echo $value['legislature']; ?>" data-historic="<?php echo $value['historic']; ?>" data-email="<?php echo $value['email']; ?>" data-facebook="<?php echo $value['facebook']; ?>" data-whatsapp="<?php echo $value['whatsapp']; ?>" data-instagram="<?php echo $value['instagram']; ?>" data-image="<?php echo $value['image']; ?>" data-status="<?php echo $value['status']; ?>" data-toggle="modal" data-target="#modal-editar-vereador"><i class="fas fa-edit"></i></a>
                  <a type="button" class="btn btn-danger btn-sm" data-id="<?php echo $value['idVereador']; ?>" data-image="<?php echo $value['image']; ?>" data-toggle="modal" data-target="#modal-excluir-vereador"><i class="fas fa-trash-alt"></i></a>
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

    //Executa a função ao abrir o modal de excluir noticia
    $('#modal-excluir-vereador').on('show.bs.modal', function(e) {
      //Cria uma variavel com o id passado no input
      var id_excluir_vereador = $(e.relatedTarget).data('id');
      var image_excluir_vereador = $(e.relatedTarget).data('image');

      //Adiciona o valor expecificado ao input hidden
      $("#id_excluir_vereador").val(id_excluir_vereador);
      $("#image_excluir_vereador").val(image_excluir_vereador);
    });

    //Executa a função ao abrir o modal de excluir noticia
    $('#modal-editar-vereador').on('show.bs.modal', function(e) {
      var id_editar_vereador = $(e.relatedTarget).data('id');
      var image_editar_vereador = $(e.relatedTarget).data('image');
      var name_editar_vereador = $(e.relatedTarget).data('name');
      var party_editar_vereador = $(e.relatedTarget).data('party');
      var legislature_editar_vereador = $(e.relatedTarget).data('legislature');
      var historic_editar_vereador = $(e.relatedTarget).data('historic');
      var email_editar_vereador = $(e.relatedTarget).data('email');
      var facebook_editar_vereador = $(e.relatedTarget).data('facebook');
      var whatsapp_editar_vereador = $(e.relatedTarget).data('whatsapp');
      var instagram_editar_vereador = $(e.relatedTarget).data('instagram');
      var status_editar_vereador = $(e.relatedTarget).data('status');

      $("#id_editar_vereador").val(id_editar_vereador);
      $("#image_editar_vereador").val(image_editar_vereador);
      $("#name_editar_vereador").val(name_editar_vereador);
      $("#party_editar_vereador").val(party_editar_vereador);
      $("#legislature_editar_vereador").val(legislature_editar_vereador);
      $("#historic_editar_vereador").val(historic_editar_vereador);
      $("#email_editar_vereador").val(email_editar_vereador);
      $("#facebook_editar_vereador").val(facebook_editar_vereador);
      $("#whatsapp_editar_vereador").val(whatsapp_editar_vereador);
      $("#instagram_editar_vereador").val(instagram_editar_vereador);
      $("#status_editar_vereador").val(status_editar_vereador);
    });
  });
</script>

<script>
 $(document).ready(function() {
   $('#tableVereadores').DataTable( {
       "language": {
           "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json"
       }
   } );
} );
</script>