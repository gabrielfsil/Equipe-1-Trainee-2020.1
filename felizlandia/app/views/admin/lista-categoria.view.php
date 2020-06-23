<?php require "app/views/partials/head.php"; ?>
<?php require "app/views/partials/navbar-admin.php"; ?>
<body class="paralax-categoria">

<div class= "listar-categoria listas-gerais pb-4">
    <div class="container">
            <!--COLUNA ONDE LISTAMOS Categorias--> 
      <a href="/admin/home"><button type="button" class="btn btn-primary">&#10094;Voltar</button></a>

      <p><h1>Foram encontradas <?= $num_categorias['num'] ?>  categorias</h1> </p> 
      <ul  <?php if($num_categorias['num']>1)
      echo 'class="list-group lista-box" style="overflow:auto;"'; 
      else echo 'class="list-group"';
      ?>>


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
    <a href="/admin/create-categoria"><button class="btn btn-primary button-listar">Adicionar +</button></a>
  </div>


<?php require "app/views/partials/pagination-admin.php"; ?>
</div>
      


  
  


<div class="espaço"></div>







<?php require "app/views/partials/footer-admin.php"; ?>


