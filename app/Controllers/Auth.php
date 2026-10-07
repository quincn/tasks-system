<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function authenticate()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (! $this->validate($rules)) {
            return view('login', [
                'validation' => $this->validator
            ]);
        }

        $userModel = new UserModel();

        $user = $userModel
            ->where('username', $this->request->getPost('username'))
            ->first();

        if (! $user || ! password_verify(
            $this->request->getPost('password'),
            $user['password']
        )) {
            return view('login', [
                'error' => 'Invalid username or password.'
            ]);
        }

        session()->set([
            'user_id'   => $user['id'],
            'username'  => $user['username'],
            'logged_in' => true
        ]);

        return redirect()->to('/tasks');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/');
    }
}