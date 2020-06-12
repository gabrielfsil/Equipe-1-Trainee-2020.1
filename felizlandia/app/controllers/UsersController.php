<?php

namespace App\Controllers;

use App\Core\App;

class UsersController
{

    public function home()
    {
        return view('admin/list-users');
    }

    /**
     * Show all users.
     */
    public function index()
    {
        $users = App::get('database')->selectAll('users');

        return view('users', compact('users'));
    }

    /**
     * Store a new user in the database.
     */
    public function store()
    {
        App::get('database')->insert('users', [
            'name' => $_POST['name']
        ]);

        return redirect('users');
    }
}
