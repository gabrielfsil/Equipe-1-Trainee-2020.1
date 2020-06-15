<?php require('app/views/partials/head.php'); ?>

<?php require('app/views/partials/navbar-admin.php'); ?>

<div class="adm-users"> <!-- body class="adm-users" -->


<div class="container-admin-user">
  <div class='container' >
    <div class="row mb-4">
            <div class="col d-flex justify-content-center">
              <h1>Editar Usuário</h1>
            </div>
    </div>
    <div class="row">
      <div class="col d-flex justify-content-center">
        <form class="col-md-8" method="POST" action = '#'>
          <div class="form-group">
            <label for="exampleFormControlInput1">Nome</label>
            <input type="text" value="<?= $user->name ?>" class="form-control" id="exampleFormControlInput1">
          </div>
          <div class="form-group">
              <label for="exampleFormControlInput1">E-mail</label>
              <input type="email" value="<?= $user->email ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <small id="emailHelp"  class="form-text text-muted">O e-mail precisa ser válido, para confirmação.</small>
          </div>
          
          <div class="form-inline">
            <div class="form-group d-flex justify-content-between my-1">
              <a class="d-flex justify-content-center mr-2" href="user-change-password"><button type="button" class="btn btn-warning">&#10094;Modificar Senha</button></a>
              <a class="d-flex justify-content-center mr-2" href="" data-toggle="modal" data-target="#exampleModal"><button type="submit" class="btn btn-primary">Atualizar Usuário</button></a>
            </div>
          </div>
          <div class="form-group d-flex justify-content-between my-1">
            <a class="d-flex justify-content-center" href="user-list  "><button type="button" class="btn btn-primary">&#10094;Voltar</button></a>              
          </div>
        </form>
      </div><!--fecha div coluna-->
    </div><!--fecha div row-->
  </div><!--fecha div container-->

</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Usuário atualizado com suecesso.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <img src="/public/img/user.png" class="img-modal">
          <!--<img src="img/errado.png" class="img-modal">  Caso algum erro seja detectado-->
      </div>
      <div class="modal-footer">
        <form method="POST" action="user-acess">
          <input type="hidden" name="id" value="<?= $user->id ?>">
          <button type="submit" class="btn btn-info" type="submit" value="delete" name="delete">Ok</button>
        </form>
      </div>
    </div>
  </div>

</div>            
            
<?php require('app/views/partials/footer-admin.php'); ?>
