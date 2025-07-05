<?php

namespace App\Controllers;

class Pengguna extends BaseController
{
    public function profil()
    {
        // Redirect ke profile yang benar
        return redirect()->to(base_url('user/profile'));
    }
    
    public function index()
    {
        // Redirect ke profile yang benar
        return redirect()->to(base_url('user/profile'));
    }
}
