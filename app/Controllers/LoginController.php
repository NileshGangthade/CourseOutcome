<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function attemptLogin()
    {
        // Load database service
        $db = \Config\Database::connect();
        $model = new UserModel($db);

        $email = service('request')->getPost('email');
        $password = service('request')->getPost('password');



        $user = $model->attemptLogin($email, $password);

        if ($user) {
            // Set session data
            $session = session();
            $session->set($user);

            // Redirect user based on role
            if ($user['is_admin'] == 1) {
                if ($user['user_type'] == 'hod') {
                    return redirect()->to('/view_results');
                } else {
                    return redirect()->to('/admin_dashboard');
                }
            } else {
                return redirect()->to('/dashboard');
            }
        } else {
            // Invalid credentials
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }
}
