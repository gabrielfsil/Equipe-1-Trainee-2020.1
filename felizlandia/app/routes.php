 <?php

$router->get('admin/list-user', 'UsersController@list');
$router->get('admin/acess-user', 'UsersController@acess');
$router->get('admin/delete-user', 'UsersController@delete');
$router->post('admin/create-user', 'UsersController@create');
$router->post('admin/edit-user', 'UsersController@edit');
$router->post('admin/change-pwd-user', 'UsersController@changePassword');

?> 