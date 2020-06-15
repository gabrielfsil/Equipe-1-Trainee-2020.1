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
        $userPwdOld = $user[0]->password;
        $error = False;
        $message = "Senha modificada com sucesso.";
        //var_dump($userPwdOld);

        if($userPwdOld == $_POST['oldPassword'] && $_POST['newPassword'] == $_POST['newPasswordRepeat'])
            App::get('database')->edit('person', ['password' => $_POST['newPassword']], $_POST['id']);
        else 
        {
            $error = True;
            if($userPwdOld != $_POST['oldPassword'])
                $message = "A senha digitada não corresponde a atual.";
            else
                $message = "A nova senha não corresponde ao campo repetido.";
        }

        $act = [
            'error' => $error,
            'message' => $message];

        //var_dump($user[0]);
        //var_dump($act);
        return view('admin/change-password', ['user' => $user[0],
                                              'act' => $act]);
    }
}