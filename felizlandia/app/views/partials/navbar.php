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

      <a class="navbar-brand mx-auto" href="#"><img src="/public/img/logo.png" class="logo"></a>
      <span class="TogglerPaginaAtual"><?= $pagina_atual['nome']?></span>
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