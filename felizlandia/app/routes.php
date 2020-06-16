 <?php

 //ROTAS PARA ATRAÇÕES//
 $router->get('atracoes', 'AtracoesController@home');
 $router->get('admin/list-atracoes', 'AtracoesController@list');
 $router->get('admin/create-atracao', 'AtracoesController@create');
 $router->get('admin/acess-atracao', 'AtracoesController@view');
 $router->get('admin/edit-atracao', 'AtracoesController@edit');
 $router->get('admin/delete-atracao', 'AtracoesController@delete');




 $router->post('admin/create-atracao', 'AtracoesController@store');
 $router->post('admin/edit-atracao', 'AtracoesController@store_edit');
 $router->post('admin/delete-atracao', 'AtracoesController@store_delete');

 //FIM ROTAS PARA ATRAÇÕES//
?>