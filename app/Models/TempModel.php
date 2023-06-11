<?php 

namespace App\Models;

use CodeIgniter\Model;

class TempModel extends Model
{
    protected $table = 'temp_table';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'otp', 'email_status', 'otp_expiry'];
}
