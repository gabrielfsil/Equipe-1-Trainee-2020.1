<?php require('app/views/partials/head.php'); ?>
<?php require('app/views/partials/navbar-admin.php'); ?>


<div class= "user-list pb-2">
  <div class="container takeoff-scroll">
    <!--COLUNA ONDE LISTAMOS Atracoes--> 
    <!--home ou ja listagem-->
    <a href="view-adm-home.html"><button type="button" class="btn btn-primary">&#10094;Voltar</button></a>
    <p><h1>Usuários</h1> </p> 
    <ul class="list-group lista-box">
      <?php foreach ($users as $user) : ?>
        <li class="list-group-item ">
          <div class="row justify-content-between">
            <p><?= $user->name; ?></p>
            <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Opções
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <form method="POST" action="user-acess">
                <input type="hidden" name="id" value="<?= $user->id ?>">         
                <button class="dropdown-item" type="submit">Visualizar</button>
              </form> 
              <form method="POST" action="user-edit">        
                <input type="hidden" name="id" value="<?=$user->id?>">         
                <button class="dropdown-item" type="submit">Editar</button>
              </form>
              <!--<form method="POST" action="">-->
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#exampleModal">Remover</a>
              <!--</form>-->
                <!--<a class="dropdown-item" href="" data-toggle="modal" data-target="#exampleModal">Remover</a>-->
            </div>
          </div>
        </li> 
      <?php endforeach; ?>
    </ul>

    <div class="listar-button mt-2">
      <a href="user-create"> <button class="btn btn-primary button-listar">Adicionar Usuário +</button></a>
      </div>
  
                
  </div>
</div>


<?php require('app/views/partials/modal-delete-user.php'); ?>
<?php require('app/views/partials/footer-admin.php'); ?>
