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

    public function criar_atracao(){
        return view('/admin/criar-atracao');
    }

    
    public function store(){

        // verifica se foi enviado um arquivo.. fonte:https://php.eduardokraus.com/upload-de-imagens-com-php
        if ( isset( $_FILES[ 'foto' ][ 'name' ] ) && $_FILES[ 'foto' ][ 'error' ] == 0 ) {
            echo 'Você enviou o arquivo: <strong>' . $_FILES[ 'foto' ][ 'name' ] . '</strong><br />';
            echo 'Este arquivo é do tipo: <strong > ' . $_FILES[ 'foto' ][ 'type' ] . ' </strong ><br />';
            echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'foto' ][ 'tmp_name' ] . '</strong><br />';
            echo 'Seu tamanho é: <strong>' . $_FILES[ 'arquivo' ][ 'foto' ] . '</strong> Bytes<br /><br />';
        
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
                 'descricao' => $_POST['descricao'],
                 'categoria' => $_POST['categoria'],
                 'valor' => $_POST['valor'],
                  'foto' => $novoNome,
            
                 ]);
           
                // Concatena a pasta com o nome
                $destino = $_SERVER['DOCUMENT_ROOT'] . "/public/img/atracoes-img/" . $novoNome;
        
                // tenta mover o arquivo para o destino
                if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                    echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
                    echo ' < img src = "' . $destino . '" />';
                }
                else
                    echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
            }
            else
                echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
        }
        else
            echo 'Você não enviou nenhum arquivo!';
        
            

            //  $destino =  $_SERVER['DOCUMENT_ROOT'] . "/public/img/atracoes-img/" . $_FILES['foto']['name'];
            // $arquivo_tmp = $_FILES['foto']['tmp_name'];
            // move_uploaded_file($arquivo_tmp, $destino);
                

            redirect('atracoes/criacao');
            //header('Location: /atracoes/criacao');//arrumar pra um redirect melhor
    }
            
    public function editar_atracao(){

        $atracao = App::get('database')->read('atracoes', $_POST['id']);  
        return view('/admin/editar-atracao', [//retorna vetor de usuarios
            'atracao_edit' => $atracao
            ]);    
    }

    public function store_edicao(){

        if ( isset( $_FILES[ 'foto' ][ 'name' ] ) && $_FILES[ 'foto' ][ 'error' ] == 0 ) {
            echo 'Você enviou o arquivo: <strong>' . $_FILES[ 'foto' ][ 'name' ] . '</strong><br />';
            echo 'Este arquivo é do tipo: <strong > ' . $_FILES[ 'foto' ][ 'type' ] . ' </strong ><br />';
            echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'foto' ][ 'tmp_name' ] . '</strong><br />';
            echo 'Seu tamanho é: <strong>' . $_FILES[ 'foto' ][ 'size' ] . '</strong> Bytes<br /><br />';
        
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
        
                  App::get('database')->edit('atracoes',
                    ['nome' => $_POST['nome'],
                    'descricao' => $_POST['descricao'],
                    'categoria' => $_POST['categoria'],
                    'valor' => $_POST['valor'],
                    'foto' => $novoNome,
                    
                    ], $_POST['id']);
                // Concatena a pasta com o nome
                $destino = $_SERVER['DOCUMENT_ROOT'] . "/public/img/atracoes-img/" . $novoNome;
        
                // tenta mover o arquivo para o destino
                if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                    echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
                    echo ' < img src = "' . $destino . '" />';
                }
                else
                    echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
            }
            else
                echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
        }
        else
            echo 'Você não enviou nenhum arquivo!';
        
            
  
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
      
      $destino = $_SERVER['DOCUMENT_ROOT'] . "/public/img/atracoes-img/" . $_POST['foto_salva'];
      unlink($destino);

      redirect('atracoes/adm');
    
    }

    
}
