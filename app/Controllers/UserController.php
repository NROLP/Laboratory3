<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function login()
    {
        return view('login_page');
    }

    public function authenticate()
    {
        // Get the username and password from the form
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // Load the UserModel
        $model = new UserModel();

        // Check if the user exists in the database
        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // User is authenticated, you can set session data or redirect to the next page.
            // For example, setting user data in session and redirecting to dashboard:
            
            $userData = [
                'user_id' => $user['id'],
                'username' => $user['username'],
                // Add other user data here if needed
            ];

            // Store user data in session
            session()->set($userData);

            // Redirect to the dashboard or any other page
            return redirect()->to('/main'); // Change '/dashboard' to your desired URL
        } else {
            // Authentication failed, redirect back to login page with an error message
            return redirect()->to('/login')->with('error', 'Invalid username or password');
        }
    }

    public function register()
    {
        // Load the registration view
        return view('register');
    }

    public function createUser()
    {
        // Get the user registration data from the form
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            // Add other user data here if needed
        ];

        // Load the UserModel
        $model = new UserModel();

        // Insert the new user into the database
        $model->insert($data);

        // Redirect to the login page or any other page
        return redirect()->to('/login_page'); // Change '/login' to your desired URL
    }

    public function logout()
    {
        // Destroy the user's session and redirect to the login page
        session()->destroy();
        return redirect()->to('/login_page'); // Change '/login' to your desired URL
    }
}
