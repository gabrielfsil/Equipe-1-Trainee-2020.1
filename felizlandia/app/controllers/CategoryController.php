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

       
        $results = $categoria[0];

        return view('admin/visualizar-categoria', ['results' => $results]);

    }

    public function delete(){

        $categorias = App::get('database')->selectAll("category");
        $num_categorias = [
            "num" => count($categorias)
        ];
      
        $erro = "";
        $erro = $erro . App::get('database')->checkExistence('atracoes',[
            'campo' =>'categoria_id',
            'conteudo'=> $_POST['delete'] ,
            'none' => 'chave só pra preencher parametro não será usada pois não precisamos de id'
        ], 'none');        


        if($erro!=""){
            $acao = [
                'nome' => 'categoria em uso',
                'mensagem' => 'Essa categoria está em uso, delete ou edite as atrações que a usam antes de apagar'
            ];
            return view('admin/lista-categoria',
            ['categorias' => $categorias, 'num_categorias' => $num_categorias, 'acao' => $acao],);
   
        }
        App::get('database')->delete('category', 'id', $_POST['delete']);
        $acao = ['nome' => 'nenhuma'];

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