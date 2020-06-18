<?php

namespace App\Controllers;

use App\Core\App;

class PagesController
{
    /* Páginas públicas */

    public function home()
    {
        return view('site/index');
    }


    /* Página referentes as funcionalidades administrativas de usuários */

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

    /* Páginas referentes ao login de usuário */

    public function login()
    {
        return view('site/login');
    }

    public function makeLogon()
    {
        $user = App::get('database')->search("person", ['email' => $_POST['email']]);
        $error = False;

        if(count(array_keys($user)) == 0)
        {
            $error = True;
            $message = "Não há usuário cadastrado com este e-mail.";

        }
        else
        {
            $userPwdOld = $user[0]->password;
            if($userPwdOld == $_POST['password'])
            {
                return redirect('admin/home');
            }
            else
            {
                $error = True;
                $message = "Senha não corresponde a cadastrada.";
            }

        }

        $act = [
            'error' => $error,
            'message' => $message];

        return view('site/login', ['act' => $act]);
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
    public function atracoes(){

    
        return view('/site/atracoes');
    }

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

}
