<?php require "app\\views\\partials\\head.php"; ?>
<body class="login">
    <div id="overlay"></div>
    <div class="container">  
            <div class="row login-top">
                <div class="col-md-auto center login-header">
                    <img class="login-logo" alt="Logotipo FelizLândia Park" src="/public/img/logo.png" onclick="window.open('index.html')"><br/>
                    <h2>Bem-vindo à Central Administrativa</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-auto center login-box">
                    <div class="alert alert-info">
                        Por favor, para acessar o sistema insira seu e-mail e senha.
                    </div>
                    <form class="form-horizontal" action="admin/home" method="get">
                        <div class="form-group input-element">
                            <span class="input-icon"><i class="fas fa-at"></i></span>
                            <input type="email" class="form-control" id="inputEmail" placeholder="E-mail">
                        </div>
                        <div class="form-group input-element">
                            <span class="input-icon"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="inputPassword" placeholder="Senha">
                        </div>
                        <div class="form-group center col-md-5">
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</body>
</html>