<?php

namespace App\Controllers;

use App\Core\App;

class AtracoesController

{
    public function home(){

    
        return view('/site/atracoes');
    }

    public function atracoes_adm(){
        $atracoes = App::get('database')->selectAll('atracoes');//pega todos ususarios da base de dados
        $num_atracoes = [
            "num" => count($atracoes)
        ];
        return view('/admin/lista-atracoes', [//retorna vetor de atraçoes e o numero de atrações
            'atracoes' => $atracoes,
             'num_atracoes' => $num_atracoes,
            ]);        
    }


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
        $string = str_replace("#", "", $string);
        $string = str_replace("=", "", $string);
        $string = str_replace("--", "", $string);
        $string = str_replace("-", "", $string);
        $string = str_replace(";", "", $string);
        $string = str_replace("*", "", $string);
        $string = str_replace("/", "", $string);
        $string = strip_tags($string);
        return $string;
    }
    

    public function criar_atracao(){
        $acao = ['nome' => 'none'];
        return view('/admin/criar-atracao',[
            'acao'=> $acao,
            ]);
    }

    
    public function store(){

        // verifica se foi enviado um arquivo.. fonte:https://php.eduardokraus.com/upload-de-imagens-com-php
           
            $arquivo_tmp = $_FILES[ 'foto' ][ 'tmp_name' ];
            $nome = $_FILES[ 'foto' ][ 'name' ];
        
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
        
                App::get('database')->insert('atracoes',//se tudo tiver ok fazer a inserção
                ['nome' => $_POST['nome'],
                 'descricao' => $this->protecao($_POST['descricao']),
                 'categoria' => $_POST['categoria'],
                 'valor' => $_POST['valor'],
                  'foto' => $novoNome,
            
                 ]);
           
                // Concatena a pasta com o nome
                $destino = $_SERVER['DOCUMENT_ROOT'] . "/public/img/atracoes-img/" . $novoNome;
        
                // tenta mover o arquivo para o destino
                if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                    $acao = [
                        'nome' => 'sucesso',
                    ];
  
                    return view('/admin/criar-atracao', [//retorna vetor de usuarios
                      'acao' => $acao,
                      ]);  
                }
                else
                    echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
            }
            else
               {
                $acao = [
                    'nome' => 'erro de imagem',
                    'mensagem' => 'Este arquivo não é uma imagem, selecione novamente'
                ];

                return view('/admin/criar-atracao', [
                  'acao' => $acao,
                  ]);  
               }
    }
            
    public function editar_atracao(){

        $acao = [
            "nome" => "none"
        ];
        $atracao = App::get('database')->read('atracoes', $_POST['id']);  

        return view('/admin/editar-atracao', [//retorna vetor de usuarios
            'atracao_edit' => $atracao,
            'acao' => $acao,
            ]);    
    }

    public function store_edicao(){


            $arquivo_tmp = $_FILES[ 'foto' ][ 'tmp_name' ];
            $nome_arquivo = $_FILES[ 'foto' ][ 'name' ];
        
            // Pega a extensão
            $extensao = pathinfo ( $nome_arquivo, PATHINFO_EXTENSION );
        
            // Converte a extensão para minúsculo
            $extensao = strtolower ( $extensao );
        
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


                unlink($destino_antigo);

                  App::get('database')->edit('atracoes',
                    ['nome' => $_POST['nome'],
                    'descricao' => $this->protecao($_POST['descricao']),
                    'categoria' => $_POST['categoria'],
                    'valor' => $_POST['valor'],
                    'foto' => $novoNome,
                    
                    ], $_POST['id']);

              
                    // Concatena a pasta com o nome
                    $destino = $_SERVER['DOCUMENT_ROOT'] . "/public/img/atracoes-img/" . $novoNome;
            
                    // tenta mover o arquivo para o destino
                    if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                
                    //$atracao_edit = App::get('database')->read('atracoes', $_POST['id']);  

                    $acao = [
                        'nome' => 'sucesso',
                    ];
                    $atracao = App::get('database')->read('atracoes', $_POST['id']); 
                  
                          
                   
                    return view('/admin/editar-atracao', [
                        'atracao_edit' => $atracao,
                        'acao' => $acao,
                        ]);    
                        
                    }
                    else
                        echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
       

            }else{

                $acao = [
                    'nome' => 'erro de imagem',
                    'mensagem' => 'Este arquivo não é uma imagem, selecione novamente'
                ];
                
                $atracao = App::get('database')->read('atracoes', $_POST['id']);  
                return view('/admin/editar-atracao', [
                    'atracao_edit' => $atracao,
                    'acao' => $acao,
                    ]);     
               }
            }//caso nenhum arquivo seja upado
            else{
                App::get('database')->edit('atracoes',
                    ['nome' => $_POST['nome'],
                    'descricao' => $this->protecao($_POST['descricao']),
                    'categoria' => $_POST['categoria'],
                    'valor' => $_POST['valor'],
                    'foto' => $_FILES["foto"]['name'],
                    
                    ], $_POST['id']);
                    $acao = [
                        'nome' => 'sucesso',
                    ];
                          
                    $atracao = App::get('database')->read('atracoes', $_POST['id']);  
                    return view('/admin/editar-atracao', [
                        'atracao_edit' => $atracao,
                        'acao' => $acao,
                        ]);    

            }
       
    }

     
    public function visualizar_atracao(){

        $atracao = App::get('database')->read('atracoes', $_POST['id']);  
        return view('/admin/visualizar-atracao', [//retorna vetor de usuarios
            'atracao_visualizar' => $atracao
            ]);    
    }

    public function excluir_atracao(){

        $atracao = App::get('database')->read('atracoes', $_POST['id']);  
        return view('/admin/apagar-atracao', [//retorna vetor de usuarios
            'atracao_exclusao' => $atracao
            ]);    
    }
    public function store_exclusao(){

      App::get('database')->delete('atracoes', $_POST['id']);  
      
      $destino = $_SERVER['DOCUMENT_ROOT'] . "/public/img/atracoes-img/" . $_POST['foto_antiga'];
      unlink($destino);

      redirect('atracoes/adm');
    
    }

    
}
