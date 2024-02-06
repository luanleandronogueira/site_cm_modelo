 <!-- MODAL PARA CRADASTRAR USUÁRIOS -->
 <div class="modal fade" id="modal-cadastrar-usuarios" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="staticBackdropLabel">Cadastrar Usuários</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="actions/cadastrar_usuarios" method="POST">
           <div class="mb-3">
             <label class="form-label">Usuário:</label>
             <input type="text" name="login" class="form-control" placeholder="Exemplo: Usuário">
           </div>
           <div class="mb-3">
             <label class="form-label">Senha:</label>
             <input type="password" name="password" class="form-control" placeholder="Exemplo: Senha">
           </div>
           <div class="mb-3">
             <label class="form-label">Nome:</label>
             <input type="text" name="name" class="form-control" placeholder="Exemplo: Nome">
           </div>
           <div class="mb-3">
             <label class="form-label">Permissão:</label>
             <select name="access_level" class="form-control" id="access_level">
               <option value="" selected disabled>Seleciona uma opção...</option>
               <option value="1">Administrador</option>
               <option value="2">Auxiliar</option>
               <option value="3">Vereador</option>
             </select>
           </div>
           <div class="mb-3" id="vereador" style="display:none">
             <label class="form-label">Vereador(a):</label>
             <select name="id_vereador" class="form-control">
               <option value="" selected disabled>Seleciona uma opção...</option>
               <?php renderVereadores($db) ?>
             </select>
           </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
         <input type="submit" name="btn_cadastrar_usuario" class="btn btn-primary" value="Cadastrar">
         </form>
       </div>
     </div>
   </div>
 </div>

 <!-- MODAL PARA EDITAR NOTÍCIA -->
 <div class="modal fade" id="modal-editar-noticia" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="staticBackdropLabel">Editar Notícia</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="actions/editar_noticia" method="POST" enctype="multipart/form-data">
           <div class="mb-3">
             <label class="form-label">Título:</label>
             <input type="text" name="title" id="title_editar_noticia" class="form-control" placeholder="Exemplo: Nova notícia públicada na Câmara Municipal">
           </div>
           <div class="mb-3">
             <label class="form-label">Data:</label>
             <input type="date" name="date" id="date_editar_noticia" class="form-control">
           </div>
           <div class="mb-3">
             <label class="form-label">Conteúdo</label>
             <textarea class="form-control" name="content" id="content_editar_noticia" rows="5" placeholder="Exemplo: Públicada hoje uma nova notícia sobre a Câmara Municipal"></textarea>
           </div>
           <div class="mb-3">
             <label for="formFileSm" class="form-label">Imagem destaque:</label>
             <input type="file" name="image" class="form-control form-control-sm" id="formFileSm">
           </div>
           <input type="hidden" name="id_editar_noticia" id="id_editar_noticia">
           <input type="hidden" name="image_editar_noticia" id="image_editar_noticia">
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
         <input type="submit" name="btn_editar_noticia" class="btn btn-success" value="Editar">
         </form>
       </div>
     </div>
   </div>
 </div>


 <!-- MODAL PARA EXCLUIR NOTÍCIA -->
 <div class="modal fade" id="modal-excluir-noticia" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="staticBackdropLabel">Excluir Notícia</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="actions/excluir_noticia" method="POST">
           <h6>Tem certeza que deseja <b>Excluir</b> está notícia ?</h6>
           <h6>Essa ação não pode ser desfeita !</h6>
           <input type="hidden" name="id_excluir_noticia" id="id_excluir_noticia">
           <input type="hidden" name="image_excluir_noticia" id="image_excluir_noticia">
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
         <input type="submit" name="btn_excluir_noticia" class="btn btn-success" value="Excluir">
         </form>
       </div>
     </div>
   </div>
 </div>

 <!-- MODAL PARA EDITAR VEREADOR -->
 <div class="modal fade" id="modal-editar-vereador" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="staticBackdropLabel">Editar Vereador</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="actions/editar_vereador" method="POST" enctype="multipart/form-data">
           <div class="mb-3">
             <label class="form-label">Nome:</label>
             <input type="text" name="name" id="name_editar_vereador" class="form-control" placeholder="Exemplo: Maria Salvador da Silva">
           </div>
           <div class="mb-3">
             <label class="form-label">Partido:</label>
             <input type="text" name="party" id="party_editar_vereador" class="form-control" placeholder="Exemplo: PSB">
           </div>
           <div class="mb-3">
             <label class="form-label">Legislatura:</label>
             <input type="text" name="legislature" id="legislature_editar_vereador" class="form-control" placeholder="Exemplo: 2022 - 2024">
           </div>
           <div class="mb-3">
             <label class="form-label">Histórico:</label>
             <textarea name="historic" id="historic_editar_vereador" class="form-control" placeholder="Exemplo: Vereador(a) nascido(a) em cidade tal, etc..." cols="30" rows="3"></textarea>
           </div>
           <div class="mb-3">
             <label class="form-label">E-mail:</label>
             <input type="email" name="email" id="email_editar_vereador" class="form-control" placeholder="Exemplo: nome@email.com">
           </div>
           <div class="mb-3">
             <label class="form-label">Facebook:</label>
             <input type="text" name="facebook" id="facebook_editar_vereador" class="form-control" placeholder="Exemplo: Link do perfil do facebook">
           </div>
           <div class="mb-3">
             <label class="form-label">Whatsapp:</label>
             <input type="text" name="whatsapp" id="whatsapp_editar_vereador" class="form-control" placeholder="Exemplo: Número do whatsapp">
           </div>
           <div class="mb-3">
             <label class="form-label">Instagram:</label>
             <input type="text" name="instagram" id="instagram_editar_vereador" class="form-control" placeholder="Exemplo: Link do perfil do Instagram">
           </div>
           <div class="mb-3">
             <label class="form-label">Status:</label>
             <select name="status" id="status_editar_vereador" class="form-control">
               <option value="" disabled selected>Selecione uma opção...</option>
               <option value="1">ATIVO</option>
               <option value="0">INATIVO</option>
             </select>
           </div>
           <div class="mb-3">
             <label for="formFileSm" class="form-label">Imagem destaque:</label>
             <input type="file" name="image" class="form-control form-control-sm" id="formFileSm">
           </div>
           <input type="hidden" name="id_editar_vereador" id="id_editar_vereador">
           <input type="hidden" name="image_editar_vereador" id="image_editar_vereador">
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
         <input type="submit" name="btn_editar_vereador" class="btn btn-success" value="Editar">
         </form>
       </div>
     </div>
   </div>
 </div>


 <!-- MODAL PARA EXCLUIR VEREADOR -->
 <div class="modal fade" id="modal-excluir-vereador" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="staticBackdropLabel">Excluir Vereador</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="actions/excluir_vereador" method="POST">
           <h6>TEM CERTEZA QUE DESEJA <b style="color:red;">EXCLUIR</b> ESSE VEREADOR ?</h6>
           <h6>TODOS OS DADOS E DOCUMENTOS RELACIONADOS A ESSE VEREADOR, SERÃO APAGADOS !</h6>
           <h6>ESSE AÇÃO NÃO PODERÁ SER DESFEITA E OS DADOS / DOCUMENTOS NÃO PODERAM SER RECUPERADOS !</h6>
           <input type="hidden" name="id_excluir_vereador" id="id_excluir_vereador">
           <input type="hidden" name="image_excluir_vereador" id="image_excluir_vereador">
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
         <input type="submit" name="btn_excluir_vereador" class="btn btn-success" value="Excluir">
         </form>
       </div>
     </div>
   </div>
 </div>

 <!-- MODAL PARA EXCLUIR MESA DIRETORA -->
 <div class="modal fade" id="modal-excluir-mesa-diretora" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="staticBackdropLabel">Excluir Mesa Diretora</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="actions/excluir_mesa_diretora" method="POST">
           <h6>Tem certeza que deseja <b>Excluir</b> ?</h6>
           <h6>Essa ação não poderá ser desfeita ! </h6>
           <input type="hidden" name="id_excluir_mesa_diretora" id="id_excluir_mesa_diretora">
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
         <input type="submit" name="btn_excluir_mesa_diretora" class="btn btn-success" value="Excluir">
         </form>
       </div>
     </div>
   </div>
 </div>

 <!-- MODAL PARA EDITAR MESA DIRETORA -->
 <div class="modal fade" id="modal-editar-mesa-diretora" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="staticBackdropLabel">Editar Mesa Diretora</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="actions/editar_mesa_diretora" method="POST">
           <div class="mb-3">
             <label class="form-label">Responsabilidade:</label>
             <input type="text" name="responsibility" id="responsibility_editar_mesa_diretora" class="form-control" placeholder="Exemplo: Presidente">
           </div>
           <div class="mb-3">
             <label class="form-label">Bieno:</label>
             <input type="text" name="bieno" id="bieno_editar_mesa_diretora" class="form-control" placeholder="Exemplo: 2022 - 2024">
           </div>
           <div class="mb-3">
             <label class="form-label">Data início:</label>
             <input type="date" name="start_date" id="start_date_editar_mesa_diretora" class="form-control">
           </div>
           <div class="mb-3">
             <label class="form-label">Data final:</label>
             <input type="date" name="end_date" id="end_date_editar_mesa_diretora" class="form-control">
           </div>
           <div class="mb-3">
             <label class="form-label">Status:</label>
             <select name="status_mesa" id="status_editar_mesa_diretora" class="form-control">
               <option value="" disabled selected>Selecione...</option>
               <option value="1">ATIVO</option>
               <option value="0">INATIVO</option>
             </select>
           </div>
           <input type="hidden" name="id_editar_mesa_diretora" id="id_editar_mesa_diretora">
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
         <input type="submit" name="btn_editar_mesa_diretora" class="btn btn-success" value="Editar">
         </form>
       </div>
     </div>
   </div>
 </div>

 <!-- MODAL PARA EXCLUIR REQUERIMENTO -->
 <div class="modal fade" id="modal-excluir-requerimento" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="staticBackdropLabel">Excluir Requerimento</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="actions/excluir_requerimento" method="POST">
           <h6>Tem certeza que deseja <b>Excluir</b> este requerimento ?</h6>
           <h6>Essa ação não poderá ser desfeita ! </h6>
           <input type="hidden" name="id_excluir_requerimento" id="id_excluir_requerimento">
           <input type="hidden" name="file_excluir_requerimento" id="file_excluir_requerimento">
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
         <input type="submit" name="btn_excluir_requerimento" class="btn btn-success" value="Excluir">
         </form>
       </div>
     </div>
   </div>
 </div>

 <!-- MODAL PARA EDITAR REQUERIMENTO -->
 <div class="modal fade" id="modal-editar-requerimento" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="staticBackdropLabel">Editar Requerimento</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="actions/editar_requerimento" method="POST" enctype="multipart/form-data">
           <div class="mb-3">
             <label class="form-label">N° Ato:</label>
             <input type="text" name="number_ato" id="number_ato_editar_requerimento" class="form-control" placeholder="Exemplo: 003/2022">
           </div>
           <div class="mb-3">
             <label class="form-label">Título:</label>
             <input type="text" name="title" id="title_editar_requerimento" class="form-control" placeholder="Exemplo: Requerimento - N° 003/2022...">
           </div>
           <div class="mb-3">
             <label class="form-label">Data do requerimento:</label>
             <input type="date" name="date" id="date_editar_requerimento" class="form-control">
           </div>
           <div class="mb-3">
             <label class="form-label">Conteúdo:</label>
             <textarea class="form-control" name="content" id="content_editar_requerimento" rows="3" placeholder="Exemplo: REQUER A CHEFE DO PODER EXECUTIVO MUNICIPAL JUNTO COM A SECRETARIA COMPETENTE..."></textarea>
           </div>
           <div class="mb-3">
             <label for="formFileSm" class="form-label">Arquivo do requerimento <b>(PDF)</b>:</label>
             <input type="file" name="image" class="form-control form-control-sm" id="formFileSm">
           </div>
           <input type="hidden" name="id_editar_requerimento" id="id_editar_requerimento">
           <input type="hidden" name="file_editar_requerimento" id="file_editar_requerimento">
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
         <input type="submit" name="btn_editar_requerimento" class="btn btn-success" value="Editar">
         </form>
       </div>
     </div>
   </div>
 </div>

 <!-- MODAL PARA EDITAR ATAS ORDINÁRIAS -->
 <div class="modal fade" id="modal-editar-ata-reuniao" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="staticBackdropLabel">Editar Ata Ordinária</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="actions/editar_atas_reunioes" method="POST" enctype="multipart/form-data">
           <div class="mb-3">
             <label class="form-label">Título:</label>
             <input type="text" name="title" id="title_editar_ata_reuniao" class="form-control" placeholder="Exemplo: Requerimento - N° 003/2022...">
           </div>
           <div class="mb-3">
             <label class="form-label">Data:</label>
             <input type="date" name="date" id="date_editar_ata_reuniao" class="form-control">
           </div>
           <div class="mb-3">
             <label class="form-label">Conteúdo:</label>
             <textarea class="form-control" name="content" id="content_editar_ata_reuniao" rows="3" placeholder="Exemplo: REQUER A CHEFE DO PODER EXECUTIVO MUNICIPAL JUNTO COM A SECRETARIA COMPETENTE..."></textarea>
           </div>
           <div class="mb-3">
             <label for="formFileSm" class="form-label">Arquivo da ata ordinária <b>(PDF)</b>:</label>
             <input type="file" name="image" class="form-control form-control-sm" id="formFileSm">
           </div>
           <input type="hidden" name="id_editar_ata_reuniao" id="id_editar_ata_reuniao">
           <input type="hidden" name="file_editar_ata_reuniao" id="file_editar_ata_reuniao">
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
         <input type="submit" name="btn_editar_ata_reuniao" class="btn btn-success" value="Editar">
         </form>
       </div>
     </div>
   </div>
 </div>

 <!-- MODAL PARA EXCLUIR ATAS ORDINÁRIAS -->
 <div class="modal fade" id="modal-excluir-ata-reuniao" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="staticBackdropLabel">Excluir Atas Reuniões</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="actions/excluir_atas_reunioes" method="POST">
           <h6>Tem certeza que deseja <b>Excluir</b> esta ata ?</h6>
           <h6>Essa ação não poderá ser desfeita ! </h6>
           <input type="hidden" name="id_excluir_ata_reuniao" id="id_excluir_ata_reuniao">
           <input type="hidden" name="file_excluir_ata_reuniao" id="file_excluir_ata_reuniao">
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
         <input type="submit" name="btn_excluir_ata_reuniao" class="btn btn-success" value="Excluir">
         </form>
       </div>
     </div>
   </div>
 </div>

 <!-- MODAL PARA EXCLUIR PAUTA -->
 <div class="modal fade" id="modal-excluir-pauta" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="staticBackdropLabel">Excluir Pauta</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="actions/excluir_pauta" method="POST">
           <h6>Tem certeza que deseja <b>Excluir</b> esta pauta ?</h6>
           <h6>Essa ação não poderá ser desfeita ! </h6>
           <input type="hidden" name="id_excluir_pauta" id="id_excluir_pauta">
           <input type="hidden" name="file_excluir_pauta" id="file_excluir_pauta">
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
         <input type="submit" name="btn_excluir_pauta" class="btn btn-success" value="Excluir">
         </form>
       </div>
     </div>
   </div>
 </div>

 <!-- MODAL PARA EDITAR PAUTA -->
 <div class="modal fade" id="modal-editar-pauta" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="staticBackdropLabel">Editar Pauta</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="actions/editar_pauta" method="POST" enctype="multipart/form-data">
           <div class="mb-3">
             <label class="form-label">Título:</label>
             <input type="text" name="title" id="title_editar_pauta" class="form-control" placeholder="Exemplo: Requerimento - N° 003/2022...">
           </div>
           <div class="mb-3">
             <label class="form-label">Data:</label>
             <input type="date" name="date" id="date_editar_pauta" class="form-control">
           </div>
           <div class="mb-3">
             <label class="form-label">Conteúdo:</label>
             <textarea class="form-control" name="content" id="content_editar_pauta" rows="3" placeholder="Exemplo: REQUER A CHEFE DO PODER EXECUTIVO MUNICIPAL JUNTO COM A SECRETARIA COMPETENTE..."></textarea>
           </div>
           <div class="mb-3">
             <label for="formFileSm" class="form-label">Arquivo da ata ordinária <b>(PDF)</b>:</label>
             <input type="file" name="image" class="form-control form-control-sm" id="formFileSm">
           </div>
           <input type="hidden" name="id_editar_pauta" id="id_editar_pauta">
           <input type="hidden" name="file_editar_pauta" id="file_editar_pauta">
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
         <input type="submit" name="btn_editar_pauta" class="btn btn-success" value="Editar">
         </form>
       </div>
     </div>
   </div>
 </div>

 <!-- MODAL PARA CADASTRAR TRAMITAÇÃO -->
 <div class="modal fade" id="modal-cadastrar-tramitacao" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="staticBackdropLabel">Cadastrar Tramitação</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="actions/cadastrar_tramitacao" method="POST" enctype="multipart/form-data">
           <div class="mb-3">
             <label class="form-label">Título:</label>
             <input type="text" name="title_tramit" class="form-control" placeholder="Exemplo: Entrada Do Projeto De Lei Na Secretaria Legisl...">
           </div>
           <div class="mb-3">
             <label class="form-label">Data da tramitação:</label>
             <input type="date" name="date" class="form-control">
           </div>
           <div class="mb-3">
             <label class="form-label">Conteúdo:</label>
             <input type="text" name="content" class="form-control" placeholder="Exemplo: Entrada do projeto de lei na se...">
           </div>
           <div class="mb-3">
             <label class="form-label">Status:</label>
             <input type="text" name="status" class="form-control" placeholder="Exemplo: TRAMITAÇÃO, APROVADO, ETC...">
           </div>
           <div class="mb-3">
             <label for="formFileSm" class="form-label">Arquivo da tramitação <b>(PDF)</b>:</label>
             <input type="file" name="image" class="form-control form-control-sm" id="formFileSm">
           </div>
           <input type="hidden" name="id_projeto_lei" id="id_projeto_lei">
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
         <input type="submit" name="cadastrar_tramitacao" class="btn btn-success" value="Cadastrar">
         </form>
       </div>
     </div>
   </div>
 </div>

 <!-- MODAL PARA EDITAR TRAMITAÇÃO -->
 <div class="modal fade" id="modal-editar-tramitacao" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="staticBackdropLabel">Editar Tramitação</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="actions/editar_tramitacao" method="POST" enctype="multipart/form-data">
           <div class="mb-3">
             <label class="form-label">Título:</label>
             <input type="text" name="title_tramit" id="title_editar_tramitacao" class="form-control" placeholder="Exemplo: Requerimento - N° 003/2022...">
           </div>
           <div class="mb-3">
             <label class="form-label">Data:</label>
             <input type="date" name="date" id="date_editar_tramitacao" class="form-control">
           </div>
           <div class="mb-3">
             <label class="form-label">Status:</label>
             <input type="text" name="status" id="status_editar_tramitacao" class="form-control">
           </div>
           <div class="mb-3">
             <label class="form-label">Conteúdo:</label>
             <textarea class="form-control" name="content" id="content_editar_tramitacao" rows="3" placeholder="Exemplo: REQUER A CHEFE DO PODER EXECUTIVO MUNICIPAL JUNTO COM A SECRETARIA COMPETENTE..."></textarea>
           </div>
           <div class="mb-3">
             <label for="formFileSm" class="form-label">Arquivo da tramitação <b>(PDF)</b>:</label>
             <input type="file" name="image" class="form-control form-control-sm" id="formFileSm">
           </div>
           <input type="hidden" name="id_editar_tramitacao" id="id_editar_tramitacao">
           <input type="hidden" name="file_editar_tramitacao" id="file_editar_tramitacao">
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
         <input type="submit" name="btn_editar_tramitacao" class="btn btn-success" value="Editar">
         </form>
       </div>
     </div>
   </div>
 </div>

 <!-- MODAL PARA EXCLUIR TRAMITAÇÃO -->
 <div class="modal fade" id="modal-excluir-tramitacao" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="staticBackdropLabel">Excluir Tramitação</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="actions/excluir_tramitacao" method="POST">
           <h6>Tem certeza que deseja <b>Excluir</b> esta tramitação ?</h6>
           <h6>Essa ação não poderá ser desfeita ! </h6>
           <input type="hidden" name="id_excluir_tramitacao" id="id_excluir_tramitacao">
           <input type="hidden" name="file_excluir_tramitacao" id="file_excluir_tramitacao">
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
         <input type="submit" name="btn_excluir_tramitacao" class="btn btn-success" value="Excluir">
         </form>
       </div>
     </div>
   </div>
 </div>

 <!-- MODAL PARA EDITAR PROJETO DE LEI -->
 <div class="modal fade" id="modal-editar-projeto-lei" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="staticBackdropLabel">Editar Projeto de Lei</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="actions/editar_pl" method="POST" enctype="multipart/form-data">
           <div class="mb-3">
             <label class="form-label">Título:</label>
             <input type="text" name="title" id="title_editar_projeto_lei" class="form-control" placeholder="Exemplo: Requerimento - N° 003/2022...">
           </div>
           <div class="mb-3">
             <label class="form-label">Númeração:</label>
             <input type="text" name="number_projeto" id="number_editar_projeto_lei" class="form-control" placeholder="Exemplo: 003/2022...">
           </div>
           <div class="mb-3">
             <label class="form-label">Origem:</label>
             <input type="text" name="origem" id="origem_editar_projeto_lei" class="form-control" placeholder="Exemplo: Executivo...">
           </div>
           <div class="mb-3">
             <label class="form-label">Andamento:</label>
             <input type="text" name="andamento" id="andamento_editar_projeto_lei" class="form-control" placeholder="Exemplo: Tramitação ou Tramitado...">
           </div>
           <div class="mb-3">
             <label class="form-label">Relator:</label>
             <input type="text" name="relator" id="relator_editar_projeto_lei" class="form-control" placeholder="Exemplo: João da Silva...">
           </div>
           <div class="mb-3">
             <label class="form-label">Data:</label>
             <input type="date" name="date" id="date_editar_projeto_lei" class="form-control">
           </div>
           <div class="mb-3">
             <label class="form-label">Ementa:</label>
             <textarea class="form-control" name="ementa" id="ementa_editar_projeto_lei" rows="3" placeholder="Exemplo: REQUER A CHEFE DO PODER EXECUTIVO MUNICIPAL JUNTO COM A SECRETARIA COMPETENTE..."></textarea>
           </div>
           <div class="mb-3">
             <label for="formFileSm" class="form-label">Arquivo da ata ordinária <b>(PDF)</b>:</label>
             <input type="file" name="image" class="form-control form-control-sm" id="formFileSm">
           </div>
           <input type="hidden" name="id_editar_projeto_lei" id="id_editar_projeto_lei">
           <input type="hidden" name="file_editar_projeto_lei" id="file_editar_projeto_lei">
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
         <input type="submit" name="btn_editar_pl" class="btn btn-success" value="Editar">
         </form>
       </div>
     </div>
   </div>
 </div>
 
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>