<?php require "app/views/partials/head.php"; ?>
<?php require "app/views/partials/navbar-admin.php"; ?>
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

<div class="visualizar-atracao">
  <div class="container" >
    
    <div class="row mb-4">
      <div class="col d-flex justify-content-center">
        <h1>Visualizar atração</h1>
      </div>
</div>
    <div class="row">

        <div class="col d-flex justify-content-center">
           <form class="col-md-6">

            <fieldset disabled>
               <?php foreach ($atracao_visualizar as $atracao) : ?>
 
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
                  <?php foreach( $categoria_visualizar as $categoria) : ?>
                      <option><?= $categoria->name ?></option>
                    <?php endforeach ;?>                  
                    </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Valor</label>
              <input type="text" name="valor" value="<?= $atracao->valor ?>"  class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1" >Foto</label>
              <div class="imagem-db">
                <img src="../../../public/img/atracoes-img/<?= $atracao->foto ?>"  />
              </div>
             
            </div>      
            <?php endforeach ;?>

              </fieldset>
              <div class="form-group d-flex justify-content-between">
                <a class="d-flex justify-content-center" href="/admin/list-atracoes"><button type="button" class="btn btn-primary">&#10094;Voltar</button></a>          
  
              </div> 
            </form>

          </div><!--fecha div coluna-->
       </div>
  </div>

</div>
            
          
          
<?php require "app/views/partials/footer-admin.php"; ?>