<?php

namespace App\Controllers;

use App\Core\App;

class PagesController
{
    public function home()
    {
        $top_atracoes =  App::get('database')->selectFromManyTables(['metodo'=> 'top', 'quantidade' =>'4'],
            ['table1' => 'atracoes',
            'table2' => 'category' ], ['nome' => 'nome',
                'descricao' => 'descricao', 
                'valor' => 'valor', 
                'foto' => 'foto', 
                'id_atracao' => 'id_atracao',
                'categoria_id' => 'categoria_id',
                'name' => 'name'], 'category.id','categoria_id'
                );
        $pagina_atual = ['nome' =>"Home" ];
        return view('site/index', [
            'pagina_atual' => $pagina_atual,
            'top_atracoes' => $top_atracoes,

        ]);


    }
    public function atracoes(){
        $categorias = App::get('database')->selectAll("category");


        $atracoes =  App::get('database')->selectFromManyTables(['metodo'=>'all'],
            ['table1' => 'atracoes',
            'table2' => 'category' ], ['nome' => 'nome',
                'descricao' => 'descricao', 
                'valor' => 'valor', 
                'foto' => 'foto', 
                'id_atracao' => 'id_atracao',
                'categoria_id' => 'categoria_id',
                'name' => 'name'], 'category.id','categoria_id'
                );
        //SELECT nome, descricao, valor, foto, categoria_id, name FROM atracoes, category WHERE category.id = categoria_id

       /*$atracoes = App::get('database')->selectAll('atracoes'); 
        $categorias =  App::get('database')->selectCombineRows(); */
        $num_atracoes = [
            "num" => count($atracoes)
        ];
        $pagina_atual = ['nome' =>"Atrações" ];
        return view('/site/atracoes',[
            'atracoes' => $atracoes,
            'categorias' => $categorias,
            'num_atracoes' => $num_atracoes,
            'pagina_atual' => $pagina_atual,
            
        ]);
    }

  

    public function listUsers()
    {
        $users = App::get('database')->selectAll('person');
        $num_users = [
            "num" => count($users)
        ];

        return view('admin/list-users', ['users' => $users, "num_users" => $num_users]); // array chave valor
    }

    public function acessUser()
    {
        $user = App::get('database')->read('person', 'id', $_POST['id']);
        return view('admin/display-user', ['user' => $user[0]]);
    }

    public function createUser(){

        return view('admin/create-user');
    }

    public function editUser()
    {
        $user = App::get('database')->read('person', 'id', $_POST['id']);
        return view('admin/edit-user', ['user' => $user[0]]);
    }

    public function changeUserPassword()
    {
        $user = App::get('database')->read('person', 'id', $_POST['id']);

        return view('admin/change-password', ['user' => $user[0]]);
    }

    /**
     * Show the home page.
     */
    public function HomeAdm()
    {
        return view('admin/adm-home');
    }

    public function Lcategorias()
    {
        $categorias = App::get('database')->selectAll("category");
        $acao = ['nome' => 'nenhuma'];

        $num_categorias = [
            "num" => count($categorias)
        ];
        return view('admin/lista-categoria',
         ['categorias' => $categorias, 'num_categorias' => $num_categorias]);
    }

    public function Acategoria(){

        return view('admin/adicionar-categoria');
    }
    
    //CONTROLLERS ATRAÇÕES// 
    

    public function atracoes_admin(){
        $atracoes = App::get('database')->selectAll('atracoes');
        $num_atracoes = [
            "num" => count($atracoes)
        ];
        return view('/admin/lista-atracoes', [
            'atracoes' => $atracoes,
             'num_atracoes' => $num_atracoes,
            ]);      
    }

    
    public function atracoes_create(){
        $acao = ['nome' => 'none'];
        $categorias = App::get('database')->selectAll('category');

        return view('/admin/criar-atracao',[
            'acao'=> $acao,
            'categorias' => $categorias,

            ]);
    }

    public function atracoes_edit(){
        $acao = [
            "nome" => "none"
        ];
        $categorias = App::get('database')->selectAll('category');
        $atracao = App::get('database')->read('atracoes','id_atracao', $_GET['id']); 
        $id = "";
        foreach ($atracao as $x){
            $id = $x->categoria_id;
        }

        if($id != NULL){
        $categoria = App::get('database')->read('category','id',$id); 
        }
        else{
            $categoria = "sem categoria";
        }
        return view('/admin/editar-atracao', [
            'atracao_edit' => $atracao,
            'acao' => $acao,
            'categorias' => $categorias,
            'categoria_atual' => $categoria,

            ]); 
    }
    public function atracoes_view(){
        $atracao = App::get('database')->read('atracoes','id_atracao', $_GET['id']);  
        $id = "";
        foreach ($atracao as $x){
            $id = $x->categoria_id;
        }
        if($id != NULL){
            $categoria = App::get('database')->read('category','id',$id); 
            }
            else{
                $categoria = "sem categoria";
            }
        return view('/admin/visualizar-atracao', [
            'atracao_visualizar' => $atracao,
            'categoria_visualizar' => $categoria,

            ]);
    }
    public function atracoes_delete(){
        $atracao = App::get('database')->read('atracoes','id_atracao', $_GET['id']);  
        $id = "";
        foreach ($atracao as $x){
            $id = $x->categoria_id;
        }
        if($id != NULL){
            $categoria = App::get('database')->read('category','id',$id); 
            }
            else{
                $categoria = "sem categoria";
            }        return view('/admin/apagar-atracao', [
            'atracao_exclusao' => $atracao,
            'categoria_apagar' => $categoria,

            ]); 
    }
    //FIM CONTROLLERS ATRAÇÕES//

}
