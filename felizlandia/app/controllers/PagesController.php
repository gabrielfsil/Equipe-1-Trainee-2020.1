<?php

namespace App\Controllers;

use App\Core\App;



class PagesController
{
    /**
     * Show the home page.
     */
    public function HomeAdm()
    {
        return viewAdm('adm-home');
    }

    public function Lcategorias()
    {
        $categorias = App::get('database')->selectAll("categorias");
        return viewAdm('lista-categoria', ['categorias' => $categorias]);
    }

    public function Acategoria(){

        return viewAdm('adicionar-categoria');
    }
    
    //CONTROLLERS ATRAÇÕES//
    public function atracoes(){

    
        return view('/site/atracoes');
    }

    public function atracoes_admin(){
        $atracoes = App::get('database')->selectAll('atracoes');//pega todos ususarios da base de dados
        $num_atracoes = [
            "num" => count($atracoes)
        ];
        return view('/admin/lista-atracoes', [//retorna vetor de atraçoes e o numero de atrações
            'atracoes' => $atracoes,
             'num_atracoes' => $num_atracoes,
            ]);      
    }

    
    public function atracoes_create(){
        $acao = ['nome' => 'none'];
        return view('/admin/criar-atracao',[
            'acao'=> $acao,
            ]);
    }

    public function atracoes_edit(){
        $acao = [
            "nome" => "none"
        ];
        $atracao = App::get('database')->read('atracoes', $_GET['id']);  

        return view('/admin/editar-atracao', [//retorna vetor de usuarios
            'atracao_edit' => $atracao,
            'acao' => $acao,
            ]); 
    }
    public function atracoes_view(){
        $atracao = App::get('database')->read('atracoes', $_GET['id']);  
        return view('/admin/visualizar-atracao', [//retorna vetor de usuarios
            'atracao_visualizar' => $atracao
            ]);
    }
    public function atracoes_delete(){
        $atracao = App::get('database')->read('atracoes', $_GET['id']);  
        return view('/admin/apagar-atracao', [//retorna vetor de usuarios
            'atracao_exclusao' => $atracao
            ]); 
    }
    //FIM CONTROLLERS ATRAÇÕES//

}
