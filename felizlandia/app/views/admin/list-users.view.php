<?php require('app/views/partials/head-adm.php'); ?>
<?php require('app/views/partials/navbar-admin.php'); ?>

 

<div class= "user-list pb-2 listas-gerais">
  <div class="container takeoff-scroll">
    <a href="/admin/home"><button type="button" class="btn btn-primary">&#10094;Voltar</button></a>
    <p><h1> Mostrando <?= $num_users['num'] ?> de <?= $total_rows ?> usuários </h1> </p> 
    <ul 
    <?php if($num_users['num']>1)
      echo 'class="list-group lista-box" style="overflow:auto;"'; 
      else echo 'class="list-group"';
      ?>
    >
      <?php foreach ($users as $user) : ?>
        <li class="list-group-item ">
          <div class="row justify-content-between">
            <p class="texto-lista"><?= $user->name; ?></p>
            <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Opções
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <form method="POST" action="user-acess">
                <input type="hidden" name="id" value="<?= $user->id ?>">      
                <button class="dropdown-item" type="submit">Visualizar</button>
              </form>
              <form method="POST" action="user-edit">
                <input type="hidden" name="id" value="<?= $user->id ?>">
                <button class="dropdown-item" type="submit">Editar</button>
              </form>
              
              <!-- gambs para resolver como passar o id do user para o modal -->
              <button class="dropdown-item" type="submit" data-toggle="modal" data-target="#exampleModal<?=$user->id?>">Remover</button>

            </div>
          </div>
        </li>
        <?php require('app/views/partials/modal-delete-user.php'); ?>
      <?php endforeach; ?>
    </ul>


<div class="container">
    <div class="container listar-button">
    <a href="user-create"><button class="btn btn-primary button-listar">Adicionar +</button></a>
  </div>

      <?php require "app/views/partials/pagination-admin.php"; ?>
  
</div>                
  </div>
</div>

<?php require('app/views/partials/footer-admin.php'); ?>
