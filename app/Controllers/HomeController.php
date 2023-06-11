<?php namespace App\Controllers;

use CodeIgniter\Controller;

class HomeController extends Controller
{
    public function index()
    {
        echo view('index');
    }
}
