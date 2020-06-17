 <?php

$router->get('admin/user-list', 'PagesController@listUsers');
$router->get('admin/user-acess', 'PagesController@acessUser');
$router->get('admin/user-create' ,'PagesController@createUser');
$router->get('admin/user-edit', 'PagesController@editUser');
$router->get('admin/user-change-password', 'PagesController@changeUserPassword');

$router->post('admin/user-store', 'UsersController@store');
$router->post('admin/user-delete', 'UsersController@delete');
$router->post('admin/user-store-edit', 'UsersController@storeEdit');
$router->post('admin/user-store-password', 'UsersController@storeChangePassword');

  //ROTAS PARA CAREGORIAS//
$router->get('adm/home' ,"PagesController@HomeAdm");
$router->get('adm/lista-categorias' ,"PagesController@Lcategorias");
$router->get('adm/adicionar-categoria' ,"PagesController@Acategoria");


//posts categorias
$router->post('AddCategoria', "CategoryController@store");
$router->post('view', "CategoryController@access");
$router->post('delete', "CategoryController@delete");
$router->post('GotoEdit', "CategoryController@GotoEdit"); //vai para pagina de editar
$router->post('edit', "CategoryController@edit"); //edição em si

 //FIM ROTAS PARA CAREGORIAS//

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