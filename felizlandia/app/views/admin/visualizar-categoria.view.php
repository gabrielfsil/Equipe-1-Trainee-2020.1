<?php require "app/views/partials/head-adm.php"; ?>
<?php require "app/views/partials/navbar-admin.php"; ?>



        <div class="PrincipalCategoria">
    

              
            <h1>Visualizar Categoria</h1>
            <div class="Formulario-Categoria">
                <form>
                <label for="Categoria">Sua Categoria: </label><br>
                <input type="text" id="Categoria" name="Categoria" value="<?= $results->name ?>" disabled><br>
                
                <a href="/admin/list-categorias"> <button type="button" class="bg-primary button-categoria ">
                &#10094;Voltar 
                  </button></a>
                
                
            </div>
         
        </div>
        </form>

        <div class="espaço"></div>


<?php require "app/views/partials/footer-admin.php"; ?>