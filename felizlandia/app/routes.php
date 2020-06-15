 <?php

$router->get('admin/user-list', 'UsersController@list');
$router->get('admin/user-create' ,'UsersController@create');
$router->post('admin/user-store', 'UsersController@store');
$router->post('admin/user-acess', 'UsersController@acess');
$router->post('admin/user-delete', 'UsersController@delete');
$router->post('admin/user-edit', 'UsersController@edit');
$router->post('admin/user-store-edit', 'UsersController@storeEdit');
$router->post('admin/user-change-password', 'UsersController@changePassword');
$router->post('admin/user-store-password', 'UsersController@storeChangePassword');

?> 