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
        $users = App::get('database')->selectAll('users');

        return view('admin/list-users', compact('users'));
    }

    /**
     * Store a new user in the database.
     */
    public function create()
    {
        App::get('database')->insert('users', [
            'name' => $_POST['name']
        ]);

        return redirect('users');
    }

    public function delete()
    {
        return view('admin/list-users');
    }


    public function edit()
    {
        return view('admin/list-users');
    }


    public function changePassword()
    {
        return view('admin/list-users');
    }

}