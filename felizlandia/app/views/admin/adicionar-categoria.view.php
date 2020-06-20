<?php require "app/views/partials/head-adm.php"; ?>
<?php require "app/views/partials/navbar-admin.php"; ?>

<div class="espaço medio"></div>

        <div class="PrincipalCategoria">
    

              
            <h1>   Criar Categoria</h1>
            <div class="Formulario-Categoria">
                <label for="Categoria">Digite o nome da Categoria:</label><br>
                <form method="POST" action = '/AddCategoria'>
                <input type="text" name="newCategoria"><br>
                
                <button type="button" class="bg-danger button-categoria" data-toggle="modal" data-target="#exampleModal">
                    Criar
                  </button>
                
                
            </div>
            <a href="/admin/list-categorias"><button type="button" class="bg-primary button-categoria ">
              < Voltar 
             </button></a>
        
        </div>

        
        <div class="espaço grande"></div>
    

       <!-- Modal -->
       <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Sua categoria foi criada com Sucesso!</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <img src="../../../public/img/correto.png" class="img-modal">
                <!--<img src="img/errado.png" class="img-modal">  Caso algum erro seja detectado-->
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Salvar alterações</button>
            </form>
                
            </div>
          </div>
        </div>
      </div>

        </form>

        <div class="espaço"></div>



<?php require "app/views/partials/footer-admin.php"; ?>