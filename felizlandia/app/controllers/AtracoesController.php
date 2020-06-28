<?php

namespace App\Controllers;

use App\Core\App;

class AtracoesController  

{
   /* public function home(){

    
        return view('/site/atracoes');
    }*/

   /* public function list(){
        $atracoes = App::get('database')->selectAll('atracoes');//pega todos ususarios da base de dados
        $num_atracoes = [
            "num" => count($atracoes)
        ];
        return view('/admin/lista-atracoes', [//retorna vetor de atraçoes e o numero de atrações
            'atracoes' => $atracoes,
             'num_atracoes' => $num_atracoes,
            ]);        
    }*/


    public function protecao($string){//função para segurança
        $string = str_replace(" or ", "", $string);
        $string = str_replace("select ", "", $string);
        $string = str_replace("delete ", "", $string);
        $string = str_replace("create ", "", $string);
        $string = str_replace("drop ", "", $string);
        $string = str_replace("update ", "", $string);
        $string = str_replace("drop table", "", $string);
        $string = str_replace("show table", "", $string);
        $string = str_replace("from ", "", $string);
        $string = str_replace("applet", "", $string);
        $string = str_replace("object", "", $string);
        $string = str_replace("'", "", $string);
        $string = str_replace("´", "", $string);
        $string = str_replace("`", "", $string);
        $string = str_replace("#", "", $string);
        $string = str_replace("=", "", $string);
        $string = str_replace("--", "", $string);
        $string = str_replace(";", "", $string);
        $string = str_replace("*", "", $string);
        $string = str_replace("/", "", $string);
        $string = strip_tags($string);
        //die(var_dump($string));
        return $string;
    }
    

   /* public function create(){
        $acao = ['nome' => 'none'];
        return view('/admin/criar-atracao',[
            'acao'=> $acao,
            ]);
    }*/

    
    public function store(){

            $arquivo_tmp = $_FILES[ 'foto' ][ 'tmp_name' ];
            $nome = $_FILES[ 'foto' ][ 'name' ];
        
            $nome_atracao = $this->protecao ($_POST['nome']);
            $descricao = $this->protecao($_POST['descricao']);
            // Pega a extensão
            $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
        
            // Converte a extensão para minúsculo
            $extensao = strtolower ( $extensao );

                         
        
            // Somente imagens, .jpg;.jpeg;.gif;.png
            // Aqui eu enfileiro as extensões permitidas e separo por ';'
            // Isso serve apenas para eu poder pesquisar dentro desta String
            if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {

                // Cria um nome único para esta imagem
                // Evita que duplique as imagens no servidor.
                // Evita nomes com acentos, espaços e caracteres não alfanuméricos
                $novoNome = uniqid ( time () ) . '.' . $extensao;
        
              
                // Concatena a pasta com o nome
                $destino = $_SERVER['DOCUMENT_ROOT'] . "/public/img/atracoes-img/" . $novoNome;
                // tenta mover o arquivo para o destino
                $erro = "";
                $erro = $erro . App::get('database')->checkExistence('atracoes',[
                    'campo' =>'nome',
                    'conteudo'=> $nome_atracao
                ], 'id_atracao');
                if($erro==""){
                        
                        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

                          
                            App::get('database')->insert('atracoes',
                            ['nome' => $nome_atracao,
                            'descricao' => $descricao,
                            'categoria_id' => $_POST['categoria'],
                            'valor' => $_POST['valor'],
                            'foto' => $novoNome,]);

                            $acao = [
                                'nome' => 'sucesso',
                            ];    
                        
                           
                        }
                        else
                        {
                            $acao = [
                                'nome' => 'erro de imagem',
                                'mensagem' => 'Erro ao salvar o arquivo, tente novamente'
                            ];
                            
                            
                        }

                }else{
                    $acao = [
                        'nome' => 'erro duplicata',
                        'mensagem' => 'Já existe uma atração com esse nome',
                    ];
                }

            }
            else
               {
                $acao = [
                    'nome' => 'erro de imagem',
                    'mensagem' => 'Este arquivo não é uma imagem, selecione novamente'
                ];

                
               }
               $categorias = App::get('database')->selectAll('category');
               $pagina_atual = ['nome' =>"Atrações" ];

               return view('/admin/criar-atracao',[
                   'acao'=> $acao,
                   'categorias' => $categorias,
                   'pagina_atual' => $pagina_atual
       
                   ]);
             
    }
            
   /* public function edit(){

        $acao = [
            "nome" => "none"
        ];
        $atracao = App::get('database')->read('atracoes', $_GET['id']);  

        return view('/admin/editar-atracao', [//retorna vetor de usuarios
            'atracao_edit' => $atracao,
            'acao' => $acao,
            ]);    
    }*/

    public function store_edit(){

        

        $arquivo_tmp = $_FILES[ 'foto' ][ 'tmp_name' ];
        $nome_arquivo = $_FILES[ 'foto' ][ 'name' ];
    
        $nome_atracao = $this->protecao ($_POST['nome']);
        $descricao = $this->protecao($_POST['descricao']);
        // Pega a extensão
        $extensao = pathinfo ( $nome_arquivo, PATHINFO_EXTENSION );
    
        // Converte a extensão para minúsculo
        $extensao = strtolower ( $extensao );

        $erro = "";
        $erro = $erro . App::get('database')->checkExistence('atracoes',
        [
            'campo' =>'nome',
            'conteudo'=> $nome_atracao,
            'id' => $_POST['id']
        ],'id_atracao');

        if($erro == ""){
            if($nome_arquivo != ""){
                    // Somente imagens, .jpg;.jpeg;.gif;.png
            // Aqui eu enfileiro as extensões permitidas e separo por ';'
            // Isso serve apenas para eu poder pesquisar dentro desta String
                if (strstr ( '.jpg;.jpeg;.gif;.png', $extensao )) {
                    // Cria um nome único para esta imagem
                    // Evita que duplique as imagens no servidor.
                    // Evita nomes com acentos, espaços e caracteres não alfanuméricos

                    $destino_antigo = $_SERVER['DOCUMENT_ROOT'] . "/public/img/atracoes-img/" . $_POST['foto_antiga'];
                    $novoNome = uniqid ( time () ) . '.' . $extensao;

                
                        // Concatena a pasta com o nome
                    $destino = $_SERVER['DOCUMENT_ROOT'] . "/public/img/atracoes-img/" . $novoNome;

                        // tenta mover o arquivo para o destino
                    if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                            
                        if(file_exists($destino_antigo))
                        {
                            unlink($destino_antigo);
                         }

                        App::get('database')->edit('atracoes',
                            ['nome' => $nome_atracao,
                            'descricao' => $descricao,
                            'categoria_id' => $_POST['categoria'],
                            'valor' => $_POST['valor'],
                            'foto' => $novoNome,
                            
                            ], 'id_atracao', $_POST['id']);
                    

                        $acao = [
                                'nome' => 'sucesso',
                            ];
                            
                    }else {
                            $acao = [
                                'nome' => 'erro de imagem',
                                'mensagem' => 'Erro ao salvar o arquivo, tente novamente'
                            ];
                        
                    }

                }else{

                    $acao = [
                        'nome' => 'erro de imagem',
                        'mensagem' => 'Este arquivo não é uma imagem, selecione novamente'
                    ];    
                
                }

            }else{
                App::get('database')->edit('atracoes',
                ['nome' => $nome_atracao,
                'descricao' => $descricao,
                'categoria_id' => $_POST['categoria'],
                'valor' => $_POST['valor'],
                
                ], 'id_atracao', $_POST['id']);
    

                $acao = [
                    'nome' => 'sucesso',
                ];
            }
                        
        }else{
            $acao = [
                'nome' => 'erro duplicata',
                'mensagem' => 'Já existe uma atração com esse nome',
            ];
        }
    
        $atracao = App::get('database')->read('atracoes', 'id_atracao', $_POST['id']);  
        $categorias = App::get('database')->selectAll('category');
        $id = "";
        foreach ($atracao as $x){
            $id = $x->categoria_id;
        }
        $categoria_atual = App::get('database')->read('category', 'id',$id); 
        $pagina_atual = ['nome' =>"Atrações" ];

        return view('/admin/editar-atracao', [
                    'atracao_edit' => $atracao,
                    'acao' => $acao,
                    'categorias' => $categorias,
                    'categoria_atual' => $categoria_atual,
                    'pagina_atual' => $pagina_atual
                    ]);    

        
   
}
     
    /*public function view(){

        $atracao = App::get('database')->read('atracoes', $_GET['id']);  
        return view('/admin/visualizar-atracao', [//retorna vetor de usuarios
            'atracao_visualizar' => $atracao
            ]);    
    }*/

    /*public function delete(){

        $atracao = App::get('database')->read('atracoes', $_GET['id']);  
        return view('/admin/apagar-atracao', [//retorna vetor de usuarios
            'atracao_exclusao' => $atracao
            ]);    
    }*/
    public function store_delete(){

      App::get('database')->delete('atracoes', 'id_atracao', $_POST['id']);  
      
      $destino = $_SERVER['DOCUMENT_ROOT'] . "/public/img/atracoes-img/" . $_POST['foto_antiga'];
     //die( var_dump($destino));
      if(file_exists($destino))
     {
        unlink($destino);
    }

      redirect('admin/list-atracoes');
    
    }

    
}
