<?php require "app/views/partials/head.php" ;?>

<body>
<?php require "app/views/partials/navbar.php"; ?>

  <div class="atracoes-paralax1">
  <div class="espaço"></div>

    <h1 class="paginaAtual">
      Conheça nossas atrações!
    </h1>
    
    
    <div class="espaço pequeno"></div>
  
  </div>

     
<!--CONTEÚDO PRINCIPAL-->


  <div class="atracoes">

    <div class="paginaAtracoesFrase"><h1>Conheça nossas atrações</h1></div>

    <h2 id="atracoes-topo" >
      Você pode buscar por nome ou categoria

    </h2>
 
    <form method="GET" action="search">
    <div class="input-group d-flex justify-content-left mb-3">
    
      <input name="conteudo" value="<?= $_GET['conteudo'] ?>" type="text" class="form-control col-sm-6" aria-label="Input dropdown com botão dropdown segmentado" placeholder="Busque por nome da atração ou categoria">
      <div class="input-group-append">
  
      <button type="submit" class="btn btn-outline-secondary" style="background-color:#ffa100;color:white;border-style: none;">Buscar</button>
        <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-flip="false" style="background-color:#f7c063;border-style: none;color:white;"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="sr-only">Dropdown</span>
        </button>

        <div class="dropdown-menu lista-categoria" style="max-height:150px;overflow:auto;">
        <?php foreach( $categorias as $categoria) : ?>
          <button class="dropdown-item" type="submit" name="categoria" value="<?= $categoria->id ?>"><?= $categoria->name   ?></button>

                    <?php endforeach ;?>
      

          <div role="separator" class="dropdown-divider"></div>
          <p style="justify-content: center;">Categorias</p>
        </div>
      </div>
    </div>
    </form>
       
      <span class="mt-4 d-flex results justify-content-left">Mostrando <?= $num_atracoes['num'] ?> de <?=$total_rows ?> atrações </span>
      <a class="d-flex mb-3" href="#paginacao">Ir para o fim da página</a>
       
      <div class="row mt-3 justify-content-start">
          <?php foreach ($atracoes as $atracao) : ?>

              <div class="col-md-4">
                <div class="card flex-fill" style="margin-bottom: 2rem;">
                  <img class="card-img-top"  src="/public/img/atracoes-img/<?= $atracao->foto ?> "alt="Imagem de capa do card">
                  <div class="card-body" style="text-align:center;">
                    <h5 class="card-title"><?= $atracao->nome ?></h5>
                  </div>
                  <ul class="list-group list-group-flush">

                    <li class="list-group-item" style="text-align:center;"><span class="cards-cat" >Categoria:</span><p><?= $atracao->name?></p></li>

                  </ul>
                 <!-- Botão para acionar modal -->
                 <!-- Large modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#atracao<?= $atracao->id_atracao?>">
                    Ver atração
                  </button>
                 
                </div>
              </div>
              
         <?php endforeach ;?>
             
         </div>
        
         <?php require "app/views/partials/pagination.php" ;?>
    
   <!--IMPORTANDO MODELS-->
   <!-- Modals -->
  <?php foreach ($atracoes as $atracao) : ?>
    <div class="modal fade bd-example-modal-lg" id="atracao<?= $atracao->id_atracao?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TituloModalCentralizado"><?= $atracao->nome ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="centraliza-img">
            <img src="../../../public/img/atracoes-img/<?= $atracao->foto ?>"alt="Imagem de capa do card">
  
          </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><strong>Descrição:</strong>  <?= $atracao->descricao ?>
  
          </li>
          <li class="list-group-item"><strong>Categoria</strong> <?= $atracao->name?></li>
          <li class="list-group-item"><strong>Valor:</strong>
           <?php
           /*$formatter = new \NumberFormatter('pt_BR',  NumberFormatter::CURRENCY);
               echo  $formatter->formatCurrency($atracao->valor
               , 'BRL');
               
               nao tem esse comando/biblioteca?
               
               */
               echo "R$ ".$atracao->valor;
     
           ?>
           
           
           </li>
        </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach ;?>
    
   <!--END MODALS-->
    <!--FIM IMPORTAÇÃO-->

</div>
            

        
   

  
  
 

  


<?php require "app/views/partials/footer.php" ;?>
