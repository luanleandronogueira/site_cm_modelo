<?php require_once("header.php"); ?>

 <?php

  $noticias_cadastradas = $db->prepare("SELECT * FROM `news` ORDER BY idNews DESC");
  $noticias_cadastradas->execute();

  $resultado_noticias = $noticias_cadastradas->fetchALL(PDO::FETCH_ASSOC);

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
           <a href="cadastrar_noticias" class="btn btn-primary btn-sm">Adicionar nova notícia</a>
         </div>
       </div>
     </div>
     <div class="card-body">
       <div class="table-responsive">
         <table class="table table-bordered" id="tableNoticias" width="100%" cellspacing="0">
           <thead class="text-center">
             <tr>
               <th>ID</th>
               <th>Título</th>
               <th>Resumo</th>
               <th>Autor</th>
               <th>Data</th>
               <th>Ações</th>
             </tr>
           </thead>
           <tbody class="text-center">

             <?php
              foreach ($resultado_noticias as $resultado => $value) {

              ?>

               <tr>
                 <td style="max-width: 190px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap"><?= $value['idNews'] ?></td>
                 <td style="max-width: 190px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap"><?= $value['title'] ?></td>
                 <td style="max-width: 190px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap"><?= $value['content'] ?></td>
                 <td><?= $value['author'] ?></td>
                 <td><?= date('d/m/Y', strtotime($value['date'])) ?></td>
                 <td>
                   <a type="button" class="btn btn-primary btn-sm" href="../noticia?id=<?= $value['idNews'] ?>" target="_blank"><i class="fas fa-eye"></i></a>
                   <a type="button" class="btn btn-success btn-sm" data-id="<?php echo $value['idNews']; ?>" data-title="<?php echo str_replace('"', "'", $value['title']); ?>" data-content="<?php echo str_replace('"', "'", $value['content']); ?>" data-date="<?php echo $value['date']; ?>" data-image="<?php echo $value['image']; ?>" data-toggle="modal" data-target="#modal-editar-noticia"><i class="fas fa-edit"></i></a>
                   <a type="button" class="btn btn-danger btn-sm" data-id="<?php echo $value['idNews']; ?>" data-image="<?php echo $value['image']; ?>" data-toggle="modal" data-target="#modal-excluir-noticia"><i class="fas fa-trash-alt"></i></a>
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
     $('#modal-excluir-noticia').on('show.bs.modal', function(e) {
       //Cria uma variavel com o id passado no input
       var id_excluir_noticia = $(e.relatedTarget).data('id');
       var image_excluir_noticia = $(e.relatedTarget).data('image');

       //Adiciona o valor expecificado ao input hidden
       $("#id_excluir_noticia").val(id_excluir_noticia);
       $("#image_excluir_noticia").val(image_excluir_noticia);

     });

     //Executa a função ao abrir o modal de excluir noticia
     $('#modal-editar-noticia').on('show.bs.modal', function(e) {
       var id_editar_noticia = $(e.relatedTarget).data('id');
       var title_editar_noticia = $(e.relatedTarget).data('title');
       var date_editar_noticia = $(e.relatedTarget).data('date');
       var content_editar_noticia = $(e.relatedTarget).data('content');
       var image_editar_noticia = $(e.relatedTarget).data('image');

       $("#id_editar_noticia").val(id_editar_noticia);
       $("#title_editar_noticia").val(title_editar_noticia);
       $("#date_editar_noticia").val(date_editar_noticia);
       $("#content_editar_noticia").val(content_editar_noticia);
       $("#image_editar_noticia").val(image_editar_noticia);

     });
   });
 </script>

<script>
  $(document).ready(function() {
    $('#tableNoticias').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json"
        }
    } );
} );
 </script>