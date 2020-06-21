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
                    Por favor, para acessar o sistema administrativo você precisa estar logado.
                    Clique no botão abaixo para ser redirecionado para a página de login.
                </div>
                <form class="form-horizontal" method="GET" action="login">
                    <div class="form-group center col-md-5">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



 <!-- icones fontawesome -->
 <script src="https://kit.fontawesome.com/8a90f3aa8c.js" crossorigin="anonymous"></script>
 
 <?php require('app/views/partials/modal-password.php'); ?>
</body>
</html>