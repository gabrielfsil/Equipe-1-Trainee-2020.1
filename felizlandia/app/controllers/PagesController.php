<?php

namespace App\Controllers;

use App\Core\App;

class PagesController
{
    public function home()
    {
        $ultimas_atracoes =  App::get('database')->selectFromManyTables(
            ['metodo'=> 'last', 'quantidade' =>'3',  'orderbyfield' => 'id_atracao',
        'direction' => 'desc'],
            ['table1' => 'atracoes',
            'table2' => 'category' ], ['nome' => 'nome',
                'descricao' => 'descricao', 
                'valor' => 'valor', 
                'foto' => 'foto', 
                'id_atracao' => 'id_atracao',
                'categoria_id' => 'categoria_id',
                'name' => 'name',
            ], 'category.id','categoria_id'
                );

            $mais_atracoes =  App::get('database')->selectFromManyTables(
                    ['metodo'=> 'last', 'quantidade' =>' 3',  'orderbyfield' => 'id_atracao',
                'direction' => 'asc'],
                    ['table1' => 'atracoes',
                    'table2' => 'category' ], ['nome' => 'nome',
                        'descricao' => 'descricao', 
                        'valor' => 'valor', 
                        'foto' => 'foto', 
                        'id_atracao' => 'id_atracao',
                        'categoria_id' => 'categoria_id',
                        'name' => 'name',
                    ], 'category.id','categoria_id'
                        );
        

               
        $pagina_atual = ['nome' =>"Home" ];
        return view('site/index', [
            'pagina_atual' => $pagina_atual,
            'ultimas_atracoes' => $ultimas_atracoes,
            'mais_atracoes' => $mais_atracoes,

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

  
    public function contato(){
        return view('/site/contato');
    }

    public function quemsomos(){
        return view('/site/quem-somos');

    }
    public function listUsers()
    {
        $users = App::get('database')->selectAll('person');
        $num_users = [
            "num" => count($users)
        ];
        $pagina_atual = ['nome' =>"Usuários" ];

        return view('admin/list-users', ['users' => $users, "num_users" => $num_users, 'pagina_atual' => $pagina_atual,
        ]); // array chave valor
    }

    public function acessUser()
    {
        $pagina_atual = ['nome' =>"Usuários" ];
        $user = App::get('database')->read('person', 'id', $_POST['id']);
        return view('admin/display-user', ['user' => $user[0], 'pagina_atual' => $pagina_atual]);
    }

    public function createUser(){

        $pagina_atual = ['nome' =>"Usuários" ];
        return view('admin/create-user',[ 'pagina_atual' => $pagina_atual]);
    }

    public function editUser()
    {
        $pagina_atual = ['nome' =>"Usuários" ];
        $user = App::get('database')->read('person', 'id', $_POST['id']);
        return view('admin/edit-user', ['user' => $user[0],  'pagina_atual' => $pagina_atual]);
    }

    public function changeUserPassword()
    {
        $pagina_atual = ['nome' =>"Usuários" ];
        $user = App::get('database')->read('person', 'id', $_POST['id']);
        return view('admin/change-password', ['user' => $user[0], 'pagina_atual' => $pagina_atual]);
    }

    /**
     * Show the home page.
     */
    public function HomeAdm()
    {
        $pagina_atual = ['nome' =>"Home" ];

        return view('admin/adm-home',['pagina_atual' => $pagina_atual]
    );
    }

    public function Lcategorias()
    {
        $categorias = App::get('database')->selectAll("category");
        $acao = ['nome' => 'nenhuma'];
        $pagina_atual = ['nome' =>"Categorias" ];

        $num_categorias = [
            "num" => count($categorias)
        ];
        return view('admin/lista-categoria',
         ['categorias' => $categorias, 'num_categorias' => $num_categorias,
         'pagina_atual' => $pagina_atual]
        );
    }

    public function Acategoria(){
        $pagina_atual = ['nome' =>"Categorias" ];

        return view('admin/adicionar-categoria',[ 'pagina_atual' => $pagina_atual]);
    }
    
    //CONTROLLERS ATRAÇÕES// 
    

    public function atracoes_admin(){
        $atracoes = App::get('database')->selectAll('atracoes');
        $pagina_atual = ['nome' =>"Atrações" ];

        $num_atracoes = [
            "num" => count($atracoes)
        ];
        return view('/admin/lista-atracoes', [
            'atracoes' => $atracoes,
             'num_atracoes' => $num_atracoes,
             'pagina_atual' => $pagina_atual,
            ]);      
    }

    
    public function atracoes_create(){
        $acao = ['nome' => 'none'];
        $categorias = App::get('database')->selectAll('category');
        $pagina_atual = ['nome' =>"Atrações" ];

        return view('/admin/criar-atracao',[
            'acao'=> $acao,
            'categorias' => $categorias,
            'pagina_atual' => $pagina_atual

            ]);
    }

    public function atracoes_edit(){
        $acao = [
            "nome" => "none"
        ];
        $categorias = App::get('database')->selectAll('category');
        $pagina_atual = ['nome' =>"Atrações" ];

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
            'pagina_atual' => $pagina_atual

            ]); 
    }
    public function atracoes_view(){
        $pagina_atual = ['nome' =>"Atrações" ];
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
            'pagina_atual' => $pagina_atual

            ]);
    }
    public function atracoes_delete(){
        $pagina_atual = ['nome' =>"Atrações" ];

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
            'pagina_atual' => $pagina_atual

            ]); 
    }
    //FIM CONTROLLERS ATRAÇÕES//

}
