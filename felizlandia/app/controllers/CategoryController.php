<?php

namespace App\Controllers;
use App\Core\App;

class CategoryController{

    public function store(){


        App::get('database')->insert('categorias', ['categoria' => $_POST['newCategoria']]);

         return redirect('adm/lista-categorias');
    }

    public function access(){
        $categoria = App::get('database')->readCategoria('categorias', $_POST['view']);

       
        $results = $categoria[0];

        return viewAdm('visualizar-categoria', ['results' => $results]);

    }

    public function delete(){

        App::get('database')->deleteCategoria('categorias', $_POST['delete']);

        return redirect('adm/lista-categorias');


    }

    public function GotoEdit(){

        $categoria = App::get('database')->readCategoria('categorias', $_POST['GotoEdit']);

        $results = $categoria[0];

        return viewAdm('edita-categoria', ['results' => $results]);


    }

    public function edit(){

        App::get('database')->editCategoria('categorias', $_POST['edit'], $_POST['ID']);

        return redirect('adm/lista-categorias');
    }

}