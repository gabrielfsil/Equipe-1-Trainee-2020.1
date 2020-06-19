<?php require "app/views/partials/head.php"; ?>

<?php require "app/views/partials/navbar-admin.php"; ?>

<body class="paralax-categoria" style="background-image: url(../../../public/img/bg3.jpg);background-size: cover;
background-repeat: no-repeat;
background-attachment: fixed;
background-position: center;
	margin: 150px 0 0 0;
	padding: 0;">


     
<!--CONTEÚDO PRINCIPAL-->


<div class= "listar-atracoes  pb-2">
    <div class="container ">
            <!--COLUNA ONDE LISTAMOS Atracoes--> 
            <a href="/admin/home"><button type="button" class="btn btn-primary">&#10094;Voltar</button></a>

            <p><h1>Foram encontradas <?= $num_atracoes['num'] ?>  atrações</h1> </p> 
      <ul 
      <?php if($num_atracoes['num']>1)
      echo 'class="list-group lista-box" style="overflow:auto;"'; 
      else echo 'class="list-group"';
      ?>
      >

      <?php foreach ($atracoes as $atracao) : ?>

        <li class="list-group-item ">
          <div class="row justify-content-between">
                <p><?= $atracao->nome; ?></p>
                <button class="btn btn-danger dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Opções
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/admin/acess-atracao?id=<?=$atracao->id_atracao?>">Visualizar</a>
                <a class="dropdown-item" href="/admin/edit-atracao?id=<?=$atracao->id_atracao?>">Editar</a>
                <a class="dropdown-item" href="/admin/delete-atracao?id=<?=$atracao->id_atracao?>">Apagar</a>

                <!--ALTERNATIVO
                  <form method="POST" action="/atracoes/visualizacao">
                <input type="hidden" name="id" value="">         

                <button class="dropdown-item" type="submit">Visualizar</button>

                </form>  -->
                

               
               
                </div>
            </div>
        </li> 
          <?php endforeach; ?>
        
      </ul>

      <div class="listar-button mt-2">
        <a href="/admin/create-atracao"> <button class="btn btn-danger button-listar">Adicionar +</button></a>
       </div>
       
    
                  
    </div>
    
</div>
<div class="espaço"></div>

<?php require "app/views/partials/footer-admin.php"; ?>

 