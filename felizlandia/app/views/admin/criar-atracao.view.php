<?php require "app\\views\\partials\\head.php"; ?>
<?php require "app\\views\\partials\\navbar-admin.php"; ?>
<body class="paralax-categoria" style="background-image: url(../../../public/img/bg3.jpg);background-size: cover;
background-repeat: no-repeat;
background-attachment: fixed;
background-position: center;
	margin: 0;
	padding: 0;
">


  
     
<!--CONTEÚDO PRINCIPAL-->

<div class="criar-atracao">
  <div class='container' >
    <div class="row mb-4">
            <div class="col d-flex justify-content-center">
              <h1>Criar atração</h1>
            </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center">
           <form class="col-md-6" method="POST" enctype="multipart/form-data" action = '/admin/create-atracao'  ><!--FORMULARIO-->
              <div class="form-group">
                  <label for="exampleFormControlInput1">Nome</label>
                  <input type="text" 
                  placeholder="não deve conter caracteres especiais como '*, \, /' "
                  name="nome" 
                  required="required" class="form-control" id="exampleFormControlInput1">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Descrição</label>
                <textarea class="form-control"
                 required="required" 
                 name="descricao" 
                 id="exampleFormControlTextarea1" 
                 rows="3"
                 style="white-space: nowrap;"
               ></textarea>
              </div>
              <div class="form-group">
                    <label for="exampleFormControlSelect1">Categoria</label>
                    <select class="form-control" name="categoria" id="exampleFormControlSelect1">
                     <?php foreach( $categorias as $categoria) : ?>
                      <option value ="<?= $categoria->id ?>"><?= $categoria->name ?></option>

                    <?php endforeach ;?>
                    </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Valor</label>
                <input type="number" name="valor" min="5" max="100" step="0.01" required="required" class="form-control" id="exampleFormControlInput1">
              </div>
              <div class="form-group">
                <label for="exampleFormControlFile1">Foto</label>
                <p style="font-size: 12px;color:red">Para melhor exibição escolha uma imagem com tamanho mínimo 900x640</p>

               <!-- <input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1">-->
                  <div class=" image-preview">
                        <input type="file" name="foto" required="required"  class="form-control-file" accept="image/*" onchange="loadFile(event)">
                        <img id="output"/>
                        <script>
                          var loadFile = function(event) {
                            var output = document.getElementById('output');
                            output.src = URL.createObjectURL(event.target.files[0]);
                            output.onload = function() {
                              URL.revokeObjectURL(output.src) // free memory
                            }
                          };
                        </script>                  
                  </div>
              </div>
              
              <div class="form-group d-flex justify-content-between">
                <a class="d-flex justify-content-center" href="/admin/list-atracoes"><button type="button" class="btn btn-primary">&#10094;Voltar</button></a>          

                <button type="submit"  class="btn btn-primary w-50 mt-3 mb-0">Enviar</button>

              </div>

            </form>
         

          </div><!--fecha div coluna-->
          <!--FUNCOES PRA CHAMAR MODALS-->
          <?php if($acao['nome']=="sucesso"){ ?>
                    <script>
                        $(document).ready(function(){
                            $("#modalSucesso").modal();
                        });
                    </script>
                <?php } ?>

          <?php if($acao['nome']=="erro de imagem"){ ?>
                    <script>
                        $(document).ready(function(){
                            $("#modalErro").modal();
                        });
                    </script>
         <?php } ?>
         <?php if($acao['nome']=="erro duplicata"){ ?>
                    <script>
                        $(document).ready(function(){
                            $("#modalErro").modal();
                        });
                    </script>
         <?php } ?>

                <!-- Modals -->
                <!--SUCESSO-->
           <div class="modal modal-edicao fade" id="modalSucesso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog  modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sua atração foi criada com sucesso!</h5>
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
      </div><!--fecha div row-->
  </div><!--fecha div container-->

</div>
<?php require "app\\views\\partials\\footer-admin.php"; ?>