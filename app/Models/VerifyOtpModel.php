<?php

namespace App\Models;

use CodeIgniter\Model;

class VerifyOtpModel extends Model
{
    protected $table = 'main_table';

    public function getUserByEmailAndOtp($email, $otp)
    {
        return $this->where('email', $email)
            ->where('otp', $otp)
            ->first();
    }
}