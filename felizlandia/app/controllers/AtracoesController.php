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
        return view('/admin/lista-atracoes', [//retorna vetor de usuarios
            'atracoes' => $atracoes
            ]);        
    }

    public function criar_atracao(){
        return view('/admin/criar-atracao');
    }

    public function store(){
        //sem upload de arquivo no servidor, para testes iniciais
        //portanto eu adiciono manualmente as imagens no caso uso as que
        //ja estão na pasta teste, para os testes, para que eu possa puxa-las
        //na pagina de edição
        App::get('database')->insert('atracoes',
        ['nome' => $_POST['nome'],
        'descricao' => $_POST['descricao'],
        'categoria' => $_POST['categoria'],
        'valor' => $_POST['valor'],
        'foto' => $_POST['foto'],
        
        ]);
       

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
    App::get('database')->edit('atracoes',
    ['nome' => $_POST['nome'],
    'descricao' => $_POST['descricao'],
    'categoria' => $_POST['categoria'],
    'valor' => $_POST['valor'],
    'foto' => $_POST['foto'],
    
    ], $_POST['id']);
    }
}
