 <?php
$router->get('adm/home' ,"PagesController@HomeAdm");
$router->get('adm/lista-categorias' ,"PagesController@Lcategorias");
$router->get('adm/adicionar-categoria' ,"PagesController@Acategoria");


//posts categorias
$router->post('AddCategoria', "CategoryController@store");
$router->post('view', "CategoryController@access");
$router->post('delete', "CategoryController@delete");
$router->post('GotoEdit', "CategoryController@GotoEdit"); //vai para pagina de editar
$router->post('edit', "CategoryController@edit"); //edição em si


?>