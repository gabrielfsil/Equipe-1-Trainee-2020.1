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
        session_start();
        $this->sessionEnd();
        
        return redirect('');
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
            $user = $user[0];
            $userPwdOld = $user->password;
            if($userPwdOld == $_POST['password'])
            {
                var_dump("consegue!!!!!!!!!!!!!!");
                $this->sessionStart($user);
                var_dump("Sessao " . $_SESSION["name"] . " " . $_SESSION["email"] . " " . $_SESSION['logged']);
                var_dump("\nusuario " . $user->name . " " . $user->email);
                $message = "Seja Bem Vindo - Login feito com sucesso.";

                // se usuário estiver logado corretamente, ele redireciona para home admin
                if(isset($_SESSION['logged']) && $_SESSION['logged'])
                {
                    return redirect('admin/home');
                }
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
        // seta tempo de expiração da sessão em 3horas = 180 minutos
        session_cache_expire(180);

        // cria sessão de usuário no servidor
        session_start();
        
        // seta verdadeiro  para o login na sessão do usuario 
        $_SESSION['logged'] = True;
        
        // armazena dados da sessão atual de usuário
        $_SESSION["name"] = $user->name;
        $_SESSION["email"] = $user->email;
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
        // evita manipulação/ataque, dar mais segurança
        $_SESSION['hash'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
    }

    // Finaliza sessão
    public function sessionEnd()
    {
        // remove as variáveis/dados da sessão do usuário
        session_unset();

        // finaliza sessão do usuário
        session_destroy();
    }

    // protege páginas administrativas
    public function verifyLogin()
    {
        $checksum = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);

        session_start();

        //Verifico se o usuário não está logado no sistema
        if (!isset($_SESSION['logged']) || !$_SESSION['logged'] || $checksum != $_SESSION['hash'])
        {
            redirect('login-alert' . $_SESSION['name']);
        }
    }

    
    /* Página referentes as funcionalidades administrativas de usuários */

    public function listUsers()
    {
        $this->verifyLogin();
        
        $users = App::get('database')->selectAll('person');
        return view('admin/list-users', ['users' => $users]); // array chave valor
    }

    public function acessUser()
    {
        $this->verifyLogin();

        $user = App::get('database')->read('person', $_POST['id']);
        return view('admin/display-user', ['user' => $user[0]]);
    }

    public function createUser()
    {
        $this->verifyLogin();

        return view('admin/create-user');
    }

    public function editUser()
    {
        $this->verifyLogin();

        $user = App::get('database')->read('person', $_POST['id']);
        return view('admin/edit-user', ['user' => $user[0]]);
    }

    public function changeUserPassword()
    {
        $this->verifyLogin();

        $user = App::get('database')->read('person', $_POST['id']);
        return view('admin/change-password', ['user' => $user[0]]);
    }

    /**
     * Show the home page.
     */
    public function HomeAdm()
    {
        session_start();
        $this->verifyLogin();

        return view('admin/adm-home');
    }

    public function Lcategorias()
    {
        $this->verifyLogin();

        $categorias = App::get('database')->selectAll("category");
        return view('admin/lista-categoria', ['categorias' => $categorias]);
    }

    public function Acategoria()
    {
        $this->verifyLogin();

        return view('admin/adicionar-categoria');
    }
    
    //CONTROLLERS ATRAÇÕES// 
    public function atracoes()
    {
        $this->verifyLogin();
    
        return view('/site/atracoes');
    }

    public function atracoes_admin()
    {
        $this->verifyLogin();

        $atracoes = App::get('database')->selectAll('atracoes');
        $num_atracoes = [
            "num" => count($atracoes)
        ];
        return view('/admin/lista-atracoes', [
            'atracoes' => $atracoes,
             'num_atracoes' => $num_atracoes,
            ]);      
    }

    
    public function atracoes_create()
    {
        $this->verifyLogin();

        $acao = ['nome' => 'none'];
        $categorias = App::get('database')->selectAll('category');

        return view('/admin/criar-atracao',[
            'acao'=> $acao,
            'categorias' => $categorias,

            ]);
    }

    public function atracoes_edit()
    {
        $this->verifyLogin();

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

    public function atracoes_view()
    {
        $this->verifyLogin();

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

    public function atracoes_delete()
    {
        $this->verifyLogin();

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
