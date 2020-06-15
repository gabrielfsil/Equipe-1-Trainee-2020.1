<?php require('app/views/partials/head.php'); ?>

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
           <form class="col-md-8" method="POST" action = '#'><!--FORMULARIO-->
              <fieldset disabled>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nome</label>
                    <input type="text" name="nome" class="form-control" id="exampleFormControlInput1" placeholder="Amendobobo de Oliveira">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">E-mail</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="fulanito@mail.com">
              </div>
            </fieldset>
            <div class="form-group">
              <label for="exampleInputPassword1">Digite a sua senha antiga</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Digite a sua nova senha</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Repita a nova senha</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
            </div>
            <div class="form-group d-flex justify-content-between">
              <a class="d-flex justify-content-center" href="display-user"><button type="button" class="btn btn-primary">&#10094;Voltar</button></a>          
              <a class="d-flex justify-content-center" href="" data-toggle="modal" data-target="#exampleModal"><button type="submit" onclick="this.form.reset()" class="btn btn-primary">Confirmar</button></a>

            </div>

            </form>

          </div><!--fecha div coluna-->
      </div><!--fecha div row-->
  </div><!--fecha div container-->

</div>


<form action="view-user.html">
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Senha modificada com suecesso.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img src="img/password.png" class="img-modal">
            <!--<img src="img/errado.png" class="img-modal">  Caso algum erro seja detectado-->
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-info" type="submit" value="delete" name="delete">Ok</button>
        </div>
      </div>
    </div>

  </div>            
</form>
            
<?php require('app/views/partials/footer-admin.php'); ?>
