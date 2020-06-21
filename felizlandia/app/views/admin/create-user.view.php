<?php require('app/views/partials/head-adm.php'); ?>

<?php require('app/views/partials/navbar-admin.php'); ?>

<div class="adm-users"> <!-- body class="adm-users" -->


<div class="container-admin-user">
  <div class='container' >
    <div class="row mb-4">
            <div class="col d-flex justify-content-center">
              <h1>Criar Usuário</h1>
            </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center">
           <form class="col-md-8" method="POST" action='/admin/user-store'><!--FORMULARIO-->
              <div class="form-group">
                  <label for="exampleFormControlInput1">Nome</label>
                  <input name="userName" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Amendobobo de Oliveira" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">E-mail</label>
                <input name="userEmail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="fulanito@mail.com" required>
                <small id="emailHelp" class="form-text text-muted">O e-mail precisa ser válido, para confirmação.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Digite a sua senha</label>
                <input name="userPassword" type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Repita a senha</label>
                <input name="userPasswordRepeat" type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" required>
              </div>  
              <div class="form-group d-flex justify-content-between">
                <a class="d-flex justify-content-center" href="user-list"><button type="button" class="btn btn-primary">&#10094;Voltar</button></a>          
                <!--<a class="d-flex justify-content-center" href="" class="w-50 mt-3 mb-0" data-toggle="modal" data-target="#exampleModal">
                <a type="submit" data-toggle="modal" data-target="#exampleModal">-->
                <button type="submit" class="btn btn-primary">Criar Usuário</button>
                <!--</a>-->
              </div>
            </form>
          </div><!--fecha div coluna-->
      </div><!--fecha div row-->
  </div><!--fecha div container-->

</div>

<script>
    var act = "<?php echo $act; ?>";
    if(typeof act !== 'undefined' && act)
      $(document).ready(function(){$("#modal").modal();});
</script>

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
          
<?php require('app/views/partials/footer-admin.php'); ?>
