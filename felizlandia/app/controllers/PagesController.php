<?php

namespace App\Controllers;

use App\Core\App;

class PagesController
{
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
}