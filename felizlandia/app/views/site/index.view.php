<?php require "app/views/partials/head.php" ;?>

<body>

<?php require "app/views/partials/navbar.php"; ?>

  <div class="paralax1">
    
  
    <div class="espaço"></div>

    <div class="paginaAtual">
      Home
    </div>

    <div class="espaço grande"></div>

  </div>

  <div class="paralax2">
    
    

    <div class="texto">
      <div class="menu">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <?php $cont = 0; ?>
            <?php foreach ($ultimas_atracoes as $atracao) : ?>
            <?php if($cont==0) : ?>
              <li data-target="#carouselExampleCaptions" data-slide-to="<?=$cont ?>" class="active"></li>
            <?php else :?>
              <li data-target="#carouselExampleCaptions" data-slide-to="<?=$cont ?>"></li>
            <?php endif ?>
            <?php $cont++; ?>
            <?php endforeach ?>
          </ol>
          <div class="carousel-inner">
            <?php $cont =0 ;?>
            <?php foreach ($ultimas_atracoes as $atracao) : ?>
              <?php 
                if($cont==0){
                  echo '<div class="carousel-item active">';

              }else{
                echo '<div class="carousel-item">';
              }
              $cont++;
              ?>
              <img src="/public/img/atracoes-img/<?= $atracao->foto?>" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5></h5>
                <p><?= $atracao->nome?></p>
             </div>
            </div>
            <?php endforeach ;?>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
         </a>

          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="sr-only">Next</span>
         </a>

        </div>
      </div>

      

        <p>
          <h1>Crazy Fun!</h1>
            Veja as atrações em alta de nosso parque, 
            Com preços acessíveis e diversão garantida!<br>
           Você poderá aproveitar desde aventuras radicais a inesquecíveis momentos para toda a família! <br>
           
          </p>

    </div>

    <div class="espaço"></div>
    
    
</div>
<div class="paralax3">
<div class="rodape" style="font-weight:bold;">Veja nossas <a href="/atracoes" style="color:orange;text-decoration:none;">atrações</a>!</div>
<div class="Cartoes">
  <div class="card-columns atracoes" style="background-color:transparent;margin-top:0;">
    <?php foreach ($mais_atracoes as $atracao) : ?>
      <div class="card bg-white text-black">
       <img src="/public/img/atracoes-img/<?= $atracao->foto?>" class="card-img-top" alt="...">
      <div class="card-body">
        <blockquote class="blockquote mb-0">
          <p><h5 class="card-title blue"><?= $atracao->nome ?></h5></p>
        
        </blockquote>
      </div>
    </div>
    <?php endforeach ; ?>
  </div>
</div>


  <div class="espaço"></div>

<div class="texto2">
  <p>
  <h1>Saiba onde nos encontrar!</h1>
  <img src="/public/img/mapa.png">
  Se perdeu? Está em dúvida de como transitar pelo parque? <br>
  Veja nosso mapa detalhado
  que está localizados em todos os portões de entrada e em nossa área principal.  <br>
  Para mais informações sobre nossa localização veja nossa página de contato! <br>
  
  </p>
</div>

<div class="espaço"></div>
</div>

<?php require "app/views/partials/footer.php"; ?>
