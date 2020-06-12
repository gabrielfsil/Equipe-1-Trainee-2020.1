<?php require('app/views/partials/head.php'); ?>

<?php require('app/views/partials/navbar-admin.php'); ?>

<div class="adm-users">

<div class= "user-list pb-2">
    <div class="container takeoff-scroll">
      <!--COLUNA ONDE LISTAMOS Atracoes--> 
      <!--home ou ja listagem-->
      <a href="view-adm-home.html"><button type="button" class="btn btn-primary">&#10094;Voltar</button></a>
      <p><h1>Usuários</h1> </p> 
      <ul class="list-group lista-box">
        <li class="list-group-item ">
          <div class="row justify-content-between">
                <p>Manoel Ferreira Lage</p>
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Opções
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="view-user.html">Visualizar</a>
                  <a class="dropdown-item" href="edit-user.html">Editar</a> 
                  <a class="dropdown-item" href="" data-toggle="modal" data-target="#exampleModal">Remover</a>
                </div>
            </div>
        </li> 
        <li class="list-group-item ">
          <div class="row justify-content-between">
                <p>Julia Aparecida Gonçalves</p>
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Opções
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="view-user.html">Visualizar</a>
                  <a class="dropdown-item" href="edit-user.html">Editar</a> 
                  <a class="dropdown-item" href="" data-toggle="modal" data-target="#exampleModal">Remover</a>
                </div>
            </div>
        </li> 
        <li class="list-group-item ">
          <div class="row justify-content-between">
                <p>Alberto Consagrado de Maria</p>
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Opções
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="view-user.html">Visualizar</a>
                  <a class="dropdown-item" href="edit-user.html">Editar</a> 
                  <a class="dropdown-item" href="" data-toggle="modal" data-target="#exampleModal">Remover</a>
                </div>
            </div>
        </li> 

        <li class="list-group-item ">
          <div class="row justify-content-between">
                <p>Olamira Jacinta Cunha</p>
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Opções
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="view-user.html">Visualizar</a>
                  <a class="dropdown-item" href="edit-user.html">Editar</a> 
                  <a class="dropdown-item" href="" data-toggle="modal" data-target="#exampleModal">Remover</a>
                </div>
            </div>
        </li> 

        <li class="list-group-item ">
          <div class="row justify-content-between">
                <p>Roberta Guilherminda Julemira da Costa</p>
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Opções
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="view-user.html">Visualizar</a>
                  <a class="dropdown-item" href="edit-user.html">Editar</a> 
                  <a class="dropdown-item" href="" data-toggle="modal" data-target="#exampleModal">Remover</a>
                </div>
            </div>
        </li> 
        <li class="list-group-item ">
          <div class="row justify-content-between">
                <p>Júlio Gasparmin Júnio Oliveira</p>
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Opções
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="view-user.html">Visualizar</a>
                  <a class="dropdown-item" href="edit-user.html">Editar</a> 
                  <a class="dropdown-item" href="" data-toggle="modal" data-target="#exampleModal">Remover</a>
                </div>
            </div>
        </li> 
        <li class="list-group-item ">
          <div class="row justify-content-between">
                <p>Antônio Cézar Costa</p>
                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Opções
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="view-user.html">Visualizar</a>
                  <a class="dropdown-item" href="edit-user.html">Editar</a> 
                  <a class="dropdown-item" href="" data-toggle="modal" data-target="#exampleModal">Remover</a>
                </div>
            </div>
        </li> 
      </ul>

      <div class="listar-button mt-2">
        <a href="create-user.html"> <button class="btn btn-primary button-listar">Adicionar Usuário +</button></a>
       </div>
       
    
                  
    </div>
</div>
  

<?php require('app/views/partials/modal-delete-user.php'); ?>
 
</div>
 

<?php require('app/views/partials/footer-admin.php'); ?>
