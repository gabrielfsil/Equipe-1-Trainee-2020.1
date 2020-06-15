<?php

namespace App\Controllers;

use App\Core\App;

class UsersController
{
    /**
     * Show all users.
     */
    public function list()
    {
        $users = App::get('database')->selectAll('person');

        return view('admin/list-users', ['users' => $users]); // array chave valor
    }

    public function acess()
    {
        $user = App::get('database')->read('person', $_POST['id']);
        return view('admin/display-user', ['user' => $user[0]]);
    }

    public function create(){

        return view('admin/create-user');
    }

    /**
     * Store a new user in the database.
     */
    public function store()
    {
        App::get('database')->insert('person', [
            'name' => $_POST['userName'],
            'email' => $_POST['userEmail'],
            'password' => $_POST['userPassword']]);
        
        return redirect('admin/user-list');
    }

    public function delete()
    {
        $user = App::get('database')->delete('person', $_POST['id']);
        return redirect('admin/user-list');
    }


    public function edit()
    {
        $user = App::get('database')->read('person', $_POST['id']);
        return view('admin/edit-user', ['user' => $user[0]]);
    }

    public function storeEdit()
    {
        App::get('database')->edit('person',
                          ['name' => $_POST['name'],
                          'email' => $_POST['email']], $_POST['id']);

        $user = App::get('database')->read('person', $_POST['id']);
        
        return view('admin/display-user', ['user' => $user[0]]); 
    }

    public function changePassword()
    {
        $user = App::get('database')->read('person', $_POST['id']);

        return view('admin/change-password', ['user' => $user[0]]);
    }
    
    public function storeChangePassword()
    {
        $user = App::get('database')->read('person', $_POST['id']);
        $userPwdOld = $user[0]['password'];

        if($userPwdOld == $_POST['passwordOld'] && $_POST['password'] == $_POST['passwordRepeat'])
            App::get('database')->edit('person', ['password' => $_POST['password']], $_POST['id']);

        

        //return view('admin/display-user', ['user' => $user[0]]); 
        return view('admin/change-password', ['user' => $user[0]]);
    }
}