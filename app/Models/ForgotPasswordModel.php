<?php

namespace App\Models;

use CodeIgniter\Model;

class ForgotPasswordModel extends Model
{
    protected $table = 'main_table';
    protected $allowedFields = ['email', 'name', 'otp', 'otp_expiry'];

    function checkEmailName($email, $name)
    {
        return $this->where('email', $email)->where('name', $name)->first();
    }

    function updateOTP($data, $email)
    {
        return $this->where('email', $email)->set($data)->update();
    }
}