<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class LogoutController extends Controller
{
    public function index()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}