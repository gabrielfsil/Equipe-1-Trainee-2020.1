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
        var_dump("\nSessao " . $_SESSION["name"] . " " . $_SESSION["email"] . " " . $_SESSION['logged']);
        return view('site/login-alert');
    }

    public function logout()
    {
        session_start();
        var_dump("VAI SAIR!!!!");
        var_dump("\nSessao " . $_SESSION["name"] . " " . $_SESSION["email"] . " " . $_SESSION['logged']);
        $this->sessionEnd();
        var_dump("SAAAAAAAAAAAAIUUUUUUUUUU!!!");
        
        //return redirect('');
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
                //return redirect('admin/home');
                if($_SESSION['logged'])   //isset($_SESSION['logged']) && 
                {
                    var_dump(" FINAL VERDADE!!!!!!!!!!!!!!");
                    redirect("admin/home");
        
                    
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
        var_dump("Sessao start consegue!!!!!!!!!!!!!!");
        
        //$_SESSION['logged'] = True;
        

        //else 
        //{
            //Caso o login dê errado, devolvo o usuário para a página de login
          //  header ("Location: login.php"); // coloca uma pagina a mais para falar para o usuario que ele nao tem permissao
        //}


        // if($_SESSION['logged'])
        // {
        //     var_dump("CRIA 1!!!!!!!!!!!!!!");
        //     redirect("admin/homeeeee");
        // }

        // seta tempo de expiração da sessão em 60 MINUTOS
        

        //session_name('AdminSession');

        //if (isset($_POST['userid']) && isset($_POST['password'])) {
            //$userid = $_POST['userid'];
            //$password = md5($_POST['password']); 
        
            //if ($userid == 'myusername' && $password == md5('mypassword')) {
                //$_SESSION['logged_in'] = true;
                //header('location: admin.php');
                //exit;
            //}
        //}


        // nomeia sessão de usuário
        //session_name("AdminSession");

        // Seta tempo de expiração da sessão
        session_cache_expire(30);

        // cria sessão de usuário no servidor
        session_start();
        
        $_SESSION['logged'] = True;
        

        echo "IsSet1: " . isset($_SESSION["logged"]) . "; IsMobile1: " . $_SESSION["logged"] . "; type: " . gettype($_SESSION["logged"]) . ";<br>";

        if($_SESSION['logged'])
        {
            var_dump("CRIA 2!!!!!!!!!!!!!!");
            //redirect("admin/home1");
        }

        //$_SESSION['logged'] = True;


        if($_SESSION['logged'])
        {
            var_dump("CRIA 3!!!!!!!!!!!!!!");
            //redirect("admin/homev");
        }

        // armazena dados das sessão do usuário
        $_SESSION["name"] = $user->name;
        $_SESSION["email"] = $user->email;

        if (!$_SESSION['logged']) //!isset($_SESSION['logged']) || 
        {
            redirect('login-alert' . $_SESSION["name"]);
        }

        if($_SESSION['logged'])   //isset($_SESSION['logged']) && 
        {
            var_dump("VERDADE!!!!!!!!!!!!!!");
            redirect("admin/home");

            
        }

    }

    public function sessionEnd()
    {
        var_dump("session endddd ;.....");
        // remove as variáveis/dados da sessão do usuário
        session_unset();

        // finaliza sessão do usuário
        session_destroy();
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
        //if(logging_in()) {
        //    $_SESSION['user'] = 'someuser';
        //    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
        //}
        
        // The Check on subsequent load
        //if($_SESSION['ip'] != $_SERVER['REMOTE_ADDR']) {
        //    die('Session MAY have been hijacked');
        //}
        session_start();

        echo "IsSet: " . isset($_SESSION["logged"]) . "; IsMobile: " . $_SESSION["logged"] . "; type: " . gettype($_SESSION["logged"]) . ";<br>";

        var_dump("Sessao " . $_SESSION["name"] . " " . $_SESSION["email"] . " " . $_SESSION['logged']);

        //Verifico se o usuário está logado no sistema
        if (!$_SESSION['logged']) //!isset($_SESSION['logged']) || 
        {
            redirect('login-alert' . $_SESSION['name']);
            echo "nao esta logado";
        }
        else
        {
            echo "logado nessa treta!";
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

        var_dump("Logado???? ");
        if(isset($_SESSION['logged']))   //isset($_SESSION['logged']) && 
        {
            var_dump("VERDADE!!!!!!!!!!!!!!   ");
            var_dump($_SESSION['name']);
            //redirect("admin/home");

            
        }
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
