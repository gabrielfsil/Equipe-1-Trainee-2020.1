<?php require('app/views/partials/head-adm.php'); ?>

<?php require('app/views/partials/navbar-admin.php'); ?>

<div class="adm-users"> <!-- body class="adm-users" -->


<div class="container-admin-user">
  <div class='container' >
    <div class="row mb-4">
            <div class="col d-flex justify-content-center">
              <h1>Modificar Senha</h1>
            </div>
    </div>
    <div class="row">
      <div class="col d-flex justify-content-center">
        <form class="col-md-8" method="POST" action = '/admin/user-store-password'><!--FORMULARIO-->
          <input type="hidden" name="id" value="<?= $user->id ?>">
          <fieldset disabled>
            <div class="form-group">
              <label for="exampleFormControlInput1">Nome</label>
              <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="<?= $user->name ?>">
            </div>
            <div class="form-group">
            <label for="exampleFormControlInput1">E-mail</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user->email ?>">
            </div>
          </fieldset>
          <div class="form-group">
            <label for="exampleInputPassword1">Digite a sua senha antiga</label>
            <input name="oldPassword" type="password" class="form-control" placeholder="Senha Antiga" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Digite a sua nova senha</label>
            <input name="newPassword" type="password" class="form-control" placeholder="Senha Nova" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Repita a nova senha</label>
            <input name="newPasswordRepeat" type="password" class="form-control" placeholder="Senha Nova" required>
          </div>
          <div class="form-group d-flex justify-content-between">
            <a class="d-flex justify-content-center" href="user-list"><button type="button" class="btn btn-primary">&#10094;Voltar</button></a>          
            <button type="submit" class="btn btn-primary">Confirmar</button>
          </div>

        </form>

      </div><!--fecha div coluna-->
        
      <!-- Script que chama modal-->
      <script>
        var act = "<?php echo $act; ?>";
        console.log(act);
        if(typeof act !== 'undefined' && act)
          $(document).ready(function(){$("#modal-password").modal();});
      </script>
      
    </div><!--fecha div row-->
  </div><!--fecha div container-->
</div>


<?php require('app/views/partials/modal-password.php'); ?>
<?php require('app/views/partials/footer-admin.php'); ?>
