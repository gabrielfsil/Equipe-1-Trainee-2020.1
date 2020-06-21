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
                <div class="alert alert-info">
                    Por favor, para acessar o sistema insira seu e-mail e senha.
                </div>
                <form class="form-horizontal" method="POST" action="login-access">
                    <div class="form-group input-element">
                        <span class="input-icon"><i class="fas fa-at"></i></span>
                        <input name="email" type="email" class="form-control" id="inputEmail" placeholder="E-mail" required>
                    </div>
                    <div class="form-group input-element">
                        <span class="input-icon"><i class="fas fa-lock"></i></span>
                        <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Senha" required>
                    </div>
                    <div class="form-group center col-md-5">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </form>
            </div>
            <script>
                var act = "<?php echo $act; ?>";
                if(typeof act !== 'undefined' && act)
                    $(document).ready(function(){$("#modal-password").modal();});
            </script>
        </div>
    </div>
</div>



 <!-- icones fontawesome -->
 <script src="https://kit.fontawesome.com/8a90f3aa8c.js" crossorigin="anonymous"></script>
 
 <?php if(isset($act)) require('app/views/partials/modal-password.php'); ?>
</body>
</html>