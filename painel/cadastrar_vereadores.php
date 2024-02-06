<?php require_once("header.php") ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800 text-center">Gerenciar Vereadores</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
      <div class="row align-items-center">
        <div class="col">
          <h6 class="m-0 font-weight-bold text-primary">Vereadores Cadastrados</h6>
        </div>
      </div>
    </div>
    <div class="card-body">

      <form action="actions/cadastrar_vereadores" method="POST" enctype="multipart/form-data">
          <?php require_once("../config/messages.php"); ?>
        <div class="mb-3">
          <label class="form-label">Nome do Vereador(a):</label>
          <input type="text" name="name" class="form-control" placeholder="Exemplo: Maria Salvador da Silva">
        </div>
        <div class="mb-3">
          <label class="form-label">Nome fantasia:</label>
          <input type="text" name="fantasy_name" class="form-control" placeholder="Exemplo: Maria Salvador da Silva (Apelido)">
        </div>
        <div class="mb-3">
          <label class="form-label">Partido:</label>
          <input type="text" name="party" class="form-control" placeholder="Exemplo: PSB">
        </div>
        <div class="mb-3">
          <label class="form-label">Lesgislatura:</label>
          <input type="text" name="legislature" class="form-control" placeholder="Exemplo: 2022 - 2024">
        </div>
        <div class="mb-3">
          <label class="form-label">Histórico:</label>
          <textarea name="historic" cols="30" rows="3" class="form-control" placeholder="Exemplo: Vereador(a) nascido em cidade tal, etc..."></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">E-mail:</label>
          <input type="email" name="email" class="form-control" placeholder="Exemplo: nome@email.com">
        </div>
        <div class="mb-3">
          <label class="form-label">Facebook:</label>
          <input type="text" name="facebook" class="form-control" placeholder="Exemplo: Link do perfil do facebook">
        </div>
        <div class="mb-3">
          <label class="form-label">Whatsapp:</label>
          <input type="text" name="whatsapp" class="form-control" placeholder="Exemplo: Número do Whatsapp">
        </div>
        <div class="mb-3">
          <label class="form-label">Instagram:</label>
          <input type="text" name="instagram" class="form-control" placeholder="Exemplo: Link do perfil do instagram">
        </div>
        <div class="mb-3">
          <label for="formFileSm" class="form-label">Imagem do vereador(a):</label>
          <input type="file" name="image" class="form-control form-control-sm" id="formFileSm">
        </div>
        <div class="mb-3 mt-4">
          <input type="submit" name="cadastrar_vereador" value="Cadastrar" class="btn btn-primary">
        </div>
      </form>

    </div>
  </div>
</div>
</div>
<!-- /.container-fluid -->

<?php require_once("footer.php") ?>