<?php require('app/views/partials/head.php'); ?>

<?php require('app/views/partials/navbar-admin.php'); ?>

<body class="paralax-categoria">
<div class="container container-admin-user" >   
    <div class="row mb-4">
      <div class="col d-flex justify-content-center">
        <h1>Visualizar Usuário</h1>
      </div>
    </div>
    <div class="row">

        <div class="col d-flex justify-content-center">
          <form class="col-md-8" method="POST">

            <fieldset disabled>
              <div class="form-group">
                <label for="exampleFormControlInput1">Nome</label>
                <input type="text" name="name" value="<?= $user->name ?>" class="form-control" id="exampleFormControlInput1">
              </div>
              <div class="form-group mb-4">
                <label for="exampleFormControlInput1">Email</label>
                <input type="email" name="email" value="<?= $user->email ?>" class="form-control" id="exampleFormControlInput1">
              </div>       
            </fieldset>

            <div class="form-inline">
              <div class="form-inline">
                <div class="form-group d-flex justify-content-between my-1 mr-2">       
                    <input type="hidden" name="id" value="<?= $user->id ?>">
                    <!--<a class="d-flex justify-content-center" href="user-edit">-->
                    <button type="submit" formaction="/admin/user-edit" class="btn btn-info">&#10094;Editar Usuário</button><!--</a>-->
                </div>
                <div class="form-group d-flex justify-content-between my-1 mr-2">
                  <!-- <a class="d-flex justify-content-center" href="user-change-password">-->
                  <button type="submit" formaction="/admin/user-change-password" class="btn btn-warning">&#10094;Modificar Senha</button><!--</a>-->
                </div>
              </div> 
              <div class="form-inline">
                <div class="form-group d-flex justify-content-between my-1 mr-2">
                  <a class="d-flex justify-content-center" href="" data-toggle="modal" data-target="#exampleModal<?=$user->id?>"><button type="button" class="btn btn-danger">&#10094;Excluir Usuário</button></a>
                </div>
              
                <div class="form-group d-flex justify-content-between my-1">
                  <a class="d-flex justify-content-center" href="user-list"><button type="button" class="btn btn-primary">&#10094;Voltar</button></a>
                </div>
              </div>
            </div>
          </form>



        </div><!--fecha div coluna-->
    </div>
</div>
          
<?php require('app/views/partials/modal-delete-user.php'); ?>
<?php require('app/views/partials/footer-admin.php'); ?>
