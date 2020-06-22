<?php

namespace App\Controllers;
use App\Core\App;

class CategoryController{

    public function store(){


        App::get('database')->insert('category', ['name' => $_POST['newCategoria']]);

         return redirect('admin/list-categorias');
    }

    public function access(){
        $categoria = App::get('database')->read('category', 'id', $_POST['view']);

        $pagina_atual = ['nome' =>"Categorias" ];

        $results = $categoria[0];

        return view('admin/visualizar-categoria', ['results' => $results, 'pagina_atual'=> $pagina_atual]);

    }

    public function delete(){


        App::get('database')->delete('category', 'id', $_POST['delete']);

        return redirect('admin/list-categorias');


    }

    public function GotoEdit(){

        $categoria = App::get('database')->read('category', 'id', $_POST['GotoEdit']);

        $results = $categoria[0];

        return view('admin/edita-categoria', ['results' => $results]);


    }

    public function edit(){
        

        App::get('database')->edit('category', [ 'name' => $_POST['edit'] ], 'id' , $_POST['ID']); /* modificar para edit dps*/

        return redirect('admin/list-categorias');
    }

}