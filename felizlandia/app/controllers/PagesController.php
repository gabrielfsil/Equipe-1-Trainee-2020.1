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

    /* Páginas referentes ao login de usuário */

    public function login()
    {
        return view('site/login');
    }

    public function loginAlert()
    {
        return view('site/login-alert');
    }

    public function logout()
    {
        sessionEnd();
        home();
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
                sessionStart($user);
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

    public function sessionStart($user)
    {
        if($_SESSION['logged']){
        header ("Location: /admin/home");
        }
        else {
        //Caso o login dê errado, devolvo o usuário para a página de login
        header ("Location: login.php"); // coloca uma pagina a mais para falar para o usuario que ele nao tem permissao
        }

        $_SESSION['logged'] = True;


        // seta tempo de expiração da sessão em 60 MINUTOS
        session_cache_expire(60);

        session_name('AdminSession');

        if (isset($_POST['userid']) && isset($_POST['password'])) {
            $userid = $_POST['userid'];
            $password = md5($_POST['password']);
        
            if ($userid == 'myusername' && $password == md5('mypassword')) {
              $_SESSION['logged_in'] = true;
              header('location: admin.php');
              exit;
            }
        }

        // cria sessão de usuário no servidor
        session_start();

        // armazena dados das sessão do usuário
        $_SESSION["name"] = $user->name;
        $_SESSION["email"] = $user->email;
    }

    public function sessionEnd()
    {
        // remove as variáveis/dados da sessão do usuário
        session_unset();

        // finaliza sessão do usuário
        session_destroy();
        return redirect('/');
    }

    // protect admin pages
    public function verifyLogin()
    {
        // Verificar se a sessão não foi roubada
        // colocar senha com md5()?
        // not the most secure hash! $_SESSION['checksum'] = md5($_SESSION['username'].$salt);
        // $_SERVER['HTTP_USER_AGENT']
        // $_SESSION['hash']      = md5($YOUR_SALT.$username.$_SERVER['HTTP_USER_AGENT']); // user's name hashed to avoid manipulation
        // $_SESSION['checksum'] = md5($_SESSION['username'].$salt); 
        // if (md5($_SESSION['username'].$salt) != $_SESSION['checksum'])
        //{
        //    handleSessionError();
        //}
        if(logging_in()) {
            $_SESSION['user'] = 'someuser';
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
        }
        
        // The Check on subsequent load
        if($_SESSION['ip'] != $_SERVER['REMOTE_ADDR']) {
            die('Session MAY have been hijacked');
        }


        //Verifico se o usuário está logado no sistema
        if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
            header("Location: login.php");
        }
        else {
            echo "<h1>Seja bem-vindo, ".$_SESSION["user"]."</h1>";
        }
    }

    public function handleSessionError()
    {

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
