<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class AuthController extends BaseController
{
    protected User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function login()
    {
        return view('auth/login');
    }

    public function doLogin()
    {
        $request = $this->request->getPost();
        $user = $this->user->where('email', $request['email'])->first();
        if (!$user) return redirect()->back()->with('error', 'User tidak ditemukan');

        if (password_verify($request['password'], $user['password'])) {
            $session_data = [
                'user_id' => $user['user_id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => $user['role'],
            ];
            session()->set('user', $session_data);
            return redirect()->to('/');
        }

        return redirect()->back()->with('error', 'Password tidak sesuai');
    }

    public function register()
    {
        return view('auth/register', [
            'validation' => \Config\Services::validation(),
        ]);
    }

    public function doRegister()
    {
        $validation = \Config\Services::validation();

        $validate = $this->validate([
            'name' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]',
        ]);

        if (!$validate) return redirect()->back()->withInput();

        $request = $this->request->getPost();

        $this->user->save([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => password_hash($request['password'], PASSWORD_BCRYPT),
            'role' => 'customer',
        ]);

        return redirect()->to('/login')->with('success', 'Berhasil melakukan registrasi');
    }

    public function logout()
    {
        session()->remove('user');
        return redirect()->to('/login');
    }
}
