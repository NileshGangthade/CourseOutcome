<?php

namespace App\Controllers;

use App\Models\NewPasswordModel;

class NewPasswordController extends BaseController
{
    public function index()
    {
        $session = session();
        $email = $session->get('email');
        if (!$email) {
            return redirect()->to('/forgot_password');
        }

        $data['email'] = $email;
        return view('new_password_view', $data);
    }

    public function update()
    {
        $session = \Config\Services::session();

        $email = $session->get('reset_email'); // Get email from session
        $new_password = $this->request->getPost('password');

        // Now perform the validation and operation
        if (!$email || !$new_password) {
            throw new \Exception('Email or Password not set');
        }

        $email = esc($email);
        $new_password = esc($new_password);

        if (!is_string($email) || !is_string($new_password)) {
            throw new \Exception('Invalid input data');
        }

        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $model = new NewPasswordModel();
        $is_updated = $model->updatePasswordByEmail($email, $hashed_password);

        if ($is_updated) {
            return redirect()->to('/login')->with('message', 'Password updated successfully');
        } else {
            return redirect()->to('/forgot_password')->with('error', 'Cannot update the password. Please try again.');
        }
    }
}