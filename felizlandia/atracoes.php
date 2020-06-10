<!doctype html>
<html lang="pt-br">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <title>FelizLândia</title>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <script type="text/javascript" src="js/script.js"></script>

  <!--icon para aparecer na aba do navegador, podemos trocar a imagem por uma maior-->
  <link rel="icon" href="img/favicon.ico" type="image/x-icon"/>

  <!-- modifica a fonte do site -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet"> -->

</head><!--"background-color:  rgb(241, 173, 173);"-->
<body>


  <div class="atracoes-paralax1">
  <br><br><br><br>
   <br><br><br>
   <br><br><br>

    <h1 class="pl-5 paginaAtual">
      Conheça nossas atrações!
    </h1>
    
    
   <br><br><br>
   <br><br><br>
  
  </div>


  <nav id="navbar" class="navbar navbar-expand-md navbar-dark fundofalso sticky" > <!-- bg-transparent-->
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
      <ul class="navbar-nav mr-auto ">
            <li class="nav-item active">
                <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="quem-somos.html">Quem somos</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="atracoes.html">Atrações</a>
            </li>
      </ul>
    </div>
    <div class="mx-auto order-0">

      <a class="navbar-brand mx-auto" href="#"><img src="img/logo.png" class="logo"></a>
      <span class="TogglerPaginaAtual">Atrações</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
          
          <span class="navbar-toggler-icon"></span>
          
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="contato.html">Contato</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="login.html">Login</a>
        </li>
      </ul>
    </div>
  </nav>
     
<!--CONTEÚDO PRINCIPAL-->


    <!--IMPORTANDO MODELS-->
    <?php
      require 'modals-visualizar-atracao.php';
    ?>
    <!--FIM IMPORTAÇÃO-->
  <div class="atracoes">

    <div class="paginaAtracoesFrase"><h1>Conheça nossas atrações</h1></div>

    <h2 id="atracoes-topo" >
      Você pode buscar por nome ou categoria

    </h2>
 
    
    <div class="input-group d-flex justify-content-left mb-3">
      <input type="text" class="form-control col-sm-6" aria-label="Input dropdown com botão dropdown segmentado">
      <div class="input-group-append">
  
      <button type="button" class="btn btn-outline-secondary" style="background-color:#ffa100;color:white;border-style: none;">Buscar</button>
        <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" style="background-color:#f7c063;border-style: none;color:white;"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="sr-only">Dropdown</span>
        </button>

        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Show</a>
          <a class="dropdown-item" href="#">Infantil</a>
          <a class="dropdown-item" href="#">Aventura</a>
          <a class="dropdown-item" href="#">Família</a>
          <a class="dropdown-item" href="#">Radical</a>

          <div role="separator" class="dropdown-divider"></div>
          <p style="justify-content: center;">Categorias</p>
        </div>
      </div>
    </div>
       
      <span class="mt-4 d-flex results justify-content-left">Foram encontradas X atrações </span>
      <a class="d-flex mb-3" href="#paginacao">Ir para o fim da página</a>
       
      <div class="row mt-3 justify-content-between">
             
            <div class="col-md-6 d-flex sm-ml-4">
                <div class="card flex-fill" style="margin-bottom: 2rem;">
                  <img class="card-img-top" src="img/atracoes-img/atracoes-card1.jpg"alt="Imagem de capa do card">
                  <div class="card-body">
                    <h5 class="card-title">Felizândia Mount</h5>
                    <p class="card-text">A segunda montanha russa mais alta do parque, com 32m de altura conta com 5 loopings e chega
                      a quase 100km/h.</p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span class="cards-cat">Categoria:</span> Radical</li>
                  </ul>
                 <!-- Botão para acionar modal -->
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#atracao1"><!--nome da atracao pode ser composto com php-->
                    Ver atração
                  </button>
                  <!--<div class="card-body">
                    <a href="#" class="card-link">Veja detalhes sobre a atração</a>
                  </div>-->
                </div>
              </div>
              <div class="col-md-6 d-flex sm-ml-4">
                <div class="card flex-fill" style="margin-bottom: 2rem;">
                  <img class="card-img-top" src="img/atracoes-img/atracoes-card2.jpg" alt="Imagem de capa do card">
                  <div class="card-body">
                    <h5 class="card-title">Barco Viking</h5>
                    <p class="card-text">Esta atração simula um barco em alto mar, podendo chegar a 10 metros
                      com movimentos velozes de um lado para o outro
                    </p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span class="cards-cat">Categoria: </span> Radical</li>
                  </ul>
                   <!-- Botão para acionar modal -->
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#atracao2"><!--nome da atracao pode ser composto com php-->
                    Ver atração
                  </button>
                </div>
              </div>
              <div class="col-md-6 d-flex sm-ml-4">
                <div class="card flex-fill" style="margin-bottom: 2rem;">
                  <img class="card-img-top" src="img/atracoes-img/atracoes-card3.jpg"alt="Imagem de capa do card">
                  <div class="card-body">
                    <h5 class="card-title">Carrossel</h5>
                    <p class="card-text">Diversão suave e relaxante para as crianças, elas podem ouvir diferentes
                      musicas enquanto usam o brinquedo
                    </p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span class="cards-cat">Categoria: </span> Infantil</li>
                  </ul>
                   <!-- Botão para acionar modal -->
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#atracao3"><!--nome da atracao pode ser composto com php-->
                    Ver atração
                  </button>
                </div>
              </div>
              <div class="col-md-6 d-flex sm-ml-4">
                <div class="card flex-fill" style="margin-bottom: 2rem;">
                  <img class="card-img-top" src="img/atracoes-img/atracoes-card4.jpg"alt="Imagem de capa do card">
                  <div class="card-body">
                    <h5 class="card-title">Laser Tag</h5>
                    <p class="card-text">Um jogo de esconde esconde mais divertido para aproveitar com os amigos
                      e treinar sua mira com as armas de laser.
                    </p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span class="cards-cat">Categoria: </span>Aventura</li>
                  </ul>
                  <!-- Botão para acionar modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#atracao4"><!--nome da atracao pode ser composto com php-->
                    Ver atração
                  </button>
                </div>
              </div>
              <div class="col-md-6 d-flex sm-ml-4">
                <div class="card flex-fill" style="margin-bottom: 2rem;">
                  <img class="card-img-top" src="img//atracoes-img/atracoes-card5.jpg"alt="Imagem de capa do card">
                  <div class="card-body">
                    <h5 class="card-title">Show de Mágica</h5>
                    <p class="card-text">Temos apresenttações com os melhores
                      mágicos da cidade com diversos números para todos os públicos.
                    </p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span class="cards-cat">Categoria: </span>Show</li>
                  </ul>
                   <!-- Botão para acionar modal -->
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#atracao5"><!--nome da atracao pode ser composto com php-->
                    Ver atração
                  </button>
                </div>
              </div>
              <div class="col-md-6 d-flex sm-ml-4">
                <div class="card flex-fill" style="margin-bottom: 2rem;">
                  <img class="card-img-top" src="img/atracoes-img/atracoes-card6.jpg"alt="Imagem de capa do card">
                  <div class="card-body">
                    <h5 class="card-title">Kamikaze</h5>
                    <p class="card-text">Para sentir frio na barriga como nunca antes é o brinquedo mais
                      recomendado, funciona como um pêndulo, mas diferente do Barco Viking ele dá voltas de 
                      360º deixando você de cabeça para baixo por alguns segundos.
                    </p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span class="cards-cat">Categoria: </span>Radical</li>
                  </ul>
                   <!-- Botão para acionar modal -->
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#atracao6"><!--nome da atracao pode ser composto com php-->
                    Ver atração
                  </button>
                </div>
              </div>
              
             
         </div>
        
      <nav aria-label="Páginas de resultado de pesquisa de atrações" id="paginacao">
        <ul class="pagination" style="justify-content: center;">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Anterior">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Anterior</span>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Próximo">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Próximo</span>
            </a>
          </li>
          <li class="ml-1 pt-2"><a href="#atracoes-topo">Voltar ao topo</a></li>
        </ul>
      </nav>


</div>
            



<div class="RedesSociais">
  <div class="subRS">Gostou? <br>Recomende-nos!</div>

  <div class="subRS">
    Entre em contato! <br>

    <a><img  class="icone" src="img\insta.png"></a>
    <a><img  class="icone" src="img\facebook.png"></a>
    <a><img  class="icone" src="img\twitter.png"></a>
    <a><img  class="icone" src="img\youtube.png"></a>
    <a><img  class="icone" src="img\whats.png"></a>
    
 
 
 
 
 
</div>
  <div class="subRS">Visite nossa página!<br> <a>PaginamtLegalSite.com.br</a></div>



</div>
          
  
<div class="informaçoes">
  <div class="d-flex justify-content-center" style="padding: 0;">
    <div class="coluna">
      <ul>
        <li><h1>Tickets & Add-Ons</h1></li> 
        <li>Tickets</li>
        <li>Ingressos</li>
        <li>Descontos</li>
        <li>Promoções</li>
      </ul>
   
      <ul>
        <li><h1>Segurança</h1></li> 
        <li>Equipamentos</li>
        <li>Idade</li>
        <li>Regras</li>
        <li>Proibições</li>
        <li>Equipamentos</li>
        <li>Idade</li>
        <li>Regras</li>
        <li>Proibições</li>
      </ul>
   
      <ul>
        <li><h1>Segurança</h1></li> 
        <li>Equipamentos</li>
        <li>Idade</li>
        <li>Regras</li>
        <li>Proibições</li>
        <li>Equipamentos</li>
        <li>Idade</li>
        <li>Regras</li>
        <li>Proibições</li>
      </ul>
    
    </div>
   
   <div class="coluna">
    <ul>
      <li><h1>O parque</h1></li> 
      <li>Equipamentos</li>
      <li>Idade</li>
      <li>Idade</li>
    </ul>
    <ul>
      <li><h1>Tickets & Add-Ons</h1></li> 
      <li>Tickets</li>
      <li>Ingressos</li>
      <li>Descontos</li>
      <li>Promoções</li>
      <li>Equipamentos</li>
      <li>Idade</li>
      <li>Regras</li>
      <li>Proibições</li>
      <li>Equipamentos</li>
      <li>Idade</li>
      <li>Regras</li>
      <li>Proibições</li>
    </ul>
   
    <ul>
      <li><h1>Segurança</h1></li> 
      <li>Equipamentos</li>
      <li>Idade</li>
      <li>Regras</li>
      <li>Proibições</li>
      <li>Idade</li>
      <li>Regras</li>
      <li>Proibições</li>
    </ul>
   </div>
   
   <div class="coluna">
    <ul>
      <li><h1>O parque</h1></li> 
      <li>Equipamentos</li>
      <li>Idade</li>
      <li>Idade</li>
    </ul>
   
    <ul>
      <li><h1>Segurança</h1></li> 
      <li>Equipamentos</li>
      <li>Idade</li>
      <li>Regras</li>
      <li>Proibições</li>
      <li>Idade</li>
      <li>Regras</li>
      <li>Proibições</li>
    </ul>
   </div>
   
   
   <div class="coluna">
    <ul>
      <li><h1>O parque</h1></li> 
      <li>Equipamentos</li>
      <li>Idade</li>
      <li>Idade</li>
    </ul>
   
    <ul>
      <li><h1>Segurança</h1></li> 
      <li>Equipamentos</li>
      <li>Regras</li>
      <li>Proibições</li>
    </ul>
   
    
    <ul>
      <li><h1>Segurança</h1></li> 
      <li>Equipamentos</li>
      <li>Regras</li>
      <li>Proibições</li>
      <li>Regras</li>
      <li>Proibições</li>
    </ul>
   </div>
   
  </div>
 
  <div class="barratecnica">
 
    <img src="img\mappointer.png">
 
    <span class="more-info">2349 Rua Josezinho das nuvens, 203 | (36) 2534-2300 | parquemtlegal@email.com.br <br>
    Copyright © 2020-2020 Felizlândia mt Todos direitos reservados <br>
     <a href="#">Trabalhos</a> |  <a href="#">Politica</a> |  <a href="#">P&R</a> |  <a href="#">Contato</a> | 
      <a href="#">Serviços</a> 
    </span>
 
  </div>
 
  <br><br><br><br>
  <br><br><br><br>
 </div>   
            
      
  



 

  





</body>
</html>