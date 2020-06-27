<?php require"app/views/partials/head.php" ;?>

<body>

<?php require"app/views/partials/navbar.php" ;?>

     
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
            <form method="POST" action="/send-message"> 
              <div class="form-group">
                <label for="inputName">Nome</label>
                <input type="text" class="form-control" id="inputName" name="nome" placeholder="Informe seu nome">
              </div>
              <div class="form-group">
                <label for="inputEmail">Endereço de e-mail</label>
                <input type="email" class="form-control" id="inputEmail" name="email" aria-describedby="emailHelp" placeholder="Digite seu e-mail">
                <small id="emailHelp" class="form-text text-muted">Não compartilhamos seu e-mail com ninguém.</small>
              </div>
              <div class="form-group">
                <label for="inputSubject">Assunto</label>
                <input type="text" class="form-control" id="inputSubject" name="assunto" placeholder="Digite o assunto do contato">
              </div>
              <div class="form-group">
                <label for="textMessage">Mensagem</label>
                <textarea class="form-control" id="textMessage" name="mensagem" rows="3" placeholder="Escreva aqui o que quer nos dizer"></textarea>
              </div>
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck" name="sendCopy" value='1'>
                  <label class="form-check-label" for="gridCheck"><!--CHECAR AQUI DEPOIS-->
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
            <a target="_blank" href="https://www.google.com/maps/dir/-18.7403631,-44.9132725/Pra%C3%A7a+do+Santu%C3%A1rio,+Felixl%C3%A2ndia+-+MG,+35794-000/@-18.7494791,-44.912314,15z/data=!4m9!4m8!1m0!1m5!1m1!1s0xa806e2f0b62321:0xf718d2d6a8928e58!2m2!1d-44.8992619!2d-18.7569585!3e0"><img class="card-img-top" src="../../../public/img//felixlandia-map.png" alt="Mapa da Praça do Santuario ao Felizlândia Park"></a>
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
    <div class="espaço pequeno"></div>
  </div>
  <?php if($acao['nome']=="sucesso"){ ?>
                    <script>
                        $(document).ready(function(){
                            $("#modalSucesso").modal();
                        });
                    </script>
                <?php } ?>
                <?php if($acao['nome']=="erro de envio"){ ?>
                    <script>
                        $(document).ready(function(){
                            $("#modalErro").modal();
                        });
                    </script>
                <?php } ?>
                <!-- Modal -->
              <div class="modal modal-edicao fade" id="modalSucesso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><?= $acao['mensagem'] ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <img src="../../../public/img/correto.png" class="img-modal">
                        <!--<img src="img/errado.png" class="img-modal">  Caso algum erro seja detectado-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary">Voltar</button>
                    </div>
                  </div>
                </div>
            </div>
            <!-- ERRO -->
            <div class="modal modal-edicao fade" id="modalErro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog  modal-dialog-centered">
                          <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                  <?= $acao['mensagem'] ?>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                  <img src="../../../public/img/errado.png" class="img-modal">
                                  <!--<img src="img/errado.png" class="img-modal">  Caso algum erro seja detectado-->
                              </div>
                              <div class="modal-footer">
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary">Voltar</button>
                              </div>
                          </div>
                    </div>
              </div>


  
  <?php require "app/views/partials/footer.php"; ?>