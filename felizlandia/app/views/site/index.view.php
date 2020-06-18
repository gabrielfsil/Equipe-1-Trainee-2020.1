<?php require "app\\views\\partials\\head.php"; ?>
<body>

<?php require "app\\views\\partials\\navbar.php"; ?>

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
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="public/img/gif.gif" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="public/img/carousel2.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
             </div>
            </div>
            <div class="carousel-item">
            <img src="public/img/carousel3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            </div>
            </div>
          </div>

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
          Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
           accusantium doloremque laudantium, totam rem aperiam, eaque <br>
           ipsa quae ab illo inventore veritatis et quasi architecto beatae 
           vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas <br>
          </p>

    </div>

    <div class="espaço"></div>
    
    
</div>
<div class="paralax3">
<div class="rodape">Veja nossas atrações!</div>


<div class="Cartoes">
  <div class="card-columns">

    <div class="card bg-info text-white">
       <img src="public/img/bg4.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <blockquote class="blockquote mb-0">
          <h5 class="card-title blue">Card 2</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.<br> <a href="#" class="cardlink blue">Leia mais...</a></p>
          <footer class="blockquote-footer text-white">
            <small>
              Someone famous in <cite title="Source Title">Source Title</cite>
            </small>
          </footer>
        </blockquote>
      </div>
    </div>



    <div class="card">
      <img src="public/img/bg2.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <blockquote class="blockquote mb-0">
          <h5 class="card-title">Card 2</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.<br> <a href="#" class="cardlink">Leia mais...</a></p>
          <footer class="blockquote-footer text-white">
            <small>
              Someone famous in <cite title="Source Title">Source Title</cite>
            </small>
          </footer>
        </blockquote>
      </div>
    </div>

    <div class="card bg-warning text-white">
      <img src="public/img/bg4.jpg" class="card-img-top" alt="...">
     <div class="card-body">
       <blockquote class="blockquote mb-0">
         <h5 class="card-title">Card 2</h5>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.<br> <a href="#" class="cardlink">Leia mais...</a></p>
         <footer class="blockquote-footer text-white">
           <small>
             Someone famous in <cite title="Source Title">Source Title</cite>
           </small>
         </footer>
       </blockquote>
     </div>
 
    </div>
    </div>

  </div>

  <div class="espaço"></div>

<div class="texto2">
  <p>
  <h1>Saiba onde nos encontrar!</h1>
  <img src="public/img/mapa.png">
  Ut enim ad minima veniam, quis nostrum exercitationem 
  ullam corporis suscipit laboriosam, nisi ut aliquid consequatur? <br>
  Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil 
  </p>
</div>

<div class="espaço"></div>
</div>

<?php require "app\\views\\partials\\footer.php"; ?>