<?php require "app/views/partials/head-adm.php"; ?>
<?php require "app/views/partials/navbar-admin.php"; ?>


          <div class="PrincipalCategoria">
      

                
              <h1>Editar Categoria</h1>
            
              <div class="Formulario-Categoria">
                  <form method="POST" action = 'edit'>
                  <label for="Categoria">O nome atual de sua categoria é: <?= $results->name ?></label><br>
                  <input type="text" id="Categoria" name="edit" value="<?= $results->name ?>"><br>
                  
                  <button type="button" class="bg-primary button-categoria" data-toggle="modal" data-target="#exampleModal">
                      Editar
                    </button>
                  
                  
              </div>
              <a href="/admin/list-categorias"> <button type="button" class="bg-primary button-categoria ">
              &#10094;Voltar 
                  </button></a>
          </div>
          <div class="espaço grande"></div>
      

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sua categoria foi editada com Sucesso!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <img src="/public/img/correto.png" class="img-modal">
                  <!--<img src="img/errado.png" class="img-modal">  Caso algum erro seja detectado-->
              </div>
              <div class="modal-footer">
                  <input type="hidden"  value="<?=$results->id ?>" name="ID">
                  <button type="submit" class="btn btn-primary">Salvar alterações</button>
              </div>
            </div>
          </div>
          </div>

          </form>
 
          <div class="espaço"></div>







<?php require "app/views/partials/footer-admin.php"; ?>