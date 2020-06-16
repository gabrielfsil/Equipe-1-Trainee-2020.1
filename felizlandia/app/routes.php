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

?>