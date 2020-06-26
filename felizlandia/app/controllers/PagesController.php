<?php

namespace App\Controllers;

use App\Core\App;

class PagesController
{
    /* Páginas públicas */

    /* Páginas referentes ao login de usuário */
    
    public function login()
    {
        session_start();
        if(isset($_SESSION) && $_SESSION['logged'])
        {
            return redirect('admin/home');
        }
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
        $_SESSION['hash'] = md5($_SERVER['REMOTE_ADDR']); //$_SERVER['HTTP_USER_AGENT'] . 
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
        $checksum = md5($_SERVER['REMOTE_ADDR']);  //$_SERVER['HTTP_USER_AGENT'] .
    
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }

        //Verifico se o usuário não está logado no sistema
        if (!isset($_SESSION) || !$_SESSION['logged'] || $checksum != $_SESSION['hash'])
        {
            redirect('login-alert');
        }
    }

    
    /* Página referentes as funcionalidades administrativas de usuários */

    public function home()
    {
        $titulo = 'Home'; //nome da pagina

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
            'titulo' => $titulo,

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
        $titulo = 'Atrações';

        return view('/site/atracoes',[
            'atracoes' => $atracoes,
            'categorias' => $categorias,
            'num_atracoes' => $num_atracoes,
            'pagina_atual' => $pagina_atual,
            'titulo' => $titulo,
            
        ]);
    }


    public function searchAtracao()
    {
        if(isset($_GET['categoria']))
        {
            $atracoes = App::get('database')->advancedSearchAtracaoCategoria($_GET['conteudo'], $_GET['categoria']);
            
        }
        else
        {
            $atracoes = App::get('database')->advancedSearchAtracaoCategoria($_GET['conteudo']);
        }
             
        $categorias = App::get('database')->selectAll("category");

        $num_atracoes = [
            "num" => count($atracoes)
        ];
        $pagina_atual = ['nome' =>"Atrações" ];
        $titulo = 'Atrações';

        return view('/site/atracoes',[
            'atracoes' => $atracoes,
            'categorias' => $categorias,
            'num_atracoes' => $num_atracoes,
            'pagina_atual' => $pagina_atual,
            'titulo' => $titulo,
            
        ]);
    }



    public function listUsers()
    {
        $this->verifyLogin();
        
        $users = App::get('database')->selectAll('person');
        $num_users = [
            "num" => count($users)
        ];
        $pagina_atual = ['nome' =>"Usuários" ];

        return view('admin/list-users', ['users' => $users, "num_users" => $num_users, 'pagina_atual' => $pagina_atual,
        ]);
    }

    public function acessUser()
    {
        $this->verifyLogin();

        $pagina_atual = ['nome' =>"Usuários" ];
        $user = App::get('database')->read('person', 'id', $_POST['id']);
        return view('admin/display-user', ['user' => $user[0], 'pagina_atual' => $pagina_atual]);
    }

    public function createUser()
    {
        $this->verifyLogin();

        $pagina_atual = ['nome' =>"Usuários" ];
        return view('admin/create-user',[ 'pagina_atual' => $pagina_atual]);
    }

    public function editUser()
    {
        $this->verifyLogin();

        $pagina_atual = ['nome' =>"Usuários" ];
        $user = App::get('database')->read('person', 'id', $_POST['id']);
        return view('admin/edit-user', ['user' => $user[0],  'pagina_atual' => $pagina_atual]);
    }

    public function changeUserPassword()
    {
        $this->verifyLogin();

        $pagina_atual = ['nome' =>"Usuários" ];
        $user = App::get('database')->read('person', 'id', $_POST['id']);
        return view('admin/change-password', ['user' => $user[0], 'pagina_atual' => $pagina_atual]);
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

    public function Acategoria()
    {
        $this->verifyLogin();

        $pagina_atual = ['nome' =>"Categorias" ];

        return view('admin/adicionar-categoria',[ 'pagina_atual' => $pagina_atual]);
    }
    
    //CONTROLLERS ATRAÇÕES// 
    

    public function atracoes_admin()
    {
        $this->verifyLogin();

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

    
    public function atracoes_create()
    {
        $this->verifyLogin();

        $acao = ['nome' => 'none'];
        $categorias = App::get('database')->selectAll('category');
        $pagina_atual = ['nome' =>"Atrações" ];

        return view('/admin/criar-atracao',[
            'acao'=> $acao,
            'categorias' => $categorias,
            'pagina_atual' => $pagina_atual

            ]);
    }

    public function atracoes_edit()
    {
        $this->verifyLogin();

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
    public function atracoes_view()
    {
        $this->verifyLogin();
        
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
    public function atracoes_delete()
    {
        $this->verifyLogin();
        
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



    //CONTROLLER PAGINAS NAO ADMINISTRATIVAS//


    
    public function quem_somos(){
        $titulo = 'Quem Somos'; //nome da pagina
        return view('/site/quem-somos', ['titulo' => $titulo]);


    }

    public function contato(){ //função movida para melhor organização //vai precisar de inputs mais tarde
        $titulo = 'Contato';
        return view('/site/contato', ['titulo' => $titulo]);
    }
}
