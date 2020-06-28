<?php

namespace App\Controllers;

use App\Core\App;

class UsersController
{
    public function store()
    {
        $user = App::get('database')->search("person", ['email' => $_POST['userEmail']]);

        if(count(array_keys($user)) > 0)
        {
            $act = [
                'error' => True,
                'message' => "Já existe usuário com este e-mail."];

            return view('admin/create-user', ['act' => $act]);
        }
        if(strlen($_POST['userPassword']) < 8)
        {
            $act = [
                'error' => True,
                'message' => "A senha precisa ter no mínimo 8 caracteres."];

            return view('admin/create-user', ['act' => $act]);
        }
        if($_POST['userPassword'] != $_POST['userPasswordRepeat'])
        {
            $act = [
                'error' => True,
                'message' => "As senhas digitadas não são iguais."];

            return view('admin/create-user', ['act' => $act]);
        }

        App::get('database')->insert('person', [
            'name' => $_POST['userName'],
            'email' => $_POST['userEmail'],
            'password' => $_POST['userPassword']]);
            
        $act = [
            'error' => False,
            'message' => "Usuário criado com sucesso."];

        return view('admin/create-user', ['act' => $act]); 

    }

    public function delete()
    {
        $user = App::get('database')->delete('person', 'id', $_POST['id']);
        return redirect('admin/user-list');
    }

    public function storeEdit()
    {
        $user = App::get('database')->search("person", ['email' => $_POST['email']]);

        $emailoriginal = App::get('database')->read('person', 'id', $_POST['id']); //pegar email original, evitar bug de sempre ter que mudar email para poder editar
    

        
        if(count(array_keys($user)) > 0 && $emailoriginal[0]->email !=  $_POST['email']) //segunda condição para evitar bug
        {
            $act = [
                'error' => True,
                'message' => "Já existe usuário com este e-mail."];
                $user = App::get('database')->read('person', 'id', $_POST['id']);


            return view('admin/edit-user', ['user' => $user[0],'act' => $act]);
        } 

        App::get('database')->edit('person', ['name' => $_POST['name'], 'email' => $_POST['email']], 'id', $_POST['id']);

        $user = App::get('database')->read('person', 'id', $_POST['id']);

        $act = [
            'error' => False,
            'message' => "Usuário atualizado com sucesso."];
        
        return view('admin/edit-user', ['user' => $user[0], 'act' => $act]); 
    }
    
    public function storeChangePassword()
    {
        $user = App::get('database')->read('person', 'id',$_POST['id']);
        $userPwdOld = $user[0]->password;
        $error = False;
        $message = "Senha modificada com sucesso.";
        //var_dump($userPwdOld);

        if($userPwdOld == $_POST['oldPassword'] && $_POST['newPassword'] == $_POST['newPasswordRepeat'])
            App::get('database')->edit('person', ['password' => $_POST['newPassword']], 'id', $_POST['id']);
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
        $pagina_atual = ['nome' =>"Usuários" ];

        return view('admin/change-password', ['user' => $user[0],
                                              'act' => $act, 'pagina_atual'=> $pagina_atual]);
    }
}