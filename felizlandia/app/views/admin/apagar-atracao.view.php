<?php require "app\\views\\partials\\head.php"; ?>
<?php require "app\\views\\partials\\navbar-admin.php"; ?>

<body class="paralax-categoria" style="background-image: url(../../../public/img/bg3.jpg);background-size: cover;
background-repeat: no-repeat;
background-attachment: fixed;
background-position: center;
	margin: 0;
	padding: 0;
">

<!--PARALAX
<div class="atracoes-paralax1">
     <br><br><br>
     <br><br>
    
    </div>
  

FIM PARALAX-->

  
<!--CONTEÚDO PRINCIPAL-->

<div class="apagar-atracao">
  <div class="container" >
    <div class="row mb-4">
            <div class="col d-flex justify-content-center">
              <h1>Apagar atração</h1>
            </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center">
           <form class="col-md-6" >
               <?php foreach ($atracao_exclusao as $atracao) : ?>
                <fieldset disabled>

              <div class="form-group">
                <label for="exampleFormControlInput1">Nome</label>
                <input type="text" name="nome" value="<?= $atracao->nome ?>" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Descrição</label>
              <textarea class="form-control" name="descricao" id="exampleFormControlTextarea1" rows="3"><?= $atracao->descricao ?></textarea>
            </div>
            <div class="form-group">
                  <label for="exampleFormControlSelect1">Categoria</label>
                  <select class="form-control" name="categoria" id="exampleFormControlSelect1">
                  <?php if($categoria_apagar!= "sem categoria") :?>
                    <?php foreach( $categoria_apagar as $categoria) : ?>
                      <option><?= $categoria->name ?></option>
                    <?php endforeach ;?>  
                  <?php else : ?>   
                    <option><?= $categoria_apagar ?></option>
                  <?php endif ;?>           
                  </select>
            </div>
            <p style="font-size: 12px;color:red">Atrações sem categoria não aparecem na página pública</p>

            <div class="form-group">
              <label for="exampleFormControlInput1">Valor</label>
              <input type="text" name="valor" value="<?= $atracao->valor ?>"  class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1" >Foto</label>
              <div class="imagem-db">
              <img 
                src="../../../public/img/atracoes-img/<?= $atracao->foto ?>" 
                />              </div>
             
            </div>    
            </fieldset>

            <?php endforeach ;?>

              <div class="form-group d-flex justify-content-between">
                <a class="d-flex justify-content-center" href="/admin/list-atracoes"><button type="button" class="btn btn-primary">&#10094;Voltar</button></a>          


                <button class="btn btn-danger" type="button" id="dropdownMenuButton"data-toggle="modal" data-target="#exampleModal">
                  Apagar
                  </button>
           <!--colocar confirmação-->
           
            </div>
            
            </form>

          </div><!--fecha div coluna-->
       </div>
  </div>

</div>
            
<?php require "app\\views\\partials\\footer-admin.php"; ?>
     
          
         <!--MODAL-->
             
  <form method="POST" action="/admin/delete-atracao">
  <div class="modal modal-exclusao fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo apagar essa atração?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <img src="../../../public/img/lixeira.png" class="img-modal">
              <!--<img src="img/errado.png" class="img-modal">  Caso algum erro seja detectado-->
          </div>
          <div class="modal-footer">
          <input type="hidden" name="id" value=<?= $atracao->id_atracao ?> >
          <input type="hidden" name="foto_antiga" value="<?= $atracao->foto ?>"/>



              <button type="submit" class="btn btn-danger" value ="delete" name="delete">Apagar</button>
          </div>
        </div>
      </div>
    </form>
            
