<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        helper('form');
        $this->userModel = new UserModel();
    }

    public function login()
    {
        // Jika sudah login
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/'));
        }

        if ($this->request->getPost()) {

            // Validasi Form
            $rules = [
                'username' => 'required|min_length[6]',
                'password' => 'required|min_length[7]|numeric',
            ];

            // Jika validasi berhasil
            if ($this->validate($rules)) {

                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');

                // Cari user berdasarkan username
                $dataUser = $this->userModel
                    ->where(['username' => $username])
                    ->first();

                if ($dataUser) {

                    // Cek password
                    if (password_verify($password, $dataUser['password'])) {

                        session()->set([
                            'username'   => $dataUser['username'],
                            'role'       => $dataUser['role'],
                            'isLoggedIn' => true
                        ]);

                        return redirect()->to(base_url('/'));
                    }
                }

                session()->setFlashdata(
                    'failed',
                    'Username atau Password Salah'
                );

                return redirect()->back();

            } else {

                // Jika validasi gagal
                session()->setFlashdata(
                    'failed',
                    $this->validator->listErrors()
                );

                return redirect()->back();
            }
        }

        return view('v_login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }
}