<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function loginPage() //DISPLAY LOGIN FORM
    {
        return view('login_page');
    }

    public function login() //LOGIN LOGIC
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel->getUserByUsername($username);

        if ($user && $this->userModel->verifyPassword($password, $user['password'])) {
            return redirect()->to(site_url('MainPage'));
        }
        session()->setFlashdata('error', 'Invalid username or password.');
        return redirect()->to(site_url('loginPage'));
    }

    public function registerPage() //DISPLAY REGISTER FORM
    {
        return view('register_page');
    }

    public function register() //REGISTER NEW USER
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if ($password !== $confirmPassword) {
            session()->setFlashdata('error', 'Passwords do not match.');
            return redirect()->to(site_url('register'));
        }

        $userData = [
            'username' => $username,
            'password' => $password,
        ];

        $this->userModel->insert($userData);
        session()->setFlashdata('success', 'Registration successful.');
        return redirect()->to(site_url('loginPage'));
    }
}
