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

  <!--icon para aparecer na aba do navegador-->
  <link rel="icon" href="img/favicon.ico" type="image/x-icon"/>

  <!-- modifica a fonte do site -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet"> -->

</head>
<body>

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
      <span class="TogglerPaginaAtual">Contato</span>
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
     
  <!-- Página -->
  <div id="content" class="content">

    <div class="paralax1">
       <h1 class="paginaAtual">Contato</h1>
    </div>
    
    <div class="contact">

      <div class="text-contact text-bold">
        <p>Entre em contato conosco, ficaremos felizes em lhe atender.</p>
        <p>E venha nos conhecer, temos toda a diversão de que você precisa!</p>
      </div>

      <div class="row-contact row ml-2 mr-2">
        <div class="col-sm-6 my-3">
          <div class="card px-3 py-3 cards-contact">
            <div>
              <p>Envie suas dúvidas, comentários e sugestões para nossa equipe.</p>
              <p>Conte conosco para ter uma diversão cheia de adrenalina!</p>
            </div>
            <form>
              <div class="form-group">
                <label for="inputName">Nome</label>
                <input type="text" class="form-control" id="inputName" placeholder="Informe seu nome">
              </div>
              <div class="form-group">
                <label for="inputEmail">Endereço de e-mail</label>
                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Digite seu e-mail">
                <small id="emailHelp" class="form-text text-muted">Não compartilhamos seu e-mail com ninguém.</small>
              </div>
              <div class="form-group">
                <label for="inputSubject">Assunto</label>
                <input type="text" class="form-control" id="inputSubject" placeholder="Digite o assunto do contato">
              </div>
              <div class="form-group">
                <label for="textMessage">Mensagem</label>
                <textarea class="form-control" id="textMessage" rows="3" placeholder="Escreva aqui o que quer nos dizer"></textarea>
              </div>
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label" for="gridCheck">
                    Envie-me uma cópia deste e-maiil
                  </label>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
          </div>
        </div>
        <div class="col-sm-6 my-3">
          <div class="card px-3 py-3 cards-contact">
            <a target="_blank" href="https://www.google.com/maps/dir/-18.7403631,-44.9132725/Pra%C3%A7a+do+Santu%C3%A1rio,+Felixl%C3%A2ndia+-+MG,+35794-000/@-18.7494791,-44.912314,15z/data=!4m9!4m8!1m0!1m5!1m1!1s0xa806e2f0b62321:0xf718d2d6a8928e58!2m2!1d-44.8992619!2d-18.7569585!3e0"><img class="card-img-top" src="img/felixlandia-map.png" alt="Mapa da Praça do Santuario ao Felizlândia Park"></a>
            <div class="card-body">
              <div class="card-text">
              <p>Venha nos conhecer. Nos encontramos na cidade de Felixlândia, 
                cidade do interior, bem no meio do coração de Minas Gerais. Como ponto de referência
                ao chegar na cidade, procure pela <span class="text-bold">Praça do Santuário</span>,
                após isso, siga a Av. Tancredo Neves, até a <span class="text-bold">Ical Energética</span>,
                antes de passar por ela pegue a direita e siga em frente até o Glorioso 
                <span class="text-bold">Felixlândia Park</span>.</p>
                <p>Acesse o mapa acima para conhecer melhor o caminho.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>



  

</body>
</html>