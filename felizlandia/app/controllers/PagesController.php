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
        $categorias = App::get('database')->selectAllCategoria("categorias");
        return viewAdm('lista-categoria', ['categorias' => $categorias]);
    }

    public function Acategoria(){

        return viewAdm('adicionar-categoria');
    }
    
}