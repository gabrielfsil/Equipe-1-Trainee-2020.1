 <?php

 //ROTAS PARA ATRAÇÕES//
 $router->get('atracoes', 'AtracoesController@home');
 $router->get('atracoes/adm', 'AtracoesController@atracoes_adm');
 $router->get('atracoes/criacao', 'AtracoesController@criar_atracao');
 $router->post('atracoes/criar', 'AtracoesController@store');
 $router->post('atracoes/edicao', 'AtracoesController@editar_atracao');
 $router->post('atracoes/editar', 'AtracoesController@store_edicao');
 $router->post('atracoes/visualizacao', 'AtracoesController@visualizar_atracao');

 //FIM ROTAS PARA ATRAÇÕES//
?>