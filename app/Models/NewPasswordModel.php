<?php

namespace App\Models;

use CodeIgniter\Model;

class NewPasswordModel extends Model
{
    protected $table = 'main_table';
    protected $allowedFields = ['password', 'otp', 'otp_expiry'];

    public function updatePasswordByEmail($email, $new_password)
    {
        $data = [
            'password' => $new_password,
            'otp' => null,
            'otp_expiry' => null
        ];

        return $this->where('email', $email)->set($data)->update();
    }
}