<?php require('app/views/partials/head.php'); ?>

<?php require('app/views/partials/navbar-admin.php'); ?>
<body class="paralax-categoria">
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
        <form class="col-md-8" method="POST" action='/admin/user-store-edit'>
          <input type="hidden" name="id" value="<?= $user->id ?>">
          <div class="form-group">
            <label for="exampleFormControlInput1">Nome</label>
            <input name="name" type="text" value="<?= $user->name ?>" class="form-control" id="exampleFormControlInput1">
          </div>
          <div class="form-group">
              <label for="exampleFormControlInput1">E-mail</label>
              <input name="email" type="email" value="<?= $user->email ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <small id="emailHelp"  class="form-text text-muted">O e-mail precisa ser válido, para confirmação.</small>
          </div>
          
          <div class="form-inline">
            <div class="form-group d-flex justify-content-between my-1">
              <a class="d-flex justify-content-center mr-2" type="submit" ><button type="submit" formaction="/admin/user-change-password" class="btn btn-warning">&#10094;Modificar Senha</button></a>
            </div>
            <!--<a class="d-flex justify-content-center mr-2" href="" data-toggle="modal" data-target="#exampleModal">-->
            <button type="submit" class="btn btn-primary">Atualizar Usuário</button><!--</a>-->
          </div>
          <div class="form-group d-flex justify-content-between my-1">
            <a class="d-flex justify-content-center" href="user-list"><button type="button" class="btn btn-primary">&#10094;Voltar</button></a>
          </div>
        </form>
      </div><!--fecha div coluna-->          
    </div><!--fecha div row-->
  </div><!--fecha div container-->

  <?php if(isset($act) && $act!='undefined'){ ?>
                    <script>
                        $(document).ready(function(){
                            $("#modal").modal();
                        });
                    </script>
         <?php } ?>

<!--MODAL-->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?= $act['message'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <img src="<?= $act['error'] ? '/public/img/password-error.png' : '/public/img/user.png'; ?>" class="img-modal">
      </div>
      <div class="modal-footer">
          <?= $act['error'] ? '<a>' : '<a href="user-list">' ?>
            <button type="submit" <?php if($act['error']) echo 'data-dismiss="modal" aria-label="Close"' ?> class="btn btn-info" name="id" value="">Ok</button>
          </a>
      </div>
    </div>
  </div>
</div>  
                  
</div><!--fecha conatiner admin user-->


<?php require('app/views/partials/footer-admin.php'); ?>
