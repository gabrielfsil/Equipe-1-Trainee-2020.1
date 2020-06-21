<?php require "app/views/partials/head.php"; ?>


<body class="login">


<div id="overlay"></div>
    <div class="container">  
        <div class="row login-top">
            <div class="col-md-auto center login-header">
                <img class="login-logo" alt="Logotipo FelizLândia Park" src="/public/img/logo.png" onclick="window.open('/')"><br/>
                <h2>Bem-vindo à Central Administrativa</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-auto center login-box">
                <div class="alert alert-danger">
                    <p>Por favor, para acessar o sistema administrativo você precisa estar logado.</p>
                    <p>Clique no botão abaixo para ser redirecionado para a página de login.</p>
                </div>
                <div class="form-group center col-md-5">
                    <a href="login"><button type="submit" class="btn btn-primary">Login</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>