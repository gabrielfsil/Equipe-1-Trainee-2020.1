<?php require "app\\views\\partials\\head-adm.php"; ?>
<?php require "app\\views\\partials\\navbar-admin.php"; ?>


<div class= "listar-categoria  pb-4">
    <div class="container">
            <!--COLUNA ONDE LISTAMOS Categorias--> 
      <h1>Foram encontradas X Categorias</h1> 
      <ul class="list-group lista-box">


      <?php foreach ($categorias as $x) : ?>

        <?php $meuID = $x->id?>

      <li class="list-group-item ">
          <div class="row justify-content-between">
                <p><?= $x->name?></p>
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Opções
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  
                <form method="POST" action = '/view' class="dropdown-item">
                  <input name="view" type="hidden" value="<?= $meuID ?>">
                  <button  class="dropdown-item" type='submit'>Visualizar</button>
                </form>

                <form method="POST" action = '/GotoEdit' class="dropdown-item">
                  <input name="GotoEdit" type="hidden" value="<?= $meuID ?>">
                  <button  class="dropdown-item" type='submit'>Editar</button>
                </form>


                

                <div class="dropdown-item">
                <button class="dropdown-item"  data-toggle="modal" data-target="#exampleModal<?= $meuID ?>">Apagar</button>      
                </div>

                </div>
            </div>
        </li>
  <div class="modal fade" id="exampleModal<?= $meuID ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo apagar essa categoria?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img src="../../../public/img/lixeira.png" class="img-modal">
            <!--<img src="img/errado.png" class="img-modal">  Caso algum erro seja detectado-->
        </div>
        <div class="modal-footer">
                <form method="POST" action = '/delete'>
                  <input name="delete" type="hidden" value="<?= $meuID ?>">
                  <button type="submit" class="btn btn-danger ">apagar</button>
                </form>
        </div>
      </div>
    </div>
</div>

<?php endforeach; ?>
        </div>
      </div>
    </div>
      </div>

       

      </ul>

      
                  
    </div>
</div>


    <div class="container">
    <div class="container listar-button">
    <a href="/admin/create-categoria"><button class="btn btn-danger button-listar">Adicionar +</button></a>
    </div>

    <div class="container listar-pagination">
        <nav class="pagination-listar ">
           <ul class="pagination">
            <li class="page-item disabled">
               <a class="page-link text-dark" href="#" tabindex="-1" aria-disabled="true"> << </a>
            </li>
            <li class="page-item active"><a class="page-link text-dark" href="#">1</a></li>
             <li class="page-item" aria-current="page">
               <a class="page-link text-dark" href="#">2</a>
            </li>
             <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
             <li class="page-item">
               <a class="page-link text-dark" href="#">>></a>
             </li>
           </ul>
        </nav>
  
    </div>   
    <a href="/admin/home"><button type="submit" class="btn btn-primary voltar-button"> < Voltar</button></a>
  </div>      
      

  
  
  
  


<div class="espaço"></div>







<?php require "app\\views\\partials\\footer-admin.php"; ?>


