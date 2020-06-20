<nav id="navbar" class="navbar navbar-expand-md navbar-dark fundofalso sticky" > <!-- bg-transparent-->
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
      <ul class="navbar-nav mr-auto ">
            <li class="nav-item active">
                <a class="nav-link" href="/admin/home">Home Administrativa</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/admin/list-atracoes">Atrações</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/admin/list-categorias">Categorias</a>
            </li>
      </ul>
    </div>
    <div class="mx-auto order-0">
      <a class="navbar-brand mx-auto" href="#"><img src="/public/img/logo.png" class="logo"></a>
      <span class="TogglerPaginaAtual"><?= $pagina_atual['nome']?></span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
          <span class="navbar-toggler-icon" onclick="opaco()"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/admin/user-list">Usuários</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/">Logout</a>
        </li>
      </ul>
    </div>
</nav>