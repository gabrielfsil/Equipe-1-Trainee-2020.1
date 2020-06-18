<?php

namespace App\Controllers;

use App\Core\App;

class PagesController
{
    public function listUsers()
    {
        $users = App::get('database')->selectAll('person');

        return view('admin/list-users', ['users' => $users]); // array chave valor
    }

    public function acessUser()
    {
        $user = App::get('database')->read('person', $_POST['id']);
        return view('admin/display-user', ['user' => $user[0]]);
    }

    public function createUser(){

        return view('admin/create-user');
    }

    public function editUser()
    {
        $user = App::get('database')->read('person', $_POST['id']);
        return view('admin/edit-user', ['user' => $user[0]]);
    }

    public function changeUserPassword()
    {
        $user = App::get('database')->read('person', $_POST['id']);

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
        return view('admin/lista-categoria', ['categorias' => $categorias]);
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
        $atracao = App::get('database')->read('atracoes', $_GET['id']); 
        $id = "";
        foreach ($atracao as $x){
            $id = $x->categoria_id;
        }
        $categoria = App::get('database')->read('category',$id); 

        return view('/admin/editar-atracao', [
            'atracao_edit' => $atracao,
            'acao' => $acao,
            'categorias' => $categorias,
            'categoria_atual' => $categoria,

            ]); 
    }
    public function atracoes_view(){
        $atracao = App::get('database')->read('atracoes', $_GET['id']);  
        $id = "";
        foreach ($atracao as $x){
            $id = $x->categoria_id;
        }
        $categoria = App::get('database')->read('category',$id);

        return view('/admin/visualizar-atracao', [
            'atracao_visualizar' => $atracao,
            'categoria_visualizar' => $categoria,

            ]);
    }
    public function atracoes_delete(){
        $atracao = App::get('database')->read('atracoes', $_GET['id']);  
        $id = "";
        foreach ($atracao as $x){
            $id = $x->categoria_id;
        }
        $categoria = App::get('database')->read('category',$id);;  
        return view('/admin/apagar-atracao', [
            'atracao_exclusao' => $atracao,
            'categoria_apagar' => $categoria,

            ]); 
    }
    //FIM CONTROLLERS ATRAÇÕES//



    //CONTROLLER PAGINAS NAO ADMINISTRATIVAS//


    public function home(){
        $titulo = 'Home'; //nome da pagina
        return view('/site/index', ['titulo' => $titulo]);


    }
    public function quem_somos(){
        $titulo = 'Quem Somos'; //nome da pagina
        return view('/site/quem-somos', ['titulo' => $titulo]);


    }


    public function atracoes(){ //função movida para melhor organização //vai precisar de inputs mais tarde
        $titulo = 'Atrações';
        return view('/site/atracoes', ['titulo' => $titulo]);
    }

    public function contato(){ //função movida para melhor organização //vai precisar de inputs mais tarde
        $titulo = 'Contato';
        return view('/site/contato', ['titulo' => $titulo]);
    }

    public function login(){ //função movida para melhor organização //vai precisar de inputs mais tarde
        $titulo = 'Login';
        return view('/site/login', ['titulo' => $titulo]);
    }


   

}
