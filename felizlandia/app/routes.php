 <?php

 //ROTAS PARA ATRAÇÕES//
 $router->get('atracoes', 'PagesController@atracoes');
 $router->get('admin/list-atracoes', 'PagesController@atracoes_admin');
 $router->get('admin/create-atracao', 'PagesController@atracoes_create');
 $router->get('admin/acess-atracao', 'PagesController@atracoes_view');
 $router->get('admin/edit-atracao', 'PagesController@atracoes_edit');
 $router->get('admin/delete-atracao', 'PagesController@atracoes_delete');




 $router->post('admin/create-atracao', 'AtracoesController@store');
 $router->post('admin/edit-atracao', 'AtracoesController@store_edit');
 $router->post('admin/delete-atracao', 'AtracoesController@store_delete');

 //FIM ROTAS PARA ATRAÇÕES//
?>